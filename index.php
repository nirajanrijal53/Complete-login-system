<?php
require_once $_SERVER['DOCUMENT_ROOT'].'config/init.php';

// require 'config/config.php';
// require 'config/autoload.php';

$user = new User();

// $user_list = $user->getUsers();

// echo "<pre>";
// print_r($user_list);
// echo "</pre>";

echo "success!!";
$token = $_SESSION['token'];
$user_info = $user->getUserByToken($token);
echo "sucess";
 echo $user_info[0]->id;
 ;
 echo $user_info[0]->full_name;
    echo $user_info[0]->email;
    echo $user_info[0]->role;
debugger($user_info);
	// $user_info = $user->getUserByUsername($user_name);
	// debugger($user_info);

