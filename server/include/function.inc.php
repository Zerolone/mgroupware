<?php
//-----------------------------------------------
//����:Zerolone ---------------------------------
//����:20040923----------------------------------
//����:���ݲ������пո�--------------------------
//����:integer-----------------------------------
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
//����:Zerolone
//����:20060211 (Ԫ��)
//����:��������ʱ�����
//����:������microtime()�õ���ʱ��
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
//����:
//����:20061026
//����:��ʾ״ֵ̬
//����:0-2������
//-----------------------------------------------
function printFlag ( $flag )
{
	switch ( $flag )
	{
		case 0:
			return "<Font color=\"#FF0000\">δ����&nbsp;δ����</Font>";

		case 1:
			return "<Font color=\"#009900\">�ѱ���</Font>&nbsp;<Font color=\"#FF0000\">δ����</Font>";

		case 2:
			return "<Font color=\"#009900\">�ѱ���&nbsp;�ѷ���</Font>";
	}
}

//-----------------------------------------------
//����:
//����:20061026
//����:�ַ�����ȡ
//����:Ҫ��ȡ���ַ�������ȡ����
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
//����:
//����:20061028
//����:�ַ�������
//����:Ҫ������ַ���
//-----------------------------------------------
function encode ( $str )
{
	$str= ereg_replace("<", "&lt;", $str);
	$str= ereg_replace(">", "&gt;", $str);
	$str= ereg_replace("'", "��", $str);
	$str= ereg_replace('"', '��', $str);
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
//����:Zerolone
//����:20061109
//����:�ַ�������
//����:Ҫ������ַ���
* @param  $Content  Ҫ������ַ���
*/
function EnCodeStr($Content)
{
	//�滻�ո�
	$Content	= str_replace(" ", "[z_space]", $Content);

	//�滻����
	$Content	= str_replace("\r\n", "[z_newline]", $Content);

	//�滻<>
	$Content	= str_replace("<", "[z_l]", $Content);
	$Content	= str_replace(">", "[z_r]", $Content);

	//�滻Tab
	$Content	= str_replace(chr(9), "[z_tab]", $Content);

	//�滻��˫����
	$Content	= str_replace("'", "[z_sq]", $Content);
	$Content	= str_replace('"', "[z_dq]", $Content);
	
	return $Content;
}

//-----------------------------------------------
/**
//����:Zerolone
//����:20061109
//����:�ַ�������
//����:Ҫ������ַ���
* @param  $Content  Ҫ������ַ���
*/
function DeCodeStr($Content)
{
	//�滻�ո�
	$Content	= str_replace("[z_space]", " ", $Content);

	//�滻����
	$Content	= str_replace("[z_newline]", "\r\n", $Content);

	//�滻<>
	$Content	= str_replace("[z_l]", "<", $Content);
	$Content	= str_replace("[z_r]", ">", $Content);

	//�滻Tab
	$Content	= str_replace("[z_tab]", chr(9), $Content);

	//�滻��˫����
	$Content	= str_replace("[z_sq]", "'", $Content);
	$Content	= str_replace('[z_dq]', '"', $Content);
	
	return $Content;
}

function DeCodeStr2($Content)
{
	//�滻�ո�
	$Content	= str_replace("[z_space]", " ", $Content);

	//�滻����
	$Content	= str_replace("[z_newline]", "\r\n", $Content);

	//�滻<>
	$Content	= str_replace("[z_l]", "&lt;", $Content);
	$Content	= str_replace("[z_r]", "&gt;", $Content);
	
	//�滻<br>
	$Content	= str_replace("&ltbr;&gt;", "<br>", $Content);

	//�滻Tab
	$Content	= str_replace("[z_tab]", chr(9), $Content);

	//�滻��˫����
	$Content	= str_replace("[z_sq]", "'", $Content);
	$Content	= str_replace('[z_dq]', '"', $Content);
	
	return $Content;
}

//-----------------------------------------------
/**
//����:Zerolone
//����:20061109
//����:�ַ�������
* @param  $Content    Ҫ���е��ַ���
* @param  $StartFlag  Ҫ���е��ַ���ǰ��
* @param  $EndFlag    Ҫ���е��ַ�������
* @param  $Code				���з�ʽ
*/
function CutStr($Content, $StartFlag, $EndFlag, $Code=0)
{
	//echo "<hr size=1 color=blue> �� �� �� �� ��".strlen($Content);

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
	echo "<br>��ʼ��־λ�ã�".$pos1;
	echo "<br>��ʼ��־���ȣ�".$StartFlag_Len;
	echo "<br>������־λ�ã�".$pos2;
	echo "<br>������־���ȣ�".$EndFlag_Len;
	echo "<br>��ʼ��ȡλ�ã�".($pos1+$StartFlag_Len);
	echo "<br>�ܹ���ȡ���ȣ�".($pos2-$pos1-$EndFlag_Len-$StartFlag_Len+1);
	echo "<hr size=1 color=black>����Ϊ��".$TheContent;
	echo "<hr size=1 color=blue>";
	//*/	
	
	return $TheContent;

}

//-----------------------------------------------
//����:
//����:20061028
//����:�ַ�������
//����:Ҫ������ַ���
//-----------------------------------------------
function decode ( $str )
{
	$str= ereg_replace("&lt;", "<", $str);
	$str= ereg_replace("&gt;", ">", $str);
	//	$str= ereg_replace("`", "'", $str);
	$str= ereg_replace('��', '"', $str);

	return $str;
}

//-----------------------------------------------
//����:
//����:20061028
//����:�����ļ�
//����:�ļ����� ����·���� Զ��·��
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

	//���ʱ��
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
//����:
//����:20061028
//����:���汾���ļ�
//����:�ļ����� ����·��
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
//����:
//����:2007-04-11
//����:������ʾ
//����:�������ͣ� Դ��������Ϣ
//-----------------------------------------------
	function error_alert($Type,$Source,$Message) {
		$ThisPage	= $_SERVER['PHP_SELF'];
		$x	= "
	ҳ��ִ���������ͣ�<font color=red>$Type</font>��<a href=\"javascript:history.go(0);\">ˢ�¸�ҳ��</a>����<a href=\"report_error_page.php?Page=$ThisPage&Source=$Source&Message=$Message\" target=_blank>��ϵϵͳ����Ա �������Ա��ҳ�����</a>��<br>
	<br>������Ϣ�� ($Source) $Message
	<hr color=blue size=1 width=100% align=left>
	";
		echo $x ;
	}

//-----------------------------------------------
//����:Zerolone
//����:2007-06-10
//����:��������������
//����:�꣬��
//-----------------------------------------------

?>