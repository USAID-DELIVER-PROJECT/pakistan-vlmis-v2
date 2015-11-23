<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * HfDataDetail
 */
class HfDataDetail
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
     * @var integer $pregnantWomen
     */
    private $pregnantWomen;

    /**
     * @var integer $nonPregnantWomen
     */
    private $nonPregnantWomen;

    /**
     * @var decimal $outreachMale
     */
    private $outreachMale;

    /**
     * @var decimal $outreachFemale
     */
    private $outreachFemale;

    /**
     * @var integer $vaccineScheduleId
     */
    private $vaccineScheduleId;

    /**
     * @var HfDataMaster
     */
    private $hfDataMaster;

    /**
     * @var ListDetail
     */
    private $ageGroup;


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
     * Set nonPregnantWomen
     *
     * @param integer $nonPregnantWomen
     */
    public function setNonPregnantWomen($nonPregnantWomen)
    {
        $this->nonPregnantWomen = $nonPregnantWomen;
    }

    /**
     * Get nonPregnantWomen
     *
     * @return integer 
     */
    public function getNonPregnantWomen()
    {
        return $this->nonPregnantWomen;
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
     * Set hfDataMaster
     *
     * @param HfDataMaster $hfDataMaster
     */
    public function setHfDataMaster(\HfDataMaster $hfDataMaster)
    {
        $this->hfDataMaster = $hfDataMaster;
    }

    /**
     * Get hfDataMaster
     *
     * @return HfDataMaster 
     */
    public function getHfDataMaster()
    {
        return $this->hfDataMaster;
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
}