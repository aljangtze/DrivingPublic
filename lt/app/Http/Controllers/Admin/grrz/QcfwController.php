<?php

namespace App\Http\Controllers\Admin\grrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class QcfwController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "2", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","2")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","1")->count();
        return view("Admin.grrz.qcfw.tab",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
    
    public function edit($id,Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_grrz", "type", "=", "2", "sh", "desc");
        $db = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","1")->orderby("px","desc")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        $count = DB::table("demo_grrz")->where("type","=","2")->where("sh","=","2")->count();
        return view("Admin.grrz.qcfw.ysh",["items"=>$data,"where"=>$where,"count"=>$count]);
    }
    
    public function grqcedit($id) {
        $sel = new mol();
        $data = $sel->selone("demo_grrz", "id", "=", $id);
        return view("Admin.grrz.qcfw.edit",["str"=>$data]);
    }
    
    public function postgrqcedit($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        //店铺照片dppic
         $upimssas = $request->file('dppic');
        if(empty($upimssas) || $upimssas == "" || $upimssas == null) {
            $data["dppic"] = $data["mydppic"];
        } else {
            $data['dppic'] = $sel->uploads($upimssas,"./dppic",$data["dppic"],"50","50",$data["mydppic"]);
            unlink("./dppic/".$data["mydppic"]);
            unlink("./dppic/s_".$data["mydppic"]);
        }
        
        //身份证正面grsfzpicz
        $upims = $request->file('grsfzpicz');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["grsfzpicz"] = $data["mygrsfzpicz"];
        } else {
            $data['grsfzpicz'] = $sel->uploads($upims,"./grsfzpicz",$data["grsfzpicz"],"50","50",$data["mygrsfzpicz"]);
            unlink("./grsfzpicz/".$data["mygrsfzpicz"]);
            unlink("./grsfzpicz/s_".$data["mygrsfzpicz"]);
        }
        
        //身份证反面frsfzpicf
        $g = $request->file('grsfzpicf');
        if(empty($g) || $g == "" || $g == null) {
            $data["grsfzpicf"] = $data["mygrsfzpicf"];
        } else {
            $data['grsfzpicf'] = $sel->uploads($g,"./grsfzpicf",$data["grsfzpicf"],"50","50",$data["mygrsfzpicf"]);
            unlink("./grsfzpicf/".$data["mygrsfzpicf"]);
            unlink("./grsfzpicf/s_".$data["mygrsfzpicf"]);
        }
        
        unset($data["mygrsfzpicz"]);
        unset($data["mygrsfzpicf"]);
        unset($data["mydppic"]);
        
        $arr = $sel->updatee("demo_grrz", "id", "=", $id, $data);
        if($arr == 1) {
            $type=2;
           echo "<script>alert('修改成功!');history.back();</script>";
        }
    }
}
