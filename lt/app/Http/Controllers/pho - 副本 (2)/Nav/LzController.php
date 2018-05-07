<?php

namespace App\Http\Controllers\pho\Nav;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pho\Comm\CommController;


use App\Model\mol;
use Validator,Hash;
use DB;

class LzController extends CommController
{
    public function lz($nickname=null) {
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type","=","1")->where("qufen","=","4")->where("dk","=","2")->get();
        return view("pho.jlCenter.nav.lz.m_jllz",["banner"=>$banner]);
    }
    
    public function lzjrzfw($nickname=null) {
        $sel = new mol();
        $grrz = DB::table("demo_grrz")->where("type","=","3")->where("nickname","=",$nickname)->where("sh","=","1")->first();
        if( $grrz == null){
            echo "<script>alert('您还不是驾驶证服务商家或你提交的申请正在审核中，请到会员中心入驻驾驶证服务成为商家吧!');history.back();</script>";
        }
        if(!empty($grrz->nickname)) {
            $bianhao = $grrz->bianhao;
            return view("pho.jlCenter.nav.lz.jszfw.m_jszfwFb",["bianhao"=>$bianhao]);
        }
    }
    
    public function savelzjrzfw($nickname=null,Request $request) {
        $data = $request->except("_token");
        $sel = new mol();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if(empty($str->name)) {
            echo "<script>alert('请至会员中心完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;
        $data["nickname"] = $nickname;
        $data["sh"] = 2;
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $arr = $sel->add("demo_lzjszfw", $data);
        if($arr == 1) {
            return redirect("tel/jlcenter"."/".$nickname);
        }
    }
    
    public function lzqcfw($nickname=null) {
        $sel = new mol();
        $grrz = DB::table("demo_grrz")->where("type","=","2")->where("nickname","=",$nickname)->where("sh","=","1")->first();
        if($grrz == null){
            echo "<script>alert('您还不是汽车服务商家或你提交的申请正在审核中，请到会员中心入驻汽车服务成为商家吧!');history.back();</script>";
        }
        if(!empty($grrz->nickname)) {
            $bianhao = $grrz->bianhao;
            return view("pho.jlCenter.nav.lz.qcfw.m_qcfwFb",["bianhao"=>$bianhao]);
        }
       
    }
    
    public function savelzqcfw($nickname=null,Request $request) {
        $data = $request->except("_token");
        $sel = new mol();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if(empty($str->name)) {
            echo "<script>alert('请至会员中心完善你的基本信息!');history.back();</script>";
        }
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["tel"] = $str->tel;
        $data["nickname"] = $nickname;
        $data["sh"] = 2;
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $arr = $sel->add("demo_lzqcfw", $data);
        if($arr == 1) {
            return redirect("tel/jlcenter"."/".$nickname);
        }
    }
    
}
