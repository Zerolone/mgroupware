<?php
/*
ҳ�湦�ܣ��ͻ��������ýӿ�
�������ڣ�2008��5��20��23:44:52
�޸����ڣ�
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
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

	//����δ��������б�
	//---------------------0------1------2----------3---------4-------------5-------------6
	$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id`>'.$sid;
	$temp_query = query($SqlStr);
	while($DB_Record = nqfetch($temp_query))
	{
		$SqlL = 'insert into ['.table_pre.'calendar] (';
		$SqlR = 'values (';

		//�����û�
		$SqlL .= "[userid],";
		$SqlR .= $DB_Record[0] . ',';

		//����˱��
		$SqlL .= "[sid],";
		$SqlR .= $DB_Record[1] . ',';

		//����
		$SqlL .= '[title],';
		$SqlR .= '\'' . $DB_Record[2] . '\',';

		//�ؼ���
		$SqlL .= "[import],";
		$SqlR .= $DB_Record[3] . ',';

		//�ύʱ��
		$SqlL .= "[createtime],";
		$SqlR .= '\'' . $DB_Record[4] . '\',';

		//�޸�ʱ��
		$SqlL .= "[modifytime],";
		$SqlR .= '\'' . $DB_Record[6] . '\',';

		//����
		$SqlL .= "[content])";
		$SqlR .= "'". $DB_Record[5] ."');";
		
		//�ָ��ַ���
		$SqlR .= '@split_str_for_mgw@';
		
		echo $SqlL.$SqlR;
	}
}

if (isset($_GET['modifyid']))
{
	$modifyid	= $_GET['modifyid'];

	$str_server_modifytime='';

	//����δ��������б�
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

		//����δ��������б�
		//---------------------0------1------2----------3---------4-------------5-------------6
		$SqlStr = ' SELECT `userid`, `id`, `title`, `import`, `createtime`, `content` , `modifytime` FROM `'. table_pre . 'calendar` WHERE `id` in ('.$server_client_id . ')';
		//echo $SqlStr;
		$temp_query = query($SqlStr);
		while($DB_Record = nqfetch($temp_query))
		{
			$SqlL = 'UPDATE ['.table_pre.'calendar] SET';
			
			//�����û�
			$SqlL .= '[userid]=';
			$SqlL .= $DB_Record[0] . ',';
			
			//����
			$SqlL .= '[title]=';
			$SqlL .= '\'' . $DB_Record[2] . '\',';

			//�ؼ���
			$SqlL .= '[import]=';
			$SqlL .= $DB_Record[3] . ',';


			//�ύʱ��
			$SqlL .= '[createtime]=';
			$SqlL .= '\'' . $DB_Record[4]  . '\',';

			//�޸�ʱ��
			$SqlL .= '[modifytime]=';
			$SqlL .= '\'' . $DB_Record[6] . '\',';

			//����
			$SqlL .= "[content]=";
			$SqlL .= "'". $DB_Record[5] ."'";
			
			$SqlL.=  ' WHERE `sid`=' . $server_client_id_arr[$i];
				
			//�ָ��ַ���
			$SqlL .= '@split_str_for_mgw@';
			
			echo $SqlL;
			$i++;
		}
	}
}

//�������ݿ�
if (isset($_POST['SqlStr']))
{
	$SqlStrArr= $_POST['SqlStr'];
//	$SqlStr	= "POST:\n" . $_POST['SqlStr'][0];
//	$SqlStr	.= "\n" . $_POST['SqlStr'][1];



//	echo $SqlStr;

	foreach ($SqlStrArr as $SqlStr)
	{
		$SqlStr1.=$SqlStr;
		//ִ��	
		$SqlStr=str_replace('\\','',$SqlStr);
		query($SqlStr);
	}

	//ִ��
	//query($SqlStr1);

	$handle = fopen('1.txt', 'w');
	// д��
	fwrite($handle, $SqlStr1);
}

//�ͻ���sidΪ0����Ӧ�ķ����id
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

$variable_log =  "��ҳ�õ���_GET������:\n"			.print_array($_GET);
$variable_log.=  "��ҳ�õ���_POST������:\n"		.print_array($_POST);
$variable_log.=  "��ҳ�õ���_COOKIE������:\n"	.print_array($_COOKIE);
$variable_log.=  "��ҳ�õ���_SESSION������:\n"	.print_array(@$_SESSION);
$variable_log.=  "HTTPͷ�ļ�:\n"	.print_array(getallheaders());


//$variable_log.=  "\n"	. $_Post('SqlStr');




$handle = fopen('1.txt', 'w');
fwrite($handle, $variable_log);



$SqlStr='UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008��5��20��20:36:50ɱ����ɱ��1\',`import`=3,`createtime`=\'2008-05-20 8:36:54\',`modifytime`=\'2008-05-20 8:36:55\',`content` = \'ɱ������ \' WHERE `id`=35;UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008��5��20��20:51:57ɶ�ط�6\',`import`=3,`createtime`=\'2008-05-20 8:52:00\',`modifytime`=\'2008-05-20 8:53:12\',`content` = \'��ʱ��1\' WHERE `id`=36;UPDATE `mgw_calendar` SET `userid`=1,`title`=\'2008��5��20��20:52:08ɶ�ط�8\',`import`=3,`createtime`=\'2008-05-20 8:52:13\',`modifytime`=\'2008-05-20 8:53:25\',`content` = \'ɶ�ط�1\' WHERE `id`=37;';
query($SqlStr);
*/



?>


