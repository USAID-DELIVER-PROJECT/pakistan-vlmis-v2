<?php

/**
*  Model for Warehouse Vaccines Storage Types
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  WarehouseVaccineStorageTypes
 */
class WarehouseVaccineStorageTypes
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $temperatureType
     * @var integer $temperatureType
     */
    private $temperatureType;

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
     * $item
     * @var ItemPackSizes
     */
    private $item;

    /**
     * $warehouseType
     * @var WarehouseTypes
     */
    private $warehouseType;

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
     * Set temperatureType
     *
     * @param integer $temperatureType
     */
    public function setTemperatureType($temperatureType)
    {
        $this->temperatureType = $temperatureType;
    }

    /**
     * Get temperatureType
     *
     * @return integer 
     */
    public function getTemperatureType()
    {
        return $this->temperatureType;
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
     * Set item
     *
     * @param ItemPackSizes $item
     */
    public function setItem(\ItemPackSizes $item)
    {
        $this->item = $item;
    }

    /**
     * Get item
     *
     * @return ItemPackSizes 
     */
    public function getItem()
    {
        return $this->item;
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