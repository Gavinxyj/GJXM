<?php
/**
 *
 *@file        Head.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
 require_once 'Db.class.php';
class Head
{
	private $id			= "";
	
	private $fullName	= "";
	
	private $phone		= "";
	
	private $boss		= "";
	
	private $time		= "";
	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @return the $fullName
	 */
	public function getFullName ()
	{
		return $this->fullName;
	}

	/**
	 * @return the $phone
	 */
	public function getPhone ()
	{
		return $this->phone;
	}

	/**
	 * @return the $boss
	 */
	public function getBoss ()
	{
		return $this->boss;
	}

	/**
	 * @return the $time
	 */
	public function getTime ()
	{
		return $this->time;
	}

	/**
	 * @param string $id
	 */
	public function setId ( $id )
	{
		$this->id = $id;
	}

	/**
	 * @param string $fullName
	 */
	public function setFullName ( $fullName )
	{
		$this->fullName = $fullName;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone ( $phone )
	{
		$this->phone = $phone;
	}

	/**
	 * @param string $boss
	 */
	public function setBoss ( $boss )
	{
		$this->boss = $boss;
	}

	/**
	 * @param string $time
	 */
	public function setTime ( $time )
	{
		$this->time = $time;
	}
	
	public static function getSecutity()
	{
		try 
    	{	
    		
    		$strSql = "select f_id,f_fullname,f_phone,f_boss,f_time from t_head where f_boss = 0";
    		
    		$rs = DbOperator::queryAll($strSql);
    		
    		$count = 0;
    		
			$beanArray = array();
			
    		foreach ( $rs as $arrayIndex )
    		{    			
    			 $head = new Head();
    			 
    			 $head->id		  = $arrayIndex['F_ID'];	
    			 $head->fullName  = $arrayIndex['F_FULLNAME'];
    			 $head->phone     = $arrayIndex['F_PHONE'];   				
    			 $head->time      = $arrayIndex['F_TIME'];
    			 $head->boss	  = $arrayIndex['F_BOSS'];
    			 $beanArray[$count++]= $head;
    		}
    		return $beanArray;
    	} catch (Exception $e) 
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function getHead()
	{
		try 
    	{	
    		
    		$strSql = "select f_id,f_fullname,f_phone,f_boss,f_time from t_head where f_boss > 0";
    		
    		$rs = DbOperator::queryAll($strSql);
    		
    		$count = 0;
    		
			$beanArray = array();
			
    		foreach ( $rs as $arrayIndex )
    		{    			
    			 $head = new Head();
    			 
    			 $head->id		  = $arrayIndex['F_ID'];	
    			 $head->fullName  = $arrayIndex['F_FULLNAME'];
    			 $head->phone     = $arrayIndex['F_PHONE'];   				
    			 $head->time      = $arrayIndex['F_TIME'];
    			 $head->boss	  = $arrayIndex['F_BOSS'];
    			 $beanArray[$count++]= $head;
    		}
    		return $beanArray;
    	} catch (Exception $e) 
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
}

?>