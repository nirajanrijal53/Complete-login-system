<?php

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

//$user = new User();

if(isset($_POST) && !empty($_POST)){
// debugger($_POST);
// debugger($_SESSION, true);

	if(empty($_POST['new_password']) || empty($_POST['re_password']) || empty($_POST['old_password'])){
		redirect('../change-password', 'error', 'Password fields cannot be empty.');
	}


	if($_POST['new_password'] != $_POST['re_password']){
		redirect('../change-password', 'error', 'Password and re-password are not same.');
	}

	$old_password = sha1($_SESSION['email'].$_POST['old_password']);

	
	$user_info = $user->getUser(['id' => $_SESSION['user_id']]);

	if($old_password != $user_info[0]->password){
		redirect('../change-password', 'error', 'Old password does not match.');
	}


	// echo $old_password;

	// debugger($user_info);


	$enc_password = sha1($user_info[0]->email.$_POST['new_password']);
	$data = array(
		'password' => $enc_password,
	);
	$success = $user->updateUser($data, $user_info[0]->id);
	if($success){
		 redirect('../dashboard', 'success', 'Password changed successfully.');
	} else {
			redirect('../dashboard', 'Sorry! There was problem while updating password. Please contact our admin.');
	}
} else {
	redirect('../change-password','error','Unauthorized access.');
}