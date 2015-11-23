<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WarehouseInactive
 */
class WarehouseInactive
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var date $inactiveDate
     */
    private $inactiveDate;

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
     * Set inactiveDate
     *
     * @param date $inactiveDate
     */
    public function setInactiveDate($inactiveDate)
    {
        $this->inactiveDate = $inactiveDate;
    }

    /**
     * Get inactiveDate
     *
     * @return date 
     */
    public function getInactiveDate()
    {
        return $this->inactiveDate;
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