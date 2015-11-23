<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmGenerators
 */
class CcmGenerators
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $powerRating
     */
    private $powerRating;

    /**
     * @var boolean $automaticStartMechanism
     */
    private $automaticStartMechanism;

    /**
     * @var string $useFor
     */
    private $useFor;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var ColdChain
     */
    private $ccm;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var Users
     */
    private $modifiedBy;

    /**
     * @var ListDetail
     */
    private $powerSource;


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
     * Set powerSource
     *
     * @param ListDetail $powerSource
     */
    public function setPowerSource(\ListDetail $powerSource)
    {
        $this->powerSource = $powerSource;
    }

    /**
     * Get powerSource
     *
     * @return ListDetail 
     */
    public function getPowerSource()
    {
        return $this->powerSource;
    }
}