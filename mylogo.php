<?php
include 'connection.php';

 if (isset($_GET['id'])) {
 	$id=$_GET['id'];

 	$sql="select * from logo where id=$id";
 	$result=mysqli_query($conn,$sql);
 	while ($row=mysqli_fetch_assoc($result)) {
 	//	echo $row['imagename'];
      $sql="select * from logo where id=$id";
      $result=mysqli_query($conn,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
      	if ( $row['imagepath']=='') {
      		echo "no dataa found";
      	}else{
      ?>
      	<img src="<?php echo $row['imagepath'];?>" height="60" width="60" style=" margin:4px;" class="img-rounded logoc"  id="<?php echo $row['id'];?>" >
      <?php
      }
      	//echo ' <img src="'.$row["imagepath"].'" height="90" width="90">';
        ?>
        
        <?php
      }
       


 	}




 }

if (isset($_GET['id1'])) {
	$id1=$_GET['id1'];
	
$rows=array();


$sql="select * from logo where cid='$id1'";
$result1=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result1)) {
	//	$rows[]=$row;
	?>
 <img src="<?php echo $row['imagepath'];?>" height="60" width="60" style=" margin:4px;" class="img-rounded logoc"  id="<?php echo $row['id'];?>" >

	<?php
}
//print json_encode($rows);
}



?>