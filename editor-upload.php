<?php
include('functions.php'); 
if(empty($_FILES['file']))
{
	exit();	
}
$errorImgFile = "./img/img_upload_error.jpg";
$name = rand().'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$destinationFilePath = '../fotos/'.$name;
if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
	echo $errorImgFile;
}
else{
	echo $destinationFilePath;
}

?>