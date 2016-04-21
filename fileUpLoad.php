<?php
/**
*
*@file        fileUpLoad.php
*@author      xieyoujiang
*@data        2016年2月29日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
require_once './Classes/PHPExcel/IOFactory.php';
 require_once './classpackage/Box.class.php';
if($_FILES['fileUpLoad']['error']==0)
{
	 $uploadFileName=$_FILES['fileUpLoad']['name'];
	 $uploadFileTemp=$_FILES['fileUpLoad']['tmp_name'];
	 $uploadFileTrue='./upload/';
	 $bRet = move_uploaded_file($uploadFileTemp,$uploadFileTrue.$uploadFileName);
	 $beanArray = array();
	
	if($bRet)
	 {
		$objReader = PHPExcel_IOFactory::createReaderForFile($uploadFileTrue.$uploadFileName);
		$objPHPExcel = $objReader->load($uploadFileTrue.$uploadFileName);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		
		$count = 0;
		
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
	    $max = $max[0]['MAX'];
		foreach($objWorksheet->getRowIterator() as $row)
		{
			$count ++;
			$max ++;
			if($count == 1) continue;
			
			$beanRow = array();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
			
			$flag = 0;
			foreach($cellIterator as $cell)
			{
				if($flag == 0)
				{
					$preName = $cell->getValue();
					$flag ++;					
					continue;
				}
				if($flag == 1)
				{
					$version = $cell->getValue();
					$code = sprintf("%08d", $max);
					$beanRow[] = $preName.$code.$version;
					$flag ++;
					continue;
				}
				
				
				$beanRow[]=$cell->getValue();				
			}
			
			$beanRow[] = date('Y-m-d H:i:s',time());
			
		//	$data = date('YmdHis',time()) + 1;
			
		//	$beanRow[0] = $beanRow[0].$data;
			
			$beanArray[] = $beanRow;
		} 
	 }
	
	if(!empty($beanArray))
	{
		$result = Box::insertAllRecord($beanArray);
		
		if($result)
		{
			$rowNum['row'] = $beanArray;
			$rowNum['count'] = count($beanArray)."条记录插入数据库成功！";
			echo json_encode($rowNum, JSON_UNESCAPED_UNICODE);
		}
		else 
		{
			echo "记录插入失败!";
		}
	}
	
}
?>