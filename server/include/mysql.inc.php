<?php
/*Zerolone Add 07-04-23
//�������ݿ�
*/
connect_db(db_host, db_user, db_pass, db_name);
query("SET NAMES 'gb2312'");

	//Zerolone Add-Begin 20060306

	function connect_host($db_host, $db_user, $db_pass)
	{
		if (!@mysql_connect($db_host, $db_user, $db_pass))
		{
			error_alert("���ݿ����",$db_host,"�����������ݿ�����");
		}
	}
	
	function connect_db($db_host, $db_user, $db_pass, $db_name)
	{
		if ($connection = mysql_pconnect($db_host, $db_user, $db_pass))
		{
			if (!mysql_select_db($db_name, $connection))
			{
				error_alert("���ݿ����",$db_name,"û���ҵ����ݿ���");
			}
		}
		else
		{
			error_alert("���ݿ����",$db_host,"��������");
		}
		return $connection;
	}
	
	//��ѯ
	function query($query)
	{
	  global $query_count, $query_log;
	  $query_count++;
	  $query_log .= "$query\n";
	  return mysql_query($query);
	}
	
	//��ʾ
	function nqfetch($query)
	{
	  return mysql_fetch_array($query);
	}
	
	//-----------------------------------------------
	/**
	//����:Zerolone
	//����:20070421
	//����:��ӡ���飬Ҳ��Ϊ�˵�����Ϣ��
	//����:������ʾ�ַ���
	* @param  $TheArray		����
	*/	
	function print_array( $TheArray )
	{
		$TmpStr	= '';
		$TmpStr.= "Array\n{\n";
		if(isset($TheArray))
		{
			foreach( $TheArray as $Key => $value)
			{
				$TmpStr.= '    ['.$Key.']	=> '.$value."\n";
			}
		}
		$TmpStr.= "}\n";
		return $TmpStr;
	}

	//-----------------------------------------------
	/**
	//����:Zerolone
	//����:20060306
	//�޸�:20070421 -- ��ӱ���������Ϣ
	//����:��ʾ������Ϣ
	//����:
	*/	
	function printDebug()
	{
	  global $totaltime, $query_count, $show_queries, $query_log;	  
	  $ThisPage	= $_SERVER['PHP_SELF'];

		//����������Ϣ 20070421
		$variable_log =  "��ҳ�õ���_GET������:\n"			.print_array($_GET);
		$variable_log.=  "��ҳ�õ���_POST������:\n"		.print_array($_POST);
		$variable_log.=  "��ҳ�õ���_COOKIE������:\n"	.print_array($_COOKIE);
		$variable_log.=  "��ҳ�õ���_SESSION������:\n"	.print_array(@$_SESSION);
		$variable_log.=  "HTTPͷ�ļ�:\n"	.print_array(getallheaders());
		//

	  return  "��ǰҳ��Ϊ��$ThisPage [<a href=\"javascript:history.go(0);\">ˢ�¸�ҳ��</a>]
	  <script language=\"javascript\" type=\"text/javascript\">
		function showdebug(span_show, span_source)
		{
			var TheImg;
			span_show	= eval(span_show);
	  		span_source	= eval(span_source)
		
			if(span_show.style.display == \"none\")
			{
				span_show.style.display = \"\";
	 			span_source.innerHTML	= \"<font color=\'blue\'>�ر�</font>������Ϣ\"; 
			}
			else
			{
				span_show.style.display = \"none\";
	 			span_source.innerHTML	= \"<font color=\'red\'>��</font>������Ϣ\"; 
			}
		}
	  </script>
	  <span id=debug_source onClick=showdebug('debug_show','debug_source')><font color=\"red\">��</font>������Ϣ</span><br>
	  <!-- <span id=debug_source onClick=showdebug('debug_show','debug_source')><font color=\"blue\">�ر�</font>������Ϣ</span><br> -->
	  <div align=\"left\"><span id=debug_show style=\"display=none\">
				<textarea style='width=800;height=500' cols='100' rows='8'>$query_log$variable_log</textarea>
	  </span>
	  </div>
	  ";	  
	}	
?>