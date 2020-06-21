<?php
//metho 1:mysqli function
$db_host="localhost";
$db_username=""; //phpmtadmin username
$db_password=""; //phpmtadmin password
$db_name="";  //資料庫名稱

$db_link=@new mysqli($db_host,$db_username,$db_password,$db_name);

if($db_link->connect_error!="")
{
	echo"資料庫連結失敗!";
}
else
{
	$db_link->query("SET NAMES'UTF8'");  //設定字元集與編碼
	//echo"資料庫連線成功!";

}

?>