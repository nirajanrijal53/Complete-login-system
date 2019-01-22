<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$productlist = new Productlist();

if(isset($_POST) && !empty($_POST)){
	
	 // debugger($_POST);
	 // debugger($_FILES, true); 
	$data = array(
		'title' => sanitize($_POST['title']),
		'summary' => sanitize($_POST['summary']),
		'price' => sanitize($_POST['price']),
		'discount' => sanitize($_POST['discount']),
		'brand' => sanitize($_POST['brand']),
		'status' => sanitize($_POST['status']),
	);


	
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		$file_name = uploadImage($_FILES['image'], 'productlist');
		if($file_name){
			$data['image'] = $file_name;
			//success
			if(isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'productlist/'.$_POST['old_image'])){
				unlink(UPLOAD_DIR.'productlist/'.$_POST['old_image']);
			}
		} else {
			$_SESSION['warning'] = "File could not be uploaded";
		}

	}


	$productlist_id = (isset($_POST['id']) && !empty($_POST['id'])) ?(int)$_POST['id'] : null;
	if($productlist_id){
		$act = "updat";
		$productlist_id = $productlist->updateProductlist($data, $productlist_id);
	} else {
		$act = "add";
		$productlist_id = $productlist->addProductlist($data);
	}

	if($productlist_id){
		redirect('../productlist', 'success', 'Product '.$act.'ed successfully.');
	} else {
		redirect('../productlist', 'error', 'Sorry! There was problem while adding product.');
	}
} elseif (isset($_GET['act'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['act'])) {
		$id = (int)$_GET['id'];
		if($id <=0){
			redirect('../productlist', 'error', 'Invalid Id.');
		}
		$act = $_GET['act'];
		if($act == substr(md5("delete-productlist-".$id."-".$_SESSION['token']),3,15)){
			$productlist_data = $productlist->getProductlistById($id);
			if(!$productlist_data){
				redirect('../productlist', 'error', 'Productlist has been already deleted or does not exists.');
			}

			$del = $productlist->deleteProductlist($id);
			if($del){
				if(!empty($productlist_data[0]->image) && file_exists(UPLOAD_DIR.'productlist/'.$productlist_data[0]->image)){
					unlink(UPLOAD_DIR.'productlist/'.$productlist_data[0]->image);
				}

				redirect('../productlist', 'success', 'Productlist deleted successfully.');
			} else {
				redirect('../productlist', 'error', 'Sorry! There was problem while deleting productlist.');
			}
		} else {
			redirect('../productlist', 'error', 'Invalid token.');
		}
} 
else {
	redirect('../productlist', 'error', 'Unauthorized access.');
}