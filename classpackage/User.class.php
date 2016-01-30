<?php
/**
 *
 *@file        User.class.php
 *@author      xieyoujiang
 *@Data        2016年1月25日
 *@language    PHP
 *@E-mail      xie_youjiang@163.com
 *@copyright(c) 扬州格佳科技有限公司
 *
 */
require_once 'Db.class.php';

class User
{
	private $id 	  = "";
	
	private $userName = "";
	
	private $password = "";
	
    private $fullName = "";
    
    private $phone    = "";
    
    private $rank     = "";
    
    private $headPhone= "";
    
    private $bossPhone= "";
    
    private $lastLogin= "";
    
    private $lastIp   = "";
    
    private $lastTime = "";
    
    private $head     = "";
    
    private static $beanArray = array();
    
 /**
     * @return the $fullName
     */
    public function getFullName()
    {
        return $this->fullName;
    }

 /**
     * @return the $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

 /**
     * @return the $rank
     */
    public function getRank()
    {
        return $this->rank;
    }

 /**
     * @return the $headPhone
     */
    public function getHeadPhone()
    {
        return $this->headPhone;
    }

 /**
     * @return the $bossPhone
     */
    public function getBossPhone()
    {
        return $this->bossPhone;
    }

 /**
     * @return the $lastLogin
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

 /**
     * @return the $lastIp
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

 /**
     * @return the $lastTime
     */
    public function getLastTime()
    {
        return $this->lastTime;
    }

 /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

 /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

 /**
     * @param string $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

 /**
     * @param string $headPhone
     */
    public function setHeadPhone($headPhone)
    {
        $this->headPhone = $headPhone;
    }

 /**
     * @param string $bossPhone
     */
    public function setBossPhone($bossPhone)
    {
        $this->bossPhone = $bossPhone;
    }

 /**
     * @param string $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

 /**
     * @param string $lastIp
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;
    }

 /**
     * @param string $lastTime
     */
    public function setLastTime($lastTime)
    {
        $this->lastTime = $lastTime;
    }

    /**
     * @return the $userName
     */
    public function getUserName ()
    {
    	return $this->userName;
    }
    
    /**
     * @return the $password
     */
    public function getPassword ()
    {
    	return $this->password;
    }
    
    /**
     * @param string $userName
     */
    public function setUserName ( $userName )
    {
    	$this->userName = $userName;
    }
    
    /**
     * @param string $password
     */
    public function setPassword ( $password )
    {
    	$this->password = $password;
    }
    
    /**
	 * @return the $head
	 */
	public function getHead ()
	{
		return $this->head;
	}

	/**
	 * @return the $beanArray
	 */
	public static function getBeanArray ()
	{
		return self::$beanArray;
	}

	/**
	 * @return the $id
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @param string $head
	 */
	public function setHead ( $head )
	{
		$this->head = $head;
	}

	public static function checkLogin($userName, $password)
    {
        try 
        {
            $strSql = "select f_password from t_users where f_username= ?";
            
            $rs = DbOperator::querySql($strSql, array($userName));
            
            if($rs != null)
            {
               
               if(md5($password) == $rs['F_PASSWORD'])
               {
                   return true;
               }
            }
            else 
            {
                return false;
            }
            
        } catch (Exception $e) 
        {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
        
        return false;
    }
    
    public static function updataStatus($arrayList)
    {
        try
        {
            $strSql = "update t_users set f_last_login=? ,f_last_time= ? ,f_last_ip= ? where f_username=?";
        
            $rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
            return $rs;
        
        } catch (Exception $e)
        {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
        
        return $rs;
    }
	
    public static function getAllRecord()
    {
    	try 
    	{	
    		
    		$strSql = "select f_id,f_username,f_password,f_fullname,f_phone,f_rank,f_head,f_head_phone,f_boss_phone,f_time,f_last_login,f_last_ip,f_last_time from t_users order by f_id";
    		
    		$rs = DbOperator::queryAll($strSql);
    		
    		$count = 0;
    		
    		foreach ( $rs as $arrayIndex )
    		{
    			
    			 $user = new User();
    			 
    			 $user->id		  = $arrayIndex['F_ID'];
    			 $user->userName  = $arrayIndex['F_USERNAME'];
    			 $user->password  = $arrayIndex['F_PASSWORD'];
    			 $user->fullName  = $arrayIndex['F_FULLNAME'];
    			 $user->phone     = $arrayIndex['F_PHONE'];
    			 $user->rank      = $arrayIndex['F_RANK'];
    			 $user->head      = $arrayIndex['F_HEAD'];
    			 $user->headPhone = $arrayIndex['F_HEAD_PHONE'];
    			 $user->bossPhone = $arrayIndex['F_BOSS_PHONE'];
    			 $user->time      = $arrayIndex['F_TIME'];
    			 $user->lastLogin = $arrayIndex['F_LAST_LOGIN'];
    			 $user->lastIp    = $arrayIndex['F_LAST_IP'];
    			 $user->lastTime  = $arrayIndex['F_LAST_TIME'];
    			 
    			 self::$beanArray[$count++]= $user;
    		}
    		
    	} catch (Exception $e) 
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
    }

}

?>