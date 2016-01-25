<?php
/**
 *
 *@file        index.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
    require_once './init.php';
	require_once './classpackage/User.class.php';
	
	if(isset($_SESSION['userId']) && isset($_SESSION['rank']))
	{	
		if($_SESSION['rank']=="1")//系统管理员
		{
			$smarty->display('welcome.html');
		}
		else if($_SESSION['rank']=="2")//操作员
		{
			header("location:worker.php");
		}
		else
		{
			header("location:select.php");//管理员
		}
		exit;
	}
	
	if(isset($_POST['login']))
	{
		require_once(dirname(dirname(__FILE__)).'/lib/cls_captcha.php');
		
	/*	$validator = new captcha();
		if (!$validator->check_word($_POST['captcha']))
		{
			echo "<script>alert('captcha error!');history.back();</script>";
			exit;
		}*/
		//
		
		$bRet = User::checkLogin($_POST['userId'], $_POST['pwd']);
		
		if( $bRet == true )
		{
		    $arrayList = array(date('Y-m-d H:i:s',time()),date('Y-m-d H:i:s',time()),$_SERVER['REMOTE_ADDR'], $_POST['userId']);
		    
		    $bRet = User::updataStatus($arrayList);
		    
		    if($bRet == true)
		    {
		    	$userRecord = User::getAllRecord();
		    	
		    	$smarty->assign("userRecord",$userRecord);
		        $smarty->display('welcome.html');
		    }
		}
		else 
		{
		    echo "<script lanugage='javascript'>alert('用户名密码错误');history.back();</script>";
		    $smarty->display('login.html');
		}
	}
	else
	{
		$smarty->display('login.html');
	}
    
?>
