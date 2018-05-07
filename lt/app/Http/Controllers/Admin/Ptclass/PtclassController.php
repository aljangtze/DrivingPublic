<?php

namespace App\Http\Controllers\Admin\Ptclass;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class PtclassController extends Controller
{
    public function index(Request $request) {
       $sel = new mol();
       $data = $sel->selall("demo_addclasspt", "px", "desc");
       $db = DB::table("demo_addclasspt")->where("sh","=","2")->where("classtype","=","2")->orderby("px","desc");
       $where = [];
       if($request->has("name")) {
           $name = $request->input("name");
           $db->where("name","=",$name);
           $where["name"] = $name;
       }
        $data = $db->paginate(15);
      return view("Admin.ptclass.tab",["items"=>$data,"where"=>$where]);
   }
   
   public function ptclass(Request $request){
       $sel = new mol();
       $data = $sel->selall("demo_addclasspt", "px", "desc");
       $db = DB::table("demo_addclasspt")->where("sh","=","1")->where("classtype","=","2")->orderby("px","desc");
       $where = [];
       if($request->has("name")) {
           $name = $request->input("name");
           $db->where("name","=",$name);
           $where["name"] = $name;
       }
        $data = $db->paginate(15);
      return view("Admin.ptclass.ysh",["items"=>$data,"where"=>$where]);
   }
   
   public function edit($id) {
       $sel = new mol();
       $str = $sel->selone("demo_addclasspt", "id", "=", $id);
       return view("Admin.ptclass.edit",["str"=>$str]);
   }
   
   public function update($id,Request $request){
       $sel = new mol();
       $data = $request->except("_token","_method");
       $str = $sel->updatee("demo_addclasspt", "id", "=", $id, $data);
       if($str == 1) {
           return redirect("admin/ptclass");
       }
   }
   
   public function ptclasssh($id) {
       $sel = new mol();
       $data["sh"] = 1;
       $str = $sel->updatee("demo_addclasspt", "id", "=", $id, $data);
       if($str == 1) {
           return back();
       }
   }
   
   public function destroy($id) {
       $sel = new mol();
       $str = $sel->sedelete("demo_addclasspt", "id", "=", $id);
       if($str == 1) {
           return back();
       }
   }
   
   public function ptclasssqdel($id) {
       $sel = new mol();
       $str = explode(",", $id);
       foreach($str as $v){
           $arr = $sel->sedelete("demo_addclasspt", "id", "=", $v);
       }
       if($arr == 1) {
           return back();
       }
   }
   
   public function px($id,$px) {
       $sel = new mol();
       $str["px"] = $px;
       $arr = $sel->updatee("demo_addclasspt", "id", "=", $id, $str);
       echo json_encode($arr);
   }
}
