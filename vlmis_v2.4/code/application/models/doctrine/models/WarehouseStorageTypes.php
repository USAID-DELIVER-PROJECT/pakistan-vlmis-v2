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
}