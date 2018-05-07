<?php

namespace App\Http\Controllers\Admin\Zzfbgl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ZzfbController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_zzfb", "px", "desc");
        $db = DB::table("demo_zzfb")->orderby("px","desc");
        $where = [];
        if($request->has("jxname")) {
            $jxname = $request->input("jxname");
            $db->where("jxname","like","%{$jxname}%");
            $where = [];
        }
        $data = $db->paginate(12);
        return view("Admin.Zzfbgl.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function create() {
        return view("Admin.Zzfbgl.form");
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["jxname"] == null) {
            echo "<script>alert('请输入驾校名称!');history.back();</script>"; 
        }
        if($data["name"] == null) {
            echo "<script>alert('请输负责人名称!');history.back();</script>"; 
        }
        if($data["address"] == null) {
            echo "<script>alert('请输入驾校所在位置!');history.back();</script>"; 
        }
        if($data["content"] == null) {
            echo "<script>alert('请输入驾校简介!');history.back();</script>"; 
        }
        if($data["tel"] == null) {
            echo "<script>alert('请输入联系电话!');history.back();</script>"; 
        }
        
        date_default_timezone_set('PRC'); 
        $data["bh"] = date('ymd').rand(0, 1000);
        $data["fbdate"] = date("Y-m-d H:i:s");
        
        $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            echo "<script>alert('请上传图片!');history.back();</script>";
        } else {
            $data['pic'] = $sel->uploads($upims,"./pic",$data["pic"],"50","50",$data["pic"]);
        }
        
        $str = $sel->add("demo_zzfb", $data);
        if($str == 1) {
            return redirect("admin/zzfbgl");
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_zzfb", "id", "=", $id);
        return view("Admin.Zzfbgl.edit",["str"=>$str]);
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["pic"] = $data["mypic"];
        } else {
            $data['pic'] = $sel->uploads($upims,"./pic",$data["pic"],"50","50",$data["mypic"]);
            unlink("./pic/".$data["mypic"]);
            unlink("./pic/s_".$data["mypic"]);
        }
        unset($data["mypic"]);
        
        $str = $sel->updatee("demo_zzfb", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/zzfbgl");
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->selone("demo_zzfb", "id", "=", $id);
        if(!empty($str->pic)) {
            unlink("./pic/".$str->pic);
            unlink("./pic/s_".$str->pic);
        }
        $arr = $sel->sedelete("demo_zzfb", "id", "=", $id);
        return back();
    }
    
    public function zzfbglsqdel($id) {
        $sel = new mol();
        $str = explode(",",$id);
        foreach($str as $v) {
            $arr = $sel->selone("demo_zzfb", "id", "=", $v);
            if(!empty($arr->pic)) {
                unlink("./pic/".$arr->pic);
                unlink("./pic/s_".$arr->pic);
            }
            $arrs = $sel->sedelete("demo_zzfb", "id", "=", $v);
        }
        if($arrs == 1) {
            return back();
        }
    }
    
    public function zzfbglpx($id,$px) {
        $sel = new mol();
        $data["px"] = $px;
        $str = $sel->updatee("demo_zzfb", "id", "=", $id, $data);
        echo json_decode($px);
    }
    
    public function zzfbdetail($id) {
        $sel = new mol();
        $data = $sel->selone("demo_zzfb", "id", "=", $id);
        return view("Admin.Zzfbgl.detail",["str"=>$data]);
    }
}
