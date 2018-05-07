<?php

namespace App\Http\Controllers\Admin\Vipclass;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class VipclassController extends Controller
{
   public function index(Request $request) {
       $sel = new mol();
       $data = $sel->selall("demo_addclassvip", "px", "desc");
       $db = DB::table("demo_addclassVip")->where("sh","=","2")->where("classtype","=","1")->orderby("px","desc");
       $where = [];
       if($request->has("name")) {
           $name = $request->input("name");
           $db->where("name","=",$name);
           $where["name"] = $name;
       }
        $data = $db->paginate(15);
      return view("Admin.vipclass.tab",["items"=>$data,"where"=>$where]);
   }
   
   public function vipclassyessh(Request $request){
       $sel = new mol();
       $data = $sel->selall("demo_addclassvip", "px", "desc");
       $db = DB::table("demo_addclassVip")->where("sh","=","1")->where("classtype","=","1")->orderby("px","desc");
       $where = [];
       if($request->has("name")) {
           $name = $request->input("name");
           $db->where("name","=",$name);
           $where["name"] = $name;
       }
        $data = $db->paginate(15);
      return view("Admin.vipclass.ysh",["items"=>$data,"where"=>$where]);
   }
   
   public function edit($id) {
       $sel = new mol();
       $str = $sel->selone("demo_addclassvip", "id", "=", $id);
       return view("Admin.Vipclass.edit",["str"=>$str]);
   }
   
   public function update($id,Request $request){
       $sel = new mol();
       $data = $request->except("_token","_method");
       $str = $sel->updatee("demo_addclassvip", "id", "=", $id, $data);
       if($str == 1) {
           return redirect("admin/vipclass");
       }
   }
   
   public function vipclasssh($id) {
       $sel = new mol();
       $data["sh"] = 1;
       $str = $sel->updatee("demo_addclassvip", "id", "=", $id, $data);
       if($str == 1) {
           return back();
       }
   }
   
   public function destroy($id) {
       $sel = new mol();
       $str = $sel->sedelete("demo_addclassvip", "id", "=", $id);
       if($str == 1) {
           return back();
       }
   }
   
   public function vipclasssqdel($id) {
       $sel = new mol();
       $str = explode(",", $id);
       foreach($str as $v){
           $arr = $sel->sedelete("demo_addclassvip", "id", "=", $v);
       }
       if($arr == 1) {
           return back();
       }
   }
   
   public function px($id,$px) {
       $sel = new mol();
       $str["px"] = $px;
       $arr = $sel->updatee("demo_addclassvip", "id", "=", $id, $str);
       echo json_encode($arr);
   }
}
