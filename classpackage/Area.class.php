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
 
class Area
{

	private $id 		= "";

	private $parent 	= "";

	private $name 		= "";

	private $fullName 	= "";

	private $phone 		= "";

	private $time 		= "";

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
}

?>