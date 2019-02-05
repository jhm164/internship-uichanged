<?php 
session_start();
if (isset($_SESSION['id'])) {
$id=$_SESSION['id'];
include 'connection.php'; 
  

?>






<!doctype html>
<html lang="en">
 
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/png" href="assets/images/fevicon.png" />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" 
	href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css"/>
    
    <title>Vendorboat</title>
<style type="text/css">
   #logo{

                height: 100px;
                width : 150px;
                background : red;
              


            }
#main{
  background-size: cover;
margin-bottom: 20px;
height: 300px;
width: 300px;
position: relative;

}

#displayarea{
    position: absolute;
    overflow:hidden;

}



</style>
    <script type="text/javascript">
                     var v1=0;
                var mainproductid=0;
                var pcategory=0;
                var pmodel=0;
                var logoid1=0;
                var mainid1=null;
                var zone=null;
                var selectedcustomer=0;
                var mainproductprice=0;
                var zonep=0;
                var  paymentmode=null;
                var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

 $(document).ready(function(){

    var tech='';
    tech = getUrlParameter('productid');

    url = new URL(window.location.href);
if(url.searchParams.get('productid')){
    $('#exampleModalCenter1').modal('toggle');
$('#exampleModalCenter1').modal('show');
$('#exampleModalCenter1').modal('hide');
}



$('.llq').hide();
$('#logo').css('top','0px');
$('#logo').css('left','0px');

    $('.here').click(function(){
  var d=$(this).attr('id');
 //  var status=$(this).attr('name');


 
window.location.replace("myorders.php?productid="+d);




//alert(d);
// $(location).attr('href', 'myorders.php?productid='+d);
});

              var v=$("#main").position();
              var marginl=$("#main").css("margin-left");
              var margint=$("#main").css("margin-top");
              var paddingt=$("#main").css("padding-top");
              var paddingl=$("#main").css("padding-left");
              var width=$("#main").outerWidth();
              var height=$("#main").outerHeight();
              var width1=$("#logo").outerWidth();
              var height1=$("#logo").outerHeight();
              var totalp;


            $("#logo").css("margin-left",marginl);
            $("#logo").css("margin-top",margint);
            $("#logo").css("padding-left",paddingl);
            $("#logo").css("padding-top",paddingt);
            $("#logo").css("top",v.top+height/2-height1/2);
            $("#logo").css("left",v.left+width/2-width1/2);

                $('#category').change(function(){
                var id=$(this).attr('id');
                var cat=$(this).val();
                //alert(cat);
                $('#'+id).attr('onkeyup',cat);
                $(location).attr('href', 'createorder.php?category='+cat);
                //$('#'+id).attr('onkeyup',cat);
                $('#bb').text(cat);
                });





 $("body").on("click",".logoc", function(){
    logoid1=$(this).attr('id');
var g= $(this).attr('src');
$('#logo').attr('src',g);
  });





$('.kk').hide();





    });
    </script>
</head>

<body>



    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

 
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <img src="assets/images/newlogo.png" style="height:77px;width:250px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                               
                            </div>
                        </li>
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                           <img src="assets/images/wallet.png" style="hright:20px;width:20px;">
                            
                            <b>
                            <?php
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $sql="select * from customer where id=$id";
    
    $result=mysqli_query($conn,$sql);
    
    while ($row=mysqli_fetch_assoc($result)) {
    echo '<span style="font-size;20px;" >  '.$row['accaunt'].'</span>';
    }
    
    }
    

?>
</b>
</h4>
                            </div>
                        </li>
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'] ; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="update-details.php"><i class="fas fa-user mr-2"></i>Account</a>
                                
                                <a class="dropdown-item" href="main.php?logout=true"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                                           </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Orders</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="createorder.php">Create New<span class="badge badge-secondary">New</span></a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="myorders.php">My Orders</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="trackorder.php">Track Order</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Update </a>
                                <div id="submenu-3" class="collapse submenu" style="">
                              <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="update-details.php">Update Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="changepassword.php">Change Password</a>
                                        </li>
                                    </ul>
</div>
                            </li>
                            
                           
                           
                          
                           
                          
                        </ul>
                    </div>
                </nav>
            </div>


        </div>

</div>
        
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
     


 
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
            

    <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">





              
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">My Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Details</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          

                            <?php
