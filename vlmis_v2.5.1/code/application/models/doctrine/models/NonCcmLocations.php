<?php

/**
*  Model for Non CCM Locations
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  NonCcmLocations
 */
class NonCcmLocations
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $locationName
     * @var string $locationName
     */
    private $locationName;

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
     * $warehouse
     * @var Warehouses
     */
    private $warehouse;

    /**
     * $rackInformation
     * @var RackInformation
     */
    private $rackInformation;

    /**
     * $area
     * @var ListDetail
     */
    private $area;

    /**
     * @var ListDetail
     */
    private $row;

    /**
     * $rack
     * @var ListDetail
     */
    private $rack;

    /**
     * $pallet
     * @var ListDetail
     */
    private $pallet;

    /**
     * $level
     * @var ListDetail
     */
    private $level;

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
     * Set locationName
     *
     * @param string $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
    }

    /**
     * Get locationName
     *
     * @return string 
     */
    public function getLocationName()
    {
        return $this->locationName;
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
     * Set rackInformation
     *
     * @param RackInformation $rackInformation
     */
    public function setRackInformation(\RackInformation $rackInformation)
    {
        $this->rackInformation = $rackInformation;
    }

    /**
     * Get rackInformation
     *
     * @return RackInformation 
     */
    public function getRackInformation()
    {
        return $this->rackInformation;
    }

    /**
     * Set area
     *
     * @param ListDetail $area
     */
    public function setArea(\ListDetail $area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return ListDetail 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set row
     *
     * @param ListDetail $row
     */
    public function setRow(\ListDetail $row)
    {
        $this->row = $row;
    }

    /**
     * Get row
     *
     * @return ListDetail 
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set rack
     *
     * @param ListDetail $rack
     */
    public function setRack(\ListDetail $rack)
    {
        $this->rack = $rack;
    }

    /**
     * Get rack
     *
     * @return ListDetail 
     */
    public function getRack()
    {
        return $this->rack;
    }

    /**
     * Set pallet
     *
     * @param ListDetail $pallet
     */
    public function setPallet(\ListDetail $pallet)
    {
        $this->pallet = $pallet;
    }

    /**
     * Get pallet
     *
     * @return ListDetail 
     */
    public function getPallet()
    {
        return $this->pallet;
    }

    /**
     * Set level
     *
     * @param ListDetail $level
     */
    public function setLevel(\ListDetail $level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return ListDetail 
     */
    public function getLevel()
    {
        return $this->level;
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