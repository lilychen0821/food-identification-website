<!DOCTYPE HTML>
<html>
<?php
session_start();
//require_once("..\\login\\connectMySQL.php");
require_once("../login/connectMySQL.php");

$today=date("Y-m-d");
$comment=[];

//----------function area
function alert($msg,$url) //alert and shift page
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
function caldailyenergyRequirement($user_hNw,$statement)//according to physical labour caculate energy Requirement 
{
	//unit kcal need a day per kg
	$lean=array(35,40,40);
	$medium=array(30,35,40);
	$overweight=array(20,30,35);
	
	switch($user_hNw['u_type'])
		{
			case "light":
				echo "Your extent of your physical labour is light</br>";
				$dailykcal=$lean[$statement]*$user_hNw['u_weight'];
				echo "Your daily intake of energy : ".$dailykcal;
				return $dailykcal;
				break;
			case "medium":
				echo "Your extent of your physical labour is medium</br>";
				$dailykcal=$medium[$statement]*$user_hNw['u_weight'];
				echo "Your daily intake of energy : ".$dailykcal;
				return $dailykcal;
				break;
			default:
				echo "Your extent of your physical labour is heavy</br>";
				$dailykcal=$overweight[$statement]*$user_hNw['u_weight'];
				echo "Your daily intake of energy : ".$dailykcal;
				return $dailykcal;
				break;
		}// end of switch
}//end of caldailyenergyRequirement

function requirementNlimit($age,$gender)//caculate range of vitamin and minerals intake
{
	//unit=g
	if($gender=="male")
	{
		$vitmainsR=array(0.9/1000,16/1000,90/1000,0.015/1000,15/1000);
		$vitmainsL=array(3/1000,1000,2,0.1/1000,1);
		if($age<31)
		{
			$Rm=(1000+2.3+0.055+0.15+400+11)/1000;
			$Lm=(2500+11+0.4+1.1+40)/1000;
		}
		else
		{
			if(($age>30)&&($age<51))
			{
				$Rm=(1000+2.3+0.055+0.15+420+11)/1000;
				$Lm=(2500+11+0.4+1.1+40)/1000;
			}
			else
			{
				if(($sge>50)&&($age<70))
				{
					$Rm=(1000+2.3+0.055+0.15+420+11)/1000;
					$Lm=(2000+11+0.4+1.1+40)/1000;					
				}
				else//age >70
				{
					$Rm=(1200+2.3+0.055+0.15+420+11)/1000;
					$Lm=(2000+11+0.4+1.1+40)/1000;
					
				}//end of age>70
			}//end of age >50
		}//end of age >30
		$range=array($vitmainsR,$vitmainsL,$Rm,$Lm);
		return $range;
	}//end of male
	else//female
	{
		$vitmainsR=array(0.7/1000,0.014,0.075,0.015/1000,0.015);
		$vitmainsL=array(0.003,1000,2,0.1/1000,1);
		if($age<31)
		{
			$Rm=(1000+1.8+0.055+0.15+310+8)/1000;
			$Lm=(2500+11+0.4+1.1+40)/1000;
		}
		else
		{
			if(($age>30)&&($age<51))
			{
				$Rm=(1000+1.8+0.055+0.15+320+8)/1000;
				$Lm=(2500+11+0.4+1.1+40)/1000;
			}
			else//age > 50
			{
				$Rm=(1200+1.8+0.055+0.15+320+8)/1000;
				$Lm=(2000+11+0.4+1.1+40)/1000;					
			}//end of age >50
		}//end of age >30
		$range=array($vitmainsR,$vitmainsL,$Rm,$Lm);
		return $range;
	}//end of female
}//end of requirementNlimit
function calage($b)//caculate age and return gender
{
	foreach($b as $items)
	{$arr1=$items;}
	$dateofbirth=$arr1['day']."-".$arr1['month']."-".$arr1['year'];
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dateofbirth), date_create($today));
	$age=$diff->format('%y');
	$ageNgender=array($age,$arr1['gender']);//[0]=age,[1]=gender
	return $ageNgender;
}//end of calage
function calbmi($h,$w)
{

	$tvalue=$w/pow($h,2);
	$bmi=number_format($tvalue ,2);//show 2 digits after floating point
	$min=18.5;
	$max=23.9;
	//$bmirange=array($bmi,$min,$max);
	if(($bmi>$min)&&($bmi<$max))
	{
		$bmirange=array($bmi,1);
		return $bmirange;
	}
	else
	{
		if($bmi<$min)
		{
			$bmirange=array($bmi,0);
			return $bmirange;
		}
		else
		{
			$bmirange=array($bmi,2);
			return $bmirange;
		}
	}
}//end of function calbmi
function saveascolumn($arrinput)//sum element of array by categories of nutrients
{
	$ccount=count($arrinput);
	if($ccount>1)
	{
		$length=count($arrinput);
		//echo"</br>in function:";
		//print_r($arrinput);
		$u_energy=0;
		$u_protein=0;
		$u_carbohydrates=0;
		$u_fat=0;
		$u_VA=0;
		$u_VB=0;
		$u_VC=0;
		$u_VD=0;
		$u_VE=0;
		$u_mineral=0;
		$u_water=0;
		for($i=0;$i<$length;$i++)
		{
			$u_energy+=$arrinput[$i]['u_energy'];
			$u_protein+=$arrinput[$i]['u_protein'];
			$u_carbohydrates+=$arrinput[$i]['u_carbohydrates'];
			$u_fat+=$arrinput[$i]['u_fat'];
			$u_VA+=$arrinput[$i]['u_VA'];
			$u_VB+=$arrinput[$i]['u_VB'];
			$u_VC+=$arrinput[$i]['u_VC'];
			$u_VD+=$arrinput[$i]['u_VD'];
			$u_VE+=$arrinput[$i]['u_VE'];
			$u_mineral+=$arrinput[$i]['u_mineral'];
			$u_water+=$arrinput[$i]['u_water'];
		}
		$arr2=array($u_energy,$u_protein,$u_carbohydrates,$u_fat,$u_VA,$u_VB,$u_VC,$u_VD,$u_VE,$u_mineral,$u_water);
		return $arr2;
	}//end of if
	else
	{
		
		$arr2=array($arrinput['0']['u_energy'],$arrinput['0']['u_protein'],$arrinput['0']['u_carbohydrates'],$arrinput['0']['u_fat'],$arrinput['0']['u_VA'],$arrinput['0']['u_VB'],$arrinput['0']['u_VC'],$arrinput['0']['u_VD'],$arrinput['0']['u_VE'],$arrinput['0']['u_mineral'],$arrinput['0']['u_water']);
		//print_r(#arr2)
		return $arr2;
	}
}//end of function saveascolumn
function ifvNmOvertaken($intake,$limit)//check if vitmains intake is too much
{
	$temp=[];
	for($i=0;$i<count($intake);$i++)
	{
		if($intake[$i]>$limit[$i])
		{
			$temp=$i;
		}
	}
	if(empty($temp))
	{
		return 0;
	}
	else
	{
		return $temp;
	}
}//end of ifvNmOvertaken
function estimateEnergy($intake,$requirement)//for show comment about energy
{
	if($intake<$requirement*0.9)
	{
		$c="You have too little energy";
	}
	else
	{
		if($intake>$requirement*1.1)
		{
			$c="You have too much energy";
		}
		else
		{
			$c="balance!";
		}
	}
	return $c;
}//end of estimateEnergy
//-------------------------------------end of function area

	
			
		
		?>
