<?php

/**
 * Model_PhysicalStockTakingDetail
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Campaigns
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_PhysicalStockTakingDetail extends Model_Base {

    private $_table;
    const STOCKID = 3;

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('PhysicalStockTakingDetail');
    }

}
