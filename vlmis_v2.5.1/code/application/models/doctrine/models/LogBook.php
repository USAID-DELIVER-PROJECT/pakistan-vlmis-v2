<?php

/**
*  Model for Log Book
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  LogBook
 */
class LogBook
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $name
     * @var string $name
     */
    private $name;

    /**
     * $fatherName
     * @var string $fatherName
     */
    private $fatherName;

    /**
     * $gender
     * @var string $gender
     */
    private $gender;

    /**
     * $age
     * @var string $age
     */
    private $age;

    /**
     * $contact
     * @var string $contact
     */
    private $contact;

    /**
     * $address
     * @var string $address
     */
    private $address;

    /**
     * $unionCouncilId
     * @var integer $unionCouncilId
     */
    private $unionCouncilId;

    /**
     * $vaccinationDate
     * @var datetime $vaccinationDate
     */
    private $vaccinationDate;

    /**
     * $referToWarehouseId
     * @var integer $referToWarehouseId
     */
    private $referToWarehouseId;

    /**
     * $remarks
     * @var string $remarks
     */
    private $remarks;

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
     * $reportingStartDate
     * @var datetime $reportingStartDate
     */
    private $reportingStartDate;

    /**
     * $modifiedBy
     * @var Users
     */
    private $modifiedBy;

    /**
     * $district
     * @var Locations
     */
    private $district;

    /**
     * $warehouse
     * @var Warehouses
     */
    private $warehouse;

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set fatherName
     *
     * @param string $fatherName
     */
    public function setFatherName($fatherName)
    {
        $this->fatherName = $fatherName;
    }

    /**
     * Get fatherName
     *
     * @return string 
     */
    public function getFatherName()
    {
        return $this->fatherName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set age
     *
     * @param string $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Get age
     *
     * @return string 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set contact
     *
     * @param string $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
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
     * Set vaccinationDate
     *
     * @param datetime $vaccinationDate
     */
    public function setVaccinationDate($vaccinationDate)
    {
        $this->vaccinationDate = $vaccinationDate;
    }

    /**
     * Get vaccinationDate
     *
     * @return datetime 
     */
    public function getVaccinationDate()
    {
        return $this->vaccinationDate;
    }

    /**
     * Set referToWarehouseId
     *
     * @param integer $referToWarehouseId
     */
    public function setReferToWarehouseId($referToWarehouseId)
    {
        $this->referToWarehouseId = $referToWarehouseId;
    }

    /**
     * Get referToWarehouseId
     *
     * @return integer 
     */
    public function getReferToWarehouseId()
    {
        return $this->referToWarehouseId;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
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