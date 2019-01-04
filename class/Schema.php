<?php 

require $_SERVER['DOCUMENT_ROOT'].'config/init.php';

class Schema extends Database{
	function create($sql){
		return $this->runQuery($sql);
	}
}