<?php
session_start();
include 'connection.php';
if (isset($_GET['productid'])) {
    $height;
    $width;
$logoid1;
$pid1;
$category1=null;
$type=null;
$customerid1=null;
$subcustomerid=null;
$mainid;
$rows=array();
 $pid=$_GET['productid'];
 


$sql1 ="select * from orders where id=$pid";
$result1=mysqli_query($conn,$sql1);
while ($row=mysqli_fetch_assoc($result1)) {
    $customerid1=$row['customerid'];
    $type=$row['type'];
    $pid1=$row['productid'];
    $subcustomerid=$row['subcustomerid'];
    $rows[]=$row;
}


$sql2="select * from category where category='$type'" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
    $category1=$row['category'];
    $rows[]=$row;
}

$sql2="select * from $category1 where id=$pid1" ;
$result3=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result3)) {
    $rows[]=$row;
}


$sql2="select * from customer where id=$customerid1" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
    $rows[]=$row;
}

$sql2="select * from customerdetail where id=$subcustomerid" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {

    $rows[]=$row;
}

print json_encode($rows);
}
?>