<?php
if(true){

    
require 'PHPMailer/PHPMailerAutoload.php';

    $to = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $msg = $_POST['message'];
    $mobile = $_POST['mobile'];
if($msg){
$mailToAdmin = new PHPMailer;

$mailToAdmin->isSMTP();                                   // Set mailer to use SMTP
$mailToAdmin->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mailToAdmin->SMTPAuth = true;                            // Enable SMTP authentication
$mailToAdmin->Username = 'noreply.smartcup@gmail.com';          // SMTP username
$mailToAdmin->Password = 'amp@lintcloud.com'; // SMTP password
$mailToAdmin->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mailToAdmin->Port = 587;                                 // TCP port to connect to

$mailToAdmin->setFrom('rv.elango7@gmail.com', 'Heroku Password');
$mailToAdmin->addReplyTo('rv.elango7@gmail.com', 'Heroku Password');
$mailToAdmin->addAddress('rv.elango7@gmail.com');   // Add a recipient
$mail->addCC('gemniz707@gmail.com');
//$mail->addBCC('bcc@example.com');
$htmlContent = file_get_contents("email_template.html");


$mailToAdmin->isHTML(true);  // Set email format to HTML

 $bodyContent = '<h1>Name :&nbsp; '.$name.'</h1>';
 $bodyContent .= '<h1>Mail :&nbsp; '.$to.'</h1>';
 $bodyContent .= '<h1>Mobile :&nbsp; '.$mobile.'</h1>';
 $bodyContent .= '<h1>Message :&nbsp; </h1>';
 $bodyContent .= '<p>'.$msg.'</b></p>';

$mailToAdmin->Subject = 'Customer Queries';
$mailToAdmin->Body    = $bodyContent;
$mailToAdmin->send();
 
$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'noreply.smartcup@gmail.com';          // SMTP username
$mail->Password = 'amp@lintcloud.com'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('sam@tobile.in', 'SmartCup');
$mail->addReplyTo('sam@tobile.in', 'SmartCup');
$mail->addAddress($to);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$htmlContent = file_get_contents("email_template.html");


$mail->isHTML(true);  // Set email format to HTML

//$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
//$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'Thanks for being our Awesome Customer! by SmartCup';
$mail->Body    = $htmlContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
 } 
}else{
    echo false;
}
?>
