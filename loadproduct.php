<?php
include 'connection.php';

if (isset($_GET['category'])&&isset($_GET['brand'])&&isset($_GET['model'])&&isset($_GET['name1'])&&isset($_GET['name2'])) {
	$category=$_GET['category'];
	$brand=$_GET['brand'];
	$model=$_GET['model'];
	$name1=$_GET['name1'];
	$name2=$_GET['name2'];
//echo $category.' '.$brand.' '.$model; 
$cat;
$sql="select * from category where category='$category'";
$result=mysqli_query($conn,$sql);
$rows=array();
while ($row=mysqli_fetch_assoc($result)) {
	$cat=$row['category'];
}

$sql1="select * from $cat where $name1='$brand' and $name2='$model'";
//echo $sql1;
$result1=mysqli_query($conn,$sql1);
while ($row=mysqli_fetch_assoc($result1)) {
		$rows[]=$row;
}
print json_encode($rows);
}

?>