<head>  
<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	 
</head>

<body>
<div style="position:relative;">
<div style="width:1000px;position:relative;
background-color:#E9F1FD;margin:10px auto;padding:30px;line-height:35px;overflow:auto;">
<a href="analysisToday_cn.php?id=$user_id&account=$user_account" class="text-right pull-right">切換中文</a>
<?php
//-------------------------------------------------------------main()
//if login 
if((!isset($_SESSION["id"]))||(!isset($_SESSION["account"])))
{
	alert("—— You need to login first ——","../../index.php");
}
else// login statement
{
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$firstc=substr($user_id, 0, 1);
	if($firstc=='g')
	{
		$usertable='googlelogin';
	}
	else
	{
		$usertable='userlogin';
	}
	
	$sql="SELECT recordcheck FROM userbmi WHERE u_id='$user_id';";
	$recordTorF=$db_link->query($sql);
	foreach($recordTorF as $TF)
	{$crecord=$TF;}
	//echo "cr=".$crecord['recordcheck'];
	
	if($crecord['recordcheck']=="true")//check if finished bmi info
	{
		//---- show general info about user
		echo "<h3>Dear $user_account </h3></br>";
		$sql="SELECT * FROM userbmi WHERE u_id='$user_id';";
		$hNw=$db_link->query($sql);
		
		//get bmi info
		foreach($hNw as $hw)
		{$user_hNw=$hw;}
		
		//caculate bmi
		$bmivalue=calbmi($user_hNw['u_height'],$user_hNw['u_weight']);
		echo "</br>Your BMI is : ".$bmivalue['0']."</br>";
		$statement=$bmivalue['1'];
		
		//for birth and gender
		$sqlbirth="SELECT * FROM $usertable WHERE id='$user_id';";
		$bresult=$db_link->query($sqlbirth);
		$ageNgender=calage($bresult);//get age and gender
		
		//get range of vitmains and minerals   *array{arr,arr,num,num}
		$vNmRange=requirementNlimit($ageNgender['0'],$ageNgender['1']);
		//$vitmainR=$vNmRange['0'];
		$vitmainL=$vNmRange['1'];
		//$mineralsR=$vNmRange['2'];
		$mineralsL=$vNmRange['3'];
		
		
		//check extent of physical labour from database and caculate energy 
		$dailykcal=caldailyenergyRequirement($user_hNw,$statement);
		
		//dailyenergy=[energy,protein,carbhydrate,fat]
		$dailyenergy=array($dailykcal,$dailykcal*0.15,$dailykcal*0.6,$dailykcal*0.25);

		//for get today info
		$sql = "SELECT * FROM userrecord WHERE u_recordT LIKE '$today%' AND u_id='$user_id';";
		$todayrows=$db_link->query($sql);
		$count=mysqli_num_rows($todayrows);
		
		//check any record set
		if($count==0)//no record found
		{
			echo "</br>There was no record today!";
		}
		else//if had recorded
		{
			foreach($todayrows as $ttoday)//get all intake nutrients 
			{
				$arr1[]=array_slice($ttoday, 5);//delete first 5 fields
			}
			
			//caculate all
			$sumarr=saveascolumn($arr1);
			
			//----check if vitmain and minerals overtaken
			$vNmtmp=array_slice($sumarr, 4);//get rid of protein carb fat
			$vNm=array($vNmtmp['0'],$vNmtmp['1'],$vNmtmp['2'],$vNmtmp['3'],$vNmtmp['4']);//VA~E
			//check any elements overtaken
			$ifv2much=ifvNmOvertaken($vNm,$vitmainL);
			if($ifv2much!=0)
			{
				foreach($ifv2much as $Vv)
				{$comment=$vNm[$Vv]." is overtaken";}
			}
			if($vNmtmp['5']>$mineralsL)//compare minerals with its limit
			{
				$comment="minerals are overtaken";
			}
			//-----end of check v and m
			
			$energycmt=estimateEnergy($sumarr['0'],$dailyenergy['0']);
		//-----------------------draw charts
			//----for chart2 ——>doughnut
			$dataPointsChart2 = array(
					array("label"=> "intake", "y"=> $sumarr['0'],"cmt"=>$energycmt),
					array("label"=> "Requirement", "y"=> $dailyenergy['0'],"cmt"=>$energycmt)
				);		
			
			//for chart1 ——> bar chart
					$dataPointsBar1 = array(
						array("label"=> "Protein", "y"=> $sumarr['1']*4),
						array("label"=> "Carbohydrates", "y"=> $sumarr['2']*4),
						array("label"=> "Fat", "y"=> $sumarr['3']*9)
					);
					$dataPointsBar2 = array(
						array("label"=> "Protein", "y"=> $dailyenergy['1']),
						array("label"=> "Carbohydrates", "y"=> $dailyenergy['2']),
						array("label"=> "Fat", "y"=> $dailyenergy['3'])
					);
			//---end of bar chart
		//---------------------end of draw charts
?>
<script>
window.onload = function () {
//chart1 =>bar chart	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Detail"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Your energy intake (kcal)",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsBar1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "energy requirement (kcal) ",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsBar2, JSON_NUMERIC_CHECK); ?>
	}]
});

//draw chart2 =>doughnut
var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Energy intake"
	},
	toolTip: {
		//shared:true,
		content:"{label}: {y}</br>{cmt}"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPointsChart2, JSON_NUMERIC_CHECK); ?>
	}]
});//end of draw chart 2

chart2.render();//show both of them
chart.render();
 
function toggleDataSeries(e){//click and switch
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}//end of toggleDataSeries
}//end of window load function
</script>


<div id="c2">
</br><div id="chartContainer2" style="height: 370px; width: 80%;margin:0 auto;"></div></br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
<div id="c1">
<div id="chartContainer" style="height: 370px; width: 80%;margin:0 auto;"></div></br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>

<?php
		
		}//end of if recorded
	

		
}//end of if finished bmi info set
else//if recordcheck =false
{
	alert("—— Please finish personal bmi info first ——","../index.php");
}

}// end of login statement

?>
<form method="post">
<a href="../index.php" class="text-right pull-right">Back</a>
<?php
if(isset($_POST['back2index']))//button click back to index
{
	header("Location: ../index.php?id=$user_id&account=$user_account");
}
?>
</form>
</div>
</div>
</body>
</html> 
