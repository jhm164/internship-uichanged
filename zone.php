<?php
include "connection.php";
if (isset($_POST['zone'])) {
	$zone=$_POST['zone'];

$sql="select * from zones where name='$zone'";

$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) {
	echo $row['price'];
}
}
?>