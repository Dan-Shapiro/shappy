<?php
	include 'config.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	mysqli_query($conn, "DROP TABLE users");
	mysqli_query($conn, "DROP TABLE stats");
	mysqli_query($conn, "DROP TABLE user_stats");
	mysqli_query($conn, "DROP TABLE monsters");
	mysqli_query($conn, "DROP TABLE monster_stats");

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
	mysqli_query($conn, "	CREATE TABLE monsters (
								id int NOT NULL AUTO_INCREMENT,
								name text,
								PRIMARY KEY(id)
							);");
	mysqli_query($conn, "	CREATE TABLE monster_stats (
								id int NOT NULL AUTO_INCREMENT,
								monster_id int NOT NULL,
								stat_id int,
								value text,
								PRIMARY KEY(id)
							);");

	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Attack', 'atk');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Defence', 'def');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Magic', 'mag');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Gold', 'gp');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Gold In Bank', 'bankgp');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Maximum HP', 'maxhp');");
	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Current HP', 'curhp');");

	mysqli_query($conn, "	INSERT INTO stats(display_name, short_name) VALUES ('Set Default HP Values', 'sethp');");

	mysqli_query($conn, "	INSERT INTO monsters(name) VALUES ('Crazy Eric');");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Crazy Eric'), (SELECT id FROM stats WHERE short_name='atk'), 2);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Crazy Eric'), (SELECT id FROM stats WHERE short_name='def'), 2);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Crazy Eric'), (SELECT id FROM stats WHERE short_name='maxhp'), 8);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Crazy Eric'), (SELECT id FROM stats WHERE short_name='gp'), 5);");

	mysqli_query($conn, "	INSERT INTO monsters(name) VALUES ('Lazy Russell');");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Lazy Russell'), (SELECT id FROM stats WHERE short_name='atk'), 1);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Lazy Russell'), (SELECT id FROM stats WHERE short_name='def'), 0);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Lazy Russell'), (SELECT id FROM stats WHERE short_name='maxhp'), 4);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Lazy Russell'), (SELECT id FROM stats WHERE short_name='gp'), 20);");

	mysqli_query($conn, "	INSERT INTO monsters(name) VALUES ('Hard Hittin Louis');");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Hard Hittin Louis'), (SELECT id FROM stats WHERE short_name='atk'), 4);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Hard Hittin Louis'), (SELECT id FROM stats WHERE short_name='def'), 3);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Hard Hittin Louis'), (SELECT id FROM stats WHERE short_name='maxhp'), 10);");
	mysqli_query($conn, "	INSERT INTO monster_stats(monster_id, stat_id, value) VALUES ((SELECT id FROM monsters WHERE name='Hard Hittin Louis'), (SELECT id FROM stats WHERE short_name='gp'), 5);");


	header('Location:login.php');
?>
