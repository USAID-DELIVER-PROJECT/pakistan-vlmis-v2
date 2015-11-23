<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * GatepassDetail
 */
class GatepassDetail
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $quantity
     */
    private $quantity;

    /**
     * @var StockDetail
     */
    private $stockDetail;

    /**
     * @var GatepassMaster
     */
    private $gatepassMaster;


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
     * Set quantity
     *
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set stockDetail
     *
     * @param StockDetail $stockDetail
     */
    public function setStockDetail(\StockDetail $stockDetail)
    {
        $this->stockDetail = $stockDetail;
    }

    /**
     * Get stockDetail
     *
     * @return StockDetail 
     */
    public function getStockDetail()
    {
        return $this->stockDetail;
    }

    /**
     * Set gatepassMaster
     *
     * @param GatepassMaster $gatepassMaster
     */
    public function setGatepassMaster(\GatepassMaster $gatepassMaster)
    {
        $this->gatepassMaster = $gatepassMaster;
    }

    /**
     * Get gatepassMaster
     *
     * @return GatepassMaster 
     */
    public function getGatepassMaster()
    {
        return $this->gatepassMaster;
    }
}