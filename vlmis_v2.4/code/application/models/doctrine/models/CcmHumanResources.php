<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmHumanResources
 */
class CcmHumanResources
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $designation
     */
    private $designation;

    /**
     * @var string $mobileNumber
     */
    private $mobileNumber;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var datetime $logDate
     */
    private $logDate;

    /**
     * @var ListDetail
     */
    private $ccmPersonType;


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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set designation
     *
     * @param string $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * Get designation
     *
     * @return string 
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set logDate
     *
     * @param datetime $logDate
     */
    public function setLogDate($logDate)
    {
        $this->logDate = $logDate;
    }

    /**
     * Get logDate
     *
     * @return datetime 
     */
    public function getLogDate()
    {
        return $this->logDate;
    }

    /**
     * Set ccmPersonType
     *
     * @param ListDetail $ccmPersonType
     */
    public function setCcmPersonType(\ListDetail $ccmPersonType)
    {
        $this->ccmPersonType = $ccmPersonType;
    }

    /**
     * Get ccmPersonType
     *
     * @return ListDetail 
     */
    public function getCcmPersonType()
    {
        return $this->ccmPersonType;
    }
}