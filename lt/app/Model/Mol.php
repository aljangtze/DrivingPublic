<?php
namespace App\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Org\Image;

class mol{

	//保存传过的数据信息
	function add($tb_name,$data) {
		$data = DB::table("{$tb_name}")->insert($data);
		if($data) {
			$a = 1;
			return $a;
		}
	}
	
	function selall($tb_name,$pai,$xu) {
		$data = DB::table("{$tb_name}")->orderBy("{$pai}","{$xu}")->get();
		return $data;
	}

	/*
	$ims:接受图片的对象
	$upaddress:上图保存的路径
	$imsname:上传图片的名字
	$imgwidth:缩率图的width
	$imgheight:缩率图的高
	$yname:原图名的
	*/
	function uploads($ims,$upaddress,$imsname,$imgwidth,$imgheight,$yname){
		if($ims == null) {
           echo "请上传图片";
        } else {
             if($ims->isValid("{$imsname}")) {
            $ext = $ims->getClientOriginalExtension();
            $file_name = date("YmdHis").rand($imgwidth,$imgheight).".".$ext;
            $ims->move("{$upaddress}",$file_name);

            $img = new Image();
            $img->open("{$upaddress}/".$file_name)
                ->thumb(106,126)
                ->save("{$upaddress}/s_".$file_name);
                unset($yname);
            return $data["tb_image"] = $file_name;
            }
        }
	}

	/*
	$tb_name:表名
	$field:字段
	$condition:查询约束 = like
	$parameter: 查询条件
	*/
	function selwhere($tb_name,$field,$condition,$parameter,$pai,$xu){
		$data = DB::table("{$tb_name}")->where("{$field}","{$condition}","{$parameter}")->orderby("{$pai}","{$xu}")->get();
		return $data;
	}

	/*
	$tb_name:表名
	$field:字段
	$condition:查询约束 = like
	$parameter: 查询条件
	*/
	function selone($tb_name,$field,$condition,$parameter) {
		$data = DB::table("{$tb_name}")->where("{$field}","{$condition}","{$parameter}")->first();
		return $data;
	}

	/*
	$tb_name:表名
	$field:字段
	$condition:查询约束 = like
	$parameter: 查询条件
	*/
	function updatee($tb_name,$field,$condition,$parameter,$items){
		$data = DB::table("{$tb_name}")->where("{$field}","{$condition}","{$parameter}")->update($items);
		$a = 1;
		return $a;
	}

	/*
	$tb_name:表名
	$field:字段
	$condition:查询约束 = like
	$parameter: 查询条件
	*/
	function sedelete($tbname,$field,$condition,$parameter) {
		$data = DB::table("{$tbname}")->where("{$field}","{$condition}","{$parameter}")->delete();
		$a = 1;
		return $a;
	}
        
        /*
         * 审核
         */
        
        function sh($sh,$shvalue,$id,$tbname) {
            $data[$sh] = $shvalue;
            $arr = DB::table("{$tbname}")->where("id","=",$id)->update($data);
            $a = 1;
            return $a;
        }
        
        /*
         * 统计
         */
        function count($tbname,$zd,$fh,$zdval){
            $arr = DB::table("{$tbname}")->where("{$zd}","{$fh}","{$zdval}")->count();
            return $arr;
        }
        
        /*
         * 统计所有
         */
        
        function allcount($tbname){
            $arr = DB::table("{$tbname}")->count();
            return $arr;
        }
        
        /*
         * 分页初始化
         */
        public function db($tbname,$zd,$fh,$zdval,$pxzd,$pxval) {
            $arr = DB::table("{$tbname}")->where("{$zd}","{$fh}","{$zdval}")->orderby("{$pxzd}","{$pxval}");
            return $arr;
        }
        
        /*
         * 上一篇
         */
        public function up($tbname,$id,$zd,$zdval) {
            $up = DB::table("{$tbname}")->where("{$zd}","=","{$zdval}")->where("id","<",$id)->orderby("id","desc")->limit("1")->first();
            return $up;
        }
        
        /*
         * 下一篇
         */
        public function down($tbname,$id,$zd,$zdval) {
            $down = DB::table("{$tbname}")->where("{$zd}","=","{$zdval}")->where("id",">",$id)->orderby("id","desc")->limit("1")->first();
            return $down;
        }
        
        //yzm验证码
        public function yzm($pcode) {
            $flag = 0; 
            $params='';
            $verify = rand(123456, 999999);
            $mobile=$pcode;
            $argv = array( 
                    'name'=>'18988484593', 
                    'pwd'=>'932255B35D3A7B216C4F90E08B03',    
                    'content'=>'您本次短信验证码为：'.$verify.'，请勿将验证码提供给他人。',   
                    'mobile'=>$mobile,  
                    'stime'=>'',  
                    'sign'=>'伦途科技', 
                    'type'=>'pt', 
                    'extno'=>''    
            ); 

            foreach ($argv as $key=>$value) { 
                    if ($flag!=0) { 
                            $params .= "&"; 
                            $flag = 1; 
                    } 
                    $params.= $key."="; $params.= urlencode($value);
                    $flag = 1; 
            } 
            $url = "http://web.cr6868.com/asmx/smsservice.aspx?".$params;
            $con= substr( file_get_contents($url), 0, 1 );  

            if($con == '0'){
    //		$_SESSION["yzm"]=$verify;
                session(["yzm"=>$verify]);
                $tt = 1;
                return $tt;
                    //header("location:1.php");
            }else{
                 $tt = 2;
                return $tt;
            }
        }
	
}