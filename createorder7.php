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
<style type="text/css">
   #logo{

                height: 100px;
                width : 150px;
                background : red;
              
                top: 10px;
                left: 10px;


            }
            #main{
                  background-size: cover;
                margin-bottom: 20px;
                height: 300px;
               width: 300px;
               position: relative;
              
            }

            #errmsg1
{
color: red;
}
#errmsg
{
color: red;
}
            
            #wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;

}
#drop-area
{
 

 background-color:white;
 
}      



#displayarea{
    position: absolute;
}


#open-preview{
    background-size: cover;
}
#open-preview :hover  {
   
    border:1px dotted gray;
     opacity: 0.3;
}


</style>

<script>

function _(el){
  return document.getElementById(el);
}
function uploadFile(){
 var jjj=document.getElementById('sqa').value;
 alert(jjj);
 console.log(jjj);
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("GET", "file_upload_parser.php?file1="+file+"&sqa="+jjj);
  ajax.send(formdata);
}
function progressHandler(event){
  _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0;
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}
</script>

  <style>
            h3{
                margin: 30px 0 0 0;
            }
            p{
                margin: 0
            }
            pre{
                margin: 0;
                color : #555;
            }
            .rect {
                height: 100px;
                width : 150px;
                background : #ccc;
                position: absolute;
                top: 10px;
                left: 10px;

            }
            .container{
                margin-bottom: 20px;
                height: 300px;
               width: 300px;
                position: relative;
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

 $(document).ready(function(){



		$('#logo')
	.resizable(

{
     resize:true,
    start: function(e, ui) {
    //	alert('resizing started');

    var p=ui.size;
$('#hl').text($(this).height);
$('#wl').text(p.width);
    },
    resize: function(e, ui) {
        var p=ui.size;
$('#hl').text(p.height);
$('#wl').text(p.width);
    },
    stop: function(e, ui) {
        var p=ui.size;
$('#hl').text(p.height);
$('#wl').text(p.width);
        //alert('resizing stopped');
    },
    containment:"#displayarea"

}).parent().draggable({
		start: function(e, ui) {
          
		},
		resize: function(e, ui) {
		
		},
		stop: function(e, ui) {
			var p=ui.position;
			console.log(p.top+' '+p.left);
		//	alert('drag stopped');
		},
		containment:"#displayarea"
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
              var dish='';
              var disw='';
var dx1='';var dy1='';







 $("body").on("click",".logoc", function(){
    logoid1=$(this).attr('id');


var g= $(this).attr('src');


//alert(dish+' '+disw);

$('#logo').attr('src',g);
  });

            $('#hideid').hide();

   $("body").on("click","#searchbutton", function(){
  var id=$("#search").val();
$('#myicons').load('mylogo.php?id='+id);
});


                $('#category').change(function(){
                var id=$(this).attr('id');
                var cat=$(this).val();
                //alert(cat);
                $('#'+id).attr('onkeyup',cat);
                $(location).attr('href', 'createorder7.php?category='+cat);
                //$('#'+id).attr('onkeyup',cat);
                $('#bb').text(cat);
                });



$('#grab').click(function(){
 category=$('#category').val();
 var name1=$('#m1').text();
  var name2=$('#m2').text();
 brand=$('#i1').val();
 model=$('#i2').val();
//alert(category+" "+brand+" "+model);
$.getJSON( "loadproduct.php?category="+category+"&brand="+brand+"&model="+model+"&name1="+name1+"&name2="+name2, function( data ) {
  pcategory=category;
  var items = [];
  $.each( data, function( key, val ) {

mainproductid=val.id;
zone=val.zone;

//alert(mainproductid+zone);
pmodel=val.model;

mainproductprice=val.price;

$('#main').css('background-image','url('+val.imagepath+')');
$('#open-preview').css('background-image','url('+val.imagepath+')');
$('.img2').attr('src',val.img2);
$('.img3').attr('src',val.img3);
dish=val.lheight;
disw=val.lwidth;
dx1=val.x1;
dy1=val.y1;





  });
});


 // alert(dish+' '+val.lheight);
$('#main').css('background-image','url('+val.imagepath+')');
$('.img2').attr('src',val.img2);
$('.img3').attr('src',val.img3);
$('#displayarea').css('height',val.lheight);
$('#displayarea').css('width',val.lwidth);


$("#quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
    $("#sellp").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   

$('#logo').css('height',val.lheight);
$("#displayarea").css("margin-top",val.y1);
$('#logo').css('width',val.lwidth);
$('#logo').css('left',val.x1);
$('#logo').css('top',val.y1);
//var zonep;

 $.post("zone.php",
    {
      zone:zone
    }, function(data, status){
        $('#zonepp').text(data);
    var    zonep=data;
        //alert("parsed"+zonep+1000);
    }).then(function(){

      zonep=parseInt($('#zonepp').text());
      // alert(parseInt(zonep)+400);

      //  var ff=zonep;

//zonep=$('#zonepp').text();
 //lert(parseInt(ff)+80);
var m=quantity*mainproductprice;
//alert('m='+m);
var x11=zonep+m;
//alert('x11'+x11);
//alert('zonep'+ff);
//alert(x11);
totalp=x11;
$('#total').text(x11);


    });

$('.selection1').show(500);



  });

$('#open-preview').click(function(){
  //  alert($("#hideid").text());
 var id1=$("#hideid").text();
 //var h=$('#displayarea').height();
//var w=$('#displayarea').width();
/*
$('#displayarea').css('height',dish+'px');
$('#displayarea').css('width',disw+'px');
$('#displayarea').css('margin-top',dy1);
$('#displayarea').css('margin-left',dx1);
*/

$('#displayarea').css('height',dish);
$('#displayarea').css('width',disw);
$("#displayarea").css("margin-top",dy1+'px');
$("#displayarea").css("margin-left",dx1+'px');

$('#logo').css('height',dish-10);

$('#logo').css('width',disw-10);

alert(dish);
$('#myicons').load('mylogo.php?id1='+id1);
$('.selection12').show(500);
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
                <a class="navbar-brand" href="index.html">vendorboat</a>
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
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                                           </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Orders</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/createorder7.php">Create New<span class="badge badge-secondary">New</span></a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/carousel.html">My Orders</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="pages/general.html">Track Order</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Update </a>
                                <div id="submenu-3" class="collapse submenu" style="">
                              <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Update Details</a>
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
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <center><h2 class="pageheader-title">Orders</h2></center>
                               
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          
                                            <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">


                            <div class="col-6">
                                <div class="card" style="padding:5%;">
                                    
                                        <h5 class="text-muted">Create product</h5>
                                        
                                         <select class="form-control" name="category" id="category" >
  
                                                        <?php
                                                         if (isset($_GET['category']))
                                                          { 
                                                            ?>
                                                                <option value="<?php  echo $_GET['category']; ?>"><?php  echo $_GET['category']; ?></option>
                                                            <?php
                                                         
                                                          } 
                                                          ?>
                                                           <option>--select--</option>

                                                               <?php 
                                                        $sql="select * from category";
                                                        $arr=array();
                                                          $result=mysqli_query($conn,$sql);
                                                        while ($row=mysqli_fetch_assoc($result)) {

                                                               ?>
                                                              <option value="<?php echo $row['category'] ;?>"><?php echo $row['category'] ;?></option>
                                                            <?php } ?>
                                                           
                                                            </select>
                                             

                                    <?php
                                    if (isset($_GET['category'])) {

                                    $cat=$_GET['category'];
                                    $sql="select * from category where category='$cat'";
                                      $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                    for ($i=1; $i <3 ; $i++) { 
                                      if ($row['c'.$i]!='imagepath'&&$row['c'.$i]!='zone'&&$row['c'.$i]!='price') {
                                       $arr[$i]=$row['c'.$i];
                                     }
                                    }

                                    }
                                    ?>
                                        
                                              <?php
                                    for($j=1;$j<3;$j++){


                                    if($row['c'.$j]!='N/A'){
                                    //echo $arr[$j];
                                    ?>

                                    <?php
                                    //if ($arr[$j]!='imagepath'&&$arr[$j]!='zone'&&$arr[$j]!='price') {
                                       
                                      // print_r($arr);
                                     ?>
   <span id="<?php echo 'm'.$j;?>" class="kk"><?php echo $arr[$j];?></span>
                                       <h5><?php echo $arr[$j];?><span style="color:red;font-size: 20px;">*</span></h5>
                                    
                                     <select class="form-control" id="<?php echo 'i'.$j;?>">

                                     <?php
                                  
                                     $sql="SELECT DISTINCT $arr[$j] FROM $cat ";
                               
                                      $result=mysqli_query($conn,$sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                    ?>  <option>
                                    <?php echo  $row[$arr[$j]]; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                                    </select>

                                    <?php
                                    //} 

                                    }
                                    }

                                    }
                                              ?>
        


    <div style="width: 100%;margin-top: 10px;" id="grab"  class="form-control btn btn-primary"><b style="color:white;">Load</b></div>
  


                                  
                                </div>

                                 <div class="card" style="align-self: center;padding: 2%;"> 
                               
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" id="showmycustomer" data-target="#exampleModalCenter1">My Customers</button>
                                            </div>


                                            <div class="form-row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">customer Name</label>
                                              
                                                <input type="text"  class="form-control" id="cname" placeholder="City" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Address Line1</label>
                                              
                                                <input type="text"  class="form-control" id="cadd1" placeholder="Address" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>


                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Address Line2</label>
                                              
                                                <input type="text"  class="form-control" id="cadd2" placeholder="Address" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Landmark</label>
                                              
                                                <input type="text"  class="form-control" id="landmark" placeholder="Landmark" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                         
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Pincode</label>
                                              
                                                <input type="text"  class="form-control" id="pincode" placeholder="pincode" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Country</label>
                                              
                                                <input type="text"  class="form-control" id="country" placeholder="Country" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">State</label>
                                              
                                                <input type="text"  class="form-control" id="state" placeholder="state" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">City</label>
                                              
                                                <input type="text"  class="form-control" id="city" placeholder="city" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">mobile Number</label>
                                              
                                                <input type="text"  class="form-control" id="mobile" placeholder="Mobile" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Email</label>
                                              
                                                <input type="text"  class="form-control" id="email" placeholder="Email" required >
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
  
     









                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                        <label class="form-check-label" for="invalidCheck">
                                                            Agree to terms and conditions
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            You must agree before submitting.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="button" id="cdetail">Confirm Details</button>
                                            </div>
                                        </div>


                                            <!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div id="existcustomer">
<table class="table table-hover" style="border-bottom: 1px solid gray;" id="mycustomer" >

  <thead>
  <tr></tr>
    <tr style="background-color: #204c67;color: white;" ><th>select</th><th>Customer name</th><th>Country</th><th>City</th><th>Pincode</th><th>Landmark</th></tr></thead>
<tbody>
  
  
  <?php
$sql="select * from customerdetail where recordholder='$id'";

$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    
    
 ?>
 
 <tr id="<?php echo $row['id'];?>" >
  <td>
<input type="radio" name="group" class="get1" data-dismiss="modal" aria-label="Close" id="<?php echo $row['id'];?>" >
</td>
<td><b>
<?php echo $row['name'];?></b></td>
<td>
<?php echo $row['country'];?></td>
<td>
<?php echo $row['city'];?></td>
<td>
<?php echo $row['pincode'];?></td>
<td>
<?php echo $row['landmark'];?></td>

  </tr>  
  
 <?php

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

           
                            </div> 
                            </div>
                             <div class="col-6">

 <p id="hideid"><?php echo $_SESSION['id']; ?></p>

                                                     <div class="card" style="align-self: center;padding: 2%;">


                                   <!-- Large modal -->
                                  
<div  id="open-preview" data-toggle="modal" data-target=".bd-example-modal-lg" style="height: 100px;width: 100px;background-color: gray;"></div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      
    <div class="modal-content" style="padding: 2%;">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
           
        </div>
                       <table>     
                       <tbody>    
                               <tr><td>     
          <h4 style="color: #1c6704;">Preview</h4>

   
<div id="main" style="background-color:#c7c7c7;"> 
<div id="displayarea"  style="border:1px dotted gray;">
<img id="logo"  style=""  />
</div>
</div>

                          <img  id="img2" class="img2 mainc" style="background-color:#c7c7c7; width: 70px;  height: 70px;"  >
                                <img  id="img3" class="img3 mainc" style="background-color:#c7c7c7;width: 70px;  height: 70px;"   >
                               
                      </td> <td style="margin-right:15px;"><center>
                      <h5>Logo Size </h5>
                          <div class="row">
                              <div class="col-6">
                              Height :<span style="font-weight:bold;" id="hl"></span>  
                              </div>
                              <div class="col-6">
                              <h5>Width :<span style="font-weight:bold;" id="wl"></span>    </h5>
                              </div>
                          </div>
                         

                                </center>
                               </td></tr>  
                      <tr><td>
                     <input type="text" name="" id="search" placeholder="search by sqa number"> <input type="button" value="Search" name="" id="searchbutton">

                  <div  id="myicons">    
                  </div>
                      </td></tr>
                      <tr><td>  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div></td></tr>
                      </tbody>    
                      </table>   
              
    </div>
  </div>


 
</div>

<br>




<button type="button" class="btn btn-primary selection1"  id="showupload" data-toggle="modal" data-target="#exampleModalCenter" >
 Upload new design 
</button>

                                       
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Upload new Design</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <div style="background-color: #0000004f;padding: 5px;">
          <h5 style="font-weight: bold;">Enter SQA ID <span style="color: red">*</span></h5><input type="text" placeholder="" class="form-control" name="" id="sqa"></div>
        <div class="row" id="uploadarea" >   
          
<form id="upload_form" enctype="multipart/form-data" method="post">
</form>
<div id="wrapper" class="row" style="width: 200px;border:1px dashed black;" >
 <div id="drop-area"  style="padding: 2px;background-color: #deefde;">
  <p style="  font-weight:bold;">drop image here</p>
  <h3 class="drop-text"><span class="glyphicon glyphicon-file"></span></h3>
 </div>
</div>

<div style="background-color: #e8e7ea;margin:20px;">
<div id="manual" style="margin-top: 10px;">
  <center><p>or</p></center>
      <form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file"  class="btn btn-primary"  name="file1" id="file1"><br>
  <input type="button" value="Upload File" class="btn btn-primary" onclick="uploadFile()"><br>
  <progress id="progressBar" value="0" max="100" style="width:300px;height: 25px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>

    </div>
    </div>
    </div>
    
    </center>
    
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
      
    </div>
    
  </div>
</div>


</div>


                   
                                 <div class="card" style="align-self: center;padding: 2%;"> 

                                        <div class="form-group">
                                                <label for="inputPassword">Quantity</label>
                                                <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" ><span id="errmsg"></span>
                                            </div>

           

      <div class="form-group">
                                                <label for="inputPassword">Selling Price</label>
                                                            
<input type="text"  name="sellp" id="sellp" class="form-control" placeholder="Enter your selling price " ><span id="errmsg1"></span>
       
                                            </div>

                                            
                                        
                                            <div class="card-body border-top">
                                            
                                            <h4>Delivery Mode</h4>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="radio-inline" checked=""  id="quantity" class="custom-control-input"><span class="custom-control-label">COD</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="radio-inline" id="sellp" class="custom-control-input"><span class="custom-control-label">Online Payment</span>
                                            </label>
                                            </div>
                                          

                     
</div>
                               


                       








    

 <div class="col-6">
          <div class="card" style="align-self: center;padding: 2%;">              
                                       


                                 
                                       
                                  
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
    header('Location:login.html');
}


 if (isset($_GET['logout'])){
if($_GET['logout']=='true'){
    session_destroy();
header('Location:login.html');
}

} 
?>