<?php

session_start();
include 'connection.php';

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['newp'])){
    $id=$_SESSION['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $newp=$_POST['newp'];

    $sql = "UPDATE `customer` SET `password` = '$newp' WHERE `id` = $id and `username`='$username' and `password`='$password'";

if(mysqli_query($conn,$sql)&&mysqli_affected_rows($conn)!=0){
echo 'Password Changed Successfully';
}else{
echo 'Unable to change password';
}

}else{
	echo "fail to add";
}



//}else{
  //  	echo "category already exit";
//}



?>