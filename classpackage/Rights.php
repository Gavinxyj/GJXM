<?php
/**
 *
 *@file        Right.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class Rights
{
	private $user	= "";
	
	private $box	= "";
	/**
	 * @return the $user
	 */
	public function getUser ()
	{
		return $this->user;
	}

	/**
	 * @param string $user
	 */
	public function setUser ( $user )
	{
		$this->user = $user;
	}

	/**
	 * @return the $box
	 */
	public function getBox ()
	{
		return $this->box;
	}

	/**
	 * @param string $box
	 */
	public function setBox ( $box )
	{
		$this->box = $box;
	}

}

?>