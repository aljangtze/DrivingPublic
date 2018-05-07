<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class JlOrderController extends Controller {

    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("dingdan3", "id", "desc");
        $db = DB::table("dingdan3")->orderby("id", "desc");
        $where = [];

        function zhinfo($arr) {
            $info = [];
            foreach ($arr as $v) {
                $info[$v->id] = DB::table("demo_root")->where("nickname", "=", $v->b)->first();
            }
            return $info;
        }

        $zhinfo = zhinfo($data);

        $allcount = DB::table("dingdan3")->count();
        $yfkcount = DB::table("dingdan3")->where("h", "=", "2")->count();
        $wfkcount = DB::table("dingdan3")->where("h", "=", "1")->count();
        $ywccount = DB::table("dingdan3")->where("h", "=", "3")->count();
        $yjdcount = DB::table("dingdan3")->where("h", "=", "4")->count();
        if ($request->has("i")) {
            $i = $request->input("i");
            $db->where("i", "=", $i);
            $where["i"] = $i;
            $yfkcount = DB::table("dingdan3")->where("i","=",$i)->where("h", "=", "2")->count();
            $wfkcount = DB::table("dingdan3")->where("i","=",$i)->where("h", "=", "1")->count();
            $ywccount = DB::table("dingdan3")->where("i","=",$i)->where("h", "=", "3")->count();
            $yjdcount = DB::table("dingdan3")->where("i","=",$i)->where("h", "=", "4")->count();
        }
        $data = $db->paginate(15);
        return view("Admin.Jlorder.tab", ["items" => $data, "allcount" => $allcount,
            "yfkcount" => $yfkcount, "wfkcount" => $wfkcount, "ywccount" => $ywccount,
            "yjdcount" => $yjdcount, "zhinfo" => $zhinfo]);
    }

    public function create() {
        
    }

    public function store(Request $request) {
        $sel = new mol();
        $id = $request->input("id");
        $h = $request->input("h");
        $sel->sh("h", $h, $id, "dingdan3");
        $data = $request->except("_token", "id", "h");
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d H:i:s");
        $arr = $sel->add("demo_znx", $data);
        if ($arr == 1) {
            $a = "处理成功";
            return back()->with("error", $a);
        }
    }

    public function edit($id, Request $request) {
        if ($arr == 1) {
            $a = "处理成功";
            return back()->with("error", $a);
        }
    }

    public function update($id, Request $request) {
        
    }

    public function destroy($id) {
        $sel = new mol();
        $arr = $sel->selone("dingdan3", "id", "=", $id);
        if (!empty($arr->fp)) {
            unlink("./fp/" . $arr->fp);
            unlink("./fp/s_" . $arr->fp);
        }
        $data = $sel->sedelete("dingdan3", "id", "=", $id);
        if ($data == 1) {
            $a = "删除成功";
            return back()->with("error", $a);
        }
    }

    public function jlordersqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach ($str as $v) {
            $arr = $sel->sedelete("dingdan3", "id", "=", $v);
        }
        if ($arr == 1) {
            $a = "删除成功";
            return back()->with("error", $a);
        }
    }

    public function jlfp($id, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $upims = $request->file('fp');
        if (empty($upims) || $upims == "" || $upims == null) {
            $data["fp"] = $data["mypf"];
        } else {
            $data['fp'] = $sel->uploads($upims, "./fp", $data["fp"], "50", "50", $data["mypf"]);
            $arr = $sel->selone("dingdan3", "id", "=", $id);
            if (!empty($arr->fp)) {
                unlink("./fp/" . $data["mypf"]);
                unlink("./fp/s_" . $data["mypf"]);
            }
        }
        unset($data["mypf"]);
        $str = $sel->updatee("dingdan3", "id", "=", $id, $data);
        if ($str == 1) {
            return back();
        }
    }

}
