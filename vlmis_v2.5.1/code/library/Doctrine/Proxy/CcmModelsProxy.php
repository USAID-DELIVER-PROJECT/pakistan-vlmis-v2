<?php

namespace Doctrine\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CcmModelsProxy extends \CcmModels implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getPkId()
    {
        $this->__load();
        return parent::getPkId();
    }

    public function setCcmModelName($ccmModelName)
    {
        $this->__load();
        return parent::setCcmModelName($ccmModelName);
    }

    public function getCcmModelName()
    {
        $this->__load();
        return parent::getCcmModelName();
    }

    public function setAssetDimensionLength($assetDimensionLength)
    {
        $this->__load();
        return parent::setAssetDimensionLength($assetDimensionLength);
    }

    public function getAssetDimensionLength()
    {
        $this->__load();
        return parent::getAssetDimensionLength();
    }

    public function setAssetDimensionWidth($assetDimensionWidth)
    {
        $this->__load();
        return parent::setAssetDimensionWidth($assetDimensionWidth);
    }

    public function getAssetDimensionWidth()
    {
        $this->__load();
        return parent::getAssetDimensionWidth();
    }

    public function setAssetDimensionHeight($assetDimensionHeight)
    {
        $this->__load();
        return parent::setAssetDimensionHeight($assetDimensionHeight);
    }

    public function getAssetDimensionHeight()
    {
        $this->__load();
        return parent::getAssetDimensionHeight();
    }

    public function setGrossCapacity20($grossCapacity20)
    {
        $this->__load();
        return parent::setGrossCapacity20($grossCapacity20);
    }

    public function getGrossCapacity20()
    {
        $this->__load();
        return parent::getGrossCapacity20();
    }

    public function setGrossCapacity4($grossCapacity4)
    {
        $this->__load();
        return parent::setGrossCapacity4($grossCapacity4);
    }

    public function getGrossCapacity4()
    {
        $this->__load();
        return parent::getGrossCapacity4();
    }

    public function setNetCapacity20($netCapacity20)
    {
        $this->__load();
        return parent::setNetCapacity20($netCapacity20);
    }

    public function getNetCapacity20()
    {
        $this->__load();
        return parent::getNetCapacity20();
    }

    public function setNetCapacity4($netCapacity4)
    {
        $this->__load();
        return parent::setNetCapacity4($netCapacity4);
    }

    public function getNetCapacity4()
    {
        $this->__load();
        return parent::getNetCapacity4();
    }

    public function setCfcFree($cfcFree)
    {
        $this->__load();
        return parent::setCfcFree($cfcFree);
    }

    public function getCfcFree()
    {
        $this->__load();
        return parent::getCfcFree();
    }

    public function setGasType($gasType)
    {
        $this->__load();
        return parent::setGasType($gasType);
    }

    public function getGasType()
    {
        $this->__load();
        return parent::getGasType();
    }

    public function setNoOfPhases($noOfPhases)
    {
        $this->__load();
        return parent::setNoOfPhases($noOfPhases);
    }

    public function getNoOfPhases()
    {
        $this->__load();
        return parent::getNoOfPhases();
    }

    public function setStatus($status)
    {
        $this->__load();
        return parent::setStatus($status);
    }

    public function getStatus()
    {
        $this->__load();
        return parent::getStatus();
    }

    public function setReasons($reasons)
    {
        $this->__load();
        return parent::setReasons($reasons);
    }

    public function getReasons()
    {
        $this->__load();
        return parent::getReasons();
    }

    public function setUtilizations($utilizations)
    {
        $this->__load();
        return parent::setUtilizations($utilizations);
    }

    public function getUtilizations()
    {
        $this->__load();
        return parent::getUtilizations();
    }

    public function setTemperatureType($temperatureType)
    {
        $this->__load();
        return parent::setTemperatureType($temperatureType);
    }

    public function getTemperatureType()
    {
        $this->__load();
        return parent::getTemperatureType();
    }

    public function setCatalogueId($catalogueId)
    {
        $this->__load();
        return parent::setCatalogueId($catalogueId);
    }

    public function getCatalogueId()
    {
        $this->__load();
        return parent::getCatalogueId();
    }

    public function setCcmMakeId($ccmMakeId)
    {
        $this->__load();
        return parent::setCcmMakeId($ccmMakeId);
    }

    public function getCcmMakeId()
    {
        $this->__load();
        return parent::getCcmMakeId();
    }

    public function setCreatedDate($createdDate)
    {
        $this->__load();
        return parent::setCreatedDate($createdDate);
    }

    public function getCreatedDate()
    {
        $this->__load();
        return parent::getCreatedDate();
    }

    public function setModifiedDate($modifiedDate)
    {
        $this->__load();
        return parent::setModifiedDate($modifiedDate);
    }

    public function getModifiedDate()
    {
        $this->__load();
        return parent::getModifiedDate();
    }

    public function setColdLife($coldLife)
    {
        $this->__load();
        return parent::setColdLife($coldLife);
    }

    public function getColdLife()
    {
        $this->__load();
        return parent::getColdLife();
    }

    public function setProductPrice($productPrice)
    {
        $this->__load();
        return parent::setProductPrice($productPrice);
    }

    public function getProductPrice()
    {
        $this->__load();
        return parent::getProductPrice();
    }

    public function setPowerSource($powerSource)
    {
        $this->__load();
        return parent::setPowerSource($powerSource);
    }

    public function getPowerSource()
    {
        $this->__load();
        return parent::getPowerSource();
    }

    public function setInternalDimensionLength($internalDimensionLength)
    {
        $this->__load();
        return parent::setInternalDimensionLength($internalDimensionLength);
    }

    public function getInternalDimensionLength()
    {
        $this->__load();
        return parent::getInternalDimensionLength();
    }

    public function setInternalDimensionWidth($internalDimensionWidth)
    {
        $this->__load();
        return parent::setInternalDimensionWidth($internalDimensionWidth);
    }

    public function getInternalDimensionWidth()
    {
        $this->__load();
        return parent::getInternalDimensionWidth();
    }

    public function setInternalDimensionHeight($internalDimensionHeight)
    {
        $this->__load();
        return parent::setInternalDimensionHeight($internalDimensionHeight);
    }

    public function getInternalDimensionHeight()
    {
        $this->__load();
        return parent::getInternalDimensionHeight();
    }

    public function setStorageDimensionLength($storageDimensionLength)
    {
        $this->__load();
        return parent::setStorageDimensionLength($storageDimensionLength);
    }

    public function getStorageDimensionLength()
    {
        $this->__load();
        return parent::getStorageDimensionLength();
    }

    public function setStorageDimensionWidth($storageDimensionWidth)
    {
        $this->__load();
        return parent::setStorageDimensionWidth($storageDimensionWidth);
    }

    public function getStorageDimensionWidth()
    {
        $this->__load();
        return parent::getStorageDimensionWidth();
    }

    public function setStorageDimensionHeight($storageDimensionHeight)
    {
        $this->__load();
        return parent::setStorageDimensionHeight($storageDimensionHeight);
    }

    public function getStorageDimensionHeight()
    {
        $this->__load();
        return parent::getStorageDimensionHeight();
    }

    public function setIsPqs($isPqs)
    {
        $this->__load();
        return parent::setIsPqs($isPqs);
    }

    public function getIsPqs()
    {
        $this->__load();
        return parent::getIsPqs();
    }

    public function setModifiedBy(\Users $modifiedBy)
    {
        $this->__load();
        return parent::setModifiedBy($modifiedBy);
    }

    public function getModifiedBy()
    {
        $this->__load();
        return parent::getModifiedBy();
    }

    public function setCcmAssetType(\CcmAssetTypes $ccmAssetType)
    {
        $this->__load();
        return parent::setCcmAssetType($ccmAssetType);
    }

    public function getCcmAssetType()
    {
        $this->__load();
        return parent::getCcmAssetType();
    }

    public function setCreatedBy(\Users $createdBy)
    {
        $this->__load();
        return parent::setCreatedBy($createdBy);
    }

    public function getCreatedBy()
    {
        $this->__load();
        return parent::getCreatedBy();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'pkId', 'ccmModelName', 'assetDimensionLength', 'assetDimensionWidth', 'assetDimensionHeight', 'grossCapacity20', 'grossCapacity4', 'netCapacity20', 'netCapacity4', 'cfcFree', 'gasType', 'noOfPhases', 'status', 'reasons', 'utilizations', 'temperatureType', 'catalogueId', 'ccmMakeId', 'createdDate', 'modifiedDate', 'coldLife', 'productPrice', 'powerSource', 'internalDimensionLength', 'internalDimensionWidth', 'internalDimensionHeight', 'storageDimensionLength', 'storageDimensionWidth', 'storageDimensionHeight', 'isPqs', 'modifiedBy', 'ccmAssetType', 'createdBy');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}