<?php
// signup confirmation mail

include('smtp/PHPMailerAutoload.php');
$html='<h1 style="text-align: center;">Welcome to D\'assurance</h1>
		<div class="container">
			<center><img src="logo.jpeg" alt="" width="500px" height="450px" ;></center>
		</div>
		<div class="container">
			<center><b></b>-Thank You For Joining us<br><BR><BR>
			</center>
		</div>
		<div class="container" style="text-align: center;">
			<i>THIS SITE IS STILL UNDER DEVELOPMENT PHASE</i><BR><BR>
			This Email was send by automatic server.<br><BR>
			Content of this mail can change in future.<br><BR>
			&copy; 2021 AMANULLA TAMBOLI
		</div>';  	


// $to='sakibtamboli06@gmail.com';
$subject="SUCCESSFULLY SIGNUP WITH Farmily'";

// echo smtp_mailer($to);

function smtp_mailer($to,$username){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3; // display all debug content
	$mail->IsSMTP(); 
	// $mail->SMTPKeepAlive = true;   
    // $mail->Mailer = “smtp”; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	// $mail->Host = "localhost";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 25; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "projectmailtesting5@gmail.com";
	$mail->Password = "ks@testprojectmail";
	$mail->SetFrom("projectmailtesting5@gmail.com");
	$mail->Subject ="SUCCESSFULLY SIGNUP WITH Farmily";
	$mail->Body ='<h1 style="text-align: center;">Welcome to Farmily</h1>
					<div class="container">
						<center><img src="logo.jpeg" alt="logo" width="500px" height="450px" ;></center>
					</div>
					<div class="container">
						<center><b>'. $username.'</b>-Thank You For Joining us<br><BR><BR>
						</center>
					</div>
					<div class="container" style="text-align: center;">
						<i>THIS SITE IS STILL UNDER DEVELOPMENT PHASE</i><BR><BR>
						This Email was send by Bot.<br><BR>
						Content of this mail can change in future.<br><BR>
						<hr>
						&copy; 2021 <a href="https://www.instagram.com/amaantamboli7781">AMANULLA TAMBOLI</a> 
					</div>';
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>true
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		//return 'Sent';
	}
}


?>
