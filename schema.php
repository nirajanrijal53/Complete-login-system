<?php 

require 'config/init.php';

$schema = new Schema();

$query = array(
		"users" => "CREATE TABLE IF NOT EXISTS users(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						full_name varchar(50),
						email varchar(150),
						password text not null,
						role enum('Admin','Customer','Vendor') default 'Customer',
						activate_token text,
						password_reset_token text,
						session_token text,
						status enum('Active', 'Inactive') default 'Active',
						added_date datetime default CURRENT_TIMESTAMP,
						updated_date datetime ON UPDATE CURRENT_TIMESTAMP
					)",
					"user_unique" => "ALTER TABLE users ADD UNIQUE(email)",
					'alter_user' => "ALTER TABLE `users` ADD `last_login` DATETIME NULL DEFAULT NULL AFTER `session_token`, ADD `last_ip` VARCHAR(100) NULL DEFAULT NULL AFTER `last_login`"

);

foreach($query as $key=>$sql){
	$success = $schema->create($sql);
	if($success){
		echo "<em>Query ".$key." Executed successfully. </em><br>";
	} else {
		echo "<em>Problem while executing ".$key." Query. </em><br>";
	}
}