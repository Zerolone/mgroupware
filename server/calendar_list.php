<?php
/*
ҳ�湦�ܣ�calendar_list
�������ڣ�2008��5��20��20:44:43
�޸����ڣ�
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
*/
require('include/common.inc.php');

$page_name	= 'calendar_list.php';

$isdone=3;
if (isset($_GET['isdone']))
{
	$isdone	= $_GET['isdone'];
}

//isdone_text
//��ʾ����
switch ($isdone)
{
	case 0:
		$isdone_text='δ���';
		break;
	case 1:
		$isdone_text='�����';
		break;
	case 2:
		$isdone_text='��ɾ��';
		break;
	case 3:
		$isdone_text='���мƻ�����';
		break;
}

//��ȡҳ��
$pagenum 	= 1;
if (isset($_GET['pagenum']))
{
	$pagenum 	= $_GET['pagenum'] ;
}

//��ǰҳ
$thispagenum	= $pagenum;

//ҳ���¼��
$pagesize 	= 24 ;

//��ʾ��ҳ��
$showrs			= 5;

//���ҳ��
$maxpagelimit = 50;

/*
�����ܼ�¼��
//�����Ϊ��ȡ���ݿ����Ŀ��¼������Ƹ���
//*/

//-------------------0------1---------2
$SqlStr = 'SELECT COUNT( * ) FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
if ($isdone <> 3)
{
	$SqlStr.= ' AND `isdone`='. $isdone;
}

$temp_query 	= query($SqlStr);
$DB_Record = nqfetch($temp_query);

//�ܼ�¼
$recordcount	= $DB_Record[0];

//��ҳ��
$pagecount		= ceil($recordcount / $pagesize);
//*/

//����ƶ���
$pagend	= $pagenum+$maxpagelimit;
if($pagend > $pagecount)
{
	$pagend	= $pagecount;
}

/*
��ʾǰ���ҳ
�ǿ���ʾ
Ϊ������
//*/

if (isset($_GET['pagenum']))
{
	$pagenum 	= $_GET['pagenum'] ;
	if($pagenum==1)
	{
		$pagenum_up	= 1;
	}
	else
	{
		$pagenum_up = $pagenum-1;
	}
	//		$articleid = $articleid - $pagenum*$pagesize;
}
else
{
	$pagenum 	= 1;
	$pagenum_up	= 1;
}

$pagenum_down	= $pagenum+1;
if ($pagenum > $pagecount)
{
	$pagenum_down	= $pagenum + 1;
}

//�����б�
//-------------------0------1---------2
$SqlStr = ' SELECT `id`, `title`, `import` FROM `'. table_pre . 'calendar` WHERE `userid`='.$userid;
if ($isdone <> 3)
{
	$SqlStr.= ' AND `isdone`='. $isdone;
}
$SqlStr.= ' ORDER BY `import` DESC , `createtime` ASC';
$SqlStr.= ' LIMIT '. $pagesize * ($pagenum-1) .' ,'.$pagesize.';';
$temp_query = query($SqlStr);
while($DB_Record = nqfetch($temp_query))
{
	$calendar_title		= subString($DB_Record[1],126);

	//�ؼ�����ɫ
	$calendar_import	= $DB_Record[2];
	switch ($calendar_import)
	{
		case 1:
			$calendar_import_color="#000000";
			break;
		case 2:
			$calendar_import_color="#00FF00";
			break;
		case 3:
			$calendar_import_color="#0000FF";
			break;
		case 4:
			$calendar_import_color="#FF9966";
			break;
		case 5:
			$calendar_import_color="#FF0000";
			break;
	}

	$calendar_import_str	= '<font color='.$calendar_import_color.'>��'.$calendar_import.'��</font>';

	$calendar_list[] = array(
	'0' 					=> $DB_Record[0],
	'id' 					=> $DB_Record[0],
	'1' 					=> $calendar_title,
	'title'				=> $calendar_title,
	'2' 					=> $calendar_import_str,
	'import'			=> $calendar_import_str
	);
}

//��ʾǰ��
if ($pagenum>1)
{
	$pagenum_end = $pagenum - 1;
	if(($pagenum - $showrs)>1)
	{
		$pagenum_begin	= $pagenum - $showrs;
	}
	else
	{
		$pagenum_begin	= 1;
	}

	for($i=$pagenum_begin;$i<=$pagenum_end;$i++)
	{
		$beginlist[]= array( $i );
	}

}

//��ʾ�����
if($pagecount>$pagenum)
{
	$pagenum_begin	= $pagenum + 1;
	if($pagecount>($pagenum_begin + $showrs))
	{
		$pagenum_end	= $pagenum_begin + $showrs;
	}
	else
	{
		$pagenum_end	= $pagecount;
	}

	for($i=$pagenum_begin;$i<=$pagenum_end;$i++)
	{
		$endlist[]= array( $i );
	}
}

require('head.php.php');
require($page_name.'.php');
require('include/debug.inc.php');
?>