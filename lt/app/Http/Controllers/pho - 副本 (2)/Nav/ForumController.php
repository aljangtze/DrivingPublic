<?php

namespace App\Http\Controllers\pho\Nav;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ForumController extends Controller
{
    public function forum($nickname=null) {
        $sel = new mol();
        $count = $sel->count("demo_forum", "sh", "=", "1");
        $ltinfo = $sel->selone("demo_forumset", "id", "=", "1");
        $forumlist = DB::table("demo_forum")->where("sh","=","1")->orderby("px","desc")->orderby("id","px")->get();
        $forumlista = DB::table("demo_forum")->where("sh","=","1")->orderby("id","px")->get();
        

        return view("pho.jlCenter.nav.qz.forum.m_luntan",["count"=>$count,"ltinfo"=>$ltinfo,"list"=>$forumlist,"lista"=>$forumlista]);
    }
    
    public function forumft($nickname=null){
        return view("pho.jlCenter.nav.qz.forum.m_luntan_ft");
    }
    
    public function saveforumft($nickname=null,Request $request) {
        $sel = new mol();
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if(empty($str->name)) {
             echo "<script>alert('请至会员中心先完善信息!');history.back();</script>";
        }
        $data = $request->except("_token");
        $data["name"] = $str->name;
        $data["sex"] = $str->sex;
        $data["nickname"] = $nickname;
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d H:i:s");
        $data["sh"] = 2;
        $upims = $request->file('fj');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["fj"] = "";
        } else {
            $data['fj'] = $sel->uploads($upims,"./forum",$data["fj"],"50","50",$data["fj"]);
        }
        $str = $sel->add("demo_forum", $data);
        if($str == 1) {
            return redirect("tel/forum"."/".$nickname);
        }
    }
    
    public function forumdetails($id,$nickname=null) {
        $sel = new mol();
        $data = $sel->selone("demo_forum", "id", "=", $id);
        $up = DB::table("demo_forum")->where("sh","=","1")->where("id",">",$id)->orderby("id","desc")->limit("0","1")->first();
        $down = DB::table("demo_forum")->where("sh","=","1")->where("id","<",$id)->orderby("id","desc")->limit("0","1")->first();
        $arr = $data->show + 1;
        $array = $sel->sh("show", $arr, $id, "demo_forum");
        $contact = DB::table("demo_contact")->where("itemId","=",$id)->where("userinfo","=",$nickname)->orderby("id","desc")->get();
        return view("pho.jlCenter.nav.qz.forum.m_luntan_xq",["str"=>$data,"up"=>$up,"down"=>$down,"contact"=>$contact]);
    }

    public function contract(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d");
        $str = $sel->add("demo_contact",$data);
        if($str == 1) {
            return back();
        }
    }
    
}
