<?php
// Connection's Parameters
$db_host="localhost";
$db_name="database_name";
$username="database_username";
$password="database_password";
$db_con=mysql_connect($db_host,$username,$password);
$connection_string=mysql_select_db($db_name);
// Connection
mysql_connect($db_host,$username,$password);
mysql_select_db($db_name);
?>