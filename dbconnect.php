<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbconnect = "localhost";
$database_dbconnect = "test";
$username_dbconnect = "root@localhost";
$password_dbconnect = "";
$dbconnect = mysql_pconnect($hostname_dbconnect, $username_dbconnect, $password_dbconnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>