<?php
/*
页面功能：网站整体配置信息
创建日期：2007年9月18日9:49:22
修改日期：2007年9月21日21:36:02
作    者：Zerolone
主    页：http://www.zerolone.com/
*/

//-----------------------------------------------------------
//计算花费时间
//count cost time
$startime	= microtime();

//是否显示调试信息
//show debug info
//1 show
//$showdebug=0;
$showdebug=1;


//数据库查询次数
//query count
$query_count = 0;
//-----------------------------------------------------------

//-----------------------------------------------------------
//数据库定义
define('db_type',			'mysql');
define('db_user',			'root');
define('db_pass',			'root');
define('db_host',			'localhost');
define('db_name',			'mgw');
	
//表的前缀
define('table_pre',		'mgw_');
//-----------------------------------------------------------

//-----------------------------------------------------------
//网站标题
$site_title		= 'MGroupware';

//title
$title_title	= 'MGroupware';

//网站关键字
//site keywords
$site_keywords	= 'MGroupware,Groupware,Monolith,MGW';

//网站说明
//$site description
$site_description = '用原始工具构建完美站点';

//网站地址
//$site_url
$site_url = 'http://localhost/';

//网站备案号
//$site_cert
$site_cert = '冀 234214121';
$site_cert = "<a href='http://www.miibeian.gov.cn/' target='_blank'>".$site_cert."</a>";

//作者
//$site_author
$site_author	= 'Zerolone@163.com, Zerolone';

//版权
//$site_copyright
$site_copyright	= 'Powered by <font color="red">Zerolone</font>.<font color="blue">Com</font>';

//版本
//$site_version
$site_version = 'Version 0.0.1';

//测试过的浏览器
//$site_tested
$site_tested	= '仅在IE6上测试过';

//网站物理路径
//$site_dir
$site_dir	= "E:/wwwroot/shoes/";

//常规设置
//页面跳转时间(秒)
$refresh_time	= 300;
//-----------------------------------------------------------



//-----------------------------------------------------------
//采集设置
//-----------------------------------------------------------
//一次采集数
$LimitCount = 45;

//刷新时间
$RefreshTime	= 100;

//网页上面的路径
$ImageUrl			= 'catchpic/';

//图片保存路径
$ImageUrlPath = $site_dir . $ImageUrl;



//
$imagePath='productimages/';

//-----------------------------------------------------------


//-----------------------------------------------------------
//购物方面的设置
//2007年9月21日21:35:31
//-----------------------------------------------------------
//快递费用
$shipcount =0;

//折扣
$cartdiscount=0;

$alipay_service				= 'trade_create_by_buyer';
$alipay_out_trade_no	= 'zerolone_trade';
$alipay_email					= 'lonezero@163.com';
$alipay_key						= 'rh0sp0s68okrpv5rggfrdu17dy6gszxh';
$alipay_partnerID			= '2088002014330294';
$alipay_return_url		= 'http://localhost/pay_over.php'; 

$alipay_url				= 'email=' . $alipay_email . '\&partner=' . $alipay_partnerID . '\&service=zerolone_query';
//-----------------------------------------------------------



//显示所有错误，警告提示
//error_reporting(E_ALL);

//取消警告
//error_reporting(E_ALL & ~E_NOTICE);
?>