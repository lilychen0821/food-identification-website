<!DOCTYPE HTML>
<html>
<?php
session_start();
//require_once("..\\login\\connectMySQL.php");
require_once("../login/connectMySQL.php");

//------------------function area
function alert($msg,$url) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
function getweekdate($today)
{
	$date_from = date("Y-m-d", strtotime("-1 week"));//get date from
	$datefrom = strtotime($date_from);// Convert date to a UNIX timestamp
	$dateto = strtotime($today);// Convert date to a UNIX timestamp
	for ($i=$datefrom; $i<$dateto; $i+=86400) 
	{  
		$days[]=date("Y-m-d", $i);
	}  
	return $days;
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
				echo "您的勞動程度：輕度</br>";
				$dailykcal=$lean[$statement]*$user_hNw['u_weight'];
				echo "您一天所需攝取的熱量：".$dailykcal." kcal</br>";
				return $dailykcal;
				break;
			case "medium":
				echo "您的勞動程度：中度</br>";
				$dailykcal=$medium[$statement]*$user_hNw['u_weight'];
				echo "您一天所需攝取的熱量：".$dailykcal." kcal</br>";
				return $dailykcal;
				break;
			default:
				echo "您的勞動程度：重度</br>";
				$dailykcal=$overweight[$statement]*$user_hNw['u_weight'];
				echo "您一天所需攝取的熱量：".$dailykcal." kcal</br>";
				return $dailykcal;
				break;
		}// end of switch
}//end of caldailyenergyRequirement
function requirementNlimit($age,$gender)//caculate range of vitamin and minerals intake per week
{
	//unit=g
	if($gender=="male")
	{
		$vitaminsR=array(0.9/1000*7,16/1000*7,90/1000*7,0.015/1000*7,15/1000*7);
		$vitaminsL=array(3/1000*7,100000,1000*7,2*7,0.1/1000*7,1*7);
		if($age<31)
		{
			$Rm=(1000+2.3+0.055+0.15+400+11)/1000*7;
			$Lm=(2500+11+0.4+1.1+40)/1000*7;
		}
		else
		{
			if(($age>30)&&($age<51))
			{
				$Rm=(1000+2.3+0.055+0.15+420+11)/1000*7;
				$Lm=(2500+11+0.4+1.1+40)/1000*7;
			}
			else
			{
				if(($sge>50)&&($age<70))
				{
					$Rm=(1000+2.3+0.055+0.15+420+11)/1000*7;
					$Lm=(2000+11+0.4+1.1+40)/1000*7;					
				}
				else//age >70
				{
					$Rm=(1200+2.3+0.055+0.15+420+11)/1000*7;
					$Lm=(2000+11+0.4+1.1+40)/1000*7;
					
				}//end of age>70
			}//end of age >50
		}//end of age >30
		$range=array($vitaminsR,$vitaminsL,$Rm,$Lm);
		return $range;
	}//end of male
	else//female
	{
		$vitaminsR=array(0.7/1000*7,0.014*7,0.075*7,0.015/1000*7,0.015*7);
		$vitaminsL=array(0.003*7,10000,1000*7,2*7,0.1/1000*7,1*7);
		if($age<31)
		{
			$Rm=(1000+1.8+0.055+0.15+310+8)/1000*7;
			$Lm=(2500+11+0.4+1.1+40)/1000*7;
		}
		else
		{
			if(($age>30)&&($age<51))
			{
				$Rm=(1000+1.8+0.055+0.15+320+8)/1000*7;
				$Lm=(2500+11+0.4+1.1+40)/1000*7;
			}
			else//age > 50
			{
				$Rm=(1200+1.8+0.055+0.15+320+8)/1000*7;
				$Lm=(2000+11+0.4+1.1+40)/1000*7;					
			}//end of age >50
		}//end of age >30
		$range=array($vitaminsR,$vitaminsL,$Rm,$Lm);
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
	
}
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
		return $arr2;
	}
}//end of function saveascolumn
function saveascolumnWEEK($arrinput)//sum element of array by categories of nutrients
{
		$ccount=count($arrinput);
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
			$u_energy+=$arrinput[$i]['0'];
			$u_protein+=$arrinput[$i]['1'];
			$u_carbohydrates+=$arrinput[$i]['2'];
			$u_fat+=$arrinput[$i]['3'];
			$u_VA+=$arrinput[$i]['4'];
			$u_VB+=$arrinput[$i]['5'];
			$u_VC+=$arrinput[$i]['6'];
			$u_VD+=$arrinput[$i]['7'];
			$u_VE+=$arrinput[$i]['8'];
			$u_mineral+=$arrinput[$i]['9'];
			$u_water+=$arrinput[$i]['10'];
		}
		$arr2=array($u_energy,$u_protein,$u_carbohydrates,$u_fat,$u_VA,$u_VB,$u_VC,$u_VD,$u_VE,$u_mineral,$u_water);
		return $arr2;
}//end of function saveascolumn

