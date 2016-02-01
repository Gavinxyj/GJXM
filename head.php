<?php
/**
*
*@file        head.php
*@author      xieyoujiang
*@data        2016年2月1日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once 'init.php';
require_once './classpackage/Head.class.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}	

if(isset ( $_GET ['active'] ) && $_GET ['active'] == "secutity")
{
	$headBean = Head::getSecutity();
	$smarty->assign( "headBean", $headBean );
	$smarty->display ( 'security.html' );
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "head")
{
	$headBean = Head::getHead();
	$smarty->assign( "headBean", $headBean );
	$smarty->display ( 'security.html' );
}
?>