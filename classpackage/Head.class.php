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

}

?>