<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * System
 */
class ConsumptionComments {

    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var datetime $startDate
     */
    private $reportingStartDate;

    /**
     * @var string $warehouseId
     */
    private $warehouseId;

    /**
     * @var string $comments
     */
    private $comments;

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
     * @var Users
     */
    private $createdBy;

    /**
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId() {
        return $this->pkId;
    }

    /**
     * Set startDate
     *
     * @param datetime $startDate
     */
    public function setReportingStartDate($reportingStartDate) {
        $this->reportingStartDate = $reportingStartDate;
    }

    /**
     * Get startDate
     *
     * @return datetime 
     */
    public function getReportingStartDate() {
        return $this->reportingStartDate;
    }

    /**
     * Set tagLine
     *
     * @param string $tagLine
     */
    public function setComments($comments) {
        $this->comments = $comments;
    }

    /**
     * Get tagLine
     *
     * @return string 
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setWarehouse(\Warehouses $warehouseId) {
        $this->warehouseId = $warehouseId;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getWarehouse() {
        return $this->warehouseId;
    }

    /**
     * Set createdDate
     *
     * @param datetime $createdDate
     */
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return datetime 
     */
    public function getCreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate
     *
     * @param datetime $modifiedDate
     */
    public function setModifiedDate($modifiedDate) {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * Get modifiedDate
     *
     * @return datetime 
     */
    public function getModifiedDate() {
        return $this->modifiedDate;
    }

    /**
     * Set modifiedBy
     *
     * @param Users $modifiedBy
     */
    public function setModifiedBy(\Users $modifiedBy) {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * Get modifiedBy
     *
     * @return Users 
     */
    public function getModifiedBy() {
        return $this->modifiedBy;
    }

    /**
     * Set createdBy
     *
     * @param Users $createdBy
     */
    public function setCreatedBy(\Users $createdBy) {
        $this->createdBy = $createdBy;
    }

    /**
     * Get createdBy
     *
     * @return Users 
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

}
