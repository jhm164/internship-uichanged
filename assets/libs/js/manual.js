 <html>
  <head>
       <title>Create order</title>
   <link rel="venderboat icon" href="images/oscar.png" />
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


$('#customerd').show();

$('#uploadarea').hide();
$('#manual').hide();
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

//$("#displayarea").css("margin-top",height/2-height1/2);

//$("#displayarea").css("transform-origin","50% 50%");
/*
$("#logo").css("margin-left",marginl);
$("#logo").css("margin-top",height/2-height1/2);
$("#logo").css("padding-left",paddingl);
$("#logo").css("padding-top",paddingt);
$("#logo").css("top",v.top+height/2-height1/2);
$("#logo").css("left",v.left+width/2-width1/2);
*/
$("#hideid").hide();
$('#showmycustomer').click(function(){


});
$('#createnew').click(function(){
$('#customerd').toggle(1000);

});

$('#slider').mousemove(function(){
var x=$(this).val();
//alert(x);
//$('#logo').css('transform':'scale('+x+')');
$('#logo').css('transform', 'scale(' + x + ')');
console.log(x);
$(".selection2").show(500);
});
/*
$('#slider').mousemove(function(){
    var x=$(this).val();
var v1=$('#slider').val();
var s=$('#logo').outerWidth();
var w=$('#logo').outerHeight();
var h=0;
var w1=0;
$('#logo').css('transform', 'scale(' + x + ')');
//alert($("#logo").outerWidth()+' '+$("#logo").outerHeight());

$('.selection2').show(500);
});

*/
$('#accauntsett').change(function(){
  var a=$(this).val();

$(location).attr('href',a);
});
$('#menuselect').change(function(){
  var a=$(this).val();

$(location).attr('href',a);
});

$('#showupload').click(function(){

$('#uploadarea').toggle(1000);
$('#manual').toggle(1000);

});


$('.grp').click(function(){

paymentmode= $('.grp').attr('id');
$('.selection6').show(500);

});


$('#fullsize').click(function(){


$('#fullsize').css('overflow','visible');

});

$('#down').click(function(){

var s=$('#logo').position();
$('#logo').css('top',s.top+3);
});

$('#up').click(function(){
var s=$('#logo').position();
$('#logo').css('top',s.top-3);
});

$('#demo').click(function(v){
//alert(v1);
});



   $("body").on("click","#searchbutton", function(){
  var id=$("#search").val();
$('#myicons').load('mylogo.php?id='+id);
});


$('#openm').click(function(){
  //  alert($("#hideid").text());
 var id1=$("#hideid").text();
alert(id1);
$('#myicons').load('mylogo.php?id1='+id1);
$('.selection12').show(500);
});



$('#zoomin').click(function(){
var s=$('#logo').height();
$('#logo').css('height',s+3);
});

$('.get1').click(function(){
    
selectedcustomer=$(this).attr('id');

//$("#"+selectedcustomer).css('background-color','#53c653');


//alert($(this).attr('id'));
$('.selection5').show();

});


$('#zoomout').click(function(){
var s=$('#logo').height();
$('#logo').css('height',s-3);
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
//alert(cname+' '+cadd1+' '+cadd2+' '+landmark+' '+pincode+' '+country+' '+state+' '+city+' '+ccode+' '+mobile+' '+email);
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


$('#left').click(function(){
var s=$('#logo').position();

$('#logo').css('left',s.left-3);
});

$('#right').click(function(){
var s=$('#logo').position();
$('#logo').css('left',s.left+3);
});

 $("body").on("click",".logoc", function(){
    logoid1=$(this).attr('id');
var g= $(this).attr('src');
$('#logo').attr('src',g);
  });

  $("body").on("click",".mainc", function(){
    mainid1=$(this).attr('id');
var g= $(this).attr('src');
$('#main').attr('src',g);
  });

$('.logoc').click(function x(v){
  logoid1=$(this).attr('id');
var g= $(this).attr('src');
$('#logo').attr('src',g);

});


$('.main').click(function j(v){
var g= $(this).attr('src');
$("#main").attr('src',g);
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
mainid1='main';
//$('#main').attr('src',val.imagepath);

$('#main').css('background-image','url('+val.imagepath+')');
$('.img2').attr('src',val.img2);
$('.img3').attr('src',val.img3);
$('#displayarea').css('height',val.lheight);
$('#displayarea').css('width',val.lwidth);


$('#logo').css('height',val.lheight);
$("#displayarea").css("margin-top",val.y1);
$('#logo').css('width',val.lwidth);
$('#logo').css('left',val.x1);
$('#logo').css('top',val.y1);

  });
});



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

$('.selection1').show(500);



  });

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


  //called when key is pressed in textbox
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

   
   


$('#evaluate').click(function(){
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

$('#category').change(function(){
var id=$(this).attr('id');
var cat=$(this).val();
//alert(cat);
$('#'+id).attr('onkeyup',cat);
$(location).attr('href', 'createorder12.php?category='+cat);
//$('#'+id).attr('onkeyup',cat);
$('#bb').text(cat);
});


$('#sellp').change(function(){

//alert('sellp change');


$('.selection4').show(500);
});

 $("#submit").click(function(){

  var size=$('#h').val();
var sizew=$('#w').val();
  var sellp=$('#sellp').val();
 


//alert(category+' '+brand+' '+model+' '+size+' '+quantity+' '+sellp+' '+category+' '+mainproductid+' '+logoid1+' '+selectedcustomer+' '+paymentmode+'  '+totalp);

 $.get("orderp.php",
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
        mainid:mainid1

    }, function(data, status){
        alert(data);
    });
    
});


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


