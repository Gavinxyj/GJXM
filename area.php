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
	
	$totalBean = array();
	
	$count = 0;
	
	foreach ($areaBean as $arrayIndex)
	{
 		if($arrayIndex->getParent() == 0)
 		{
 			$totalBean[$count++] = $arrayIndex; 
 		}
	}
	
	$smarty->assign( "areaBean", $totalBean );
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
	$name = $_GET['name'];		
	
	$strSql = "select f_parent,f_name,f_fullname,f_phone,f_time from t_area where f_name = '{$name}'";
	
	$rs = DbOperator::queryAll($strSql);	
	
    echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
?>