<?php
if (session_id() == '') session_start();
DEFINE('BASEPATH',"sdfds");
require("../../../application/config/database.php");
$connection = mysql_connect($db["default"]["hostname"],$db["default"]["username"],$db["default"]["password"]) or die(mysql_error());
mysql_select_db($db["default"]["database"]) or die(mysql_error());
$query = mysql_fetch_array(mysql_query("select * from user where username='".$_POST["username"]."' and password='".md5($_POST["password"])."' and level=1"));
$row = $query;
if($row["id"])
{
	$_SESSION["userid"] = $row["id"];
	$_SESSION["id"] = $row["id"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["password"] = $row["password"];
	echo "success";
}else{
	echo "failed";
}
	