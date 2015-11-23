<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * VvmTransferHistory
 */
class VvmTransferHistory
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
     * @var date $createdDate
     */
    private $createdDate;

    /**
     * @var Users
     */
    private $createdBy;

    /**
     * @var StockBatch
     */
    private $batch;

    /**
     * @var VvmStages
     */
    private $fromVvmStage;

    /**
     * @var VvmStages
     */
    private $toVvmStage;


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
     * Set createdDate
     *
     * @param date $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get createdDate
     *
     * @return date 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
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

    /**
     * Set batch
     *
     * @param StockBatch $batch
     */
    public function setBatch(\StockBatch $batch)
    {
        $this->batch = $batch;
    }

    /**
     * Get batch
     *
     * @return StockBatch 
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Set fromVvmStage
     *
     * @param VvmStages $fromVvmStage
     */
    public function setFromVvmStage(\VvmStages $fromVvmStage)
    {
        $this->fromVvmStage = $fromVvmStage;
    }

    /**
     * Get fromVvmStage
     *
     * @return VvmStages 
     */
    public function getFromVvmStage()
    {
        return $this->fromVvmStage;
    }

    /**
     * Set toVvmStage
     *
     * @param VvmStages $toVvmStage
     */
    public function setToVvmStage(\VvmStages $toVvmStage)
    {
        $this->toVvmStage = $toVvmStage;
    }

    /**
     * Get toVvmStage
     *
     * @return VvmStages 
     */
    public function getToVvmStage()
    {
        return $this->toVvmStage;
    }
}