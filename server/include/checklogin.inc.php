<?php
$ThisPage	= $_SERVER['PHP_SELF'];
$ThePage	= '/login.php';

//*//
//echo '<hr>session["login"]='.$_SESSION['login'].'<br>';
//echo '   session["userid"]='.$_SESSION['userid'].'<hr>';
//*/
//	$_SESSION['login'] = 1;

/*
//���session�����ڣ���
if(!isset($_SESSION['login']))
{
	$_SESSION['login'] = 0;
}

if ($_SESSION['login']!=1 && $ThisPage <> $ThePage) 
{
	$page_name		= '../include/refresh.php';
	$refresh_msg	= '����δ��½���¼��ʱ�������µ�¼��';
	$refresh_url	= '../manage/login.php';

	require($page_name.'.php');
	die();
}

*/
//��ǰΪ���û�֧��
$userid=1;
?>