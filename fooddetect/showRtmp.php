<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<link href='css/fooddetect.css' rel='stylesheet'/>
<link href="../login/css/templatemo_style.css" rel="stylesheet" type="text/css">
<link href="../login/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../login/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../login/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">	
</head>
<body>
<div class="dcontainer" >
	<div class="resultheading">
		<h1>Check Result</h1>
	</div>
		
		
<?php
	session_start();//use session
	require_once("..\\login\\connectMYSQL.php");
	
	if(!isset($_SESSION["resulttmp"]))
{
	header("Location: ..\\index.php");
}
	
	$target_dir = "..\\..\\darknet\\x64\\results\\";
	//echo'Welcome show result page!';
	$tmpr=$_SESSION['resulttmp'];
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$cbx="checkbox";
	$ritems=array();
	$select_file = $_SESSION['selectfileN'];
	$appendata = fopen($target_dir.$select_file, 'a');
	//store food name in array 
	$arr1= file($target_dir.$tmpr, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	//print_r($arr1);
	
	//------------------------------function area
	function alert($msg) 
	{
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	function mergewithpyramid($array)
	{
		$arr1=[];
		foreach($array as $rows)
		{
			if(!isset($arr1[$rows["fd_Pyramid"]]))
			{
				$arr1[$rows["fd_Pyramid"]]["fd_Pyramid"]=$rows["fd_Pyramid"];
				$arr1[$rows["fd_Pyramid"]]["fd_Name"][]=$rows["fd_Name"];
			}
			else
			{
				$arr1[$rows["fd_Pyramid"]]["fd_Name"][].=$rows["fd_Name"];
			}
		}
		$arr1=array_values($arr1);
		//print_r($arr1);
		return $arr1;
	}//end of merge pyramid
	//-------------------------function area 
?>
<form action="showRtmp.php" method="post" >
<div class="mainregion">
<div class="space"><p></p></br></div>
<div class="searchbar" >
<label>Add results by search :</label></br>
 <input type="Text" class="form-control" name="search" placeholder="search more">
 <input type="submit"name="click" value="Search" class="btn btn-info">
<?php   
if(isset($_POST['click']))
{
	if(!empty($_POST['search']))
	{
		if(isset($_POST['search']))
		{
		 $searchq=$_POST['search'];
		 //$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
		 
		 $sql = "SELECT * FROM fooddata Where fd_Name LIKE '%$searchq%' or fd_Name_cn LIKE '%$searchq%'";
		 $results = $db_link->query($sql);
		 $count=mysqli_num_rows($results);
			 if($count==0)
			 {
				 $output='There was no search results!!';
			 }
			 else
			 {
				 $newarr=mergewithpyramid($results);//display by pyramid title
				 for($i=0;$i<count($newarr);$i++)
				 {
					$type=$newarr[$i]['fd_Pyramid'];
					$sqlpyramid_name = "SELECT * FROM pyramid Where fd_Pyramid = '$type'";
					$result_name = $db_link->query($sqlpyramid_name);
					foreach($result_name as $nn){$pN=$nn;}
					$pyramidN=$pN['fd_pyramid_name'];
					 echo "</br><bold style='font-size:115%'>".$pyramidN." :</bold></br>";
					 for($j=0;$j<count($newarr[$i]['fd_Name']);$j++)
					 {
						// echo "".$newarr[$i]['fd_Name'][$j];
						 $fdname=$newarr[$i]['fd_Name'][$j];
						 //$fdname_cn=$newarr[$i]['fd_Name_cn'][$j];
						 echo "&nbsp&nbsp&nbsp&nbsp<input type=".$cbx." name='lang2[]' value=".$fdname."><label>".$fdname."</label></br>";
						 $arr2[]=$fdname;
					 }
				 }
				/*while($row=mysqli_fetch_array($results))-------original display
				 {
					 $fdname=$row['fd_Name'];
					 echo "<input type=".$cbx." name='lang2[]' value=".$fdname."><label>".$fdname."</label></br>";
					 $arr2[]=$fdname;
				 }*/
				 global $resultL;
				 $resultL=count($arr2);
				 //echo 'length='.$resultL;
			 }
		}
	}
	else
	{
		alert("input must not be empty!");
	}
 
}
?>
 <input type="submit" name="add" value="+" class="btn btn-info"/></br>
 
<?php 
if(isset($_POST['add']))
	{
		//echo "click!!";
		if(!empty($_POST['lang2']))//choose search result 
		{
			foreach($_POST['lang2'] as $valuetmp)
			{
				fwrite($appendata, $valuetmp."\r\n");
			}
		}
	}
	else{/*echo" no click";*/}
?>
</div>

<div class="detectresult" id="001">
<?php
	
	for($i=0;$i<count($arr1);$i++)
	{
		echo "<input type=".$cbx." name='lang[]' value=".$arr1[$i]."><label>".$arr1[$i]."</label></br>";
	}

?>
</div>
<div class="showselectresult" >
<?php
$selectcbx=file($target_dir.$select_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
for($i=0;$i<count($selectcbx);$i++)
	{
		echo "<input type=".$cbx." name='lang3[]' value=".$selectcbx[$i]."><label>".$selectcbx[$i]."</label></br>";
	}
?>
</div>
</div>

<div class="submitbtn4detect" >
<input type="submit" name="submit" value="Submit" style="margin-right:5%;transparent" class="btn btn-info"/></br>
<?php

	if(isset($_POST['submit']))
	{
			
		if(!empty($_POST['lang'])) //choose both detect result
		{
			
			foreach($_POST['lang'] as $value){
				echo $value."<br/>";
				global $ritems;
				$ritems[]=$value;
			}
			if(!empty($_POST['lang3']))//choose search result 
			{
				
				foreach($_POST['lang3'] as $value2){
					echo $value2."<br/>";
					$ritems[]=$value2;
				}
				print_r($ritems);
				$_SESSION['resultItems']=$ritems;
				header("Location:getAmount.php?resultItems=$ritems&id=$user_id&account=$user_account");
			}
			else//did not choose search result
			{
				print_r($ritems);
				$_SESSION['resultItems']=$ritems;
				header("Location:getAmount.php?resultItems=$ritems&id=$user_id&account=$user_account");
			}
		}
		else//only select search result
		{
			if(!empty($_POST['lang3'])) 
			{
				
				foreach($_POST['lang3'] as $value2){
					echo $value2."<br/>";
					$ritems[]=$value2;
				}
				print_r($ritems);
				$_SESSION['resultItems']=$ritems;
				header("Location:getAmount.php?resultItems=$ritems&id=$user_id&account=$user_account");
			}
		}
		
	}
?>
</div>
</form>
<div class="space2"><p></p></br></div>
</div>

</body>