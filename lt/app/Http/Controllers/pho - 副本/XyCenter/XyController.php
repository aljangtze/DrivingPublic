<?php

namespace App\Http\Controllers\pho\XyCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class XyController extends Controller
{
    public function vipCenter($nickname=null) {
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type","=","2")->where("qufen","=","1")->where("dk","=","2")->get();
        $userinfo = $sel->selone("demo_root", "nickname", "=", $nickname);
        $adver = $sel->selone("demo_adver", "id", "=", "2");
        $ucount = DB::table("demo_znx")->where("nickname","=",session()->get("Teluser"))->count();
        return view("pho.xyCenter.m_xyCenter",["banner"=>$banner,"userinfo"=>$userinfo,"adver"=>$adver,"ucount"=>$ucount]);
    }
    
    public function tx() {
        $sel = new mol();
        $nickname = session()->get("Teluser");
        $info = $sel->selone("demo_root", "nickname", "=", $nickname);
        $set = $sel->selone("demo_setinfo", "id", "=", "1");
        if($info->integral >= 100) {
           if(!empty($info->yhkh)) {
                return view("pho.tx.m_yjtx",["info"=>$info,"set"=>$set]);
           } else {
               echo "<script>alert('请到会员中心完善您的银行卡信息！');history.back();</script>";
           }
        } else {
            echo "<script>alert('提现金额不能低于100！');history.back();</script>";
        }
    }
    
    public function dotx(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["money"] == null) {
            $b = "请输入提现金额！";
            return back()->with("a",$b);
        } else {
            date_default_timezone_set('PRC');
            $data["date"] = date("Y-m-d H:i:s");
            $info = $sel->selone("demo_root", "nickname", "=", $data["nickname"]);
            $user["integral"] = $info->integral - $data["money"];
            $sel->updatee("demo_root", "nickname", "=", $data["nickname"], $user);
            $str = $sel->add("demo_txgl", $data);
            if($str == 1) {
                $b = "提现申请成功请耐心等待审核,您提现金额为：".$data["money"]."元。";
               return back()->with("a",$b);
            }
        }
    }
    
    public function txmx() {
        $sel = new mol();
        $nickname = session()->get("Teluser");
        $money = $sel->selwhere("demo_txgl", "nickname", "=", $nickname, "id", "desc");
        $sum = 0;
        $info = DB::table("demo_txgl")->where("nickname","=",$nickname)->where("type","=","1")->get();
        foreach($info as $v) {
            $sum += $v->money; 
        }
        return view("pho.tx.m_money",["money"=>$money,"sum"=>$sum]);
    }
    
    public function xytsjb($nickname=null) {
        $sel = new mol();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if(empty($str->name)) {
            echo "<script>alert('请先到会员完善您的基本信息再来发布吧！');history.back();</script>";
        }
        return view("pho.xyCenter.xytsjb.m_tsjb");
    }
    
    public function xytsjbsave($nickname=null,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        $upims = $request->file('fj');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["fj"] = "";
        } else {
            $data['fj'] = $sel->uploads($upims,"./fjss",$data["fj"],"50","50",$data["fj"]);
        }
        
        $user = $sel->selone("demo_root", "nickname", "=", $nickname);
        $data["name"] = $user->name;
        $data["sex"] = $user->sex;
        $data["tel"] = $user->tel;
        $a = route("xueyuan")."/".$nickname;
        $str = $sel->add("demo_tsjb", $data);
        if($str == 1) {
            echo "<script>if(confirm('投诉成功我们尽快处理您的问题')){window.location.href='{$a}'}</script>";
        }
    }
    
    public function czsm() {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", "1");
        return view("pho.xyCenter.czsm",["str"=>$str]);
    }
    
    public function xywdfb() {
        $sel = new mol();
        $nickname = session()->get("Teluser");
        $data = $sel->selwhere("demo_xqfb", "nickname", "=", $nickname, "id", "desc");
        return view("pho.xyCenter.wdfb",["items"=>$data]);
    }
}
