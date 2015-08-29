<?php
//获取IP
function GetIP(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
           $ip = getenv("HTTP_CLIENT_IP");
       else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
           $ip = getenv("HTTP_X_FORWARDED_FOR");
       else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
           $ip = getenv("REMOTE_ADDR");
       else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
           $ip = $_SERVER['REMOTE_ADDR'];
       else
           $ip = "unknown";
   return($ip);
}

$SqlL = 'insert into '.table_pre.'log (';
$SqlR = 'values (';

//ip
$SqlL .= 'ip,';
$SqlR .= '\'' . GetIP() . '\',';

//地址
$SqlL .= 'url,';
$SqlR .= '\'' . $ThisPage . '\',';

//提交时间
$SqlL .= "date,";
$SqlR .= '\'' . date("Y-m-d h:i-s",time()) . '\',';

//内容
$SqlL .= "content)";
$SqlR .= "'". $log_content ."')";

query($SqlL.$SqlR);
?>