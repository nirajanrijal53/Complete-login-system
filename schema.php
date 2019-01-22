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
		'alter_user' => "ALTER TABLE `users` ADD `last_login` DATETIME NULL DEFAULT NULL AFTER `session_token`, 			ADD `last_ip` VARCHAR(100) NULL DEFAULT NULL AFTER `last_login`",
		'banners' => "CREATE TABLE IF NOT EXISTS banners(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						title text,
						link text,
						status ENUM('Active', 'Inactive') default 'Active',
						image varchar(200),
						added_by int,
						added_date datetime DEFAULT CURRENT_TIMESTAMP,
						updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		)",
		'pages' => "CREATE TABLE IF NOT EXISTS pages(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					title text,
					slug varchar(200),
					summary text,
					description text,
					image varchar(100),
					status ENUM('Active', 'Inactive') default 'Active',
					added_by int,
					added_date datetime DEFAULT CURRENT_TIMESTAMP,
					updated_date datetime ON UPDATE CURRENT_TIMESTAMP	
		)",
		"slug_unique" => "ALTER TABLE pages ADD UNIQUE(slug)",
		"categories" => "CREATE TABLE IF NOT EXISTS categories(
			id int not null AUTO_INCREMENT PRIMARY KEY,
			name varchar(100),
			slug text,
			summary text,
			image varchar(150),
			show_in_menu tinyint,
			is_parent tinyint default 1,
			parent_id int default 0,
			status ENUM('Active', 'Inactive') default 'Active'	,
			added_by int,
			added_date datetime default CURRENT_TIMESTAMP,
			updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		)",
		'advertisements' => "CREATE TABLE IF NOT EXISTS advertisements(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						title text,
						link text,
						status ENUM('Active', 'Inactive') default 'Active',
						image varchar(200),
						added_by int,
						added_date datetime DEFAULT CURRENT_TIMESTAMP,
						updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		)",

		"products"  =>"CREATE TABLE IF NOT EXISTS products(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					title text,
					summary text,
					description text,
					cat_id int,
					child_cat_id int,
					price float,
					brand text,
					meta_keywords text,
					vendor int,
					is_featured tinyint,
					is_trending tinyint,
					status enum('Available', 'Unavailable') DEFAULT 'Available',
					added_by int,
					added_date datetime DEFAULT CURRENT_TIMESTAMP,
					updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		)",

		"product_images" => "CREATE TABLE IF NOT EXISTS product_images(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					product_id int,
					image_name varchar(100)
		)",

		// "product_rating" => "CREATE TABLE IF NOT EXISTS product_ratings(
		// 			id int not null AUTO_INCREMENT PRIMARY KEY,
		// 			name text,
		// 			email text,
		// 			product_id int,
		// 			rate int,
		// 			review text,
		// 			status emum('Active', 'Inactive') default 'Active',
		// 			added_date datetime DEFAULT CURRENT_TIMESTAMP,
		// 			updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		// )",
		"product_rating"  =>"CREATE TABLE IF NOT EXISTS product_ratings(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					name text,
					email text,
					product_id int,
					rate int,
					review text,
					status enum('Active', 'Inactive') DEFAULT 'Active',
					added_date datetime DEFAULT CURRENT_TIMESTAMP,
					updated_date datetime ON UPDATE CURRENT_TIMESTAMP
		)",

 
);

foreach($query as $key=>$sql){
	$success = $schema->create($sql);
	if($success){
		echo "<em>Query ".$key." Executed successfully. </em><br>";
	} else {
		echo "<em>Problem while executing ".$key." Query. </em><br>";
	}
}