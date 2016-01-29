<?php

/**
*  Model for User Click Paths
*/


use Doctrine\ORM\Mapping as ORM;

/**
 *  UserClickPaths
 */
class UserClickPaths
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $sessionId
     * @var string $sessionId
     */
    private $sessionId;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $resource
     * @var Resources
     */
    private $resource;

    /**
     * $user
     * @var Users
     */
    private $user;


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
     * Set sessionId
     *
     * @param string $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
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
     * Set resource
     *
     * @param Resources $resource
     */
    public function setResource(\Resources $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get resource
     *
     * @return Resources 
     */
    public function getResource()
    {
        return $this->resource;
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
}