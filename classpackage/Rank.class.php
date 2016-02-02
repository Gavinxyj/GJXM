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
require_once 'Db.class.php';
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

	public static function getAllRecord()
	{
		try 
    	{	
    		
    		$strSql = "select f_id,f_type,f_code,f_title,f_desc,f_time from t_rank order by f_id";
    		
    		$rs = DbOperator::queryAll($strSql);
    		
    		$count = 0;
    		
			$beanArray = array();
			
    		foreach ( $rs as $arrayIndex )
    		{
    			
    			 $rank = new Rank();
    			 
    			 $rank->id		  = $arrayIndex['F_ID'];
    			 $rank->type	  = $arrayIndex['F_TYPE'];
				 $rank->code	  = $arrayIndex['F_CODE'];
				 $rank->title	  = $arrayIndex['F_TITLE'];
				 $rank->desc	  = $arrayIndex['F_DESC'];
				 $rank->time	  = $arrayIndex['F_TIME'];
    			 
    			 $beanArray[$count++]= $rank;
    		}
    		return $beanArray;
    	} catch (Exception $e) 
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function getRankById($id)
	{
		try 
    	{	
    		
    		$strSql = "select f_title,f_desc from t_rank where f_id = '{$id}'";
    		
    		$beanArray = DbOperator::queryAll($strSql);
    		
    		
    		return $beanArray;
    	} catch (Exception $e) 
    	{
    		print "Error: " . $e->getMessage() . "<br/>";
    		die();
    	}
	}
	
	public static function updateRank($arrayList)
	{
		try
        {
            $strSql = "update t_rank set f_title=? ,f_desc= ? ,f_time=now() where f_id=?";
        
            $rs = DbOperator::executeArraySql($strSql, array($arrayList));
          
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