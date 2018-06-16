<?php
include 'connectdb.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/PHPMailer/src/Exception.php';
require 'mailer/PHPMailer/src/PHPMailer.php';
require 'mailer/PHPMailer/src/SMTP.php';

if($con){
$client=$_SESSION['sendmail'];
$q="select * from employee where email='$client'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$to=$row['email'];
$name=$row['name'];


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@jamialab.tk', 'Jamia Laboratory');
    $mail->addAddress($to,$name);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Employee Registed Successfully';
    $mail->Body    = 'Hello, '.$row['name'].'<br><br><br>This mail is to inform you that your account is successfully register to Jamia Laboratory, Now you will able to access the Laboratory System using you credentials as follows:<br><br>User ID: '.$row['emp_code'].'<br>Password: '.$row['pswd'].'<br>URL: www.jamialab.tk<br><br>Thankyou. <br><br><br>This is System Generate Email, Do Not Reply to this mail.<br>If There is any kind of problem arising with these details contact to your Administrative.<br><br><br><br>';
    
    $mail->send();

    header('location:admin.php');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
else{
	echo "database is not connected";
}

?>