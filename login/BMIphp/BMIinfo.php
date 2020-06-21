<?php
session_start();

function alert($msg,$url) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
function alertonly($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if(!isset($_SESSION["account"])||($_SESSION["id"]==""))
{
	alert("—— You need to login first ——","../login.php");
}
else// login statement
{
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$user_name=$_SESSION['name'];
	require_once("../connectMySQL.php");
	$sql = "SELECT * FROM userbmi Where u_id = '$user_id'";
		//$result = execute_sql($link, "member", $sql);
	$result = $db_link->query($sql);
	$row=mysqli_fetch_array($result);

	
	// foreach($result as $tt)
	// {
		// $row=$tt;
	// }
	// $user_id=$arruid['u_height'];
	// print_r($user_id);

	//$db_link->close();
?>
<head>
	<title>BMI_info</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<style>
	h3
	{
		margin:0 0 20 0;
	}
</style>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Your BMI info</h1>

<form action="" method="post" class="form-horizontal templatemo-create-account templatemo-container" role="form">
<a href="BMIinfo_cn.php" class="text-right pull-right">切換中文</a>
<?php echo "<h3>Dear $user_name, we need to collect some informations.</h3>";?>


<div class="form-inner">
	<div class="form-group">
	<div class="col-md-6">		            
		<label for="height" class="control-label">Height:</label>
		<input type="text" value="<?php echo $row{"u_height"} ?>" class="form-control" name="userheight" size="12" placeholder="(meters)">
	</div>
	</div>	

	<div class="form-group">
	<div class="col-md-6">		            
		<label for="height" class="control-label">Weight:</label>
		<input type="text" value="<?php echo $row{"u_weight"} ?>"class="form-control" name="userweight" size="12" placeholder="(kilograms)">
	</div>		            	            
	</div>

	<div class=" templatemo-radio-group">
		<label>What extent of your physical labour is？</label></br>
		<label class="radio-inline">
			<input type="radio" name="radio" value="light" <?=$row['u_type']=="light" ? "checked" : ""?>>Light  </br>e.g officer, saler, waiter/waitress, teacher
		</label></br>
		<label class="radio-inline">
            <input type="radio" name="radio" value="medium" <?=$row['u_type']=="medium" ? "checked" : ""?>>Medium  </br>e.g student, driver
		</label></br>
		<label class="radio-inline">
            <input type="radio" name="radio" value="heavy" <?=$row['u_type']=="heavy" ? "checked" : ""?>>Heavy  </br>e.g dancer
		</label></br>
	</div>
	</div>
	<div class="col-md-12"><br><br></div>
	<div class="form-group">
	<div class="col-md-12">
	<input type="submit" name="submitinfo" value="Submit" class="btn btn-info"/>
	<input type="submit" name="ignore" value="Ignore（I want to finish it later）" class="btn btn-ignore pull-right"/>
	</div>		            	            
	</div>


</div>
             
<?php
if(isset($_POST['submitinfo']))
{
	if((isset($_POST['userheight']))&&(isset($_POST['userweight']))&&(isset($_POST['radio'])))
	{
		if((is_numeric($_POST['userheight']))&&(is_numeric($_POST['userweight'])))
		{
			if(($_POST['userheight']>0)&&($_POST['userweight']>0))
			{
				$uh=$_POST['userheight'];
				$uw=$_POST['userweight'];
				$labour=$_POST['radio'];
				
				$sql="UPDATE userbmi SET recordcheck = 'true',
				u_height = '$uh', u_weight = '$uw', u_type='$labour' WHERE u_id = '$user_id'";
				$result=$db_link->query($sql);
				//alert("Your BMI info update successful!","../../index.php?id=$user_id&account=$user_account");
				alertonly("Your BMI info update successful!");
			}
			else
			{
				alertonly("value must larger than zero");
			}
		}
		else
		{
			alertonly("value must numeric");
		}
	}
	else
	{
		alertonly("Please finish each gap");
	}
}
?>

<?php
if(isset($_POST['ignore']))
{
	header("Location:../../main.php?id=$user_id&account=$user_account");
}
?>
</form>

<?php
}
?>
</body>
</html>