<?php 
require $_SERVER['DOCUMENT_ROOT'].'config/init.php';

// debugger('Test');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <title><?php echo SITE_NAME; ?> | <?php echo (isset($page_title))? $page_title : 'Admin'; ?> </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>


  </head>

    
    <body class="<?php echo ((getCurrentPage()  == 'index') || (getCurrentPage()  == 'reset'))? 'login' : 'nav-md';?>">
