<?php

namespace App\Http\Controllers\pho\Nav;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pho\Comm\CommController;

use App\Model\mol;
use Validator,Hash;
use DB;

class QzController extends CommController
{
    public function qz($nickname=null){
        $sel = new mol();
        $banner = DB::table("demo_banner")->where("type","=","1")->where("qufen","=","3")->where("dk","=","2")->get();
        return view("pho.jlCenter.nav.qz.m_jlqz",["banner"=>$banner]);
    }
    
    public function zsfx($nickname=null) {
        $sel = new mol();
        $data = $sel->selwhere("demo_article", "type", "=", "2", "id", "desc");
        return view("pho.jlCenter.nav.qz.zsfx.m_zsfx",["items"=>$data]);
    }
    
    public function details($id,$nickname=null) {
        $sel = new mol();
        $data = $sel->selone("demo_article", "id", "=", $id);
        $up = DB::table("demo_article")->where("id",">",$id)->where("type","=","2")->orderby("id","desc")->limit("1")->first();
        $down = DB::table("demo_article")->where("id","<",$id)->where("type","=","2")->orderby("id","desc")->limit("1")->first();
        $arr["show"] = $data->show + 1;
        $sel->updatee("demo_article", "id", "=", $id, $arr);
        return view("pho.jlCenter.nav.qz.zsfx.m_zsfx_xq",["str"=>$data,"up"=>$up,"down"=>$down]);
    }
}
