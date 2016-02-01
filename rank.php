<?php
/**
*
*@file        rank.php
*@author      xieyoujiang
*@data        2016年2月01日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once 'init.php';
require_once './classpackage/Rank.class.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}
if ( isset ( $_GET ['active'] ) && $_GET ['active'] == "rank" )
{
	$rankBean = Rank::getAllRecord ();
	$arrayType_1 = array();
	$arrayType_2 = array();
	$arrayType_3 = array();
	foreach ( $rankBean as $arrayIndex )
    {
		if($arrayIndex->getType() == 1)
		{
			$arrayType_1[] = $arrayIndex;
		}
		else if($arrayIndex->getType() == 2)
		{
			$arrayType_2[] = $arrayIndex;
		}
		else if($arrayIndex->getType() == 3)
		{
			$arrayType_3[] = $arrayIndex;
		}
	}
	
	
	$smarty->assign( "rankBean_1", $arrayType_1 );
	$smarty->assign( "rankBean_2", $arrayType_2 );
	$smarty->assign( "rankBean_3", $arrayType_3 );
	$smarty->display ( 'rankView.html' );
}
?>