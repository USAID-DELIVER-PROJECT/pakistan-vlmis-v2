<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WarehouseStorageTypes
 */
class WarehouseStorageTypes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $storageTemperature
     */
    private $storageTemperature;

    /**
     * @var integer $stakeholderItemPackSizeId
     */
    private $stakeholderItemPackSizeId;

    /**
     * @var integer $warehouseTypeId
     */
    private $warehouseTypeId;

    /**
     * @var integer $stakeholderActivityId
     */
    private $stakeholderActivityId;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var Users
     */
    private $modifiedBy;

    /**
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
     * Set stakeholderItemPackSizeId
     *
     * @param integer $stakeholderItemPackSizeId
     */
    public function setStakeholderItemPackSizeId($stakeholderItemPackSizeId)
    {
        $this->stakeholderItemPackSizeId = $stakeholderItemPackSizeId;
    }

    /**
     * Get stakeholderItemPackSizeId
     *
     * @return integer 
     */
    public function getStakeholderItemPackSizeId()
    {
        return $this->stakeholderItemPackSizeId;
    }

    /**
     * Set warehouseTypeId
     *
     * @param integer $warehouseTypeId
     */
    public function setWarehouseTypeId($warehouseTypeId)
    {
        $this->warehouseTypeId = $warehouseTypeId;
    }

    /**
     * Get warehouseTypeId
     *
     * @return integer 
     */
    public function getWarehouseTypeId()
    {
        return $this->warehouseTypeId;
    }

    /**
     * Set stakeholderActivityId
     *
     * @param integer $stakeholderActivityId
     */
    public function setStakeholderActivityId($stakeholderActivityId)
    {
        $this->stakeholderActivityId = $stakeholderActivityId;
    }

    /**
     * Get stakeholderActivityId
     *
     * @return integer 
     */
    public function getStakeholderActivityId()
    {
        return $this->stakeholderActivityId;
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