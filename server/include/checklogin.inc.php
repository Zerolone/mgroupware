<?php
$ThisPage	= $_SERVER['PHP_SELF'];
$ThePage	= '/login.php';

//*//
//echo '<hr>session["login"]='.$_SESSION['login'].'<br>';
//echo '   session["userid"]='.$_SESSION['userid'].'<hr>';
//*/
//	$_SESSION['login'] = 1;

/*
//如果session不存在，则
if(!isset($_SESSION['login']))
{
	$_SESSION['login'] = 0;
}

if ($_SESSION['login']!=1 && $ThisPage <> $ThePage) 
{
	$page_name		= '../include/refresh.php';
	$refresh_msg	= '你尚未登陆或登录超时，请重新登录。';
	$refresh_url	= '../manage/login.php';

	require($page_name.'.php');
	die();
}

*/
//当前为单用户支持
$userid=1;
?>