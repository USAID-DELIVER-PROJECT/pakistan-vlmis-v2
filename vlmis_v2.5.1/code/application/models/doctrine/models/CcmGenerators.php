<?php

/**
*  Model for CCM Generators
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  CcmGenerators
 */
class CcmGenerators
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $powerSource
     * @var integer $powerSource
     */
    private $powerSource;

    /**
     * $powerRating
     * @var string $powerRating
     */
    private $powerRating;

    /**
     * $automaticStartMechanism
     * @var boolean $automaticStartMechanism
     */
    private $automaticStartMechanism;

    /**
     * $useFor
     * @var string $useFor
     */
    private $useFor;

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
     * $ccm
     * @var ColdChain
     */
    private $ccm;

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
     * Set powerSource
     *
     * @param integer $powerSource
     */
    public function setPowerSource($powerSource)
    {
        $this->powerSource = $powerSource;
    }

    /**
     * Get powerSource
     *
     * @return integer 
     */
    public function getPowerSource()
    {
        return $this->powerSource;
    }

    /**
     * Set powerRating
     *
     * @param string $powerRating
     */
    public function setPowerRating($powerRating)
    {
        $this->powerRating = $powerRating;
    }

    /**
     * Get powerRating
     *
     * @return string 
     */
    public function getPowerRating()
    {
        return $this->powerRating;
    }

    /**
     * Set automaticStartMechanism
     *
     * @param boolean $automaticStartMechanism
     */
    public function setAutomaticStartMechanism($automaticStartMechanism)
    {
        $this->automaticStartMechanism = $automaticStartMechanism;
    }

    /**
     * Get automaticStartMechanism
     *
     * @return boolean 
     */
    public function getAutomaticStartMechanism()
    {
        return $this->automaticStartMechanism;
    }

    /**
     * Set useFor
     *
     * @param string $useFor
     */
    public function setUseFor($useFor)
    {
        $this->useFor = $useFor;
    }

    /**
     * Get useFor
     *
     * @return string 
     */
    public function getUseFor()
    {
        return $this->useFor;
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
     * Set ccm
     *
     * @param ColdChain $ccm
     */
    public function setCcm(\ColdChain $ccm)
    {
        $this->ccm = $ccm;
    }

    /**
     * Get ccm
     *
     * @return ColdChain 
     */
    public function getCcm()
    {
        return $this->ccm;
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