<?php
/*Zerolone Add 07-04-23
//链接数据库
*/
connect_db(db_host, db_user, db_pass, db_name);
query("SET NAMES 'gb2312'");

	//Zerolone Add-Begin 20060306

	function connect_host($db_host, $db_user, $db_pass)
	{
		if (!@mysql_connect($db_host, $db_user, $db_pass))
		{
			error_alert("数据库错误",$db_host,"不能连接数据库主机");
		}
	}
	
	function connect_db($db_host, $db_user, $db_pass, $db_name)
	{
		if ($connection = mysql_pconnect($db_host, $db_user, $db_pass))
		{
			if (!mysql_select_db($db_name, $connection))
			{
				error_alert("数据库错误",$db_name,"没有找到数据库名");
			}
		}
		else
		{
			error_alert("数据库错误",$db_host,"不能连接");
		}
		return $connection;
	}
	
	//查询
	function query($query)
	{
	  global $query_count, $query_log;
	  $query_count++;
	  $query_log .= "$query\n";
	  return mysql_query($query);
	}
	
	//显示
	function nqfetch($query)
	{
	  return mysql_fetch_array($query);
	}
	
	//-----------------------------------------------
	/**
	//作者:Zerolone
	//日期:20070421
	//功能:打印数组，也是为了调试信息用
	//返回:数组显示字符串
	* @param  $TheArray		数组
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
	//作者:Zerolone
	//日期:20060306
	//修改:20070421 -- 添加变量调试信息
	//功能:显示调试信息
	//返回:
	*/	
	function printDebug()
	{
	  global $totaltime, $query_count, $show_queries, $query_log;	  
	  $ThisPage	= $_SERVER['PHP_SELF'];

		//变量调试信息 20070421
		$variable_log =  "本页得到的_GET变量有:\n"			.print_array($_GET);
		$variable_log.=  "本页得到的_POST变量有:\n"		.print_array($_POST);
		$variable_log.=  "本页得到的_COOKIE变量有:\n"	.print_array($_COOKIE);
		$variable_log.=  "本页得到的_SESSION变量有:\n"	.print_array(@$_SESSION);
		$variable_log.=  "HTTP头文件:\n"	.print_array(getallheaders());
		//

	  return  "当前页面为：$ThisPage [<a href=\"javascript:history.go(0);\">刷新该页面</a>]
	  <script language=\"javascript\" type=\"text/javascript\">
		function showdebug(span_show, span_source)
		{
			var TheImg;
			span_show	= eval(span_show);
	  		span_source	= eval(span_source)
		
			if(span_show.style.display == \"none\")
			{
				span_show.style.display = \"\";
	 			span_source.innerHTML	= \"<font color=\'blue\'>关闭</font>调试信息\"; 
			}
			else
			{
				span_show.style.display = \"none\";
	 			span_source.innerHTML	= \"<font color=\'red\'>打开</font>调试信息\"; 
			}
		}
	  </script>
	  <span id=debug_source onClick=showdebug('debug_show','debug_source')><font color=\"red\">打开</font>调试信息</span><br>
	  <!-- <span id=debug_source onClick=showdebug('debug_show','debug_source')><font color=\"blue\">关闭</font>调试信息</span><br> -->
	  <div align=\"left\"><span id=debug_show style=\"display=none\">
				<textarea style='width=800;height=500' cols='100' rows='8'>$query_log$variable_log</textarea>
	  </span>
	  </div>
	  ";	  
	}	
?>