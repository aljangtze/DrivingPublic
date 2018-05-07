<?php

namespace App\Http\Controllers\Admin\Zzfbclassgl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ZzfclassbController extends Controller
{
    public function home($id,$bh=null) {
        $sel = new mol();
        $data = $sel->selwhere("demo_zzfbclass", "jid", "=", $id, "id", "desc");
        $str = $sel->selone("demo_sjrz", "bianhao", "=", $bh);
        return view("Admin.Zzfbclass.tab",["items"=>$data,"bh"=>$bh,"str"=>$str]);
    }
    
    public function create() {
        
    }
    
    public function qfclass(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["price"] == null) {
            echo "<script>alert('请输入价格!');history.back();</script>"; 
        }
        if($data["info"] == null) {
            echo "<script>alert('请输入班型介绍!');history.back();</script>"; 
        }
        if($data["fyinfo"] == null) {
            echo "<script>alert('请输入费用明细!');history.back();</script>"; 
        }
        date_default_timezone_set('PRC'); 
        $data["fbdate"] = date("Y-m-d H:i:s");
        $str = $sel->add("demo_zzfbclass", $data);
        if($str == 1) {
            return redirect("admin/zzfbclassindex"."/".$data["jid"]."/".$data["bh"]);
        }
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["price"] == null) {
            echo "<script>alert('请输入价格!');history.back();</script>"; 
        }
        if($data["info"] == null) {
            echo "<script>alert('请输入班型介绍!');history.back();</script>"; 
        }
        if($data["fyinfo"] == null) {
            echo "<script>alert('请输入费用明细!');history.back();</script>"; 
        }
        date_default_timezone_set('PRC'); 
        $data["fbdate"] = date("Y-m-d H:i:s");
        $str = $sel->add("demo_zzfbclass", $data);
        if($str == 1) {
            return redirect("admin/zzfbclassindex"."/".$data["jid"]);
        }
    }
    
    public function update($id, Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $str = $sel->updatee("demo_zzfbclass", "id", "=", $id,$data);
        if($str == 1) {
            return redirect("admin/zzfbclassindex"."/".$data["jid"]);
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->sedelete("demo_zzfbclass", "id", "=", $id);
        if($str == 1) {
            return back();
        }
    }
    
    public function zzfbclasssqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->sedelete("demo_zzfbclass", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    }
}
