<?php
/**
*
*@file        collector.php
*@author      xieyoujiang
*@data        2016年1月29日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once './init.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}

if ( isset ( $_GET ['active'] ) && $_GET ['active'] == "total" )
{
	$collectorBean = Collector::getBeanArray ();
	
	$smarty->assign( "collectorBean", $collectorBean );
	$smarty->display ( 'collector.html' );
}
?>