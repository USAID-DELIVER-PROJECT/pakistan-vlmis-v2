<?php

/**
 * Zend_View_Helper_WarehouseDelete
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Warehouse Delete
 */
class Zend_View_Helper_WarehouseDelete extends Zend_View_Helper_Abstract {

    /**
     * Warehouse Delete
     * @param type $warehouse_id
     * @return type
     */
    public function warehouseDelete($warehouse_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("wu.pkId")
                ->from('WarehouseUsers', 'wu')
                ->join('wu.warehouse', 'w')
                ->where("w.pkId =" . $warehouse_id);

        return $str_sql->getQuery()->getResult();
    }

}

?>