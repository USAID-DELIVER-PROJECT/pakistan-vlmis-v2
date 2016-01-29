<?php

/**
*  Model for Gatepass Deatil
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  GatepassDetail
 */
class GatepassDetail
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $quantity
     * @var string $quantity
     */
    private $quantity;

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
     * $stockDetail
     * @var StockDetail
     */
    private $stockDetail;

    /**
     * $gatepassMaster
     * @var GatepassMaster
     */
    private $gatepassMaster;

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