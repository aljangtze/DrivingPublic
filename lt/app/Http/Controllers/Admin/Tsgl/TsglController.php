<?php

namespace App\Http\Controllers\Admin\Tsgl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class TsglController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_tsjb", "id", "desc");
        $db = DB::table("demo_tsjb")->orderby("id","desc");
        $where = [];
        if($request->has("name")) {
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        $data = $db->paginate(15);
        return view("Admin.Tsgl.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function destroy($id) {
        $sel = new mol();
        $data = $sel->selone("demo_tsjb", "id", "=", $id);
        if(!empty($data->fj)) {
            unlink("./fjss/s_".$data->fj);
            unlink("./fjss/".$data->fj);
        }
        $str = $sel->sedelete("demo_tsjb", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function tsglsqdel($id) {
        $sel = new mol();
        $data = explode(",", $id);
        foreach($data as $v){
            $arr = $sel->selone("demo_tsjb", "id", "=", $v);
            if(!empty($arr->fj)) {
                unlink("./fjss/s_".$arr->fj);
                unlink("./fjss/".$arr->fj);
            }
            $str = $sel->sedelete("demo_tsjb", "id", "=", $v);
        }
        if($str == 1) {
            return back();
        }
    }
    
}
