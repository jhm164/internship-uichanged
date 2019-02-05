<?php
session_start();
include 'connection.php';
if(is_array($_FILES)) 
{
 if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
  $sourcePath = $_FILES['userImage']['tmp_name'];
  $fileType=$_FILES['userImage']['type'];
  $fileName=$_FILES['userImage']['name'];
  $targetPath = "images/".$_FILES['userImage']['name'];

//echo $fileName.' '.$sourcePath  ;
$sku=$_POST['sku'];
if(!$conn){
	echo die();
}


  		$id=$_SESSION['id'];
  		echo $id;
  		
$sql = "INSERT INTO `logo` (`id`,`imagepath`, `imagename`, `type`, `cid`,`skuid`) VALUES (NULL, '$targetPath','$fileName','$fileType',$id,'$sku')";

if(mysqli_query($conn,$sql)){
  move_uploaded_file($sourcePath,$targetPath);
  echo 'source='.$sourcePath.' target= '.$targetPath;
    echo "$fileName upload is complete";
} else {

    echo "move_uploaded_file function failed".$targetPath;
}

 }
}
?>