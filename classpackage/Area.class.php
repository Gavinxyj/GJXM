<?php
/**
 *
 *@file        Area.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
require_once 'Db.class.php';
class Area
{

	private $id 		= "";

	private $parent 	= "";

	private $name 		= "";

	private $fullName 	= "";

	private $phone 		= "";

	private $time 		= "";

	private $province	= "";
	
	private $city		= "";
	
	private $area		= "";
	/**
	 *
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 *
	 * @return the $parent
	 */
	public function getParent ()
	{
		return $this->parent;
	}

	/**
	 *
	 * @return the $name
	 */
	public function getName ()
	{
		return $this->name;
	}

	/**
	 *
	 * @return the $fullName
	 */
	public function getFullName ()
	{
		return $this->fullName;
	}

	/**
	 *
	 * @return the $phone
	 */
	public function getPhone ()
	{
		return $this->phone;
	}

	/**
	 *
	 * @return the $time
	 */
	public function getTime ()
	{
		return $this->time;
	}

	/**
	 *
	 * @param string $id        	
	 */
	public function setId ( $id )
	{
		$this->id = $id;
	}

	/**
	 *
	 * @param string $parent        	
	 */
	public function setParent ( $parent )
	{
		$this->parent = $parent;
	}

	/**
	 *
	 * @param string $name        	
	 */
	public function setName ( $name )
	{
		$this->name = $name;
	}

	/**
	 *
	 * @param string $fullName        	
	 */
	public function setFullName ( $fullName )
	{
		$this->fullName = $fullName;
	}

	/**
	 *
	 * @param string $phone        	
	 */
	public function setPhone ( $phone )
	{
		$this->phone = $phone;
	}

	/**
	 *
	 * @param string $time        	
	 */
	public function setTime ( $time )
	{
		$this->time = $time;
	}
	
	/**
	 * @return the $province
	 */
	public function getProvince ()
	{
		return $this->province;
	}

	/**
	 * @param string $province
	 */
	public function setProvince ( $province )
	{
		$this->province = $province;
	}

	/**
	 * @return the $city
	 */
	public function getCity ()
	{
		return $this->city;
	}

	/**
	 * @param string $city
	 */
	public function setCity ( $city )
	{
		$this->city = $city;
	}

	/**
	 * @return the $area
	 */
	public function getArea ()
	{
		return $this->area;
	}

	/**
	 * @param string $area
	 */
	public function setArea ( $area )
	{
		$this->area = $area;
	}

	public static function getAllAreaRecord()
	{
		try
		{
			$strSql = "select f_id, f_province,f_city,f_area,f_name,f_fullname,f_phone,f_time from t_area order by f_id";
		
			$rs = DbOperator::queryAll($strSql);
		
			$count = 0;
			
			$beanArray = array();
			
			foreach ( $rs as $arrayIndex )
			{
				$area = new Area();
				
				$area->id		 = $arrayIndex['F_ID'];
				
				$area->province  = $arrayIndex['F_PROVINCE'];
				$area->city		 = $arrayIndex['F_CITY'];
				$area->area		 = $arrayIndex['F_AREA'];
				$area->name 	 = $arrayIndex['F_NAME'];
				$area->fullName  = $arrayIndex['F_FULLNAME'];
				$area->phone     = $arrayIndex['F_PHONE'];
				$area->time      = $arrayIndex['F_TIME'];
		
				$beanArray[$count++]= $area;
			}
			
			return $beanArray;
		
		} catch (Exception $e)
		{
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function getRoadList()
	{
		try
		{
			$strSql = "SELECT t_area.f_id,t_area.f_name,t.f_name AS f_parent,t_area.f_time FROM t_area JOIN (SELECT * FROM t_area WHERE f_parent=0) t ON t_area.f_parent=t.f_id WHERE t_area.f_parent<>0 ORDER BY t_area.f_id";
		
			$rs = DbOperator::queryAll($strSql);
		
			$count = 0;
			
			$beanArray = array();
			
			foreach ( $rs as $arrayIndex )
			{
				$area = new Area();
				
				$area->id		= $arrayIndex['F_ID'];
				$area->name 	= $arrayIndex['F_NAME'];
				$area->parent   = $arrayIndex['F_PARENT'];
				$area->time	    = $arrayIndex['F_TIME'];		
				$beanArray[$count++]= $area;
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
			$insertSql = "insert into t_area(f_province,f_city,f_area,f_name,f_time)values(?,?,?,?,?)";
    	
    		$bRet = DbOperator::executeArraySql($insertSql, array($arrayBean));
    		
    		return $bRet;
		
		} catch (Exception $e)
		{
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function getAreaInfo()
	{
		try
		{
			$strSql = "SELECT DISTINCT f_area FROM t_area";
    	
    		$rs = DbOperator::queryAll($strSql);
    		
    		return $rs;
		
		} catch (Exception $e)
		{
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function getRoadInfo()
	{
		try
		{
			$strSql = "SELECT DISTINCT f_name FROM t_area";
    	
    		$rs = DbOperator::queryAll($strSql);
    		
    		return $rs;
		
		} catch (Exception $e)
		{
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function updateInfo($arrayBean)
	{
		try
        {
            $strSql = "update t_area set f_province=? ,f_city= ? ,f_area= ?, f_name = ? where f_id=?";
        
            $rs = DbOperator::executeArraySql($strSql, array($arrayBean));
          
            return $rs;
        
        } catch (Exception $e)
        {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
        
        return $rs;
	}
	
	public static function deleteAreaById($id)
	{
		try
    	{
    	
    		$strSql = "delete from t_area where f_id=?";
    	
    		$bRet = DbOperator::executeArraySql($strSql,array(array($id)));
    		
    		return $bRet;
    		
    	} catch (Exception $e)
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
}

?>