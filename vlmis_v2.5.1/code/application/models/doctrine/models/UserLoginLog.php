<?php

/**
*  Model for User Login Log
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  UserLoginLog
 */
class UserLoginLog
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $ipAddress
     * @var string $ipAddress
     */
    private $ipAddress;

    /**
     * $loginTime
     * @var datetime $loginTime
     */
    private $loginTime;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $user
     * @var Users
     */
    private $user;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;


    /**
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set loginTime
     *
     * @param datetime $loginTime
     */
    public function setLoginTime($loginTime)
    {
        $this->loginTime = $loginTime;
    }

    /**
     * Get loginTime
     *
     * @return datetime 
     */
    public function getLoginTime()
    {
        return $this->loginTime;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate
     *
     * @param datetime $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * Get modifiedDate
     *
     * @return datetime 
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set user
     *
     * @param Users $user
     */
    public function setUser(\Users $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy(\Users $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}