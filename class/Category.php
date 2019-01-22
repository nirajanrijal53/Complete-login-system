<?php 

class Category extends Database{
	function __construct(){
		Database::__construct();
		$this->table('categories');
	}

	public function getAllCategory($is_die = false){
		$args = array(
			'fields' => array('id', 'name', 'is_parent', 'image', 'summary', '(SELECT name FROM categories as c WHERE c.id = categories.parent_id) as parent_cat', 'show_in_menu','status')
		);
		return $this->select($args, $is_die );
	}

	public function addCategory($data, $is_die = false){
		return $this->insert($data, $is_die);
	}

	public function updateCategory($data, $id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array('id' => $id
				)
			)

		);
		$success = $this->update(
			$data, $args, $is_die);
		if($success){
			return $id;
		} else {
			return false;
		}
	}

	public function getCategoryById($id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);
		return $this->select($args, $is_die);
	}

	public function deleteCategory($id, $is_die = false){
		$args = array(
				'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->delete($args, $is_die);
	}

	public function getAllparent($is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'is_parent' => 1,
					'parent_id' => 0
				)
			)
		);
		return $this->select($args, $is_die);
	}

	public function getParentCatForMenu($is_die = false){
		$args = array(
			'where' =>array(
				'and' =>array(
					'is_parent' => 1,
					'parent_id' => 0,
					'status' => 'Active',
					'show_in_menu' =>1
				)
			),
			'order_by' => 'name ASC'
		);
		return $this->select($args, $is_die);
	}


	// public function getChildCatByParentId($cat_id, $is_die = false){
	// 		$args = array( 
	// 			'where' => array(
	// 				'and' => array(
	// 						'is_parent' => 0,
	// 						'parent_id' => $cat_id
	// 				)
	// 			)
	// 		);
	// 		return $this->select($args, $is_die);
	// }

	public function getChildCategory($parent_id, $is_die = false){
		$args = array(
				'where' => array(
					'and' => array(
							'is_parent' => 0,
							'parent_id' => $parent_id,
							'status' => 'Active'
					)
				),
				'order_by' => ' name ASC '
			);
		return $this->select($args, $is_die);
	}


}