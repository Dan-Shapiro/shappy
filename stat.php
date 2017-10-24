<?php
	function get_stat($stat_name, $user_id) {
		require_once 'config.php';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
		mysql_select_db($dbname);

		$query = sprintf("SELECT value FROM user_stats WHERE stat_id=(SELECT id FROM stats WHERE display_name='%s' OR short_name='%s') AND user_id='%s'", mysql_real_escape_string($stat_name), mysql_real_escape_string($stat_name), mysql_real_escape_string($user_id));

		$result = mysql_query($query);
		list($value) = mysql_fetch_row($result);
		return $value;
	}

	function set_stat($stat_name, $user_id, $value) {
		require_once 'config.php';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
		mysql_select_db($dbname);

		$query = sprintf("UPDATE user_stats SET value='%s' WHERE stat_id=(SELECT id FROM stats WHERE display_name='%s' OR short_name='%s') AND user_id='%s'", mysql_real_escape_string($value), mysql_real_escape_string($stat_name), mysql_real_escape_string($stat_name), mysql_real_escape_string($user_id));

		$result = mysql_query($query);
	}
?>