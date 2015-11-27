<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WarehousePopulation
 */
class WarehousePopulation
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $facilityTotalPouplation
     */
    private $facilityTotalPouplation;

    /**
     * @var integer $liveBirthsPerYear
     */
    private $liveBirthsPerYear;

    /**
     * @var integer $pregnantWomenPerYear
     */
    private $pregnantWomenPerYear;

    /**
     * @var integer $womenOfChildBearingAge
     */
    private $womenOfChildBearingAge;

    /**
     * @var datetime $estimationYear
     */
    private $estimationYear;

    /**
     * @var float $requirments4degree
     */
    private $requirments4degree;

    /**
     * @var float $requirments20degree
     */
    private $requirments20degree;

    /**
     * @var float $capacity4degree
     */
    private $capacity4degree;

    /**
     * @var float $capacity20degree
     */
    private $capacity20degree;

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
    private $modifiedBy;

    /**
     * @var Warehouses
     */
    private $warehouse;

    /**
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
     * Set facilityTotalPouplation
     *
     * @param integer $facilityTotalPouplation
     */
    public function setFacilityTotalPouplation($facilityTotalPouplation)
    {
        $this->facilityTotalPouplation = $facilityTotalPouplation;
    }

    /**
     * Get facilityTotalPouplation
     *
     * @return integer 
     */
    public function getFacilityTotalPouplation()
    {
        return $this->facilityTotalPouplation;
    }

    /**
     * Set liveBirthsPerYear
     *
     * @param integer $liveBirthsPerYear
     */
    public function setLiveBirthsPerYear($liveBirthsPerYear)
    {
        $this->liveBirthsPerYear = $liveBirthsPerYear;
    }

    /**
     * Get liveBirthsPerYear
     *
     * @return integer 
     */
    public function getLiveBirthsPerYear()
    {
        return $this->liveBirthsPerYear;
    }

    /**
     * Set pregnantWomenPerYear
     *
     * @param integer $pregnantWomenPerYear
     */
    public function setPregnantWomenPerYear($pregnantWomenPerYear)
    {
        $this->pregnantWomenPerYear = $pregnantWomenPerYear;
    }

    /**
     * Get pregnantWomenPerYear
     *
     * @return integer 
     */
    public function getPregnantWomenPerYear()
    {
        return $this->pregnantWomenPerYear;
    }

    /**
     * Set womenOfChildBearingAge
     *
     * @param integer $womenOfChildBearingAge
     */
    public function setWomenOfChildBearingAge($womenOfChildBearingAge)
    {
        $this->womenOfChildBearingAge = $womenOfChildBearingAge;
    }

    /**
     * Get womenOfChildBearingAge
     *
     * @return integer 
     */
    public function getWomenOfChildBearingAge()
    {
        return $this->womenOfChildBearingAge;
    }

    /**
     * Set estimationYear
     *
     * @param datetime $estimationYear
     */
    public function setEstimationYear($estimationYear)
    {
        $this->estimationYear = $estimationYear;
    }

    /**
     * Get estimationYear
     *
     * @return datetime 
     */
    public function getEstimationYear()
    {
        return $this->estimationYear;
    }

    /**
     * Set requirments4degree
     *
     * @param float $requirments4degree
     */
    public function setRequirments4degree($requirments4degree)
    {
        $this->requirments4degree = $requirments4degree;
    }

    /**
     * Get requirments4degree
     *
     * @return float 
     */
    public function getRequirments4degree()
    {
        return $this->requirments4degree;
    }

    /**
     * Set requirments20degree
     *
     * @param float $requirments20degree
     */
    public function setRequirments20degree($requirments20degree)
    {
        $this->requirments20degree = $requirments20degree;
    }

    /**
     * Get requirments20degree
     *
     * @return float 
     */
    public function getRequirments20degree()
    {
        return $this->requirments20degree;
    }

    /**
     * Set capacity4degree
     *
     * @param float $capacity4degree
     */
    public function setCapacity4degree($capacity4degree)
    {
        $this->capacity4degree = $capacity4degree;
    }

    /**
     * Get capacity4degree
     *
     * @return float 
     */
    public function getCapacity4degree()
    {
        return $this->capacity4degree;
    }

    /**
     * Set capacity20degree
     *
     * @param float $capacity20degree
     */
    public function setCapacity20degree($capacity20degree)
    {
        $this->capacity20degree = $capacity20degree;
    }

    /**
     * Get capacity20degree
     *
     * @return float 
     */
    public function getCapacity20degree()
    {
        return $this->capacity20degree;
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