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
    	
    		$strSql = "select f_user, f_code,f_area,f_road,f_address,f_status, f_time from t_operator where f_user = '{$name}'";
    	
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
    			$box->time      = $arrayIndex['F_TIME'];
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
    		print "Error: getAllBox " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function insertRecord($arrayBean)
	{
		try
    	{   	    		
    		$insertSql = "insert into t_box(f_code,f_area,f_road,f_address,f_name,f_user,f_time)values(?,?,?,?,?,?,?)";
			
			$bRet = DbOperator::executeArraySql($insertSql, array($arrayBean));
    		
    		return $bRet;
			
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function insertAllRecord($arrayBean)
	{
		try
    	{   	    		
    		$insertSql = "insert into t_box(f_code,f_area,f_road,f_address,f_name,f_user,f_time)values(?,?,?,?,?,?,?)";
			
			$bRet = DbOperator::executeArraySql($insertSql, $arrayBean);
    		
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
    	
    		$strSql = "select f_name,f_user,f_code,f_area,f_road,f_address,f_mac from t_box where f_code = '{$code}' ";
    	
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
	
	public static function changeAreaRank($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_user = ? where f_area = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function changeRoadRank($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_user = ? where f_area = ? and f_road = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function insertBoxByAreaToOtherTable($arrayList)
	{
		try
    	{
    	
    		$strSql = "update t_box set f_user = ? where f_area = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
		    $selectBoxSql = "SELECT f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude FROM t_box WHERE f_user = '{$arrayList[0]}'";
			
			$selectOperatorSql = "select f_user,f_code from t_operator where f_user = '{$arrayList[0]}'";
			
			$userBoxCode = DbOperator::queryAll($selectBoxSql);
			
			$userOperatorCode = DbOperator::queryAll($selectOperatorSql);
			
			$insertSql = "INSERT INTO t_operator SELECT f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude FROM t_box WHERE f_user = ?";
			
		//	$rs = false;
						
			if(count($userOperatorCode) == 0)
			{
				
				$rs = DbOperator::executeArraySql($insertSql, array(array($arrayList[0])));
			}
			else
			{
				$nCount = 0;
				foreach ( $userBoxCode as $arrayBoxIndex )
				{					
					foreach($userOperatorCode as $arrayOperatorIndex)
					{
						
						if($arrayBoxIndex['F_USER'] == $arrayOperatorIndex['F_USER'] && $arrayBoxIndex['F_CODE'] == $arrayOperatorIndex['F_CODE'])
						{							
							unset($userBoxCode[$nCount]);
							
							break;
						}
					}										
					$nCount ++;
				}

				if(count($userBoxCode) != 0)
				{
					$insertSql = "insert into t_operator(f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
					
					$inserArray = array();
					foreach($userBoxCode as $arrayIndex)
					{
						$arrayBean = array();
						$arrayBean[] = $arrayIndex['F_USER'];
						$arrayBean[] = $arrayIndex['F_CODE'];
						$arrayBean[] = $arrayIndex['F_AREA'];
						$arrayBean[] = $arrayIndex['F_ROAD'];
						$arrayBean[] = $arrayIndex['F_ADDRESS'];
						$arrayBean[] = $arrayIndex['F_COLLECTOR'];
						$arrayBean[] = $arrayIndex['f_index'];
						$arrayBean[] = $arrayIndex['f_standard'];
						$arrayBean[] = $arrayIndex['f_value'];
						$arrayBean[] = $arrayIndex['f_channel'];
						$arrayBean[] = $arrayIndex['f_status'];
						$arrayBean[] = $arrayIndex['f_time'];
						$arrayBean[] = $arrayIndex['f_mac'];
						$arrayBean[] = $arrayIndex['f_name'];
						$arrayBean[] = $arrayIndex['f_longitude'];
						$arrayBean[] = $arrayIndex['f_latitude'];
						
						
						$inserArray[] = $arrayBean;
					}
		
					$rs = DbOperator::executeArraySql($insertSql, $inserArray);
				}
			}
			
			return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function insertBoxByRoadToOtherTable($arrayList)
	{
		try
    	{
    	
    		$strSql =  "update t_box set f_user = ? where f_area = ? and f_road = ?";			
    	
    		$rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
			 $selectBoxSql = "SELECT f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude FROM t_box WHERE f_user = '{$arrayList[0]}'";
			
			$selectOperatorSql = "select f_user,f_code from t_operator where f_user = '{$arrayList[0]}'";
			
			$userBoxCode = DbOperator::queryAll($selectBoxSql);
			
			$userOperatorCode = DbOperator::queryAll($selectOperatorSql);
			
    		$insertSql = "INSERT INTO t_operator SELECT f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude FROM t_box WHERE f_area = ? and f_road = ?";
			
			if(count($userOperatorCode) == 0)
			{
				
				$rs = DbOperator::executeArraySql($insertSql, array(array($arrayList[1],$arrayList[2])));
			}
			else
			{
				$nCount = 0;
				foreach ( $userBoxCode as $arrayBoxIndex )
				{					
					foreach($userOperatorCode as $arrayOperatorIndex)
					{
						
						if($arrayBoxIndex['F_USER'] == $arrayOperatorIndex['F_USER'] && $arrayBoxIndex['F_CODE'] == $arrayOperatorIndex['F_CODE'])
						{							
							unset($userBoxCode[$nCount]);
							
							break;
						}
					}										
					$nCount ++;
				}

				if(count($userBoxCode) != 0)
				{
					$insertSql = "insert into t_operator(f_user,f_code,f_area,f_road,f_address,f_collector,f_index,f_standard,f_value,f_channel,f_status,f_time,f_mac,f_name,f_longitude,f_latitude) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
					
					$inserArray = array();
					foreach($userBoxCode as $arrayIndex)
					{
						$arrayBean = array();
						$arrayBean[] = $arrayIndex['F_USER'];
						$arrayBean[] = $arrayIndex['F_CODE'];
						$arrayBean[] = $arrayIndex['F_AREA'];
						$arrayBean[] = $arrayIndex['F_ROAD'];
						$arrayBean[] = $arrayIndex['F_ADDRESS'];
						$arrayBean[] = $arrayIndex['F_COLLECTOR'];
						$arrayBean[] = $arrayIndex['f_index'];
						$arrayBean[] = $arrayIndex['f_standard'];
						$arrayBean[] = $arrayIndex['f_value'];
						$arrayBean[] = $arrayIndex['f_channel'];
						$arrayBean[] = $arrayIndex['f_status'];
						$arrayBean[] = $arrayIndex['f_time'];
						$arrayBean[] = $arrayIndex['f_mac'];
						$arrayBean[] = $arrayIndex['f_name'];
						$arrayBean[] = $arrayIndex['f_longitude'];
						$arrayBean[] = $arrayIndex['f_latitude'];
						
						
						$inserArray[] = $arrayBean;
					}
		
					$rs = DbOperator::executeArraySql($insertSql, $inserArray);
				}
			}
			
			
			return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	public static function getBoxPos()
	{
		try
    	{
    	
    		$strSql = "select f_user,f_code,f_address,f_longitude,f_latitude from t_box";			
    	
    		$rs = DbOperator::queryAll($strSql);
          
    		return $rs;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
}

?>