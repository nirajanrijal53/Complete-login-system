<?php
ob_start();
session_start();

if($_SERVER['SERVER_ADDR'] == "127.0.0.1" || $_SERVER['SERVER_ADDR'] == "::1"){
	define('ENVIRONMENT', 'DEVELOPMENT');
} else {
	define('ENVIRONMENT', 'PRODUCTION');
}

if(ENVIRONMENT == 'DEVELOPMENT'){
	error_reporting(E_ALL);
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PWD', '');
	define('DB_NAME', 'leafplus');
	define('SITE_URL', 'http://leafplus.loc/');	
} else{
	error_reporting(0);
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PWD', '');
	define('DB_NAME', 'leafplus');
	define('SITE_URL', 'http://leafplus.com/');	
	
}

  // CMS CONFIG
  define('CMS_URL', SITE_URL."cms/");
  define('CMS_INCLUDE', $_SERVER['DOCUMENT_ROOT'].'cms/inc/');
  define('CMS_ASSETS', CMS_URL.'assets/');
  define('CMS_CSS', CMS_ASSETS.'css/');
  define('CMS_JS', CMS_ASSETS.'js/');
  define('CMS_IMG', CMS_ASSETS.'images/');





define('ERROR_PATH', $_SERVER['DOCUMENT_ROOT'].'error/');
define('CLASS_PATH', $_SERVER['DOCUMENT_ROOT'].'class/');
define('CONFIG_PATH', $_SERVER['DOCUMENT_ROOT'].'config/');
define('SITE_NAME', 'Leafplus.com');


