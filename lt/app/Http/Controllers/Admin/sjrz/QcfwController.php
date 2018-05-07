<?php

namespace App\Http\Controllers\Admin\sjrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class QcfwController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selwhere("demo_sjrz", "type", "=", "2", "sh", "desc");
        $db = DB::table("demo_sjrz")->where("type","=","2")->orderby("sh","desc");
        $where = [];
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
         return view("Admin.sjrz.qcfw.qcfw",["items"=>$data,"where"=>$where]);
    }
    
    public function qcfwedit($id) {
        $sel = new mol();
        $data = $sel->selone("demo_sjrz", "id", "=", $id);
        return view("Admin.sjrz.qcfw.edit",["items"=>$data]);
    }
    
    public function postedit($id,Request $request) {
       $sel = new mol();
       $data = $request->except("_token");
       
       
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
        
        //店铺照片dpzpic
         $upimssas = $request->file('dpzpic');
        if(empty($upimssas) || $upimssas == "" || $upimssas == null) {
            $data["dpzpic"] = $data["mydpzpic"];
        } else {
            $data['dpzpic'] = $sel->uploads($upimssas,"./dpzpic",$data["dpzpic"],"50","50",$data["mydpzpic"]);
            unlink("./dpzpic/".$data["mydpzpic"]);
            unlink("./dpzpic/s_".$data["mydpzpic"]);
        }
        
        unset($data["mygrsfzpicz"]);
        unset($data["mygrsfzpicf"]);
        unset($data["mydpzpic"]);
        
        $arr = $sel->updatee("demo_sjrz", "id", "=", $id, $data);
        if($arr == 1) {
            $type=2;
           echo "<script>alert('修改成功!');history.back();</script>";
        }
       
    }
    
}
