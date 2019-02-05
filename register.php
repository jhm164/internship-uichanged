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

    <script type="text/javascript">
	
    $(document).ready(function(){
    
    
    $('#submit').click(function(){
    
    var fname=$('#fname').val();
    var mname=$('#mname').val();
    var lname=$('#lname').val();
    var addr=$('#address').val();
    var landmark=$('#landmark').val();
    var pin=$('#pin').val();
    var contact=$('#contact').val();
    var username=$('#username').val();
    var password=$('#password').val();
    var email=$('#email').val();
    alert(fname+' '+mname+' '+lname+' '+addr+' '+landmark+' '+pin+' '+contact+' '+username+' '+password);
    $.get("registerfetch.php",{
        fname:fname,
        mname:mname,
        lname:lname,
        addr:addr,
        landmark:landmark,
        pin:pin,
        contact:contact,
        username:username,
        password:password,
        email:email
    }, function(data,status){
    
    alert(data);	
    
    });
    });
    //
    
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
               
                <img src="images/logo.png" style="height:70px; width:180px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                               
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                           
                        </li>
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['fname'].' '.$_SESSION['lname'] ; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
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
                            <li class="nav-item">
                                            <a class="nav-link" href="admindash.php"><i class="fas fa-fw fa-chart-pie"></i>Dashboard<span class="badge badge-secondary">New</span></a>
                                        </li>
                            
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminp.php"><i class="fas fa-fw fa-chart-pie"></i>All Orders<span class="badge badge-secondary">New</span></a>
                                        </li>
                            
                            
                                        <li class="nav-item">
                                            <a class="nav-link" href="admindash.php"><i class="fas fa-fw fa-chart-pie"></i>Create New Product<span class="badge badge-secondary">New</span></a>
                                        </li>
                            
                                        <li class="nav-item">
                                            <a class="nav-link" href="addcategory.php"><i class="fas fa-fw fa-chart-pie"></i>Add Category<span class="badge badge-secondary">New</span></a>
                                        </li>
                            
                                        <li class="nav-item">
                                            <a class="nav-link" href="addproduct.php"><i class="fas fa-fw fa-chart-pie"></i>Add Product<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="updatestatus.php"><i class="fas fa-fw fa-chart-pie"></i>Update Status<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="updatestatus.php"><i class="fas fa-fw fa-chart-pie"></i>Update Status<span class="badge badge-secondary">New</span></a>
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
                    <!-- basic table  -->
                    <!-- ============================================================== -->


                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="card">


                                <h5 class="card-header">Bootstrap Validation Form</h5>
                                <div class="card-body">

                                <div class="form-row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >First Name</label>
                                                <input type="text" class="form-control" id="fname" placeholder="First name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Middle Name</label>
                                                <input type="text" class="form-control" id="mname" placeholder="Middle Name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Last Name</label>
                                                <input type="text" class="form-control" id="lname" placeholder="Last Name" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            </div>
                                   
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label >Address</label>
                                                <input type="text" class="form-control" id="address" placeholder="Address" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Landmark</label>
                                                <input type="text" class="form-control" id="landmark" placeholder="Landmark" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                            
                                <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Pin</label>
                                                <input type="text" class="form-control" id="pin" placeholder="Pin" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >Contact</label>
                                                <input type="text" class="form-control" id="contact" placeholder="Contact" required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                <label >E-mail id</label>
                                                <input type="email" class="form-control" id="email" placeholder="email" required="">
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
                                                <button class="btn btn-primary" id="submit" type="submit">Submit form</button>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                  </div>
                  </div>

                </div>

              </div>
            </div>


                   

                   



    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
   
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
  
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