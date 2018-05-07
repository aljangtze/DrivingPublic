<?php

namespace App\Http\Controllers\Admin\lession;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class LessionfourController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lessionfour", "sh", "=", "2", "px", "desc");
        $db = DB::table("demo_lessionfour")->where("sh","2")->orderby("px","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.four.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function create(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_lessionfour", "sh", "=", "1", "px", "desc");
        $db = DB::table("demo_lessionfour")->where("sh","1")->orderby("px","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.lession.four.ysh",["items"=>$data,"where"=>$where]);
    }
    
    public function lessionfoursh($id){
        $sel = new mol();
        $str["sh"] = 1;
        $arr = $sel->updatee("demo_lessionfour", "id", "=", $id, $str);
        if($arr == 1){
            return back();
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_lessionfour", "id", "=", $id);
        return view("Admin.lession.four.form",["str"=>$str]);
        
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_method","_token");
        $str = $sel->updatee("demo_lessionfour", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/lessionfour");
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_lessionfour", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function lessionfoursqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $items = $sel->sedelete("demo_lessionfour", "id", "=", $id);
        }
        if($items == 1) {
            return back();
        }
    }
    
    public function lessionfourpx($id,$px) {
        $sel = new mol();
        $data["px"] = $px;
        $str = $sel->updatee("demo_lessionfour", "id", "=", $id, $data);
        if($str == 1) {
            echo json_encode($str);
        }
    }
}
