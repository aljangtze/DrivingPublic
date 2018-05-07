<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("tel/login");
});


Route::get("admin/login","Admin\Login\LoginController@login");
Route::post("admin/dologin","Admin\Login\LoginController@dologin");
Route::get("admin/outlogin","Admin\Login\LoginController@outlogin");
Route::group(['prefix'=>'admin',"middleware"=>"myadmin"],function()
{
    Route::get("home/main/{bianghao}","Admin\Home\HomeController@main");
    Route::get("home/left/{bianhao}","Admin\Home\HomeController@left");
    Route::get("home/top/{bianhao}","Admin\Home\HomeController@top");
    Route::get("home/index/{bianhao}","Admin\Home\HomeController@index");
    
    //管理员信息模块
    Route::resource("user","Admin\User\UserController");
    Route::get("usersqdel/{id?}","Admin\User\UserController@sqdel");
    
    //图片库管理
    Route::get("gallery","Admin\Gallery\GalleryController@gallery");
    
    //驾培服务
    Route::get("jpfw/{type}","Admin\sjrz\SjrzController@jpfw");
    Route::get("sh/{id}","Admin\sjrz\SjrzController@sh");
    Route::get("del/{id}","Admin\sjrz\SjrzController@del");
    Route::get("jpqdel/{id?}","Admin\sjrz\SjrzController@jpqdel");
    Route::get("jpedit/{id?}","Admin\sjrz\SjrzController@jpedit");
    Route::post("tjjpedit/{id?}","Admin\sjrz\SjrzController@tjjpedit");
    Route::get("jpform/{id?}","Admin\sjrz\SjrzController@jpform");
    Route::post("jpformsave/{id?}","Admin\sjrz\SjrzController@jpformsave");
    
    //汽车服务
    Route::resource("qcfw","Admin\sjrz\QcfwController");
    Route::get("qcfwedit/{id?}","Admin\sjrz\QcfwController@qcfwedit");
    Route::post("postedit/{id}","Admin\sjrz\QcfwController@postedit");
    
    //驾驶证服务
    Route::resource("jszfw","Admin\sjrz\JszfwController");
    
    //个人入驻
    //驾培服务
    Route::resource("grjpfw","Admin\grrz\GrrzController");
    Route::get("delgrjpqdel/{id?}","Admin\grrz\GrrzController@delgrjpqdel");
    Route::get("grjpsh/{id?}","Admin\grrz\GrrzController@grsh");
    Route::get("grjpedit/{id?}","Admin\grrz\GrrzController@grjpedit");
    Route::post("postjpedit/{id?}","Admin\grrz\GrrzController@postjpedit");
    
    //汽车服务
    Route::resource("grqcfw","Admin\grrz\QcfwController");
    Route::get("grqcedit/{id?}","Admin\grrz\QcfwController@grqcedit");
    Route::post("postgrqcedit/{id?}","Admin\grrz\QcfwController@postgrqcedit");
    
    //驾驶证服务
    Route::resource("grjrzfw","Admin\grrz\JrzfwController");
    
    //专项教练
    Route::resource("zxjl","Admin\Zxjl\ZxjlController");
    Route::post("zxjlsh/{id}","Admin\Zxjl\ZxjlController@zxjlsh");
    Route::get("zxjlsqdl/{id}","Admin\Zxjl\ZxjlController@zxjlsqdl");
    Route::get("zxjlysh","Admin\Zxjl\ZxjlController@zxjlysh");
    Route::get("zxjledit/{id}/{type}","Admin\Zxjl\ZxjlController@edit");
    Route::get("zxjlpx/{id}/{px}","Admin\Zxjl\ZxjlController@zxjlpx");
    
    //投稿管理
    Route::resource("wytg","Admin\wytg\WytgController");
    Route::get("wytgsqdel/{id}","Admin\wytg\WytgController@wytgsqdel");
    
    //幻灯片管理
    Route::resource("banner","Admin\Banner\BannerController");
    Route::get("bannersqdel/{id}","Admin\Banner\BannerController@bannersqdel");
    
    //版型管理
    Route::resource("vipclass","Admin\Vipclass\VipclassController");
    Route::get("vipclasssh/{id?}","Admin\Vipclass\VipclassController@vipclasssh");
    Route::get("vipclasssqdel/{id?}","Admin\Vipclass\VipclassController@vipclasssqdel");
    Route::get("vipxlasspx/{id}/{px}","Admin\Vipclass\VipclassController@px");
    Route::get("vipclassyessh","Admin\Vipclass\VipclassController@vipclassyessh");
    
    //普通班
    Route::resource("ptclass","Admin\Ptclass\PtclassController");
    Route::get("ptysh","Admin\Ptclass\PtclassController@ptclass");
    Route::get("ptclasssh/{id?}","Admin\Ptclass\PtclassController@ptclasssh");
    Route::get("ptclasssqdel/{id?}","Admin\Ptclass\PtclassController@ptclasssqdel");
    Route::get("ptclasspx/{id}/{px}","Admin\Ptclass\PtclassController@px");
    
    //及时培训管理
    /*
     * lessionone
     */
    Route::resource("lessionone","Admin\Lession\LessiononeController");
    Route::get("lsessionsqdel/{id?}","Admin\Lession\LessiononeController@lessiononesqdel");
    Route::get("lessiononesh/{id?}","Admin\Lession\LessiononeController@lessiononesh");
    Route::get("lessiononepx/{id}/{px}","Admin\Lession\LessiononeController@lessiononepx");
    
    //自主发布管理
    Route::resource("zzfbgl","Admin\Zzfbgl\ZzfbController");
    Route::get("zzfbglsqdel/{id?}","Admin\Zzfbgl\ZzfbController@zzfbglsqdel");
    Route::get("zzfbglpx/{id}/{px}","Admin\Zzfbgl\ZzfbController@zzfbglpx");
    Route::get("zzfbdetail/{id}","Admin\Zzfbgl\ZzfbController@zzfbdetail");

    //自主发布班型管理
    Route::resource("zzfbclass","Admin\Zzfbclassgl\ZzfclassbController");
    Route::get("zzfbclassindex/{id}/{bh?}","Admin\Zzfbclassgl\ZzfclassbController@home");
    Route::post("qfclass","Admin\Zzfbclassgl\ZzfclassbController@qfclass");
    Route::get("zzfbclasssqdel/{id}","Admin\Zzfbclassgl\ZzfclassbController@zzfbclasssqdel");
    
    /*
     * lessiontwo
     */
    Route::resource("lessiontwo","Admin\Lession\LessiontwoController");
    Route::get("lessiontwosh/{id?}","Admin\Lession\LessiontwoController@lessiontwosh");
    Route::get("lessiontwosqdel/{id?}","Admin\Lession\LessiontwoController@lessiontwosqdel");
    Route::get("lessiontwopx/{id}/{px}","Admin\Lession\LessiontwoController@lessiontwopx");
    Route::get("lessiontwoysh","Admin\Lession\LessiontwoController@lessiontwoysh");
    
    /*
     * lessionthree
     */
    Route::resource("lessionthree","Admin\Lession\LessionthreeController");
    Route::get("lessionthreesh/{id}","Admin\Lession\LessionthreeController@lessionthreesh");
    Route::get("lessionthreesqdel/{id?}","Admin\Lession\LessionthreeController@lessionthreesqdel");
    Route::get("lessionthreepx/{id}/{px}","Admin\Lession\LessionthreeController@lessionthreepx");
    
    /*
     * lessionfour
     */
    Route::resource("lessionfour","Admin\Lession\LessionfourController");
    Route::get("lessionfoursqdel/{id?}","Admin\Lession\LessionfourController@lessionfoursqdel");
    Route::get("lessionfoursh/{id?}","Admin\Lession\LessionfourController@lessionfoursh");
    Route::get("lessionfourpx/{id}/{px}","Admin\Lession\LessionfourController@lessionfourpx");
    
    
    /*
     * 驾驶证服务管理
     */
    Route::resource("lzjrzfw","Admin\serveritem\JrzfwController");
    Route::get("lzjrzfwsh/{id?}","Admin\serveritem\JrzfwController@lzjszfwsh");
    Route::get("lzjrzfwpx/{id}/{px}","Admin\serveritem\JrzfwController@lzjrzfwpx");
    Route::get("lzjrzfwsqdel/{id?}","Admin\serveritem\JrzfwController@lzjrzfwsqdel");
    
    /*
     * 汽车服务
     */
    Route::resource("lzqcfw","Admin\serveritem\QcfwController");
    Route::get("lzqcfwsh/{id}","Admin\serveritem\QcfwController@lzqcfwsh");
    Route::get("lzqcfwpx/{id}/{px}","Admin\serveritem\QcfwController@lzqcfwpx");
    Route::get("lzqcfwsqdel/{id}","Admin\serveritem\QcfwController@lzqcfwsqdel");
    
    /*
     * 文章管理
     */
    Route::resource("article","Admin\Article\ArticleController");
    Route::get("articlelook/{id}","Admin\Article\ArticleController@look");
    Route::get("articlesqdel/{id}","Admin\Article\ArticleController@articlesqdel");
    
    /*
     * 论坛管理
     */
    Route::resource("forum","Admin\Forum\ForumController");
    Route::get("forumsh/{id?}","Admin\Forum\ForumController@sh");
    Route::get("forumhs/{id?}","Admin\Forum\ForumController@hs");
    Route::get("forumsqdel/{id?}","Admin\Forum\ForumController@sqdel");
    Route::get("forumpx/{id}/{px}","Admin\Forum\ForumController@px");
    Route::get("forumhsz","Admin\Forum\ForumController@hsz");
    Route::get("forumsetinfo","Admin\Forum\ForumController@forumset");
    Route::post("forumsaveset/{id}","Admin\Forum\ForumController@forumsaveset");
    
    /*
     * 投诉管理
     */
    Route::resource("tsgl","Admin\Tsgl\TsglController");
    Route::get("tsglsqdel/{id?}","Admin\Tsgl\TsglController@tsglsqdel");
    
    
    /*
     * 学员需求发布管理
     */
    Route::resource("xyxqgl","Admin\Xyxqgl\XyxqController");
    Route::get("xyxqglsqdel/{nickname?}","Admin\Xyxqgl\XyxqController@xyxqglsqdel");
    
    
    /*
     * 需求订单管理
     */
    Route::resource("xqorder","Admin\Order\XyOrderController");
    Route::get("xqordersqdel/{id}","Admin\Order\XyOrderController@xqordersqdel");
    
    /*
     * 驾培订单管理
     */
    Route::resource("jporder","Admin\Order\JpOrderController");
    Route::get("qorder/{bh?}","Admin\Order\JpOrderController@index");
    Route::get("jpordersqdel/{id}","Admin\Order\JpOrderController@jpordersqdel");
    Route::post("jpfp/{id}","Admin\Order\JpOrderController@jpfp");
    
    /*
     * 教练订单管理
     */
    Route::resource("jlorder","Admin\Order\JlOrderController");
    Route::get("jlordersqdel/{id?}","Admin\Order\JlOrderController@jlordersqdel");
    Route::post("jlfp/{id}","Admin\Order\JlOrderController@jlfp");
    
    /*
     * 计时培训订单管理
     */
    Route::resource("jsporder","Admin\Order\JspOrderController");
    Route::get("jspordersqdel/{id?}","Admin\Order\JspOrderController@jspordersqdel");
    Route::post("jsfp/{id}","Admin\Order\JspOrderController@jsfp");
    
    //驾驶证服务和汽车服务订单管理
    Route::resource("qjorder","Admin\Order\QjOrderController");
    Route::get("qjordersqdel/{id?}","Admin\Order\QjOrderController@qjordersqdel");
    Route::post("qjfp/{id}","Admin\Order\QjOrderController@qjfp");
    
    //会员中心管理
    Route::resource("rtcenter","Admin\Rtcenter\RtcenterController");
    Route::get("xyinfo/{type?}/{ys?}","Admin\Rtcenter\RtcenterController@index");
    Route::get("txgl","Admin\Rtcenter\RtcenterController@txgl");
    Route::post("txgldel/{id}","Admin\Rtcenter\RtcenterController@txgldel");
    Route::post("dotxgl/{id}","Admin\Rtcenter\RtcenterController@dotxgl");
    Route::post("fsinfo","Admin\Rtcenter\RtcenterController@fsinfo");
    Route::get("xjqf","Admin\Rtcenter\RtcenterController@xjqf");
    Route::post("fsqf","Admin\Rtcenter\RtcenterController@fsqf");
    Route::get("qflist","Admin\Rtcenter\RtcenterController@qflist");
    
    //广告中心
    Route::resource("adver","Admin\Adver\AdverController");
    
    Route::resource("tjgx","Admin\Tjgx\TjgxController");
    /*
     * 使用说明
     */
    Route::resource("setinfo","Admin\Setinfo\SetinfoController");
    Route::get("setinfo/zfedit/{id?}","Admin\Setinfo\SetinfoController@zfedit");
    Route::post("txsetinfo","Admin\Setinfo\SetinfoController@txsetinfo");
    Route::get("setinfo/txsm/{id?}","Admin\Setinfo\SetinfoController@txsm");
    Route::get("setinfo/jsedit/{id?}","Admin\Setinfo\SetinfoController@jsedit");
    Route::post("setinfo/jssave/{id?}","Admin\Setinfo\SetinfoController@jssave");
    Route::get("setinfo/qcedit/{id?}","Admin\Setinfo\SetinfoController@qcedit");
    Route::post("setinfo/qcsave/{id?}","Admin\Setinfo\SetinfoController@qcsave");
});


