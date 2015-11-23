<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * StakeholderItemPackSizes
 */
class StakeholderItemPackSizes
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var text $packSizeDescription
     */
    private $packSizeDescription;

    /**
     * @var integer $length
     */
    private $length;

    /**
     * @var integer $width
     */
    private $width;

    /**
     * @var integer $height
     */
    private $height;

    /**
     * @var integer $batchNoStartPosition
     */
    private $batchNoStartPosition;

    /**
     * @var integer $batchNoEndPosition
     */
    private $batchNoEndPosition;

    /**
     * @var integer $expiryDateStartPosition
     */
    private $expiryDateStartPosition;

    /**
     * @var integer $expiryDateEndPosition
     */
    private $expiryDateEndPosition;

    /**
     * @var integer $gtinStartPosition
     */
    private $gtinStartPosition;

    /**
     * @var integer $gtinEndPosition
     */
    private $gtinEndPosition;

    /**
     * @var integer $batchLength
     */
    private $batchLength;

    /**
     * @var integer $quantityPerPack
     */
    private $quantityPerPack;

    /**
     * @var decimal $volumePerUnitNet
     */
    private $volumePerUnitNet;

    /**
     * @var boolean $prePrintedBarcode
     */
    private $prePrintedBarcode;

    /**
     * @var boolean $status
     */
    private $status;

    /**
     * @var integer $listRank
     */
    private $listRank;

    /**
     * @var decimal $volumPerVial
     */
    private $volumPerVial;

    /**
     * @var boolean $gtin
     */
    private $gtin;

    /**
     * @var boolean $batch
     */
    private $batch;

    /**
     * @var boolean $expiry
     */
    private $expiry;

    /**
     * @var string $itemGtin
     */
    private $itemGtin;

    /**
     * @var string $expiryDateFormat
     */
    private $expiryDateFormat;

    /**
     * @var ItemPackSizes
     */
    private $itemPackSize;

    /**
     * @var Stakeholders
     */
    private $stakeholder;

    /**
     * @var ListDetail
     */
    private $barcodeType;

    /**
     * @var ListDetail
     */
    private $packagingLevel;


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
     * @param integer $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set batchNoStartPosition
     *
     * @param integer $batchNoStartPosition
     */
    public function setBatchNoStartPosition($batchNoStartPosition)
    {
        $this->batchNoStartPosition = $batchNoStartPosition;
    }

    /**
     * Get batchNoStartPosition
     *
     * @return integer 
     */
    public function getBatchNoStartPosition()
    {
        return $this->batchNoStartPosition;
    }

    /**
     * Set batchNoEndPosition
     *
     * @param integer $batchNoEndPosition
     */
    public function setBatchNoEndPosition($batchNoEndPosition)
    {
        $this->batchNoEndPosition = $batchNoEndPosition;
    }

    /**
     * Get batchNoEndPosition
     *
     * @return integer 
     */
    public function getBatchNoEndPosition()
    {
        return $this->batchNoEndPosition;
    }

    /**
     * Set expiryDateStartPosition
     *
     * @param integer $expiryDateStartPosition
     */
    public function setExpiryDateStartPosition($expiryDateStartPosition)
    {
        $this->expiryDateStartPosition = $expiryDateStartPosition;
    }

    /**
     * Get expiryDateStartPosition
     *
     * @return integer 
     */
    public function getExpiryDateStartPosition()
    {
        return $this->expiryDateStartPosition;
    }

    /**
     * Set expiryDateEndPosition
     *
     * @param integer $expiryDateEndPosition
     */
    public function setExpiryDateEndPosition($expiryDateEndPosition)
    {
        $this->expiryDateEndPosition = $expiryDateEndPosition;
    }

    /**
     * Get expiryDateEndPosition
     *
     * @return integer 
     */
    public function getExpiryDateEndPosition()
    {
        return $this->expiryDateEndPosition;
    }

    /**
     * Set gtinStartPosition
     *
     * @param integer $gtinStartPosition
     */
    public function setGtinStartPosition($gtinStartPosition)
    {
        $this->gtinStartPosition = $gtinStartPosition;
    }

    /**
     * Get gtinStartPosition
     *
     * @return integer 
     */
    public function getGtinStartPosition()
    {
        return $this->gtinStartPosition;
    }

    /**
     * Set gtinEndPosition
     *
     * @param integer $gtinEndPosition
     */
    public function setGtinEndPosition($gtinEndPosition)
    {
        $this->gtinEndPosition = $gtinEndPosition;
    }

    /**
     * Get gtinEndPosition
     *
     * @return integer 
     */
    public function getGtinEndPosition()
    {
        return $this->gtinEndPosition;
    }

    /**
     * Set batchLength
     *
     * @param integer $batchLength
     */
    public function setBatchLength($batchLength)
    {
        $this->batchLength = $batchLength;
    }

    /**
     * Get batchLength
     *
     * @return integer 
     */
    public function getBatchLength()
    {
        return $this->batchLength;
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
     * Set volumePerUnitNet
     *
     * @param decimal $volumePerUnitNet
     */
    public function setVolumePerUnitNet($volumePerUnitNet)
    {
        $this->volumePerUnitNet = $volumePerUnitNet;
    }

    /**
     * Get volumePerUnitNet
     *
     * @return decimal 
     */
    public function getVolumePerUnitNet()
    {
        return $this->volumePerUnitNet;
    }

    /**
     * Set prePrintedBarcode
     *
     * @param boolean $prePrintedBarcode
     */
    public function setPrePrintedBarcode($prePrintedBarcode)
    {
        $this->prePrintedBarcode = $prePrintedBarcode;
    }

    /**
     * Get prePrintedBarcode
     *
     * @return boolean 
     */
    public function getPrePrintedBarcode()
    {
        return $this->prePrintedBarcode;
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
     * Set gtin
     *
     * @param boolean $gtin
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;
    }

    /**
     * Get gtin
     *
     * @return boolean 
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set batch
     *
     * @param boolean $batch
     */
    public function setBatch($batch)
    {
        $this->batch = $batch;
    }

    /**
     * Get batch
     *
     * @return boolean 
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * Set expiry
     *
     * @param boolean $expiry
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
    }

    /**
     * Get expiry
     *
     * @return boolean 
     */
    public function getExpiry()
    {
        return $this->expiry;
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
     * Set expiryDateFormat
     *
     * @param string $expiryDateFormat
     */
    public function setExpiryDateFormat($expiryDateFormat)
    {
        $this->expiryDateFormat = $expiryDateFormat;
    }

    /**
     * Get expiryDateFormat
     *
     * @return string 
     */
    public function getExpiryDateFormat()
    {
        return $this->expiryDateFormat;
    }

    /**
     * Set itemPackSize
     *
     * @param ItemPackSizes $itemPackSize
     */
    public function setItemPackSize(\ItemPackSizes $itemPackSize)
    {
        $this->itemPackSize = $itemPackSize;
    }

    /**
     * Get itemPackSize
     *
     * @return ItemPackSizes 
     */
    public function getItemPackSize()
    {
        return $this->itemPackSize;
    }

    /**
     * Set stakeholder
     *
     * @param Stakeholders $stakeholder
     */
    public function setStakeholder(\Stakeholders $stakeholder)
    {
        $this->stakeholder = $stakeholder;
    }

    /**
     * Get stakeholder
     *
     * @return Stakeholders 
     */
    public function getStakeholder()
    {
        return $this->stakeholder;
    }

    /**
     * Set barcodeType
     *
     * @param ListDetail $barcodeType
     */
    public function setBarcodeType(\ListDetail $barcodeType)
    {
        $this->barcodeType = $barcodeType;
    }

    /**
     * Get barcodeType
     *
     * @return ListDetail 
     */
    public function getBarcodeType()
    {
        return $this->barcodeType;
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
}