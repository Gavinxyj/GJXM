<?php
/**
 *
 *@file        Set.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class Set
{
	private $time0		= "";
	
	private $time1		= "";
	
	private $time2		= "";
	
	private $time3		= "";
	/**
	 * @return the $time0
	 */
	public function getTime0 ()
	{
		return $this->time0;
	}

	/**
	 * @return the $time1
	 */
	public function getTime1 ()
	{
		return $this->time1;
	}

	/**
	 * @return the $time2
	 */
	public function getTime2 ()
	{
		return $this->time2;
	}

	/**
	 * @return the $time3
	 */
	public function getTime3 ()
	{
		return $this->time3;
	}

	/**
	 * @param string $time0
	 */
	public function setTime0 ( $time0 )
	{
		$this->time0 = $time0;
	}

	/**
	 * @param string $time1
	 */
	public function setTime1 ( $time1 )
	{
		$this->time1 = $time1;
	}

	/**
	 * @param string $time2
	 */
	public function setTime2 ( $time2 )
	{
		$this->time2 = $time2;
	}

	/**
	 * @param string $time3
	 */
	public function setTime3 ( $time3 )
	{
		$this->time3 = $time3;
	}

}

?>