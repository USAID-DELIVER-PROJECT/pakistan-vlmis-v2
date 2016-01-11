<?php

/**
 * Model_ItemPackSizes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */
class Model_PhysicalStockTaking extends Model_Base {

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('PhysicalStockTaking');
    }

    /**
     * 
     * @return boolean
     */
    public function getAllDescripiton() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("ips")
                ->from("PhysicalStockTaking", "ips")
                ->orderBy("ips.pkId", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}
