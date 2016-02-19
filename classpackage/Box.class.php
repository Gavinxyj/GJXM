<?php
/**
 *
 *@file        Box.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
require_once 'Db.class.php';
class Box
{
    private $id         = "";
    
    private $user       = "";
    
    private $code       = "";
    
    private $area       = "";
    
    private $road       = "";
    
    private $address    = "";
    
    private $collector  = "";
    
    private $index      = "";
    
    private $standard   = "";
    
    private $value      = "";
    
    private $channel    = "";
    
    private $status     = "";
    
    private $time       = "";
	
	private $mac		= "";
	
	private $name		= "";
 /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

 /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

 /**
     * @return the $code
     */
    public function getCode()
    {
        return $this->code;
    }

 /**
     * @return the $area
     */
    public function getArea()
    {
        return $this->area;
    }

 /**
     * @return the $road
     */
    public function getRoad()
    {
        return $this->road;
    }

 /**
     * @return the $address
     */
    public function getAddress()
    {
        return $this->address;
    }

 /**
     * @return the $collector
     */
    public function getCollector()
    {
        return $this->collector;
    }

 /**
     * @return the $index
     */
    public function getIndex()
    {
        return $this->index;
    }

 /**
     * @return the $standard
     */
    public function getStandard()
    {
        return $this->standard;
    }

 /**
     * @return the $value
     */
    public function getValue()
    {
        return $this->value;
    }

 /**
     * @return the $channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

 /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

 /**
     * @return the $time
     */
    public function getTime()
    {
        return $this->time;
    }

 /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

 /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

 /**
     * @param string $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

 /**
     * @param string $road
     */
    public function setRoad($road)
    {
        $this->road = $road;
    }

 /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

 /**
     * @param string $collector
     */
    public function setCollector($collector)
    {
        $this->collector = $collector;
    }

 /**
     * @param string $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

 /**
     * @param string $standard
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
    }

 /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

 /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

 /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

 /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
	
	public function setMac($mac)
	{
		$this->mac = $mac;
	}
	
	public function getMac()
	{
		return $this->mac;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
    public static function getBoxbyName($name)
    {
    	try
    	{
    	
    		$strSql = "select f_id,f_user,f_code,f_area,f_road,f_address,f_status from t_box where f_user = '{$name}'";
    	
    		$rs = DbOperator::queryAll($strSql);
    		
    		$beanArray = array();
    		$count = 0;
    		foreach ( $rs as $arrayIndex )
    		{
    			$box = new Box();
    			
    			$box->id		= (1 + $count);
    			$box->code		= $arrayIndex['F_CODE'];
    			$box->address	= $arrayIndex['F_ADDRESS'];
    			if($arrayIndex['F_STATUS'] == 0)
    			{
    				$box->status = "<strong>关闭</strong>";
    			}
    			else 
    			{
    				$box->status	= "<strong style = 'color:red'>打开</strong>";
    			}
    			$box->user		= $arrayIndex['F_USER'];
    			$box->area		= $arrayIndex['F_AREA'];
    			$box->road		= $arrayIndex['F_ROAD'];
    			
    			$beanArray[$count++] = $box;
    		}
    		
    		return $beanArray;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
    }
	
	public static function deleteBoxById($id)
	{
		try
    	{
    	
    		$strSql = "delete from t_box where t_box.f_code=?";
    	
    		$bRet = DbOperator::executeArraySql($strSql,array(array($id)));
    		
    		
    		return $bRet;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function getAllBox()
	{
		try
    	{
    	
    		$strSql = "select f_id,f_name,f_user,f_code,f_area,f_road,f_address,f_standard,f_value,f_channel,f_status,f_mac from t_box";
    	
    		$rs = DbOperator::queryAll($strSql);
    		
			$count = 0;
			
			$beanArray = array();
			
			foreach ( $rs as $arrayIndex )
    		{   			
    			$box = new Box();    			     			    			 
    			$box->id		= $arrayIndex['F_ID'];
				$box->user		= $arrayIndex['F_USER'];
				$box->code		= $arrayIndex['F_CODE'];
				$box->area		= $arrayIndex['F_AREA'];
				$box->road		= $arrayIndex['F_ROAD'];
				$box->address	= $arrayIndex['F_ADDRESS'];
				$box->standard	= $arrayIndex['F_STANDARD'];
				$box->value		= $arrayIndex['F_VALUE'];
				$box->channel	= $arrayIndex['F_CHANNEL'];
				$box->status	= $arrayIndex['F_STATUS'];
				$box->mac		= $arrayIndex['F_MAC'];
				$box->name		= $arrayIndex['F_NAME'];
				
				$beanArray[$count++]= $box;
    		}
    		
    		return $beanArray;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function insertRecord($arrayBean)
	{
		try
    	{   	    		
    		$insertSql = "insert into t_box(f_code,f_area,f_road,f_address,f_name,f_user)values(?,?,?,?,?,?)";
			
			$bRet = DbOperator::executeArraySql($insertSql, array($arrayBean));
    		
    		return $bRet;
			
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function getBoxByCode($code)
	{
		try
    	{
    	
    		$strSql = "select f_id,f_name,f_user,f_code,f_area,f_road,f_address,f_mac from t_box where f_code = '{$code}' ";
    	
    		$rs = DbOperator::queryAll($strSql);    		
    		
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function updateBox($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_area = ?,f_road = ?,f_address = ?,f_name = ?,f_user = ? where f_code = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function changeSigleRank($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_user = ? where f_code = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function changeMoreRank($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_user = ? where f_name = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
}

?>