<?php

namespace App\Http\Controllers\Admin\Adver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class AdverController extends Controller
{
    public function index() {
        $sel = new mol();
        $str = $sel->selone("demo_adver", "id", "=", "2");
        return view("Admin.Adver.adver",["str"=>$str]);
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        
        $upims = $request->file('advers');
        if(empty($upims) || $upims == "" || $upims == null) {
            echo "<script>alert('请上传图片!');history.back();</script>";
        } else {
            $data['advers'] = $sel->uploads($upims,"./advers",$data["advers"],"50","50",$data["advers"]);
        }
        date_default_timezone_set('PRC');
        $data["updatedate"] = date("Y-m-d H:i:s");
        $str = $sel->add("demo_adver", $data);
        if($str == 1) {
            return back();
        }
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token","_method");
        $upims = $request->file('advers');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["advers"] = $data["mypic"];
        } else {
            $data['advers'] = $sel->uploads($upims,"./advers",$data["advers"],"50","50",$data["mypic"]);
            $str = $sel->selone("demo_adver", "id", "=", $id);
            if(!empty($str->advers)) {
                unlink("./advers/".$data["mypic"]);
                unlink("./advers/s_".$data["mypic"]);
            }
        }
        unset($data["mypic"]);
        $arr = $sel->updatee("demo_adver", "id", "=", $id, $data);
        if($arr == 1) {
            return back();
        }
    }
}

