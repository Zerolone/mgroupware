@ECHO off 
cls 
color 0A 

del  "D:\Program Files\Apache Group\Apache2\conf\httpd.conf"
copy "D:\Program Files\Apache Group\Apache2\conf\httpd-mgw.conf" "D:\Program Files\Apache Group\Apache2\conf\httpd.conf"

del  "D:\Program Files\php\php.ini"
copy "D:\Program Files\php\php-yan.ini" "D:\Program Files\php\php.ini"

ECHO ========================================================== 
ECHO ֹͣAapche2�����Ժ�...
ECHO ========================================================== 
net stop apache2

ECHO ========================================================== 
ECHO ����Aapche2�����Ժ�...
ECHO ========================================================== 
net start apache2


ECHO ========================================================== 
ECHO ֹͣMySQL���Ժ�...
ECHO ========================================================== 
net stop mysql41
ECHO ========================================================== 
ECHO ����MySQL�����Ժ�...
ECHO ========================================================== 
net start mysql41

ECHO ========================================================== 
ECHO ������ɣ�
ECHO ========================================================== 
pause