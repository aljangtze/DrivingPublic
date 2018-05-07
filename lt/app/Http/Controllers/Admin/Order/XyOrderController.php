<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class XyOrderController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = DB::table("demo_xq_order")->orderby("id","=","desc")->get();
        
        function zhinfo($arr) {
            $info = [];
            foreach($arr as $v) {
                $info[$v->id] = DB::table("demo_root")->where("nickname","=",$v->nickname)->first();
            }
            return $info;
        }
        
        $zhinfo = zhinfo($data);
        
        $db = DB::table("demo_xq_order")->orderby("id","=","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.xqOrder.tab",["items"=>$data,"where"=>$where,"zhinfo"=>$zhinfo]);
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_xq_order", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function xqordersqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->sedelete("demo_xq_order", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    }
    
}
