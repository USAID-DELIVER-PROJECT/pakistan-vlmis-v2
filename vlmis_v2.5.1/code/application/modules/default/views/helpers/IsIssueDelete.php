<?php

/**
 * Zend_View_Helper_IsIssueDelete
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Is Issue Delete
 */

class Zend_View_Helper_IsIssueDelete extends Zend_View_Helper_Abstract {

    /**
     * Is Issue Delete
     * @param type $detail_id
     * @return string
     */
    public function isIssueDelete($detail_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("sd.quantity")
                ->from('StockDetail', 'sd')
                ->where("sd.isReceived = 0")
                ->andWhere("sd.pkId = $detail_id");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $sql_plc = $em->createQueryBuilder()
                    ->select("SUM(p.quantity) qty")
                    ->from('Placements', 'p')
                    ->where("p.stockDetail = $detail_id")
                    ->groupBy("p.stockDetail")
                    ->having("qty = '" . $row[0]['quantity'] . "'");

            $row_plc = $sql_plc->getQuery()->getResult();

            if (count($row_plc) > 0) {
                return 'DIRECT_DELETE';
            } else {
                return 'CUSTOM_DELETE';
            }
        } else {
            return 'VOUCHER_RECEIVED';
        }
    }

}
