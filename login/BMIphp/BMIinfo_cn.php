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
		font-family:"Microsoft JhengHei";
		
	}
	
</style>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15"><b>您的</b> BMI <b>資料</b></h1>

<form action="" method="post" class="form-horizontal templatemo-create-account templatemo-container" role="form">
<a href="BMIinfo.php" class="text-right pull-right">English</a>
<?php echo "<h3>嗨 $user_name, 我們需要一些關於您的資料，讓分析更準確。</h3>";?>

<div class="form-inner">
	<div class="form-group">
	<div class="col-md-6">		            
		<label for="height" class="control-label">身高：</label>
		<input type="text" class="form-control" name="userheight" size="12" placeholder="(公尺)">
	</div>
	</div>	

	<div class="form-group">
	<div class="col-md-6">		            
		<label for="height" class="control-label">體重：</label>
		<input type="text" class="form-control" name="userweight" size="12" placeholder="(公斤)">
	</div>		            	            
	</div>

	<div class=" templatemo-radio-group">
	<label>您的工作強度：</label></br>
		<label class="radio-inline">
			<input type="radio" name="radio" value="light">輕度  </br>例如：行政人員, 銷售員, 餐飲服務生, 老師
		</label></br>
		<label class="radio-inline">
            <input type="radio" name="radio" value="medium">中度  </br>例如：學生, 司機
		</label></br>
		<label class="radio-inline">
            <input type="radio" name="radio" value="heavy">重度  </br>例如：舞者
		</label></br>
	</div>
	</div>
	<div class="col-md-12"><br><br></div>
	<div class="form-group">
	<div class="col-md-12">
	<input type="submit" name="submitinfo" value="送出資料" class="btn btn-info"/>
	<input type="submit" name="ignore" value="先忽略（我想之後再填）" class="btn btn-ignore pull-right"/>
	</div>		            	            
	</div>


</div>
             

<!-- <p>What extent of your physical labour :</p>
<input type="radio" name="radio" value="light"/><label>Light  e.g officer, saler, waiter/waitress, teacher</label></br>
<input type="radio" name="radio" value="medium"/><label>Medium  e.g student, driver</label></br>
<input type="radio" name="radio" value="heavy"/><label>Heavy  e.g dancer</label></br>
<input type="submit" name="submitinfo" value="Submit" /></br> -->
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
				alert("Your BMI info update successful!","../index.php?id=$user_id&account=$user_account");
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