<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ShipmentDetail
 */
class ShipmentDetail
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var date $receivedDate
     */
    private $receivedDate;

    /**
     * @var decimal $receivedQuantity
     */
    private $receivedQuantity;

    /**
     * @var date $createdDate
     */
    private $createdDate;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var Shipments
     */
    private $shipment;

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
     * Set receivedDate
     *
     * @param date $receivedDate
     */
    public function setReceivedDate($receivedDate)
    {
        $this->receivedDate = $receivedDate;
    }

    /**
     * Get receivedDate
     *
     * @return date 
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * Set receivedQuantity
     *
     * @param decimal $receivedQuantity
     */
    public function setReceivedQuantity($receivedQuantity)
    {
        $this->receivedQuantity = $receivedQuantity;
    }

    /**
     * Get receivedQuantity
     *
     * @return decimal 
     */
    public function getReceivedQuantity()
    {
        return $this->receivedQuantity;
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
     * Set shipment
     *
     * @param Shipments $shipment
     */
    public function setShipment(\Shipments $shipment)
    {
        $this->shipment = $shipment;
    }

    /**
     * Get shipment
     *
     * @return Shipments 
     */
    public function getShipment()
    {
        return $this->shipment;
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