<?php

/**
*  Model for CCM Human Resources
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  CcmHumanResources
 */
class CcmHumanResources
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $name
     * @var string $name
     */
    private $name;

    /**
     * $designation
     * @var string $designation
     */
    private $designation;

    /**
     * $mobileNumber
     * @var string $mobileNumber
     */
    private $mobileNumber;

    /**
     * $email
     * @var string $email
     */
    private $email;

    /**
     * $logDate
     * @var datetime $logDate
     */
    private $logDate;

    /**
     * $ccmPersonType
     * @var integer $ccmPersonType
     */
    private $ccmPersonType;

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
     * @param integer $ccmPersonType
     */
    public function setCcmPersonType($ccmPersonType)
    {
        $this->ccmPersonType = $ccmPersonType;
    }

    /**
     * Get ccmPersonType
     *
     * @return integer 
     */
    public function getCcmPersonType()
    {
        return $this->ccmPersonType;
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