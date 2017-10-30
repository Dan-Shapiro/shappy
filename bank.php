<?php
	include 'smarty.php';

	session_start();

	include 'config.php';
	include 'stats.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	$query = sprintf("SELECT id FROM users WHERE UPPER(username) = UPPER('%s')", mysqli_Real_escape_string($conn, $_SESSION['username']));

	$result = mysqli_query($conn, $query);
	list($user_id) = mysqli_fetch_row($result);

	$gold = get_stat('gp', $user_id);
	if($_POST) {
		$amount = $_POST['amount'];
		if($_POST['action'] == 'Deposit') {
			if($amount > $gold || $amount == '') {
				$amount = $gold;
			}

			set_stat('gp', $user_id, get_stat('gp', $user_id) - $amount);
			set_stat('bankgp', $user_id, get_stat('bankgp', $user_id) + $amount);
			$smarty->assign('deposited', $amount);
		}
		else {
			$bank_gold = get_stat('bankgp', $user_id);
			if($amount > $bank_gold || $amount == '') {
				$amount = $bank_gold;
			}

			set_stat('gp', $user_id, get_stat('gp', $user_id) + $amount);
			set_stat('bankgp', $user_id, get_stat('bankgp', $user_id) - $amount);
			$smarty->assign('withdrawn', $amount);
		}
	}

	$smarty->assign('gold', get_stat('gp', $user_id));
	$smarty->assign('inbank', get_stat('bankgp', $user_id));

	$smarty->display('bank.tpl');
?>
