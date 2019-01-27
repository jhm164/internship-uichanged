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
            <img src="images/logo.png" style="height:70px; width:200px;">
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
                                            <a class="nav-link" href="myorder.php">My Orders</a>
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