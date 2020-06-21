<?php
session_start();
require_once("..\\login\\connectMySQL.php");

function alert($msg,$url) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
function alertonly($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$user_account=$_SESSION['account'];
$user_pwd=$_SESSION['password'];
if((!isset($_SESSION["password"]))||(!isset($_SESSION["account"])))
{
	alert("—— we need your account and pwd ——","../index.php");
}
else// login statement
{
	$sql = "SELECT id FROM userlogin Where account=$user_account AND password=$user_pwd";
	$results = $db_link->query($sql);
	$user_id=$results['id'];
?>
<form action="" method="post">
<?php echo "<h3>Dear $user_account we need to collect some information</h3>";?>
<p>Height (meters): </p><input type="text" name="userheight" /></br>
<p>Weight (kilograms): </p><input type="text" name="userweight"/></br>
<p>What extent of your physical labour :</p>
<input type="radio" name="radio" value="light"/><label>Light  e.g officer, saler, waiter/waitress, teacher</label></br>
<input type="radio" name="radio" value="medium"/><label>Medium  e.g student, driver</label></br>
<input type="radio" name="radio" value="heavy"/><label>Heavy  e.g dancer</label></br>
<input type="submit" name="submitinfo" value="Submit" /></br>
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
				alertonly("all fine");
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
<input type="submit" name="ignore" value="Ignore" /><label>(I want to finish it later)</label>
<?php
if(isset($_POST['ignore']))
{
	header("Location:main.php?id=$user_id&account$user_account");
}
?>
</form>

<?php
}
?>