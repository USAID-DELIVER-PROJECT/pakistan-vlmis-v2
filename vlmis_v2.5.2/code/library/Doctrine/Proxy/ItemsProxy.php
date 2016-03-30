<?php

namespace Doctrine\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class ItemsProxy extends \Items implements \Doctrine\ORM\Proxy\Proxy
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

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
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

    public function setPackVolume($packVolume)
    {
        $this->__load();
        return parent::setPackVolume($packVolume);
    }

    public function getPackVolume()
    {
        $this->__load();
        return parent::getPackVolume();
    }

    public function setDosesPerYear($dosesPerYear)
    {
        $this->__load();
        return parent::setDosesPerYear($dosesPerYear);
    }

    public function getDosesPerYear()
    {
        $this->__load();
        return parent::getDosesPerYear();
    }

    public function setPackDiluentVolume($packDiluentVolume)
    {
        $this->__load();
        return parent::setPackDiluentVolume($packDiluentVolume);
    }

    public function getPackDiluentVolume()
    {
        $this->__load();
        return parent::getPackDiluentVolume();
    }

    public function setTargetPopulationFactor($targetPopulationFactor)
    {
        $this->__load();
        return parent::setTargetPopulationFactor($targetPopulationFactor);
    }

    public function getTargetPopulationFactor()
    {
        $this->__load();
        return parent::getTargetPopulationFactor();
    }

    public function setItemCategoryId($itemCategoryId)
    {
        $this->__load();
        return parent::setItemCategoryId($itemCategoryId);
    }

    public function getItemCategoryId()
    {
        $this->__load();
        return parent::getItemCategoryId();
    }

    public function setMultiplier($multiplier)
    {
        $this->__load();
        return parent::setMultiplier($multiplier);
    }

    public function getMultiplier()
    {
        $this->__load();
        return parent::getMultiplier();
    }

    public function setWastageRateAllowed($wastageRateAllowed)
    {
        $this->__load();
        return parent::setWastageRateAllowed($wastageRateAllowed);
    }

    public function getWastageRateAllowed()
    {
        $this->__load();
        return parent::getWastageRateAllowed();
    }

    public function setPopulationPercentIncreasePerYear($populationPercentIncreasePerYear)
    {
        $this->__load();
        return parent::setPopulationPercentIncreasePerYear($populationPercentIncreasePerYear);
    }

    public function getPopulationPercentIncreasePerYear()
    {
        $this->__load();
        return parent::getPopulationPercentIncreasePerYear();
    }

    public function setChildSurvivingPercentPerYear($childSurvivingPercentPerYear)
    {
        $this->__load();
        return parent::setChildSurvivingPercentPerYear($childSurvivingPercentPerYear);
    }

    public function getChildSurvivingPercentPerYear()
    {
        $this->__load();
        return parent::getChildSurvivingPercentPerYear();
    }

    public function setChildSurvivingPercentTillSecondYear($childSurvivingPercentTillSecondYear)
    {
        $this->__load();
        return parent::setChildSurvivingPercentTillSecondYear($childSurvivingPercentTillSecondYear);
    }

    public function getChildSurvivingPercentTillSecondYear()
    {
        $this->__load();
        return parent::getChildSurvivingPercentTillSecondYear();
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
        return array('__isInitialized__', 'pkId', 'description', 'createdDate', 'modifiedDate', 'packVolume', 'dosesPerYear', 'packDiluentVolume', 'targetPopulationFactor', 'itemCategoryId', 'multiplier', 'wastageRateAllowed', 'populationPercentIncreasePerYear', 'childSurvivingPercentPerYear', 'childSurvivingPercentTillSecondYear', 'modifiedBy', 'createdBy');
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