<?php

namespace App\Http\Controllers\Admin\grrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class GrrzController extends Controller {

    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "1", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type", "=", "1")->where("sh", "=", "2")->orderby("px", "desc")->orderby("id", "desc");
        $where = [];
        if ($request->has("name")) {
            $name = $request->input("name");
            $db->where("name", "=", $name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type", "=", "1")->where("sh", "=", "1")->count();
        return view("Admin.grrz.tab", ["items" => $data, "where" => $where, "count" => $count]);
    }

    public function edit($id, Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "1", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type", "=", "1")->where("sh", "=", "1")->orderby("px", "desc")->orderby("id", "desc");
        $where = [];
        if ($request->has("name")) {
            $name = $request->input("name");
            $db->where("name", "=", $name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type", "=", "1")->where("sh", "=", "2")->count();
        return view("Admin.grrz.ysh", ["items" => $data, "where" => $where, "count" => $count]);
    }

    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_grrz", "id", "=", $id);
        if ($str == 1) {
            return back();
        }
    }

    public function delgrjpqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach ($str as $v) {
            $items = $sel->sedelete("demo_grrz", "id", "=", $v);
        }

        if ($items == 1) {
            return back();
        }
    }

    public function grsh($id) {
        $sel = new mol();
        $str["sh"] = 1;
        $arr["bianhao"] = date("ymdhis") . rand(1, 1000);
        $str["bianhao"] = $arr["bianhao"];
        $items = $sel->updatee("demo_grrz", "id", "=", $id, $str);
        return back();
    }

    public function grjpedit($id) {
        $sel = new mol();
        $data = $sel->selone("demo_grrz", "id", "=", $id);
        return view("Admin.grrz.edit", ["str" => $data]);
    }

    public function postjpedit($id, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");

        //教练证或工作证jlzpic
        $upims = $request->file('jlzpic');
        if (empty($upims) || $upims == "" || $upims == null) {
            $data["jlzpic"] = $data["myjlzpic"];
        } else {
            $data['jlzpic'] = $sel->uploads($upims, "./jlzpic", $data["jlzpic"], "50", "50", $data["myjlzpic"]);
            $jlinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($jlinfo->jlzpic)) {
                unlink("./jlzpic/" . $data["myjlzpic"]);
                unlink("./jlzpic/s_" . $data["myjlzpic"]);
            }
        }

        //身份证sfzpicz
        $g = $request->file('sfzpicz');
        if (empty($g) || $g == "" || $g == null) {
            $data["sfzpicz"] = $data["mysfzpicz"];
        } else {
            $data['sfzpicz'] = $sel->uploads($g, "./sfzpicz", $data["sfzpicz"], "50", "50", $data["mysfzpicz"]);
            $sfinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($sfinfo->sfzpicz)) {
                unlink("./sfzpicz/" . $data["mysfzpicz"]);
                unlink("./sfzpicz/s_" . $data["mysfzpicz"]);
            }
        }

        //驾驶证jszpicz
        $upimssas = $request->file('jszpicz');
        if (empty($upimssas) || $upimssas == "" || $upimssas == null) {
            $data["jszpicz"] = $data["myjszpicz"];
        } else {
            $data['jszpicz'] = $sel->uploads($upimssas, "./jszpicz", $data["jszpicz"], "50", "50", $data["myjszpicz"]);
            $jsinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($jsinfo->jszpicz)) {
                unlink("./jszpicz/" . $data["myjszpicz"]);
                unlink("./jszpicz/s_" . $data["myjszpicz"]);
            }
        }

        //教练车行驶证jlcxszpic
        $upimssass = $request->file('jlcxszpic');
        if (empty($upimssass) || $upimssass == "" || $upimssass == null) {
            $data["jlcxszpic"] = $data["myjlcxszpic"];
        } else {
            $data['jlcxszpic'] = $sel->uploads($upimssass, "./jlcxszpic", $data["jlcxszpic"], "50", "50", $data["myjlcxszpic"]);
            $jlinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($jlinfo->jlcxszpic)) {
                unlink("./jlcxszpic/" . $data["myjlcxszpic"]);
                unlink("./jlcxszpic/s_" . $data["myjlcxszpic"]);
            }
        }

        //教练车jlcpic
        $upimssassa = $request->file('jlcpic');
        if (empty($upimssassa) || $upimssassa == "" || $upimssassa == null) {
            $data["jlcpic"] = $data["myjlcpic"];
        } else {
            $data['jlcpic'] = $sel->uploads($upimssassa, "./jlcpic", $data["jlcpic"], "50", "50", $data["myjlcpic"]);
            $jlcinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($jlcinfo->jlcxszpic)) {
                unlink("./jlcpic/" . $data["myjlcpic"]);
                unlink("./jlcpic/s_" . $data["myjlcpic"]);
            }
        }

        //个人照片grpic
        $upimssassas = $request->file('grpic');
        if (empty($upimssassas) || $upimssassas == "" || $upimssassas == null) {
            $data["grpic"] = $data["mygrpic"];
        } else {
            $data['grpic'] = $sel->uploads($upimssassas, "./grpic", $data["grpic"], "50", "50", $data["mygrpic"]);
            $grcinfo = $sel->selone("demo_grrz", "id", "=", $id);
            if (!empty($grcinfo->grpic)) {
                unlink("./grpic/" . $data["mygrpic"]);
                unlink("./grpic/s_" . $data["mygrpic"]);
            }
        }

        unset($data["myjlzpic"]);
        unset($data["mysfzpicz"]);
        unset($data["myjszpicz"]);
        unset($data["myjlcxszpic"]);
        unset($data["myjlcpic"]);
        unset($data["mygrpic"]);

        $arr = $sel->updatee("demo_grrz", "id", "=", $id, $data);
        if ($arr == 1) {
            $type = 1;
            echo "<script>alert('修改成功!');history.back();</script>";
        }
    }

}
