<?php

$alipay_config['partner']		= '2088721770766537';


$alipay_config['seller_id']	= $alipay_config['partner'];

$alipay_config['key']			= '2zbbv0ju1z9st2ce6r4d3knm2mkghdn0';

$alipay_config['notify_url'] = "http://233.hjlink.cn/alipaywap/notify_url.php";

$alipay_config['return_url'] = "http://233.hjlink.cn/alipaywap/return_url.php";


$alipay_config['sign_type']    = strtoupper('MD5');


$alipay_config['input_charset']= strtolower('utf-8');


$alipay_config['cacert']    = getcwd().'\\cacert.pem';

$alipay_config['transport']    = 'http';

$alipay_config['payment_type'] = "1";
		

$alipay_config['service'] = "alipay.wap.create.direct.pay.by.user";



?>