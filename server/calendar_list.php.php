<script language="JavaScript">
function goto(pagenum)
{
	calendar_list_frm.pagenum.value	= pagenum;
//	alert(pagenum);
	calendar_list_frm.submit();
}
</script>
<DIV class="areall top left" id=l<?=$isdone?>>
  <H2><?=$isdone_text?></H2>
  <UL id=list>
		<?php
		if(isset($calendar_list))
		{
			foreach ($calendar_list as $calendar)
			{
		?>	
    <LI><a href="calendar_done.php?id=<?=$calendar['id']?>&mode=done"><img src="images/done.png" alt="������" border="0"></a><a href="calendar_delete.php?id=<?=$calendar['id']?>&mode=delete"><img src="images/delete.png" alt="���ɾ��" border="0"></a><?=$calendar['import']?><a href="calendar_edit.php?id=<?=$calendar['id']?>&mode=edit"><img src="images/edit.png" alt="�޸�" border="0"></a><a href="javascript:calendar_show('<?=$calendar['id']?>')"><?=$calendar['title']?></a></LI>
		<?php
			}
		}
		?>
  </UL>
  <SPAN>
<form method="get" action="" style="MARGIN-BOTTOM:0px" name="calendar_list_frm">
       <input type="hidden" name="pagenum" value="<?=$pagenum?>">
       <input type="hidden" name="isdone" value="<?=$isdone?>">
			<a href="javascript:goto('1');" title="��һҳ"><b>|&lt;</b></a>  <a href="javascript:goto('<?=$pagenum_up?>');" title="��һҳ"><b>&lt;</b></a> 
			<?
			if(isset($beginlist))
			{
			foreach ($beginlist as $begin)
			{
			?>
			<a href="javascript:goto('<?=$begin[0]?>');" title="��<?=$begin[0]?>ҳ">[<?=$begin[0]?>]</a>
			<?
			}
			}
			?> [<font color="red"><?=$pagenum?></font>] 
			<?
			if(isset($endlist))
			{
			foreach ($endlist as $end)
			{
			?>
			<a href="javascript:goto('<?=$end[0]?>');" title="��<?=$end[0]?>ҳ">[<?=$end[0]?>]</a>
			<?
			}
			}
			?>
			<a href="javascript:goto('<?=$pagenum_down?>');" title="��һҳ"><b>&gt;</b></a> <a href="javascript:goto('<?=$pagend?>');" title="��<?=$pagend?>ҳ"><b>&gt;|</b></a>&nbsp;
					<strong><font color=red><?=$pagenum?></font>/<?=$pagecount?></strong>ҳ&nbsp;<b><font color="#FF0000"><?=$recordcount?></font></b>����¼&nbsp;<b><?=$pagesize?></b>��/ҳ&nbsp;
	<a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />���</a>|<a href="calendar.php"><img src="images/more.png" width="16" height="16" border="0" />����</a>
</form>	
	</span>
</DIV>
<DIV id=footer>��<?=$site_tested?>��<?=$site_copyright?>��<?=$site_version?>��Code &copy; 2008��<?=$site_cert?>��</SPAN> </DIV>
</body>
</html>
