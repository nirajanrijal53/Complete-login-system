<?php 

class ProductImages extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('product_images');
	}

	public function addImages($image, $is_die = false){
		return $this->insert($image, $is_die);
	}
}