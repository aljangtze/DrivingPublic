<?php

namespace App\Http\Controllers\Admin\Xyxqgl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class XyxqController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_xqfb", "id", "desc");
        $db = DB::table("demo_xqfb")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where["name"]=$name;
        }
        $data = $db->paginate(15);
        return view("Admin.Xyxqgl.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_xqfb", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function xyxqglsqdel($id){
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->sedelete("demo_xqfb", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    } 
    
}
