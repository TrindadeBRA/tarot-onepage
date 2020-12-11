<?php
if(isset($_POST) && !empty($_POST)){
	$full_name = (isset($_POST['full_name']))?$_POST['full_name']:'';
	$first_name = (isset($_POST['first_name']))?$_POST['first_name']:'';
	$middle_name = (isset($_POST['middle_name']))?$_POST['middle_name']:'';
	$last_name = (isset($_POST['last_name']))?$_POST['last_name']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';
	$subject = (isset($_POST['subject']))?$_POST['subject']:'';
	$message = (isset($_POST['message']))?$_POST['message']:'';
	$contact_no = (isset($_POST['contact_no']))?$_POST['contact_no']:'';
	
	if($full_name == ''){
		$full_name =  $first_name.' '.$middle_name.' '.$last_name;
	}
	
	$sendMessage = $mailSubject = '';
	if($_POST['form_type'] == 'contact'){
		$mailSubject = 'Detalhes de Contato do Site de Tarot';
		$sendMessage = "<p>Olá!,</p><p>".$first_name." enviou uma mensagem.</p><p><b>Celular:</b> ".$contact_no."</p><p><b>Assunto:</b> ".$subject."</p><p><b>Email:</b> ".$email."</p><p><b>A mensagem:</b> ".$message."</p>";
	}elseif($_POST['form_type'] == 'inquiry'){
		$mailSubject = 'Inquiry Details';
		$sendMessage = '';
	}
	
	if($sendMessage != ''){
		$fromEmail = 'lavs@thetrinityweb.com.br';
		$toEmail = 'trindade@thetrinityweb.com.br';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$fromEmail>" . "\r\n";

		if(mail($toEmail , $mailSubject , $sendMessage , $headers )){
			echo 1;
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}

?>