<?php

/**
 * Model_ItemPackSizes
 * 
 * 
 * 
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Geo Levels
 */

class Model_GeoLevels extends Model_Base {

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('GeoLevels');
    }

    /**
     * Get Geos All
     * 
     * @return type
     */
    public function getGeosAll() {
        return $this->_table->findAll();
    }

}
