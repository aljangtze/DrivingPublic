<?php

namespace App\Http\Controllers\Admin\serveritem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class JrzfwController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lzjszfw", "sh", "=", "2", "id", "desc");
        $db = DB::table("demo_lzjszfw")->where("sh","=","2")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Serveritem.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function create(Request $request) {
         $sel = new mol();
        $data = $sel->selwhere("demo_lzjszfw", "sh", "=", "1", "px", "desc");
        $db = DB::table("demo_lzjszfw")->where("sh","=","1")->orderby("px","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Serveritem.ysh",["items"=>$data,"where"=>$where]);
    }
    
    public function store(Request $request) {
        
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_lzjszfw", "id", "=", $id);
        return view("Admin.Serveritem.form",["str"=>$str]);
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $str = $sel->updatee("demo_lzjszfw", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/lzjrzfw");
        }
    }
    
    public function lzjszfwsh($id) {
       $sel = new mol();
       $data["sh"] = 1;
       $str = $sel->updatee("demo_lzjszfw", "id", "=", $id, $data);
       if($str == 1) {
           return back();
       }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_lzjszfw", "id", "=", $id);
        if($str == 1){
            return back();
        }
    }
    
    public function lzjrzfwpx($id,$px) {
        $sel = new mol();
        $str["px"] = $px;
        $arr = $sel->updatee("demo_lzjszfw", "id", "=", $id, $str);
        echo json_decode($arr);
    }
    
    public function lzjrzfwsqdel($id) {
        $sel = new mol();
        $data = explode(",", $id);
        foreach($data as $v) {
            $str = $sel->sedelete("demo_lzjszfw", "id", "=", $v);
        }
        if($str == 1) {
            return back();
        }
    }
}
