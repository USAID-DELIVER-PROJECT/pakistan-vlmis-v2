<?php

namespace Doctrine\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class StockDetailProxy extends \StockDetail implements \Doctrine\ORM\Proxy\Proxy
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

    public function setQuantity($quantity)
    {
        $this->__load();
        return parent::setQuantity($quantity);
    }

    public function getQuantity()
    {
        $this->__load();
        return parent::getQuantity();
    }

    public function setTemporary($temporary)
    {
        $this->__load();
        return parent::setTemporary($temporary);
    }

    public function getTemporary()
    {
        $this->__load();
        return parent::getTemporary();
    }

    public function setIsReceived($isReceived)
    {
        $this->__load();
        return parent::setIsReceived($isReceived);
    }

    public function getIsReceived()
    {
        $this->__load();
        return parent::getIsReceived();
    }

    public function setAdjustmentType($adjustmentType)
    {
        $this->__load();
        return parent::setAdjustmentType($adjustmentType);
    }

    public function getAdjustmentType()
    {
        $this->__load();
        return parent::getAdjustmentType();
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

    public function setVvmStage(\VvmStages $vvmStage)
    {
        $this->__load();
        return parent::setVvmStage($vvmStage);
    }

    public function getVvmStage()
    {
        $this->__load();
        return parent::getVvmStage();
    }

    public function setStockMaster(\StockMaster $stockMaster)
    {
        $this->__load();
        return parent::setStockMaster($stockMaster);
    }

    public function getStockMaster()
    {
        $this->__load();
        return parent::getStockMaster();
    }

    public function setStockBatchWarehouse(\StockBatchWarehouses $stockBatchWarehouse)
    {
        $this->__load();
        return parent::setStockBatchWarehouse($stockBatchWarehouse);
    }

    public function getStockBatchWarehouse()
    {
        $this->__load();
        return parent::getStockBatchWarehouse();
    }

    public function setItemUnit(\ItemUnits $itemUnit)
    {
        $this->__load();
        return parent::setItemUnit($itemUnit);
    }

    public function getItemUnit()
    {
        $this->__load();
        return parent::getItemUnit();
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
        return array('__isInitialized__', 'pkId', 'quantity', 'temporary', 'isReceived', 'adjustmentType', 'createdDate', 'modifiedDate', 'modifiedBy', 'vvmStage', 'stockMaster', 'stockBatchWarehouse', 'itemUnit', 'createdBy');
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