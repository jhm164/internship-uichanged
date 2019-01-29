

<?php
include 'connection.php';

$email=$_REQUEST["email"];
$query="select * from customer where email='$email'";
$result=mysqli_query($conn,$query);
//echo $query;
while($row=mysqli_fetch_assoc($result)){
    if($row['email']!=''){
//echo $row['pass'];
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "demoma16161616@gmail.com";
  $mail->Password = "demo12345";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "demoma16161616@gmail.com";
  $mail->FromName = "saurabh";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   //echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
  ?>
  <a href="index.html" >back to login</a>
  <?php
  }
}else{
    echo 'Email not found please register !';
}

}

  

?>