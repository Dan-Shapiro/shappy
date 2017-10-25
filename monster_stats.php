<?php
	function get_monster_stat($stat_name, $monster_id) {
		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		create_monster_stat_if_not_exists($stat_name, $monster_id);

		$query = sprintf("SELECT value FROM monster_stats WHERE stat_id=(SELECT id FROM stats WHERE display_name='%s' OR short_name='%s') AND monster_id='%s'", mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $monster_id));

		$result = mysqli_query($conn, $query);
		list($value) = mysqli_fetch_row($result);
		return $value;
	}

	function create_monster_stat_if_not_exists($stat_name, $monster_id) {
		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		$query = sprintf("INSERT INTO monster_stats(stat_id, monster_id, value) VALUES ((SELECT id FROM stats WHERE display_name='%s' OR short_name='%s'), '%s', '%s')",  mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $monster_id), '0');

		mysqli_query($conn, $query);
	}
?>