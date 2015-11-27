<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmVehicles
 */
class CcmVehicles
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $registrationNo
     */
    private $registrationNo;

    /**
     * @var integer $usedForEpi
     */
    private $usedForEpi;

    /**
     * @var text $comments
     */
    private $comments;

    /**
     * @var integer $ccmId
     */
    private $ccmId;

    /**
     * @var integer $ccmAssetSubTypeId
     */
    private $ccmAssetSubTypeId;

    /**
     * @var integer $fuelTypeId
     */
    private $fuelTypeId;

    /**
     * @var integer $createdBy
     */
    private $createdBy;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var integer $modifiedBy
     */
    private $modifiedBy;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;


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
     * Set registrationNo
     *
     * @param string $registrationNo
     */
    public function setRegistrationNo($registrationNo)
    {
        $this->registrationNo = $registrationNo;
    }

    /**
     * Get registrationNo
     *
     * @return string 
     */
    public function getRegistrationNo()
    {
        return $this->registrationNo;
    }

    /**
     * Set usedForEpi
     *
     * @param integer $usedForEpi
     */
    public function setUsedForEpi($usedForEpi)
    {
        $this->usedForEpi = $usedForEpi;
    }

    /**
     * Get usedForEpi
     *
     * @return integer 
     */
    public function getUsedForEpi()
    {
        return $this->usedForEpi;
    }

    /**
     * Set comments
     *
     * @param text $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get comments
     *
     * @return text 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set ccmId
     *
     * @param integer $ccmId
     */
    public function setCcmId($ccmId)
    {
        $this->ccmId = $ccmId;
    }

    /**
     * Get ccmId
     *
     * @return integer 
     */
    public function getCcmId()
    {
        return $this->ccmId;
    }

    /**
     * Set ccmAssetSubTypeId
     *
     * @param integer $ccmAssetSubTypeId
     */
    public function setCcmAssetSubTypeId($ccmAssetSubTypeId)
    {
        $this->ccmAssetSubTypeId = $ccmAssetSubTypeId;
    }

    /**
     * Get ccmAssetSubTypeId
     *
     * @return integer 
     */
    public function getCcmAssetSubTypeId()
    {
        return $this->ccmAssetSubTypeId;
    }

    /**
     * Set fuelTypeId
     *
     * @param integer $fuelTypeId
     */
    public function setFuelTypeId($fuelTypeId)
    {
        $this->fuelTypeId = $fuelTypeId;
    }

    /**
     * Get fuelTypeId
     *
     * @return integer 
     */
    public function getFuelTypeId()
    {
        return $this->fuelTypeId;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
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
}