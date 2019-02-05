<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php
include 'connection.php';
if (isset($_GET['category'])&&isset($_GET['c1'])&&isset($_GET['c2'])&&isset($_GET['c3'])&&isset($_GET['c4'])&&isset($_GET['c5'])&&isset($_GET['c6'])&&isset($_GET['c7'])&&isset($_GET['c8'])) {
$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];
$c4=$_GET['c4'];
$c5=$_GET['c5'];
$c6=$_GET['c6'];
$c7=$_GET['c7'];
$c8=$_GET['c8'];
$c9=$_GET['c9'];
$c10=$_GET['c10'];
$c11=$_GET['c11'];
$c12=$_GET['c12'];
$category=$_GET['category'];

//echo $category.' '.$c1.' '.$c2.' '.$c3.' '.$c4.' '.$c5.' '.$c6.' '.$c7;

$sql="select * from category where category='$category'";
$result=mysqli_query($conn,$sql);
$a=array();
while ($row=mysqli_fetch_assoc($result)) {
	$a[1]=$row['c1'];
	$a[2]=$row['c2'];
	$a[3]=$row['c3'];
	$a[4]=$row['c4'];
	$a[5]=$row['c5'];
$a[6]=$row['c6'];
$a[7]=$row['c7'];
$a[8]=$row['c8'];
$a[9]=$row['c9'];
$a[10]=$row['c10'];
$a[11]=$row['c11'];
$a[12]=$row['c12'];
}
//$sql="Insert into $category (id,'$a[1]','$a[2]','$a[3]','$a[4]','$a[5]','price') values(null,'$c1','$c2','$c3','$c4','$c5',7777)";
//`id`, `brand`, `model`, `screensize`, `imagepath`, `zone`, `price`
$sql = "INSERT INTO `$category` (`id`, `$a[1]`, `$a[2]`, `$a[3]`, `$a[4]`, `$a[5]`, `$a[6]`,`$a[7]`,`$a[8]`,`$a[9]`,`$a[10]`,`$a[11]`,`$a[12]`) VALUES (NULL,'$c1','$c2','$c3','$c4','$c5',$c6,'$c7','$c8','$c9','$c10','$c11','$c12');";
echo '\n'.$sql;
if (mysqli_query($conn,$sql)) {
	echo 'Record Inserted successfully !';
}else{
	echo "Error inserting";
}

//print_r($a);
}

?>