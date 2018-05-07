<?php

namespace App\Http\Controllers\pho\XyCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pho\Comm\CommController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Model\mol;
use Validator,Hash;
use DB;

class LzController extends CommController
{
    public function lz($type=0,$nickname=null) {
  
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type","=","2")->where("qufen","=","4")->where("dk","=","2")->get();
        view()->share('active', 'type');
        return view("pho.xyCenter.Nav.Lz.m_xylz",["banner"=>$banner]);
    }
    
    public function xyjszfw(Request $request,$nickname=null,$pr=null) {
        $sel = new mol();
        
        $data = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","1")->orderby("id","desc")->get();
        if($pr == null) {
            $db = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","1")->orderby("id","desc");
        } else {
            $db = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","1")->orderby("id","desc");
        }
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where["name"] = $name;
        }
        
        $data = $db->paginate(100);
        return view("pho.xyCenter.Nav.Lz.m_ssfl_jsz",["items"=>$data]);
    }
    
    public function xyjr($id,$nickname=null) {
        $sel = new mol();
        $data = $sel->selone("demo_grrz", "id", "=", $id);
        $userinfo = $sel->selone("demo_root", "nickname", "=", $data->nickname);
        $items = DB::table("demo_lzjszfw")->where("sh","=","1")->orderby("id","desc")->get();
        return view("pho.xyCenter.Nav.Lz.m_jszfw",["data"=>$data,"items"=>$items,"userinfo"=>$userinfo]);
    }
    
    public function xyxd($id,$nickname=null) {
        $sel = new mol();
        $str = $sel->selone("demo_lzjszfw", "id", "=", $id);
        $arr = $sel->selone("demo_setinfo", "id", "=", "1");
        return view("pho.xyCenter.Nav.Lz.m_jszfw_detail",["str"=>$str,"arr"=>$arr]);
    }
    
    public function xyqc(Request $request,$nickname=null,$pr =null) {
        $data = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","1")->orderby("id","desc")->get();
        if($pr == null) {
            $db = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","1")->orderby("id","desc");
        } else {
            $db = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","1")->orderby("id","desc");
        }
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where["name"] = $name;
        }
        
        $data = $db->paginate(100);
        return view("pho.xyCenter.Nav.Lz.m_ssfl_cw",["items"=>$data]);
    }
    
    public function xyqcf($id,$nickname=null) {
        $sel = new mol();
        $str = $sel->selone("demo_grrz", "id", "=", $id);
        $data = DB::table("demo_lzqcfw")->where("sh","=","1")->orderby("id","desc")->get();
        return view("pho.xyCenter.Nav.Lz.m_qcfw",["str"=>$str,"items"=>$data]);
    }
    
    public function xyqcxd($id,$nickname=null) {
        $sel = new mol();
        $str = $sel->selone("demo_lzqcfw", "id", "=", $id);
        $arr = $sel->selone("demo_setinfo", "id", "=", "1");
         return view("pho.xyCenter.Nav.Lz.m_jszfw_detail",["str"=>$str,"arr"=>$arr]);
    }
    
    public function xyqz($nickname=null) {
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("dk","=","2")->where("qufen","=","3")->where("type","=","1")->get();
       return view("pho.xyCenter.Nav.qz.m_xyqz",["banner"=>$banner]);
    }
    
}
