<?php
/*
页面功能：客户端连接用接口
创建日期：2008年5月20日23:44:52
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/
require('include/common.inc.php');
$checkconnect='';
if (isset($_GET['checkconnect']))
{
	$checkconnect	= $_GET['checkconnect'];
}
if ($checkconnect=='true')
{
	echo 'true';
}

if (isset($_GET['sid']))
{
	$sid	= $_GET['sid'];

	//所有未完成任务列表
	//---------------------0------1------2----------3---------4-------------5-------------6
	$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id`>'.$sid;
	$temp_query = query($SqlStr);
	while($DB_Record = nqfetch($temp_query))
	{
		$SqlL = 'insert into ['.table_pre.'calendar] (';
		$SqlR = 'values (';

		//所属用户
		$SqlL .= "[userid],";
		$SqlR .= $DB_Record[0] . ',';

		//服务端编号
		$SqlL .= "[sid],";
		$SqlR .= $DB_Record[1] . ',';

		//标题
		$SqlL .= '[title],';
		$SqlR .= '\'' . $DB_Record[2] . '\',';

		//关键度
		$SqlL .= "[import],";
		$SqlR .= $DB_Record[3] . ',';

		//提交时间
		$SqlL .= "[createtime],";
		$SqlR .= '\'' . $DB_Record[4] . '\',';

		//修改时间
		$SqlL .= "[modifytime],";
		$SqlR .= '\'' . $DB_Record[6] . '\',';

		//内容
		$SqlL .= "[content])";
		$SqlR .= "'". $DB_Record[5] ."');";
		
		//分割字符串
		$SqlR .= '@split_str_for_mgw@';
		
		echo $SqlL.$SqlR;
	}
}

if (isset($_GET['modifyid']))
{
	$modifyid	= $_GET['modifyid'];

	$str_server_modifytime='';

	//所有未完成任务列表
	//---------------------0------1------2----------3---------4-------------5-------------6
	$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id` in ('.$modifyid . ')';
	//echo $SqlStr;
	$temp_query = query($SqlStr);
	while($DB_Record = nqfetch($temp_query))
	{
		if($str_server_modifytime=='')
		{
			$str_server_modifytime= $DB_Record[6];
		}
		else
		{
			$str_server_modifytime.= ',' . $DB_Record[6];
		}
	}
	echo $str_server_modifytime;

}

if (isset($_GET['server_client_id']))
{
	$server_client_id	= $_GET['server_client_id'];
	if($server_client_id<>'')
	{
		$server_client_id_arr = split(',', $server_client_id);
		$i=0;

		//所有未完成任务列表
		//---------------------0------1------2----------3---------4-------------5-------------6
		$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id` in ('.$server_client_id . ')';
		//echo $SqlStr;
		$temp_query = query($SqlStr);
		while($DB_Record = nqfetch($temp_query))
		{
			$SqlL = 'UPDATE ['.table_pre.'calendar] SET';
			
			//所属用户
			$SqlL .= '[userid]=';
			$SqlL .= $DB_Record[0] . ',';
			
			//标题
			$SqlL .= '[title]=';
			$SqlL .= '\'' . $DB_Record[2] . '\',';

			//关键度
			$SqlL .= '[import]=';
			$SqlL .= $DB_Record[3] . ',';


			//提交时间
			$SqlL .= '[createtime]=';
			$SqlL .= '\'' . $DB_Record[4]  . '\',';

			//修改时间
			$SqlL .= '[modifytime]=';
			$SqlL .= '\'' . $DB_Record[6] . '\',';

			//内容
			$SqlL .= "[content]=";
			$SqlL .= "'". $DB_Record[5] ."'";
			
			$SqlL.=  ' WHERE `sid`=' . $server_client_id_arr[$i];
				
			//分割字符串
			$SqlL .= '@split_str_for_mgw@';
			
			echo $SqlL;
			$i++;
		}
	}
}

//更新数据库
if (isset($_POST['SqlStr']))
{
	$SqlStrArr= $_POST['SqlStr'];
//	$SqlStr	= "POST:\n" . $_POST['SqlStr'][0];
//	$SqlStr	.= "\n" . $_POST['SqlStr'][1];



//	echo $SqlStr;

	foreach ($SqlStrArr as $SqlStr)
	{
		$SqlStr1.=$SqlStr;
		//执行	
		$SqlStr=str_replace('\\','',$SqlStr);
		query($SqlStr);
	}

	//执行
	//query($SqlStr1);

	$handle = fopen('1.txt', 'w');
	// 写入
	fwrite($handle, $SqlStr1);
}

//客户端sid为0的相应的服务端id
if (isset($_GET['sid']))
{
	$modifyid	= $_GET['modifyid'];

	$str_server_modifytime='';

	//---------------------0------1------2----------3---------4-------------5-------------6
	$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id` in ('.$modifyid . ')';
	//echo $SqlStr;
	$temp_query = query($SqlStr);
	while($DB_Record = nqfetch($temp_query))
	{
		if($str_server_modifytime=='')
		{
			$str_server_modifytime= $DB_Record[6];
		}
		else
		{
			$str_server_modifytime.= ',' . $DB_Record[6];
		}
	}
	echo $str_server_modifytime;

}

/*/

$variable_log =  "本页得到的_GET变量有:\n"			.print_array($_GET);
$variable_log.=  "本页得到的_POST变量有:\n"		.print_array($_POST);
$variable_log.=  "本页得到的_COOKIE变量有:\n"	.print_array($_COOKIE);
$variable_log.=  "本页得到的_SESSION变量有:\n"	.print_array(@$_SESSION);
$variable_log.=  "HTTP头文件:\n"	.print_array(getallheaders());


//$variable_log.=  "\n"	. $_Post('SqlStr');




$handle = fopen('1.txt', 'w');
fwrite($handle, $variable_log);



$SqlStr='UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008年5月20日20:36:50杀毒封杀飞1\',`import`=3,`createtime`=\'2008-05-20 8:36:54\',`modifytime`=\'2008-05-20 8:36:55\',`content` = \'杀毒发送 \' WHERE `id`=35;UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008年5月20日20:51:57啥地方6\',`import`=3,`createtime`=\'2008-05-20 8:52:00\',`modifytime`=\'2008-05-20 8:53:12\',`content` = \'按时打发1\' WHERE `id`=36;UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008年5月20日20:52:08啥地方8\',`import`=3,`createtime`=\'2008-05-20 8:52:13\',`modifytime`=\'2008-05-20 8:53:25\',`content` = \'啥地方1\' WHERE `id`=37;';
query($SqlStr);
*/



?>


