<?php
	function get_stat($stat_name, $user_id) {
		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		create_if_not_exists($stat_name, $user_id);

		$query = sprintf("SELECT value FROM user_stats WHERE stat_id=(SELECT id FROM stats WHERE display_name='%s' OR short_name='%s') AND user_id='%s'", mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $user_id));

		$result = mysqli_query($conn, $query);
		list($value) = mysqli_fetch_row($result);
		return $value;
	}

	function set_stat($stat_name, $user_id, $value) {
		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		create_if_not_exists($stat_name, $user_id);

		$query = sprintf("UPDATE user_stats SET value='%s' WHERE stat_id=(SELECT id FROM stats WHERE display_name='%s' OR short_name='%s') AND user_id='%s'", mysqli_real_escape_string($conn, $value), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $user_id));

		$result = mysqli_query($conn, $query);
	}

	function create_if_not_exists($stat_name, $user_id) {
		include 'config.php';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		$query = sprintf("SELECT count(value) FROM user_stats WHERE stat_id = (SELECT id FROM stats WHERE display_name = '%s' OR short_name = '%s') AND user_id = '%s'", mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $user_id));

		$result = mysqli_query($conn, $query);

		list($count) = mysqli_fetch_row($result);
		if($count == 0) {
			$query = sprintf("INSERT INTO user_stats(stat_id, user_id, value) VALUES ((SELECT id FROM stats WHERE display_name = '%s' OR short_name = '%s'),'%s','%s')", mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $stat_name), mysqli_real_escape_string($conn, $user_id), '0');
			
			mysqli_query($conn, $query);
		}	
	}
?>