<?php

namespace App\Http\Controllers\pho\Payyzm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class payyzmController extends Controller
{
    public function zzpay(Request $request){
        $sel = new mol();
        $data = $request->except("_token");
        date_default_timezone_set('PRC');
        $date = date("Y-m-d");
        if($data["classtype"] == "0") {
            echo "<script>alert('请选择班型!');history.back();</script>";
        }
        if($data["qf"] == 3) {//载入驾校
            $arr = $sel->selone("demo_sjrz", "id", "=", $data["jid"]);
        }
        if($data["qf"] == 1) {//自主发布
            $arr = $sel->selone("demo_zzfb", "id", "=", $data["jid"]);
        }
//        $str["classtype"] = $data["classtype"];//班型
//        $str["price"] = $data["price"];//价格
//        $str["zzfbid"] = $data["zzfbid"];//商品id
//        $str["nickname"] = $data["nickname"];
//        $str["jxname"] = $arr->jxname;//驾校名称
//        $str["pic"] = $arr->pic;//驾校图片
        $str = $sel->selone("demo_setinfo", "id", "=", "1");
        return view("pho.Pay.m_jxPay",["arr"=>$arr,"date"=>$date,"data"=>$data,"str"=>$str]);
    }
    
    
    /*
     * 自主发布和驾校报名下单支付
     */
    
    public function tpay(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        if($data["qf"] == 3){
            $str = $sel->selone("demo_sjrz", "id", "=", $data["jid"]);
        }
        if($data["qf"] == 1) {
            $str = $sel->selone("demo_zzfb", "id", "=", $data["jid"]);
        }
        $arr = $sel->selone("demo_zzfbclass", "id", "=", $data["bid"]);
        $a = $str->jxname;//驾校名称
        $b = $arr->classtype;//班型
        $c = $data["qf"];//区别是驾校的订单还是个人的订单
        $d = $data["jid"];//主商品id
        if($data["fktype"] == 0) {//付款方式，是预约金还是全额付款，默认全额付款0,1预约金
            $e = 200;//预约金两百，价格
        }
        if($data["fktype"] == 1) {
            $e = $data["price"];//全额付款，价格
        }
        $f = $data["paytype"];//支付方式，1是微信，0是支付宝
        $g = $data["fktype"];//付款方式，是预约金还是全额付款，默认全额付款0,1预约金
        $i = $str->pic;//主图图片
        $k = $data["bid"];//班型id
        $m = $data["nickname"];//下单账号
        $n = 1;
        $o = $data["bainhao"];
        header("location:http://233.hjlink.cn/1.php?a={$a}&b={$b}&c={$c}&d={$d}&e={$e}&f={$f}&g={$g}&i={$i}&k={$k}&m={$m}&n={$n}&o={$o}");
    }
    
    //驾驶证服务
    public function jqserverpay($paytype,Request $request) {
        $data = $request->except("_token");
        $a = $data["serID"];
        $b = $data["shopname"];
        $c = $data["shopaddress"];
        $d = $data["price"];
        $e = $paytype;
        $h = session()->get("Teluser");
        $n = 2;
        header("location:http://233.hjlink.cn/2.php?a={$a}&b={$b}&c={$c}&d={$d}&e={$e}&h={$h}&n={$n}");
    }
    
    //计时培训支付接口
    public function xyjpdopay($paytype,Request $request) {
        $data = $request->except("_token");
        $a = $data["lctime"];//练车时间
        $b = $data["price"];//价格
        $c = $data["jpid"];//所下单的项目id
        $d = $data["type"];//下单项目名称区别2【科目三】3【科目三】
        $e = $data["lcmodel"];//练习模式2【1(练习场地)2(考试练习)】
        $f = $data["lcaddress"];//练车地址
        $g = $data["tel"];//教练练习电话
        $h = $paytype;
        $g = session()->get("Teluser");
        $n = 3;
        header("location:http://233.hjlink.cn/3.php?a={$a}&b={$b}&c={$c}&d={$d}&e={$e}&f={$f}&g={$g}&g={$g}&n={$n}&h={$h}");
    }
    
    //教练支付详情
    public function jlxddetail(Request $request){
        $sel = new mol();
        $data = $request->except("_token");
        // var_dump($data);die;
        if($data["classtype"] == "0") {
            echo "<script>alert('请选择班型!');history.back();</script>";
        }
        $str = $sel->selone("demo_grrz", "id", "=", $data["jlID"]);
        $data["xddate"] = date("Y-m-d");
        $arr = $sel->selone("demo_setinfo", "id", "=", "1");
        return view("pho.Pay.m_jlPay",["data"=>$data,"str"=>$str,"arr"=>$arr]);
    }
    
    public function jlsavedetail($fktype,Request $request) {
        $data = $request->except("_token");
        $a =$data["jlID"];//教练id
        $b =$data["nickname"];//下单账号
        $d =$data["classtype"];//班型1['vip班'],2["2普通班"]

        if($data["price"] == null){
            echo "<script>alert('请选择付款方式!');history.back();</script>";
        }
        $e =$data["price"];//价格
        $f = $data["yyj"];//预约金
        
        
        
        $f = 5;
        $g = $fktype;//付款方式1全额付款2预约金
        $i = $data["szjxname"]."&nbsp;".$data["jxaddress"];//驾校名称和驾校所在位置
        $j = $data["bid"];//所选班型id
        $n = 4;
        header("location:http://233.hjlink.cn/4.php?a={$a}&b={$b}&d={$d}&e={$e}&f={$f}&g={$g}&g={$g}&i={$i}&j={$j}&n={$n}");
    }
    
}
