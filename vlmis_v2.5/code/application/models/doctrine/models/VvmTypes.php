<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * VvmTypes
 */
class VvmTypes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $vvmTypeName
     */
    private $vvmTypeName;

    /**
     * @var boolean $status
     */
    private $status;

    /**
     * @var integer $itemPackSizeId
     */
    private $itemPackSizeId;

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
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set vvmTypeName
     *
     * @param string $vvmTypeName
     */
    public function setVvmTypeName($vvmTypeName)
    {
        $this->vvmTypeName = $vvmTypeName;
    }

    /**
     * Get vvmTypeName
     *
     * @return string 
     */
    public function getVvmTypeName()
    {
        return $this->vvmTypeName;
    }

    /**
     * Set status
     *
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set itemPackSizeId
     *
     * @param integer $itemPackSizeId
     */
    public function setItemPackSizeId($itemPackSizeId)
    {
        $this->itemPackSizeId = $itemPackSizeId;
    }

    /**
     * Get itemPackSizeId
     *
     * @return integer 
     */
    public function getItemPackSizeId()
    {
        return $this->itemPackSizeId;
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