if (isset($_GET['productid'])) {
$logoid1;
$pid1;
$mainid;
$category1=null;
$type=null;
$customerid1=null;
$subcustomerid=null;
$mainimage=null;
$logoh1=null;
$logow1=null;
$logox1=null;
$logoy1=null;
 $pid=$_GET['productid'];
 
$sql1 ="select * from orders where id=$pid";
$result1=mysqli_query($conn,$sql1);

while ($row=mysqli_fetch_assoc($result1)) {

$logoh1=$row['heightl'];
$logow1=$row['widthl'];
$logox1=$row['x1'];
$logoy1=$row['y1'];


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

$logoid1=$row['logoid'];

$pid1=$row['productid'];
$mainid=$row['mainlogoid'];
$type=$row['type'];
$customerid1=$row['customerid'];
$subcustomerid=$row['subcustomerid'];
}

$sql2="select * from category where category='$type'" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
$category1=$row['category'];
}
$lheight='';
$lwidth='';
$x1='';
$y1='';

$sql2="select * from $category1 where id=$pid1" ;
$result3=mysqli_query($conn,$sql2);
?>
<?php
while ($row=mysqli_fetch_assoc($result3)) {
  $lheight=$row['lheight'];
  $lwidth=$row['lwidth'];
  $x1=$row['x1'];
  $y1=$row['y1'];
  $mainimage=$row['imagepath'];
  if($mainid=='main'){
?>

<p id="lheight" class="llq"> <?php echo $lheight; ?></p>
<p id="lwidth" class="llq"> <?php echo $lwidth; ?></p>
<p id="x1" class="llq"> <?php echo $x1; ?></p>
<p id="y1" class="llq"> <?php echo $y1; ?></p>
<div id="displayimage">

<?php
}else{
?>

<?php
}
}
$sql2="select * from logo where id=$logoid1" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {
  ?>
<tr>
<td>
                                  
<div id="main" style="background-color:#c7c7c7;background-image:url('<?php echo $mainimage;?>');height:300px;width:300px;"> 
<div id="displayarea"  style="border:1px dotted gray; height:<?php echo $lheight.'px'; ?>;width:<?php echo $lwidth.'px'; ?>;margin-left:<?php echo $x1.'px'; ?>;margin-top:<?php echo $y1.'px'; ?>;">

<img id="logo" src="<?php echo $row['imagepath'];?>"  style="height:<?php echo $logoh1.'px'; ?>;width:<?php echo $logow1.'px'; ?>;margin-left:<?php echo $logox1.'px'; ?>;top:0;left:0;margin-top:<?php echo $logoy1.'px'; ?>">
</div>
</div>    
</td>
<td>
</td>
</tr>
  </div>
  
  <?php



  
?></center>
</td></tr>
<?php

}

$sql2="select * from customer where id=$customerid1" ;

$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {

 ?>
 <tr><td colspan="2"><center><h2>Merchant Detail</h2></center></td></tr>
 <tr><td>Marchant Name</td><td><?php echo $row['fname'].'  ',$row['mname'].'  '.$row['lname']; ?></td></tr>
 
<?php }



$sql2="select * from customerdetail where id=$subcustomerid" ;


$result2=mysqli_query($conn,$sql2);

while ($row=mysqli_fetch_assoc($result2)) {

?>
<tr ><td colspan="2"><center><h2>Customer Detail</h2></center></td></tr>
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



}


?>
 </tbody>
                                           </table>
                                           </div>
      
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

  <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->


                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        
                            <div class="card-body">

</div>
</div>
</div>









                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Order Type</th>
                                                <th>Date Of Order</th>
                                                <th>Price</th>
                                                <th>Order Mode</th>
                                                <th>Status</th>
                                                <th>More Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                
                                               
                                          
                                            <?php 

$id=$_SESSION['id'];

$sql = "SELECT * FROM `orders` WHERE customerid =$id Order by 'dateoforder' ASC";
    
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) {
?>
<tr>
   <td><?php echo $row['id'];  ?></td>
     <td><?php echo $row['type'];  ?></td>
  <td><?php echo $row['dateoforder'];  ?></td>
 
  <td><?php echo $row['totalprice'];  ?></td>
  <td><?php echo $row['ordermode'];  ?></td>
  <td><?php
if($row['status']=='shipped'){
   echo '<p style="color:red;">'.$row['status'].'</p>';
}else if($row['status']=='ordered'){
   echo '<p style="color:blue;">'.$row['status'].'</p>';
}
    ?></td>
  <td > <p id="<?php echo $row['id']; ?>"  class="here " style="color: blue;cursor:pointer;" name="<?php echo $row['status'] ?>"><span class="fas fa-info-circle"></span> More info</p></td>
<td>




</td>
</tr>

<?php
}


  ?>
   
                                        </tbody>
                                    
                                    </table>


                               
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>

                </div>

              </div>
            </div>


                       


    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>


    
</body>
 
</html>
<?php
}else{
 echo "<h1 class='alert alert-danger'>Please login</h1>";
    header('Location:index.html');
}


 if (isset($_GET['logout'])){
if($_GET['logout']=='true'){
    session_destroy();
header('Location:index.html');
}

} 
?>