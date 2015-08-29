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
			echo '<br><br><hr color="#999999" size=1>完成时间：';
			echo date("Y年m月d日 g点i分s秒 A");
			echo '<br>完成说明：';
			echo '<hr color="#999999" size=1>';
		}
		elseif ($mode=='delete')
		{
			echo '<br><br><hr color="#999999" size=1>删除时间：';
			echo date("Y年m月d日 g点i分s秒 A");
			echo '<br>删除说明：';
			echo '<hr color="#999999" size=1>';
		}
		elseif ($mode=='edit')
		{
			echo '<hr color="#999999" size=1>编辑时间：';
			echo date("Y年m月d日 g点i分s秒 A");
		}
		elseif ($mode=='undone') 
		{
			echo '<br><br><hr color="#999999" size=1>编辑时间：';
			echo date("Y年m月d日 g点i分s秒 A");
			echo '<br>编辑说明：';
			echo '<hr color="#999999" size=1>';
		}
		
	}
}
?>