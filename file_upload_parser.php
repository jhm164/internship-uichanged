<?php
session_start();
include 'connection.php';
echo $_SESSION['id'];
if(isset($_SESSION['id'])){
//$id= $_SESSION['id'];
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc =$_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true


  $filepath = "images/".$fileName;

//  echo $id.' ';
if(!$conn){
  echo die();
}

  $id=$_SESSION['id'];
    //  echo $id;

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}


    
//$up=$fileName.'/'.$
$sql = "INSERT INTO `logo` (`id`,`imagepath`, `imagename`, `type`, `cid`) VALUES (NULL, '$filepath','$fileName','$fileType','$id')";
//echo $sql;
//echo $fileTmpLoc.' '.$filepath;
if(mysqli_query($conn,$sql)&&move_uploaded_file($fileTmpLoc,$filepath)){
    move_uploaded_file($fileTmpLoc,$filepath);
  //  move_uploaded_file($fileName,$filepath);
echo "$fileName uploaded successfully";
}else
{
  echo "please change filename and try again";
}

}else{
    echo 'can not upload choose another way';
}
?>


