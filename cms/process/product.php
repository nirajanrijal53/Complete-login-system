<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$products = new Products();

if(isset($_POST) && !empty($_POST)){
	  // debugger($_POST );
	// debugger($_FILES);
	// exit();

	  $data = array(
	  		'title' => sanitize($_POST['title']),
	  		'summary' =>sanitize($_POST['summary']),
	  		'description' => htmlentities($_POST['description']),
	  		'cat_id' => (int)$_POST['cat_id'],
	  		'child_cat_id' => ((isset($_POST['child_cat_id']) && !empty($_POST['child_cat_id'] )) ? (int)$_POST['child_cat_id'] : 0),
	  		'price' => (float)$_POST['price'],
	  		'discount' => (float)($_POST['discount']),
	  		'brand' => sanitize($_POST['brand']),
	  		'meta_keywords' => sanitize($_POST['meta_keywords']),
	  		'vendor' => ((isset($_POST['vendor_id']) && !empty($_POST['vendor_id'] )) ? (int)$_POST['vendor_id'] : 0),
	  		'is_featured' => ((isset($_POST['is_featured']) && $_POST['is_featured'] == 1) ? 1 : 0),
	  		'is_trending' => ((isset($_POST['is_trending']) && $_POST['is_trending'] == 1) ? 1 : 0),
	  		'status' => sanitize($_POST['status']),
	  		'added_by' => $_SESSION['user_id'],


	  );
//	  		debugger($_POST);
//	      debugger($_FILES, true);

	  if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
	  	$product_id = (int)$_POST['product_id'];
	  	//Product id exists or not
	  	$act = 'Updat';
	  	$product_id = $products->updateProduct($data, $product_id);
	  } else {
	  	 // debugger($_POST);
	    //    debugger($data, true);
	  	$act = 'add';
	  	$product_id = $products->addProduct($data);
	  }

	  if($product_id){
	  //Images
	  // debugger($product_id);
	  // debugger($_FILES, true);
	  // debugger($_POST);
	  // exit();
	  	if(isset($_FILES) && !empty($_FILES['images'])){
	  		$files = $_FILES['images'];

	  		$count = count($files['name']);

	  		for($i=0; $i<$count; $i++){
	  			if($files['error'][$i] == 0){

	  				$temp = array(
	  					'name' => $files['name'][$i],
	  					'tmp_name' => $files['tmp_name'][$i],
	  					'size' => $files['size'][$i],
	  					'error' => $files['error'][$i],
	  					'type' => $files['type'][$i]
	  				);
	  				$file_name = uploadImage($temp, 'products');
	  				if($file_name){
	  					$product_images = new ProductImages();
	  					$image = array(

	  						'product_id'=> $product_id,
	  						'image_name' =>$file_name
	  					);
	  						
	  					$product_images->addImages($image);
						  // debugger($_FILES);
						  // exit(); 
	  				}
	  			}
	  		}
	  	}
	  	redirect('../productlist', 'success', 'Product '.$act.'ed successfully.');

	  } else {
	  	redirect('../productlist', 'error', 'Sorry! Product could not be '.$act.'ed at this moment.');
	  }
}
	
else {
	redirect('../productlist', 'error', 'Unauthorized access.');
}