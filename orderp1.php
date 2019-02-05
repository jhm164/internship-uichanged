
 <?php
session_start();
include "connection.php";


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}


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

?>


<!DOCTYPE >
<html >
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayUmoney </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
<!-- BOLT Production/Live //-->
<!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->

</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                   
       
    

<div class="main">
	<div>
    	<img src="images/payumoney.png" />
    </div>
    <div>
    	
    </div>
	<form action="#" id="payment_form">
    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div class="dv">
  
    <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="k2rnYEPS" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="l9BqhiuzC4" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span><input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Amount:</label></span>
    <span><input type="text" id="amount" name="amount" placeholder="Amount" value="6.00" /></span>    
    </div>
    
    <div class="dv">
    <span class="text"><label>Product Id:</label></span>
    <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="<?php echo $productid; ?>" /></span>
    </div>
    <div class="dv">
    <span class="text"><label>Customer id:</label></span>
    <span><input type="text" id="cinfo" name="cinfo" placeholder="Product Info" value="<?php echo $selectedcustomer; ?>" /></span>
    </div>
	<div class="dv">
    <span class="text"><label>Mearchant id:</label></span>
    <span><input type="text" id="minfo" name="minfo" placeholder="Product Info" value="<?php echo $id; ?>" /></span>
    </div>
    <div class="dv">
    <span class="text"><label>First Name:</label></span>
    <span><input type="text" id="fname" name="fname" placeholder="First Name" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Email ID:</label></span>
    <span><input type="text" id="email" name="email" placeholder="Email ID" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Mobile/Cell Number:</label></span>
    <span><input type="text" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="" /></span>
    </div>
    
    <div class="dv">
    
    <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
    </div>
    
    
    <div><input type="submit" value="Pay" onclick="launchBOLT(); return false;" class="btn btn-success"/></div>
	</form>
</div>
</div>
                       
					   </div>
					   </div>
<script type="text/javascript"><!--
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: 'index.php',
          type: 'post',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
			minfo: $('#minfo').val(),
			cinfo: $('#cinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	minfo: $('#minfo').val(),
			cinfo: $('#cinfo').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\"  method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'<input type=\"hidden\" name=\"pid\" value=\"'+BOLT.response.minfo+'\" />' +
		'<input type=\"hidden\" name=\"cid\" value=\"'+BOLT.response.cinfo+'\" />' 
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>	

</body>
</html>
	



<?php
//echo $accauntbalance;

}
}

}else{

	
echo "please fill all required fields outer";
}
	?>
