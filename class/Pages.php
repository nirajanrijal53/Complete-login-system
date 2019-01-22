<?php 


class Pages extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('pages');
	}

	public function addPages($data, $is_die = false){
	return $this->insert($data, $is_die);
	}

	public function getAllPages($is_die = false){
		return $this->select([], $is_die);
	}

	public function getPagesById($id, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->select($args, $is_die);
	}

	public function deletePages($id, $is_die = false){
		$args = array(
				'where' => array(
				'and' => array(
					'id' => $id
				)
			)
		);

		return $this->delete($args, $is_die);
	}

	public function updatePages($data, $id, $is_die = false){
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