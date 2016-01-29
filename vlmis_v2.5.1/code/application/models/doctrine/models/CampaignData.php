<?php

/**
*  Model for Campaign Data
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  CampaignData
 */
class CampaignData
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $campaignDay
     * @var integer $campaignDay
     */
    private $campaignDay;

    /**
     * $dailyTarget
     * @var integer $dailyTarget
     */
    private $dailyTarget;

    /**
     * $targetAgeSixMonths
     * @var integer $targetAgeSixMonths
     */
    private $targetAgeSixMonths;

    /**
     * $targetAgeSixtyMonths
     * @var integer $targetAgeSixtyMonths
     */
    private $targetAgeSixtyMonths;

    /**
     * $householdVisited
     * @var integer $householdVisited
     */
    private $householdVisited;

    /**
     * $multipleFamilyHousehold
     * @var integer $multipleFamilyHousehold
     */
    private $multipleFamilyHousehold;

    /**
     * $totalCoverage
     * @var string $totalCoverage
     */
    private $totalCoverage;

    /**
     * $refusalCovered
     * @var string $refusalCovered
     */
    private $refusalCovered;

    /**
     * $recordReference
     * @var string $recordReference
     */
    private $recordReference;

    /**
     * $coverageNotAccessible
     * @var string $coverageNotAccessible
     */
    private $coverageNotAccessible;

    /**
     * $recordNotAccessible
     * @var string $recordNotAccessible
     */
    private $recordNotAccessible;

    /**
     * $recordRefusal
     * @var string $recordRefusal
     */
    private $recordRefusal;

    /**
     * $coverageMobileChildren
     * @var string $coverageMobileChildren
     */
    private $coverageMobileChildren;

    /**
     * $reportedWithWeakness
     * @var string $reportedWithWeakness
     */
    private $reportedWithWeakness;

    /**
     * $zeroDoses
     * @var string $zeroDoses
     */
    private $zeroDoses;

    /**
     * $coverageReference
     * @var string $coverageReference
     */
    private $coverageReference;

    /**
     * $inaccessibleCoverage
     * @var string $inaccessibleCoverage
     */
    private $inaccessibleCoverage;

    /**
     * $teamsReported
     * @var integer $teamsReported
     */
    private $teamsReported;

    /**
     * $vialsGiven
     * @var string $vialsGiven
     */
    private $vialsGiven;

    /**
     * $vialsUsed
     * @var string $vialsUsed
     */
    private $vialsUsed;

    /**
     * $vialsReturned
     * @var string $vialsReturned
     */
    private $vialsReturned;

    /**
     * $vialsExpired
     * @var string $vialsExpired
     */
    private $vialsExpired;

    /**
     * $reconSyrWasted
     * @var integer $reconSyrWasted
     */
    private $reconSyrWasted;

    /**
     * $adSyrWasted
     * @var integer $adSyrWasted
     */
    private $adSyrWasted;

    /**
     * $unionCouncilId
     * @var integer $unionCouncilId
     */
    private $unionCouncilId;

    /**
     * $campaignTargetId
     * @var integer $campaignTargetId
     */
    private $campaignTargetId;

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
     * $itemPackSize
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * $campaign
     * @var Campaigns
     */
    private $campaign;

    /**
     * $district
     * @var Locations
     */
    private $district;

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
     * Set campaignDay
     *
     * @param integer $campaignDay
     */
    public function setCampaignDay($campaignDay)
    {
        $this->campaignDay = $campaignDay;
    }

    /**
     * Get campaignDay
     *
     * @return integer 
     */
    public function getCampaignDay()
    {
        return $this->campaignDay;
    }

    /**
     * Set dailyTarget
     *
     * @param integer $dailyTarget
     */
    public function setDailyTarget($dailyTarget)
    {
        $this->dailyTarget = $dailyTarget;
    }

    /**
     * Get dailyTarget
     *
     * @return integer 
     */
    public function getDailyTarget()
    {
        return $this->dailyTarget;
    }

    /**
     * Set targetAgeSixMonths
     *
     * @param integer $targetAgeSixMonths
     */
    public function setTargetAgeSixMonths($targetAgeSixMonths)
    {
        $this->targetAgeSixMonths = $targetAgeSixMonths;
    }

    /**
     * Get targetAgeSixMonths
     *
     * @return integer 
     */
    public function getTargetAgeSixMonths()
    {
        return $this->targetAgeSixMonths;
    }

    /**
     * Set targetAgeSixtyMonths
     *
     * @param integer $targetAgeSixtyMonths
     */
    public function setTargetAgeSixtyMonths($targetAgeSixtyMonths)
    {
        $this->targetAgeSixtyMonths = $targetAgeSixtyMonths;
    }

    /**
     * Get targetAgeSixtyMonths
     *
     * @return integer 
     */
    public function getTargetAgeSixtyMonths()
    {
        return $this->targetAgeSixtyMonths;
    }

    /**
     * Set householdVisited
     *
     * @param integer $householdVisited
     */
    public function setHouseholdVisited($householdVisited)
    {
        $this->householdVisited = $householdVisited;
    }

    /**
     * Get householdVisited
     *
     * @return integer 
     */
    public function getHouseholdVisited()
    {
        return $this->householdVisited;
    }

    /**
     * Set multipleFamilyHousehold
     *
     * @param integer $multipleFamilyHousehold
     */
    public function setMultipleFamilyHousehold($multipleFamilyHousehold)
    {
        $this->multipleFamilyHousehold = $multipleFamilyHousehold;
    }

    /**
     * Get multipleFamilyHousehold
     *
     * @return integer 
     */
    public function getMultipleFamilyHousehold()
    {
        return $this->multipleFamilyHousehold;
    }

    /**
     * Set totalCoverage
     *
     * @param string $totalCoverage
     */
    public function setTotalCoverage($totalCoverage)
    {
        $this->totalCoverage = $totalCoverage;
    }

    /**
     * Get totalCoverage
     *
     * @return string 
     */
    public function getTotalCoverage()
    {
        return $this->totalCoverage;
    }

    /**
     * Set refusalCovered
     *
     * @param string $refusalCovered
     */
    public function setRefusalCovered($refusalCovered)
    {
        $this->refusalCovered = $refusalCovered;
    }

    /**
     * Get refusalCovered
     *
     * @return string 
     */
    public function getRefusalCovered()
    {
        return $this->refusalCovered;
    }

    /**
     * Set recordReference
     *
     * @param string $recordReference
     */
    public function setRecordReference($recordReference)
    {
        $this->recordReference = $recordReference;
    }

    /**
     * Get recordReference
     *
     * @return string 
     */
    public function getRecordReference()
    {
        return $this->recordReference;
    }

    /**
     * Set coverageNotAccessible
     *
     * @param string $coverageNotAccessible
     */
    public function setCoverageNotAccessible($coverageNotAccessible)
    {
        $this->coverageNotAccessible = $coverageNotAccessible;
    }

    /**
     * Get coverageNotAccessible
     *
     * @return string 
     */
    public function getCoverageNotAccessible()
    {
        return $this->coverageNotAccessible;
    }

    /**
     * Set recordNotAccessible
     *
     * @param string $recordNotAccessible
     */
    public function setRecordNotAccessible($recordNotAccessible)
    {
        $this->recordNotAccessible = $recordNotAccessible;
    }

    /**
     * Get recordNotAccessible
     *
     * @return string 
     */
    public function getRecordNotAccessible()
    {
        return $this->recordNotAccessible;
    }

    /**
     * Set recordRefusal
     *
     * @param string $recordRefusal
     */
    public function setRecordRefusal($recordRefusal)
    {
        $this->recordRefusal = $recordRefusal;
    }

    /**
     * Get recordRefusal
     *
     * @return string 
     */
    public function getRecordRefusal()
    {
        return $this->recordRefusal;
    }

    /**
     * Set coverageMobileChildren
     *
     * @param string $coverageMobileChildren
     */
    public function setCoverageMobileChildren($coverageMobileChildren)
    {
        $this->coverageMobileChildren = $coverageMobileChildren;
    }

    /**
     * Get coverageMobileChildren
     *
     * @return string 
     */
    public function getCoverageMobileChildren()
    {
        return $this->coverageMobileChildren;
    }

    /**
     * Set reportedWithWeakness
     *
     * @param string $reportedWithWeakness
     */
    public function setReportedWithWeakness($reportedWithWeakness)
    {
        $this->reportedWithWeakness = $reportedWithWeakness;
    }

    /**
     * Get reportedWithWeakness
     *
     * @return string 
     */
    public function getReportedWithWeakness()
    {
        return $this->reportedWithWeakness;
    }

    /**
     * Set zeroDoses
     *
     * @param string $zeroDoses
     */
    public function setZeroDoses($zeroDoses)
    {
        $this->zeroDoses = $zeroDoses;
    }

    /**
     * Get zeroDoses
     *
     * @return string 
     */
    public function getZeroDoses()
    {
        return $this->zeroDoses;
    }

    /**
     * Set coverageReference
     *
     * @param string $coverageReference
     */
    public function setCoverageReference($coverageReference)
    {
        $this->coverageReference = $coverageReference;
    }

    /**
     * Get coverageReference
     *
     * @return string 
     */
    public function getCoverageReference()
    {
        return $this->coverageReference;
    }

    /**
     * Set inaccessibleCoverage
     *
     * @param string $inaccessibleCoverage
     */
    public function setInaccessibleCoverage($inaccessibleCoverage)
    {
        $this->inaccessibleCoverage = $inaccessibleCoverage;
    }

    /**
     * Get inaccessibleCoverage
     *
     * @return string 
     */
    public function getInaccessibleCoverage()
    {
        return $this->inaccessibleCoverage;
    }

    /**
     * Set teamsReported
     *
     * @param integer $teamsReported
     */
    public function setTeamsReported($teamsReported)
    {
        $this->teamsReported = $teamsReported;
    }

    /**
     * Get teamsReported
     *
     * @return integer 
     */
    public function getTeamsReported()
    {
        return $this->teamsReported;
    }

    /**
     * Set vialsGiven
     *
     * @param string $vialsGiven
     */
    public function setVialsGiven($vialsGiven)
    {
        $this->vialsGiven = $vialsGiven;
    }

    /**
     * Get vialsGiven
     *
     * @return string 
     */
    public function getVialsGiven()
    {
        return $this->vialsGiven;
    }

    /**
     * Set vialsUsed
     *
     * @param string $vialsUsed
     */
    public function setVialsUsed($vialsUsed)
    {
        $this->vialsUsed = $vialsUsed;
    }

    /**
     * Get vialsUsed
     *
     * @return string 
     */
    public function getVialsUsed()
    {
        return $this->vialsUsed;
    }

    /**
     * Set vialsReturned
     *
     * @param string $vialsReturned
     */
    public function setVialsReturned($vialsReturned)
    {
        $this->vialsReturned = $vialsReturned;
    }

    /**
     * Get vialsReturned
     *
     * @return string 
     */
    public function getVialsReturned()
    {
        return $this->vialsReturned;
    }

    /**
     * Set vialsExpired
     *
     * @param string $vialsExpired
     */
    public function setVialsExpired($vialsExpired)
    {
        $this->vialsExpired = $vialsExpired;
    }

    /**
     * Get vialsExpired
     *
     * @return string 
     */
    public function getVialsExpired()
    {
        return $this->vialsExpired;
    }

    /**
     * Set reconSyrWasted
     *
     * @param integer $reconSyrWasted
     */
    public function setReconSyrWasted($reconSyrWasted)
    {
        $this->reconSyrWasted = $reconSyrWasted;
    }

    /**
     * Get reconSyrWasted
     *
     * @return integer 
     */
    public function getReconSyrWasted()
    {
        return $this->reconSyrWasted;
    }

    /**
     * Set adSyrWasted
     *
     * @param integer $adSyrWasted
     */
    public function setAdSyrWasted($adSyrWasted)
    {
        $this->adSyrWasted = $adSyrWasted;
    }

    /**
     * Get adSyrWasted
     *
     * @return integer 
     */
    public function getAdSyrWasted()
    {
        return $this->adSyrWasted;
    }

    /**
     * Set unionCouncilId
     *
     * @param integer $unionCouncilId
     */
    public function setUnionCouncilId($unionCouncilId)
    {
        $this->unionCouncilId = $unionCouncilId;
    }

    /**
     * Get unionCouncilId
     *
     * @return integer 
     */
    public function getUnionCouncilId()
    {
        return $this->unionCouncilId;
    }

    /**
     * Set campaignTargetId
     *
     * @param integer $campaignTargetId
     */
    public function setCampaignTargetId($campaignTargetId)
    {
        $this->campaignTargetId = $campaignTargetId;
    }

    /**
     * Get campaignTargetId
     *
     * @return integer 
     */
    public function getCampaignTargetId()
    {
        return $this->campaignTargetId;
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
     * Set campaign
     *
     * @param Campaigns $campaign
     */
    public function setCampaign(\Campaigns $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Get campaign
     *
     * @return Campaigns 
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set district
     *
     * @param Locations $district
     */
    public function setDistrict(\Locations $district)
    {
        $this->district = $district;
    }

    /**
     * Get district
     *
     * @return Locations 
     */
    public function getDistrict()
    {
        return $this->district;
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