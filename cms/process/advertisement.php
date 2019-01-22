<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$advertisement = new Advertisement();
	// debugger($_FILES); 

if(isset($_POST) && !empty($_POST)){
	$data = array(
		'title' => sanitize($_POST['title']),
		'link' => filter_var($_POST['link'], FILTER_VALIDATE_URL),
		'status' => sanitize($_POST['status']),
		'added_by' => $_SESSION['user_id']
	);
	 // print_r($data);
	 // echo "string";
	 // exit();


	
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		$file_name = uploadImage($_FILES['image'], 'advertisement');
		if($file_name){
			$data['image'] = $file_name;
			//success
			if(isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'advertisement/'.$_POST['old_image'])){
				unlink(UPLOAD_DIR.'advertisement/'.$_POST['old_image']);
			}
		} else {
			$_SESSION['warning'] = "File could not be uploaded";
		}

	}


	$advertisement_id = (isset($_POST['id']) && !empty($_POST['id'])) ?(int)$_POST['id'] : null;
	if($advertisement_id){
		$act = "updat";
		$advertisement_id = $advertisement->updateAdvertisement($data, $advertisement_id);
	} else {
		$act = "add";
	// debugger($_POST);
	//  debugger($_FILES); 
	//  exit();
		$advertisement_id = $advertisement->addAdvertisement($data);
	}

	if($advertisement_id){
		redirect('../advertisement', 'success', 'Advertisement '.$act.'ed successfully.');
	} else {
		redirect('../advertisement', 'error', 'Sorry! There was problem while adding advertisement.');
	}
} elseif (isset($_GET['act'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['act'])) {
		$id = (int)$_GET['id'];
		if($id <=0){
			redirect('../advertisement', 'error', 'Invalid Id.');
		}
		$act = $_GET['act'];
		if($act == substr(md5("delete-advertisement-".$id."-".$_SESSION['token']),3,15)){
			$advertisement_data = $advertisement->getAdvertisementById($id);
			if(!$advertisement_data){
				redirect('../advertisement', 'error', 'Advertisement has been already deleted or does not exists.');
			}

			$del = $advertisement->deleteAdvertisement($id);
			if($del){
				if(!empty($advertisement_data[0]->image) && file_exists(UPLOAD_DIR.'advertisement/'.$advertisement_data[0]->image)){
					unlink(UPLOAD_DIR.'advertisement/'.$advertisement_data[0]->image);
				}

				redirect('../advertisement', 'success', 'Advertisement deleted successfully.');
			} else {
				redirect('../advertisement', 'error', 'Sorry! There was problem while deleting advertisement.');
			}
		} else {
			redirect('../advertisement', 'error', 'Invalid token.');
		}
} 
else {
	redirect('../advertisement', 'error', 'Unauthorized access.');
}