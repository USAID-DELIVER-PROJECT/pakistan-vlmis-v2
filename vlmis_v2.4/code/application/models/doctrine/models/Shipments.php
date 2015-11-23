<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Shipments
 */
class Shipments
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $referenceNumber
     */
    private $referenceNumber;

    /**
     * @var date $shipmentDate
     */
    private $shipmentDate;

    /**
     * @var decimal $shipmentQuantity
     */
    private $shipmentQuantity;

    /**
     * @var date $createdDate
     */
    private $createdDate;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * @var Warehouses
     */
    private $fundingSource;

    /**
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * @var Warehouses
     */
    private $warehouse;


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
     * Set fundingSource
     *
     * @param Warehouses $fundingSource
     */
    public function setFundingSource(\Warehouses $fundingSource)
    {
        $this->fundingSource = $fundingSource;
    }

    /**
     * Get fundingSource
     *
     * @return Warehouses 
     */
    public function getFundingSource()
    {
        return $this->fundingSource;
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
}