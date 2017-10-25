<?php
	include 'config.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	mysqli_query($conn, "DROP TABLE users");
	mysqli_query($conn, "DROP TABLE stats");
	mysqli_query($conn, "DROP TABLE user_stats");

	mysqli_query($conn, "	CREATE TABLE users (
						id int NOT NULL AUTO_INCREMENT,
						username varchar(250),
						password varchar(50),
						is_admin tinyint(1) DEFAULT 0,
						last_login timestamp NULL,
						email TEXT NOT NULL,
						confirmed tinyint(1) NOT NULL DEFAULT 0,
						PRIMARY KEY(id)
					);");
	mysqli_query($conn, "	CREATE TABLE stats (
						id int NOT NULL AUTO_INCREMENT,
						display_name text,
						short_name varchar(10),
						PRIMARY KEY(id)
					);");
	mysqli_query($conn, "	CREATE TABLE user_stats (
						id int NOT NULL AUTO_INCREMENT,
						user_id int,
						stat_id int,
						value text,
						PRIMARY KEY(id)
					);");

	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Attack', 'atk');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Defense', 'def');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Magic', 'mag');");

	header('Location:login.php');
?>
