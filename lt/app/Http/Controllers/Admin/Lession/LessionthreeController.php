<?php

namespace App\Http\Controllers\Admin\lession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class LessionthreeController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
//        $data = $sel->selwhere("demo_lessiontwo", "sh", "=", "2", "id", "des");
        $data = DB::table("demo_lessiontwo")->where("sh","=","2")->where("type","=","3")->orderby("id","desc")->get();
        $db = DB::table("demo_lessiontwo")->where("sh","=","2")->where("type","=","3")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.three.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function create(Request $request) {
        $sel = new mol();
//        $data = $sel->selwhere("demo_lessiontwo", "sh", "=", "1", "px", "des");
        $data = DB::table("demo_lessiontwo")->where("sh","=","1")->where("type","=","3")->orderby("id","desc")->get();
        $db = DB::table("demo_lessiontwo")->where("sh","=","1")->where("type","=","3")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.three.ysh",["items"=>$data,"where"=>$where]);
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_lessiontwo", "id", "=", $id);
        return view("Admin.lession.three.form",["str"=>$str]);
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $str = $sel->updatee("demo_lessiontwo", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/lessionthree");
        }
    }
    
    public function lessionthreesh($id){
        $sel = new mol();
        $data["sh"] = 1;
        $str = $sel->updatee("demo_lessiontwo", "id", "=", $id, $data);
        if($str == 1) {
            return back();
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_lessiontwo", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function lessionthreesqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->sedelete("demo_lessiontwo", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    }
    
    public function lessionthreepx($id,$px) {
        $sel = new mol();
        $str["px"] = $px;
        $arr = $sel->updatee("demo_lessiontwo", "id", "=", $id, $str);
        if($arr == 1) {
            echo json_decode($id);
        }
    }
}
