<?php
require $_SERVER['DOCUMENT_ROOT'].'config/config.php';
require CONFIG_PATH.'functions.php';
require CLASS_PATH.'Database.php';
require CLASS_PATH.'User.php';


$user = new User();
if(isset($_POST) && !empty($_POST)){
    $user_name = filter_var($_POST['username'], FILTER_VALIDATE_EMAIL);

    if(!$user_name){
       redirect('../reset', 'error', 'Invalid username type. Username should be email.');
    }
    $user_info = $user->getUserByUsername($user_name);


    if(empty($user_info)){
        redirect('../reset', 'error', 'Invalid username or the username doesnot exists.');
    }
    $reset_token = randomString(100);

    $args = array(
                'password_reset_token' => $reset_token
    );

    $user->updateUser($args, $user_info[0]->id);
    $message = " Dear ".$user_info[0]->full_name."! <br><br>";
    $message .= " You have requested for the password change. If you want to change the password, please click on the link below:<br>";
    $message .= "<a href='".SITE_URL.'reset?token='.$reset_token."'>".SITE_URL.'reset?token='.$reset_token."</a><br><br>";
    $message .= " <br> If you did not request for the password change, please ignore this message.<br><br><br>";
    $message .= "Regards, <br>";
    $message .= "Leafplus Administration ";



    $mail = sendMessage($user_info[0]->email, "Password reset Link", $message);
    if($mail){
        redirect('../', 'success', 'An email has been sent to your account for password reset.');
    } else {
        redirect('../reset', 'error', 'Sorry! There was problem while sending you email at this moment. Please try again after sometimes.');
    }
} else {
    redirect('../reset', 'warning', 'Provide your username here.');
}
