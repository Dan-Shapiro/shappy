<?php
	require_once 'config.php';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
	mysql_select_db($dbname);

	mysql_query("DROP TABLE users");
	mysql_query("DROP TABLE stats");
	mysql_query("DROP TABLE user_stats");

	mysql_query("	CREATE TABLE users (
						id int NOT NULL AUTO_INCREMENT,
						username varchar(250),
						password varchar(50),
						is_admin tinyint(1) DEFAULT 0,
						last_login timestamp NULL,
						PRIMARY KEY(id)
					);");
	mysql_query("	CREATE TABLE stats (
						id int NOT NULL AUTO_INCREMENT,
						display_name text,
						short_name varchar(10),
						PRIMARY KEY(id)
					);");
	mysql_query("	CREATE TABLE user_stats (
						id int NOT NULL AUTO_INCREMENT,
						user_id int,
						stat_id int,
						value text,
						PRIMARY KEY(id)
					);");
?>
