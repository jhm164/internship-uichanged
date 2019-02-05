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
    <link rel="shortcut icon" type="image/png" href="assets/images/fevicon.png" />
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
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
 ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php");
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
                var selectedcustomer='';
                var mainproductprice=null;
                var zonep=0;
                var  paymentmode=null;
var posl='';
var post='';
 $(document).ready(function(){

    $('.selection1').hide();
      $('.selection2').hide();
      $('.selection3').hide();
      $('.selection4').hide();
      $('.selection5').hide();
      $('.selection6').hide();
        $('.selection12').hide();
           var quantity='';
$('.kk').hide();
  var category='';
  var brand='';
  var model='';
      $('#mycustomer').show();


$('#customerd').hide();

$('#uploadarea').hide();
//$('#manual').hide();

		$('#logo')
	.resizable(

{
     resize:true,
    start: function(e, ui) {
    //	alert('resizing started');

    var p=ui.size;
$('#hl').text($(this).height);
$('#wl').text(p.width);
$('#logocharges').text(p.height*3);
$('#logocharges1').text(p.height*3);
    },
    resize: function(e, ui) {
        var p=ui.size;
$('#hl').text(p.height);
$('#wl').text(p.width);
$('#logocharges').text(p.height*3);
$('#logocharges1').text(p.height*3);
    },
    stop: function(e, ui) {
        var p=ui.size;
$('#hl').text(p.height);
$('#wl').text(p.width);
$('#logocharges').text(p.height*3);
$('#logocharges1').text(p.height*3);
        //alert('resizing stopped');
    },
    containment:"#displayarea"

}).parent().draggable({
		start: function(e, ui) {
            var p=ui.position;
            post=p.top;
            posl=p.left;
          
		},
		drag: function(e, ui) {
            var p=ui.position;
            post=p.top;
            posl=p.left;
		},
		stop: function(e, ui) {
			
            var p=ui.position;
            post=p.top;
            posl=p.left;
		//	console.log(p.top+' '+p.left);
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



$("#drop-area").on('dragenter', function (e){
  e.preventDefault();
  $(this).css('background', '#BBD5B8');
 });

 $("#drop-area").on('dragover', function (e){
  e.preventDefault();
 });

 $("#drop-area").on('drop', function (e){
  $(this).css('background', '#D8F9D3');
  e.preventDefault();
  var image = e.originalEvent.dataTransfer.files;
  createFormData(image);
 });


$('.get1').click(function(){
    
    selectedcustomer=$(this).attr('id');
    
    //$("#"+selectedcustomer).css('background-color','#53c653');
    
    
    alert(selectedcustomer);
   // $('.selection5').show();
    
    });


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
                $(location).attr('href', 'createorder.php?category='+cat);
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


  $('#cdetail').click(function(){
var cname=$('#cname').val();
var cadd1=$('#cadd1').val();
var cadd2=$('#cadd2').val();
var landmark=$('#landmark').val();
var pincode=$('#pincode').val();
var country=$('#country').val();
var state=$('#state').val();
var city=$('#city').val()
var ccode=$('#ccode').val();
var mobile=$('#mobile').val();
var email=$('#email').val();
alert(cname+' '+cadd1+' '+cadd2+' '+landmark+' '+pincode+' '+country+' '+state+' '+city+' '+ccode+' '+mobile+' '+email);
$.post("addcustomer.php",
    {
      cname:cname,
      cadd1:cadd1,
      cadd2:cadd2,
      landmark:landmark,
      pincode:pincode,
      country:country,
      state:state,
      city:city,
      ccode:ccode,
      mobile:mobile,
      email:email
    }, function(data, status){
        alert(data);
    }).then(function(){

      location.reload();
    });
});


  $('.grp').change(function(){

 paymentmode= $(this).attr('id');
//$('.selection6').show(500);
alert(paymentmode)
});



$("#submit").click(function(){

var size=$('#hl').text();
var sizew=$('#wl').text();
var sellp=$('#sellp').val();
var name1=$('#m1').text();
var name2=$('#m2').text();
var brand=$('#i1').val();
var model=$('#i2').val();



alert(category+' '+brand+' '+model+' '+size+' '+sizew+' '+quantity+' '+sellp+' '+category+' '+mainproductid+' '+logoid1+' '+selectedcustomer+' '+paymentmode+'  '+totalp+'  '+posl+'  '+post);

$.get("PayUMoney_form.php",
  {
     
      category:category,
      brand:brand,
      model:model,
      size:size,
      quantity:quantity,
      sellp:sellp,
      category:category,
      mainproductid:mainproductid,
      logoid:logoid1,
      selectedcustomer:selectedcustomer,
      paymentmode:paymentmode,
      total:totalp,
      sizew:sizew,
        mainid:mainid1,
        posl:posl,
        post:post
  }, function(data, status){
      alert(data);
  });
  
});



   
$('#quantity').change(function(){
   quantity=$('#quantity').val();
   category=$('#category').val();
   brand=$('#brand').val();
   model=$('#model').val();
  
  //alert(zone);

  $('#finalp').show(1000);
  $('#evaluatearea').show(1000);
 $('#quantity1').text(quantity);

 $('#pname1').text(category+' '+brand+' '+model);
$('#priceperp').text(mainproductprice);
 $('#pprice1').text(quantity*mainproductprice);
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

$('#logo').css('height',"100px;");

$('#logo').css('width',"50px");

alert(dish);
$('#myicons').load('mylogo.php?id1='+id1);
$('.selection12').show(500);
});



$('.kk').hide();



    });

function createFormData(image)
{
 var formImage = new FormData();
 formImage.append('userImage', image[0]);
 uploadFormData(formImage);
}

function uploadFormData(formData) 
{
 $.ajax({
 url: "upload_image.php",
 type: "POST",
 data: formData,
 contentType:false,
 cache: false,
 processData: false,
 success: function(data){
  alert('Upload Successfully');
  $('#drop-area').html(data);

 }});
}


    </script>





        
</head>

<body>
<p id="hideid"><?php echo $_SESSION['id']; ?></p>
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
                            <h4>
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
</h4>
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
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Transactions</a>
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
       <h1>Create Order</h1>
       <div class="row">
       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Select Category</h5>
                                <div class="card-body">
                         
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Category</label>
                                            <div class="col-9 col-lg-10">
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

                               
                                            </div>
                                        </div>
                                        
                                        





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
                                      
                                       <div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right"><?php echo $arr[$j];?></label>
                                            <div class="col-9 col-lg-10">
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
                                    </div>
                                    </div>







                                    <?php
                                    //} 

                                    }
                                    }

                                    }
                                              ?>
        
        <div class="form-group row">
                             
                                            <div class="col-9 col-lg-10">
