<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HfDataDetailDraft
 */
class HfDataDetailDraft
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var decimal $fixedInsideUcMale
     */
    private $fixedInsideUcMale;

    /**
     * @var decimal $fixedInsideUcFemale
     */
    private $fixedInsideUcFemale;

    /**
     * @var decimal $fixedOutsideUcMale
     */
    private $fixedOutsideUcMale;

    /**
     * @var decimal $fixedOutsideUcFemale
     */
    private $fixedOutsideUcFemale;

    /**
     * @var decimal $referalMale
     */
    private $referalMale;

    /**
     * @var decimal $referalFemale
     */
    private $referalFemale;

    /**
     * @var decimal $outreachMale
     */
    private $outreachMale;

    /**
     * @var decimal $outreachFemale
     */
    private $outreachFemale;

    /**
     * @var decimal $pregnantWomen
     */
    private $pregnantWomen;

    /**
     * @var decimal $nonPregnantWomen
     */
    private $nonPregnantWomen;

    /**
     * @var integer $vaccineScheduleId
     */
    private $vaccineScheduleId;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var Users
     */
    private $modifiedBy;

    /**
     * @var ListDetail
     */
    private $ageGroup;

    /**
     * @var HfDataMasterDraft
     */
    private $hfDataMaster;


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
     * Set fixedInsideUcMale
     *
     * @param decimal $fixedInsideUcMale
     */
    public function setFixedInsideUcMale($fixedInsideUcMale)
    {
        $this->fixedInsideUcMale = $fixedInsideUcMale;
    }

    /**
     * Get fixedInsideUcMale
     *
     * @return decimal 
     */
    public function getFixedInsideUcMale()
    {
        return $this->fixedInsideUcMale;
    }

    /**
     * Set fixedInsideUcFemale
     *
     * @param decimal $fixedInsideUcFemale
     */
    public function setFixedInsideUcFemale($fixedInsideUcFemale)
    {
        $this->fixedInsideUcFemale = $fixedInsideUcFemale;
    }

    /**
     * Get fixedInsideUcFemale
     *
     * @return decimal 
     */
    public function getFixedInsideUcFemale()
    {
        return $this->fixedInsideUcFemale;
    }

    /**
     * Set fixedOutsideUcMale
     *
     * @param decimal $fixedOutsideUcMale
     */
    public function setFixedOutsideUcMale($fixedOutsideUcMale)
    {
        $this->fixedOutsideUcMale = $fixedOutsideUcMale;
    }

    /**
     * Get fixedOutsideUcMale
     *
     * @return decimal 
     */
    public function getFixedOutsideUcMale()
    {
        return $this->fixedOutsideUcMale;
    }

    /**
     * Set fixedOutsideUcFemale
     *
     * @param decimal $fixedOutsideUcFemale
     */
    public function setFixedOutsideUcFemale($fixedOutsideUcFemale)
    {
        $this->fixedOutsideUcFemale = $fixedOutsideUcFemale;
    }

    /**
     * Get fixedOutsideUcFemale
     *
     * @return decimal 
     */
    public function getFixedOutsideUcFemale()
    {
        return $this->fixedOutsideUcFemale;
    }

    /**
     * Set referalMale
     *
     * @param decimal $referalMale
     */
    public function setReferalMale($referalMale)
    {
        $this->referalMale = $referalMale;
    }

    /**
     * Get referalMale
     *
     * @return decimal 
     */
    public function getReferalMale()
    {
        return $this->referalMale;
    }

    /**
     * Set referalFemale
     *
     * @param decimal $referalFemale
     */
    public function setReferalFemale($referalFemale)
    {
        $this->referalFemale = $referalFemale;
    }

    /**
     * Get referalFemale
     *
     * @return decimal 
     */
    public function getReferalFemale()
    {
        return $this->referalFemale;
    }

    /**
     * Set outreachMale
     *
     * @param decimal $outreachMale
     */
    public function setOutreachMale($outreachMale)
    {
        $this->outreachMale = $outreachMale;
    }

    /**
     * Get outreachMale
     *
     * @return decimal 
     */
    public function getOutreachMale()
    {
        return $this->outreachMale;
    }

    /**
     * Set outreachFemale
     *
     * @param decimal $outreachFemale
     */
    public function setOutreachFemale($outreachFemale)
    {
        $this->outreachFemale = $outreachFemale;
    }

    /**
     * Get outreachFemale
     *
     * @return decimal 
     */
    public function getOutreachFemale()
    {
        return $this->outreachFemale;
    }

    /**
     * Set pregnantWomen
     *
     * @param decimal $pregnantWomen
     */
    public function setPregnantWomen($pregnantWomen)
    {
        $this->pregnantWomen = $pregnantWomen;
    }

    /**
     * Get pregnantWomen
     *
     * @return decimal 
     */
    public function getPregnantWomen()
    {
        return $this->pregnantWomen;
    }

    /**
     * Set nonPregnantWomen
     *
     * @param decimal $nonPregnantWomen
     */
    public function setNonPregnantWomen($nonPregnantWomen)
    {
        $this->nonPregnantWomen = $nonPregnantWomen;
    }

    /**
     * Get nonPregnantWomen
     *
     * @return decimal 
     */
    public function getNonPregnantWomen()
    {
        return $this->nonPregnantWomen;
    }

    /**
     * Set vaccineScheduleId
     *
     * @param integer $vaccineScheduleId
     */
    public function setVaccineScheduleId($vaccineScheduleId)
    {
        $this->vaccineScheduleId = $vaccineScheduleId;
    }

    /**
     * Get vaccineScheduleId
     *
     * @return integer 
     */
    public function getVaccineScheduleId()
    {
        return $this->vaccineScheduleId;
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

    /**
     * Set ageGroup
     *
     * @param ListDetail $ageGroup
     */
    public function setAgeGroup(\ListDetail $ageGroup)
    {
        $this->ageGroup = $ageGroup;
    }

    /**
     * Get ageGroup
     *
     * @return ListDetail 
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * Set hfDataMaster
     *
     * @param HfDataMasterDraft $hfDataMaster
     */
    public function setHfDataMaster(\HfDataMasterDraft $hfDataMaster)
    {
        $this->hfDataMaster = $hfDataMaster;
    }

    /**
     * Get hfDataMaster
     *
     * @return HfDataMasterDraft 
     */
    public function getHfDataMaster()
    {
        return $this->hfDataMaster;
    }
}