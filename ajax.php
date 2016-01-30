<?php
/**
*
*@file        ajax.php
*@author      xieyoujiang
*@data        2016年1月30日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once './classpackage/Db.class.php';
if(isset($_GET['id']))
{
	
	$strUserSql = "select f_username,f_password,f_fullname,f_phone,f_rank,f_head,f_head_phone,f_boss_phone,f_time,f_last_login,f_last_ip,f_last_time from t_users where f_id = ? order by f_id";
	
	$strRankSql = "select f_id,f_title from t_rank where f_type=1";
	
	$strBossSql = "select f_id,f_fullname from t_head where f_boss>0";
	
	$rsUser = DbOperator::querySql($strUserSql,array($_GET['id']));
	
	$rsRank = DbOperator::queryAll($strRankSql);
	
	$rsBoss = DbOperator::queryAll($strBossSql);
	
	
	$rsUser['rank'] = $rsRank;
	$rsUser['boss'] = $rsBoss;
	
	
	echo json_encode($rsUser, JSON_UNESCAPED_UNICODE);
}
?>