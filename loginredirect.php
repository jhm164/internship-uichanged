
<?php
session_start();
include 'connection.php';
if (isset($_POST['username'])&&isset($_POST['username'])) {
	$admin=0;
$username=$_POST['username'];
$password=$_POST['password'];
echo $username.' '.$password;
if ($username!=''&&$password!='') {
	# code...


	$sql="select * from customer where username='$username' and password='$password'";
echo $sql;
	$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
	echo "inside";
	$_SESSION['fname']=$row['fname'];
	$_SESSION['lname']=$row['lname'];
	$_SESSION['id']=$row['id'];
  if ($row['admin']==1) {
 //echo "inside";
 $_SESSION['admin']=$row['admin'];

	echo "<script>location='adminp.php'</script>";
header('Location:adminp.php');

  }else{
//echo "outside";
	echo "<script>location='main.php'</script>";
header('Location:main.php');


  }
  
}

	
}else{
	echo "<script>location='login.php'</script>";
	header('Location:login.php');
}

}else{
	echo 'please fill all fields';
//	echo "<script>location='login.php'</script>";
//	header('Location:login.php');
}
?>