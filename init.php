<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require_once(dirname(dirname(__FILE__)).'/GJXMS/smarty/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->template_dir = dirname(__FILE__)."/templates";
	$smarty->compile_dir  = dirname(__FILE__)."/templates_c";
	$smarty->config_dir   = dirname(__FILE__)."/configs";
	$smarty->left_delimiter = '<{';
	$smarty->right_delimiter= '}>';
	$smarty->caching = 0;
?>
