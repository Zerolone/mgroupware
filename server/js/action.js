/*
'-----------------------------------------------
'作者:Zerolone ---------------------------------
'日期:2008年5月7日23:11:40----------------------
'功能:显示个人工作计划安排 ---------------------
'参数:------------------------------------------
'-----------------------------------------------
*/
function calendar_show(id)
{
 // open("calendar_show.php?id="+id, "", "dialogWidth:700px; dialogHeight:500px;status:0;help:0;");
	
  showModalDialog("calendar_show.php?id="+id, "", "dialogWidth:700px; dialogHeight:600px; status:0;help:0");
}

