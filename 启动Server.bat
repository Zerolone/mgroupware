@ECHO off 
cls 
color 0A 

del  "D:\Program Files\Apache Group\Apache2\conf\httpd.conf"
copy "D:\Program Files\Apache Group\Apache2\conf\httpd-mgw.conf" "D:\Program Files\Apache Group\Apache2\conf\httpd.conf"

del  "D:\Program Files\php\php.ini"
copy "D:\Program Files\php\php-yan.ini" "D:\Program Files\php\php.ini"

ECHO ========================================================== 
ECHO 停止Aapche2中请稍后...
ECHO ========================================================== 
net stop apache2

ECHO ========================================================== 
ECHO 启动Aapche2中请稍后...
ECHO ========================================================== 
net start apache2


ECHO ========================================================== 
ECHO 停止MySQL请稍后...
ECHO ========================================================== 
net stop mysql41
ECHO ========================================================== 
ECHO 启动MySQL中请稍后...
ECHO ========================================================== 
net start mysql41

ECHO ========================================================== 
ECHO 操作完成！
ECHO ========================================================== 
pause