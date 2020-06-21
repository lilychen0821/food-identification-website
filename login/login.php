<?php
date_default_timezone_set('Asia/Taipei');
require_once('openid/settings.php');
session_start();

  if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]==""))  //檢查是否成功登入
  {
	if(isset($_POST["account"])&&isset($_POST["password"]))
	{

		require_once("connectMySQL.php");
        //header("Content-type: text/html; charset=utf-8");
	
        //取得表單資料
        $account = $_POST["account"]; 	
        $password = $_POST["password"];
		
		//檢查帳號密碼是否正確
		$sql="SELECT id,account,name FROM userlogin WHERE account='$account' and password ='$password'"; 
		$result=$db_link->query($sql);

		if(mysqli_num_rows($result)>0)   //mysqli_num_rows : 篩選出有幾個橫行資料
		{

			$row=mysqli_fetch_array($result);
			$id=$row['id'];
			$account=$row['account'];
			$user_name=$row['name'];
			//$_SESSION["loginMember"]=$account;
			$_SESSION["account"]=$account;
			$_SESSION["id"]=$id;
			$_SESSION['name']=$user_name;
			
			echo "id='$id',account='$account'<br>";

			$time="UPDATE userlogin SET u_lastT=now() WHERE account='$account'";
			$todaytime=$db_link->query($time);
			
			mysqli_free_result($result); //釋放 $result 佔用的記憶體
			header("Location:../../index.php?id=".$id."&account=".$account);
			$db_link->close();
		}
        else
		{
			mysqli_free_result($result);
			echo "<script type='text/javascript'>";
			echo "alert('帳號或密碼錯誤，請重新輸入！');";
			echo "</script>";
		}
	}//end of $_POST
//end of $_SESSION
  }
  else
  {
	session_unset();
	session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	header("Location:login.php");
  }
?>
<html>
<head>
	<title>Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login</h1>

		<script type="text/javascript">
      function checkData()
      {
		  var minLength=2,maxLength=12;
        if ((document.myForm.account.value.length <=minLength)&&(document.myForm.account.value.length>=maxLength))
          alert("Account 不能空白哦！最少要兩字元 , 最多12字元。");
        else if ((document.myForm.password.value.length <=minLength)&&(document.myForm.password.value.length>=maxLength))
          alert("Password 不能空白哦！最少要兩字元 , 最多12字元。");
        else 
          webLogin.submit();
      }
    </script>

			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" 
			      role="form" action="login.php" method="post" name="webLogin">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="account" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
									<input type="text" class="form-control" name="account" size="12" placeholder="Account" required>
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
									<input type="password" class="form-control" name="password" size="12" placeholder="Password" required>
		            </div>
		          </div>
		        </div>
		        <!-- <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox" name="rememberme"> Remember me
                		</label>
	              	</div>
		          </div>
						</div> -->
						</br>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
									<input type="submit" value="Login" onClick="checkData()" class="btn btn-info">
									
		          		<a href="forgotpassword/forgot-password.php" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		        <div class="form-group">
		        	<div class="col-md-12">
		        		<label>Login with: </label>
		        		<div class="inline-block">
									<!-- Google API openID -->
			        		<a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>"><i class="fa fa-google-plus-square login-with"></i></a>
								</div>      		
		        	</div>
		        </div>
		      </form>
		      <div class="text-center">
		      	<a href="create-account.php" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
					</div>
					<div class="text-center">
		      	<a href="../index.php" class="templatemo-create-new">Home Page <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>
</body>
</html>