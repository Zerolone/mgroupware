<DIV class="area top left" id=first>
  <H2>未完成(<?=$calendar_list_count?>条)</H2>
  <UL id=firstlist>
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
  <SPAN><a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar_list.php?isdone=0"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span>
</DIV>
<DIV class="area top right" id=second>
  <H2>已完成(<?=$calendar_list_done_count?>条)</H2>
  <UL id=secondlist>
		<?php
		if(isset($calendar_list_done))
		{
			foreach ($calendar_list_done as $calendar)
			{
		?>	
    <LI><a href="calendar_undone.php?id=<?=$calendar['id']?>&mode=undone"><img src="images/add.png" alt="标记为未完成" width="16" height="16" border="0" /></a><a href="calendar_delete.php?id=<?=$calendar['id']?>&mode=delete"><img src="images/delete.png" alt="标记删除" border="0"></a><?=$calendar['import']?><a href="calendar_edit.php?id=<?=$calendar['id']?>&mode=edit"><img src="images/edit.png" alt="修改" border="0"></a><a href="javascript:calendar_show('<?=$calendar['id']?>')"><?=$calendar['title']?></a></LI>
		<?php
			}
		}
		?>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar_list.php?isdone=1"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span> </DIV>
<DIV class="area bottom left" id=third>
  <H2>已删除(<?=$calendar_list_delete_count?>条)</H2>
  <UL id=thirdlist>
		<?php
		if(isset($calendar_list_delete))
		{
			foreach ($calendar_list_delete as $calendar)
			{
		?>	
    <LI><a href="calendar_done.php?id=<?=$calendar['id']?>&mode=done"><img src="images/done.png" alt="标记完成" border="0"></a><a href="calendar_undone.php?id=<?=$calendar['id']?>&mode=undone"><img src="images/add.png" alt="标记为未完成" width="16" height="16" border="0" /></a><?=$calendar['import']?><a href="calendar_edit.php?id=<?=$calendar['id']?>&mode=edit"><img src="images/edit.png" alt="修改" border="0"></a><a href="javascript:calendar_show('<?=$calendar['id']?>')"><?=$calendar['title']?></a></LI>
		<?php
			}
		}
		?>	
  </UL>
  <SPAN><a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar_list.php?isdone=2"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span></DIV>
<DIV class="area bottom right" id=fourth>
  <H2>所有计划安排(<?=$calendar_list_all_count?>条)</H2>
  <UL id=fourthlist>
		<?php
		if(isset($calendar_list_all))
		{
			foreach ($calendar_list_all as $calendar)
			{
		?>	
    <LI><?=$calendar['import']?><a href="javascript:calendar_show('<?=$calendar['id']?>')"><?=$calendar['title']?></a></LI>
		<?php
			}
		}
		?>	
  </UL>
  <SPAN><a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar_list.php"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span></DIV>
<DIV id=footer>｜<?=$site_tested?>｜<?=$site_copyright?>｜<?=$site_version?>｜Code &copy; 2008｜<?=$site_cert?>｜</SPAN> </DIV>
</body>
</html>
