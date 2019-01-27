
 <?php
session_start();
include "connection.php";

if (isset($_GET['category'])&&isset($_GET['brand'])&&isset($_GET['model'])&&isset($_GET['size'])&&isset($_GET['quantity'])&&isset($_GET['sellp'])&&isset($_GET['mainproductid'])&&isset($_GET['logoid'])&&isset($_GET['selectedcustomer'])&&isset($_GET['paymentmode'])&&isset($_GET['total'])&&isset($_GET['mainid'])) {
	//isset($_GET['category'])&&isset($_GET['brand'])&&isset($_GET['model'])&&isset($_GET['size'])&&isset($_GET['quantity'])&&isset($_GET['sellp'])
$category="N/A";
$brand="N/A";
$model="N/A";
$size="N/A";
$quantity=0;
$sellp=0;
$productid=0;
$logoid=0;
$id=0;
$totalprice=0;
$selectedcustomer=null;
$paymentmode=null;
$mainid='';
$heightl='';
$widthl='';
$x1='';
$y1='';
$category=$_GET['category'];
$brand=$_GET['brand'];
$model=$_GET['model'];
$size=$_GET['size'];
$sizew=$_GET['sizew'];
$quantity=$_GET['quantity'];
$sellp=$_GET['sellp'];
$id=$_SESSION['id'];
$productid=$_GET['mainproductid'];
$logoid=$_GET['logoid'];
$selectedcustomer=$_GET['selectedcustomer'];
$paymentmode=$_GET['paymentmode'];
$totalprice=$_GET['total'];
$accauntbalance=0;
$mainid=$_GET['mainid'];
if($mainid==''){
	$mainid='main';
}

$x1=$_GET['posl'];
$y1=$_GET['post'];
//echo $category.' '.$brand.' '.$model.' '.$size.' '.$quantity.' '.$sellp.' '.$id.' '.$productid.' '.$logoid.' '.$selectedcustomer.' '.$paymentmode.' '.$totalprice;

$flag="true";
if ($productid!=null&&$logoid!=null&&$id!=null) {
$sql1="select * from orders where productid='$productid' and logoid='$logoid' and customerid='$id' and status='ordered' ";
//echo "here";
echo $sql1;
$result=mysqli_query($conn,$sql1);
while ($row=mysqli_fetch_assoc($result)) {
//	echo "here";
	
	if ($row['id']==null) {
		# code...
	}else{
	$flag="false";
	
	echo "order already placed !";
}
}
}else
{
	echo "please fill all required fields";
}

if ($flag=="true") {
  
    
	if ($category!='N/A'&&$sellp!=0&&$logoid!=0&&$productid!=0) {
		
  $sq1="select * from customer where id=$id";
  //echo $sq1;
    $result=mysqli_query($conn,$sq1);
    while($row=mysqli_fetch_assoc($result)){
       // echo $row['accaunt'];
        $accauntbalance=$row['accaunt'];
    }

//echo $accauntbalance;

$sql = "INSERT INTO `lmdot`.`orders` (`id`, `type`, `productid`, `logoid`, `customerid`, `dateoforder`,
 `totalprice`, `sellprice`, `subcustomerid`, `ordermode`, `status`, `mainlogoid`, `heightl`, `widthl`, 
 `x1`, `y1`) VALUES (NULL,'$category', '$productid', 
 '$logoid', '$id',now(), $totalprice, $sellp, '$selectedcustomer', '$paymentmode','ordered',
 '$mainid',$size,$sizew,'$x1','$y1');";
//$sql = "INSERT INTO `orders` (`id`, `type`, `productid`, `logoid`, `customerid`, `dateoforder`, `totalprice`, `sellprice`, `subcustomerid`, `ordermode`, `status`,`mainlogoid`) VALUES (NULL,'$category', '$productid', '$logoid', '$id',now(), $totalprice, $sellp, '$selectedcustomer', '$paymentmode','ordered','$mainid');";
if (mysqli_query($conn,$sql)) {
if($accauntbalance>$totalprice){
$sql4="update customer set accaunt=accaunt-$totalprice where id=$id";

if (mysqli_query($conn,$sql4)) {
	echo "order placed successfully";
}else{
	echo "please fill all fields can't update accaunt";
}
}else{
    echo "your accaunt balance is low";
}


}else
{
	echo "please fill all fields !";
}
}
}

}else{

	
echo "please fill all required fields outer";
}
	?>
