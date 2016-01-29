<?php

/**
 * Zend_View_Helper_GetBatchOB
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Get Batch OB
 */

class Zend_View_Helper_GetBatchOB extends Zend_View_Helper_Abstract {

    /**
     * Get Batch OB
     * @param type $batch_id
     * @param type $from_date
     * @return boolean
     */
    public function getBatchOB($batch_id,$from_date) {

        $em = Zend_Registry::get("doctrine");
        $str_sql = $em->createQueryBuilder()
                ->select('SUM(sd.quantity) as qty')
                ->from("StockDetail", "sd")
                ->join("sd.stockMaster", "sm")
                ->join("sd.stockBatchWarehouse", "sb")
                ->where("sb.pkId = $batch_id")
                ->andWhere("DATE_FORMAT(sm.transactionDate,'%Y-%m-%d') < '" . $from_date . "'")
                ->orderBy("sm.transactionDate", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            return $row[0]['qty'];
        } else {
            return false;
        }
    }

}

?>