<?php
/**
*
*@file        road.php
*@author      xieyoujiang
*@data        2016年2月1日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once 'init.php';
require_once './classpackage/Area.class.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}

if(isset ( $_GET ['active'] ) && $_GET ['active'] == "road")
{
	$areaBean = Area::getRoadList();
	$smarty->assign( "areaBean", $areaBean );
	$smarty->display ( 'road.html' );
}
?>