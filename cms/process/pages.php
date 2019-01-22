<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$page = new Pages();

if(isset($_POST) && !empty($_POST)){
	
	  // debugger($_POST);
	  // debugger($_FILES, true); 
	$data = array(
		'title' => sanitize($_POST['title']),
		'summary' => sanitize($_POST['summary']),
		'description' => htmlentities($_POST['description']),
		'status' => sanitize($_POST['status']),
		'added_by' => $_SESSION['user_id']
	);


	
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		$file_name = uploadImage($_FILES['image'], 'pages');
		if($file_name){
			$data['image'] = $file_name;
			//success
			if(isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'pages/'.$_POST['old_image'])){
				unlink(UPLOAD_DIR.'pages/'.$_POST['old_image']);
			}
		} else {
			$_SESSION['warning'] = "File could not be uploaded";
		}

	}


	$page_id = (isset($_POST['id']) && !empty($_POST['id'])) ?(int)$_POST['id'] : null;
	if($page_id){
		$act = "updat";
		$page_id = $page->updatePages($data, $page_id);
	} else {
		$act = "add";
		$page_id = $page->addPages($data);
	}

	if($page_id){
		redirect('../pages', 'success', 'Pages '.$act.'ed successfully.');
	} else {
		redirect('../pages', 'error', 'Sorry! There was problem while adding pages.');
	}
} elseif (isset($_GET['act'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['act'])) {
		$id = (int)$_GET['id'];
		if($id <=0){
			redirect('../pages', 'error', 'Invalid Id.');
		}
		$act = $_GET['act'];
		if($act == substr(md5("delete-pages-".$id."-".$_SESSION['token']),3,15)){
			$page_data = $page->getPagesById($id);
			if(!$page_data){
				redirect('../pages', 'error', 'Pages has been already deleted or does not exists.');
			}

			$del = $page->deletePages($id);
			if($del){
				if(!empty($page_data[0]->image) && file_exists(UPLOAD_DIR.'pages/'.$page_data[0]->image)){
					unlink(UPLOAD_DIR.'pages/'.$page_data[0]->image);
				}

				redirect('../pages', 'success', 'Page deleted successfully.');
			} else {
				redirect('../pages', 'error', 'Sorry! There was problem while deleting page.');
			}
			debugger($page_data);
		} else {
			redirect('../pages', 'error', 'Invalid token.');
		}
} 
else {
	redirect('../pages', 'error', 'Unauthorized access.');
}