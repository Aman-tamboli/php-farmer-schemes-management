<?php
include('/project/mailer/PHPMailerAutoload.php');
$html='Msg';
$to='sakibtamboli06@gmail.com';
$subject='test';
 $msg='sakib is a six side gamer<br> 1st test msg';
echo smtp_mailer($to,'Gaming',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3; // display all debug content
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "projectmailtesting5@gmail.com";
	$mail->Password = "ks@testprojectmail";
	$mail->SetFrom("projectmailtesting5@gmail.com");
	$mail->Subject = $subject;
	$mail->Body ='sakib is a six side gamer<br> 1st test msg';
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>