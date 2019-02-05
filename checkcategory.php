<?php


include 'connection.php';

if(isset($_GET['cat'])){
	$cat=$_GET['cat'];
	//echo $cat;
	$flag='true';
$sql='select * from category where category="'.$cat.'"';
//echo $sql;
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
if($row['category']==$cat){
    echo "This category already exist";
    	$flag='false';
}else{
    	$flag='true';
}

}
//echo "no result found";
}
//echo $flag;
//if($flag=='true'){
if (isset($_GET['fp'])&&isset($_GET['sp'])&&isset($_GET['tp'])&&isset($_GET['category1'])) {
	
	$fp=$_GET['fp'];
	$sp=$_GET['sp'];
	$tp=$_GET['tp'];
$category1=$_GET['category1'];

//	echo $fp.' '.$sp.' '.$tp;

$sql = "INSERT INTO `category` (`id`, `category`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`,`c7`, `c8`,`c9`, `c10`,`c11`, `c12`) VALUES (NULL, '$category1', '$fp', '$sp', 'imagepath', '$tp', 'zone','price','img2','img3','lheight','lwidth','x1','y1')";
//echo $sql;

if (mysqli_query($conn,$sql)) {



	$sql="create table $category1(id int AUTO_INCREMENT PRIMARY KEY,$fp VARCHAR(50),$sp VARCHAR(50),$tp VARCHAR(50),imagepath VARCHAR(400),zone VARCHAR(50),price VARCHAR(50),img2 VARCHAR(400),img3 VARCHAR(400),lheight VARCHAR(30),lwidth VARCHAR(30),x1 VARCHAR(30),y1 VARCHAR(30) )";

//	echo  $sql;
	if (mysqli_query($conn,$sql)) {
		echo "new category added successfully";
	}else{
		echo "fail to create table";
	}
	





}else{
	echo "fail to add";
}

}

//}else{
  //  	echo "category already exit";
//}



?>