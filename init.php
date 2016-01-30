<?php
/**
 *
 *@file        init.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require_once(dirname(dirname(__FILE__)).'/GJXM/smarty/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->template_dir = dirname(__FILE__)."/templates";
	$smarty->compile_dir  = dirname(__FILE__)."/templates_c";
	$smarty->config_dir   = dirname(__FILE__)."/configs";
	$smarty->caching = 0;
	
?>
