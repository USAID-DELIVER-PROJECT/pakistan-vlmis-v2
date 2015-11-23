<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HfDataMaster
 */
class HfDataMaster
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $openingBalance
     */
    private $openingBalance;

    /**
     * @var integer $receivedBalance
     */
    private $receivedBalance;

    /**
     * @var integer $issueBalance
     */
    private $issueBalance;

    /**
     * @var integer $closingBalance
     */
    private $closingBalance;

    /**
     * @var integer $wastages
     */
    private $wastages;

    /**
     * @var integer $vialsUsed
     */
    private $vialsUsed;

    /**
     * @var integer $adjustments
     */
    private $adjustments;

    /**
     * @var datetime $reportingStartDate
     */
    private $reportingStartDate;

    /**
     * @var integer $childrenLiveBirth
     */
    private $childrenLiveBirth;

    /**
     * @var integer $survivingChildren011
     */
    private $survivingChildren011;

    /**
     * @var integer $childrenAged1223
     */
    private $childrenAged1223;

    /**
     * @var integer $pregnantWomen
     */
    private $pregnantWomen;

    /**
     * @var datetime $nearestExpiry
     */
    private $nearestExpiry;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var integer $itemAmc
     */
    private $itemAmc;

    /**
     * @var integer $cbas
     */
    private $cbas;

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
     * Set childrenLiveBirth
     *
     * @param integer $childrenLiveBirth
     */
    public function setChildrenLiveBirth($childrenLiveBirth)
    {
        $this->childrenLiveBirth = $childrenLiveBirth;
    }

    /**
     * Get childrenLiveBirth
     *
     * @return integer 
     */
    public function getChildrenLiveBirth()
    {
        return $this->childrenLiveBirth;
    }

    /**
     * Set survivingChildren011
     *
     * @param integer $survivingChildren011
     */
    public function setSurvivingChildren011($survivingChildren011)
    {
        $this->survivingChildren011 = $survivingChildren011;
    }

    /**
     * Get survivingChildren011
     *
     * @return integer 
     */
    public function getSurvivingChildren011()
    {
        return $this->survivingChildren011;
    }

    /**
     * Set childrenAged1223
     *
     * @param integer $childrenAged1223
     */
    public function setChildrenAged1223($childrenAged1223)
    {
        $this->childrenAged1223 = $childrenAged1223;
    }

    /**
     * Get childrenAged1223
     *
     * @return integer 
     */
    public function getChildrenAged1223()
    {
        return $this->childrenAged1223;
    }

    /**
     * Set pregnantWomen
     *
     * @param integer $pregnantWomen
     */
    public function setPregnantWomen($pregnantWomen)
    {
        $this->pregnantWomen = $pregnantWomen;
    }

    /**
     * Get pregnantWomen
     *
     * @return integer 
     */
    public function getPregnantWomen()
    {
        return $this->pregnantWomen;
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
     * Set cbas
     *
     * @param integer $cbas
     */
    public function setCbas($cbas)
    {
        $this->cbas = $cbas;
    }

    /**
     * Get cbas
     *
     * @return integer 
     */
    public function getCbas()
    {
        return $this->cbas;
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