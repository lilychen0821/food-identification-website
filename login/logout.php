<?php
session_start();

//method1
if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]==""))  
{
	header("Location: ../../visitor/indexV.php");
}

if(isset($_GET["logout"])&&($_GET["logout"]=="true"))
{
	unset($_SESSION["loginMember"]);
	unset($_SESSION["id"]);
	unset($_SESSION);
	session_destroy();
	header("Location: visitor/indexV.php");
}

?>