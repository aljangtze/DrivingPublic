<?php

namespace App\Http\Controllers\Admin\sjrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class JszfwController extends Controller
{
     public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_sjrz", "type", "=", "3", "sh", "desc");
        $db = DB::table("demo_sjrz")->where("type","=","3")->orderby("sh","desc");
        $where = [];;
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        
        if($request->has("fwdq")) {
            $fwdq = $request->input("fwdq");
            $db->where("fwdq","like","%{$fwdq}%");
            $where["fwdq"] = $fwdq;
        }
        
        $data = $db->paginate(20);
         return view("Admin.sjrz.jrzfw.jrzfw",["items"=>$data,"where"=>$where]);
    }
}
