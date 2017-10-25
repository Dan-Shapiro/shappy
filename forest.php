<?php
	include 'smarty.php';

	$smarty->assign('won', 0);
	$smarty->assign('lost', 0);
	$smarty->assign('combat', "");

	session_start();

	include 'config.php';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

	if($_POST) {
		if($_POST['action'] == 'Attack') {
			include 'stats.php';
			include 'monster_stats.php';

			$query = sprintf("SELECT id FROM users WHERE UPPER(username)=UPPER('%s')", mysqli_real_escape_string($conn, $_SESSION['username']));

			$result = mysqli_query($conn, $query);
			list($user_id) = mysqli_fetch_row($result);

			$player = array(
				'name' => $_SESSION['username'],
				'attack' => get_stat('atk', $user_id),
				'defence' => get_stat('def', $user_id),
				'curhp' => get_stat('curhp', $user_id)
			);

			$query = sprintf("SELECT id FROM monsters WHERE name='%s'", mysqli_real_escape_string($conn, $_POST['monster']));

			$result = mysqli_query($conn, $query);
			list($monster_id) = mysqli_fetch_row($result);

			$monster = array(
				'name' => $_POST['monster'],
				'attack' => get_monster_stat('atk', $monster_id),
				'defence' => get_monster_stat('def', $monster_id),
				'curhp' => get_monster_stat('curhp', $monster_id)
			);

			$combat = array();
			$turns = 0;

			while ($player['curhp'] > 0 && $monster['curhp'] > 0) {
				if($turns % 2 != 0) {
					$attacker = &$monster;
					$defender = &$player;
				}
				else {
					$attacker = &$player;
					$defender = &$monster;
				}

				$damage = 0;
				if($attacker['attack'] > defender['defence']) {
					$damage = $attacker['attack'] - $defender['defence'];
				}

				$defender['curhp'] -= $damage;

				$combat[$turns] = array(
					attacker => $attacker['name'],
					defender => $defender['name'],
					damage => $damage
				);

				$turns++;
			}

			set_stat('curhp', $user_id, $player['curhp']);

			if($player['curhp'] > 0) {
				set_stat('gp', $user_id, get_stat('gp', $user_id) + get_monster_stat('gp', $monster_id));
				$smarty->assign('won', 1);
				$smarty->assign('gold', get_monster_stat('gp', $monster_id));
			}
			else {
				$smarty->assign('lost', 1);
			}

			$smarty->assign('combat', $combat);
		}
		else {
			header('Location:index.php');
		}
	}
	else {
		$query = sprintf("SELECT name FROM monsters ORDER BY RAND() LIMIT 1");

		$result = mysqli_query($conn, $query);
		list($monster) = mysqli_fetch_row($result);

		$smarty->assign('monster', $monster);
	}

	$smarty->display('forest.tpl');
?>
