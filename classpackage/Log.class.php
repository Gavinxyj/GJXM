<?php
/**
 *
 *@file        Log.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class Log
{
	private $id		= "";
	
	private $ip		= "";
	
	private $port	= "";
	
	private $code	= "";
	
	private $time	= "";
	
	private $status	= "";
	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @return the $ip
	 */
	public function getIp ()
	{
		return $this->ip;
	}

	/**
	 * @return the $port
	 */
	public function getPort ()
	{
		return $this->port;
	}

	/**
	 * @return the $code
	 */
	public function getCode ()
	{
		return $this->code;
	}

	/**
	 * @return the $time
	 */
	public function getTime ()
	{
		return $this->time;
	}

	/**
	 * @return the $status
	 */
	public function getStatus ()
	{
		return $this->status;
	}

	/**
	 * @param string $id
	 */
	public function setId ( $id )
	{
		$this->id = $id;
	}

	/**
	 * @param string $ip
	 */
	public function setIp ( $ip )
	{
		$this->ip = $ip;
	}

	/**
	 * @param string $port
	 */
	public function setPort ( $port )
	{
		$this->port = $port;
	}

	/**
	 * @param string $code
	 */
	public function setCode ( $code )
	{
		$this->code = $code;
	}

	/**
	 * @param string $time
	 */
	public function setTime ( $time )
	{
		$this->time = $time;
	}

	/**
	 * @param string $status
	 */
	public function setStatus ( $status )
	{
		$this->status = $status;
	}
	
}

?>