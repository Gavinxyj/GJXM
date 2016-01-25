<?php
/**
 *
 *@file        Box.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
class Box
{
    private $id         = "";
    
    private $user       = "";
    
    private $code       = "";
    
    private $area       = "";
    
    private $road       = "";
    
    private $address    = "";
    
    private $collector  = "";
    
    private $index      = "";
    
    private $standard   = "";
    
    private $value      = "";
    
    private $channel    = "";
    
    private $status     = "";
    
    private $time       = "";
 /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

 /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

 /**
     * @return the $code
     */
    public function getCode()
    {
        return $this->code;
    }

 /**
     * @return the $area
     */
    public function getArea()
    {
        return $this->area;
    }

 /**
     * @return the $road
     */
    public function getRoad()
    {
        return $this->road;
    }

 /**
     * @return the $address
     */
    public function getAddress()
    {
        return $this->address;
    }

 /**
     * @return the $collector
     */
    public function getCollector()
    {
        return $this->collector;
    }

 /**
     * @return the $index
     */
    public function getIndex()
    {
        return $this->index;
    }

 /**
     * @return the $standard
     */
    public function getStandard()
    {
        return $this->standard;
    }

 /**
     * @return the $value
     */
    public function getValue()
    {
        return $this->value;
    }

 /**
     * @return the $channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

 /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

 /**
     * @return the $time
     */
    public function getTime()
    {
        return $this->time;
    }

 /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

 /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

 /**
     * @param string $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

 /**
     * @param string $road
     */
    public function setRoad($road)
    {
        $this->road = $road;
    }

 /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

 /**
     * @param string $collector
     */
    public function setCollector($collector)
    {
        $this->collector = $collector;
    }

 /**
     * @param string $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

 /**
     * @param string $standard
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
    }

 /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

 /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

 /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

 /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

   
    
}

?>