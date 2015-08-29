<?php
//-----------------------------------------------
//作者:Zerolone ---------------------------------
//日期:20040923----------------------------------
//功能:根据参数进行空格--------------------------
//参数:integer-----------------------------------
//-----------------------------------------------
function LoopNBSP($num=1)
{
	$thestr="";
	for($i=0;$i<$num;$i++)
	{
		$thestr .= "&nbsp;";
	}
	return $thestr;
}

//-----------------------------------------------
//作者:Zerolone
//日期:20060211 (元宵)
//功能:计算两个时间相差
//参数:两个用microtime()得到的时间
//-----------------------------------------------
function getprocesstime($start_time="0 0")
{
	list($start_usec, $start_sec, $end_usec, $end_sec) = explode(" ",$start_time . " " . microtime());
	$temp1	= ((float)$start_usec + (float)$start_sec)*1000;
	$temp2	= ((float)$end_usec + (float)$end_sec)*1000;
	$temp		= $temp2-$temp1 ;
	$temp	 /= 1000;
	return number_format($temp, 4, '.', '');
}

//-----------------------------------------------
//作者:
//日期:20061026
//功能:显示状态值
//参数:0-2的整数
//-----------------------------------------------
function printFlag ( $flag )
{
	switch ( $flag )
	{
		case 0:
			return "<Font color=\"#FF0000\">未保存&nbsp;未发布</Font>";

		case 1:
			return "<Font color=\"#009900\">已保存</Font>&nbsp;<Font color=\"#FF0000\">未发布</Font>";

		case 2:
			return "<Font color=\"#009900\">已保存&nbsp;已发布</Font>";
	}
}

//-----------------------------------------------
//作者:
//日期:20061026
//功能:字符串截取
//参数:要截取的字符串，截取长度
//-----------------------------------------------
function subString ($string,$sublen)
{
	if($sublen>=strlen($string))
	{
		return $string;
	}
	$s="";
	for($i=0;$i<$sublen;$i++)
	{
		if(ord($string{$i})>127)
		{
			$s.=$string{$i}.$string{++$i};
			continue;
		}else{
			$s.=$string{$i};
			continue;
		}
	}
	return $s."...";
}

//-----------------------------------------------
//作者:
//日期:20061028
//功能:字符串编码
//参数:要编码的字符串
//-----------------------------------------------
function encode ( $str )
{
	$str= ereg_replace("<", "&lt;", $str);
	$str= ereg_replace(">", "&gt;", $str);
	$str= ereg_replace("'", "’", $str);
	$str= ereg_replace('"', '“', $str);
	return $str;
}

function encode2 ( $str )
{
	$str= ereg_replace("<", "&lt;", $str);
	$str= ereg_replace(">", "&gt;", $str);
	return $str;
}

//-----------------------------------------------
/**
//作者:Zerolone
//日期:20061109
//功能:字符串编码
//参数:要编码的字符串
* @param  $Content  要编码的字符串
*/
function EnCodeStr($Content)
{
	//替换空格
	$Content	= str_replace(" ", "[z_space]", $Content);

	//替换换行
	$Content	= str_replace("\r\n", "[z_newline]", $Content);

	//替换<>
	$Content	= str_replace("<", "[z_l]", $Content);
	$Content	= str_replace(">", "[z_r]", $Content);

	//替换Tab
	$Content	= str_replace(chr(9), "[z_tab]", $Content);

	//替换单双引号
	$Content	= str_replace("'", "[z_sq]", $Content);
	$Content	= str_replace('"', "[z_dq]", $Content);
	
	return $Content;
}

//-----------------------------------------------
/**
//作者:Zerolone
//日期:20061109
//功能:字符串解码
//参数:要解码的字符串
* @param  $Content  要解码的字符串
*/
function DeCodeStr($Content)
{
	//替换空格
	$Content	= str_replace("[z_space]", " ", $Content);

	//替换换行
	$Content	= str_replace("[z_newline]", "\r\n", $Content);

	//替换<>
	$Content	= str_replace("[z_l]", "<", $Content);
	$Content	= str_replace("[z_r]", ">", $Content);

	//替换Tab
	$Content	= str_replace("[z_tab]", chr(9), $Content);

	//替换单双引号
	$Content	= str_replace("[z_sq]", "'", $Content);
	$Content	= str_replace('[z_dq]', '"', $Content);
	
	return $Content;
}

function DeCodeStr2($Content)
{
	//替换空格
	$Content	= str_replace("[z_space]", " ", $Content);

	//替换换行
	$Content	= str_replace("[z_newline]", "\r\n", $Content);

	//替换<>
	$Content	= str_replace("[z_l]", "&lt;", $Content);
	$Content	= str_replace("[z_r]", "&gt;", $Content);
	
	//替换<br>
	$Content	= str_replace("&ltbr;&gt;", "<br>", $Content);

	//替换Tab
	$Content	= str_replace("[z_tab]", chr(9), $Content);

	//替换单双引号
	$Content	= str_replace("[z_sq]", "'", $Content);
	$Content	= str_replace('[z_dq]', '"', $Content);
	
	return $Content;
}

