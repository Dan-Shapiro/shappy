<?php
	include 'smarty.php';

	session_start();
	$smarty->assign('name', $_SESSION['username']);

	$smarty->display('index.tpl');
?>