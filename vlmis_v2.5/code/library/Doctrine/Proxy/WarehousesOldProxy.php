<?php

namespace Doctrine\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class WarehousesOldProxy extends \WarehousesOld implements \Doctrine\ORM\Proxy\Proxy
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


    public function __sleep()
    {
        return array('__isInitialized__', 'pkId', 'warehouseName', 'population', 'district', 'location', 'province', 'stakeholder', 'stakeholderOffice', 'warehouseType');
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