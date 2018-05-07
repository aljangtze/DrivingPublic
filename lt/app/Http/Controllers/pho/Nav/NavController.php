<?php

namespace App\Http\Controllers\pho\Nav;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pho\Comm\CommController;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class NavController extends CommController {

    public function navjx($nickname = null) {
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type", "=", "1")->where("qufen", "=", "2")->where("dk", "=", "2")->get();
        $adver = $sel->selone("demo_adver", "id", "=", "2");
        return view("pho.JlCenter.nav.m_jlxc", ["banner" => $banner, "adver" => $adver]);
    }

    public function addclass($nickname = null) {
        return view("pho.jlCenter.nav.m_bxfb");
    }

    public function addclassvip($nickname = null) {
        $sel = new mol();
        $grrz = DB::table("demo_grrz")->where("type", "=", "1")->where("nickname", "=", $nickname)->where("sh", "=", "1")->first();
        if ($grrz == null) {
            echo "<script>alert('您还不是驾培服务商家或你提交的申请正在审核中，请到会员中心入驻个人驾培服务成为商家吧!');history.back();</script>";
        }
        if (!empty($grrz->nickname)) {
            $bianhao = $grrz->id;
            return view("pho.jlCenter.nav.m_bxfb_vip", ["bianhao" => $bianhao]);
        }
    }

    public function saveclassvip($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");

        if (empty($data["price"])) {
            echo "<script>alert('价格不能为空!');history.back();</script>";
        }

        if (empty($data["info"])) {
            echo "<script>alert('版型介绍不能为空!');history.back();</script>";
        }

        if (empty($data["sfinfo"])) {
            echo "<script>alert('收费明细不能为空!');history.back();</script>";
        }

        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            echo "<script>alert('请先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $data["classtype"] = 1;

        $rows = $sel->add("demo_addclassvip", $data);
        if ($rows == 1) {
//            return redirect("jtel/navjx" . "/" . $nickname);
            echo "<script>alert('发布成功!');history.back();</script>";
        }
    }

    public function normal($nickname = null) {
        $sel = new mol();
        $grrz = DB::table("demo_grrz")->where("type", "=", "1")->where("nickname", "=", $nickname)->where("sh", "=", "1")->first();
        if ($grrz == null) {
            echo "<script>alert('您还不是驾培服务商家或你提交的申请正在审核中，请到会员中心入驻个人驾培服务成为商家吧!');history.back();</script>";
        }
        if (!empty($grrz->nickname)) {
            $bianhao = $grrz->id;
            return view("pho.jlCenter.nav.m_bxfb_pt", ["bianhao" => $bianhao]);
        }
    }

    public function tjnormal($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");

        if (empty($data["price"])) {
            echo "<script>alert('价格不能为空!');history.back();</script>";
        }

        if (empty($data["info"])) {
            echo "<script>alert('版型介绍不能为空!');history.back();</script>";
        }

        if (empty($data["sfinfo"])) {
            echo "<script>alert('收费明细不能为空!');history.back();</script>";
        }

        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            echo "<script>alert('请先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $data["classtype"] = 2;

        $rows = $sel->add("demo_addclasspt", $data);
        if ($rows == 1) {
//            return redirect("tel/navjx" . "/" . $nickname);
            echo "<script>alert('发布成功!');history.back();</script>";
        }
    }

    public function lessionone($nickname = null) {
        return view("pho.jlCenter.nav.lession.m_jsxm1");
    }

    public function session($nickname = null) {
        $sel = new mol();
        return view("pho.jlCenter.nav.lession.m_jsxmFb");
    }

    public function sfhs($type) {
        $sel = new mol();
        if ($type == 1) {
            $str = $sel->selone("demo_root", "nickname", "=", session()->get("Teluser"));
            if (empty($str->name)) {
                echo json_encode($type);
            }
            $str = DB::table("demo_grrz")->where("nickname", "=", session()->get("Teluser"))->where("qf", "=", "1")->first();
            $type = 2;
            if (empty($str)) {
                echo json_encode($type);
            }
            $type = 3;
            if (!empty($str)) {
                if ($str->sha == 2) {
                    echo json_encode($type);
                }
            }
        }
    }

    public function postlessionone($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");

        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            echo "<script>alert('请到会员中心先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;

        if (empty($data["seltime1"])) {
            $data["seltime1"] = "";
        }

        if (empty($data["seltime2"])) {
            $data["seltime2"] = "";
        }

        if (empty($data["seltime3"])) {
            $data["seltime3"] = "";
        }

        if (empty($data["seltime4"])) {
            $data["seltime4"] = "";
        }

        $data["seltime"] = $data["seltime1"] . "," . $data["seltime2"] . "," . $data["seltime3"] . "," . $data["seltime4"];
        unset($data["seltime1"]);
        unset($data["seltime2"]);
        unset($data["seltime3"]);
        unset($data["seltime4"]);
        $arr = $sel->add("demo_lessionone", $data);
        if ($arr == 1) {
            return redirect("tel/navjx" . "/" . $nickname);
        }
    }

