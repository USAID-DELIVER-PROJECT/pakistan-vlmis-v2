<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UserLoginLog
 */
class UserLoginLog
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $ipAddress
     */
    private $ipAddress;

    /**
     * @var datetime $loginTime
     */
    private $loginTime;

    /**
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