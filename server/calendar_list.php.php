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
    <LI><a href="calendar_done.php?id=<?=$calendar['id']?>&mode=done"><img src="images/done.png" alt="标记完成" border="0"></a><a href="calendar_delete.php?id=<?=$calendar['id']?>&mode=delete"><img src="images/delete.png" alt="标记删除" border="0"></a><?=$calendar['import']?><a href="calendar_edit.php?id=<?=$calendar['id']?>&mode=edit"><img src="images/edit.png" alt="修改" border="0"></a><a href="javascript:calendar_show('<?=$calendar['id']?>')"><?=$calendar['title']?></a></LI>
		<?php
			}
		}
		?>
  </UL>
  <SPAN>
<form method="get" action="" style="MARGIN-BOTTOM:0px" name="calendar_list_frm">
       <input type="hidden" name="pagenum" value="<?=$pagenum?>">
       <input type="hidden" name="isdone" value="<?=$isdone?>">
			<a href="javascript:goto('1');" title="第一页"><b>|&lt;</b></a>  <a href="javascript:goto('<?=$pagenum_up?>');" title="上一页"><b>&lt;</b></a> 
			<?
			if(isset($beginlist))
			{
			foreach ($beginlist as $begin)
			{
			?>
			<a href="javascript:goto('<?=$begin[0]?>');" title="第<?=$begin[0]?>页">[<?=$begin[0]?>]</a>
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
			<a href="javascript:goto('<?=$end[0]?>');" title="第<?=$end[0]?>页">[<?=$end[0]?>]</a>
			<?
			}
			}
			?>
			<a href="javascript:goto('<?=$pagenum_down?>');" title="下一页"><b>&gt;</b></a> <a href="javascript:goto('<?=$pagend?>');" title="第<?=$pagend?>页"><b>&gt;|</b></a>&nbsp;
					<strong><font color=red><?=$pagenum?></font>/<?=$pagecount?></strong>页&nbsp;<b><font color="#FF0000"><?=$recordcount?></font></b>条记录&nbsp;<b><?=$pagesize?></b>条/页&nbsp;
	<a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar.php"><img src="images/more.png" width="16" height="16" border="0" />更多</a>
</form>	
	</span>
</DIV>
<DIV id=footer>｜<?=$site_tested?>｜<?=$site_copyright?>｜<?=$site_version?>｜Code &copy; 2008｜<?=$site_cert?>｜</SPAN> </DIV>
</body>
</html>
