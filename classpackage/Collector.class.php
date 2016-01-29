<?php
/**
*
*@file        Collector.class.php
*@author      xieyoujiang
*@data        2016年1月29日
*@language    PHP
*@e-mail      xie_youjiang@163.com
*@copyright(c) 扬州格佳科技有限公司
*
*/
class Collector
{
	private $id		= "";
	
	private $code	= "";
	
	private $name	= "";
	
	private $ip		= "";
	
	private $area	= "";
	
	private $road	= "";
	
	private $address= "";
	
	private $user	= "";
	
	private $status	= "";
	
	private $time	= "";
	
	private static $beanArray = array();
	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @return the $beanArray
	 */
	public static function getBeanArray ()
	{
		return self::$beanArray;
	}

	/**
	 * @return the $code
	 */
	public function getCode ()
	{
		return $this->code;
	}

	/**
	 * @return the $name
	 */
	public function getName ()
	{
		return $this->name;
	}

	/**
	 * @return the $ip
	 */
	public function getIp ()
	{
		return $this->ip;
	}

	/**
	 * @return the $area
	 */
	public function getArea ()
	{
		return $this->area;
	}

	/**
	 * @return the $road
	 */
	public function getRoad ()
	{
		return $this->road;
	}

	/**
	 * @return the $address
	 */
	public function getAddress ()
	{
		return $this->address;
	}

	/**
	 * @return the $user
	 */
	public function getUser ()
	{
		return $this->user;
	}

	/**
	 * @return the $status
	 */
	public function getStatus ()
	{
		return $this->status;
	}

	/**
	 * @return the $time
	 */
	public function getTime ()
	{
		return $this->time;
	}

	/**
	 * @param string $code
	 */
	public function setCode ( $code )
	{
		$this->code = $code;
	}

	/**
	 * @param string $name
	 */
	public function setName ( $name )
	{
		$this->name = $name;
	}

	/**
	 * @param string $ip
	 */
	public function setIp ( $ip )
	{
		$this->ip = $ip;
	}

	/**
	 * @param string $area
	 */
	public function setArea ( $area )
	{
		$this->area = $area;
	}

	/**
	 * @param string $road
	 */
	public function setRoad ( $road )
	{
		$this->road = $road;
	}

	/**
	 * @param string $address
	 */
	public function setAddress ( $address )
	{
		$this->address = $address;
	}

	/**
	 * @param string $user
	 */
	public function setUser ( $user )
	{
		$this->user = $user;
	}

	/**
	 * @param string $status
	 */
	public function setStatus ( $status )
	{
		$this->status = $status;
	}

	/**
	 * @param string $time
	 */
	public function setTime ( $time )
	{
		$this->time = $time;
	}
	
	public static function getAllCollector() 
	{
		try
		{
			$strSql = "select t_collector.f_id,t_collector.f_code,t_collector.f_name,t2.f_name as f_area,t1.f_name as f_road,t_collector.f_address,t_collector.f_ip,t_users.f_fullname as f_user,t_collector.f_status,t_collector.f_time from t_collector join t_area t1 on t1.f_id=t_collector.f_road join t_area t2 on t2.f_id=t_collector.f_area join t_users on t_users.f_id=t_collector.f_user order by t_collector.f_id";
		
			$rs = DbOperator::queryAll($strSql);
		
			$count = 0;
		
			foreach ( $rs as $arrayIndex )
			{
				$collector = new Collector();
		
				$collector->id		= (1 + $count);
				
				$collector->code  	= sprintf("%08X",(float)$arrayIndex['F_CODE']);
				$collector->name  	= $arrayIndex['F_NAME'];
				$collector->area  	= $arrayIndex['F_AREA'];
				$collector->road    = $arrayIndex['F_ROAD'];
				$collector->address = $arrayIndex['F_ADDRESS'];
				$collector->ip      = $arrayIndex['F_IP'];
				$collector->user    = $arrayIndex['F_USER'];
				if($arrayIndex['F_STATUS'] == 0)
				{
					$collector->status = "<strong style = 'color:red'>禁用</strong>";
				}
				else if($arrayIndex['F_STATUS'] == 1)
				{
					$collector->status  = "<strong style = 'color:blue'>禁用</strong>";
				}
				
				$collector->time    = $arrayIndex['F_TIME'];
				
				self::$beanArray[$count++]= $collector;
			}
		
		} catch (Exception $e)
		{
			print "Error: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}
?>