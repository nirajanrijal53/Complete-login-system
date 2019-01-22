<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';
require '../inc/checklogin.php';

$category = new Category();

if(isset($_POST) && !empty($_POST)){
	
	 // debugger($_POST);
	 // exit();
	 // debugger($_FILES, true); 
	$data = array(
		'name' => sanitize($_POST['name']),
		'summary' => sanitize($_POST['summary']),
		'show_in_menu' => (isset($_POST['show_in_menu']) && $_POST['show_in_menu'] == 1) ? 1 : 0,
		'is_parent' => (isset($_POST['is_parent']) && $_POST['is_parent'] == 1) ? 1 : 0,
		'parent_id' => (isset($_POST['parent_id']) && !empty(['parent_id'] == 1)  ? '' : (int)$_POST['parent_id'] ),  
		'status' => sanitize($_POST['status']),
		'added_by' => $_SESSION['user_id']
	);

	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
	// exit();


	
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		$file_name = uploadImage($_FILES['image'], 'category');
		if($file_name){
			$data['image'] = $file_name;
			//success
			if(isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'category/'.$_POST['old_image'])){
				unlink(UPLOAD_DIR.'category/'.$_POST['old_image']);
			}
		} else {
			$_SESSION['warning'] = "File could not be uploaded";
		}

	}


	$category_id = (isset($_POST['id']) && !empty($_POST['id'])) ?(int)$_POST['id'] : null;
	if($category_id){
		$act = "updat";
		$category_id = $category->updateCategory($data, $category_id);
	} else {
		$act = "add";
		$category_id = $category->addCategory($data);
	}

	if($category_id){
		// debugger($_POST);
		// exit();
		redirect('../category', 'success', 'Category '.$act.'ed successfully.');
	} else {
		redirect('../category', 'error', 'Sorry! There was problem while adding category.');
	}
} elseif (isset($_GET['act'], $_GET['id']) && !empty($_GET['id']) && !empty($_GET['act'])) {
		$id = (int)$_GET['id'];
		if($id <=0){
			redirect('../category', 'error', 'Invalid Id.');
		}
		$act = $_GET['act'];
		if($act == substr(md5("delete-category-".$id."-".$_SESSION['token']),3,15)){
			$category_data = $category->getCategoryById($id);
			if(!$category_data){
				redirect('../category', 'error', 'Category has been already deleted or does not exists.');
			}

			$del = $category->deleteCategory($id);
			if($del){
				if(!empty($category_data[0]->image) && file_exists(UPLOAD_DIR.'category/'.$category_data[0]->image)){
					unlink(UPLOAD_DIR.'category/'.$category_data[0]->image);
				}

				redirect('../category', 'success', 'Category deleted successfully.');
			} else {
				redirect('../category', 'error', 'Sorry! There was problem while deleting category.');
			}
		} else {
			redirect('../category', 'error', 'Invalid token.');
		}
} 
else {
	redirect('../category', 'error', 'Unauthorized access.');
}
