<?php

namespace Doctrine\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WarehousesProxy extends \Warehouses implements \Doctrine\ORM\Proxy\Proxy
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

    public function setWarehouseName($warehouseName)
    {
        $this->__load();
        return parent::setWarehouseName($warehouseName);
    }

    public function getWarehouseName()
    {
        $this->__load();
        return parent::getWarehouseName();
    }

    public function setPopulation($population)
    {
        $this->__load();
        return parent::setPopulation($population);
    }

    public function getPopulation()
    {
        $this->__load();
        return parent::getPopulation();
    }

    public function setCcemId($ccemId)
    {
        $this->__load();
        return parent::setCcemId($ccemId);
    }

    public function getCcemId()
    {
        $this->__load();
        return parent::getCcemId();
    }

    public function setStartingOn($startingOn)
    {
        $this->__load();
        return parent::setStartingOn($startingOn);
    }

    public function getStartingOn()
    {
        $this->__load();
        return parent::getStartingOn();
    }

    public function setFromEdit($fromEdit)
    {
        $this->__load();
        return parent::setFromEdit($fromEdit);
    }

    public function getFromEdit()
    {
        $this->__load();
        return parent::getFromEdit();
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

    public function setIsPlacementEnable($isPlacementEnable)
    {
        $this->__load();
        return parent::setIsPlacementEnable($isPlacementEnable);
    }

    public function getIsPlacementEnable()
    {
        $this->__load();
        return parent::getIsPlacementEnable();
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

    public function setDistrict(\Locations $district)
    {
        $this->__load();
        return parent::setDistrict($district);
    }

    public function getDistrict()
    {
        $this->__load();
        return parent::getDistrict();
    }

    public function setProvince(\Locations $province)
    {
        $this->__load();
        return parent::setProvince($province);
    }

    public function getProvince()
    {
        $this->__load();
        return parent::getProvince();
    }

    public function setStakeholder(\Stakeholders $stakeholder)
    {
        $this->__load();
        return parent::setStakeholder($stakeholder);
    }

    public function getStakeholder()
    {
        $this->__load();
        return parent::getStakeholder();
    }

    public function setLocation(\Locations $location)
    {
        $this->__load();
        return parent::setLocation($location);
    }

    public function getLocation()
    {
        $this->__load();
        return parent::getLocation();
    }

    public function setStakeholderOffice(\Stakeholders $stakeholderOffice)
    {
        $this->__load();
        return parent::setStakeholderOffice($stakeholderOffice);
    }

    public function getStakeholderOffice()
    {
        $this->__load();
        return parent::getStakeholderOffice();
    }

    public function setWarehouseType(\WarehouseTypes $warehouseType)
    {
        $this->__load();
        return parent::setWarehouseType($warehouseType);
    }

    public function getWarehouseType()
    {
        $this->__load();
        return parent::getWarehouseType();
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


    public function __sleep()
    {
        return array('__isInitialized__', 'pkId', 'warehouseName', 'population', 'ccemId', 'startingOn', 'fromEdit', 'status', 'isPlacementEnable', 'createdDate', 'modifiedDate', 'district', 'province', 'stakeholder', 'location', 'stakeholderOffice', 'warehouseType', 'createdBy', 'modifiedBy');
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