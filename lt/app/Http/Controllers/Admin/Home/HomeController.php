<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class HomeController extends Controller {

    public function __construct() {
        
    }

    public function main($bianhao) {
        return view("Admin.Home.main", ["bh" => $bianhao]);
    }

    public function left($bianhao) {
        $sel = new mol();
        $nickname = session()->get("Adminuser");
        $arr = $sel->selone("demo_user", "nickname", "=", $nickname);
        $sjid = $sel->selone("demo_sjrz", "bianhao", "=", $bianhao);
        $type = $arr->type;
        return view("Admin.Home.left", ["bh" => $bianhao, "type" => $type, "id" => $sjid]);
    }

    public function top($bianhao) {
        $sel = new mol();
        $nickname = session()->get("Adminuser");
        $arr = $sel->selone("demo_user", "nickname", "=", $nickname);
        $sjid = $sel->selone("demo_sjrz", "bianhao", "=", $bianhao);
        $type = $arr->type;
        return view("Admin.Home.top", ["bh" => $bianhao, "type" => $type, "id" => $sjid]);
    }

    public function index($bianhao) {
        $sel = new mol();
        $nickname = session()->get("Adminuser");
        $arr = $sel->selone("demo_user", "nickname", "=", $nickname);
        if ($arr->type == 1) {
            /*
             * 订单统计
             */
            $yjdcount = DB::table("dingdan")->where("j", "=", "2")->count();
            $wfkcount = DB::table("dingdan2")->where("i", "=", "2")->count();
            $yfkcount = DB::table("dingdan3")->where("h", "=", "1")->count();
            $wfkcount = DB::table("dingdan1")->where("f", "=", "2")->count();

            $rootcount = DB::table("demo_root")->count();
            $ztcount = DB::table("demo_btj")->count();

            $yjdcount = $yjdcount + $wfkcount + $yfkcount + $wfkcount;

            date_default_timezone_set('PRC');
            $datearr = [];
            $datearr["rq"] = date("Y-m-d");
            $datearr["time"] = date("H:i:s");
            $weekarray = array("日", "一", "二", "三", "四", "五", "六"); //先定义一个数组
            $datearr["week"] =  "星期" . $weekarray[date("w")];


            return view("Admin.Home.index", ["yjdcount" => $yjdcount, "rootcount" => $rootcount, "zt" => $ztcount, "date" => $datearr]);
        }

        if ($arr->type == 2) {
            $str = $sel->selone("demo_sjrz", "bianhao", "=", $bianhao);
            return view("Admin.Home.kh", ["str" => $str]);
        }
    }

}
