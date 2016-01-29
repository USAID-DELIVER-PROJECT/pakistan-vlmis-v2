<?php
/**
*  php for HF Data Master
*/
?>
<?php

/**
*  HF Data Master
*/

use Doctrine\ORM\Mapping as ORM;

/**
*  Model for HF Data Master
*/

class HfDataMaster
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $openingBalance
     * @var integer $openingBalance
     */
    private $openingBalance;

    /**
     * $receivedBalance
     * @var integer $receivedBalance
     */
    private $receivedBalance;

    /**
     * $issueBalance
     * @var integer $issueBalance
     */
    private $issueBalance;

    /**
     * $closingBalance
     * @var integer $closingBalance
     */
    private $closingBalance;

    /**
     * $wastages
     * @var integer $wastages
     */
    private $wastages;

    /**
     * $vialsUsed
     * @var integer $vialsUsed
     */
    private $vialsUsed;

    /**
     * $adjustments
     * @var integer $adjustments
     */
    private $adjustments;

    /**
     * $reportingStartDate
     * @var datetime $reportingStartDate
     */
    private $reportingStartDate;

    /**
     * $nearestExpiry
     * @var datetime $nearestExpiry
     */
    private $nearestExpiry;

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
     * $itemAmc
     * @var integer $itemAmc
     */
    private $itemAmc;

    /**
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * @var Warehouses
     */
    private $warehouse;

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
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set openingBalance
     *
     * @param integer $openingBalance
     */
    public function setOpeningBalance($openingBalance)
    {
        $this->openingBalance = $openingBalance;
    }

    /**
     * Get openingBalance
     *
     * @return integer 
     */
    public function getOpeningBalance()
    {
        return $this->openingBalance;
    }

    /**
     * Set receivedBalance
     *
     * @param integer $receivedBalance
     */
    public function setReceivedBalance($receivedBalance)
    {
        $this->receivedBalance = $receivedBalance;
    }

    /**
     * Get receivedBalance
     *
     * @return integer 
     */
    public function getReceivedBalance()
    {
        return $this->receivedBalance;
    }

    /**
     * Set issueBalance
     *
     * @param integer $issueBalance
     */
    public function setIssueBalance($issueBalance)
    {
        $this->issueBalance = $issueBalance;
    }

    /**
     * Get issueBalance
     *
     * @return integer 
     */
    public function getIssueBalance()
    {
        return $this->issueBalance;
    }

    /**
     * Set closingBalance
     *
     * @param integer $closingBalance
     */
    public function setClosingBalance($closingBalance)
    {
        $this->closingBalance = $closingBalance;
    }

    /**
     * Get closingBalance
     *
     * @return integer 
     */
    public function getClosingBalance()
    {
        return $this->closingBalance;
    }

    /**
     * Set wastages
     *
     * @param integer $wastages
     */
    public function setWastages($wastages)
    {
        $this->wastages = $wastages;
    }

    /**
     * Get wastages
     *
     * @return integer 
     */
    public function getWastages()
    {
        return $this->wastages;
    }

    /**
     * Set vialsUsed
     *
     * @param integer $vialsUsed
     */
    public function setVialsUsed($vialsUsed)
    {
        $this->vialsUsed = $vialsUsed;
    }

    /**
     * Get vialsUsed
     *
     * @return integer 
     */
    public function getVialsUsed()
    {
        return $this->vialsUsed;
    }

    /**
     * Set adjustments
     *
     * @param integer $adjustments
     */
    public function setAdjustments($adjustments)
    {
        $this->adjustments = $adjustments;
    }

    /**
     * Get adjustments
     *
     * @return integer 
     */
    public function getAdjustments()
    {
        return $this->adjustments;
    }

    /**
     * Set reportingStartDate
     *
     * @param datetime $reportingStartDate
     */
    public function setReportingStartDate($reportingStartDate)
    {
        $this->reportingStartDate = $reportingStartDate;
    }

    /**
     * Get reportingStartDate
     *
     * @return datetime 
     */
    public function getReportingStartDate()
    {
        return $this->reportingStartDate;
    }

    /**
     * Set nearestExpiry
     *
     * @param datetime $nearestExpiry
     */
    public function setNearestExpiry($nearestExpiry)
    {
        $this->nearestExpiry = $nearestExpiry;
    }

    /**
     * Get nearestExpiry
     *
     * @return datetime 
     */
    public function getNearestExpiry()
    {
        return $this->nearestExpiry;
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
     * Set itemAmc
     *
     * @param integer $itemAmc
     */
    public function setItemAmc($itemAmc)
    {
        $this->itemAmc = $itemAmc;
    }

    /**
     * Get itemAmc
     *
     * @return integer 
     */
    public function getItemAmc()
    {
        return $this->itemAmc;
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
}