/*
 * 手机端
 */

Route::get("tel/login/{nickname?}","pho\Login\LoginController@login");
Route::post("tel/dologin","pho\Login\LoginController@dologin");
Route::get("tel/reg/{nickname?}","pho\Login\LoginController@reg");
Route::post("tel/doreg/{nickname?}","pho\Login\LoginController@doreg");
Route::get("tel/outlogin/{tel?}","pho\Login\LoginController@outlogin");

Route::get("yzm/{tel}","pho\Login\LoginController@yzm");
Route::get("forgetpass","pho\Login\LoginController@forgetpass");
Route::post("resetpass","pho\Login\LoginController@resetpass");


Route::group(['prefix'=>'tel',"middleware"=>"mytel"],function()
{
    //教练中心
    Route::get("jlcenter/{nickname?}","pho\jlCenter\JlController@vipCenter")->name("jluser");
    Route::get("jlwdxy","pho\jlCenter\JlController@jlwdxy");
    Route::get("jlwdfb/{nickname?}","pho\jlCenter\JlController@jlwdfb");
    Route::get("jldel/{id}/{type?}","pho\jlCenter\JlController@jldel");
    Route::get("jlinfo/{nickname?}/{type?}","pho\jlCenter\Jlcontroller@jlinfo");
    Route::post("tjinfo/{nickname?}","pho\jlCenter\Jlcontroller@tjinfo");
    Route::get("jl/gsjj/{nickname?}/{type?}","pho\jlCenter\Jlcontroller@gsjj");
    Route::get("jlorder/{nickname?}/{type?}","pho\JlOrder\JlOrderController@jlorder");
    Route::get("xqsqdel/{id?}/{nickname?}","pho\JlOrder\JlOrderController@xqsqdel");
    Route::get("xqtrueorder/{id?}/{nickname?}","pho\JlOrder\JlOrderController@xqtrueorder");
    Route::get("xqpayorder/{id?}/{nickname?}","pho\JlOrder\JlOrderController@xqpayorder");
    Route::get("xqorderdetail/{id?}/{nickname?}","pho\JlOrder\JlOrderController@xqorderdetail");
    
 
    
    //我要投诉
    Route::get("wytg/{nickname?}","pho\jlCenter\Jlcontroller@wytg");
    Route::post("postwyts/{nickname?}","pho\jlCenter\Jlcontroller@postwyts");
    
    //成为商家（企业入驻）
    Route::get("cwsj/{nickname?}","pho\cwsj\CwsjController@cwsj");
    Route::post("nextcwsj/{nickname?}","pho\cwsj\CwsjController@nextcwsj");
    Route::post("tjcwsj/{nickname?}","pho\cwsj\CwsjController@tjcwsj");
    
    //个入驻
    Route::post("tjgrrz/{nickname?}","pho\cwsj\CwsjController@tjgrrzinfo");
    
    //教练中心导航入口
    Route::get("navjx/{nickname?}","pho\Nav\NavController@navjx");
    
    //版型发布
    Route::get("addclass/{nickname?}","pho\Nav\NavController@addclass");
    //vip班
    Route::get("addclassvip/{nickname?}","pho\Nav\NavController@addclassvip");
    Route::post("saveclassvip/{nickname?}","pho\Nav\NavController@saveclassvip");
    
    //普通班
    Route::get("normal/{nickname?}","pho\Nav\NavController@normal");
    Route::post("tjnormal/{nickname?}","pho\Nav\NavController@tjnormal");
    
    //及时培训
    /*
     * lession
     * lessionone
     */
    Route::get("lession/{nickname?}","pho\Nav\NavController@session");
    Route::get("sfhs/{type?}","pho\Nav\NavController@sfhs");
    Route::get("lessionone/{nickname?}","pho\Nav\NavController@lessionone");
    Route::post("postlessionone/{nickname?}","pho\Nav\NavController@postlessionone");
    
    /*
     * lessiontwo
     */
    Route::get("lessiontwo/{nickname?}","pho\Nav\NavController@lessiontwo");
    Route::post("savelessiontwo/{nickname?}","pho\Nav\NavController@savelessiontwo");
    
    /*
     * lessionthree
     */
    Route::get("lessionthree/{nickname?}","pho\Nav\NavController@lessionthree");
    Route::post("savelessionthree/{nickname?}","pho\Nav\NavController@savelessionthree");
    
    /*
     * lessionfour
     */
    Route::get("lessionfour/{nickname?}","pho\Nav\NavController@lessionfour");
    Route::post("savelessionfour/{nickname?}","pho\Nav\NavController@savelessionfour");
    
    /*
     * 领证（驾驶证服务）
     */
    Route::get("lz/{nickname?}","pho\Nav\LzController@lz");
    Route::get("lzjrzfw/{nickname?}","pho\Nav\LzController@lzjrzfw");
    Route::post("savelzjrzfw/{nickname?}","pho\Nav\LzController@savelzjrzfw");
    
    /*
     * 领证（驾驶证服务）
     */
    Route::get("lzqcfw/{nickname?}","pho\Nav\LzController@lzqcfw");
    Route::post("savelzqcfw/{nickname?}","pho\Nav\LzController@savelzqcfw");
    
    /*
     * 圈子(首页)
     */
    
    Route::get("qz/{nickname?}","pho\Nav\QzController@qz");
    
    /*
     * 圈子(知识分享)
     */
    Route::get("qzzsfx/{nickname?}","pho\Nav\QzController@zsfx");
    Route::get("qzzsfxdetail/{id?}/{nickname?}","pho\Nav\QzController@details");
    
    /*
     * 圈子(在线论坛)
     */
    Route::get("forum/{nickname?}","pho\Nav\ForumController@forum");
    Route::get("forumft/{nickname?}","pho\Nav\ForumController@forumft");
    Route::post("saveforumft/{nickname?}","pho\Nav\ForumController@saveforumft");
    Route::get("forumdetail/{id?}/{nickname?}","pho\Nav\ForumController@forumdetails");
    Route::post("contract","pho\Nav\ForumController@contract");
    
    //学员中心
    Route::get("xycenter/{nickname?}","pho\xyCenter\XyController@vipCenter")->name("xueyuan");
    Route::get("tx","pho\xyCenter\XyController@tx");
    Route::get("xywdfb","pho\xyCenter\XyController@xywdfb");
    Route::get("txmx","pho\xyCenter\XyController@txmx");
    Route::post("dotx","pho\xyCenter\XyController@dotx");
    Route::get("czsm/{nickname?}","pho\xyCenter\XyController@czsm");
    Route::get("xyxc/{nickname?}","pho\xyCenter\LcController@xc");
    Route::get("wszx/{nickname?}","pho\xyCenter\LcController@wszx");
    Route::get("seljx/{nickname?}","pho\xyCenter\LcController@seljx");
    Route::get("seljxdetail/{id}/{nickname?}","pho\xyCenter\LcController@seljxdetail");
    
    //学员中心订单
    //驾校订单
    Route::get("xyorders/{nickname?}/{ys?}/{act?}","pho\XyOrder\XyOrderController@index");
    Route::get("xyordersdetail/{id}/{type?}","pho\XyOrder\XyOrderController@xyordersdetail");
    Route::get("xyordersdel/{id}/{del?}","pho\XyOrder\XyOrderController@xyordersdel");
    Route::get("xyorderstrue/{id}/{sh}/{del?}","pho\XyOrder\XyOrderController@xyorderstrue");
    
    //计时培训
    Route::get("xyjspx/{nickname?}/{name?}","pho\xyCenter\LcController@xyjspx");
    Route::get("xyjspxlist/{id?}/{class?}","pho\xyCenter\LcController@xyjspxlist");
    Route::get("xyjpdetail/{id?}/{type?}","pho\xyCenter\LcController@xyjpdetail");
    Route::post("xyjppay","pho\xyCenter\LcController@xyjppay");
    Route::post("xyjpdopay/{paytype}","pho\Payyzm\payyzmController@xyjpdopay");
    
    /*
     * 教练详情
     */
    Route::get("seljl/{nickname?}","pho\xyCenter\LcController@seljl");
    Route::get("jldetail/{id?}/{bianhao?}/{nickname?}","pho\xyCenter\LcController@jldetail");
    
    /*
     * 领证(载入领证)
     */
    Route::get("xylz/{nickname?}","pho\XyCenter\LzController@lz");
    //驾驶证服务
    Route::get("xyjszfw/{nickname?}","pho\XyCenter\LzController@xyjszfw");
    Route::get("xyjr/{id?}/{nickname?}","pho\XyCenter\LzController@xyjr");
    Route::get("xyxd/{id?}/{nickname?}","pho\XyCenter\LzController@xyxd");
    
    
    //汽车服务
    Route::get("xyqc/{nickname?}","pho\XyCenter\LzController@xyqc");
    Route::get("xyqcf/{id?}/{nickname?}","pho\XyCenter\LzController@xyqcf");
    Route::get("xyqcxd/{id?}/{nickname?}","pho\XyCenter\LzController@xyqcxd");
    
    //学员中心圈子
    Route::get("xyqz/{nickname?}","pho\XyCenter\LzController@xyqz");
    
    //投诉举报
    Route::get("xytsjb/{nickname?}","pho\xyCenter\XyController@xytsjb");
    Route::post("xytsjbsave/{nickname?}","pho\xyCenter\XyController@xytsjbsave");
    
    //学员需求发布
    Route::get("xyxqfb/{nickname?}","pho\xyCenter\LcController@xyxqfb");
    Route::post("savexyxqfb/{nickname?}","pho\xyCenter\LcController@savexyxqfb");
    
    //学员需求
    Route::get("jlxyxq/{nickname?}","pho\Nav\NavController@jlxyxq");
    Route::get("jlxyxqdetail/{id?}/{nickname?}","pho\Nav\NavController@jlxyxqdetail");
    Route::get("jlxyxqjd/{id?}/{nickname?}","pho\Nav\NavController@jlxyxqjd");
    
    //自主发布详情
    Route::get("zzfbdetails/{nickname?}/{id?}","pho\Zzfb\ZzfbController@detail");
    
    
    /*
     * 相关支付
     */
    Route::post("zzfbpay","pho\Payyzm\payyzmController@zzpay");
    Route::post("zzfbpay/pay","pho\Payyzm\payyzmController@tpay");
    
    //驾驶证服务和汽车服务下单支付接口
    Route::post("jqserverpay/{paytype}","pho\Payyzm\payyzmController@jqserverpay");
    
    //教练接口
    Route::post("jlxddetail","pho\Payyzm\payyzmController@jlxddetail");
    Route::post("jlsavedetail/{fktype}","pho\Payyzm\payyzmController@jlsavedetail");
    
    //站内信
    Route::get("znx/{nickname}","pho\Znx\ZnxController@znx");
    Route::get("znxdel/{id}","pho\Znx\ZnxController@znxdel");
    
    
});
