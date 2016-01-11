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
     * @var integer $warehouseId
     */
    private $warehouseId;

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
     * @var CcmStatusList
     */
    private $ccmStatusList;

    /**
     * @var CcmStatusList
     */
    private $reason;

    /**
     * @var CcmAssetTypes
     */
    private $ccmAssetType;

    /**
     * @var CcmStatusList
     */
    private $utilization;


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
     * Set warehouseId
     *
     * @param integer $warehouseId
     */
    public function setWarehouseId($warehouseId)
    {
        $this->warehouseId = $warehouseId;
    }

    /**
     * Get warehouseId
     *
     * @return integer 
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
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
     * Set ccmStatusList
     *
     * @param CcmStatusList $ccmStatusList
     */
    public function setCcmStatusList(\CcmStatusList $ccmStatusList)
    {
        $this->ccmStatusList = $ccmStatusList;
    }

    /**
     * Get ccmStatusList
     *
     * @return CcmStatusList 
     */
    public function getCcmStatusList()
    {
        return $this->ccmStatusList;
    }

    /**
     * Set reason
     *
     * @param CcmStatusList $reason
     */
    public function setReason(\CcmStatusList $reason)
    {
        $this->reason = $reason;
    }

    /**
     * Get reason
     *
     * @return CcmStatusList 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set ccmAssetType
     *
     * @param CcmAssetTypes $ccmAssetType
     */
    public function setCcmAssetType(\CcmAssetTypes $ccmAssetType)
    {
        $this->ccmAssetType = $ccmAssetType;
    }

    /**
     * Get ccmAssetType
     *
     * @return CcmAssetTypes 
     */
    public function getCcmAssetType()
    {
        return $this->ccmAssetType;
    }

    /**
     * Set utilization
     *
     * @param CcmStatusList $utilization
     */
    public function setUtilization(\CcmStatusList $utilization)
    {
        $this->utilization = $utilization;
    }

    /**
     * Get utilization
     *
     * @return CcmStatusList 
     */
    public function getUtilization()
    {
        return $this->utilization;
    }
}