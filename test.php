<?php
/**
*
*@file        test.php
*@author      xieyoujiang
*@data        2016年1月26日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once 'init.php';
require_once './classpackage/Pages.class.php';

	$page = new Pages(999 , 1 , 10 , 6 , '?' );
	$page->__getpagelist();
	$smarty->assign("page",$page->result);
	$smarty->display("pages.html");
?>