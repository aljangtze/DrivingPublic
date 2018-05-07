<?php

namespace App\Http\Controllers\Admin\Rtcenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class RtcenterController extends Controller {

    public function index($type = 0) {
        $sel = new mol();

        if ($type == 0) {
            $data = $sel->selall("demo_root", "id", "desc");
        }

        if ($type == 1) {
            $data = $sel->selwhere("demo_root", "type", "=", "1", "id", "desc");
        }

        if ($type == 2) {
            $data = $sel->selwhere("demo_root", "type", "=", "2", "id", "desc");
        }
        $xycount = DB::table("demo_root")->where("type", "=", "2")->count();
        $jlcount = DB::table("demo_root")->where("type", "=", "1")->count();
        $infocount = DB::table("demo_znx")->where("qf", "=", "5")->count();
        $txcount = DB::table("demo_txgl")->where("type", "=", "2")->count();
        return view("Admin.Rtcenter.tab", ["items" => $data, "xycount" => $xycount,
            "jlcount" => $jlcount, "infocount" => $infocount, "txcount" => $txcount]);
    }

    public function fsinfo(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d H:i:s");
        $str = $sel->add("demo_znx", $data);
        if ($str == 1) {
            $a = "发送成功......";
            return back()->with("a", $a);
        }
    }

    public function xjqf() {
        $sel = new mol();
        $xycount = DB::table("demo_root")->where("type", "=", "2")->count();
        $jlcount = DB::table("demo_root")->where("type", "=", "1")->count();
        $infocount = DB::table("demo_znx")->where("qf", "=", "5")->count();
        $data = $sel->selall("demo_root", "id", "desc");
        $txcount = DB::table("demo_txgl")->where("type", "=", "2")->count();
        return view("Admin.Rtcenter.qf", ["xycount" => $xycount, "jlcount" => $jlcount,
            "items" => $data, "infocount" => $infocount, "txcount" => $txcount]);
    }

    public function fsqf(Request $request) {
        $sel = new mol();
        $str = $request->input("str");
        if (empty($str)) {
            $a = "请选择需要群发的用户";
            return back()->with("a", $a);
        } else {
            $data["content"] = $request->input("content");
            $str = explode(",", $str);
            unset($str[0]);
            $data["qf"] = 5;
            date_default_timezone_set('PRC');
            $data["fbdate"] = date("Y-m-d H:i:s");
            foreach ($str as $v) {
                $data["nickname"] = $v;
                $arr = $sel->add("demo_znx", $data);
            }
            $a = "发送成功......";
            return back()->with("a", $a);
        }
    }

    public function qflist() {
        $sel = new mol();
        $xycount = DB::table("demo_root")->where("type", "=", "2")->count();
        $jlcount = DB::table("demo_root")->where("type", "=", "1")->count();
        $infocount = DB::table("demo_znx")->where("qf", "=", "5")->count();
        $txcount = DB::table("demo_txgl")->where("type", "=", "2")->count();
        $data = $sel->selwhere("demo_znx", "qf", "=", "5", "id", "desc");
        $db = DB::table("demo_znx")->where("qf", "=", "5")->orderby("id", "desc");
        $data = $db->paginate(3);
        $where = [];
        return view("Admin.Rtcenter.qfinfo", ["where" => $where, "xycount" => $xycount,
            "jlcount" => $jlcount, "items" => $data, "infocount" => $infocount, "txcount" => $txcount]);
    }

    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_znx", "id", "=", $id);
        if ($str == 1) {
            $a = "操作成功......";
            return back()->with("a", $a);
        }
    }

    public function txgl() {
        $sel = new mol();
        $xycount = DB::table("demo_root")->where("type", "=", "2")->count();
        $jlcount = DB::table("demo_root")->where("type", "=", "1")->count();
        $infocount = DB::table("demo_znx")->where("qf", "=", "5")->count();
        $txcount = DB::table("demo_txgl")->where("type", "=", "2")->count();
        $data = DB::table("demo_txgl")->orderby("type","desc")->orderby("id","desc")->get();
        return view("Admin.Rtcenter.txlist",["items"=>$data,"xycount" => $xycount,"jlcount" => $jlcount, "infocount" => $infocount, "txcount" => $txcount]);
    }
    
    public function dotxgl($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $str = $sel->add("demo_znx", $data);
        $rows["type"] = 1;
        $sel->updatee("demo_txgl", "id", "=", $id,$rows);
        if($str == 1) {
            $a = "操作成功";
            return back()->with("a",$a);
        }
    }
    
    public function txgldel($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_txgl", "id", "=", $id);
        if($str == 1) {
            $a = "操作成功";
            return back()->with("a",$a);
        }
    }

}
