<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StockReceiveFromScanner
 */
class StockReceiveFromScanner
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @var StockDetail
     */
    private $stockDetail;


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
     * @param integer $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get quantity
     *
     * @return integer 
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
}