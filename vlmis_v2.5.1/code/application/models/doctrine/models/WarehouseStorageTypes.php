<?php

/**
*  Model for Warehouse Storage Types
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  WarehouseStorageTypes
 */
class WarehouseStorageTypes
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $storageTemperature
     * @var integer $storageTemperature
     */
    private $storageTemperature;

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
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

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
     * $stakeholderItemPackSize
     * @var StakeholderItemPackSizes
     */
    private $stakeholderItemPackSize;

    /**
     * $warehouseType
     * @var WarehouseTypes
     */
    private $warehouseType;


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
     * Set storageTemperature
     *
     * @param integer $storageTemperature
     */
    public function setStorageTemperature($storageTemperature)
    {
        $this->storageTemperature = $storageTemperature;
    }

    /**
     * Get storageTemperature
     *
     * @return integer 
     */
    public function getStorageTemperature()
    {
        return $this->storageTemperature;
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
     * Set stakeholderActivity
     *
     * @param StakeholderActivities $stakeholderActivity
     */
    public function setStakeholderActivity(\StakeholderActivities $stakeholderActivity)
    {
        $this->stakeholderActivity = $stakeholderActivity;
    }

    /**
     * Get stakeholderActivity
     *
     * @return StakeholderActivities 
     */
    public function getStakeholderActivity()
    {
        return $this->stakeholderActivity;
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
     * Set stakeholderItemPackSize
     *
     * @param StakeholderItemPackSizes $stakeholderItemPackSize
     */
    public function setStakeholderItemPackSize(\StakeholderItemPackSizes $stakeholderItemPackSize)
    {
        $this->stakeholderItemPackSize = $stakeholderItemPackSize;
    }

    /**
     * Get stakeholderItemPackSize
     *
     * @return StakeholderItemPackSizes 
     */
    public function getStakeholderItemPackSize()
    {
        return $this->stakeholderItemPackSize;
    }

    /**
     * Set warehouseType
     *
     * @param WarehouseTypes $warehouseType
     */
    public function setWarehouseType(\WarehouseTypes $warehouseType)
    {
        $this->warehouseType = $warehouseType;
    }

    /**
     * Get warehouseType
     *
     * @return WarehouseTypes 
     */
    public function getWarehouseType()
    {
        return $this->warehouseType;
    }
}