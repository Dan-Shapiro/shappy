<?php
	include 'smarty.php';

	session_start();
	$smarty->assign('name', $_SESSION['username']);

	include 'config.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	$query = sprintf("SELECT id FROM users WHERE UPPER(username)=UPPER('%s')", mysqli_real_escape_string($conn, $_SESSION['username']));

	$result = mysqli_query($conn, $query);
	list($user_id) = mysqli_fetch_row($result);

	include 'stats.php';
	$smarty->assign('attack', get_stat('atk', $user_id));
	$smarty->assign('magic', get_stat('mag', $user_id));
	$smarty->assign('defence', get_stat('def', $user_id));
	$smarty->assign('gold', get_stat('gp', $user_id));

	$smarty->display('index.tpl');
?>