<center>
                                    <div id="grab"  class="btn btn-primary"><b style="color:white;">Load</b></div>
                                    </center>
  </div>
  </div>

                                           
                                        </div>
                                   
                                </div>
                            </div>





                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Select Design</h5>
                                <div class="card-body">
                         
                                        <div class="form-group row">
                                           
                                            <div class="col-9 col-lg-10">
                                                   <div class="row">     
                                                   <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">                        
<div  id="open-preview" data-toggle="modal" data-target=".bd-example-modal-lg" style="height: 100px;width: 100px;background-color: gray;border:1px dashed gray; "></div>
                                           </div>
                                           <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
<button type="button" class="btn btn-primary "  id="showupload" data-toggle="modal" data-target="#exampleModalCenter"  >
 Upload new design 
</button>                        
</div>

</div>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      
    <div class="modal-content" style="padding: 2%;">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
           
        </div>



        <div class="row">
                                           
                                           <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Preview</h5>
                            <div class="card-body">
                          
<div id="main" style="background-color:#c7c7c7;"> 
<div id="displayarea"  style="border:1px dotted gray;">
<img id="logo"  style=""  />
</div>
</div>


                          <img  id="img2" class="img2 mainc" style="background-color:#c7c7c7; width: 70px;  height: 70px;"  >
                                <img  id="img3" class="img3 mainc" style="background-color:#c7c7c7;width: 70px;  height: 70px;"   >
                             
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Slides with Indicators</h5>
                            <div class="card-body">
                            <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                               <span>Height <h5  id="hl"></h5></span>
                               </div>
                               <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                               <span>Width <h5  id="wl"></h5></span>
                               </div>

                               </div>
                               <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <span>Cost<h4 id="logocharges1"></h4></span>
                            </div>
                            </div>


                            </div>
                
                        </div>
                        

                    </div>

                        
              
    </div>




    <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Slides with Indicators</h5>
                            <div class="card-body">
                           
                            <div  id="myicons">    
                  </div>
                             

                            
                               
                            </div>
                        </div>
                    </div>

                        
              
    </div>
  </div>


 
</div>
                    
                                           </div>


                                            </div>







                                            
                                            
                                        </div>
                  
<div class="row">


<div class="col-6">



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

     
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
          <div style="background-color: #0000004f;padding: 5px;">
          <h5 style="font-weight: bold;">Enter SQA ID <span style="color: red">*</span></h5><input type="text" placeholder="" class="form-control" name="" id="sqa"></div>
        <div class="row" id="uploadarea" > 

          
