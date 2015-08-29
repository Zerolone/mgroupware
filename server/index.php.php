
<DIV class="area top left" id=first>
  <H2>个人工作计划安排</H2>
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
  <SPAN><a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="calendar.php"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span></DIV>
<DIV class="area top right" id=second>
  <H2>指派任务</H2>
  <UL id=secondlist>
    <LI>优化网页</LI>
    <LI><a href="#">完成上级安排</a></LI>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span> </DIV>
<DIV class="area bottom left" id=third>
  <H2>协同工作</H2>
  <UL id=thirdlist>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span> </DIV>
<DIV class="area bottom right" id=fourth>
  <H2>共享文档</H2>
  <UL id=fourthlist>
    <LI><a href="#">php_manual_zh.chm</a></LI>
    <LI><a href="#">jquery.rar</a></LI>
    <LI><a href="#">国外PHP动态第六期.pdf</a></LI>
    <LI><a href="#">PHP进阶及PHP数据库编程技术.rar</a></LI>
    <LI><a href="#">PHP5学习教程.chm</a></LI>
    <LI><a href="#">用php写了个简单的验证码破解程序.mht</a></LI>
    <LI><a href="#">从 PHP 4 移植到 PHP 5.doc</a></LI>
    <LI><a href="#">Core PHP Programming, Third Edition.doc</a></LI>
    <LI><a href="#">爱情没有界限20分钟.mpg</a></LI>
    <LI><a href="#">LINUX 学习方法、书籍：shell+LAMP+dns+mail+proxy+programmi...</a></LI>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />添加</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />更多</a></span></DIV>
<DIV id=footer>｜<?=$site_tested?>｜<?=$site_copyright?>｜<?=$site_version?>｜Code &copy; 2008｜<?=$site_cert?>｜</SPAN> </DIV>
</body>
</html>
