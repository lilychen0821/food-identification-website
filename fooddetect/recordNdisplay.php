<html>
<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<link href='css/fooddetect.css' rel='stylesheet'/>
</head>
<body>
<div class="dcontainer" style="background-color:#deeaee">
<?php
	session_start();//use session
	
	//$target_dir = "I:\\Bachelor\\Junior\\2nd\\finalProject\\FoodRecognition\\darknet\\x64\\results\\";
	$target_dir ="records\\";
	//echo'Welcome record and display page!';
	$items=$_SESSION['resultItems'];//get array from checked page
	$amount=$_SESSION['Amount'];
	//print_r($items);//show item from last page
	//print_r($amount);//show amount from last page
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$firstc=substr($user_id, 0, 1);
	
	$nutrients=array();
	$result;
	$recordN;
	$countid;
	date_default_timezone_set('Asia/Shanghai');//change time zone,original is Europe
	
	//select from sql
	require_once("..\\login\\connectMYSQL.php");
	
	//get info from SQL
	foreach($items as $value)
	{
				$sql="SELECT fd_num FROM fooddata WHERE fd_Name='$value';";
				global $result;
				$result=$db_link->query($sql);
				foreach($result as $row)//get food id
				{
					//echo "id is=>".$row['fd_num']."<br>";
					global $nid;
					$nid[]=$row['fd_num'];
					//echo 'nid[]='."<br>";
					//print_r($nid);
					$arr1=sizeof($nid);
					//echo 'length:'.$arr1;
				}
	}
	for($i=0;$i<count($nid);$i++)//get nutients
			{
					//echo '$nid in loop ='.$nid[$i];
					$sql4nutrients="SELECT * FROM `nutrientsdata` WHERE `nd_num`='$nid[$i]';";
					$nutrients=$db_link->query($sql4nutrients);
					$Trows = mysqli_fetch_array($nutrients);
					global $rows;
					//get rid of name elements
					$keys=array_keys($Trows);//get keys from array
					$filter=preg_grep('#^nd_#',$keys);
					$Nrows=array_diff_key($Trows,array_flip($filter));//output
					$rows[] = $Nrows;
			}
	//echo 'rows :</br>';
	//print_r($rows);
	
	//convert to g
	for($k=0;$k<count($items);$k++)
	{

		$rows[$k]['1']=$rows[$k]['1']/100*$amount[$k];//protein
		$rows[$k]['2']=$rows[$k]['2']/100*$amount[$k];//cabhydrate
		$rows[$k]['3']=$rows[$k]['3']/100*$amount[$k];//fat
		$rows[$k]['4']=$rows[$k]['4']/100000*$amount[$k];//VA
		$rows[$k]['5']=$rows[$k]['5']/100000*$amount[$k];//VB
		$rows[$k]['6']=$rows[$k]['6']/100000*$amount[$k];//VC
		$rows[$k]['7']=$rows[$k]['7']/100000*$amount[$k];//VD
		$rows[$k]['8']=$rows[$k]['8']/100000*$amount[$k];//VE
		$rows[$k]['9']=$rows[$k]['9']/100*$amount[$k];//mineral
		$rows[$k]['10']=$rows[$k]['10']/100*$amount[$k];//water
		$rows[$k]['11']=$rows[$k]['11']/100*$amount[$k];//Kcal
	}
	//echo "</br>After:</br>";
	//print_r($rows);
	
	//SUM
	if(count($items)>1)
	{
		for($k2=1;$k2<count($items);$k2++)
		{
			$rows[$k2]['1']=$rows[$k2]['1']+$rows[$k2-1]['1'];//protein
			$rows[$k2]['2']=$rows[$k2]['2']+$rows[$k2-1]['2'];//cabhydrate
			$rows[$k2]['3']=$rows[$k2]['3']+$rows[$k2-1]['3'];//fat
			$rows[$k2]['4']=$rows[$k2]['4']+$rows[$k2-1]['4'];//VA
			$rows[$k2]['5']=$rows[$k2]['5']+$rows[$k2-1]['5'];//VB
			$rows[$k2]['6']=$rows[$k2]['6']+$rows[$k2-1]['6'];//VC
			$rows[$k2]['7']=$rows[$k2]['7']+$rows[$k2-1]['7'];//VD
			$rows[$k2]['8']=$rows[$k2]['8']+$rows[$k2-1]['8'];//VE
			$rows[$k2]['9']=$rows[$k2]['9']+$rows[$k2-1]['9'];//mineral
			$rows[$k2]['10']=$rows[$k2]['10']+$rows[$k2-1]['10'];//water
			$rows[$k2]['11']=$rows[$k2]['11']+$rows[$k2-1]['11'];//Kcal
		}
	}
	$recordarr=end($rows);//get the last array
	$shiftarr=array_shift($recordarr);//shift first element off
	//echo "</br>After SUM:</br>";
	//print_r($rows);
	//echo "</br>Record:</br>";
	//print_r($recordarr);
	
	//save as array 
	$serializedData = serialize($recordarr);
	$record="R".date("mdHis");
	$recordN=$record.".txt";
	$dt=date("Y-m-d H:i:s");
	$savepath=$target_dir."/".$recordN;
	
	//for write into database
	$energy=$recordarr['10'];
	$protein=$recordarr['0'];
	$carbohydrates=$recordarr['1'];
	$fat=$recordarr['2'];
	$VA=$recordarr['3'];
	$VB=$recordarr['4'];
	$VC=$recordarr['5'];
	$VD=$recordarr['6'];
	$VE=$recordarr['7'];
	$mineral=$recordarr['8'];
	$water=$recordarr['9'];
	//echo 'record='.$record;
	// save serialized data in a text file
	file_put_contents($target_dir.$recordN, $serializedData);
	
	$sql4write="INSERT INTO userrecord (u_recordNum, u_id, u_account, u_recordT, u_recordpath, u_energy, u_protein, u_carbohydrates, u_fat, u_VA, u_VB, u_VC, u_VD, u_VE, u_mineral, u_water) VALUES ('$record', '$user_id', '$user_account', '$dt', '$savepath', '$energy', '$protein', '$carbohydrates', '$fat', '$VA', '$VB', '$VC', '$VD', '$VE', '$mineral', '$water');";
	$wrecord=$db_link->query($sql4write);
	
	//echo "</br><h3>complete save!!<h3>";
	$db_link->close();
	
	//for draw pie chart
			$dataPoints = array( 
			array("label"=>"Protein", "y"=>$recordarr['0']),
			array("label"=>"Carbohydrates", "y"=>$recordarr['1']),
			array("label"=>"Fat", "y"=>$recordarr['2']),
			array("label"=>"Vitamin A", "y"=>$recordarr['3']),
			array("label"=>"Vitamin B", "y"=>$recordarr['4']),
			array("label"=>"Vitamin C", "y"=>$recordarr['5']),
			array("label"=>"Vitamin D", "y"=>$recordarr['6']),
			array("label"=>"Vitamin E", "y"=>$recordarr['7']),
			array("label"=>"Minerals", "y"=>$recordarr['8']),
			array("label"=>"Water", "y"=>$recordarr['9'])
			)

?>
			<script>
				window.onload = function() {
				 
				 
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					backgroundColor: "transparent",
					title: {
						text: "Detect Result "
					},
					subtitles: [{
						text: "— "+<?php echo json_encode($dt)?>
					}],
					data: [{
						type: "pie",
						yValueFormatString: "#,##0.000 g",
						indexLabel: "{label} ({y})",
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
					}]
				});
				chart.render();
				 
				}
			</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>	
<a href="..\\index.php"style="float:right;margin-right:5%;">Back</a>
</div>
</body>
</html>		