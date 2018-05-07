<?php

namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class BannerController extends Controller
{
    public function index(){
        $sel = new mol();
        $data = $sel->selall("demo_banner", "id", "desc");
        $db = DB::table("demo_banner")->orderby("id","desc");
        $data = $db->paginate(12);
        return view("Admin.Banner.tab",["items"=>$data]);
    }
    
    public function create() {
        return view("Admin.Banner.add");
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if(empty($data["type"])){
            echo "<script>alert('请选择投放位置!');history.back();</script>";
        }
        if(empty($data["qufen"])){
            echo "<script>alert('请选择投放位置!');history.back();</script>";
        }
        if(empty($data["dk"])){
            echo "<script>alert('请选择投放端口!');history.back();</script>";
        }
        
        $upims = $request->file('banner');
        if(empty($upims) || $upims == "" || $upims == null) {
            echo "<script>alert('请上传图片!');history.back();</script>";
        } else {
            $data['banner'] = $sel->uploads($upims,"./banner",$data["banner"],"50","50",$data["banner"]);
            $str = $sel->add("demo_banner", $data);
            if($str == 1) {
                return redirect("admin/banner");
            }
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $data = $sel->selone("demo_banner", "id", "=", $id);
        return view("Admin.Banner.edit",["str"=>$data]);
    }
    
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        
        $upims = $request->file('banner');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["banner"] = $data["mybanner"];
        } else {
            $data['banner'] = $sel->uploads($upims,"./banner",$data["banner"],"50","50",$data["banner"]);
            unlink("./banner/s_".$data["mybanner"]);
            unlink("./banner/".$data["mybanner"]);
        }
        
        unset($data["mybanner"]);
        $row = $sel->updatee("demo_banner", "id", "=", $id, $data);
        if($row == 1) {
            return redirect("admin/banner");
        }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $data = $sel->selone("demo_banner", "id", "=", $id);
        uniqid("./banner/".$data->banner);
        uniqid("./banner/s_".$data->banner);
        $str = $sel->sedelete("demo_banner", "id", "=", $id);
        if($str == 1) {
            return redirect("admin/banner");
        }
    }
    
    public function bannersqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach ($str as $v){
            $data = $sel->selone("demo_banner", "id", "=", $v);
            unlink("./banner/s_".$data->banner);
            unlink("./banner/".$data->banner);
            $arr = $sel->sedelete("demo_banner", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    }
}
