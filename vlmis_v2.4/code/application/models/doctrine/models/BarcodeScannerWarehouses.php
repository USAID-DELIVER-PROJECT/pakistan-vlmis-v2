<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * BarcodeScannerWarehouses
 */
class BarcodeScannerWarehouses
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var Warehouses
     */
    private $warehouse;

    /**
     * @var BarcodeScanners
     */
    private $scanner;


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
     * Set scanner
     *
     * @param BarcodeScanners $scanner
     */
    public function setScanner(\BarcodeScanners $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * Get scanner
     *
     * @return BarcodeScanners 
     */
    public function getScanner()
    {
        return $this->scanner;
    }
}