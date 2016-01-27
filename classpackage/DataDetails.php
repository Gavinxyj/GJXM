<?php
/**
 *
 *@file        DataDetails.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class DataDetails
{
	private $id			= "";
	
	private $box		= "";
	
	private $code		= "";
	
	private $address	= "";
	
	private $area		= "";
	
	private $name		= "";//光交箱名称
	
	private $road   	= "";
	
	private $owner		= "";
	
	private $worker 	= "";
	
	private $selWorker	= "";
	
	private $selOwner	= "";
	
	private $createTime = "";
	
	private $openTime	= "";
	
	private $closeTime	= "";
	
	private $workerTime = "";
	
	private $ownerTime  = "";
	
	private $smsTime 	= "";
	
	private $smsCount	= "";
	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @return the $box
	 */
	public function getBox ()
	{
		return $this->box;
	}

	/**
	 * @return the $code
	 */
	public function getCode ()
	{
		return $this->code;
	}

	/**
	 * @return the $address
	 */
	public function getAddress ()
	{
		return $this->address;
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
	 * @return the $owner
	 */
	public function getOwner ()
	{
		return $this->owner;
	}

	/**
	 * @return the $worker
	 */
	public function getWorker ()
	{
		return $this->worker;
	}

	/**
	 * @return the $selWorker
	 */
	public function getSelWorker ()
	{
		return $this->selWorker;
	}

	/**
	 * @return the $selOwner
	 */
	public function getSelOwner ()
	{
		return $this->selOwner;
	}

	/**
	 * @return the $createTime
	 */
	public function getCreateTime ()
	{
		return $this->createTime;
	}

	/**
	 * @return the $openTime
	 */
	public function getOpenTime ()
	{
		return $this->openTime;
	}

	/**
	 * @return the $closeTime
	 */
	public function getCloseTime ()
	{
		return $this->closeTime;
	}

	/**
	 * @return the $workerTime
	 */
	public function getWorkerTime ()
	{
		return $this->workerTime;
	}

	/**
	 * @return the $ownerTime
	 */
	public function getOwnerTime ()
	{
		return $this->ownerTime;
	}

	/**
	 * @return the $smsTime
	 */
	public function getSmsTime ()
	{
		return $this->smsTime;
	}

	/**
	 * @return the $smsCount
	 */
	public function getSmsCount ()
	{
		return $this->smsCount;
	}

	/**
	 * @param string $id
	 */
	public function setId ( $id )
	{
		$this->id = $id;
	}

	/**
	 * @param string $box
	 */
	public function setBox ( $box )
	{
		$this->box = $box;
	}

	/**
	 * @param string $code
	 */
	public function setCode ( $code )
	{
		$this->code = $code;
	}

	/**
	 * @param string $address
	 */
	public function setAddress ( $address )
	{
		$this->address = $address;
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
	 * @param string $owner
	 */
	public function setOwner ( $owner )
	{
		$this->owner = $owner;
	}

	/**
	 * @param string $worker
	 */
	public function setWorker ( $worker )
	{
		$this->worker = $worker;
	}

	/**
	 * @param string $selWorker
	 */
	public function setSelWorker ( $selWorker )
	{
		$this->selWorker = $selWorker;
	}

	/**
	 * @param string $selOwner
	 */
	public function setSelOwner ( $selOwner )
	{
		$this->selOwner = $selOwner;
	}

	/**
	 * @param string $createTime
	 */
	public function setCreateTime ( $createTime )
	{
		$this->createTime = $createTime;
	}

	/**
	 * @param string $openTime
	 */
	public function setOpenTime ( $openTime )
	{
		$this->openTime = $openTime;
	}

	/**
	 * @param string $closeTime
	 */
	public function setCloseTime ( $closeTime )
	{
		$this->closeTime = $closeTime;
	}

	/**
	 * @param string $workerTime
	 */
	public function setWorkerTime ( $workerTime )
	{
		$this->workerTime = $workerTime;
	}

	/**
	 * @param string $ownerTime
	 */
	public function setOwnerTime ( $ownerTime )
	{
		$this->ownerTime = $ownerTime;
	}

	/**
	 * @param string $smsTime
	 */
	public function setSmsTime ( $smsTime )
	{
		$this->smsTime = $smsTime;
	}

	/**
	 * @param string $smsCount
	 */
	public function setSmsCount ( $smsCount )
	{
		$this->smsCount = $smsCount;
	}

	/**
	 * @param string $name
	 */
	public function setName ( $name )
	{
		$this->name = $name;
	}

	/**
	 * @return the $name
	 */
	public function getName ()
	{
		return $this->name;
	}

	public static function getNeedData()
	{
		$strSql = "SELECT t_data.f_code,t1.f_name AS f_area,t2.f_name AS f_road,t_data.f_address,t_data.f_name,t3.f_fullname AS f_owner,t4.f_fullname AS f_worker,t_data.f_open_time,t_data.f_close_time,t_data.f_create_time,t5.f_title AS f_sel_worker,t6.f_title AS f_sel_owner FROM t_data JOIN t_area t1 ON t1.f_id=t_data.f_area JOIN t_area t2 ON t2.f_id=t_data.f_road LEFT JOIN t_users t3 ON t3.f_id=t_data.f_owner LEFT JOIN t_users t4 ON t4.f_id=t_data.f_worker LEFT JOIN t_rank t5 ON t5.f_id=t_data.f_sel_worker LEFT JOIN t_rank t6 ON t6.f_id=t_data.f_sel_owner WHERE t_data.f_close_time IS NULL OR (t_data.f_sms_count>0 AND t_data.f_sel_owner =0) ORDER BY t_data.f_id";
		
		$rs = DbOperator::queryAll($strSql);
		
		$beanArray = array();
		
		$count = 0;
		if(!empty($rs))
		{
			foreach ($rs as $arrayIndex)
			{
				$dataDetails = new DataDetails();
		
				$dataDetails->id		= (1 + $count);
				$dataDetails->code 		= $arrayIndex['F_CODE'];
				$dataDetails->area  	= $arrayIndex['F_AREA'];
				$dataDetails->road    	= $arrayIndex['F_ROAD'];
				$dataDetails->address 	= $arrayIndex['F_ADDRESS'];
				$dataDetails->name		= $arrayIndex['F_NAME'];
				if(empty($arrayIndex['F_OWNER']))
				{
					$dataDetails->owner = "未知";
				}
				else 
				{
					$dataDetails->owner	= $arrayIndex['F_OWNER'];
				}
				if(empty($arrayIndex['F_WORKER']))
				{
					$dataDetails->worker = "未知";
				}
				else
				{
					$dataDetails->worker		= $arrayIndex['F_WORKER'];
				}
				$dataDetails->openTime	= $arrayIndex['F_OPEN_TIME'];
				if(empty($arrayIndex['F_CLOSE_TIME']))
				{
					$dataDetails->closeTime = "尚未关闭";
				}
				else 
				{
					$dataDetails->closeTime = $arrayIndex['F_CLOSE_TIME'];
				}
				
				if(empty($arrayIndex['F_SEL_WORKER']))
				{
					$dataDetails->selWorker = "尚未处理";
				}
				else 
				{
					$dataDetails->selWorker = $arrayIndex['F_SEL_WORKER'];
				}
				if(empty($arrayIndex['F_SEL_OWNER']))
				{
					$dataDetails->selOwner  = "尚未处理";
				}
				else 
				{
					$dataDetails->selOwner  = $arrayIndex['F_SEL_OWNER'];
				}
				$dataDetails->createTime= $arrayIndex['F_CREATE_TIME'];
				
				$beanArray[$count++] = $dataDetails;
			}
			
			return $beanArray;
		}
		else
		{
			return null;
		}
	}
	
	public static function getDealed() 
	{
		$strSql = "select t_data.f_code,t1.f_name as f_area,t2.f_name as f_road,t_data.f_address,t_data.f_name,t3.f_fullname as f_owner,t4.f_fullname as f_worker,t_data.f_open_time,t_data.f_close_time,t_data.f_create_time,t5.f_title as f_sel_worker,t6.f_title as f_sel_owner from t_data join t_area t1 on t1.f_id=t_data.f_area join t_area t2 on t2.f_id=t_data.f_road left join t_users t3 on t3.f_id=t_data.f_owner left join t_users t4 on t4.f_id=t_data.f_worker left join t_rank t5 on t5.f_id=t_data.f_sel_worker left join t_rank t6 on t6.f_id=t_data.f_sel_owner where t_data.f_sel_owner!=0 AND t_data.f_sms_count>0 AND t_data.f_close_time IS NOT NULL order by t_data.f_id";
		
		$rs = DbOperator::queryAll($strSql);
		
		$beanArray = array();
		
		$count = 0;
		
		if(!empty($rs))
		{
			foreach ($rs as $arrayIndex)
			{
				$dataDetails = new DataDetails();
		
				$dataDetails->id		= (1 + $count);
				$dataDetails->code 		= $arrayIndex['F_CODE'];
				$dataDetails->area  	= $arrayIndex['F_AREA'];
				$dataDetails->road    	= $arrayIndex['F_ROAD'];
				$dataDetails->address 	= $arrayIndex['F_ADDRESS'];
				$dataDetails->name		= $arrayIndex['F_NAME'];
				if(empty($arrayIndex['F_OWNER']))
				{
					$dataDetails->owner = "未知";
				}
				else 
				{
					$dataDetails->owner	= $arrayIndex['F_OWNER'];
				}
				if(empty($arrayIndex['F_WORKER']))
				{
					$dataDetails->worker = "未知";
				}
				else
				{
					$dataDetails->worker		= $arrayIndex['F_WORKER'];
				}
				$dataDetails->openTime	= $arrayIndex['F_OPEN_TIME'];
				if(empty($arrayIndex['F_CLOSE_TIME']))
				{
					$dataDetails->closeTime = "尚未关闭";
				}
				else 
				{
					$dataDetails->closeTime = $arrayIndex['F_CLOSE_TIME'];
				}
				
				if(empty($arrayIndex['F_SEL_WORKER']))
				{
					$dataDetails->selWorker = "尚未处理";
				}
				else 
				{
					$dataDetails->selWorker = $arrayIndex['F_SEL_WORKER'];
				}
				if(empty($arrayIndex['F_SEL_OWNER']))
				{
					$dataDetails->selOwner  = "尚未处理";
				}
				else 
				{
					$dataDetails->selOwner  = $arrayIndex['F_SEL_OWNER'];
				}
				$dataDetails->createTime= $arrayIndex['F_CREATE_TIME'];
				
				$beanArray[$count++] = $dataDetails;
			}
				
			return $beanArray;
		}
		else
		{
			return null;
		}
	}
	
	public static function getHistoryDeal()
	{
		$strSql = "select t_data.f_code,t1.f_name as f_area,t2.f_name as f_road,t_data.f_address,t_data.f_name,t3.f_fullname as f_owner,t4.f_fullname as f_worker,t_data.f_open_time,t_data.f_close_time,t_data.f_create_time,t5.f_title as f_sel_worker,t6.f_title as f_sel_owner from t_data join t_area t1 on t1.f_id=t_data.f_area join t_area t2 on t2.f_id=t_data.f_road left join t_users t3 on t3.f_id=t_data.f_owner left join t_users t4 on t4.f_id=t_data.f_worker left join t_rank t5 on t5.f_id=t_data.f_sel_worker left join t_rank t6 on t6.f_id=t_data.f_sel_owner where 1 order by t_data.f_id desc";
		
		$rs = DbOperator::queryAll($strSql);
		
		$beanArray = array();
		
		$count = 0;
		
		if(!empty($rs))
		{
			foreach ($rs as $arrayIndex)
			{
				$dataDetails = new DataDetails();
		
				$dataDetails->id		= (1 + $count);
				$dataDetails->code 		= $arrayIndex['F_CODE'];
				$dataDetails->area  	= $arrayIndex['F_AREA'];
				$dataDetails->road    	= $arrayIndex['F_ROAD'];
				$dataDetails->address 	= $arrayIndex['F_ADDRESS'];
				$dataDetails->name		= $arrayIndex['F_NAME'];
				if(empty($arrayIndex['F_OWNER']))
				{
					$dataDetails->owner = "未知";
				}
				else 
				{
					$dataDetails->owner	= $arrayIndex['F_OWNER'];
				}
				if(empty($arrayIndex['F_WORKER']))
				{
					$dataDetails->worker = "未知";
				}
				else
				{
					$dataDetails->worker		= $arrayIndex['F_WORKER'];
				}
				$dataDetails->openTime	= $arrayIndex['F_OPEN_TIME'];
				if(empty($arrayIndex['F_CLOSE_TIME']))
				{
					$dataDetails->closeTime = "尚未关闭";
				}
				else 
				{
					$dataDetails->closeTime = $arrayIndex['F_CLOSE_TIME'];
				}
				
				if(empty($arrayIndex['F_SEL_WORKER']))
				{
					$dataDetails->selWorker = "尚未处理";
				}
				else 
				{
					$dataDetails->selWorker = $arrayIndex['F_SEL_WORKER'];
				}
				if(empty($arrayIndex['F_SEL_OWNER']))
				{
					$dataDetails->selOwner  = "尚未处理";
				}
				else 
				{
					$dataDetails->selOwner  = $arrayIndex['F_SEL_OWNER'];
				}
				$dataDetails->createTime= $arrayIndex['F_CREATE_TIME'];
				
				$beanArray[$count++] = $dataDetails;
			}
		
			return $beanArray;
		}
		else
		{
			return null;
		}
	}
}

?>