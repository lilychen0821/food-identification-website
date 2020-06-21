<?php
	session_start();//use session
	
	$target_dir = "..\\..\\darknet\\x64\\results\\";
	echo'1. weclome call cmd page!';
	$user_id=$_SESSION['id'];
	$user_account=$_SESSION['account'];
	$imgName=$_SESSION['imgName'];//get variable from another page-- jpg
	$imgN=preg_replace('/\\.[^.\\s]{3,4}$/', '', $imgName).".txt";//named txt
	$txtTmp=preg_replace('/\\.[^.\\s]{3,4}$/', '', $imgName)."tmp".".txt";
	$result=preg_replace('/\\.[^.\\s]{3,4}$/', '', $imgName)."r".".txt";//named final result file
	//echo '$withoutExt='.$imgN;//check imgN
	//echo 'imgname='.$imgName;//show img name
	chdir('C:\xampp\htdocs\darknet\x64');//change dir to darknet
	exec('darknet_no_gpu.exe detector test data/food100/food100.data data/food100/yolov2-food100.cfg data/yolov2-food100_60000.weights data/uploads/'.$imgName.' -dont_show > results/'.$imgN);
	
	echo ' 2.complete detect!!!';
	
	//delete first 5 lines , remain detect info
	$content = file_get_contents($target_dir.$imgN);
	$content = explode("\n", $content);
	array_splice($content, 0, 5);
	$newcontent = implode("\n", $content);
	file_put_contents($target_dir.$txtTmp, $newcontent);
		
	echo " 3.delete 5 line done!!!";
	// end of delete first 5 lines

	//show result as Array
	$trimmed = file($target_dir.$txtTmp, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	print_r($trimmed);
	
	//remove numeric or other specific characteres and save in new text file 
	$rspace = str_replace(' ', '', $trimmed);//remove space
	$rnumber= preg_replace('/[0-9]+/', '', $rspace);
	$words = preg_replace("/[^a-z0-9\_\-\.]/i", '', $rnumber);
	print_r($words);
	file_put_contents($target_dir.$result, implode(PHP_EOL, $words));//writting array separated by new line
	echo " 4.Detect complete!!!! save in ".$result;
	
	$file4select=preg_replace('/\\.[^.\\s]{3,4}$/', '', $imgName)."select.txt";
	$handle = fopen($target_dir.$file4select, 'w') or die('Cannot open file:  '.$file4select); 
	$_SESSION['selectfileN']=$file4select;
	$_SESSION['resulttmp']=$result;
	header("Location:showRtmp.php?resulttmp=$result&id=$user_id&account$user_account");
	
	
?>