function estimateVandM($intake,$requirement,$limit)//for show comment to user
{
	if($intake<$requirement)
	{
		$c="攝取不足";
	}
	else
	{
		if($intake>$limit)
		{
			$c="攝取過多";
		}
		else
		{
			$c="剛剛好";
		}
	}
	return $c;
}//end of estimateVandM
function estimateEnergy($intake,$requirement)//for show comment about energy
{
	if($intake<$requirement*0.9)
	{
		$c="過少";
	}
	else
	{
		if($intake>$requirement*1.1)
		{
			$c="過多";
		}
		else
		{
			$c="剛剛好！";
		}
	}
	return $c;
}//end of estimateEnergy

//-------------------------------------end of function area

//-------------------------------------------------------------main()___moved to <body>


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
	<style>
	hr.style-one {
    border: 0;
    height: 1px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}
</style>
</head>
<body>
<div style="position:relative;">
<div style="width:1000px;position:relative;
background-color:#E9F1FD;margin:10px auto;padding:30px;line-height:35px;overflow:auto;">
<a href="analysisWeek.php" class="text-right pull-right">切換英文</a>
<!-- <input type="submit" name="chinese" value="切換中文" class="btn btn-info"> -->
<?php
if(isset($_POST['chinese']))
{
	header("Location:analysisWeek.php");
}
?>
<?php
if((!isset($_SESSION["id"]))||(!isset($_SESSION["account"])))
{
	alert("—— You need to login first ——","../index.php");
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
	
	$sql4check="SELECT recordcheck FROM userbmi WHERE u_id='$user_id';";
	$recordTorF=$db_link->query($sql4check);
	foreach($recordTorF as $TF)
	{$crecord=$TF;}
	
	if($crecord['recordcheck']=="true")//check if finished bmi info
	{
		//---- show general info about user
		echo "<h3>嗨 $user_account </h3>";
		$sql="SELECT * FROM userbmi WHERE u_id='$user_id';";
		$hNw=$db_link->query($sql);
		
		//get bmi info
		foreach($hNw as $hw)
		{$user_hNw=$hw;}
		
		//caculate bmi
		$bmivalue=calbmi($user_hNw['u_height'],$user_hNw['u_weight']);
		echo "</br>您的 BMI : ".$bmivalue['0']."</br>";
		$statement=$bmivalue['1'];
		
		//for birth and gender
		$sqlbirth="SELECT * FROM $usertable WHERE id='$user_id';";
		$bresult=$db_link->query($sqlbirth);
		$ageNgender=calage($bresult);//get age and gender
		
		//get range of vitamins and minerals   *array{arr,arr,num,num}
		$vNmRange=requirementNlimit($ageNgender['0'],$ageNgender['1']);
		$vitaminR=$vNmRange['0'];
		$vitaminL=$vNmRange['1'];
		$mineralsR=$vNmRange['2'];
		$mineralsL=$vNmRange['3'];
		
		//check extent of physical labour from database and caculate energy 
		$dailykcal=caldailyenergyRequirement($user_hNw,$statement);
		
		//dailyenergy=[energy,protein,carbhydrate,fat]
		$dailyenergy=array($dailykcal,$dailykcal*0.15,$dailykcal*0.6,$dailykcal*0.25);
		
		//get date in week
		$today=date("Y-m-d");
		$arrD=getweekdate($today);

		
		//check results of dates
		for($i=0;$i<count($arrD);$i++)
		{
			$sql4week="SELECT * FROM userrecord WHERE u_id='$user_id' AND u_recordT LIKE '$arrD[$i]%';";
			$cd=$db_link->query($sql4week);
			$count=mysqli_num_rows($cd);
			$arrcount[]=$count;//count result
		}
		$cweek=array_product($arrcount);//product result if exist 0(no record) result=0
		if($cweek==0)//if any record of day is 0
		{
			echo "需要有近七天的飲食記錄才能進行一週分析哦！</br>&nbsp";
		}
		else//recorded a week
		{
			//echo "Loading analysis...";
			
			//caculate tatol per day
			for($i=0;$i<count($arrD);$i++)
			{
				$sqlr="SELECT * FROM userrecord WHERE u_id='$user_id' AND u_recordT LIKE '$arrD[$i]%';";
				$records=$db_link->query($sqlr);
				$countr=mysqli_num_rows($records);//count amount of result
				$arrR=[];//initial arr =empty
				foreach($records as $rr)//get records per day
				{
					$arrR[]=array_slice($rr, 5);//delete first 5 fields
				}

				$sumarr[]=saveascolumn($arrR);//sum per day
			}//end of for loop
			
			$sumallweek=saveascolumnWEEK($sumarr);
			$vitaminNmineralintake=array_slice($sumallweek, 4);//get rid of protein carb fat 0~4 A~E 5=>mineral
			
			//comment about energy intake
			$comment4energy=[estimateEnergy($sumarr['0']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['1']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['2']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['3']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['4']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['5']['0'],$dailyenergy['0']),
			estimateEnergy($sumarr['6']['0'],$dailyenergy['0'])];
			//echo "comment:</br>";
			//print_r($comment4energy);
			//end of energy comment
			
			
			//comment about situation of v and m intake
			$comment4VNM=[estimateVandM($vitaminNmineralintake['0'],$vitaminR['0'],$vitaminL['0']),estimateVandM($vitaminNmineralintake['1'],$vitaminR['1'],$vitaminL['1']),estimateVandM($vitaminNmineralintake['2'],$vitaminR['2'],$vitaminL['2']),estimateVandM($vitaminNmineralintake['3'],$vitaminR['3'],$vitaminL['3']),estimateVandM($vitaminNmineralintake['4'],$vitaminR['4'],$vitaminL['4']),estimateVandM($vitaminNmineralintake['5'],$mineralsR,$mineralsL)];
			//echo "comment:</br>";
			//print_r($comment4VNM);
			//end of Vitmain comment
			
			
			
		//-------- draw charts
			//for chart1
			$dataPoints1C1 = array(
				array("label"=> $arrD['0'], "y" => $sumarr['0']['0'],"cmt"=>$comment4energy['0']),
				array("label"=> $arrD['1'], "y" => $sumarr['1']['0'],"cmt"=>$comment4energy['1']),
				array("label"=> $arrD['2'], "y" => $sumarr['2']['0'],"cmt"=>$comment4energy['2']),
				array("label"=> $arrD['3'], "y" => $sumarr['3']['0'],"cmt"=>$comment4energy['3']),
				array("label"=> $arrD['4'], "y" => $sumarr['4']['0'],"cmt"=>$comment4energy['4']),
				array("label"=> $arrD['5'], "y" => $sumarr['5']['0'],"cmt"=>$comment4energy['5']),
				array("label"=> $arrD['6'], "y" => $sumarr['6']['0'],"cmt"=>$comment4energy['6'])
			 );
			$dataPoints2C1 = array(
				array("label" => $arrD['0'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['0']),
				array("label" => $arrD['1'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['1']),
				array("label" => $arrD['2'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['2']),
				array("label" => $arrD['3'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['3']),
				array("label" => $arrD['4'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['4']),
				array("label" => $arrD['5'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['5']),
				array("label" => $arrD['6'], "y" => $dailyenergy['0'],"cmt"=>$comment4energy['6'])
			 );//end of chart 1
			 
			 //for chart2 1)intake bar chart
				$dataPointsProteinC2 = array(
					array("label"=> $arrD['0'], "y"=> $sumarr['0']['1']*4),
					array("label"=> $arrD['1'], "y"=> $sumarr['1']['1']*4),
					array("label"=> $arrD['2'], "y"=> $sumarr['2']['1']*4),
					array("label"=> $arrD['3'], "y"=> $sumarr['3']['1']*4),
					array("label"=> $arrD['4'], "y"=> $sumarr['4']['1']*4),
					array("label"=> $arrD['5'], "y"=> $sumarr['5']['1']*4),
					array("label"=> $arrD['6'], "y"=> $sumarr['6']['1']*4)
				); 
				$dataPointsCarbhydratesC2 = array(
					array("label"=> $arrD['0'], "y"=> $sumarr['0']['2']*4),
					array("label"=> $arrD['1'], "y"=> $sumarr['1']['2']*4),
					array("label"=> $arrD['2'], "y"=> $sumarr['2']['2']*4),
					array("label"=> $arrD['3'], "y"=> $sumarr['3']['2']*4),
					array("label"=> $arrD['4'], "y"=> $sumarr['4']['2']*4),
					array("label"=> $arrD['5'], "y"=> $sumarr['5']['2']*4),
					array("label"=> $arrD['6'], "y"=> $sumarr['6']['2']*4)
				);
				 
				$dataPointsFatC2 = array(
					array("label"=> $arrD['0'], "y"=> $sumarr['0']['3']*9),
					array("label"=> $arrD['1'], "y"=> $sumarr['1']['3']*9),
					array("label"=> $arrD['2'], "y"=> $sumarr['2']['3']*9),
					array("label"=> $arrD['3'], "y"=> $sumarr['3']['3']*9),
					array("label"=> $arrD['4'], "y"=> $sumarr['4']['3']*9),
					array("label"=> $arrD['5'], "y"=> $sumarr['5']['3']*9),
					array("label"=> $arrD['6'], "y"=> $sumarr['6']['3']*9)
				);
				//for chart2 2)requirement line 
				$dataPointsP2C2 = array(
					array("label"=> $arrD['0'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['1'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['2'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['3'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['4'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['5'], "y"=> $dailyenergy['1']),
					array("label"=> $arrD['6'], "y"=> $dailyenergy['1'])
				);
				$dataPointsC2C2 = array(
					array("label"=> $arrD['0'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['1'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['2'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['3'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['4'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['5'], "y"=> $dailyenergy['2']),
					array("label"=> $arrD['6'], "y"=> $dailyenergy['2'])
				);
				$dataPointsF2C2 = array(
					array("label"=> $arrD['0'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['1'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['2'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['3'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['4'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['5'], "y"=> $dailyenergy['3']),
					array("label"=> $arrD['6'], "y"=> $dailyenergy['3'])
				);
				//end of chart2		
				
				//for chart3
				$dataPointsIntake = array( 
					array("label" => "VitmainA",  "y" => $vitaminNmineralintake['0']),
					array("label" => "VitmainB", "y" => $vitaminNmineralintake['1']),
					array("label" => "VitmainC", "y" => $vitaminNmineralintake['2']),
					array("label" => "VitmainD",  "y" => $vitaminNmineralintake['3']),
					array("label" => "VitmainE", "y" => $vitaminNmineralintake['4']),
					array("label" => "Minerals",  "y" => $vitaminNmineralintake['5'])
				);
				 
				$dataPointsRequirement = array( 
					array("label" => "VitmainA",  "y" => $vitaminR['0']),
					array("label" => "VitmainB", "y" => $vitaminR['1']),
					array("label" => "VitmainC", "y" => $vitaminR['2']),
					array("label" => "VitmainD",  "y" => $vitaminR['3']),
					array("label" => "VitmainE", "y" => $vitaminR['4']),
					array("label" => "Minerals",  "y" => $mineralsR)
				);
				
				$dataPointsLimit = array( 
					array("label" => "VitmainA",  "y" => $vitaminL['0']),
					array("label" => "VitmainB", "y" => ""),
					array("label" => "VitmainC", "y" => $vitaminL['2']),
					array("label" => "VitmainD",  "y" => $vitaminL['3']),
					array("label" => "VitmainE", "y" => $vitaminL['4']),
					array("label" => "Minerals",  "y" => $mineralsL)
				);
				//end of chart 3
			//end of draw charts

		?>
		<script>
window.onload = function () {

//---chart1 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	backgroundColor: "transparent",
	//theme: "light2",
	title:{
		text: "一週攝取量＆需求量"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "熱量",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		//enabled: false
		content:"{label}: {y}</br>{cmt}"
	},
	data: [{
		type: "area",
		name: "攝取量",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1C1, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "line",
		name: "需求量",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2C1, JSON_NUMERIC_CHECK); ?>
	}
	]
});//end of chart1

//-----chart2
var chart2 = new CanvasJS.Chart("chartContainer2", {
	backgroundColor: "transparent",
	title: {
		text: "詳細分析"
	},
	theme: "light2",
	animationEnabled: true,
	toolTip:{
		shared: true,
		reversed: true
	},
	axisY: {
		gridColor:"#494454",
		title: "熱量需求量＆您的攝取量",
		suffix: " Kcal"
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
		{
			type: "stackedColumn",
			name: "蛋白質",
			showInLegend: true,
			yValueFormatString: "#,##0 kcal",
			dataPoints: <?php echo json_encode($dataPointsProteinC2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedColumn",
			name: "碳水化合物",
			showInLegend: true,
			yValueFormatString: "#,##0 kcal",
			dataPoints: <?php echo json_encode($dataPointsCarbhydratesC2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedColumn",
			name: "脂肪",
			showInLegend: true,
			yValueFormatString: "#,##0 kcal",
			dataPoints: <?php echo json_encode($dataPointsFatC2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "line",
			name: "蛋白質需求量",
			showInLegend: true,
			dataPoints: <?php echo json_encode($dataPointsP2C2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "line",
			name: "碳水化合物需求量",
			showInLegend: true,
			dataPoints: <?php echo json_encode($dataPointsC2C2, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "line",
			name: "脂肪需求量",
			showInLegend: true,
			dataPoints: <?php echo json_encode($dataPointsF2C2, JSON_NUMERIC_CHECK); ?>
		}
	]
});//end of chart2
//chart 3
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	backgroundColor: "transparent",
	title: {
		text: "維他命 & 礦物質"
	},
	toolTip: {
		shared:true,
		//content:"{label}-{name} :{y}</br> situation : {comment}"
	},
	axisY: {
		title: "您的攝取量",
	},
	data: [{
		type: "stackedBar100",
		name: "攝取量",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsIntake, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "stackedBar100",
		name: "需求量",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsRequirement, JSON_NUMERIC_CHECK); ?>
	},
	{
		type: "stackedBar100",
		name: "極限值",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsLimit, JSON_NUMERIC_CHECK); ?>
	}]
});
//end of chart 3

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
chart1.render();
chart2.render();
chart3.render();

}
</script>
</br>
<div id="c1">
<hr class="style-one"></br>
<div id="chartContainer1" style="height: 370px; width: 80%;margin:0 auto;"></div><!-- height: 370px; -->
<span style="float:right;margin-right:30%"></br>* 需求量是根據您的BMI值及工作強度等級來計算 *</br></span>
<div class="clearfix"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></br>
</div>
<div class="clearfix"> </div></br>
<div id="c2">
<hr class="style-one"></br>
<div id="chartContainer2" style="height: 370px; width: 80%;margin:0 auto;"></div>
<span style="float:right;margin-right:20%"></br>* 脂肪=25%*熱量 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 蛋白質=15%*熱量 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 碳水化合物=60%*熱量 *</span></br>
<div class="clearfix"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></br>
</div>

<div id="c3">
<hr class="style-one"></br>
<div id="showcomment" height="100%"style="color:#636363;line-height:43px;margin-top:3.7%;float:right;border:1px solid transparent">
<font size="2" face="Courier New" >
<table>
<tr><th height="22" align="left"style="border:1px solid transparent;">> <?php echo $comment4VNM['5'];?></th></tr>
<tr><th height="22" align="left"style="border:1px solid transparent;">> <?php echo $comment4VNM['4'];?></th></tr>
<tr><th height="22" align="left"style="border:0px solid transparent;">> <?php echo $comment4VNM['3'];?></th></tr>
<tr><th height="22" align="left"style="border:0px solid transparent;">> <?php echo $comment4VNM['2'];?></th></tr>
<tr><th height="22" align="left"style="border:1px solid transparent;">> <?php echo $comment4VNM['1'];?></th></tr>
<tr><th height="22" align="left"style="border:1px solid transparent;">> <?php echo $comment4VNM['0'];?></th></tr>
</table>
</font>
</div>
<div id="chartContainer3" style="height: 370px; width: 80%;margin:0 auto;"></div><!-- height: 300px; -->
<span style="float:right;margin-right:35%"><br>* 最大值是根據您的年紀來計算 *</span></br>
<div class="clearfix"> </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div></br>

</body>
<?php
		
		}//end of //recorded a week

	
	}//end of if finished bmi info
	else//if recordcheck =false
	{
		alert("—— 請先填寫BMI資料才能進行分析哦！ ——","../index.php");
	}
}// end of login statement
?>
<div class="form-group">
	<div class="col-md-12">
		<div class="control-wrapper">
			<!--onClick="javascript:location.href='http://localhost/website2/index.php'"-->
		    <a href="../index.php" class="text-right pull-right">返回</a>
		</div>
	</div>
</div>

</div>
</div>
</html> 
