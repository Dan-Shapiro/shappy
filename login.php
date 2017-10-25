<?php
	require('smarty/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = "views";
	$smarty->compile_dir = "tmp";
	$smarty->cache_dir = "cache";
	$smarty->config_dir = "configs";

	$error = "";

	session_start();

	if($_POST) {
		require_once 'config.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
		mysql_select_db($dbname);

		$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username)=UPPER('%s') AND password='%s'", mysql_real_escape_string($username), mysql_real_escape_string(md5($password)));

		$result = mysql_query($query);
		list($count) = mysql_fetch_row($result);

		if($count == 1) {
			$_SESSION['authenticated'] = true;
			$_SESSION['username'] = $username;

			$query = sprintf("UPDATE users SET last_login=NOW() WHERE UPPER('%s') AND password='%s'", mysql_real_escape_string($username), mysql_real_escape_string(md5(password)));

			mysql_query($query);

			$query = sprintf("SELECT is_admin FROM users WHERE UPPER(username)=UPPER('%s') AND password='%s'", mysql_real_escape_string($username), mysql_real_escape_string(md5(password)));

			$result = mysql_query($query);
			list($is_admin) = mysql_fetch_row($result);
			if($is_admin == 1) {
				header('Location:admin.php');
			}
			else {
				header('Location:index.php');
			}
		}
		else {
			$error = 'Wrong username and password combination.';
		}
	}

	$smarty->assign('error', $error);
	$smarty->display('login.tpl');
?>
