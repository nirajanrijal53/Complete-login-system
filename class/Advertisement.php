<?php 


class Advertisement extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('advertisements');
	}

	public function addAdvertisement($data, $is_die = false){
	return $this->insert($data, $is_die);
	}

	public function getAllAdvertisement($args = [], $is_die = false){
		return $this->select($args, $is_die);
	}

	public function getAdvertisementById($id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->select($args, $is_die);
	}

	public function deleteAdvertisement($id, $is_die = false){
		$args = array(
				'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->delete($args, $is_die);
	}

	public function updateAdvertisement($data, $id, $is_die = false){
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