<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class JspOrderController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("dingdan2", "id", "desc");
        
        function zhinfo($arr) {
            $info = [];
            foreach($arr as $v) {
                $info[$v->id] = DB::table("demo_root")->where("nickname","=",$v->g)->first();
            }
            return $info;
        }
        
        $zhinfo = zhinfo($data);
        $allcount = DB::table("dingdan2")->count();
        $yfkcount = DB::table("dingdan2")->where("i","=","1")->count();
        $wfkcount = DB::table("dingdan2")->where("i","=","2")->count();
        $ywccount = DB::table("dingdan2")->where("i","=","3")->count();
        $yjdcount = DB::table("dingdan2")->where("i","=","4")->count();
        
        $db = DB::table("dingdan2")->orderby("id","desc");
        $where = [];
        if($request->input("a")) {
            $a = $request->input("a");
            $db->where("a","like","%{$a}%");
            $where["a"] = $a;
        }
        $data = $db->paginate(9);
        return view("Admin.Jsporder.tab",["items"=>$data,"allcount"=>$allcount,
            "yfkcount"=>$yfkcount,"wfkcount"=>$wfkcount,"ywccount"=>$ywccount,
            "yjdcount"=>$yjdcount,"zhinfo"=>$zhinfo]);
    }
    
    public function create() {
        
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $id = $request->input("id");
        $h = $request->input("i");
        $sel->sh("i", $h, $id, "dingdan2");
        $data = $request->except("_token","id","i");
        date_default_timezone_set('PRC'); 
        $data["fbdate"] = date("Y-m-d H:i:s");
        $arr = $sel->add("demo_znx", $data);
        if($arr == 1) {
            $a =  "ID为：".$id."处理成功";
            return back()->with("error",$a);
        }
    }
    
    public function edit($id) {
        
    }
    
    public function update($id,Request $request) {
         
    }
    
    public function destroy($id) {
        $sel = new mol();
        $arr = $sel->selone("dingdan2","id","=",$id);
            if(!empty($arr->fp)) {
                unlink("./fp/".$arr->fp);
                unlink("./fp/s_".$arr->fp);
            }
        $str = $sel->sedelete("dingdan2", "id", "=", $id);
        if($str == 1) {
             $a =  "ID为：".$id."删除成功";
            return back()->with("error",$a);
        }
    }
    
    public function jspordersqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->sedelete("dingdan2", "id", "=", $v);
        }
        if($arr == 1) {
            $a =  "ID为：".$id."删除成功";
            return back()->with("error",$a);
        }
    }

    public function jsfp($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $upims = $request->file('fp');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["fp"] = $data["mypf"];
        } else {
            $data['fp'] = $sel->uploads($upims,"./fp",$data["fp"],"50","50",$data["mypf"]);
            $arr = $sel->selone("dingdan2","id","=",$id);
            if(!empty($arr->fp)) {
                unlink("./fp/".$data["mypf"]);
                unlink("./fp/s_".$data["mypf"]);
            }
        }
        unset($data["mypf"]);
        $str = $sel->updatee("dingdan2","id","=",$id,$data);
            if($str == 1) {
                return back();
            }
    }
}
