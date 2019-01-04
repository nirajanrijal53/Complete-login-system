<?php

spl_autoload_register(function($class){
	// require CLASS_PATH.$class.".php";
	require CLASS_PATH.$class.".php";


});
 

 // echo "autoload";