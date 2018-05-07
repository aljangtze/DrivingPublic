<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class JpOrderController extends Controller {

    public function index(Request $request, $bh = 0) {
        $sel = new mol();
        $allcount = DB::table("dingdan")->count();
        $yfkcount = DB::table("dingdan")->where("j", "=", "1")->count();
        $wfkcount = DB::table("dingdan")->where("j", "=", "2")->count();
        $ywccount = DB::table("dingdan")->where("j", "=", "3")->count();
        $yjdcount = DB::table("dingdan")->where("j", "=", "4")->count();

        if ($bh == 0) {
            $list = $sel->selall("dingdan", "id", "desc");
        } else {
            $list = DB::table("dingdan")->where("o", "=", $bh)->get();
        }

        function zhinfo($arr) {
            $info = [];
            foreach ($arr as $v) {
                $info[$v->id] = DB::table("demo_root")->where("nickname", "=", $v->m)->first();
            }
            return $info;
        }

        $zhinfo = zhinfo($list);

        $db = DB::table("dingdan")->orderby("id", "desc");
        $where = [];
        if ($request->has("a")) {
            $a = $request->input("a");
            $db->where("a", "=", $a);
            $where["a"] = $a;
            $yfkcount = DB::table("dingdan")->where("a","=",$a)->where("j", "=", "1")->count();
            $wfkcount = DB::table("dingdan")->where("a","=",$a)->where("j", "=", "2")->count();
            $ywccount = DB::table("dingdan")->where("a","=",$a)->where("j", "=", "3")->count();
            $yjdcount = DB::table("dingdan")->where("a","=",$a)->where("j", "=", "4")->count();
        }
        $list = $db->paginate(9);
        return view("Admin.Jporder.tab", ["items" => $list, "allcount" => $allcount,
            "yfkcount" => $yfkcount, "wfkcount" => $wfkcount, "ywccount" => $ywccount,
            "yjdcount" => $yjdcount, "zhinfo" => $zhinfo]);
    }

    public function create() {
        
    }

    public function store(Request $request) {
        $sel = new mol;
        $id = $request->input("id");
        $j = $request->input("j");
        $str = $sel->sh("j", $j, $id, "dingdan");
        $data = $request->except("_token", "id", "j");
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d H:i:s");
        $arr = $sel->add("demo_znx", $data);
        if ($arr == 1) {
            $a = "处理成功";
            return back()->with("error", $a);
        }
    }

    public function edit($id) {
        
    }

    public function update($id, Request $request) {
        
    }

    public function destroy($id) {
        $sel = new mol();
        $arr = $sel->selone("dingdan", "id", "=", $id);
        if (!empty($arr->fp)) {
            unlink("./fp/" . $arr->fp);
            unlink("./fp/s_" . $arr->fp);
        }
        $data = $sel->sedelete("dingdan", "id", "=", $id);
        if ($data == 1) {
            return back();
        }
    }

    public function jpordersqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach ($str as $v) {
            $arr = $sel->sedelete("dingdan", "id", "=", $v);
        }
        if ($arr == 1) {
            return back();
        }
    }

    public function jpfp($id, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $upims = $request->file('fp');
        if (empty($upims) || $upims == "" || $upims == null) {
            $data["fp"] = $data["mypf"];
        } else {
            $data['fp'] = $sel->uploads($upims, "./fp", $data["fp"], "50", "50", $data["mypf"]);
            $arr = $sel->selone("dingdan", "id", "=", $id);
            if (!empty($arr->fp)) {
                unlink("./fp/" . $data["mypf"]);
                unlink("./fp/s_" . $data["mypf"]);
            }
        }
        unset($data["mypf"]);
        $str = $sel->updatee("dingdan", "id", "=", $id, $data);
        if ($str == 1) {
            return back();
        }
    }

}
