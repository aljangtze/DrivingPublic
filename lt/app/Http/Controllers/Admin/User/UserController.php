<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class UserController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_user", "id", "desc");
        $db = DB::table("demo_user")->orderby("id","desc");
        $where = "";
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        return view("Admin.User.usertab",["items"=>$data,"where"=>$where]);
    }
    
    public function create() {
        return view("Admin.User.useradd");
    }
    
    public function store(Request $request){
        $sel = new mol();
        $items = $request->except("_token");
        $data = $sel->add("demo_user", $items);
        if($data == 1) {
            return redirect("admin/user");
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $data = $sel->selone("demo_user", "id", "=", $id);
        return view("Admin.User.edit",["str"=>$data]);
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $str = $sel->updatee("demo_user", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/user");
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_user", "id", "=", $id);
        if($str == 1){
            return back();
        }
    }
    
    public function sqdel($id) {
        $sel = new mol();
        $data = explode(",", $id);
        foreach($data as $v) {
            $items = $sel->sedelete("demo_user", "id", "=", $v);
        }
        if($items == 1) {
            return back();
        }
    }
    
}
