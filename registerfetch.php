<?php
include 'connection.php';
if (isset($_GET['fname'])) {
	$fname=$_GET['fname'];
	$mname=$_GET['mname'];
	$lname=$_GET['lname'];
	$addr=$_GET['addr'];
	$landmark=$_GET['landmark'];
	$pin=$_GET['pin'];
	$contact=$_GET['contact'];
	$username=$_GET['username'];
	$password=$_GET['password'];
	$email=$_GET['email'];
echo $fname.' '.$mname.' '.$lname.' '.$addr.' '.$landmark.' '.$pin.' '.$contact.' '.$username.' '.$password;

//$sql = "INSERT INTO `customer` (`id`, `fname`, `address`, `landmark`, `pin`,
 //`username`, `password`, `mname`, `lname`, `contact`, `accaunt`) VALUES (NULL, '$fname',
 // '$addr', '$landmark', $pin, '$username', '$password', '$mname', '$lname','$contact' 0)";
//echo $sql;




$sql="INSERT INTO `customer` (`id`, `fname`, `address`, `landmark`, `pin`,
 `username`, `password`, `mname`, `lname`, `contact`, `admin`, `accaunt`, 
 `email`) VALUES (NULL, '$fname',
  '$addr', '$landmark', $pin, '$username', '$password', '$mname', '$lname','$contact' ,0, '$email', 0);";
  echo $sql;
if (mysqli_query($conn,$sql)) {
	echo "Records added successfully";
	header('Location:login.php');
}else{
	echo "Fail to add records";
}



}else{
	echo "please fill all fields";
}
?>