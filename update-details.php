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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <script type="text/javascript" src="assets/libs/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/libs/js/Chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Vendorboat</title>

    <script type="text/javascript">
$(document).ready(function(){
/*
$('#fname').prop("readonly", true);
$('#mname').prop("readonly", true);
$('#lname').prop("readonly", true);
$('#addr').prop("readonly", true);
$('#landmark').prop("readonly", true);
$('#pin').prop("readonly", true);
$('#username').prop("readonly", true);
$('#password').prop("readonly", true);
*/
$('#submit').click(function(){
var fname=$('#fname').val();
var mname=$('#mname').val();
var lname=$('#lname').val();
var addr=$('#addr').val();
var landmark=$('#landmark').val();
var pin=$('#pin').val();
var contact=$('#contact').val();
var username=$('#username').val();
var password=$('#password').val();

//alert(fname+' '+mname+' '+lname+' '+addr+' '+landmark+' '+pin+' '+contact+' '+username+' '+password);
$.post("update_d.php",
    {
    fname:fname,
	mname:mname,
	lname:lname,
	addr:addr,
	landmark:landmark,
	pin:pin,
	contact:contact,
	username:username,
	password:password
    }, function(data, status){
    	alert(data);
    
   
    });




});


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
                            <h4 class="far fa-credit-card">
                            <b>
                            <?php
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $sql="select * from customer where id=$id";
    
    $result=mysqli_query($conn,$sql);
    
    while ($row=mysqli_fetch_assoc($result)) {
    echo 'A/C: '.$row['accaunt'];
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
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                            <a class="nav-link" href="main.php"><i class="fa fa-fw fa-user-circle"></i>Dashboard<span class="badge badge-secondary">New</span></a>
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
                                            <a class="nav-link" href="trackorder.pph">Track Order</a>
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
                                    </ul>
</div>
                            </li>
                            
                           
                           
                          
                           
                          
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">


                
                
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->
  
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Update Details</h5>
                                    <div class="card-body">

                                    <?php 


if (isset($_SESSION['id'])) {

	$id=$_SESSION['id'];
$sql="select * from customer where id=$id";
$result=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result)) {

	


 ?>

  <div class="form-row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >First Name</label>
                                                <input type="text" class="form-control"  value="<?php echo $row['fname']; ?>" id="fname" placeholder="First name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Middle Name</label>
                                                <input type="text" class="form-control"  value="<?php echo $row['mname']; ?>" id="mname" placeholder="Middle Name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control"  value="<?php echo $row['lname']; ?>" id="lname" placeholder="Last Name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            </div>
                                           
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label >Address</label>
                                                <input type="text" class="form-control" value="<?php echo $row['address']; ?>" id="addr" placeholder="Address" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Landmark</label>
                                                <input type="text" class="form-control" id="landmark" value="<?php echo $row['landmark']; ?>" placeholder="Landmark" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                            
                                <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Pin</label>
                                                <input type="text" class="form-control" value="<?php echo $row['pin']; ?>" id="pin" placeholder="Pin" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Contact</label>
                                                <input type="text" class="form-control" value="<?php echo $row['contact']; ?>" id="contact" placeholder="Contact" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >E-mail id</label>
                                                <input type="email" class="form-control" value="<?php echo $row['email']; ?>" id="email" placeholder="email" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Password" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>

                                           
                                            </div>
                                              
                                           
                                        </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                               <h4 style="color:blue;"><a href="forgotpassword.php"  style="color:blue;">forgot password ?</a></h4>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" id="submit" type="submit">Update</button>
                                            </div>
                                        </div>
  


<?php
}
	}
?>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                           
                        </div>

                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
  
                       
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