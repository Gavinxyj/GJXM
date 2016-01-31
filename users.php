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
require_once './classpackage/Box.class.php';
if ( ! isset ( $_SESSION ['userId'] ) || empty ( $_SESSION ['userId'] ) )
{
	echo "<script>alert('timeout or logout');parent.location.href='index.php'</script>";
	exit ();
}

if ( isset ( $_GET ['active'] ) && $_GET ['active'] == "total" )
{
	User::getAllRecord ();
	$userBean = User::getBeanArray ();
	$smarty->assign( "userBean", $userBean );
	$smarty->display ( 'users.html' );
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "today")
{
	User::getAllRecord ();
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
	User::getAllRecord ();
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
else if(isset($_POST['submit']))
{
	$upSql = "update t_users set f_username = ?,f_password = ?, f_fullname = ?, f_phone = ?, f_rank = ?,f_head = ? where f_id = ?";
	$arrayBean = array($_POST['userName'],md5($_POST['pwd']),$_POST['name'],$_POST['tel'],$_POST['rank'],$_POST['boss'],$_POST['id']);
	
	$bRet = DbOperator::executeArraySql($upSql, array($arrayBean));
	
	if($bRet == true)
	{
		User::getAllRecord ();
		$userBean = User::getBeanArray ();
		$smarty->assign( "userBean", $userBean );
		$smarty->display ( 'users.html' );
	}
	else 
	{
		echo "<script>alert('修改失败');</script>";
	}
	
	
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "setRank")
{
	$beanArray = Box::getBoxbyName($_GET['id']);
	
	if(!empty($beanArray))
	{
		$smarty->assign("boxBean",$beanArray);
		$smarty->display("rank.html");
	}
	else 
	{
		echo "<script>alert('该员工名下没有可管理的光交箱!');history.back();</script>";
	}
}
?>