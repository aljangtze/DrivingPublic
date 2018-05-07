<?php

namespace App\Http\Controllers\pho\xyCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pho\Comm\CommController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class LcController extends CommController {

    public function xc($type = 0, $nickname = null) {
        // echo $type;
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type", "=", "2")->where("qufen", "=", "5")->where("dk", "=", "2")->get();
        $adver = $sel->selone("demo_adver", "id", "=", "2");
        view()->share('active', 'type');
        return view("pho.xyCenter.Nav.m_xyxc", ["banner" => $banner, "adver" => $adver]);
    }

    public function seljx(Request $request, $nickname = null) {
        $sel = new mol();
//        $data = $sel->selwhere("demo_sjrz", "type", "=", "1", "id", "desc");
        $data = DB::table("demo_sjrz")->where("type", "=", "1")->where("sh", "=", "1")->orderby("id", "desc")->get();
//        $data = DB::table("demo_sjrz")->where("type","=","1")->orderby("px","desc")->orderby("id","desc")
        $ddcount = DB::table("demo_sjrz")->where("type", "=", "1")->where("sh", "=", "1")->count();
        if ($request->has("jxaddress")) {
            $jxaddress = $request->input("jxaddress");
            $jxaddress = str_replace('/', '', $jxaddress);
            $data = DB::table("demo_sjrz")->where("jxaddress", "like", "%{$jxaddress}%")->where("type", "=", "1")->orderby("id", "desc")->get();
            $ddcount = DB::table("demo_sjrz")->where("jxaddress", "like", "%{$jxaddress}%")->where("type", "=", "1")->count();
        }


        /*
         * 关键词搜索
         */
        if ($request->has("name")) {
            $name = $request->input("name");
            $dcount = DB::table("demo_sjrz")->where("jxname", "like", "%{$name}%")->where("type", "=", "1")->where("sh", "=", "1")->count();
            if ($dcount != 0) {
                $data = DB::table("demo_sjrz")->where("jxname", "like", "%{$name}%")->where("type", "=", "1")->where("sh", "=", "1")->orderby("id", "desc")->get();
            }
            $dcount = DB::table("demo_sjrz")->where("jxaddress", "like", "%{$name}%")->where("type", "=", "1")->where("sh", "=", "1")->count();
            if ($dcount != 0) {
                $data = DB::table("demo_sjrz")->where("jxaddress", "like", "%{$name}%")->where("type", "=", "1")->where("sh", "=", "1")->orderby("id", "desc")->get();
            }
        }
        if ($ddcount == 0) {
            $cjl = 0;
        } else {
            function cjlcount($data) {
                foreach ($data as $v) {
                    $rows[$v->id] = DB::table("dingdan")->where("o", "=", $v->bianhao)->count();
                }
                return $rows;
            }

            $cjl = cjlcount($data);
        }
        return view("pho.xyCenter.Nav.m_jxss_detail", ["items" => $data, "cjl" => $cjl]);
    }

    public function seljxdetail($id, $nickname = null) {
        $sel = new mol();
        $str = $sel->selone("demo_sjrz", "id", "=", $id);
        $class = $sel->selwhere("demo_zzfbclass", "jid", "=", $id, "id", "desc");
        return view("pho.xyCenter.Nav.m_drive_xq", ["str" => $str, "class" => $class]);
    }

