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
		foreach($objWorksheet->getRowIterator() as $row)
		{
			$count ++;
			if($count == 1) continue;
			
			$beanRow = array();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
			foreach($cellIterator as $cell)
			{
				$beanRow[]=$cell->getValue();				
			}
			
			$beanRow[] = date('Y-m-d H:i:s',time());
			
			$beanArray[] = $beanRow;
		} 
	 }
	 
	if(!empty($beanArray))
	{
		$result = Box::insertAllRecord($beanArray);
		
		
		if($result)
		{
			echo count($beanArray)."条记录插入数据库成功！";
		}
		else 
		{
			echo "记录插入失败!";
		}
	}
	
}
?>