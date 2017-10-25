<?php
	include 'smarty.php';

	$error = "";

	session_start();

	if($_POST) {
		include 'config.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

		$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username)=UPPER('%s') AND password='%s'", mysqli_real_escape_string($conn, $username), mysqli_real_escape_string($conn, md5($password)));

		$result = mysqli_query($conn, $query);
		list($count) = mysqli_fetch_row($result);

		if($count == 1) {
			$query = sprintf("SELECT confirmed FROM users WHERE UPPER(username)=UPPER('%s')", mysqli_real_escape_string($conn, $username));

			$result = mysqli_query($conn, $query);
			list($conf) = mysqli_fetch_row($result);

			if($conf != 1) {
				$error = 'Email has not been confirmed.';
			}
			else {
				$_SESSION['authenticated'] = true;
				$_SESSION['username'] = $username;

				$query = sprintf("UPDATE users SET last_login=NOW() WHERE UPPER('%s') AND password='%s'", mysqli_real_escape_string($conn, $username), mysqli_real_escape_string($conn, md5(password)));

				mysqli_query($conn, $query);

				$query = sprintf("SELECT is_admin FROM users WHERE UPPER(username)=UPPER('%s') AND password='%s'", mysqli_real_escape_string($conn, $username), mysqli_real_escape_string($conn, md5(password)));

				$result = mysqli_query($conn, $query);
				list($is_admin) = mysqli_fetch_row($result);
				if($is_admin == 1) {
					header('Location:admin.php');
				}
				else {
					header('Location:index.php');
				}
			}
		}
		else {
			$error = 'Wrong username and password combination.';
		}
	}

	$smarty->assign('error', $error);
	$smarty->display('login.tpl');
?>

<p><a href="register.php">Register</a></p>
