<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CcmColdRooms
 */
class CcmColdRooms
{
    /**
     * @var integer $pkId
     */
    private $pkId;

    /**
     * @var integer $coolingSystem
     */
    private $coolingSystem;

    /**
     * @var boolean $hasVoltage
     */
    private $hasVoltage;

    /**
     * @var integer $temperatureRecordingSystem
     */
    private $temperatureRecordingSystem;

    /**
     * @var integer $typeRecordingSystem
     */
    private $typeRecordingSystem;

    /**
     * @var integer $refrigeratorGasType
     */
    private $refrigeratorGasType;

    /**
     * @var integer $backupGenerator
     */
    private $backupGenerator;

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
     * @var CcmAssetTypes
     */
    private $ccmAssetSubType;

    /**
     * @var ColdChain
     */
    private $ccm;

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
     * Set coolingSystem
     *
     * @param integer $coolingSystem
     */
    public function setCoolingSystem($coolingSystem)
    {
        $this->coolingSystem = $coolingSystem;
    }

    /**
     * Get coolingSystem
     *
     * @return integer 
     */
    public function getCoolingSystem()
    {
        return $this->coolingSystem;
    }

    /**
     * Set hasVoltage
     *
     * @param boolean $hasVoltage
     */
    public function setHasVoltage($hasVoltage)
    {
        $this->hasVoltage = $hasVoltage;
    }

    /**
     * Get hasVoltage
     *
     * @return boolean 
     */
    public function getHasVoltage()
    {
        return $this->hasVoltage;
    }

    /**
     * Set temperatureRecordingSystem
     *
     * @param integer $temperatureRecordingSystem
     */
    public function setTemperatureRecordingSystem($temperatureRecordingSystem)
    {
        $this->temperatureRecordingSystem = $temperatureRecordingSystem;
    }

    /**
     * Get temperatureRecordingSystem
     *
     * @return integer 
     */
    public function getTemperatureRecordingSystem()
    {
        return $this->temperatureRecordingSystem;
    }

    /**
     * Set typeRecordingSystem
     *
     * @param integer $typeRecordingSystem
     */
    public function setTypeRecordingSystem($typeRecordingSystem)
    {
        $this->typeRecordingSystem = $typeRecordingSystem;
    }

    /**
     * Get typeRecordingSystem
     *
     * @return integer 
     */
    public function getTypeRecordingSystem()
    {
        return $this->typeRecordingSystem;
    }

    /**
     * Set refrigeratorGasType
     *
     * @param integer $refrigeratorGasType
     */
    public function setRefrigeratorGasType($refrigeratorGasType)
    {
        $this->refrigeratorGasType = $refrigeratorGasType;
    }

    /**
     * Get refrigeratorGasType
     *
     * @return integer 
     */
    public function getRefrigeratorGasType()
    {
        return $this->refrigeratorGasType;
    }

    /**
     * Set backupGenerator
     *
     * @param integer $backupGenerator
     */
    public function setBackupGenerator($backupGenerator)
    {
        $this->backupGenerator = $backupGenerator;
    }

    /**
     * Get backupGenerator
     *
     * @return integer 
     */
    public function getBackupGenerator()
    {
        return $this->backupGenerator;
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
     * Set ccmAssetSubType
     *
     * @param CcmAssetTypes $ccmAssetSubType
     */
    public function setCcmAssetSubType(\CcmAssetTypes $ccmAssetSubType)
    {
        $this->ccmAssetSubType = $ccmAssetSubType;
    }

    /**
     * Get ccmAssetSubType
     *
     * @return CcmAssetTypes 
     */
    public function getCcmAssetSubType()
    {
        return $this->ccmAssetSubType;
    }

    /**
     * Set ccm
     *
     * @param ColdChain $ccm
     */
    public function setCcm(\ColdChain $ccm)
    {
        $this->ccm = $ccm;
    }

    /**
     * Get ccm
     *
     * @return ColdChain 
     */
    public function getCcm()
    {
        return $this->ccm;
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