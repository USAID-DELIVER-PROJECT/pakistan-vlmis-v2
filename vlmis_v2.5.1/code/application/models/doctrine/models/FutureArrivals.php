<?php

/**
*  Model for Future Arrivals
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  FutureArrivals
 */
class FutureArrivals
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $voucherNumber
     * @var string $voucherNumber
     */
    private $voucherNumber;

    /**
     * $transactionCounter
     * @var integer $transactionCounter
     */
    private $transactionCounter;

    /**
     * $expectedArrivalDate
     * @var datetime $expectedArrivalDate
     */
    private $expectedArrivalDate;

    /**
     * $referenceNumber
     * @var string $referenceNumber
     */
    private $referenceNumber;

    /**
     * $description
     * @var text $description
     */
    private $description;

    /**
     * $batchNumber
     * @var string $batchNumber
     */
    private $batchNumber;

    /**
     * $productionDate
     * @var datetime $productionDate
     */
    private $productionDate;

    /**
     * $expiryDate
     * @var datetime $expiryDate
     */
    private $expiryDate;

    /**
     * $unitPrice
     * @var float $unitPrice
     */
    private $unitPrice;

    /**
     * $quantity
     * @var integer $quantity
     */
    private $quantity;

    /**
     * $receivedQuantity
     * @var integer $receivedQuantity
     */
    private $receivedQuantity;

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
     * $stakeholderActivity
     * @var StakeholderActivities
     */
    private $stakeholderActivity;

    /**
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * $manufacturer
     * @var Stakeholders
     */
    private $manufacturer;

    /**
     * $vvmType
     * @var VvmTypes
     */
    private $vvmType;

    /**
     * $fromWarehouse
     * @var Warehouses
     */
    private $fromWarehouse;

    /**
     * $toWarehouse
     * @var Warehouses
     */
    private $toWarehouse;

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
     * Set manufacturer
     *
     * @param Stakeholders $manufacturer
     */
    public function setManufacturer(\Stakeholders $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * Get manufacturer
     *
     * @return Stakeholders 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set vvmType
     *
     * @param VvmTypes $vvmType
     */
    public function setVvmType(\VvmTypes $vvmType)
    {
        $this->vvmType = $vvmType;
    }

    /**
     * Get vvmType
     *
     * @return VvmTypes 
     */
    public function getVvmType()
    {
        return $this->vvmType;
    }

    /**
     * Set fromWarehouse
     *
     * @param Warehouses $fromWarehouse
     */
    public function setFromWarehouse(\Warehouses $fromWarehouse)
    {
        $this->fromWarehouse = $fromWarehouse;
    }

    /**
     * Get fromWarehouse
     *
     * @return Warehouses 
     */
    public function getFromWarehouse()
    {
        return $this->fromWarehouse;
    }

    /**
     * Set toWarehouse
     *
     * @param Warehouses $toWarehouse
     */
    public function setToWarehouse(\Warehouses $toWarehouse)
    {
        $this->toWarehouse = $toWarehouse;
    }

    /**
     * Get toWarehouse
     *
     * @return Warehouses 
     */
    public function getToWarehouse()
    {
        return $this->toWarehouse;
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