<?php

namespace App\Http\Controllers\Admin\sjrz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class SjrzController extends Controller
{
    public function jpfw($type=null, Request $request){
        $sel = new mol();
        $data = $sel->selwhere("demo_sjrz", "type", "=", "1", "sh", "desc");
        $db = DB::table("demo_sjrz")->where("type","=","1")->orderby("sh","desc");
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","=",$name);
            $where["name"] = $name;
        }
        if($request->has("jxname")){
            $jxname = $request->input("jxname");
            $db->where("jxname","=",$jxname);
            $where["jxname"] = $jxname;
        }
        
        $data = $db->paginate(20);
        
        return view("Admin.sjrz.ywjb",["items"=>$data,"where"=>$where]);
    }
    
    public function sh($id){
        $sel = new mol();
        $items["sh"] = 1;
        $str = $sel->selone("demo_sjrz", "id", "=", $id);
        $arr["bianhao"] = date("ymdhis").rand(1, 1000);
        $arr["name"] = $str->name;
        $arr["sex"] = $str->sex;
        $arr["tel"] = $str->tel;
        date_default_timezone_set('PRC');
        $arr["addtime"] = date("Y-m-d H:i:s");
        $arr["nickname"] = $str->tel;
        $arr["pass"] = $str->tel."lt";
        $arr["type"] = 2;
        if(!empty($str->jxaddress)) {
            $arr["address"] = $str->jxaddress;
        } else {
            $arr["address"] = $str->address;
        }
        $sel->add("demo_user", $arr);
        $items["bianhao"] = $arr["bianhao"];
        $sel->updatee("demo_sjrz", "id", "=", $id, $items);
        echo "<script>alert('"."审核成功，已为驾校生成独立的后台账号".$arr["nickname"].",密码：".$arr["pass"]."');history.back()</script>";
        return back();
    }
    
    public function del($id) {
        $sel = new mol();
        $arr = $sel->selone("demo_sjrz", "id", "=", $id);
        $sel->sedelete("demo_user", "bianhao", "=", $arr->bianhao);
        $sel->sedelete("demo_sjrz", "id", "=", $id);
        return back();
    }
    
    public function jpqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $items = $sel->selone("demo_sjrz", "id", "=", $v);
            $array = $sel->selone("demo_user", "bianhao", "=", $items->bianhao);
            if($array != null){
                $sel->sedelete("demo_user", "bianhao", "=", $array->bianhao);
            }
            $arr = $sel->sedelete("demo_sjrz", "id", "=", $v);
        }
        if($arr == 1) {
            return back();
        }
    }
    
    public function jpedit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_sjrz","id","=",$id);
        return view("Admin.sjrz.edit",["items"=>$str]);
    }
    
    public function tjjpedit($id,Request $request){
        $sel = new mol();
        $data = $request->except("_method","_token");
        
        //营业执照上传
        $upims = $request->file('yyzzpic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["yyzzpic"] = $data["myyyzzpic"];
        } else {
            $data['yyzzpic'] = $sel->uploads($upims,"./sjrz",$data["yyzzpic"],"50","50",$data["myyyzzpic"]);
            unlink("./sjrz/".$data["myyyzzpic"]);
            unlink("./sjrz/s_".$data["myyyzzpic"]);
        }
        
        //法人身份证上传frsfzpicz
        $g = $request->file('frsfzpicz');
        if(empty($g) || $g == "" || $g == null) {
            $data["frsfzpicz"] = $data["myfrsfzpicz"];
        } else {
            $data['frsfzpicz'] = $sel->uploads($g,"./frsfzpicz",$data["frsfzpicz"],"50","50",$data["myfrsfzpicz"]);
            unlink("./frsfzpicz/".$data["myfrsfzpicz"]);
            unlink("./frsfzpicz/s_".$data["myfrsfzpicz"]);
        }
        
        //法人身份证反面上传frsfzpicf
         $upimssas = $request->file('frsfzpicf');
        if(empty($upimssas) || $upimssas == "" || $upimssas == null) {
            $data["frsfzpicf"] = $data["myfrsfzpicf"];
        } else {
            $data['frsfzpicf'] = $sel->uploads($upimssas,"./frsfzpicf",$data["frsfzpicf"],"50","50",$data["myfrsfzpicf"]);
            unlink("./frsfzpicf/".$data["myfrsfzpicf"]);
            unlink("./frsfzpicf/s_".$data["myfrsfzpicf"]);
        }
        
        //教练车图片删除jlcpic
        $upimssass = $request->file('jlcpic');
        if(empty($upimssass) || $upimssass == "" || $upimssass == null) {
            $data["jlcpic"] = $data["myjlcpic"];
        } else {
            $data['jlcpic'] = $sel->uploads($upimssass,"./jlcpic",$data["jlcpic"],"50","50",$data["myjlcpic"]);
            unlink("./jlcpic/".$data["myjlcpic"]);
            unlink("./jlcpic/s_".$data["myjlcpic"]);
        }
        
        //训练场地1xlcdpicq
        $upimssassa = $request->file('xlcdpic1');
        if(empty($upimssassa) || $upimssassa == "" || $upimssassa == null) {
            $data["xlcdpic1"] = $data["myxlcdpic1"];
        } else {
            $data['xlcdpic1'] = $sel->uploads($upimssassa,"./xlcdpic1",$data["xlcdpic1"],"50","50",$data["myxlcdpic1"]);
            unlink("./xlcdpic1/".$data["myxlcdpic1"]);
            unlink("./xlcdpic1/s_".$data["myxlcdpic1"]);
        }
        
        //训练场地二xlcdpic2
        $upimssassas = $request->file('xlcdpic2');
        if(empty($upimssassas) || $upimssassas == "" || $upimssassas == null) {
            $data["xlcdpic2"] = $data["myxlcdpic2"];
        } else {
            $data['xlcdpic2'] = $sel->uploads($upimssassas,"./xlcdpic2",$data["xlcdpic2"],"50","50",$data["myxlcdpic2"]);
            unlink("./xlcdpic2/".$data["myxlcdpic2"]);
            unlink("./xlcdpic2/s_".$data["myxlcdpic2"]);
        }
        unset($data["myyyzzpic"]);
        unset($data["myfrsfzpicz"]);
        unset($data["myfrsfzpicf"]);
        unset($data["myjlcpic"]);
        unset($data["myxlcdpic1"]);
        unset($data["myxlcdpic2"]);
        $arr = $sel->updatee("demo_sjrz", "id", "=", $id, $data);
        if($arr == 1) {
            $type=1;
            return redirect("admin/jpfw"."/".$type);
        }
    }
    
    public function jpform($id) {
        $sel = new mol();
        $data = $sel->selone("demo_sjrz", "id", "=", $id);
        return view("Admin.sjrz.form",["str"=>$data]);
    }
    
    public function jpformsave($id,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $upims = $request->file('jlcpic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["jlcpid"] = $data["mypic"];
        } else {
            $data['jlcpic'] = $sel->uploads($upims,"./jlcpic",$data["jlcpic"],"50","50",$data["jlcpic"]);
            $arr = $sel->selone("demo_sjrz", "id", "=", $id);
            if(!empty($arr->jlcpic)) {
                unlink("./jlcpic/".$data["mypic"]);
                unlink("./jlcpic/s_".$data["mypic"]);
            }
            unset($data["mypic"]);
            $str = $sel->updatee("demo_sjrz", "id", "=", $id, $data);
            if($str == 1) {
                echo "<script>alert('设置成功!');history.back();</script>";
            }
        }
    }
    
}