    public function seljl(Request $request, $nickname = null) {
        $sel = new mol();
        //普通班开始
        $ptclass = DB::table("demo_grrz")->where("sh", "=", "1")->where("sha", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();

        function numcount($a) {
            $count = [];
            foreach ($a as $v) {
                $count[$v->id] = DB::table("dingdan3")->where("a", "=", $v->id)->count();
            }
            return $count;
        }

        $count = numcount($ptclass);

        /*
         * 关键词搜索
         */
        if ($request->input("name")) {
            $name = $request->input("name");
            $acount = DB::table("demo_grrz")->where("sh", "=", "1")->where("sha", "=", "1")->where("name", "=", $name)->count();
            if ($acount != 0) {
                $ptclass = DB::table("demo_grrz")->where("name", "like", "%{$name}%")->where("sh", "=", "1")->where("sha", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
            }
            $acount = DB::table("demo_grrz")->where("sh", "=", "1")->where("sha", "=", "1")->where("jxaddress", "=", $name)->count();
            if ($acount != 0) {
                $ptclass = DB::table("demo_grrz")->where("jxaddress", "like", "%{$name}%")->where("sh", "=", "1")->where("sha", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
            }
        }

        if ($request->input("address")) {
            $address = $request->input("address");
            $address = str_replace('/', '', $address);

            $ptclass = DB::table("demo_grrz")->where("address", "like", "%{$address}%")->where("sh", "=", "1")->where("sha", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
        }
        return view("pho.xyCenter.Nav.m_jlss_detail", ["items" => $ptclass, "count" => $count]);
    }

    public function jldetail($id, $bianhao, $nickname = null) {
        $sel = new mol();
        $str = $sel->selone("demo_grrz", "id", "=", $id);
        $arr = DB::table("demo_addclassvip")->where("bianhao", "=", $id)->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
        $ptclass = DB::table("demo_addclasspt")->where("bianhao", "=", $id)->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();

        return view("pho.xyCenter.Nav.m_jldetail", ["str" => $str, "arr" => $arr, "ptclass" => $ptclass]);
    }

    public function xyxqfb($nickname = null) {
        $sel = new mol();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            echo "<script>alert('请先到会员中心完善您的基本信息!');history.back();</script>";
        }
        return view("pho.xyCenter.Nav.m_fbxq");
    }

    public function savexyxqfb($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d");
        $data["zhuangtai"] = 2;
        $data["nickname"] = session()->get("Teluser");
        $arr = $sel->add("demo_xqfb", $data);
        if ($arr == 1) {
            $a = route("xueyuan") . "/" . $nickname;
            echo "<script>if(confirm('发布成功我们会尽快与你取得联系！')){window.location.href='{$a}'}</script>";
        }
    }

    public function xyjspx(Request $request, $item = null, $nickname = null) {
        $sel = new mol();
//        $data =DB::table("demo_grrz")->where("qf","=","1")->where("sh","=","1")->where("sha","=","1")->orderby("px","desc")->orderby("id","desc")->get();
        $data = DB::table("demo_lessiontwo")->where("sh", "=", "1")->orderby("id", "desc")->get();

        if ($request->has("name")) {
            $name = $request->input("name");
            $data = DB::table("demo_lessiontwo")->where("lcaddress", "like", "%{$name}%")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
            $datacount = DB::table("demo_lessiontwo")->where("lcaddress", "like", "%{$name}%")->where("sh", "=", "1")->count();
            if ($datacount == 0) {
                if ($name == "科目二") {
                    $name = 2;
                }
                if ($name == "科目三") {
                    $name = 3;
                }
                $data = DB::table("demo_lessiontwo")->where("type", "=", "{$name}")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
                $datacount = DB::table("demo_lessiontwo")->where("type", "=", "{$name}")->where("sh", "=", "1")->count();
            }
            if ($datacount == 0) {
                $data = DB::table("demo_lessiontwo")->where("cartype", "=", "{$name}")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
                $datacount = DB::table("demo_lessiontwo")->where("cartype", "=", "{$name}")->where("sh", "=", "1")->count();
            }
            if ($datacount == 0) {
                if ($name == "场地练习") {
                    $name = 1;
                }
                if ($name == "考试车练习") {
                    $name = 2;
                }
                $data = DB::table("demo_lessiontwo")->where("lxmodel", "=", "{$name}")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
                $datacount = DB::table("demo_lessiontwo")->where("lxmodel", "=", "{$name}")->where("sh", "=", "1")->count();
            }
        }

        if ($item !== null) {
            $data = DB::table("demo_lessiontwo")->where("type", "=", "{$item}")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
        }
        if ($request->input("address")) {
            $address = $request->input("address");
            $address = str_replace('/', '', $address);
            $data = DB::table("demo_lessiontwo")->where("lcaddress", "like", "%{$address}%")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc")->get();
        }
        return view("pho.zxjl.m_kmxz_2", ["items" => $data]);
    }

    public function xyjspxlist($id, $class = null) {
        $sel = new mol();
        if ($class == null) {
            $str = $sel->selone("demo_lessiontwo", "id", "=", $id);
//        $arr = $sel->selone("demo_grrz", "nickname", "=", $str->tel);
            $arr = DB::table("demo_grrz")->where("qf", "=", "1")->where("nickname", "=", $str->nickname)->get();
        }
        return view("pho.zxjl.m_grfb", ["str" => $str, "tmp" => $arr]);
    }

    public function xyjpdetail($id, $type) {
        $sel = new mol();
        if ($type == 2) {
            $arr = $sel->selone("demo_lessiontwo", "id", "=", $id);
            $str = DB::table("demo_grrz")->where("id", "=", $arr->sjid)->first();
        }
        return view("pho.zxjl.m_jtime_xq", ["arr" => $arr, "str" => $str, "type" => $type]);
    }

    public function xyjppay(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $data["lctime"] = $data["lctime1"] . "&nbsp;&nbsp;" . $data["lctime2"] . "&nbsp;&nbsp;" . $data["lctime3"] . "&nbsp;&nbsp;" . $data["lctime4"];
        $data["price"] = $data["price1"] + $data["price2"] + $data["price3"] + $data["price4"];
        date_default_timezone_set('PRC');
        $data["xddate"] = date("Y-m-d H:i:s");
        $arr = $sel->selone("demo_setinfo", "id", "=", "1");
        if ($data["lctime"] !== "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;") {
            return view("pho.zxjl.m_jtime_pay", ["data" => $data, "arr" => $arr]);
        } else {
            echo "<script>alert('请选择练习时间段!');history.back();</script>";
        }
    }

    public function wszx($nickname = null) {
        $sel = new mol();
        return view("pho.xyCenter.m_zxpx");
    }

    public function xyjpdopay($paytype) {
        
    }

}
