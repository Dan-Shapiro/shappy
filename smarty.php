<?php
	require('smarty/Smarty.class.php');
	$smarty = new Smarty();
	
	$smarty->template_dir = "views";
	$smarty->compile_dir = "tmp";
	$smarty->cache_dir = "cache";
	$smarty->config_dir = "configs";
?>