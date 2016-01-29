<?php

/**
 * Zend_View_Helper_GetRemainingQty
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Get Remaining Qty
 */

class Zend_View_Helper_GetRemainingQty extends Zend_View_Helper_Abstract {

    /**
     * Get Remaining Qty
     * @param type $stcdetail_id
     * @param type $batch_qty
     * @return boolean
     */
    function getRemainingQty($stcdetail_id, $batch_qty) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("sum(gpd.quantity) as gp_qty")
                ->from('GatepassDetail', 'gpd')
                ->where("gpd.stockDetail = " . $stcdetail_id);

        $row = $str_sql->getQuery()->getResult();

        if (!empty($row) && count($row) > 0) {
            return $batch_qty - $row[0]["gp_qty"];
        } else {
            return false;
        }
    }

}

?>