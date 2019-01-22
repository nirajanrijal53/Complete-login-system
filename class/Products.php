<?php 

class Products extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('products');
	}

	public function addProduct($data, $is_die = false){
		return $this->insert($data, $is_die);
	}

	public function getAllProducts($is_die = false){
		$args = array(
			'fields' => array('products.id','products.title','products.summary','products.price','products.discount','products.cat_id','categories.id as category_id','categories.name','users.full_name'),
			'join' => 'LEFT JOIN categories ON categories.id = products.cat_id'
		);
		return $this->select($args, $is_die);
	}

	public function getProduct($args = [], $is_die = false){
		return $this->select($args, $is_die);
	}
}