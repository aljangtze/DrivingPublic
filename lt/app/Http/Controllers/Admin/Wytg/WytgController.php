<?php

namespace App\Http\Controllers\Admin\Wytg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class WytgController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_tg", "cl", "desc");
        $db = DB::table("demo_tg")->orderby("cl","desc");
        $where=[];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(20);
        return view("Admin.Wytg.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function destroy($id) {
        $sel = new mol();
        $data = $sel->selone("demo_tg", "id", "=", $id);
        
        if(!empty($data->pic)) {
            unlink("./pic/s_".$data->pic);
            unlink("./pic/".$data->pic);
        }
        
        $str = $sel->sedelete("demo_tg", "id", "=", $id);
        if($str == 1) {
            return back();
        }
        
    }
    
    public function  edit($id) {
       $sel = new mol();
       $str["cl"] = 1;
       $sel->updatee("demo_tg", "id", "=", $id, $str);
       return back();
    }
    
    public function wytgsqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->selone("demo_tg", "id", "=", $v);
            if(!empty($arr->pic)) {
                unlink("./pic/s_".$arr->pic);
                unlink("./pic/".$arr->pic);
            }
            $rows = $sel->sedelete("demo_tg", "id", "=", $v);
        }
        if($rows == 1) {
            return back();
        }
    }
    
}
