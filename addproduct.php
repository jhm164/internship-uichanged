<?php 
session_start();
if (isset($_SESSION['id'])) {
$id=$_SESSION['id'];
include 'connection.php'; 
  

?>






<!doctype html>
<html lang="en">
 <title>Add Category</title>
 <link rel="icon" type="image/ico" href="images/logo.png" />
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
    <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>

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
  
<script>


function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
          function (m, key, value) {
              vars[key] = value;
          });
      return vars;
  }


$(document).ready(function(){
var data=new Array() ;
var heading=new Array();
var senddata;
var category;
$("#preview").hide();

$('#accauntsett').change(function(){
var a=$(this).val();

$(location).attr('href',a);
});


$('#main').imgAreaSelect({
      handles: true,
      onSelectEnd: function (img, selection) {
     // alert('width: ' + selection.width + '; height: ' + selection.height+ 'x1: ' + selection.x1+'y1: ' + selection.y1);
  
  $('#h').text(selection.height);
  $('#w').text(selection.width);
  $('#y1').text(selection.y1);
  $('#x1').text(selection.x1);
  }
  });
  
$('#menuselect').change(function(){
var a=$(this).val();

$(location).attr('href',a);
});

$("#type").change(function(){
data.push($(this).attr('id'));
var x=$(this).val();
alert(x);
$(location).attr('href', 'addproduct.php?category='+x);
});


$('#accauntsett').change(function(){
var a=$(this).val();

$(location).attr('href',a);
});
$('#menuselect').change(function(){
var a=$(this).val();

$(location).attr('href',a);
});

$('#load').click(function(){
var c3=$('.c3').val();
var trimStr = $.trim(c3);
alert(trimStr);
//if(c3!=''){
// $('#preview').show();
// $('#preview').attr('src',c3);
 // $('#main').css('background-image','url('+c3+')');
$('#main').css('background-image','url('+trimStr+')');

//}
});



$('#add').click(function(){
category=getUrlVars().category;
var h=$('#h').text();
var w=$('#w').text();
var x1=$('#x1').text();
var y1=$('#y1').text();
//alert(h);
data[0]=8;
heading[0]='range';
var i;
for( i=1;i<=13;i++){
data[i]=$('.c'+i).val();
heading[i]=$('.c'+i).attr('id');

//var c+i=  $('.c'+i).val();
//alert($('.c'+i).val());
//alert(data[i]+' '+heading[i]);

}
if(h!=''&&w!=''&&x1!=''&&y1!=''){
//for( i=1;i<=5;i++){
senddata='?category='+category+'&c1='+data[1]+'&c2='+data[2]+'&c3='+data[3]+'&c4='+data[4]+'&c5='+data[5]+'&c6='+data[6]+'&c7='+data[7]+'&c8='+data[8]+'&c9='+h+'&c10='+w+'&c11='+x1+'&c12='+y1;
//}
/*

$.ajax({
 type: "GET",
 data: {heading:data},
 url: "addnewproduct.php",
 success: function(msg){
  alert(msg);
 }
});
*/
alert(senddata);
$.ajax({url: "addnewproduct.php"+senddata, success: function(result){
     alert('success');
  }});

}else{
  alert('please fill all the  fields');
}
/*
$.ajax({
  type: "GET",
  url: "addnewproduct.php",
  dataType: "json",
  data: senddata,
  success: function(msg){
  alert(msg);
  }
});
*/
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
                                            <a class="nav-link" href="admindash.php"><i class="fas fa-fw fa-chart-pie"></i>Add Product<span class="badge badge-secondary">New</span></a>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add Category</h5>
                                <div class="card-body">
                                    <table class="table">
                                       
                                        <tbody>
                                        <tr>
    <td>Enter category</td>
    <td><select id="type" class="form-control">
      <option >--select--</option>
       <?php 
$sql="select * from category";

  $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {

       ?>
      <option value="<?php echo $row['category'] ;?>"><?php echo $row['category'] ;?></option>
    <?php } ?>
    <option value="gg">kk</option>
    </select></td>
   

  </tr>
  
  <?php 
$content=array();
$i=1;
if (isset($_GET['category'])) {
  $cat=$_GET['category'];
$sql="select * from category where category='$cat'";

  $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
//echo $row['c'.$i];
  /*
$content[1]=$row['c1'];
$content[2]=$row['c2'];
$content[3]=$row['c3'];
$content[4]=$row['c4'];
$content[5]=$row['c5'];
*/
//$i++;
for($j=1;$j<=8;$j++){




if($row['c'.$j]!='Na'){
?>
 <tr><td>Enter <?php echo $row['c'.$j];?></td><td><input type="text" name="" class="form-control <?php echo 'c'.$j;?> " id="<?php echo $row['c'.$j];?>"></td></tr>
  
<?php
}
}
}

?>
<tr><td colspan="2"><center><input type="button" value="Load" id="load" class="btn btn-default"> </center></td></tr>
<tr><td ><center><div id="main"></div></center></td>
<td>
<p>height:<b id="h"></b></p> 
 <p>width:<b id="w"></b></p>
 <p>x1:<b id="x1"></b></p>
 <p>y1:<b id="y1"></b></p>
 </td></tr>
<tr><td colspan="2"><input type="button" class="btn btn-primary" id="add" value="Add product" name=""></td></tr>
<?php
//echo $content[1];
//print_r($content);

/*
$sql="select * from $cat";

  $result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
 
}
*/
}


  ?>

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