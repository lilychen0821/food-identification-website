<?php
session_start();
  if(isset($_POST["account"])&&isset($_POST["password"])){
  require_once("connectMySQL.php");
  //header("Content-type: text/html; charset=utf-8");

  //取得表單資料
  $account = $_POST["account"];    //跟join.php的表格名稱一樣
  $password = $_POST["password"]; 
  $name = $_POST["name"]; 
  $gender = $_POST["gender"];
  $year = $_POST["year"]; 
  $month = $_POST["month"]; 
  $day = $_POST["day"];
  $email = $_POST["email"]; 
			
  //檢查帳號是否有人申請 資料筆數>0則成功
  $sql = "SELECT * FROM userlogin Where account = '$account'";
  $result = $db_link->query($sql);
  
  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱 資料筆數=0則帳密重複
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }

  //如果帳號沒人使用
  else
  {
    //check email
  if(isset($_POST["email"]))
  {
    function emailalert($msg) 
    {
      echo "<script type='text/javascript'>alert('$msg');history.go(-1);</script>";
    }
    $email = $_POST["email"]; 

    if((!is_numeric($_POST['year']))|(!is_numeric($_POST['month']))|(!is_numeric($_POST['day'])))
	  {
		emailalert("Birthday 只能輸入數字哦！");
    }
	else//格式輸入正確
   {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
     emailalert("請檢查「E-mail」格式輸入是否正確！");
    }
	   else//只輸入數字
	   {
			//釋放 $result 佔用的記憶體	
			mysqli_free_result($result);

			//執行 SQL 命令，新增此帳號
			$sql = "INSERT INTO userlogin (account, password, name, gender, 
					year, month, day, email) VALUES ('$account', '$password', 
					'$name', '$sex', $year, $month, $day, '$email')";

			$result = $db_link->query($sql);
			//get id
			$sqlsearchID = "SELECT id,name FROM userlogin Where account='$account' AND password='$password'";
			$resultsid = $db_link->query($sqlsearchID);

			foreach($resultsid as $rr)
			{$arruid=$rr;}
			$user_id=$arruid['id'];
			$user_name=$arruid['name'];
			$user_account=$arruid['account'];

			//add account to userbmi
			$sqlBMI = "INSERT INTO userbmi (u_id, recordcheck, u_height, u_weight, u_type) VALUES ('$user_id', 'false','', '', '')";
			$resultBMI = $db_link->query($sqlBMI);

			$_SESSION["id"]=$user_id;
			//$_SESSION['account']=$user_account; -->無法
			$_SESSION['account']=$account;
			$_SESSION['name']=$arruid['name'];
			
			
			function alert($msg,$url) 
			{
			  echo "<script type='text/javascript'>alert('$msg');</script>";
			  echo "<script>document.location = '$url'</script>";
			}
			alert ("成功加入會員！","BMIphp/BMIinfo.php");
		}//--//只輸入數字(end)
   }//--格式輸入正確(end)
  } 
 
}//----------如果帳號沒人使用(end)
  //關閉資料連接	
  $db_link->close();
  }
?>

<?php
if (isset($_POST["account"])) 
{    //確認必填欄位account有輸入值
  function alert($msg,$url) 
  {
    echo "<script type='text/javascript'>alert('$msg');</script>";
    echo "<script>document.location = '$url'</script>";
  }
}
else{} ?>
<!doctype html>
<html>
  <head>
	<title>Create Account</title>
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
        var minLength=5,maxLength=15;
        if (document.myForm.account.value.length == 0)
        {
          alert("「Account」忘了填哦！");
          return false;
        }
        if (document.myForm.account.value.length <=4)
        {
          alert("「Account」字數過少，最少要4字元，最多15字元！");
          return false;
        }
        if(document.myForm.account.value.length >= maxLength)
        {
          alert("「Account」字數過多，最少要4字元，最多15字元！");
          return false;
        }
        if (document.myForm.password.value.length == 0)
        {
          alert("「Password」忘了填哦！");
          return false;
        }
        if (document.myForm.password.value.length <= 3)
        {
          alert("「Password」字數過少，最少要4字元，最多15字元！");
          return false;
        }
        if(document.myForm.password.value.length >= maxLength)
        {
          alert("「Password」字數過多，最少要4字元，最多15字元！");
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
          alert("您一定要留下「Name」哦！");
          return false;
        }	
        if (document.myForm.year.value.length == 0)
        {
          alert("「Year」不能空白！");
          return false;
        }
        if (document.myForm.year.value.length!=4)
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
        //


        //
        if(document.myForm.email.value.length == 0)
		    {
			    alert("「E-mail」沒有填寫到呦！");
			    return false;
		    }
        myForm.submit();			
      }
    </script>		
  </head>
  <body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Create Account</h1>
	<div class="container">
	<div class="col-md-12">
    <form class="form-horizontal templatemo-create-account templatemo-container" action="#" method="post" name="myForm">
		<div class="form-inner">
					<div class="form-group">
			    <div class="col-md-6"> 
						<label for="account" class="control-label">Account</label>
          	<input name="account" type="text" size="15" class="form-control" placeholder="請使用英文或數字">
					</div>
					</div>
          
					<div class="form-group">
					<div class="col-md-6">
					<label for="password" class="control-label">Password</label>
          <input name="password" type="password" size="15" class="form-control" placeholder="請使用英文或數字，勿使用特殊字元">
					</div>

					<div class="col-md-6">
					<label for="password" class="control-label">Confirm Password</label>
          <input name="re_password" type="password" size="15" class="form-control" placeholder="請再輸入一次密碼">
					</div>
					</div>

					<div class="form-group">
					<div class="col-md-6">
					<label for="name" class="control-label">Your Name</label>
          <input name="name" type="text" size="8" class="form-control" placeholder="">
					</div>

					<div class="col-md-6 templatemo-radio-group">
					<label class="radio-inline">
						<input type="radio" name="gender" value="male" checked>Male
					</label>
					<label class="radio-inline">
            <input type="radio" name="gender" value="female">Female
					</label>
					</div>
					</div>

					<div class="form-group">
					<div class="col-md-2">
					<label for="password" class="control-label">Birthday</label>
						<input name="year" type="TEXT" size="4" class="form-control" required placeholder="Year"> 
					</div>
					<div class="col-md-2">
					<label for="password" class="control-label" style="color:white">Month</label>
						<input name="month" type="TEXT" size="2" class="form-control" required placeholder="Month">
					</div>
					<div class="col-md-2">
					<label for="password" class="control-label" style="color:white">Day</label>
            <input name="day" type="TEXT" size="2" class="form-control" required placeholder="Day">
					</div>
					</div>

					<div class="form-group">
        	<div class="col-md-6">
					<label for="password" class="control-label">Email</label>
          <input name="email" type="email" size="30" class="form-control" placeholder="">
				</div>
        </div>
        
				<div class="form-group">
			  <div class="col-md-12">
            <input type="button" value="加入會員" onClick="check_data()" class="btn btn-info"/>　
            <a href="login.php" class="pull-right">or Login</a>
				</div>
			  </div>
		</form>
    </div>
  </body>
</html>