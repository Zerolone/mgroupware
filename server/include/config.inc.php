<?php
/*
ҳ�湦�ܣ���վ����������Ϣ
�������ڣ�2007��9��18��9:49:22
�޸����ڣ�2007��9��21��21:36:02
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
*/

//-----------------------------------------------------------
//���㻨��ʱ��
//count cost time
$startime	= microtime();

//�Ƿ���ʾ������Ϣ
//show debug info
//1 show
//$showdebug=0;
$showdebug=1;


//���ݿ��ѯ����
//query count
$query_count = 0;
//-----------------------------------------------------------

//-----------------------------------------------------------
//���ݿⶨ��
define('db_type',			'mysql');
define('db_user',			'root');
define('db_pass',			'root');
define('db_host',			'localhost');
define('db_name',			'mgw');
	
//���ǰ׺
define('table_pre',		'mgw_');
//-----------------------------------------------------------

//-----------------------------------------------------------
//��վ����
$site_title		= 'MGroupware';

//title
$title_title	= 'MGroupware';

//��վ�ؼ���
//site keywords
$site_keywords	= 'MGroupware,Groupware,Monolith,MGW';

//��վ˵��
//$site description
$site_description = '��ԭʼ���߹�������վ��';

//��վ��ַ
//$site_url
$site_url = 'http://localhost/';

//��վ������
//$site_cert
$site_cert = '�� 234214121';
$site_cert = "<a href='http://www.miibeian.gov.cn/' target='_blank'>".$site_cert."</a>";

//����
//$site_author
$site_author	= 'Zerolone@163.com, Zerolone';

//��Ȩ
//$site_copyright
$site_copyright	= 'Powered by <font color="red">Zerolone</font>.<font color="blue">Com</font>';

//�汾
//$site_version
$site_version = 'Version 0.0.1';

//���Թ��������
//$site_tested
$site_tested	= '����IE6�ϲ��Թ�';

//��վ����·��
//$site_dir
$site_dir	= "E:/wwwroot/shoes/";

//��������
//ҳ����תʱ��(��)
$refresh_time	= 300;
//-----------------------------------------------------------



//-----------------------------------------------------------
//�ɼ�����
//-----------------------------------------------------------
//һ�βɼ���
$LimitCount = 45;

//ˢ��ʱ��
$RefreshTime	= 100;

//��ҳ�����·��
$ImageUrl			= 'catchpic/';

//ͼƬ����·��
$ImageUrlPath = $site_dir . $ImageUrl;



//
$imagePath='productimages/';

//-----------------------------------------------------------


//-----------------------------------------------------------
//���﷽�������
//2007��9��21��21:35:31
//-----------------------------------------------------------
//��ݷ���
$shipcount =0;

//�ۿ�
$cartdiscount=0;

$alipay_service				= 'trade_create_by_buyer';
$alipay_out_trade_no	= 'zerolone_trade';
$alipay_email					= 'lonezero@163.com';
$alipay_key						= 'rh0sp0s68okrpv5rggfrdu17dy6gszxh';
$alipay_partnerID			= '2088002014330294';
$alipay_return_url		= 'http://localhost/pay_over.php'; 

$alipay_url				= 'email=' . $alipay_email . '\&partner=' . $alipay_partnerID . '\&service=zerolone_query';
//-----------------------------------------------------------



//��ʾ���д��󣬾�����ʾ
//error_reporting(E_ALL);

//ȡ������
//error_reporting(E_ALL & ~E_NOTICE);
?>