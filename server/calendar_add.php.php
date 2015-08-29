<?php $refresh_url	= $_SERVER['HTTP_REFERER']; ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="Content-Language" content="zh-CN" />
<!--样式表-->
<link rel="stylesheet"  href="css/manage.css" type="text/css" >
<script language="javascript" src="js/all.js"></script>
<script language="javascript" src="js/edit.js"></script>
<script language="javascript">
function update_check()
{
  var check_title		= document.add_link_frm.title;
  if (check_title.value == "")
  {
		alert("请输入文章标题！");
		check_title.focus();
		return false;
	}
	
	add_link_frm.action 			= "calendar_update.php?";
	add_link_frm.target				=	"_self";
	add_link_frm.content.value	= frames.monolith_article_body.document.body.innerHTML;
	add_link_frm.submit();
}

</script>
<title>添加工作计划-MGroupware</title>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
  <tr bgcolor="#6A6A6A">
    <td colspan="2" height="26"><b><font color="#FFFFFF">&nbsp;工作计划管理 &gt;&gt; 工作计划添加</font></b></td>
  </tr>
  <form name="add_link_frm" method="POST">
    <tr>
      <td align="right" width="100" bgcolor="#999999" height="20"><font color="#FFFFFF">标题：</font></td>
      <td bgcolor="#FFFFFF"><input name="title" type="text" class="inputbox" id="title" value="<?=$title?>" size="40" maxlength="150" />
        关键度：
        <select name="import" id="import">
          <?php
					for($i=1;$i<=5;$i++)
					{
					?>
          <option value="<?=$i?>" <?php if($import==$i) echo 'selected' ?> ><?=$i?></option>
          <?
					}
					?>
        </select>
      </td>
    </tr>
		<tr>
		<td bgcolor="#999999">		</td>
		<td><? require('article_banner.inc.php');?></td>
		</tr>
    <tr>
      <td width="100" height="20" rowspan="2" align="right" bgcolor="#999999"><font color="#FFFFFF">详细内容：</font></td>
      <td bgcolor="#FFFFFF"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" height=375><? require('article_content.inc.php');?></td>
    </tr>
    <tr>
      <td bgcolor="#999999"></td>
      <td bgcolor="#FFFFFF"><input type="hidden" name="content" />
        <input type="hidden" name="mode" value="<?=$mode?>" />
        <input type="hidden" name="id" value="<?=$id?>" />
        <input type="hidden" name="refresh_url" value="<?=$refresh_url?>" />
        <input type="button" value="<?=$mode_title?>" name="B1" class="inputbox" accesskey="Y" onClick="update_check();" />
        <input type="reset" value=" 重 置 (Alt + N) " name="B2" class="inputbox" accesskey="N" /></td>
    </tr>
  </form>
</table>
