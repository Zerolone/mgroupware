<?php
/*
ҳ�湦�ܣ�calendar����ҳ��
�������ڣ�2008��5��7��22:33:44
�޸����ڣ�
��    �ߣ�Zerolone
��    ҳ��http://www.zerolone.com/
*/

require('include/common.inc.php');
$page_name	= 'include/refresh.php';
$refresh_msg	= '[<font color=blue>���ɹ�</font>]��������ҳ��';


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

	//�����û�
	$SqlL .= "`userid`,";
	$SqlR .= $userid . ',';

	//����
	$SqlL .= '`title`,';
	$SqlR .= '\'' . $title . '\',';

	//�ؼ���
	$SqlL .= "`import`,";
	$SqlR .= $import . ',';

	//�ύʱ��
	$SqlL .= "`createtime`,";
	$SqlR .= '\'' . date("Y-m-d g:i:s") . '\',';

	//�޸�ʱ��
	$SqlL .= "`modifytime`,";
	$SqlR .= '\'' . date("Y-m-d g:i:s") . '\',';
	
	//����
	$SqlL .= "`content`)";
	$SqlR .= "'". $content ."')";

	query($SqlL.$SqlR);

	$refresh_msg	= '���˹����ƻ����ţ�[<font color=red>'.$title.'</font>]����ӳɹ�����ת����ҳ��';

	//����Ա��־
	$log_content			= '���˹����ƻ����Ź��� &gt;&gt; ��� &gt;&gt; ��'. $title .'��';
}

if($mode=='edit')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//����
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//�ؼ���
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//�޸�ʱ��
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//����
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);

		$refresh_msg	= '<br>���˹����ƻ����ţ�[<font color=red>'.$title.'</font>]���޸ĳɹ���';
		//����Ա��־
		$log_content			= '���˹����ƻ����Ź��� &gt;&gt; �޸� &gt;&gt; ��'. $title .'��';
}

if($mode=='done')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//����
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//�ؼ���
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '1,';

	//�޸�ʱ��
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//����
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '���˹����ƻ����ţ�[<font color=red>'.$title.'</font>]�������ɳɹ���';
	//����Ա��־
	$log_content			= '���˹����ƻ����Ź��� &gt;&gt; ������ &gt;&gt; ��'. $title .'��';
}

if($mode=='delete')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//����
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//�ؼ���
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '2,';

	//�޸�ʱ��
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//����
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '���˹����ƻ����ţ�[<font color=red>'.$title.'</font>]�����ɾ���ɹ���';
	//����Ա��־
	$log_content			= '���˹����ƻ����Ź��� &gt;&gt; ���ɾ�� &gt;&gt; ��'. $title .'��';
}

if($mode=='undone')
{
	$SqlL = 'UPDATE `'.table_pre.'calendar` SET';
	
	//����
	$SqlL .= '`title`=';
	$SqlL .= '\'' . $title . '\',';
	
	//�ؼ���
	$SqlL .= '`import`=';
	$SqlL .= $import . ',';

	//isdone
	$SqlL .= '`isdone`=';
	$SqlL .= '0,';

	//�޸�ʱ��
	$SqlL .= '`modifytime`=';
	$SqlL .= '\'' . date("Y-m-d g:i:s") . '\',';

	//����
	$SqlL .= "`content`=";
	$SqlL .= "'". $content ."'";
	
	$SqlL.=  ' WHERE `id`=' . $id;
	query($SqlL);	
	
	$refresh_msg	= '���˹����ƻ����ţ�[<font color=red>'.$title.'</font>]�����δ��ɳɹ���';
	//����Ա��־
	$log_content			= '���˹����ƻ����Ź��� &gt;&gt; ���δ��� &gt;&gt; ��'. $title .'��';
}

require($page_name.'.php');

require('include/debug.inc.php');
require('include/log.inc.php');
?>