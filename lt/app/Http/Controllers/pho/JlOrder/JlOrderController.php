<?php

namespace App\Http\Controllers\pho\JlOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class JlOrderController extends Controller
{
    public function jlorder($nickname=null,$type=0) {
        $sel = new mol();
        
        /*
        * 订单数量统计开始
        */
        //未付款付款
        $wcount = DB::table("demo_xq_order")->where("payzt","=","2")->where("nickname","=",$nickname)->count();
            //$ycount = $sel->count("demo_xq_order", "payzt", "=", "1");
        //已付款
        $ycount = DB::table("demo_xq_order")->where("payzt","=","1")->where("nickname","=",$nickname)->count();
        
        //全部
        $allcount = $sel->allcount("demo_xq_order");
        
        /*
        * 订单数量统计结束
        */
            
        if($type == 0){
            /*
             * 需求订单检索开始
             */
            $data = $sel->selwhere("demo_xq_order", "tel", "=", $nickname, "id", "desc");
            //$wcount = $sel->count("demo_xq_order", "payzt", "=", "2");
            /*
             *需求订单检索结束
             */
        }
        if($type == 2){
            /*
             * 需求订单检索开始未付款
             */
            $data = DB::table("demo_xq_order")->where("payzt","=","2")->where("nickname","=",$nickname)->orderby("id","desc")->get();
            //$wcount = $sel->count("demo_xq_order", "payzt", "=", "2");
            /*
             *需求订单检索结束未付款
             */
        }
        if($type == 1){
            /*
             * 需求订单检索开始已付款
             */
            $data = DB::table("demo_xq_order")->where("payzt","=","1")->where("nickname","=",$nickname)->orderby("id","desc")->get();
            //$wcount = $sel->count("demo_xq_order", "payzt", "=", "2");
            /*
             *需求订单检索结束已付款
             */
        }
        
            /*
             * 教练订单
             */
       return view("pho.jlCenter.Order.m_jlOrder",["items"=>$data,"allcount"=>$allcount,
                   "wcount"=>$wcount,"ycount"=>$ycount,"type"=>$type]);
    }
    
    public function xqsqdel($id,$nickname=null) {
        $sel = new mol();
        $str = $sel->sedelete("demo_xq_order", "id", "=", $id);
        if($str == 1) {
            return redirect("tel/jlcenter"."/".$nickname);
        }
    }
    
    public function xqtrueorder($id,$nickname) {
        $sel = new mol();
        $data["payzt"] = 3;
        $str = $sel->updatee("demo_xq_order", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("tel/jlcenter"."/".$nickname);
        }
    }
    
    public function xqpayorder($id,$nickname=null) {
        $sel = new mol();
        $data["payzt"] = "1";
        $str = $sel->updatee("demo_xq_order", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("tel/jlcenter"."/".$nickname);
        }
    }
    
    public function xqorderdetail($id,$nickname){
        $sel = new mol();
        $data = $sel->selone("demo_xq_order", "id", "=", $id);
        return view("pho.jlCenter.Order.m_jlOrder_detail",["str"=>$data]);
    }
}
