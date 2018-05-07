<?php

namespace App\Http\Controllers\Admin\Zxjl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ZxjlController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = DB::table("demo_grrz")->where("sh","=","2")->where("qf","=","1")->orderby("px","desc")->orderby("id","desc")->get();
        $db = DB::table("demo_grrz")->where("sh","=","2")->where("qf","=","1")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=","%{$name}%");
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        $count =DB::table("demo_grrz")->where("sh","=","1")->where("qf","=","1")->count();
        return view("Admin.Zxjl.tab",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
    
    public function zxjlysh(Request $request){
        $sel = new mol();
        $data = DB::table("demo_grrz")->where("sh","=","1")->where("qf","=","1")->orderby("px","desc")->orderby("id","desc")->get();
        $db = DB::table("demo_grrz")->where("sh","=","1")->where("qf","=","1")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=","%{$name}%");
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        $count =DB::table("demo_grrz")->where("sh","=","2")->where("qf","=","1")->count();
        return view("Admin.Zxjl.ysh",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
    
    public function zxjlsh($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $str = $sel->sh("sh", $data["sh"], $id, "demo_grrz");
        $str = $sel->sh("sha", $data["sha"], $id, "demo_grrz");
        unset($data["sh"]);
        date_default_timezone_set('PRC'); 
        $data["fbdate"] = date("Y-m_d H:i:s");
        $rows["shdate"]=date("Y-m-d H:i:s");
        $sel->updatee("demo_grrz", "id", "=", $id,$rows);
        $arr = $sel->add("demo_znx", $data);
        if($arr == 1) {
            return back();
        }
    }
    
    public function create() {
        
    }
    
    public function store(Request $request) {
        
    }
    
    public function edit($id,$type) {
         $sel = new mol();
        if($type == 3  || $type == 2) {
            $data = $sel->selone("demo_grrz", "id", "=", $id);
        }
        
        if($type == 1) {
            $sel = new mol();
            $data = $sel->selone("demo_grrz", "id", "=", $id);
            return view("Admin.grrz.edit",["str"=>$data]);
        }
        return view("Admin.grrz.qcfw.edit",["str"=>$data]);
    }
    
    public function update($id,Request $request) {
        
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_grrz", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function zxjlsqdl($id) {
        $sel = new mol();
        $data = explode(",", $id);
        foreach($data as $v) {
            $str = $sel->sedelete("demo_grrz", "id", "=", $v);
        }
        return back();
    }
    
    public function zxjlpx($id,$px) {
        $sel = new mol();
        $data["px"] = $px;
        $data = $sel->updatee("demo_grrz", "id", "=", $id, $data);
        echo json_encode($data);
    }
}
