<?php

namespace App\Http\Controllers\pho\jlCenter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\pho\Comm\CommController;

use App\Model\mol;
use Validator,Hash;
use DB;

class JlController extends CommController
{
   
    public function vipcenter($nickname=null){
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type","=","1")->where("qufen","=","1")->where("dk","=","2")->get();
        $data = $sel->selone("demo_root", "nickname", "=", $nickname);
        $count = DB::table("demo_znx")->where("nickname","=",$nickname)->count();
        $adver = $sel->selone("demo_adver", "id", "=", "2");
        return view("pho.jlCenter.m_jlCenter",["str"=>$data,"banner"=>$banner,"count"=>$count,"adver"=>$adver]);
    }
    
    public function jlinfo($nickname=null,$type=null) {
        $sel = new mol();
//        echo $type;die;
        $data = $sel->selone("demo_root", "nickname", "=", $nickname);
        return view("pho.jlCenter.m_qyInfo",["str"=>$data,"type"=>$type]);
    }
    
    public function tjinfo($nickname=null,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["pic"] = $data["mypic"];
        } else {
            $data['pic'] = $sel->uploads($upims,"./pic",$data["pic"],"50","50",$data["mypic"]);
            $arr = $sel->selone("demo_root", "nickname", "=", $nickname);
            if(!empty($arr->pic)) {
                unlink("./pic/".$data["mypic"]);
                unlink("./pic/s_".$data["mypic"]);
            }
        }
        $nn = $data["type"];
        unset($data["mypic"]);
        unset($data["type"]);
        $str = $sel->updatee("demo_root", "nickname", "=", $nickname, $data);
        if($str == 1) {
//            if($nn == 1) {
//                return redirect("tel/xycenter"."/".$nickname);
//            } else {
//                return redirect("tel/jlcenter"."/".$nickname);
//            }
            echo "<script>alert('修改成功！');history.back();</script>";
        }
        
    }
    
    public function wytg($nickname=null) {
        $sel = new mol();
        return view("pho.jlCenter.wytg.m_wytg");
    }
    
    public function postwyts($nickname=null,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        $data["name"] = $str->name;
        $data["nickname"] = $nickname;
        $data["tel"] = $nickname;
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        
         $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["pic"] = "";
        } else {
            $data['pic'] = $sel->uploads($upims,"./pic",$data["pic"],"50","50",$data["pic"]);
        }
        
        $arr = $sel->add("demo_tg", $data);
        if($arr == 1) {
            return back();
        }
        
    }
    
    public function gsjj($nickname=null,$type=null) {
        $sel = new mol();
        $data = $sel->selone("demo_article", "type", "=", "1");
        if(!empty($data)) {
            return view("pho.jlCenter.m_gsjj",["str"=>$data,"type"=>$type]);
        } else {
            echo "<script>alert('暂无添加任何信息!');history.back();</script>";
        }
    }
    
    public function jlwdfb($nickname) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lessiontwo", "nickname", "=", $nickname, "id", "desc");
        $jlinfo = DB::table("demo_grrz")->where("nickname","=",session()->get("Teluser"))->where("type","=","1")->orderby("id","desc")->first();
        $class = $sel->selwhere("demo_addclassvip", "bianhao", "=", $jlinfo->id, "id", "desc");
        $classpt = $sel->selwhere("demo_addclasspt", "bianhao", "=", $jlinfo->id, "id", "desc");
        $jllist = DB::table("demo_lzjszfw")->where("nickname","=",session()->get("Teluser"))->get();
        $qclist = DB::table("demo_lzqcfw")->where("nickname","=",session()->get("Teluser"))->get();
        return view("pho.jlCenter.m_wdfb",["items"=>$data,"class"=>$class,"classpt"=>$classpt,"jllist"=>$jllist,"qclist"=>$qclist]);
    }
    
    public function jldel($id,$type) {
        $sel = new mol();
        if($type == 1) {
            $str = $sel->sedelete("demo_lessiontwo", "id", "=", $id);
        }
        if($type == 2) {
            $str = $sel->sedelete("demo_addclassvip", "id", "=", $id);
        }
        if($type == 3) {
            $str = $sel->sedelete("demo_addclasspt", "id", "=", $id);
        }
        if($type == 4) {
            $str = $sel->sedelete("demo_lzjszfw", "id", "=", $id);
        }
        if($type == 5) {
            $str = $sel->sedelete("demo_lzqcfw", "id", "=", $id);
        }
        if($str == 1) {
            return back();
        }
    }
    
    public function jlwdxy() {
        $sel = new mol();
        $nickname = session()->get("Teluser");
        /*
         * 计时培训
         */
        $arra = $sel->selwhere("demo_lessiontwo", "nickname", "=", $nickname, "id", "desc");
        $arraa = [];
        foreach($arra as $v) {
            $arraa[$v->id] = DB::table("dingdan2")->where("c","=",$v->id)->get();
        }
        
        return view("pho.jlCenter.wdxy");
    }
    
}
