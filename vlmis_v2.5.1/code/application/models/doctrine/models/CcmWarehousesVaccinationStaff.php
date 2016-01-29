<?php

/**
*  Model for CCM Warehouses Vaccination Staff
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  CcmWarehousesVaccinationStaff
 */
class CcmWarehousesVaccinationStaff
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

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
     * $ccmWarehouse
     * @var CcmWarehouses
     */
    private $ccmWarehouse;

    /**
     * $vaccinationStaff
     * @var ListDetail
     */
    private $vaccinationStaff;

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
     * Set ccmWarehouse
     *
     * @param CcmWarehouses $ccmWarehouse
     */
    public function setCcmWarehouse(\CcmWarehouses $ccmWarehouse)
    {
        $this->ccmWarehouse = $ccmWarehouse;
    }

    /**
     * Get ccmWarehouse
     *
     * @return CcmWarehouses 
     */
    public function getCcmWarehouse()
    {
        return $this->ccmWarehouse;
    }

    /**
     * Set vaccinationStaff
     *
     * @param ListDetail $vaccinationStaff
     */
    public function setVaccinationStaff(\ListDetail $vaccinationStaff)
    {
        $this->vaccinationStaff = $vaccinationStaff;
    }

    /**
     * Get vaccinationStaff
     *
     * @return ListDetail 
     */
    public function getVaccinationStaff()
    {
        return $this->vaccinationStaff;
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