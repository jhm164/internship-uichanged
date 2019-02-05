<?php
session_start();
include 'connection.php';
if (isset($_POST['fname'])&&isset($_POST['mname'])) {
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$addr=$_POST['addr'];
	$landmark=$_POST['landmark'];
	$pin=$_POST['pin'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	


$sql="select * from customer where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($result)) {
$id=$row['id'];
	

$sql = "UPDATE `customer` SET `fname` = '$fname', `address` = '$addr', `landmark` = '$landmark', `pin` = '$pin',  `mname` = '$mname', `lname` = '$lname', `contact` = '$contact' WHERE id=$id";
if (mysqli_query($conn,$sql)) {
	echo "Updated successfully";
	//header('Location:login.php');
}else{
	echo "Fail to update ";
}
}else{
	echo "Fail to update username or password incorrect ";
}


}else{
	echo "please fill all fields";
}
?>