<?php

$alipay_config['partner']		= '2088612809762243';


$alipay_config['seller_id']	= $alipay_config['partner'];

$alipay_config['key']			= '6ho6rksj52uwega0nqv19v169s5lw7kc';

$alipay_config['notify_url'] = "http://ceshi.kmhujia.com/alipaywap/notify_url.php";

$alipay_config['return_url'] = "http://ceshi.kmhujia.com/alipaywap/return_url.php";


$alipay_config['sign_type']    = strtoupper('MD5');


$alipay_config['input_charset']= strtolower('utf-8');


$alipay_config['cacert']    = getcwd().'\\cacert.pem';

$alipay_config['transport']    = 'http';

$alipay_config['payment_type'] = "1";
		

$alipay_config['service'] = "alipay.wap.create.direct.pay.by.user";



?>