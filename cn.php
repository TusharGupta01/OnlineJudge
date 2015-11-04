<?php
/* To be configured during installation */
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'abc.xyz';
$database = 'OnlineJudge';
$cn=mysql_connect($db_hostname, $db_username, $db_password);
mysql_select_db($database,$cn);
if($cn === NULL){
    echo "Database connection error";
 die('mysql connection error: '.mysql_error());
}
?>
