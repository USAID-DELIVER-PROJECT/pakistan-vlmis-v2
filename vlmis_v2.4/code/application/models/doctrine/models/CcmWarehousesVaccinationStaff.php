<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmWarehousesVaccinationStaff
 */
class CcmWarehousesVaccinationStaff
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var CcmWarehouses
     */
    private $ccmWarehouse;

    /**
     * @var ListDetail
     */
    private $vaccinationStaff;


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
}