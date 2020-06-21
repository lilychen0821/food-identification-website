<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("localhost", "root", "", "foodidentification");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " account = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from `userlogin` " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		foreach($result as $ii)
  {
   $arr1=$ii;
  }
  //echo "</br> print";
  //print_r($arr1);
		
		if(!empty($user)) {
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No Account Found';
		}
	}
?>
<!DOCTYPE html>
<head>
	<title>Forgot Password</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">
	
	<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login Account or Email is required!"
		return false;
	}
	return true
}
</script>
<style>
	#validation-message {
	text-align:center;
	color:#FF0000;
}
.success_message {
	text-align:center;
	color:#07AB61;
}
</style>
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">

			<h1 class="margin-bottom-15">Forgot Password</h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">	
				<div class="form-group">

		          <div class="col-md-12">

								</h1>Please enter Account or Email address that you registered in our website.</h1>
								<?php if(!empty($success_message)) { ?>
									<div class="success_message"><?php echo $success_message; ?></div>
								<?php } ?>
								<div id="validation-message">
									<?php if(!empty($error_message)) { ?>
									<?php echo $error_message; ?>
									<?php } ?>
								</div>
						</div>
		        </div>		
						<div class="form-group">
								<div class="col-xs-12">		            
									<div class="control-wrapper">
										<label for="account" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
										<input type="text" class="form-control" name="user-login-name" id="user-login-name" size="12" placeholder="Account"><br><center>or</center>
									</div>		            	            
								</div>              
							</div>
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="email" class="control-label fa-label"><i class="fa fa-envelope"></i></label>
		            	<input type="text" class="form-control" name="user-email" id="user-email" size="12" placeholder="Email">
		            </div>		            	            
		          </div>              
		        </div>	            
		        <div class="form-group">
		          <div class="col-md-12">
								<input type="submit" value="Submit" name="forgot-password" id="forgot-password" class="btn btn-danger">
								<input type="reset" value="Reset" class="btn btn-light text-right pull-right">
                    <br><br>
                    <a href="../login.php">Login</a>
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>