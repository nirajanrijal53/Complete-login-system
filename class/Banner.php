<?php 


class Banner extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('banners');
	}

	public function addBanner($data, $is_die = false){
	return $this->insert($data, $is_die);
	}

	public function getAllBanner($args = [], $is_die = false){
		return $this->select($args, $is_die);
	}

	public function getBannerById($id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->select($args, $is_die);
	}

	public function deleteBanner($id, $is_die = false){
		$args = array(
				'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->delete($args, $is_die);
	}

	public function updateBanner($data, $id, $is_die = false){
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