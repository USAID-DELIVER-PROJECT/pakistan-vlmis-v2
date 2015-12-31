<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmAssetTypes
 */
class CcmAssetTypes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var string $assetTypeName
     */
    private $assetTypeName;

    /**
     * @var boolean $status
     */
    private $status;

    /**
     * @var integer $ccmEquipmentTypeId
     */
    private $ccmEquipmentTypeId;

    /**
     * @var datetime $createdDate
     */
    private $createdDate;

    /**
     * @var datetime $modifiedDate
     */
    private $modifiedDate;

    /**
     * @var CcmAssetTypes
     */
    private $parent;

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
     * Set assetTypeName
     *
     * @param string $assetTypeName
     */
    public function setAssetTypeName($assetTypeName)
    {
        $this->assetTypeName = $assetTypeName;
    }

    /**
     * Get assetTypeName
     *
     * @return string 
     */
    public function getAssetTypeName()
    {
        return $this->assetTypeName;
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
     * Set ccmEquipmentTypeId
     *
     * @param integer $ccmEquipmentTypeId
     */
    public function setCcmEquipmentTypeId($ccmEquipmentTypeId)
    {
        $this->ccmEquipmentTypeId = $ccmEquipmentTypeId;
    }

    /**
     * Get ccmEquipmentTypeId
     *
     * @return integer 
     */
    public function getCcmEquipmentTypeId()
    {
        return $this->ccmEquipmentTypeId;
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
     * Set parent
     *
     * @param CcmAssetTypes $parent
     */
    public function setParent(\CcmAssetTypes $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return CcmAssetTypes 
     */
    public function getParent()
    {
        return $this->parent;
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