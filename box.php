<?php
/**
*
*@file        box.php
*@author      xieyoujiang
*@data        2016年2月19日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once 'init.php';
require_once './classpackage/Box.class.php';
require_once './classpackage/Area.class.php';
require_once './classpackage/User.class.php';

if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}

if(isset ( $_GET ['active'] ) && $_GET ['active'] == "total")
{	
	$boxBean = Box::getAllBox();	
     
	$smarty->assign( "boxBean", $boxBean );
	$smarty->display ( 'box.html' );
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "addBox")
{
	$area = Area::getAreaInfo();
	$road = Area::getRoadInfo();
	$user = User::getUserInfo();
	
	$rs['area'] = $area;
	$rs['road'] = $road;
	$rs['user']	= $user;
	
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if( isset ( $_POST['submit'] ) && empty($_POST['id']) )
{
	$arrayBean = array($_POST['code'],$_POST['area'],$_POST['road'],$_POST['address'],$_POST['name'],$_POST['user'],date('Y-m-d H:i:s',time()));

	$bRet = Box::insertRecord($arrayBean);
	
	if(bRet == true)
	{
		$boxBean = Box::getAllBox();		
		$smarty->assign( "boxBean", $boxBean );
		$smarty->display ( 'box.html' );
	}
}
else if ( isset ( $_GET ['active'] ) && $_GET ['active'] == "delete" )
{
	$bRet = Box::deleteBoxById($_GET['code']);
	echo true;	
}
else if( isset ( $_GET ['active'] ) && $_GET ['active'] == "alterBox" )
{
	$area = Area::getAreaInfo();
	$road = Area::getRoadInfo();
	$user = User::getUserInfo();
	
	$box  = Box::getBoxByCode($_GET['code']);
	$rs['area'] = $area;
	$rs['road'] = $road;
	$rs['user']	= $user;
	$rs['box']  = $box;
	
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if( isset ( $_POST['submit'] ) && $_POST['id'] == "update" )
{
	$arrayBean = array($_POST['area'],$_POST['road'],$_POST['address'],$_POST['name'],$_POST['user'],$_POST['code']);

	$bRet = Box::updateBox($arrayBean);
	
	if($bRet == true)
	{
		$boxBean = Box::getAllBox();		
		$smarty->assign( "boxBean", $boxBean );
		$smarty->display ( 'box.html' );
	}
	else 
	{
		echo "<script>alert('修改失败');history.back();</script>";
	}			
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "loadInfo")
{
	$road = Area::getRoadInfo();
	$user = User::getUserInfo();
	
	$rs['road'] = $road;
	$rs['user'] = $user;
	
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if( isset ( $_POST['submit'] ) && $_POST['id'] == "sigle" )
{
	$arrayBean = array($_POST['user'],$_POST['codeValue']);
	
	$bRet = Box::changeSigleRank($arrayBean);
	
	if($bRet)
	{
		$boxBean = Box::getBoxbyName($_POST['userName']);
		$smarty->assign( "boxBean", $boxBean );
		$smarty->display ( 'rank.html' );
	}
	
}
else if( isset ( $_POST['submit'] ) && $_POST['id'] == "more" )
{
	$arrayBean = array($_POST['user'],$_POST['rank']);

	$bRet = Box::changeMoreRank($arrayBean);
	
	if($bRet == true)
	{
		$boxBean = Box::getBoxbyName($_POST['userName']);
		$smarty->assign( "boxBean", $boxBean );
		$smarty->display ( 'rank.html' );
	}
	else 
	{
		echo "<script>alert('修改失败');history.back();</script>";
	}			
}
else if( isset ( $_POST['submit'] ) && $_POST['id'] == "more" )
?>