<?php 
$HOST = "localhost";
$USER = "root";
$PASS = "";
$DB = "web";
$PREFIX = "";


    if(!mysql_connect("$HOST", "$USER", "$PASS")) exit(mysql_error());
    else {echo "";}
    
    if (!mysql_select_db($DB)) exit(mysql_error());
    else{echo "";}
    
    mysql_query('SET NAMES cp1251;');

?>