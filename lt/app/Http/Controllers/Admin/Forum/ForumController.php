<?php

namespace App\Http\Controllers\Admin\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ForumController extends Controller
{
    public function index(Request $request){
        $sel = new mol();
        $count = $sel->count("demo_forum", "sh", "=", "1");
        $hs = $sel->count("demo_forum", "sh", "=", "3");
        $data = DB::table("demo_forum")->where("sh","=","2")->orderby("id","desc")->get();
        $db = $sel->db("demo_forum", "sh", "=", "2", "id", "desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Forum.tab",["items"=>$data,"count"=>$count,"hs"=>$hs,"where"=>$where]);
    }
    
    public function create(Request $request){
        $sel = new mol();
        $count = $sel->count("demo_forum", "sh", "=", "1");
        $hs = $sel->count("demo_forum", "sh", "=", "3");
        $data = DB::table("demo_forum")->where("sh","=","1")->orderby("px","desc")->get();
        $db = $sel->db("demo_forum", "sh", "=", "1", "px", "desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Forum.ysh",["items"=>$data,"count"=>$count,"hs"=>$hs,"where"=>$where]);
    }
    
    public function hsz(Request $request) {
        $sel = new mol();
        $count = $sel->count("demo_forum", "sh", "=", "1");
        $hs = $sel->count("demo_forum", "sh", "=", "3");
        $data = DB::table("demo_forum")->where("sh","=","3")->orderby("id","desc")->get();
        $db = $sel->db("demo_forum", "sh", "=", "3", "id", "desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Forum.hsz",["items"=>$data,"count"=>$count,"hs"=>$hs,"where"=>$where]);
    }
    
    public function edit($id) {
       $sel = new mol();
       $str = $sel->selone("demo_forum", "id", "=", $id);
       return view("Admin.Forum.detail",["str"=>$str]);
    }
    
    public function update($id,Request $request){
        
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->selone("demo_forum", "id", "=", $id);
        if(!empty($str->fj)) {
            unlink("./forum/s_".$str->fj);
            unlink("./forum/".$str->fj);
        }
        $arr = $sel->sedelete("demo_forum", "id", "=", $id);
        if($arr == 1) {
            return back();
        }
    }
    
    public function sh($id) {
        $sel = new mol();
        $arr = $sel->sh("sh", "1", $id,"demo_forum");
        if($arr == 1) {
            return back();
        } else {
            echo "审核失败";
        }
    }
    
    public function hs($id) {
        $sel = new mol();
        $arr = $sel->sh("sh", "3", $id, "demo_forum");
        if($arr == 1) {
            return back();
        }
    }
    
    public function sqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->selone("demo_forum", "id", "=", $v);
            if(!empty($arr->fj)) {
                unlink("./forum/s_".$arr->fj);
                unlink("./forum/".$arr->fj);
            }
            $row = $sel->sedelete("demo_forum", "id", "=", $v);
        }
        if($row == 1) {
            return back();
        }
    }
    
    public function px($id,$px) {
        $sel = new mol();
        $arr = $sel->sh("px", "{$px}", $id, "demo_forum");
        echo json_decode($arr);
    }
    
    public function forumset() {
        $sel = new mol();
        $str = $sel->selone("demo_forumset", "id", "=", "1");
        return view("Admin.Forum.set",["str"=>$str]);
    }
    
    public function forumsaveset($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $upims = $request->file('forumset_pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["forumset_pic"] = $data["myforumset_pic"];
        } else {
            $data['forumset_pic'] = $sel->uploads($upims,"./forumsets",$data["forumset_pic"],"50","50",$data["myforumset_pic"]);
            $arr = $sel->selone("demo_forumset", "id", "=", $id);
            if(!empty($arr->forumset_pic)) {
                unlink("./forumsets/s_".$arr->forumset_pic);
                unlink("./forumsets/".$arr->forumset_pic);
            }
        }
        
        unset($data["myforumset_pic"]);
        $row = $sel->updatee("demo_forumset", "id", "=", $id, $data);
        if($row == 1) {
            echo "<script>alert('设置成功!');history.back();</script>";
        }
        
    }
    
    
}
