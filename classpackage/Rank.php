<?php
/**
 *
 *@file        Rank.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class Rank
{
	private $id 		= "";
	
	private $type		= "";
	
	private $code		= "";
	
	private $title		= "";
	
	private $desc		= "";
	
	private $time		= "";
	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @return the $type
	 */
	public function getType ()
	{
		return $this->type;
	}

	/**
	 * @return the $code
	 */
	public function getCode ()
	{
		return $this->code;
	}

	/**
	 * @return the $title
	 */
	public function getTitle ()
	{
		return $this->title;
	}

	/**
	 * @return the $desc
	 */
	public function getDesc ()
	{
		return $this->desc;
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
	 * @param string $type
	 */
	public function setType ( $type )
	{
		$this->type = $type;
	}

	/**
	 * @param string $code
	 */
	public function setCode ( $code )
	{
		$this->code = $code;
	}

	/**
	 * @param string $title
	 */
	public function setTitle ( $title )
	{
		$this->title = $title;
	}

	/**
	 * @param string $desc
	 */
	public function setDesc ( $desc )
	{
		$this->desc = $desc;
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