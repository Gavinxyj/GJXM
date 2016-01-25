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

}

?>