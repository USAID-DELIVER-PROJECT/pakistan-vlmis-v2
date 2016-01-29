<?php

/**
 * Zend_View_Helper_IsIssueEdit
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */





/**
 *  Zend View Helper Is Issue Edit
 */
class Zend_View_Helper_IsIssueEdit extends Zend_View_Helper_Abstract {

    /**
     * Is Issue Edit
     * @param type $detail_id
     * @return boolean
     */
    public function isIssueEdit($detail_id) {
        $result = 0;
        
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("sd")
                ->from('StockDetail', 'sd')
                ->where("sd.isReceived = 0")
                ->andWhere("sd.pkId = $detail_id");
        
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $result = 1;
        }

        $str_sql2 = $em->createQueryBuilder()
                ->select("gp")
                ->from('GatepassDetail', 'gp')
                ->where("gp.stockDetail = $detail_id");

        $row2 = $str_sql2->getQuery()->getResult();
        if (!empty($row2) && count($row2) > 0) {
            $result = 0;
        }

        return $result == 1;
    }

}
