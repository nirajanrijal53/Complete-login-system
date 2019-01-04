<?php 
 // require  $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
 // require  $_SERVER['DOCUMENT_ROOT'].'config/autoload.php';
 require $_SERVER['DOCUMENT_ROOT'].'config/init.php';

class User extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('users');
	}

	// public function getUsers(){
	// 	$sql = "SELECT * FROM users";
	// 	$data = $this->getDataFromQuery($sql);
	// 	return $data;

	// }

	public function getUserByUsername($user_name, $is_die = false){
		// SELECT fields FROM table
		// JOIN statement
		// WHERE clause
		// GROUP BY  clause
		// ORDER BY clause
		// LIMIT start, count

		$args = array(
			//'fields' =>['id', 'email', 'full_name', 'password', 'status'],
			// 'where' =>"email = '".$user_name."'"
			'where' => array(
							// 'or' => array(
							// 	'email' => $user_name,
							// 	'user_name' => $user_name
							// ),	
							'and' => array(
							 	'email' => $user_name,
								
							)
						)


			// )
		);

		$data = $this->select($args, $is_die);
		return $data;  
	}

	public function updateUser($data, $id, $is_die = false){
		$args = array(
					'where' => array(
						'and' => array('id' =>$id)
					)
		);
		return $this->update($data, $args, $is_die);
	}

	public function getUserByToken($token, $is_die = false){
		$args = array(
			'where' => array(
				'and' => array('session_token' => $token)
			)
		);
		return $this->select($args, $is_die);
	}	

	public function getUser($args = array(), $is_die = false){
		$args = array(
				'where' => array(
					'and' => $args
				)
		);

		return $this->select($args, $is_die);
	}



}
 // $user = new User();

