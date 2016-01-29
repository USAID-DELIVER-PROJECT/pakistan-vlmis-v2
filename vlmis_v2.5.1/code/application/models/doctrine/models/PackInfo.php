<?php

/**
*  Model for Pack Info
*/

use Doctrine\ORM\Mapping as ORM;

/**
 *  PackInfo
 */
class PackInfo
{
    /**
     * $pkId
     * @var integer $pkId
     */
    private $pkId;

    /**
     * $packSizeDescription
     * @var text $packSizeDescription
     */
    private $packSizeDescription;

    /**
     * $length
     * @var decimal $length
     */
    private $length;

    /**
     * $width
     * @var decimal $width
     */
    private $width;

    /**
     * 
     * $height
     * @var decimal $height
     */
    private $height;

    /**
     * $quantityPerPack
     * @var integer $quantityPerPack
     */
    private $quantityPerPack;

    /**
     * $status
     * @var boolean $status
     */
    private $status;

    /**
     * $listRank
     * @var integer $listRank
     */
    private $listRank;

    /**
     * $volumPerVial
     * @var decimal $volumPerVial
     */
    private $volumPerVial;

    /**
     * $itemGtin
     * @var string $itemGtin
     */
    private $itemGtin;

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
     * $stakeholderItemPackSize
     * @var StakeholderItemPackSizes
     */
    private $stakeholderItemPackSize;

    /**
     * $packagingLevel
     * @var ListDetail
     */
    private $packagingLevel;

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
     * Set packSizeDescription
     *
     * @param text $packSizeDescription
     */
    public function setPackSizeDescription($packSizeDescription)
    {
        $this->packSizeDescription = $packSizeDescription;
    }

    /**
     * Get packSizeDescription
     *
     * @return text 
     */
    public function getPackSizeDescription()
    {
        return $this->packSizeDescription;
    }

    /**
     * Set length
     *
     * @param decimal $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * Get length
     *
     * @return decimal 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param decimal $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return decimal 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param decimal $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return decimal 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set quantityPerPack
     *
     * @param integer $quantityPerPack
     */
    public function setQuantityPerPack($quantityPerPack)
    {
        $this->quantityPerPack = $quantityPerPack;
    }

    /**
     * Get quantityPerPack
     *
     * @return integer 
     */
    public function getQuantityPerPack()
    {
        return $this->quantityPerPack;
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
     * Set listRank
     *
     * @param integer $listRank
     */
    public function setListRank($listRank)
    {
        $this->listRank = $listRank;
    }

    /**
     * Get listRank
     *
     * @return integer 
     */
    public function getListRank()
    {
        return $this->listRank;
    }

    /**
     * Set volumPerVial
     *
     * @param decimal $volumPerVial
     */
    public function setVolumPerVial($volumPerVial)
    {
        $this->volumPerVial = $volumPerVial;
    }

    /**
     * Get volumPerVial
     *
     * @return decimal 
     */
    public function getVolumPerVial()
    {
        return $this->volumPerVial;
    }

    /**
     * Set itemGtin
     *
     * @param string $itemGtin
     */
    public function setItemGtin($itemGtin)
    {
        $this->itemGtin = $itemGtin;
    }

    /**
     * Get itemGtin
     *
     * @return string 
     */
    public function getItemGtin()
    {
        return $this->itemGtin;
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
     * Set stakeholderItemPackSize
     *
     * @param StakeholderItemPackSizes $stakeholderItemPackSize
     */
    public function setStakeholderItemPackSize(\StakeholderItemPackSizes $stakeholderItemPackSize)
    {
        $this->stakeholderItemPackSize = $stakeholderItemPackSize;
    }

    /**
     * Get stakeholderItemPackSize
     *
     * @return StakeholderItemPackSizes 
     */
    public function getStakeholderItemPackSize()
    {
        return $this->stakeholderItemPackSize;
    }

    /**
     * Set packagingLevel
     *
     * @param ListDetail $packagingLevel
     */
    public function setPackagingLevel(\ListDetail $packagingLevel)
    {
        $this->packagingLevel = $packagingLevel;
    }

    /**
     * Get packagingLevel
     *
     * @return ListDetail 
     */
    public function getPackagingLevel()
    {
        return $this->packagingLevel;
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