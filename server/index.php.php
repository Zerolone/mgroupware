
<DIV class="area top left" id=first>
  <H2>���˹����ƻ�����</H2>
  <UL id=firstlist>
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
  <SPAN><a href="calendar_add.php"><img src="images/add.png" width="16" height="16" border="0" />���</a>|<a href="calendar.php"><img src="images/more.png" width="16" height="16" border="0" />����</a></span></DIV>
<DIV class="area top right" id=second>
  <H2>ָ������</H2>
  <UL id=secondlist>
    <LI>�Ż���ҳ</LI>
    <LI><a href="#">����ϼ�����</a></LI>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />���</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />����</a></span> </DIV>
<DIV class="area bottom left" id=third>
  <H2>Эͬ����</H2>
  <UL id=thirdlist>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />���</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />����</a></span> </DIV>
<DIV class="area bottom right" id=fourth>
  <H2>�����ĵ�</H2>
  <UL id=fourthlist>
    <LI><a href="#">php_manual_zh.chm</a></LI>
    <LI><a href="#">jquery.rar</a></LI>
    <LI><a href="#">����PHP��̬������.pdf</a></LI>
    <LI><a href="#">PHP���׼�PHP���ݿ��̼���.rar</a></LI>
    <LI><a href="#">PHP5ѧϰ�̳�.chm</a></LI>
    <LI><a href="#">��phpд�˸��򵥵���֤���ƽ����.mht</a></LI>
    <LI><a href="#">�� PHP 4 ��ֲ�� PHP 5.doc</a></LI>
    <LI><a href="#">Core PHP Programming, Third Edition.doc</a></LI>
    <LI><a href="#">����û�н���20����.mpg</a></LI>
    <LI><a href="#">LINUX ѧϰ�������鼮��shell+LAMP+dns+mail+proxy+programmi...</a></LI>
  </UL>
  <SPAN><a href="#"><img src="images/add.png" width="16" height="16" border="0" />���</a>|<a href="#"><img src="images/more.png" width="16" height="16" border="0" />����</a></span></DIV>
<DIV id=footer>��<?=$site_tested?>��<?=$site_copyright?>��<?=$site_version?>��Code &copy; 2008��<?=$site_cert?>��</SPAN> </DIV>
</body>
</html>
