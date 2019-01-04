<?php  
  $user = new User();

 if((!isset($_SESSION['token']) && !isset($_COOKIE['_auth_user'])) ){
    if(empty($_SESSION['token'])){
      redirect('./',  'error', 'Please login first.');
    }
 }


 if($_SESSION['token']){
  $token = $_SESSION['token'];
  $user_info = $user->getUserByToken($token);
    // debugger($user_info, true);
 
    if(!$user_info){
      unset($_SESSION['token']);

      if(isset($_COOKIE['_auth_user'])){
        setcookie('_auth_user', null, time()-60, "/");
      }


      redirect('./','warning', 'Your session has expired. Please login to access.');
       
    }
  

    
 } 

?>