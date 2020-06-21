<?php
session_start();
//$target_dir = "..\\darknet\\x64\\data\\uploads\\";
$target_dir = "uploads/"; //存入圖片目的資料夾路徑
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$user_id=$_SESSION['id'];
$user_account=$_SESSION['account'];

function alert($msg,$url) 
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
	echo "<script>document.location = '$url'</script>";
}
if((!isset($_SESSION["id"]))||(!isset($_SESSION["account"])))
{
	alert("—— You need to login first ——","index.php");

}
else // login statement
{
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 10000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	} 
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$imgNametemp=$_FILES["fileToUpload"]["name"]; //original name
			$imgName="FR".date("mdHis").substr($imgNametemp, strrpos($imgNametemp, "."));//new name
			rename($target_file, $target_dir. $imgName); //rename image
			//echo "The file has been uploaded. Save as ".$imgName;

			$_SESSION['imgName']=$imgName; //pass variable to another php file
			alert("The The file has been uploaded. Save as $imgName","");
			header("Location:fooddetect\\detectobjects.php?id=$user_id&account$user_account");
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}

}// end of login statement
?>