//-----------------------------------------------
/**
//作者:Zerolone
//日期:20061109
//功能:字符串剪切
* @param  $Content    要剪切的字符串
* @param  $StartFlag  要剪切的字符串前面
* @param  $EndFlag    要剪切的字符串后面
* @param  $Code				剪切方式
*/
function CutStr($Content, $StartFlag, $EndFlag, $Code=0)
{
	//echo "<hr size=1 color=blue> 内 容 长 度 ：".strlen($Content);

	$pos1 = strpos($Content, $StartFlag);
	$pos2 = strpos($Content, $EndFlag, $pos1);
	$StartFlag_Len	= strlen($StartFlag);
	$EndFlag_Len		= strlen($EndFlag);
	$TheContent		= substr($Content, $pos1+$StartFlag_Len, $pos2-$pos1-$StartFlag_Len);
	
	if ($Code==1) 
	{
		$TheContent = str_replace($StartFlag.$TheContent.$EndFlag, '', $Content);
		//$TheContent	= 1;
	}

	/*/
	echo "<br>开始标志位置：".$pos1;
	echo "<br>开始标志长度：".$StartFlag_Len;
	echo "<br>结束标志位置：".$pos2;
	echo "<br>结束标志长度：".$EndFlag_Len;
	echo "<br>起始截取位置：".($pos1+$StartFlag_Len);
	echo "<br>总共截取长度：".($pos2-$pos1-$EndFlag_Len-$StartFlag_Len+1);
	echo "<hr size=1 color=black>内容为：".$TheContent;
	echo "<hr size=1 color=blue>";
	//*/	
	
	return $TheContent;

}

//-----------------------------------------------
//作者:
//日期:20061028
//功能:字符串解码
//参数:要解码的字符串
//-----------------------------------------------
function decode ( $str )
{
	$str= ereg_replace("&lt;", "<", $str);
	$str= ereg_replace("&gt;", ">", $str);
	//	$str= ereg_replace("`", "'", $str);
	$str= ereg_replace('“', '"', $str);

	return $str;
}

//-----------------------------------------------
//作者:
//日期:20061028
//功能:保存文件
//参数:文件名， 保存路径， 远程路径
//-----------------------------------------------
function saveFile( $fileName ,$ImagePath, $ImageUrl)
{
	$url = '';
	$s_filename = basename( $fileName );
	$ext_name = strtolower( strrchr( $s_filename, "." ) );

	if( ( ".jpg" && ".gif" && ".png" && ".bmp" ) != strtolower( $ext_name ) )
	{
		return "";
	}

	if( 0 == strpos( $fileName, "/" ) )
	{
		preg_match( "@http://(.*?)/@i", $this->URL, $url );
		$url = $url[0];
	}

	$contents = file_get_contents( $url . $fileName );
	$s_filename = date( "His", time() ) . rand( 1000, 9999 ) . $ext_name;

	//file_put_contents( $this->saveImagePath.$s_filename, $contents );

	$handle = fopen ( $ImagePath.$s_filename, "w" );
	fwrite( $handle, $contents );
	fclose($handle);

	$SqlL = 'insert into '.table_pre.'photo (';
	$SqlR = 'values (';

	//添加时间
	$SqlL .= "posttime,";
	$SqlR .= "'" . date("Y-m-d",time()) . "',";

	$SqlL .= "urlold,";
	$SqlR .= "'" . $fileName . "',";

	$SqlL .= "url)";
	$SqlR .= "'". $ImageUrl.$s_filename ."')";

	query($SqlL.$SqlR);

	return $s_filename;
}

//-----------------------------------------------
//作者:
//日期:20061028
//功能:保存本地文件
//参数:文件名， 保存路径
//-----------------------------------------------
function saveFilelocal( $fileName ,$ImagePath, $ext_name)
{
	$s_filename = basename( $fileName );
	//	$ext_name = strtolower( strrchr( $s_filename, "." ) );

	if( ( ".jpg" && ".gif" && ".png" && ".bmp" ) != strtolower( $ext_name ) )
	{
		return "";
	}

	if( 0 == strpos( $fileName, "/" ) )
	{
		preg_match( "@http://(.*?)/@i", $this->URL, $url );
		$url = $url[0];
	}

	$contents = file_get_contents( $url . $fileName );
	$s_filename = date( "His", time() ) . rand( 1000, 9999 ) . $ext_name;

	//file_put_contents( $this->saveImagePath.$s_filename, $contents );

	$handle = fopen ( $ImagePath.$s_filename, "w" );
	fwrite( $handle, $contents );
	fclose($handle);

	return $s_filename;
}

//-----------------------------------------------
//作者:
//日期:2007-04-11
//功能:错误提示
//参数:错误类型， 源，错误信息
//-----------------------------------------------
	function error_alert($Type,$Source,$Message) {
		$ThisPage	= $_SERVER['PHP_SELF'];
		$x	= "
	页面执行问题类型：<font color=red>$Type</font>【<a href=\"javascript:history.go(0);\">刷新该页面</a>】【<a href=\"report_error_page.php?Page=$ThisPage&Source=$Source&Message=$Message\" target=_blank>联系系统管理员 报告管理员该页面出错</a>】<br>
	<br>错误信息： ($Source) $Message
	<hr color=blue size=1 width=100% align=left>
	";
		echo $x ;
	}

//-----------------------------------------------
//作者:Zerolone
//日期:2007-06-10
//功能:按年月生成日历
//参数:年，月
//-----------------------------------------------

?>