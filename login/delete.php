<?php
  session_start();

if(!isset($_SESSION["account"])||($_SESSION["account"]==""))  
{
	header("Location: login.php");
}
else
{
	require_once("connectMySQL.php");
  $id=$_SESSION["id"];
  //echo $id."<br>";
  
  $sql="DELETE FROM userlogin WHERE id=$id";
  $sql2="DELETE FROM userbmi WHERE u_id=$id";
	//echo $sql."<br>";
  $result=$db_link->query($sql);
  $result2=$db_link->query($sql2);
  $db_link->close();
  
	unset($_SESSION["loginMember"]);
	unset($_SESSION["id"]);
	session_destroy();
}

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>刪除會員資料成功</title>
  </head>
  <body bgcolor="#FFFFFF">
    <center>
    <p align="center"><img src="images/erase.jpg" height=320px margin=auto;></p>
    <p align="center">
      您的資料已從本站刪除，若要再次使用本站服務，請重新申請帳號，謝謝您。
    </p>
    <p align="center"><a href="../index.php">回首頁</a></p>
</center>
  </body>
</html>