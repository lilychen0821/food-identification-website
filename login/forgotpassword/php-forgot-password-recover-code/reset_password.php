<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "foodidentification");
		$sql = "UPDATE `foodidentification`.`userlogin` SET `password` = '" . ($_POST["member_password"]). "' WHERE `userlogin`.`account` = '" . $_GET["account"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";
		
	}
?>
<!DOCTYPE html>
<head>
	<title>Forgot Password</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../../css/templatemo_style.css" rel="stylesheet" type="text/css">
	
<script>
function validate_password_reset() {
	if((document.getElementById("member_password").value == "") && (document.getElementById("confirm_password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("member_password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
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

			<h1 class="margin-bottom-15">Reset Password</h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">	
				<div class="form-group">

		          <div class="col-md-12">

								</h1>Please enter new password to reset.</h1>
								<?php if(!empty($success_message)) { ?>
								<div class="success_message">
									<?php echo $success_message; ?></div>
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
										<label for="Password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
										<input type="password" name="member_password" id="member_password" class="form-control" size="12" placeholder="Password">
									</div>		            	            
								</div>              
							</div>
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="email" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" name="confirm_password" id="confirm_password" class="form-control"  size="12" placeholder="Confirm password">
		            </div>		            	            
		          </div>              
		        </div>	            

		        <div class="form-group">
		          <div class="col-md-12">
								<input type="submit" value="Submit" name="reset-password" id="reset-password" class="btn btn-danger">
								<input type="reset" value="Reset" class="btn btn-light text-right pull-right">
                    <br><br>
                    <a href="../../login.php">Login</a>
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>				