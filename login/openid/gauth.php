<?php
date_default_timezone_set('Asia/Taipei');
session_start();
require_once('settings.php');
require_once('google-login-api.php');
require_once("../connectMySQL.php"); //連接資料庫
function alert($msg,$url) 
  {
      echo "<script type='text/javascript'>alert('$msg');</script>";
	  echo "<script>document.location = '$url'</script>";
  }
  function alertonly($msg) 
  {
	  echo "<script type='text/javascript'>alert('$msg');</script>";
  }

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
		
		//print_r($user_info);
		$id='g'.$user_info['id'];
		$account=$user_info['id'];
		$password=$user_info['id'];
		$name=$user_info['name'];
		$email=$user_info['email'];
		//檢查帳號是否有人申請
		$sql = "SELECT * FROM googlelogin Where account = '$account'";
		$result = $db_link->query($sql);
		
		//如果有此帳號則更新googlelogin u_lastT
		 if (mysqli_num_rows($result) != 0)
		  {
			//釋放 $result 佔用的記憶體
			mysqli_free_result($result);
			
			$sqlsearchID = "SELECT * FROM googlelogin Where email='$email'";
			$resultsid = $db_link->query($sqlsearchID);
			foreach($resultsid as $rr)
			{$arruid=$rr;}
			$user_id=$arruid['id'];
			$user_account=$arruid['account'];
			
			$time="UPDATE googlelogin SET u_lastT=now() WHERE account='$user_account'";
			$todaytime=$db_link->query($time);
			
			mysqli_free_result($result);
			header("Location:../index.php?id=".$user_id."&account=".$user_account);
			$db_link->close();
			
		  }
		  //如果帳號沒人使用
		  else
		  {
			//釋放 $result 佔用的記憶體	
			mysqli_free_result($result);

			//新增此帳號
			$sql = "INSERT INTO googlelogin (id, account, password, name, gender, 
					year, month, day, email) VALUES ('$id','$account', '$password', 
					'$name', 'N/A', 'N/A', 'N/A', 'N/A', '$email')";
			$result = $db_link->query($sql);
			
			//get id
			$sqlsearchID = "SELECT * FROM googlelogin Where email='$email'";
			$resultsid = $db_link->query($sqlsearchID);
			foreach($resultsid as $rr)
			{$arruid=$rr;}
			$user_id=$arruid['id'];
			$user_account=$arruid['account'];
			//echo "account=".$user_account;
			//echo "id=".$user_id;
			//add account to userbmi
			$sqlBMI = "INSERT INTO userbmi (u_id, recordcheck, u_height, u_weight, u_type) VALUES ('$user_id', 'false','', '', '')";
			$resultBMI = $db_link->query($sqlBMI);

			$time="UPDATE googlelogin SET u_lastT=now() WHERE account='$user_account'";
			$todaytime=$db_link->query($time);
			
			$_SESSION['id']=$user_id;
			$_SESSION['account']=$user_account;
			//$_SESSION['account']=$arruid['name'];
			$_SESSION['name']=$arruid['name'];

			alert("登入成功！正在為您跳轉...","../../index.php?id=".$user_id."&account=".$user_account);
		  }
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>
<head>
<style type="text/css">
#information-container {
	width: 400px;
	margin: 50px auto;
	padding: 20px;
	border: 1px solid #cccccc;
}

.information {
	margin: 0 0 30px 0;
}

.information label {
	display: inline-block;
	vertical-align: middle;
	width: 150px;
	font-weight: 700;
}

.information span {
	display: inline-block;
	vertical-align: middle;
}

.information img {
	display: inline-block;
	vertical-align: middle;
	width: 100px;
}
</style>
</head>
<body>
<div id="information-container">
	<div class="information">
		<label>Name</label><span><?= $user_info['name'] ?></span>
	</div>
	<div class="information">
		<label>ID</label><span><?= $user_info['id'] ?></span>
	</div>
	<div class="information">
		<label>Email</label><span><?= $user_info['email'] ?></span>
	</div>
	<div class="information">
		<label>Email Verified</label><span><?= $user_info['verified_email'] == true ? 'Yes' : 'No' ?></span>
	</div>
	<!--<div class="information">
		<label>Gender</label><span><?//= $user_info['gender'] ?></span>
	</div>-->
	<div class="information">
		<label>Picture</label><img src="<?= $user_info['picture'] ?>" />
	</div>
</div>

</body>
</html>