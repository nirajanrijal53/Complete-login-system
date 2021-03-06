<?php

abstract class Database{

	protected $conn;
	private $stmt = null;
	private $sql = null;
	private $table = null;

	public function __construct(){
		try{
			$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PWD );
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->stmt = $this->conn->prepare("SET NAMES utf8");
			$this->stmt->execute();
		} catch(PDOException $e){
			error_log(date('Y-m-d h:i:s A').": (DB Connection): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		} catch(Exception $e){
			error_log(date('Y-m-d h:i:s A').": (DB Connection): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		}
	
	}

	protected function getDataFromQuery($sql){
		try{
			$this->sql = $sql;
			$this->stmt = $this->conn->prepare($this->sql);
			$this->stmt->execute();
			$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e){
			error_log(date('Y-m-d h:i:s A').": (DB GetData): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		} catch(Exception $e){
			error_log(date('Y-m-d h:i:s A').": (DB GetData): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		}

	}

	protected function runQuery($sql){
		try{
			$this->stmt = $this->conn->prepare($sql);
			return $this->stmt->execute();
		} catch(PDOException $e){
			error_log(date('Y-m-d h:i:s A').": (DB RunQuery): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		} catch(Exception $e){
			error_log(date('Y-m-d h:i:s A').": (DB RunQuery): ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		}
	}

	protected function table($_table){
		$this->table = $_table;
	}

	protected final function select($args = array(), $is_die = false){
		try{
					// SELECT fields FROM table
					// JOIN statement
					// WHERE clause
					// GROUP BY  clause
					// ORDER BY clause
					// LIMIT start, count

					$this->sql = "SELECT ";

					// Fields set
					if(isset($args['fields']) && !empty($args['fields'])){
						if(is_array($args['fields'])){
							$this->sql .= " ".implode(", ",$args['fields']);	
						} else {
							$this->sql .= " ".$args['fields'];
						} 
					} else {
						$this->sql .= " * ";
					}
					// Fields set


					// Set Table
					if(!isset($this->table) || empty($this->table)){
						throw new Exception("Table not set.");
					}

					$this->sql .= " FROM ".$this->table;

					// Join statement
					if(isset($args['join'])&& !empty($args['join'])){
						$this->sql .= " LEFT JOIN ".$args['join'];
					}

					// Join statement


					// WHERE clause
					if(isset($args['where']) && !empty($args['where'])){
						$this->sql .= " WHERE ";
						if(is_array($args['where'])){
							// array //prepare key : value
							$temp_or = array();
							$temp_and = array();


							if(isset($args['where']['or']) && !empty($args['where']['or'])){
								foreach($args['where']['or'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_or[] = $str;

								}
								$this->sql .= implode(" OR ", $temp_or); 
							} 
							if(isset($args['where']['and']) && !empty($args['where']['and'])){
								foreach($args['where']['and'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_and[] = $str;

								}

								if(!empty($temp_or)){
									$this->sql .= " AND ";
								}
								$this->sql .= implode(" AND ", $temp_and); 

							}

							
							// debugger($temp_or);
							// debugger($temp_and);

							// $sql = "SELECT * FROM users WHERE email = :key AND status = :key ";
							// $stmt = $this->conn->prepare($sql);
							// $stmt->bindValue(":key", email_address, PDO::PARAM_STR);


							// echo $sql;
							// exit;

							// echo $this->sql;
							// debugger($args,true);
						} else {
							$this->sql .= $args['where'];
						}
					}
					// WHERE clause

					//GROUP BY
					//GROUP BY

					//ORDER BY

					if(isset($args['order_by']) && !empty($args['order_by'])){
						$this->sql .= " ORDER BY ".$args['order_by'];
					}
					//ORDER BY

					// LIMIT

					if(isset($args['limit']) && !empty($args['limit'])){
						$this->sql .= " LIMIT ".$args['limit'];
					}
					// LIMIT

					

					$this->stmt = $this->conn->prepare($this->sql);
					
					if(isset($args['where']) && !empty($args['where']) && is_array($args['where'])){
						
						if(isset($args['where']['or']) && !empty($args['where']['or'])){
							foreach($args['where']['or'] as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}

						if(isset($args['where']['and']) && !empty($args['where']['and'])){
							foreach($args['where']['and'] as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}
					}


					if($is_die){
						debugger($args);
						echo $this->sql;
						exit;   
					}

					// debugger($this->sql);
					// debugger($this->stmt, true);
					
					$this->stmt->execute();
					$data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
					return $data;

		} catch(PDOException $e){
			error_log(date('Y-m-d h:i:s A').": (DB SELECT): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		} catch(Exception $e){
			error_log(date('Y-m-d h:i:s A').": (DB SELECT): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
			return false;
		}
	}

	protected final function update($data = array(), $args = array(), $is_die = false){
		/*
			UPDATE table SET
				column_name_1 = :key_1,
				column_name_2 = :key_2,
				......
			WHERE clause	

		*/
			try{
				$this->sql = " UPDATE ";

				// Set Table
					if(!isset($this->table) || empty($this->table)){
						throw new Exception("Table not set.");
					}

					$this->sql .= $this->table. " SET ";

				// Set Table

					if(isset($data) && !empty($data)){
						if(is_array($data)){
							$temp = array();
							foreach($data as $column_name => $value){
								$temp[] = $column_name." = :".$column_name;
							}
							$this->sql .=implode(', ', $temp);
						} else {
							$this->sql .= $data;
						}
					} else {
						return -1;
					}

					// WHERE clause
					if(isset($args['where']) && !empty($args['where'])){
						$this->sql .= " WHERE ";
						if(is_array($args['where'])){
							// array //prepare key : value
							$temp_or = array();
							$temp_and = array();


							if(isset($args['where']['or']) && !empty($args['where']['or'])){
								foreach($args['where']['or'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_or[] = $str;

								}
								$this->sql .= implode(" OR ", $temp_or); 
							} 
							if(isset($args['where']['and']) && !empty($args['where']['and'])){
								foreach($args['where']['and'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_and[] = $str;

								}

								if(!empty($temp_or)){
									$this->sql .= " AND ";
								}
								$this->sql .= implode(" AND ", $temp_and); 

							}

							
							// debugger($temp_or);
							// debugger($temp_and);

							// $sql = "SELECT * FROM users WHERE email = :key AND status = :key ";
							// $stmt = $this->conn->prepare($sql);
							// $stmt->bindValue(":key", email_address, PDO::PARAM_STR);


							// echo $sql;
							// exit;

							// echo $this->sql;
							// debugger($args,true);
						} else {
							$this->sql .= $args['where'];
						}
					}
					// WHERE clause

					if($is_die){
						echo $this->sql;
						echo "<br>";

						debugger($data);
						echo "<br>";

						debugger($args, true);
					}

					$this->stmt = $this->conn->prepare($this->sql);

					if(isset($data) && !empty($data) && is_array($data)){
						
						if(isset($data) && !empty($data)){
							foreach($data as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}

						if(isset($args['where']['and']) && !empty($args['where']['and'])){
							foreach($args['where']['and'] as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}
					}

					return $this->stmt->execute();

			} catch(PDOException $e){
				error_log(date('Y-m-d h:i:s A').": (DB UPDATE): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			} catch(Exception $e){
				error_log(date('Y-m-d h:i:s A').": (DB UPDATE): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			}

	}

	protected final function insert($data = array(), $is_die = false){

		// debugger($data);


		/*
			INSERT INTO table SET
				column_name_1 = :key_1,
				column_name_2 = :key_2,
				......

		*/
			try{
				$this->sql = " INSERT INTO ";

				// Set Table
					if(!isset($this->table) || empty($this->table)){
						throw new Exception("Table not set.");
					}

					$this->sql .= $this->table. " SET ";

				// Set Table

					if(isset($data) && !empty($data)){
						if(is_array($data)){
							$temp = array();
							foreach($data as $column_name => $value){
								$temp[] = $column_name." = :".$column_name;
							}
							$this->sql .=implode(', ', $temp);
						} else {
							$this->sql .= $data;
						}
					} else {
						return -1;
					}

					
					if($is_die){
						echo $this->sql;
						echo "<br>";

						debugger($data);
						echo "<br>";

						debugger($data, true);
					}

					$this->stmt = $this->conn->prepare($this->sql);

					if(isset($data) && !empty($data) && is_array($data)){
						
						if(isset($data) && !empty($data)){
							foreach($data as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}

					}

					// echo ($this->sql);
					// exit();

				 	 $this->stmt->execute();
				 	return $this->conn->lastInsertId();

			} catch(PDOException $e){
				error_log(date('Y-m-d h:i:s A').": (DB INSERT): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			} catch(Exception $e){
				error_log(date('Y-m-d h:i:s A').": (DB INSERT): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			}
	}

	protected final function delete($args = array(), $is_die = false){
			/*
				DELETE FROM table
				WHERE clause
			*/

		try{

					$this->sql = "DELETE ";

					// Set Table
					if(!isset($this->table) || empty($this->table)){
						throw new Exception("Table not set.");
					}

					$this->sql .= " FROM ".$this->table;

					// Join statement


					// WHERE clause
					if(isset($args['where']) && !empty($args['where'])){
						$this->sql .= " WHERE ";
						if(is_array($args['where'])){
							// array //prepare key : value
							$temp_or = array();
							$temp_and = array();


							if(isset($args['where']['or']) && !empty($args['where']['or'])){
								foreach($args['where']['or'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_or[] = $str;

								}
								$this->sql .= implode(" OR ", $temp_or); 
							} 
							if(isset($args['where']['and']) && !empty($args['where']['and'])){
								foreach($args['where']['and'] as $column_name => $value){
									$str = $column_name." = :".$column_name;
									$temp_and[] = $str;

								}

								if(!empty($temp_or)){
									$this->sql .= " AND ";
								}
								$this->sql .= implode(" AND ", $temp_and); 

							}

							
							
						} else {
							$this->sql .= $args['where'];
						}
					}
					// WHERE clause


					

					$this->stmt = $this->conn->prepare($this->sql);
					
					if(isset($args['where']) && !empty($args['where']) && is_array($args['where'])){
						
						if(isset($args['where']['or']) && !empty($args['where']['or'])){
							foreach($args['where']['or'] as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}

						if(isset($args['where']['and']) && !empty($args['where']['and'])){
							foreach($args['where']['and'] as $column_name => $value){
								if(is_int($value)){
									$param = PDO::PARAM_INT;
								} else if(is_bool($value)){
									$param = PDO::PARAM_BOOL;
								} else {
									$param = PDO::PARAM_STR;
								}

								if(isset($param)){
									$this->stmt->bindValue(":".$column_name, $value, $param);
								}
							}
						}
					}


					if($is_die){
						debugger($args);
						echo $this->sql;
						exit;   
					}

					
					return $this->stmt->execute();

		} catch(PDOException $e){
				error_log(date('Y-m-d h:i:s A').": (DB DELETE): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			} catch(Exception $e){
				error_log(date('Y-m-d h:i:s A').": (DB DELETE): (SQL: ".$this->sql.") ".$e->getMessage()."\r\n", 3, ERROR_PATH."error.log");
				return false;
			}
	}



}
