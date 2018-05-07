<?php

namespace App\Http\Controllers\pho\cwsj;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class CwsjController extends Controller
{
    public function cwsj($nickname=null) {
        $sel = new mol();
        $data = $sel->selwhere("demo_sjrz", "nickname", "=", session()->get("Teluser"), "id", "desc");
        $dount = DB::table("demo_sjrz")->where("nickname","=",session()->get("Teluser"))->count();
        $arr = $sel->selwhere("demo_grrz", "nickname", "=", session()->get("Teluser"), "id", "desc");
        $acount = DB::table("demo_grrz")->where("nickname","=",session()->get("Teluser"))->count();
        return view("pho.cwsj.m_cwsj",["nickname"=>$nickname,"items"=>$data,"arr"=>$arr,"dcount"=>$dount,"acount"=>$acount]);
    }
    
    public function nextcwsj($nickname=null, Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["type"] == 1){
            return view("pho.cwsj.m_jljxrz",["nickname"=>$nickname]);
        }
        if($data["type"]== 2) {
            return view("pho.cwsj.m_jlWyrz",["nickname"=>$nickname]);
        }
    }
    
    /*
     * 企业入驻
     */
    public function tjcwsj($nickname=null,Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        $data["nickname"] = $nickname;
        
        /*
         * 驾培服务照片上传开始
         */
        
        //营业执照上传
        $upims = $request->file('yyzzpic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data['yyzzpic'] = "";
        } else {
            $data['yyzzpic'] = $sel->uploads($upims,"./sjrz",$data["yyzzpic"],"50","50",$data["yyzzpic"]);
        }
        
        //法人身份证上传frsfzpicz
        $g = $request->file('frsfzpicz');
        if(empty($g) || $g == "" || $g == null) {
             $data['frsfzpicz'] = "";
        } else {
            $data['frsfzpicz'] = $sel->uploads($g,"./frsfzpicz",$data["frsfzpicz"],"50","50",$data["frsfzpicz"]);
        }
        
        //法人身份证反面上传frsfzpicf
         $upimssas = $request->file('frsfzpicf');
        if(empty($upimssas) || $upimssas == "" || $upimssas == null) {
             $data['frsfzpicf'] = "";
        } else {
            $data['frsfzpicf'] = $sel->uploads($upimssas,"./frsfzpicf",$data["frsfzpicf"],"50","50",$data["frsfzpicf"]);
        }
        
        //教练车图片删除jlcpic
        $upimssass = $request->file('jlcpic');
        if(empty($upimssass) || $upimssass == "" || $upimssass == null) {
            $data["jlcpic"] = "";
        } else {
            $data['jlcpic'] = $sel->uploads($upimssass,"./jlcpic",$data["jlcpic"],"50","50",$data["jlcpic"]);
        }
        
        //训练场地1xlcdpicq
        $upimssassa = $request->file('xlcdpic1');
        if(empty($upimssassa) || $upimssassa == "" || $upimssassa == null) {
            $data["xlcdpic1"] = "";
        } else {
            $data['xlcdpic1'] = $sel->uploads($upimssassa,"./xlcdpic1",$data["xlcdpic1"],"50","50",$data["xlcdpic1"]);
        }
        
        //训练场地二xlcdpic2
        $upimssassas = $request->file('xlcdpic2');
        if(empty($upimssassas) || $upimssassas == "" || $upimssassas == null) {
            $data["xlcdpic2"] = "";
        } else {
            $data['xlcdpic2'] = $sel->uploads($upimssassas,"./xlcdpic2",$data["xlcdpic2"],"50","50",$data["xlcdpic2"]);
        }
        
        /*
         * 驾培服务照片上传结束
         */
        
        /*
         * 汽车服务与驾驶证服务图片上传开始
         */
        
        //店铺照片dpzpic
        $upimssassasa = $request->file('dpzpic');
        if(empty($upimssassasa) || $upimssassasa == "" || $upimssassasa == null) {
            $data["dpzpic"] = "";
        } else {
            $data['dpzpic'] = $sel->uploads($upimssassasa,"./dpzpic",$data["dpzpic"],"50","50",$data["dpzpic"]);
        }
        
        //个人身份证正面grsfzpicz
        $upimssassasas = $request->file('grsfzpicz');
        if(empty($upimssassasas) || $upimssassasas == "" || $upimssassasas == null) {
            $data["grsfzpicz"] = "";
        } else {
            $data['grsfzpicz'] = $sel->uploads($upimssassasas,"./grsfzpicz",$data["grsfzpicz"],"50","50",$data["grsfzpicz"]);
        }
        
        //个人身份证反面grsfzpicf
        $upimssassasasa = $request->file('grsfzpicf');
        if(empty($upimssassasasa) || $upimssassasasa == "" || $upimssassasasa == null) {
            $data["grsfzpicf"] = "";
        } else {
            $data['grsfzpicf'] = $sel->uploads($upimssassasasa,"./grsfzpicf",$data["grsfzpicf"],"50","50",$data["grsfzpicf"]);
        }
        
        /*
         * 汽车服务与驾驶证服务图片上传结束
         */
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $data["sh"] = 2;
        $str = $sel->add("demo_sjrz", $data);
        if($str == 1) {
            return redirect("jtel/jlcenter"."/".$nickname);
        }
    }
    
     /*
     * 个人入驻
     */
    
    public function tjgrrzinfo($nickname=null,Request $request){
        $sel = new mol();
        $data = $request->except("_token");
        $data["nickname"] = $nickname;
        
        /*
         * 驾培服务照片上传开始
         */
        
        //教练证或工作证
        $upims = $request->file('jlzpic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data['jlzpic'] = "";
        } else {
            $data['jlzpic'] = $sel->uploads($upims,"./jlzpic",$data["jlzpic"],"50","50",$data["jlzpic"]);
        }
        
        //sfzpicz身份证（正面）
        $g = $request->file('sfzpicz');
        if(empty($g) || $g == "" || $g == null) {
             $data['sfzpicz'] = "";
        } else {
            $data['sfzpicz'] = $sel->uploads($g,"./sfzpicz",$data["sfzpicz"],"50","50",$data["sfzpicz"]);
        }
        
        //驾驶证（正面）jszpicz
         $upimssas = $request->file('jszpicz');
        if(empty($upimssas) || $upimssas == "" || $upimssas == null) {
             $data['jszpicz'] = "";
        } else {
            $data['jszpicz'] = $sel->uploads($upimssas,"./jszpicz",$data["jszpicz"],"50","50",$data["jszpicz"]);
        }
        
        //教练车行驶证（正面）jlcxszpic
        $upimssass = $request->file('jlcxszpic');
        if(empty($upimssass) || $upimssass == "" || $upimssass == null) {
            $data["jlcxszpic"] = "";
        } else {
            $data['jlcxszpic'] = $sel->uploads($upimssass,"./jlcxszpic",$data["jlcxszpic"],"50","50",$data["jlcxszpic"]);
        }
        
        //教练车jlcpic
        $upimssassa = $request->file('jlcpic');
        if(empty($upimssassa) || $upimssassa == "" || $upimssassa == null) {
            $data["jlcpic"] = "";
        } else {
            $data['jlcpic'] = $sel->uploads($upimssassa,"./jlcpic",$data["jlcpic"],"50","50",$data["jlcpic"]);
        }
        
        //个人真实照片xlcdpic2
        $upimssassas = $request->file('grpic');
        if(empty($upimssassas) || $upimssassas == "" || $upimssassas == null) {
            $data["grpic"] = "";
        } else {
            $data['grpic'] = $sel->uploads($upimssassas,"./grpic",$data["grpic"],"50","50",$data["grpic"]);
        }
        
        /*
         * 驾培服务照片上传结束
         */
        
        /*
         * 汽车服务与驾驶证服务图片上传开始
         */
        
        //店铺照片dppic
        $upimssassasa = $request->file('dppic');
        if(empty($upimssassasa) || $upimssassasa == "" || $upimssassasa == null) {
            $data["dppic"] = "";
        } else {
            $data['dppic'] = $sel->uploads($upimssassasa,"./dppic",$data["dppic"],"50","50",$data["dppic"]);
        }
        
        //个人身份证正面grsfzpicz
        $upimssassasas = $request->file('grsfzpicz');
        if(empty($upimssassasas) || $upimssassasas == "" || $upimssassasas == null) {
            $data["grsfzpicz"] = "";
        } else {
            $data['grsfzpicz'] = $sel->uploads($upimssassasas,"./grsfzpicz",$data["grsfzpicz"],"50","50",$data["grsfzpicz"]);
        }
        
        //个人身份证反面grsfzpicf
        $upimssassasasa = $request->file('grsfzpicf');
        if(empty($upimssassasasa) || $upimssassasasa == "" || $upimssassasasa == null) {
            $data["grsfzpicf"] = "";
        } else {
            $data['grsfzpicf'] = $sel->uploads($upimssassasasa,"./grsfzpicf",$data["grsfzpicf"],"50","50",$data["grsfzpicf"]);
        }
        
        /*
         * 汽车服务与驾驶证服务图片上传结束
         */
        
        date_default_timezone_set('PRC');
        $data["addtime"] = date("Y-m-d H:i:s");
        $data["sh"] = 2;
        
        $str = $sel->add("demo_grrz", $data);
        if($str == 1) {
            return redirect("jtel/jlcenter"."/".$nickname);
        }
        
    }
    
}
