<?php
/*
页面功能：calendar操作页面
创建日期：2008年5月7日22:33:44
修改日期：
作    者：Zerolone
主    页：http://www.zerolone.com/
*/

require('include/common.inc.php');
$page_name	= 'include/refresh.php';
$refresh_msg	= '[<font color=blue>不成功</font>]，返回首页。';


$refresh_url	= 'index.php';
if (isset($_POST['refresh_url']))
{
	$refresh_url	= $_POST['refresh_url'];
}

$mode='add';
if (isset($_POST['mode']))
{
	$mode	= $_POST['mode'];
}
elseif (isset($_GET['mode']))
{
	$mode	= $_GET['mode'];
}

$id			= 0;
if (isset($_POST['id']))
{
	$id			= $_POST['id'];
}
elseif (isset($_GET['id']))
{
	$id			= $_GET['id'];
}

$title			= '';
if (isset($_POST['title']))
{
	$title			= $_POST['title'];
}

$content='';
if(isset($_POST['content']))
{
	$content		= $_POST['content'];
}

$import			=1;
if(isset($_POST['import']))
{
	$import			= $_POST['import'];
}

if($mode=='add')
{
	$SqlL = 'insert into `'.table_pre.'calendar` (';
	$SqlR = 'values (';

	//所属用户
	$SqlL .= "`userid`,";
	$SqlR .= $userid . ',';

	//标题
	$SqlL .= '`title`,';
	$SqlR .= '\'' . $title . '\',';

	//关键度
	$SqlL .= "`import`,";
	$SqlR .= $import . ',';

	//提交时间
	$SqlL .= "`createtime`,";
	$SqlR .= '\'' . date("Y-m-d g:i:s") . '\',';

	//修改时间
	$SqlL .= "`modifytime`,";
	$SqlR .= '\'' . date("Y-m-d g:i:s") . '\',';
	
	//内容
	$SqlL .= "`content`)";
	$SqlR .= "'". $content ."')";

	query($SqlL.$SqlR);

	$refresh_msg	= '个人工作计划安排：[<font color=red>'.$title.'</font>]，添加成功，跳转到首页。';

	//管理员日志
	$log_content			= '个人工作计划安排管理 &gt;&gt; 添加 &gt;&gt; 【'. $title .'】';
}

if($mode=='edit')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//标题
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//关键度
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//修改时间
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//内容
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);

		$refresh_msg	= '<br>个人工作计划安排：[<font color=red>'.$title.'</font>]，修改成功。';
		//管理员日志
		$log_content			= '个人工作计划安排管理 &gt;&gt; 修改 &gt;&gt; 【'. $title .'】';
}

if($mode=='done')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//标题
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//关键度
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '1,';

	//修改时间
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//内容
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '个人工作计划安排：[<font color=red>'.$title.'</font>]，标记完成成功。';
	//管理员日志
	$log_content			= '个人工作计划安排管理 &gt;&gt; 标记完成 &gt;&gt; 【'. $title .'】';
}

if($mode=='delete')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//标题
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//关键度
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '2,';

	//修改时间
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//内容
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '个人工作计划安排：[<font color=red>'.$title.'</font>]，标记删除成功。';
	//管理员日志
	$log_content			= '个人工作计划安排管理 &gt;&gt; 标记删除 &gt;&gt; 【'. $title .'】';
}

if($mode=='undone')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//标题
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//关键度
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '0,';

	//修改时间
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//内容
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '个人工作计划安排：[<font color=red>'.$title.'</font>]，标记未完成成功。';
	//管理员日志
	$log_content			= '个人工作计划安排管理 &gt;&gt; 标记未完成 &gt;&gt; 【'. $title .'】';
}

require($page_name.'.php');

require('include/debug.inc.php');
require('include/log.inc.php');
?>