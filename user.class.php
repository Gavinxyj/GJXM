<?php

require_once 'db.class.php';

class user
{
    private $fullName = "";
    
    private $phone    = "";
    
    private $rank     = "";
    
    private $headPhone= "";
    
    private $bossPhone= "";
    
    private $lastLogin= "";
    
    private $lastIp   = "";
    
    private $lastTime = "";
    
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

    public static function checkLogin($userName, $password)
    {
        try 
        {
            $strSql = "select f_password from t_users where f_username= ?";
            
            $rs = dbOperator::querySql($strSql, array($userName));
            
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
        
            $rs = dbOperator::executeSql($strSql, $arrayList);
          
            return $rs;
        
        } catch (Exception $e)
        {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
        
        return $rs;
    }
}

?>