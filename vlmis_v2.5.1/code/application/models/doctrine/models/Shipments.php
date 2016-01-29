<?php

/**
*  Model for Shipments
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  Shipments
 */
class Shipments
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $referenceNumber
     * @var string $referenceNumber
     */
    private $referenceNumber;

    /**
     * $shipmentDate
     * @var date $shipmentDate
     */
    private $shipmentDate;

    /**
     * $shipmentQuantity
     * @var decimal $shipmentQuantity
     */
    private $shipmentQuantity;

    /**
     * $fundingSource
     * @var Warehouses $fundingSource
     */
    private $fundingSource;

    /**
     * $createdDate
     * @var date $createdDate
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
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

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
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set referenceNumber
     *
     * @param string $referenceNumber
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
    }

    /**
     * Get referenceNumber
     *
     * @return string 
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * Set shipmentDate
     *
     * @param date $shipmentDate
     */
    public function setShipmentDate($shipmentDate)
    {
        $this->shipmentDate = $shipmentDate;
    }

    /**
     * Get shipmentDate
     *
     * @return date 
     */
    public function getShipmentDate()
    {
        return $this->shipmentDate;
    }

    /**
     * Set shipmentQuantity
     *
     * @param decimal $shipmentQuantity
     */
    public function setShipmentQuantity($shipmentQuantity)
    {
        $this->shipmentQuantity = $shipmentQuantity;
    }

    /**
     * Get shipmentQuantity
     *
     * @return decimal 
     */
    public function getShipmentQuantity()
    {
        return $this->shipmentQuantity;
    }

    /**
     * Set fundingSourceId
     *
     * @param Warehouses $fundingSource
     */
    public function setFundingSource(\Warehouses $fundingSource)
    {
        $this->fundingSource = $fundingSource;
    }

    /**
     * Get fundingSourceId
     *
     * @return integer 
     */
    public function getFundingSource()
    {
        return $this->fundingSource;
    }

    /**
     * Set createdDate
     *
     * @param date $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return date 
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
     * Set itemPackSize
     *
     * @param ItemPackSizes $itemPackSize
     */
    public function setItemPackSize(\ItemPackSizes $itemPackSize)
    {
        $this->itemPackSize = $itemPackSize;
    }

    /**
     * Get itemPackSize
     *
     * @return ItemPackSizes 
     */
    public function getItemPackSize()
    {
        return $this->itemPackSize;
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
}