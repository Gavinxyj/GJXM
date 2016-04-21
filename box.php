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
	
	$handle = @fopen("./version.txt", "r");
	if ($handle) 
	{
		while (!feof($handle)) 
		{
			$buffer = fgets($handle, 4096);
			$version[] = $buffer;
		}
		fclose($handle);
	}
	try
	{
		$querySql = "SELECT max( f_id ) AS max FROM t_box";
		
		$max = DbOperator::queryAll($querySql);
	} 
	catch (Exception $e)
	{
		print "Error: " . $e->getMessage() . "<br/>";
		die();
	}
	$rs['code'] = sprintf("%08d", 1 + $max[0]['MAX']);
	$rs['area'] = $area;
	$rs['road'] = $road;
	$rs['user']	= $user;
	$rs['version'] = $version;
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if( isset ( $_POST['submit'] ) && empty($_POST['id']) )
{
	
	$preCode = $_POST['preName'];
	$midCode = $_POST['code'];
	$version = $_POST['version'];
	
	if($preCode != "" && $midCode != "" && $version != "")
	{
		$arrayBean = array($preCode.$midCode.$version,$_POST['area'],$_POST['road'],$_POST['address'],$_POST['name'],$_POST['user'],date('Y-m-d H:i:s',time()));
	
		$bRet = Box::insertRecord($arrayBean);
		
		if(bRet == true)
		{
			$boxBean = Box::getAllBox();		
			$smarty->assign( "boxBean", $boxBean );
			$smarty->display ( 'box.html' );
		}
	}
	else
	{
		echo "<script>alert('序列码不能为空！');history.back();</script>";
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
	
	$handle = @fopen("./version.txt", "r");
	if ($handle) 
	{
		while (!feof($handle)) 
		{
			$buffer = fgets($handle, 4096);
			$version[] = $buffer;
		}
		fclose($handle);
	}
	
	$box  = Box::getBoxByCode($_GET['code']);
	
	$rs['area'] = $area;
	$rs['road'] = $road;
	$rs['user']	= $user;
	$rs['box']  = $box;
	$rs['version'] = $version;
	
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
else if( isset ( $_POST['submit'] ) && $_POST['id'] == "update" )
{
	//$preCode = $_POST['preName'];
	$code = $_POST['code'];
	//$midCode = substr($tempPre,2);
	
//	$tempMid = substr($midCode,0,strlen($midCode) - 8 );
	
//	$version = $_POST['version'];
	
	if($code != "")
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
				
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "loadInfo")
{
	$area = Area::getAreaInfo();
	$road = Area::getRoadInfo();
	$user = User::getUserInfo();
	
	$rs['road'] = $road;
	$rs['user'] = $user;
	$rs['area'] = $area;
	
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
	
	if($_POST['authorization'] == '区域授权')
	{
		$arrayBean = array($_POST['user'],$_POST['area']);

		$bRet = Box::changeAreaRank($arrayBean);
		
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
	else if($_POST['authorization'] == '道路授权')
	{
		$arrayBean = array($_POST['user'],$_POST['area'],$_POST['selectRoad']);

		$bRet = Box::changeRoadRank($arrayBean);
		
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
	
}
else if(isset ( $_POST['submit'] ) && $_POST['id'] == "rankMulti")
{
	if($_POST['authorization'] == '区域授权')
	{
		$arrayBean = array($_POST['userSegment'],$_POST['areaSegment']);

		$bRet = Box::insertBoxByAreaToOtherTable($arrayBean);
		
		if($bRet == true)
		{
			echo "<script>alert('授权成功');history.back();</script>";
		}
		else 
		{
			echo "<script>alert('修改失败');history.back();</script>";
		}			
	}
	else if($_POST['authorization'] == '道路授权')
	{
		$arrayBean = array($_POST['userSegment'],$_POST['areaSegment'],$_POST['selectRoad']);

		$bRet = Box::insertBoxByRoadToOtherTable($arrayBean);
		
		if($bRet == true)
		{
			echo "<script>alert('授权成功');history.back();</script>";
		}
		else 
		{
			echo "<script>alert('修改失败');history.back();</script>";
		}	
	}
}
else if(isset ( $_GET ['active'] ) && $_GET ['active'] == "map")
{
	$box  = Box::getBoxPos();
	
	$rs['map'] = $box;
	
	echo json_encode($rs, JSON_UNESCAPED_UNICODE);
}
?>