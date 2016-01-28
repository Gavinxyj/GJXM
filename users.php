<?php
/**
 *
 *@file        users.php
 *@author      xieyoujiang
 *@data        2016年1月27日
 *@language    PHP
 *@e-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
require_once './init.php';
require_once './classpackage/User.class.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}

if ( isset ( $_GET ['active'] ) && $_GET ['active'] == "total" )
{
	$userBean = User::getBeanArray ();
	$smarty->assign( "userBean", $userBean );
	$smarty->display ( 'users.html' );
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "today")
{
	$arrayBean = User::getBeanArray ();
	
	$todayBean = array();
	$count = 0;
	
	foreach ($arrayBean as $arrayIndex)
	{
 		if(trim(substr($arrayIndex->getLastLogin(), 0, 10)) == date('Y-m-d',time()))
		{
			$todayBean[$count ++] = $arrayIndex;
		}
	}
	$smarty->assign( "todayBean", $todayBean );
	$smarty->display ( 'todayLogin.html' );
}
else if (isset ( $_GET ['active'] ) && $_GET ['active'] == "owner")
{
	$userBean = User::getBeanArray ();
	$ownerBean = array();
	$count = 0;
	foreach ($userBean as $arrayIndex)
	{
		if($arrayIndex->getRank() == 1 || $arrayIndex->getRank() == 3)
		{
			$ownerBean[$count ++] = $arrayIndex;
		}
	}
	
	$smarty->assign( "ownerBean", $ownerBean );
	$smarty->display ( 'users.html' );
	
}
?>