</div>
</div>
</div>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">

<form id="upload_form" enctype="multipart/form-data" method="post">
</form>
<div id="wrapper" class="row" style="width: 200px;border:1px dashed black;" >
 <div id="drop-area"  style="background-color: #deefde;">
  <p style="  font-weight:bold;">drop image here</p>
  <h3 class="drop-text"><span class="glyphicon glyphicon-file"></span></h3>
 </div>
</div>

</div>
</div>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">                        
<div >
<div id="manual" >
  <table class="table"><tbody>
  

      <form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file"  class="btn btn-primary"  name="file1" id="file1"><br>
  <input type="button" value="Upload File" class="btn btn-primary" onclick="uploadFile()">
  <progress id="progressBar" value="0" max="100" style="width:300px;height: 25px;"></progress>
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>

</tbody></table>
    </div>
    </div>
    </div>
    
   </div>
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






<div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Quantity
                                            </label>
                                            <div class="col-9 col-lg-10">      
<input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" >
</div>
</div>
             
             
             
<div class="form-group row">
                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">sell price
                                            </label>
                                            <div class="col-9 col-lg-10">      
                                            <input type="text"  name="sellp" id="sellp" class="form-control" placeholder="Enter your selling price " >
</div>
</div>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="card">
                                        <h5 class="card-header">Customers</h5>
                                        <div class="card-body">

                                        <div class="form-row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <button class="btn btn-warning" type="button" data-toggle="modal" id="showmycustomer" data-target="#exampleModalCenter1">My Customers</button>
                                            
                                            
                                           
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

      
     <div id="existcustomer">
<table class="table table-hover" style="border-bottom: 1px solid gray;" id="mycustomer" >

  <thead>
  <tr></tr>
    <tr style="color: white;" ><th>select</th><th>Customer name</th><th>Country</th><th>City</th><th>Pincode</th><th>Landmark</th></tr></thead>
<tbody>
  
  
  
<?php
$sql="select * from customerdetail where recordholder='$id'";

$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    
    
 ?>
 
 <tr id="<?php echo $row['id'];?>" >
  <td>
  <label class="custom-control custom-radio">
  <input type="radio" name="radio-stacked" class="custom-control-input get1" data-dismiss="modal" aria-label="Close" id="<?php echo $row['id'];?>" >
      <span class="custom-control-label"></span>
                                            </label>
  <input type="radio" name="radio-inline" class="custom-control-input" disabled>

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
                                                <label for="validationCustom03">Country Code</label>
                                              
                                                <input type="text"  class="form-control" id="ccode"  placeholder="+91" required >
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
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="button" id="cdetail">Confirm Details</button>
                                            </div>
     </div>

                                        </div>
                                    </div>




                                    <div class="card">
                                        <h5 class="card-header">Order Mode</h5>
                                        <div class="card-body">

                                        <label class="custom-control custom-radio custom-control-inline">
                                        
                                                <input type="radio" name="radio-inline"  id="cod" class="custom-control-input grp" value="cod"><span class="custom-control-label">COD</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="radio-inline" id="online" class="custom-control-input grp" value="online" ><span class="custom-control-label">Online Payment</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <h5 class="card-header">Evaluate</h5>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0"></th>
                                                    
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Product Price</th>
                                                        <th class="border-0">Quantity</th>
                                                        <th class="border-0">Print Charges</th>
                                                       
                                                        <th class="border-0"></th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h4>Product Cost</h4></td>
                                                       
                                                        <td id="pname1"></td>
                                                        <td id="priceperp"> </td>
                                                        <td id="quantity1"></td>
                                                        <td id="logocharges"></td>
                                                   
                                                        <td id="pprice1"></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                        <td><h4>Shipping Cost</h4></td>
                                                       
                                                        <td ></td>
                                                        <td > </td>
                                                        <td ></td>
                                                        <td ></td>
                                                   
                                                        <td id="zonepp"> </td>
                                                      
                                                    </tr>
                                                    <tr>
                                                        <td><h4>Current Balance</h4></td>
                                                       
                                                        <td ></td>
                                                        <td > </td>
                                                        <td ></td>
                                                        <td ></td>
                                                   
                                                        <td ><h4>
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
                                                        </h4> </td>
                                                      
                                                    </tr>



                                                    <tr>
                                                        <td><h4>Total Payble</h4></td>
                                                       
                                                        <td ></td>
                                                        <td > </td>
                                                        <td ></td>
                                                        <td ></td>
                                                   
                                                        <td ><h4 id="total" ></h4> </td>
                                                      
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><input type="button" class="btn btn-success" value="Confirm Oreder" id="submit" name="upload"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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