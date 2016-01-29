<?php

/**
*  Model for Cold Chain
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  ColdChain
 */
class ColdChain
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $assetId
     * @var string $assetId
     */
    private $assetId;

    /**
     * $autoAssetId
     * @var integer $autoAssetId
     */
    private $autoAssetId;

    /**
     * $serialNumber
     * @var string $serialNumber
     */
    private $serialNumber;

    /**
     * $estimateLife
     * @var smallint $estimateLife
     */
    private $estimateLife;

    /**
     * $workingSince
     * @var datetime $workingSince
     */
    private $workingSince;

    /**
     * $quantity
     * @var integer $quantity
     */
    private $quantity;

    /**
     * $manufactureYear
     * @var datetime $manufactureYear
     */
    private $manufactureYear;

    /**
     * $status
     * @var boolean $status
     */
    private $status;

    /**
     * $ccmStatusHistoryId
     * @var integer $ccmStatusHistoryId
     */
    private $ccmStatusHistoryId;

    /**
     * $approvedBy
     * @var integer $approvedBy
     */
    private $approvedBy;

    /**
     * $approvedOn
     * @var datetime $approvedOn
     */
    private $approvedOn;

    /**
     * $createdDate
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * $temperatureMonitor
     * @var integer $temperatureMonitor
     */
    private $temperatureMonitor;

    /**
     * $modifiedDate
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * $ccmAssetType
     * @var CcmAssetTypes
     */
    private $ccmAssetType;

    /**
     * $ccmModel
     * @var CcmModels
     */
    private $ccmModel;

    /**
     * $source
     * @var ListDetail
     */
    private $source;

    /**
     * $warehouse
     * @var Warehouses
     */
    private $warehouse;

    /**
     * $createdBy
     * @var Users
     */
    private $createdBy;

    /**
     * $modifiedBy
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
     * Set assetId
     *
     * @param string $assetId
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;
    }

    /**
     * Get assetId
     *
     * @return string 
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set autoAssetId
     *
     * @param integer $autoAssetId
     */
    public function setAutoAssetId($autoAssetId)
    {
        $this->autoAssetId = $autoAssetId;
    }

    /**
     * Get autoAssetId
     *
     * @return integer 
     */
    public function getAutoAssetId()
    {
        return $this->autoAssetId;
    }

    /**
     * Set serialNumber
     *
     * @param string $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * Get serialNumber
     *
     * @return string 
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set estimateLife
     *
     * @param smallint $estimateLife
     */
    public function setEstimateLife($estimateLife)
    {
        $this->estimateLife = $estimateLife;
    }

    /**
     * Get estimateLife
     *
     * @return smallint 
     */
    public function getEstimateLife()
    {
        return $this->estimateLife;
    }

    /**
     * Set workingSince
     *
     * @param datetime $workingSince
     */
    public function setWorkingSince($workingSince)
    {
        $this->workingSince = $workingSince;
    }

    /**
     * Get workingSince
     *
     * @return datetime 
     */
    public function getWorkingSince()
    {
        return $this->workingSince;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set manufactureYear
     *
     * @param datetime $manufactureYear
     */
    public function setManufactureYear($manufactureYear)
    {
        $this->manufactureYear = $manufactureYear;
    }

    /**
     * Get manufactureYear
     *
     * @return datetime 
     */
    public function getManufactureYear()
    {
        return $this->manufactureYear;
    }

    /**
     * Set status
     *
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set ccmStatusHistoryId
     *
     * @param integer $ccmStatusHistoryId
     */
    public function setCcmStatusHistoryId($ccmStatusHistoryId)
    {
        $this->ccmStatusHistoryId = $ccmStatusHistoryId;
    }

    /**
     * Get ccmStatusHistoryId
     *
     * @return integer 
     */
    public function getCcmStatusHistoryId()
    {
        return $this->ccmStatusHistoryId;
    }

    /**
     * Set approvedBy
     *
     * @param integer $approvedBy
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;
    }

    /**
     * Get approvedBy
     *
     * @return integer 
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * Set approvedOn
     *
     * @param datetime $approvedOn
     */
    public function setApprovedOn($approvedOn)
    {
        $this->approvedOn = $approvedOn;
    }

    /**
     * Get approvedOn
     *
     * @return datetime 
     */
    public function getApprovedOn()
    {
        return $this->approvedOn;
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
     * Set temperatureMonitor
     *
     * @param integer $temperatureMonitor
     */
    public function setTemperatureMonitor($temperatureMonitor)
    {
        $this->temperatureMonitor = $temperatureMonitor;
    }

    /**
     * Get temperatureMonitor
     *
     * @return integer 
     */
    public function getTemperatureMonitor()
    {
        return $this->temperatureMonitor;
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
     * Set ccmModel
     *
     * @param CcmModels $ccmModel
     */
    public function setCcmModel(\CcmModels $ccmModel)
    {
        $this->ccmModel = $ccmModel;
    }

    /**
     * Get ccmModel
     *
     * @return CcmModels 
     */
    public function getCcmModel()
    {
        return $this->ccmModel;
    }

    /**
     * Set source
     *
     * @param ListDetail $source
     */
    public function setSource(\ListDetail $source)
    {
        $this->source = $source;
    }

    /**
     * Get source
     *
     * @return ListDetail 
     */
    public function getSource()
    {
        return $this->source;
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