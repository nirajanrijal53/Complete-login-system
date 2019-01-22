<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$banner = new Banner();

if(isset($_POST) && !empty($_POST)){
	
	 // debugger($_POST);
	 // debugger($_FILES, true); 
	$data = array(
		'title' => sanitize($_POST['title']),
		'link' => filter_var($_POST['link'], FILTER_VALIDATE_URL),
		'status' => sanitize($_POST['status']),
		'added_by' => $_SESSION['user_id']
	);


	
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		$file_name = uploadImage($_FILES['image'], 'banner');
		if($file_name){
			$data['image'] = $file_name;
			//success
			if(isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'banner/'.$_POST['old_image'])){
				unlink(UPLOAD_DIR.'banner/'.$_POST['old_image']);
			}
		} else {
			$_SESSION['warning'] = "File could not be uploaded";
		}

	}


	$banner_id = (isset($_POST['id']) && !empty($_POST['id'])) ?(int)$_POST['id'] : null;
	if($banner_id){
		$act = "updat";
		$banner_id = $banner->updateBanner($data, $banner_id);
	} else {
		$act = "add";
		$banner_id = $banner->addBanner($data);
	}

	if($banner_id){
		redirect('../banner', 'success', 'Banner '.$act.'ed successfully.');
	} else {
		redirect('../banner', 'error', 'Sorry! There was problem while adding banner.');
	}
} elseif (isset($_GET['act'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['act'])) {
		$id = (int)$_GET['id'];
		if($id <=0){
			redirect('../banner', 'error', 'Invalid Id.');
		}
		$act = $_GET['act'];
		if($act == substr(md5("delete-banner-".$id."-".$_SESSION['token']),3,15)){
			$banner_data = $banner->getBannerById($id);
			if(!$banner_data){
				redirect('../banner', 'error', 'Banner has been already deleted or does not exists.');
			}

			$del = $banner->deleteBanner($id);
			if($del){
				if(!empty($banner_data[0]->image) && file_exists(UPLOAD_DIR.'banner/'.$banner_data[0]->image)){
					unlink(UPLOAD_DIR.'banner/'.$banner_data[0]->image);
				}

				redirect('../banner', 'success', 'Banner deleted successfully.');
			} else {
				redirect('../banner', 'error', 'Sorry! There was problem while deleting banner.');
			}
		} else {
			redirect('../banner', 'error', 'Invalid token.');
		}
} 
else {
	redirect('../banner', 'error', 'Unauthorized access.');
}