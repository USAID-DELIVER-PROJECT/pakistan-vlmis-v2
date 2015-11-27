<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PipelineConsignmentsCopy
 */
class PipelineConsignmentsCopy
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $voucherNumber
     */
    private $voucherNumber;

    /**
     * @var integer $transactionCounter
     */
    private $transactionCounter;

    /**
     * @var datetime $expectedArrivalDate
     */
    private $expectedArrivalDate;

    /**
     * @var string $referenceNumber
     */
    private $referenceNumber;

    /**
     * @var integer $stakeholderActivityId
     */
    private $stakeholderActivityId;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var integer $itemPackSizeId
     */
    private $itemPackSizeId;

    /**
     * @var string $batchNumber
     */
    private $batchNumber;

    /**
     * @var datetime $productionDate
     */
    private $productionDate;

    /**
     * @var datetime $expiryDate
     */
    private $expiryDate;

    /**
     * @var integer $manufacturerId
     */
    private $manufacturerId;

    /**
     * @var integer $vvmTypeId
     */
    private $vvmTypeId;

    /**
     * @var float $unitPrice
     */
    private $unitPrice;

    /**
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @var integer $receivedQuantity
     */
    private $receivedQuantity;

    /**
     * @var integer $fromWarehouseId
     */
    private $fromWarehouseId;

    /**
     * @var integer $toWarehouseId
     */
    private $toWarehouseId;

    /**
     * @var integer $createdBy
     */
    private $createdBy;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var integer $masterId
     */
    private $masterId;

    /**
     * @var string $status
     */
    private $status;

    /**
     * @var integer $batchId
     */
    private $batchId;

    /**
     * @var integer $transactionType
     */
    private $transactionType;


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
     * Set voucherNumber
     *
     * @param string $voucherNumber
     */
    public function setVoucherNumber($voucherNumber)
    {
        $this->voucherNumber = $voucherNumber;
    }

    /**
     * Get voucherNumber
     *
     * @return string 
     */
    public function getVoucherNumber()
    {
        return $this->voucherNumber;
    }

    /**
     * Set transactionCounter
     *
     * @param integer $transactionCounter
     */
    public function setTransactionCounter($transactionCounter)
    {
        $this->transactionCounter = $transactionCounter;
    }

    /**
     * Get transactionCounter
     *
     * @return integer 
     */
    public function getTransactionCounter()
    {
        return $this->transactionCounter;
    }

    /**
     * Set expectedArrivalDate
     *
     * @param datetime $expectedArrivalDate
     */
    public function setExpectedArrivalDate($expectedArrivalDate)
    {
        $this->expectedArrivalDate = $expectedArrivalDate;
    }

    /**
     * Get expectedArrivalDate
     *
     * @return datetime 
     */
    public function getExpectedArrivalDate()
    {
        return $this->expectedArrivalDate;
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set itemPackSizeId
     *
     * @param integer $itemPackSizeId
     */
    public function setItemPackSizeId($itemPackSizeId)
    {
        $this->itemPackSizeId = $itemPackSizeId;
    }

    /**
     * Get itemPackSizeId
     *
     * @return integer 
     */
    public function getItemPackSizeId()
    {
        return $this->itemPackSizeId;
    }

    /**
     * Set batchNumber
     *
     * @param string $batchNumber
     */
    public function setBatchNumber($batchNumber)
    {
        $this->batchNumber = $batchNumber;
    }

    /**
     * Get batchNumber
     *
     * @return string 
     */
    public function getBatchNumber()
    {
        return $this->batchNumber;
    }

    /**
     * Set productionDate
     *
     * @param datetime $productionDate
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;
    }

    /**
     * Get productionDate
     *
     * @return datetime 
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set expiryDate
     *
     * @param datetime $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get expiryDate
     *
     * @return datetime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set manufacturerId
     *
     * @param integer $manufacturerId
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->manufacturerId = $manufacturerId;
    }

    /**
     * Get manufacturerId
     *
     * @return integer 
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * Set vvmTypeId
     *
     * @param integer $vvmTypeId
     */
    public function setVvmTypeId($vvmTypeId)
    {
        $this->vvmTypeId = $vvmTypeId;
    }

    /**
     * Get vvmTypeId
     *
     * @return integer 
     */
    public function getVvmTypeId()
    {
        return $this->vvmTypeId;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
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
     * Set receivedQuantity
     *
     * @param integer $receivedQuantity
     */
    public function setReceivedQuantity($receivedQuantity)
    {
        $this->receivedQuantity = $receivedQuantity;
    }

    /**
     * Get receivedQuantity
     *
     * @return integer 
     */
    public function getReceivedQuantity()
    {
        return $this->receivedQuantity;
    }

    /**
     * Set fromWarehouseId
     *
     * @param integer $fromWarehouseId
     */
    public function setFromWarehouseId($fromWarehouseId)
    {
        $this->fromWarehouseId = $fromWarehouseId;
    }

    /**
     * Get fromWarehouseId
     *
     * @return integer 
     */
    public function getFromWarehouseId()
    {
        return $this->fromWarehouseId;
    }

    /**
     * Set toWarehouseId
     *
     * @param integer $toWarehouseId
     */
    public function setToWarehouseId($toWarehouseId)
    {
        $this->toWarehouseId = $toWarehouseId;
    }

    /**
     * Get toWarehouseId
     *
     * @return integer 
     */
    public function getToWarehouseId()
    {
        return $this->toWarehouseId;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
     * Set masterId
     *
     * @param integer $masterId
     */
    public function setMasterId($masterId)
    {
        $this->masterId = $masterId;
    }

    /**
     * Get masterId
     *
     * @return integer 
     */
    public function getMasterId()
    {
        return $this->masterId;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set batchId
     *
     * @param integer $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * Get batchId
     *
     * @return integer 
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * Set transactionType
     *
     * @param integer $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
    }

    /**
     * Get transactionType
     *
     * @return integer 
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }
}