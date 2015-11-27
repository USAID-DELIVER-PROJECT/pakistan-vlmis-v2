<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmStatusHistory
 */
class CcmStatusHistory
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $temperatureAlarm
     */
    private $temperatureAlarm;

    /**
     * @var integer $workingQuantity
     */
    private $workingQuantity;

    /**
     * @var text $comments
     */
    private $comments;

    /**
     * @var datetime $statusDate
     */
    private $statusDate;

    /**
     * @var integer $ccmStatusListId
     */
    private $ccmStatusListId;

    /**
     * @var integer $ccmAssetTypeId
     */
    private $ccmAssetTypeId;

    /**
     * @var integer $reasonId
     */
    private $reasonId;

    /**
     * @var integer $utilizationId
     */
    private $utilizationId;

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
     * @var Warehouses
     */
    private $warehouse;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var Users
     */
    private $modifiedBy;


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
     * Set temperatureAlarm
     *
     * @param integer $temperatureAlarm
     */
    public function setTemperatureAlarm($temperatureAlarm)
    {
        $this->temperatureAlarm = $temperatureAlarm;
    }

    /**
     * Get temperatureAlarm
     *
     * @return integer 
     */
    public function getTemperatureAlarm()
    {
        return $this->temperatureAlarm;
    }

    /**
     * Set workingQuantity
     *
     * @param integer $workingQuantity
     */
    public function setWorkingQuantity($workingQuantity)
    {
        $this->workingQuantity = $workingQuantity;
    }

    /**
     * Get workingQuantity
     *
     * @return integer 
     */
    public function getWorkingQuantity()
    {
        return $this->workingQuantity;
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
     * Set statusDate
     *
     * @param datetime $statusDate
     */
    public function setStatusDate($statusDate)
    {
        $this->statusDate = $statusDate;
    }

    /**
     * Get statusDate
     *
     * @return datetime 
     */
    public function getStatusDate()
    {
        return $this->statusDate;
    }

    /**
     * Set ccmStatusListId
     *
     * @param integer $ccmStatusListId
     */
    public function setCcmStatusListId($ccmStatusListId)
    {
        $this->ccmStatusListId = $ccmStatusListId;
    }

    /**
     * Get ccmStatusListId
     *
     * @return integer 
     */
    public function getCcmStatusListId()
    {
        return $this->ccmStatusListId;
    }

    /**
     * Set ccmAssetTypeId
     *
     * @param integer $ccmAssetTypeId
     */
    public function setCcmAssetTypeId($ccmAssetTypeId)
    {
        $this->ccmAssetTypeId = $ccmAssetTypeId;
    }

    /**
     * Get ccmAssetTypeId
     *
     * @return integer 
     */
    public function getCcmAssetTypeId()
    {
        return $this->ccmAssetTypeId;
    }

    /**
     * Set reasonId
     *
     * @param integer $reasonId
     */
    public function setReasonId($reasonId)
    {
        $this->reasonId = $reasonId;
    }

    /**
     * Get reasonId
     *
     * @return integer 
     */
    public function getReasonId()
    {
        return $this->reasonId;
    }

    /**
     * Set utilizationId
     *
     * @param integer $utilizationId
     */
    public function setUtilizationId($utilizationId)
    {
        $this->utilizationId = $utilizationId;
    }

    /**
     * Get utilizationId
     *
     * @return integer 
     */
    public function getUtilizationId()
    {
        return $this->utilizationId;
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
     * Set warehouse
     *
     * @param Warehouses $warehouse
     */
    public function setWarehouse(\Warehouses $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    /**
     * Get warehouse
     *
     * @return Warehouses 
     */
    public function getWarehouse()
    {
        return $this->warehouse;
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
}