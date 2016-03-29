<?php
/**
*
*@file        area.php
*@author      xieyoujiang
*@data        2016年1月28日
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

if(isset ( $_GET ['active'] ) && $_GET ['active'] == "total")
{
	
	$areaBean = Area::getAllAreaRecord();		
	
	$smarty->assign( "areaBean", $areaBean );
	$smarty->display ( 'area.html' );
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "ok")
{
	
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "exception")
{
	
}
else if (isset ( $_GET ['active'] ) && $_GET ['active'] == "waittingDeal")
{
	
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "alterArea")
{
	$id = $_GET['id'];		
	
	$strSql = "select f_province,f_city,f_area,f_name from t_area where f_id = '{$id}'";
	
	$rs = DbOperator::queryAll($strSql);	
	
    echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if (isset ( $_POST['submit'] ) && $_POST['func'] == "update")
{
	
	$arrayBean = array($_POST['province3'],$_POST['city3'],$_POST['area3'],$_POST['address'],$_POST['id']);

	$bRet = Area::updateInfo($arrayBean);
	
	if($bRet == true)
	{
		$areaBean = Area::getAllAreaRecord();		
	
		$smarty->assign( "areaBean", $areaBean );
		$smarty->display ( 'area.html' );
	}
	else 
	{
		echo "<script>alert('修改失败');history.back();</script>";
	}			
}
else if( isset ( $_POST['submit'] ) && empty($_POST['id']) )
{
	
	if($_POST['province3'] != "" && $_POST['city3'] != "" && $_POST['area3'] != "")
	{
		$arrayBean = array($_POST['province3'],$_POST['city3'],$_POST['area3'],$_POST['address'],date('Y-m-d H:i:s',time()));
		$bRet = Area::insertRecord($arrayBean);
	
		if(bRet == true)
		{
			$areaBean = Area::getAllAreaRecord ();
			$smarty->assign( "areaBean", $areaBean );
			$smarty->display ( 'area.html' );
		}
	}
	else
	{
		echo "<script>alert('省市区不能为空，请重新选择！');history.back();</script>";
	}	
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "delete")
{
	$bRet = Area::deleteAreaById($_GET['id']);
	
	if($bRet)
	{
		echo true;
	}
	else
	{
		echo false;
	}
}
?>