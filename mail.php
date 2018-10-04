<?php
	require_once 'phpMailer/PHPMailer.php';
	require_once 'phpMailer/SMTP.php';
	require_once 'phpMailer/Exception.php';

	if(isset($_POST['send_mail'])){
		$email = $_POST['email'];
		$message = $_POST['message'];
		$name = $_POST['names'];
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '465';
		$mail->isHTML();
		$mail->Username = 'tswelopele.daycare1820@gmail.com';
		$mail->Password = 'JCP2018daycare!';
		$mail->SetFrom('tswelopele.daycare1820@gmail.com');
		$mail->Subject = 'Received Message From Website';
		$mail->Body = 'Name: ' . $name . '<br>Email Address: ' . $email . '<br>Message: ' . $message;
		$mail->AddAddress('tswelopele.daycare1820@gmail.com');
	//	$mail->AddAddress('orifha@mbedzi.co.za');
		$mail->Send();
		if(!$mail->Send()) {
			$mail_status = "danger"; // for bootstrap notification class
        		$mail_msg =  "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$mail_status = "success"; // for bootstrap notification class
			$mail_msg =  "Message has been sent";
		}
		$results = ["status"=>$mail_status, "message"=>$mail_msg];
		$results = json.encode($results);
		print_r($results);
 	}
?>
