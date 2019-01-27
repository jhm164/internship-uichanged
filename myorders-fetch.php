
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
 $pid=$_GET['productid'];
 
$sql1 ="select * from orders where id=$pid";
$result1=mysqli_query($conn,$sql1);

?>
<center>
<table class="table table-dark">
  <thead><th>product</th></thead>
  <tbody>
  
<?php

while ($row=mysqli_fetch_assoc($result1)) {


  $veri=$row['id'];
?>
<tr>
  <td>Order Id</td>
   <td><?php echo $row['id']; ?></td>
</tr>
 <tr>
<td>Date of order</td>
<td><?php echo $row['dateoforder']; ?></td>
</tr>
  <tr>
<td>product ID</td>
<td><?php echo $row['productid']; ?></td>
</tr>
<tr>
  <td>Current Status</td>
 <td><?php echo $row['status']; ?></td>
</tr>

<tr  ><td colspan="2"  >
     <center style="margin-top:15px; ">   
<?php
$height=$row['heightl'];
$width=$row['widthl'];
$logoid1=$row['logoid'];
$pid1=$row['productid'];
$type=$row['type'];
$mainid=$row['mainlogoid'];
$customerid1=$row['customerid'];
$subcustomerid=$row['subcustomerid'];
}

$sql2="select * from category where category='$type'" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
$category1=$row['category'];
}

$sql2="select * from $category1 where id=$pid1" ;
$result3=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result3)) {

?>
<img src="<?php echo $row[$mainid];?>" id="main" style="background-color: white;">
<?php
}
$sql2="select * from logo where id=$logoid1" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
  ?>
            
<img src="<?php echo $row['imagepath'];?>" id="logo" style="background:transparent;">



  <?php



  
?></center>
</td></tr>
<tr><td></td>
<td><span style="margin-left:10px;color:green;">width:<?php echo $width; ?></span></td></tr>
<tr><td><span style="margin-left:90%;color:green;">height:<?php echo $height; ?></span></td><td><img src="<?php echo $row['imagepath'];?>" id="logos" style="background:transparent;"></td></tr>
<?php }

$sql2="select * from customer where id=$customerid1" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {

 ?>
 <tr style="background-color: black;color:white;"><td colspan="2"><center><h3>Marchant Detail</h3></center></td></tr>
 <tr><td>Marchant Name</td><td><?php echo $row['fname'].'  ',$row['mname'].'  '.$row['lname']; ?></td></tr>
 <tr><td> Marchant Address</td><td><?php echo $row['address'];?></td></tr>
 <tr><td>Pin Code</td><td><?php echo $row['pin'];?></td></tr>
  <tr><td>Contact</td><td><?php echo $row['contact'];?></td></tr>
<?php }

$sql2="select * from customerdetail where id=$subcustomerid" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {

?>
<tr style="background-color: black;color:white;"><td colspan="2"><center><h3>Customer Detail</h3></center></td></tr>
<tr><td>Customer Name</td><td><?php echo $row['name'];?></td></tr>
<tr><td>Address</td><td><?php echo $row['add1'];?></td></tr>
<tr><td>Landmark</td><td><?php echo $row['landmark'];?></td></tr>
<tr><td>State</td><td><?php echo $row['state'];?></td></tr>
<tr><td>City</td><td><?php echo $row['city'];?></td></tr>
<tr><td>Pin</td><td><?php echo $row['pincode'];?></td></tr>
<tr><td>Landmark</td><td><?php echo $row['landmark'];?></td></tr>
<tr><td>E-mail</td><td><?php echo $row['email'];?></td></tr>
<tr><td>Mobile</td><td><?php echo $row['mobile'];?></td></tr>
<?php
}
?>
</tbody>
</table>
</center>
<?php
 } ?>