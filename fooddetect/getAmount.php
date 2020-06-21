<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<link href='css/fooddetect.css' rel='stylesheet'/>
<link href="../login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../login/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link href="../login/css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container4getamount">
		<div class="resultheading">
				<h1>食物攝入量</h1>
				<h5>&nbsp </h5>
		</div>
	<div class="amounttable" >
<?php
	session_start();//use session
	require_once("..\\login\\connectMYSQL.php");
	
	if(!isset($_SESSION["resultItems"]))
{
	header("Location: ..\\index.php");
}
	
	
	//echo'Check table!';
	$items=$_SESSION['resultItems'];//get array from checked page
	//print_r($items);
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$tbx="text";
	$fieldname="fieldname";
	$g="g";
	function alert($msg) 
	{
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	
	
?>
<form action="getAmount.php" method="post" >
	<table width="85%">
		<tr style="font-size:17px;">
			<th>food Name(EN)</th>
			<th>食物名稱(中)</th>
			<th>Intake(攝入量)</th>
			<th>Unit(單位)</th>
			<th>Refrence weight(參考值)</th>
		</tr>
	<?php 
	
	for ($i=0;$i<count($items);$i++)
	{
		//get Name_cn and ref weight from database
		$sql_name_cn = "SELECT * FROM fooddata Where fd_Name = '$items[$i]'";
		//echo $sql_name_cn;
		$result_cn = $db_link->query($sql_name_cn);
		//echo $result_cn;
		foreach($result_cn as $rcn)
		{$cnNrefweight[]=$rcn;}
		$cnN=$cnNrefweight[$i]['fd_Name_cn'];
		$refweight=$cnNrefweight[$i]['fd_generalW'];
		$notes=$cnNrefweight[$i]['fd_Unit'];
		
		/*$sql = "SELECT fd_Unit FROM fooddata Where fd_Name = '$items[$i]'";
		$result = $db_link->query($sql);
		echo $result;*/
		
		//echo  "".$cnNrefweight[$i]['fd_Unit'];
		//print_r($cnNrefweight);
		//echo "".$cnN;
		//echo "".$refweight;
		echo "<tr><th>$items[$i]</th><th>$cnN</th><th><input type=".$tbx." name='lang[]' class='form-control'></th><th>g</th><th>$refweight$g&nbsp$notes</th></tr>";
	}
	?>
	</table></br>
	<div class="btnnext" style="float:right;margin-right:17%">
	<input type="submit" name="next" class="btn btn-info" value="Next"></br>
	<?php
	
	if(isset($_POST['next']))
	{
		foreach($_POST['lang'] as $nl)
		{
			$amount[]=$nl;
		}
		//print_r($amount);
		$ep=0;
		foreach($amount as $value)
		{
			//echo "1st floor!!!";
			if(!empty($value))
			{
				//echo "2nd!!!";
				if((is_numeric($value)&& $value>0))//make sure input numeric value
				{
					$ep++;
					//echo "ep=".$ep;
					//echo "length=".count($items);
					if($ep==count($items))
					{
						alert("Right!!");
						$_SESSION['resultItems']=$items;
						$_SESSION['Amount']=$amount;
						header("Location:recordNdisplay.php?id=$user_id&account$user_account");
					}
					
					
				}
				else
				{
					alert("Please input numeric value!!");
					break;
				}
			}
			else
			{
				alert("value cannot be empty!!");
				break;
			}
			
		}
		
	}
	?>
	</div>
	</form>
	</div>
	<div class="reftextNimg">
	<div class="col-md-4 testimonial-grid">
	</br><label><p>參考值</p></label></br>
	<ul><label><100g (=一顆黃金奇異果)</label>		
	  <li>一顆桌球:50g</li>
	  <li>一顆雞蛋：50g~60g</li>
	</ul>
	<ul><label><200g (=一台iphone11)</label>
	  <li>一個統一布丁(小): 150g</li>
	</ul>
	<ul><label><300g</label>
	  <li>黑人牙膏:250g</li>
	  <li>伯朗咖啡(240ml): 290g</li>
	</ul>
	<ul><label><400g</label>
	  <li>果汁牛奶(290ml): 325g</li>
	  <li>台啤,果微醺(330ml)：360g</li>
	  <li>林鳳營純牛奶-小(338ml):372g</li>
	</ul>
	<ul><label>>400g</label>
	  <li>瑞穗蘋果牛奶(400ml): 445g</li>
	  <li>統一木瓜牛乳(478ml):520g</li>
	  <li>一瓶600ml瓶裝水/飲料: 630~640g</li>
	  <li>大紙盒裝鮮奶(瑞穗,福樂，林鳳營，一番鮮):1000g</li>
	</ul>
	<div>
	<p></p></br>
	<p></p></br>
	<p>                 </p></br>
	<p>                 </p></br>
	<p>                 </p></br>
	<p>                 </p></br>
	</div>
	</div>
	<div class="col-md-8 testimonial-grid-right">
		<div class="Works-grids">
			<div class="col-md-4 Works-grid">
				<img src="images/kiwi.png" alt="Cinque Terre" width="110" height="110">
			  <p>黃金奇異果</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/egg.jpg" alt="Cinque Terre" width="190" height="110">
			  <p>雞蛋</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/pudding.png" alt="Cinque Terre" width="130" height="120">
			  <p>統一布丁</p>
			</div>
		</div>
	</div>
	<div class="col-md-8 testimonial-grid-right">
		<div class="Works-grids">
			<div class="col-md-4 Works-grid">
				<img src="images/coffee.png" alt="Cinque Terre" width="100" height="120">
			  <p>伯朗咖啡</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/billiards.jpg" alt="Cinque Terre" width="160" height="120">
			  <p>桌球</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/beer.png" alt="Cinque Terre" width="150" height="120">
			  <p>啤酒</p>
			</div>
		</div>
	</div>
	<div class="col-md-8 testimonial-grid-right">
		<div class="Works-grids">
			<div class="col-md-4 Works-grid">
				<img src="images/milk_apple.png" alt="Cinque Terre" width="110" height="140">
			  <p>瑞穗蘋果牛奶</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/milk_fruit.jpg" alt="Cinque Terre" width="90" height="140">
			  <p>水果牛奶</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/milk_pawpaw.png" alt="Cinque Terre" width="120" height="120">
			  <p>統一木瓜牛乳(478ml)</p>
			</div>
		</div>
	</div>
	<div class="col-md-8 testimonial-grid-right">
		<div class="Works-grids">
			<div class="col-md-4 Works-grid">
				<img src="images/milk_largesize.jpg" alt="Cinque Terre" width="30" height="110">
			  <p>大紙盒裝鮮奶</p>
			</div>
			<div class="col-md-4 Works-grid">
				<img src="images/water.png" alt="Cinque Terre" width="180" height="110">
			  <p>600ml瓶裝水</p>
			</div>
		</div>
	</div>
	</div>

</body>
