<?php

namespace App\Http\Controllers\Admin\Lession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class LessiononeController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lessionone", "sh", "=", "2", "px", "desc");
        $db = DB::table("demo_lessionone")->where("sh","2")->orderby("px","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.one.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function create(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lessionone", "sh", "=", "1", "px", "desc");
        $db = DB::table("demo_lessionone")->where("sh","1")->orderby("px","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.one.ysh",["items"=>$data,"where"=>$where]);
    }
    
    public function lessiononesh($id){
        $sel = new mol();
        $str["sh"] = 1;
        $arr = $sel->updatee("demo_lessionone", "id", "=", $id, $str);
        if($arr == 1){
            return back();
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_lessionone", "id", "=", $id);
        return view("Admin.lession.one.form",["str"=>$str]);
        
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_method","_token");
        $str = $sel->updatee("demo_lessionone", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/lessionone");
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_lessionone", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function lessiononesqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $items = $sel->sedelete("demo_lessionone", "id", "=", $id);
        }
        if($items == 1) {
            return back();
        }
    }
    
    public function lessiononepx($id,$px) {
        $sel = new mol();
        $data["px"] = $px;
        $str = $sel->updatee("demo_lessionone", "id", "=", $id, $data);
        if($str == 1) {
            echo json_encode($str);
        }
    }
    
}
