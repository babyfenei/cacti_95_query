<?php
$conn=mysql_connect("localhost","cactiuser","cactiuser")or dir('连接失败' . mysql_error());
if(mysql_select_db("cacti",$conn))
echo "";
else
echo ('连接失败' . mysql_error());
#mysql_query("set names utf8");
mysql_query("set names 'utf8'");


?>
