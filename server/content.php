<?php
require('include/common.inc.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
$id	= $_GET['id'];
$mode=$_GET['mode'];

if($id!=0)
{
	//--------------------0
	$SqlStr = 'SELECT `content` FROM `'.table_pre.'calendar` WHERE id='.$id;
	$temp_query = query($SqlStr);
	if($DB_Record = nqfetch($temp_query))
	{
		echo $DB_Record[0];
		
		if ($mode=='done') 
		{
			echo '<br><br><hr color="#999999" size=1>���ʱ�䣺';
			echo date("Y��m��d�� g��i��s�� A");
			echo '<br>���˵����';
			echo '<hr color="#999999" size=1>';
		}
		elseif ($mode=='delete')
		{
			echo '<br><br><hr color="#999999" size=1>ɾ��ʱ�䣺';
			echo date("Y��m��d�� g��i��s�� A");
			echo '<br>ɾ��˵����';
			echo '<hr color="#999999" size=1>';
		}
		elseif ($mode=='edit')
		{
			echo '<hr color="#999999" size=1>�༭ʱ�䣺';
			echo date("Y��m��d�� g��i��s�� A");
		}
		elseif ($mode=='undone') 
		{
			echo '<br><br><hr color="#999999" size=1>�༭ʱ�䣺';
			echo date("Y��m��d�� g��i��s�� A");
			echo '<br>�༭˵����';
			echo '<hr color="#999999" size=1>';
		}
		
	}
}
?>