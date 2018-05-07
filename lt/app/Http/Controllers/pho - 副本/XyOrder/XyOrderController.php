<?php

namespace App\Http\Controllers\pho\XyOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class XyOrderController extends Controller
{
    public function index($nickname=null,$ys =0,$act="1") {
        $sel = new mol();
        /*
         * 所有订单开始$ys默认==0
         */
        if($ys == 0){
            $data = DB::table("dingdan")->where("m","=","$nickname")->orderby("id","desc")->get();
            $jlorder = DB::table("dingdan3")->where("b","=",$nickname)->orderby("id","desc")->get();
            $xyorder = DB::table("dingdan1")->where("h","=",$nickname)->orderby("id","desc")->get();
            $jqorder = DB::table("dingdan2")->where("g","=",$nickname)->orderby("id","desc")->get();
        }
        
        /*
         * 所有订单统计开始
         */
        $ddcount = DB::table("dingdan")->where("m","=","$nickname")->count();
        $jjcount = DB::table("dingdan3")->where("b","=","$nickname")->count();
        $xxcount = DB::table("dingdan1")->where("h","=","$nickname")->count();
        $jqcount = DB::table("dingdan2")->where("g","=","$nickname")->count();
        $allcount = $ddcount + $jjcount + $xxcount + $jqcount;
        
        /*
         * 未付款
         */
        if($ys == 1){
            $data = DB::table("dingdan")->where("m","=","$nickname")->where("j","=","2")->orderby("id","desc")->get();
            $jlorder = DB::table("dingdan3")->where("b","=",$nickname)->where("h","=","1")->orderby("id","desc")->get();
            $xyorder = DB::table("dingdan1")->where("h","=",$nickname)->where("f","=","2")->orderby("id","desc")->get();
            $jqorder = DB::table("dingdan2")->where("g","=",$nickname)->where("i","=","2")->orderby("id","desc")->get();
        }
        
        /*
         * 未付款订单统计开始
         */
        $wdd = DB::table("dingdan")->where("m","=",$nickname)->where("j","=","2")->count();
        $wjj = DB::table("dingdan3")->where("b","=",$nickname)->where("h","=","1")->count();
        $wxx = DB::table("dingdan1")->where("h","=",$nickname)->where("f","=","2")->count();
        $wjq = DB::table("dingdan2")->where("g","=",$nickname)->where("i","=","2")->count();
        $wcount = $wdd + $wjj + $wxx + $wjq;
        
        /*
         * 已付款
         */
        if($ys == 2){
            $data = DB::table("dingdan")->where("m","=","$nickname")->where("j","=","1")->orderby("id","desc")->get();
            $jlorder = DB::table("dingdan3")->where("b","=",$nickname)->where("h","=","2")->orderby("id","desc")->get();
            $xyorder = DB::table("dingdan1")->where("h","=",$nickname)->where("f","=","1")->orderby("id","desc")->get();
            $jqorder = DB::table("dingdan2")->where("g","=",$nickname)->where("i","=","1")->orderby("id","desc")->get();
        }
        
        /*
         * 已付款订单统计
         */
        $ydd = DB::table("dingdan")->where("m","=",$nickname)->where("j","=","1")->count();
        $yjj = DB::table("dingdan3")->where("b","=",$nickname)->where("h","=","2")->count();
        $yxx = DB::table("dingdan1")->where("h","=",$nickname)->where("f","=","1")->count();
        $yjq = DB::table("dingdan2")->where("g","=",$nickname)->where("f","=","1")->count();
        $ycount = $ydd + $yjj + $yxx + $yjq;
        return view("pho.xyCenter.Xyorder.m_xyOrder",["ycount"=>$ycount,"wcount"=>$wcount,"allcount"=>$allcount,"items"=>$data,"jlorder"=>$jlorder,"xyorder"=>$xyorder,"jqorder"=>$jqorder,"act"=>$act]);
    }
    
    public function xyordersdetail($id,$type=null) {
        $sel = new mol();
        /*
         * 驾校订单详情
         */
        if($type == 1){
            $str = $sel->selone("dingdan", "id", "=", $id);
            $arr = $sel->selone("demo_sjrz", "id", "=", $str->d);
        }
        /*
         * 教练订单详情
         */
        if($type == 2){
            $str = $sel->selone("dingdan3", "id", "=", $id);
            $arr = $sel->selone("demo_grrz", "id", "=", $str->a);
        }
        /*
         * 驾驶证服务与汽车服务详情
         */
        if($type == 3){
            $str = $sel->selone("dingdan1", "id", "=", $id);
            $arr = $sel->selone("demo_grrz", "id", "=", $str->a);
        }
        /*
         * 计时培训订单详情
         */
        if($type == 4){
            $str = $sel->selone("dingdan2", "id", "=", $id);
            $arr = $sel->selone("demo_grrz", "id", "=", $str->c);
        }
        return view("pho.xyCenter.Xyorder.m_xyOrder_detail",["str"=>$str,"arr"=>$arr,"type"=>$type]);
    }
    
    public function xyordersdel($id,$del) {
        $sel = new mol();
        /*
         * 驾校订单删除
         */
        if($del == 1) {
            $sel->sedelete("dingdan", "id", "=", $id);
        }
        
        /*
         * 教练订单删除
         */
        if($del == 2) {
            $sel->sedelete("dingdan3", "id", "=", $id);
        }
        
        /*
         * 驾驶证服务与汽车服务删除
         */
        if($del == 3) {
            $sel->sedelete("dingdan1", "id", "=", $id);
        }
        
        /*
         * 计时培训删除
         */
        if($del == 4) {
            $sel->sedelete("dingdan2", "id", "=", $id);
        }
        return back();
    }
    
    public function xyorderstrue($id,$sh,$ys) {
        $sel = new mol();
        
        /*
         * 驾校订单【确认订单】
         */
        if($ys == 1) {
           $a = $sel->sh("j", $sh, $id, "dingdan");
        }
        
        /*
         * 教练订单【确认订单】
         */
        if($ys == 2) {
           $sel->sh("h", $sh, $id, "dingdan3");
        }
        
        /*
         * 驾驶证服务与汽车服务【确认订单】
         */
        if($ys == 3) {
           $sel->sh("f", $sh, $id, "dingdan1");
        }
        
        /*
         * 计时培训【确认订单】
         */
        if($ys == 4) {
           $sel->sh("i", $sh, $id, "dingdan2");
        }
        
        return back();
    }
}
