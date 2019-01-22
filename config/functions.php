<?php 


function debugger($data, $is_die = false){
	echo "<pre style='color:#FF0000'>";
	print_r($data);
	echo "</pre>";
	if($is_die){
		exit;
	}
}

function getCurrentPage(){
	return pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
}

function redirect($path,$session_key = null, $session_msg = null){
	if (isset($session_key) && !empty($session_key)){
		$_SESSION[$session_key] = $session_msg;
	}

	@header('location: '.$path);
	exit;
}

function flash(){
	if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
		echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
		unset($_SESSION['success']);
	}

	if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
		echo "<p class='alert alert-danger'>".$_SESSION['error']."</p>";
		unset($_SESSION['error']);
	}

	if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])){
		echo "<p class='alert alert-warning'>".$_SESSION['warning']."</p>";
		unset($_SESSION['warning']);
	}

	?>
	<script type="text/javascript">
		setTimeout(function(){
			$('.alert').slideUp('slow');
		}, 3000);

	</script>
	<?php

}

function randomString($length = 100){
	$chars = "0123456789aabcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$str_len = strlen($chars);
	$random = '';
	for($i=0; $i<$length; $i++){
		$random .=$chars[rand(0, $str_len-1)];
	}
	return $random;
}

function sendMessage($to, $sub, $msg){

require $_SERVER['DOCUMENT_ROOT'].'assets/plugins/SMTP.php';
require $_SERVER['DOCUMENT_ROOT'].'assets/plugins/PHPMailer.php';


$mail = new PHPMailer(true);                              // 
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'd61bc5bef3eea2';                 // SMTP username
    $mail->Password = '591ac9bff24a3e';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@leafplus.com', 'NO-Reply Leafplus');
    $mail->addAddress($to);
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $msg;

    return $mail->send();

}

function sanitize($str){
	$str = strip_tags($str);
	$str = stripslashes($str);
	$str = rtrim($str);
	return $str;
}

function uploadImage($files, $upload_dir = null){
	if($files['error'] == 0){
		$ext = pathinfo($files['name'], PATHINFO_EXTENSION);

		if(in_array(strtolower($ext), ALLOWED_IMAGE_EXTENSION)){
			if($files['size'] <= 5000000){
				$upload_path = UPLOAD_DIR.$upload_dir;
				if(!is_dir($upload_path)){
					mkdir($upload_path, 0777, true);
				}
			} 
			$file_name = ucfirst(strtolower($upload_dir))."-".date('Ymdhis').rand(0,999).".".$ext;
			$success = move_uploaded_file($files['tmp_name'], $upload_path."/".$file_name);
			if($success){
				return $file_name;
			} else {
				return null;
			}
		} else {
			return null;
		}
	} else {
		return null;
	}
}