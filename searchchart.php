<!DOCTYPE html>
<html lang="en">
<head>
<title>check result</title>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/drag-file.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- gallery -->
<link href='css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
<!-- //gallery -->
<!-- font -->
<link href="http://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //font -->	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/drag-file.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
</head>
 <body>

<div style="position:relative;">
<div style="width:1000px;position:relative;
background-color:#E9F1FD;margin:10px auto;padding:10px 30px 30px;line-height:35px;overflow:auto;">
 
 <?php   
 require_once("login/connectMYSQL.php");
 $output='';
 $arr1=array();
 $rbx="radio";
 
 function alertonly($msg) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function alert($msg,$url) 
{
	echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
 
 if(isset($_POST['clicksearch']))
 {
	 if(!empty($_POST['search']))
	 {
		 $searchq=$_POST['search'];
		 $sql = "SELECT * FROM fooddata Where fd_Name LIKE '%$searchq%' or fd_Name_cn LIKE '%$searchq%'";
		 $results = $db_link->query($sql);
		 $count=mysqli_num_rows($results);
		 if($count==0)
		 {
			 //$output='There was no search results!!';
			 alert("請輸入有效字元！","index.php");
		 }
		 else
		 {
			echo "<center><h3>選取一個搜尋結果，點選「查看營養資訊」，就能看到該食物的營養資訊囉！</h3></br>搜尋『 $searchq 』的結果如下：</br></center>";
			while($row=mysqli_fetch_array($results))
			{
				$fdname=$row['fd_Name'];
				$fdname_cn=$row['fd_Name_cn'];
				//$output.='<div>'.$fdname.'</div>';
				echo "<center></br><input type=".$rbx." name='radio' value=".$fdname."><label>".$fdname."  ".$fdname_cn."</label></center>";
				$arr1[]=$fdname;
			}
			$resultL=count($arr1); 
		 }
	 }
	 else
	 {
		 alertonly("input must not be empty!");
	 }
 }

?>
<div style="text-align:center;display:none;">
	<form action="searchchart.php" method="post">
		<label class="btn btn-info">
			<input type="submit" name="check" style="display:none;"/>
			<i class="fa fa-check-square"></i> 查看營養資訊
		</label>
	</form>
</div>
 <?php
if(isset($_POST['check']))
{
	if(isset($_POST['radio'])) 
		{
			//echo "<h3> ".$_POST['radio']."的營養資訊如下表：</br></br></h3>";
			$fname=$_POST['radio'];
			$sql="SELECT * FROM fooddata WHERE fd_Name='$fname';";
			$result=$db_link->query($sql);
			foreach($result as $row) //get food id
			{
				$nid=$row['fd_num'];
				$fname_cn=$row['fd_Name_cn'];
			}
			echo "<h3> ".$_POST['radio']."  ".$fname_cn." 的營養資訊如下表：</br></br></h3>";
			$sql4nutrients="SELECT * FROM `nutrientsdata` WHERE `nd_num`='$nid';";
			$nutrients=$db_link->query($sql4nutrients);
			$Trows= mysqli_fetch_array($nutrients);
			$keys=array_keys($Trows); //get keys from array
			$filter=preg_grep('#^nd_#',$keys);
			$rows=array_diff_key($Trows,array_flip($filter)); //output
			//print_r($rows);check raw row
			//echo "</br>After:</br>";
			$rows['4']=$rows['4']/1000;//VA
			$rows['5']=$rows['5']/1000;//VB
			$rows['6']=$rows['6']/1000;//VC
			$rows['7']=$rows['7']/1000;//VD
			$rows['8']=$rows['8']/1000;//VE
			//$rows['10']=$rows['9']/100;
			//$rows['9']=$rows['9']/1000;//mineral
			//print_r($rows);check after caculated
			
			//for draw pie chart
			$dataPoints = array( 
			array("label"=>"Protein", "y"=>$rows['1']),
			array("label"=>"Carbhydrates", "y"=>$rows['2']),
			array("label"=>"Fat", "y"=>$rows['3']),
			array("label"=>"Vitmain A", "y"=>$rows['4']),
			array("label"=>"Vitmain B", "y"=>$rows['5']),
			array("label"=>"Vitmain C", "y"=>$rows['6']),
			array("label"=>"Vitmain D", "y"=>$rows['7']),
			array("label"=>"Vitmain E", "y"=>$rows['8']),
			array("label"=>"Minerals", "y"=>$rows['9']),
			array("label"=>"Water", "y"=>$rows['10'])
		)
			?> 
			<script>
				window.onload = function() {
				 
				 
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					title: {
						text: "Search Result "
					},
					subtitles: [{
						text: "—— "+<?php echo json_encode($fname." ".$fname_cn)?>
					}],
					data: [{
						type: "pie",
						yValueFormatString: "#,##0.000\"g\"",
						indexLabel: "{label} ({y})",
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					}]
				});
				chart.render();
				 
				}
			</script>
<?php
			
	}
}
?>
<div id="chartContainer" style="height: 480px; width: 100%;"></div></br>
<a href="../index.php" class="text-right pull-right">Back</a>

</div>
</div>
 </body>
</html>


