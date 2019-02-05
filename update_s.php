<?php
session_start();
include 'connection.php';
if (isset($_POST['id'])&&isset($_POST['status'])) {
	$id=$_POST['id'];
	$status=$_POST['status'];




$sql = "UPDATE `orders` SET `status` = '$status' WHERE id=$id";
if (mysqli_query($conn,$sql)) {
	echo "Updated successfully";
	//header('Location:login.php');
}
else{
	echo "Fail to update username or password incorrect ";
}


}else{
	echo "please fill all fields";
}
?>