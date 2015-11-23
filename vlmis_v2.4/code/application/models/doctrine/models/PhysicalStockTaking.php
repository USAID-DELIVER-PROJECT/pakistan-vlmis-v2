<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PhysicalStockTaking
 */
class PhysicalStockTaking
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var datetime $fromDate
     */
    private $fromDate;

    /**
     * @var datetime $toDate
     */
    private $toDate;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var string $remarks
     */
    private $remarks;


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
     * Set fromDate
     *
     * @param datetime $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * Get fromDate
     *
     * @return datetime 
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set toDate
     *
     * @param datetime $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * Get toDate
     *
     * @return datetime 
     */
    public function getToDate()
    {
        return $this->toDate;
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
}