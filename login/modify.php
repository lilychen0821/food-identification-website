<?php 
  session_start();

  function alert($msg,$url) 
  {
      echo "<script type='text/javascript'>alert('$msg');</script>";
    echo "<script>document.location = '$url'</script>";
  }
  
  if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))
  {	
	  alert("—— You need to login first ——","../login.php");
  }
  else
  {
  if (isset($_POST["password"]))
  {
	  require_once("connectMYSQL.php");
    $id = $_SESSION["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $email = $_POST["email"];
	  //echo "=$password ,$name,$gender,$year,$month ,$day,$email";
    
    $firstc=substr($id,0,1);
    if($firstc=='g') //check if id start with 'g'
    {
      $usertable='googlelogin';
    }
    else
    {
      $usertable='userlogin';
    }

    function emailalert($msg) 
  {
    echo "<script type='text/javascript'>alert('$msg');history.go(-1);</script>";
  }
		//check email & birthday
    if(isset($_POST["email"]))
    {
      $email = $_POST["email"]; 
  
     if (!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
       emailalert("請檢查「E-mail」格式輸入是否正確！");
      } 
    } 
    if((!is_numeric($_POST['year']))|(!is_numeric($_POST['month']))|(!is_numeric($_POST['day'])))
    {
      emailalert("Birthday 只能輸入數字哦！");
    } 
  
    $_SESSION['name']=$name;
    //更新使用者資料
    $sql = "UPDATE $usertable SET password = '$password', name = '$name', 
            gender = '$gender', year = '$year', month = '$month', day = '$day', 
            email = '$email' WHERE id = '$id'";
			
    $result = $db_link->query($sql);
		$db_link->close();
    //關閉資料連接
  }
	else{
		require_once("connectMYSQL.php");		
    $id = $_SESSION["id"];
    
    $firstc=substr($id,0,1);
    if($firstc=='g') //check if id start with 'g'
    {
      $usertable='googlelogin';
    }
    else
    {
      $usertable='userlogin';
    }	
		//取得使用者資料
		$sql = "SELECT * FROM $usertable Where id = '$id'";
		$result = $db_link->query($sql);
		$row = mysqli_fetch_array($result);  //assoc -> array
		$db_link->close();
	}
  }
?>
<?php if (isset($_POST["password"])) { ?>

<!doctype html>
<html>
  <head>
	<title>修改資料成功！</title>
	  <meta name="keywords" content="" />
	  <meta name="description" content="" />
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	  <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <center>
      <img src="images/bg001.jpg" height=400px margin=auto;>
    <h3><?php echo $name ?>，您的資料修改成功！</h3></br>
      <p><a href="../main.php">回會員專區</a></p>
    </center>        
  </body>
</html>

<?php } else { ?>

  <!doctype html>
<html>
  <head>
	<title>修改會員資料</title>
	  <meta name="keywords" content="" />
	  <meta name="description" content="" />
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	  <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	  <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
      function check_data()
      {
        var minLength=4,maxLength=15;
        
        if ((document.myForm.password.value.length <=minLength)&&(document.myForm.password.value.length>=maxLength))
        {
          alert("「Password」不可以空白哦！最少要4字元 , 最多15字元!");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「Confirm Password」忘了填哦！");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「Confirm Password」與「Password」一定要相同！");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("一定要留下「Name」哦！");
          return false;
        }	
		if(document.myForm.email.value.length == 0)
		{
			alert("「E-mail」沒有填寫到呦！");
			return false;
		}
        if (document.myForm.year.value.length == 0)
        {
          alert("「Year」不能空白！");
          return false;
        }
        if (document.myForm.year.value.length >4)
        {
          alert("「Year」請輸入西元格式！（四位數字，如：2019）");
          return false;
        }
        if (document.myForm.month.value.length == 0)
        {
          alert("「Month」不能空白！");
          return false;
        }	
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
        {
          alert("「Month」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0)
        {
          alert("「Day」不能空白！");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
        {
          alert("二月只有 28 天，最多 29 天哦！");
          return false;
        }	
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6
          | document.myForm.month.value == 9 | document.myForm.month.value == 11)
        {
          if (document.myForm.day.value > 30)
          {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;					
          }
        }	
        else
        {
          if (document.myForm.day.value > 31)
          {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;					
          }				
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1)
        {
          alert("「Day」應該在 1-31 之間");
          return false;
        }	
        myForm.submit();					
      }
    </script>			
  </head>
  <body class="templatemo-bg-gray">
  <h1 class="margin-bottom-15">Modify</h1>
	<div class="container">
	<div class="col-md-12">
    <form class="form-horizontal templatemo-create-account templatemo-container" action="modify.php" method="post" name="myForm">
		<div class="form-inner">
      <h4 style="text-align:center">標示「*」為必填欄位</h4></br>
          <div class="form-group">
					<div class="col-md-6">
					<label for="account" class="control-label">Account（can Not be modified.）</label>
          <input class="form-control" placeholder="<?php echo $row{"account"} ?>">
					</div>
          </div><!-- googlelogin & userlogin -->
		  
        <?php
        if($firstc=='g')
        {  ?>
			<div hidden class="form-group">
					<div class="col-md-6">
					<label for="password" class="control-label">*Password</label>
          <input name="password" type="password" size="15" value="<?php echo $row{"password"} ?>" class="form-control" required placeholder="請使用英文或數字鍵，勿使用特殊字元">
					</div>

					<div class="col-md-6">
					<label for="re_password" class="control-label">*Confirm Password</label>
					
          <input name="re_password" type="password" size="15" value="<?php echo $row{"password"} ?>" class="form-control" required placeholder="請再輸入一次密碼">
		  
					</div>
          </div>
    
    <?php } 
    else { ?>
    
          <div class="form-group">
					<div class="col-md-6">
					<label for="password" class="control-label">*Password</label>
          <input name="password" type="password" size="15" value="<?php echo $row{"password"} ?>" class="form-control" required placeholder="請使用英文或數字鍵，勿使用特殊字元">
					</div>

					<div class="col-md-6">
					<label for="re_password" class="control-label">*Confirm Password</label>
					
          <input name="re_password" type="password" size="15" value="<?php echo $row{"password"} ?>" class="form-control" required placeholder="請再輸入一次密碼">
		  
					</div>
          </div>
          <?php } ?><!-- end googlelogin & userlogin -->
          <div class="form-group">
					<div class="col-md-6">
					<label for="name" class="control-label">*Your Name</label>
          <input name="name" type="text" size="8" class="form-control" value="<?php echo $row{"name"} ?>" required>
					</div>

					<div class="col-md-6 templatemo-radio-group">
					<label class="radio-inline">
						<input type="radio" name="gender" value="male" <?=$row['gender']=="male" ? "checked" : ""?>>Male
					</label>
					<label class="radio-inline">
                        <input type="radio" name="gender" value="female" <?=$row['gender']=="female" ? "checked" : ""?>>Female
					</label>
					</div>
					</div>
          <div class="form-group">
					<div class="col-md-2">
					<label for="password" class="control-label">*Birthday</label>
						<input name="year" type="TEXT" size="4" class="form-control" value="<?php echo $row{"year"} ?>" required placeholder="Year" align="left"> 
					</div>
					<div class="col-md-2">
					<label for="password" class="control-label" style="color:white">*Month</label>
						<input name="month" type="TEXT" size="2" class="form-control" value="<?php echo $row{"month"} ?>" required placeholder="Month"  align="left">
					</div>
					<div class="col-md-2">
					<label for="password" class="control-label" style="color:white">*Day</label>
            <input name="day" type="TEXT" size="2" input style="width:70px" class="form-control" value="<?php echo $row{"day"} ?>" required placeholder="Day"  align="left">
					</div>
					</div>
					
			<?php
        if($firstc=='g')
        {  ?>

					<div hidden class="form-group">
        	<div class="col-md-6">
					<label for="password" class="control-label">*Email</label>
          <input name="email" type="text" size="30" class="form-control" value="<?php echo $row{"email"} ?>" required placeholder="">
				</div>
				</div>
        </div>
        
         <?php } 
    else { ?>
    
		  <div class="form-group">
        	<div class="col-md-6">
					<label for="password" class="control-label">*Email</label>
          <input name="email" type="text" size="30" class="form-control" value="<?php echo $row{"email"} ?>" required placeholder="">
				</div>
				</div>
        </div>
        
		<?php } ?>

        <div class="form-group">
			  <div class="col-md-12">
            <input type="button" value="修改資料" onClick="check_data()" class="btn btn-info">
            <a href="login.php" class="pull-right">Login</a>
            <a class="pull-right" style="text-decoration: none;color:#606060">&nbsp or &nbsp</a>
            <a href="javascript:window.location.reload(true)" class="text-right pull-right">Reset</a>
				</div>
			  </div>

    </form>
  </body>
</html>

<?php } ?>