    public function lessiontwo($nickname = null) {
        $sel = new mol();
        $str = DB::table("demo_grrz")->where("nickname", "=", $nickname)->where("qf", "=", "1")->first();
        if (empty($str)) {
            return back();
        }
        if(!empty($str)) {
            if($str->sha == 2) {
                return back();
            }
        }
        return view("pho.jlCenter.nav.lession.m_jsxm2", ["sjid" => $str->id]);
    }

    public function savelessiontwo($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        $arr = $sel->selone("demo_root", "nickname", "=", $nickname);
        $str = DB::table("demo_grrz")->where("nickname", "=", $nickname)->where("qf", "=", "1")->first();
        if (empty($arr->name)) {
            echo "<script>alert('请到会员中心先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["nickname"] = $str->nickname;
        $data["sh"] = 2;
        $str = $sel->add("demo_lessiontwo", $data);
        if ($str == 1) {
            return redirect("jtel/navjx" . "/" . $nickname);
        }
    }

    public function lessionthree($nickname = null) {
        $sel = new mol();
        $str = DB::table("demo_grrz")->where("nickname", "=", $nickname)->where("qf", "=", "1")->first();
        if (empty($str)) {
           return back();
        }
        if(!empty($str)) {
            if($str->sha == 2) {
                return back();
            }
        }
        return view("pho.jlCenter.nav.lession.m_jsxm3", ["sjid" => $str->id]);
    }

    public function savelessionthree($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $arr = $sel->selone("demo_root", "nickname", "=", $nickname);
        $str = DB::table("demo_grrz")->where("nickname", "=", $nickname)->where("qf", "=", "1")->first();
        if (empty($arr->name)) {
            echo "<script>alert('请到会员中心先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["nickname"] = $str->nickname;
        $data["sh"] = 2;
        $str = $sel->add("demo_lessiontwo", $data);
        if ($str == 1) {
            return redirect("jtel/navjx" . "/" . $nickname);
        }
    }

    public function lessionfour($nickname = null) {
        return view("pho.jlCenter.nav.lession.m_jsxm4");
    }

    public function savelessionfour($nickname = null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");

        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            echo "<script>alert('请到会员中心先完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;

        if (empty($data["seltime1"])) {
            $data["seltime1"] = "";
        }

        if (empty($data["seltime2"])) {
            $data["seltime2"] = "";
        }

        if (empty($data["seltime3"])) {
            $data["seltime3"] = "";
        }

        if (empty($data["seltime4"])) {
            $data["seltime4"] = "";
        }

        $data["seltime"] = $data["seltime1"] . "," . $data["seltime2"] . "," . $data["seltime3"] . "," . $data["seltime4"];
        unset($data["seltime1"]);
        unset($data["seltime2"]);
        unset($data["seltime3"]);
        unset($data["seltime4"]);
        $arr = $sel->add("demo_lessionfour", $data);
        if ($arr == 1) {
            return redirect("tel/navjx" . "/" . $nickname);
        }
    }

    public function jlxyxq($nickname = hull) {
        $sel = new mol();
//        $data = $sel->selall("demo_xqfb", "id", "desc");
        $data = $sel->selwhere("demo_xqfb", "zhuangtai", "=", "2", "id", "desc");
        return view("pho.jlCenter.nav.m_xqzc", ["items" => $data]);
    }

    public function jlxyxqdetail($id, $nickname = null) {
        $sel = new mol();
        $str = $sel->selone("demo_xqfb", "id", "=", $id);
        return view("pho.jlCenter.nav.m_xqcz_detail", ["str" => $str]);
    }

    public function jlxyxqjd($id, $nickname = null) {
        $sel = new mol();
        //接单人联系信息
        $data = array();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (empty($str->name)) {
            $a = route("xueyuan") . "/" . $nickname;
            echo "<script>if(confirm('请到会员中心先完善你的基本信息!')){window.location.href='{$a}'}</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;

        //订单信息
        $arr = $sel->selone("demo_xqfb", "id", "=", $id);
        $data["xname"] = $arr->name;
        $data["xsex"] = $arr->sex;
        $data["xtel"] = $arr->tel;
        $data["title"] = $arr->title;
        $data["lctime"] = $arr->lcdate . "-" . $arr->lctime;
        $data["lcaddress"] = $arr->szaddress;
        $data["selitem"] = $arr->selitem;
        $data["itemtype"] = $arr->keitem;
        $data["itemtype1"] = $arr->keitem1;
        $data["nickname"] = $nickname;
        $data["payzt"] = 2;
        if (!empty($arr->kecartype)) {
            $data["cartype"] = $arr->kecartype;
        }
        if (!empty($arr->kescartype)) {
            $data["cartype"] = $arr->kescartype;
        }
        if (empty($arr->kescartype) && empty($arr->kecartype)) {
            $data["cartype"] = "";
        }
        $data["zt"] = 2;
        date_default_timezone_set('PRC');
        $data["jddate"] = date("Y-m-d H:i:s");
        $rows = $sel->add("demo_xq_order", $data);

        if ($rows == 1) {
//            $a = route("jjluser") . "/" . $nickname;
            echo "<script>alert('接单成功！');history.back()</script>";
        }
    }

}
