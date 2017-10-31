<?php
	include 'smarty.php';

	session_start();

	include 'config.php';
	include 'stats.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	$query = sprintf("SELECT id FROM users WHERE UPPER(username)=UPPER('%s')", mysqli_real_escape_string($conn, $_SESSION['username']));

	$result = mysqli_query($conn, $query);
	list($user_id) = mysqli_fetch_row($result);

	if($_POST) {
		$amount = $_POST['amount'];
		$gold = get_stat('gp', $user_id);
		$needed = get_stat('maxhp', $user_id) - get_stat('curhp', $user_id);

		if($amount > $needed || $amount == '') {
			$amount = $needed;
		}

		if($amount > $gold) {
			$amount = $gold;
		}

		set_stat('gp', $user_id, get_stat('gp', $user_id) - $amount);
		set_stat('curhp', $user_id, get_stat('curhp', $user_id) + $amount);

		$smarty->assign('healed', $amount);
	}

	$smarty->assign('curhp', get_stat('curhp', $user_id));
	$smarty->assign('maxhp', get_stat('maxhp', $user_id));
	$smarty->assign('gold', get_stat('gp', $user_id));

	$smarty->display('healer.tpl');
?>