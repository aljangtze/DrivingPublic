<?php

namespace App\Http\Controllers\Admin\grrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class JrzfwController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "3", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","2")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","1")->count();
        return view("Admin.grrz.jrzfw.tab",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
    
    public function edit($id,Request $request){
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "3", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","1")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type","=","3")->where("sh","=","2")->count();
        return view("Admin.grrz.jrzfw.ysh",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
}
