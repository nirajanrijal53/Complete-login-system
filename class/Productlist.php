<?php 


class Productlist extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('products');
	}

	public function addProductlist($data, $is_die = false){
	return $this->insert($data, $is_die);
	}

	public function getAllProductlist($is_die = false){
		return $this->select([], $is_die);
	}

	public function getProductlistById($id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->select($args, $is_die);
	}

	public function deleteProductlist($id, $is_die = false){
		$args = array(
				'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->delete($args, $is_die);
	}

	public function updateProductlist($data, $id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);
		$success = $this->update($data, $args, $is_die);
		if($success){
			return $id;
		} else {
			return false;
		}
	}




}