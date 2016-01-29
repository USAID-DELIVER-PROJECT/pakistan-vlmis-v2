<?php

/**
 * Zend_View_Helper_GetPhysicalBatchQuantity
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Get Physical Batch Quantity
 */

class Zend_View_Helper_GetPhysicalBatchQuantity extends Zend_View_Helper_Abstract {

    /**
     * Get Physical Batch Quantity
     * @param type $batch_id
     * @return type
     */
    public function getPhysicalBatchQuantity($batch_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select('SUM(pst.quantity) as qty')
                ->from("PhysicalStockTakingDetail", "pst")
                ->where("pst.stockBatch = " . $batch_id)
                ->andWhere("pst.physicalStockTaking = " . Model_PhysicalStockTakingDetail::STOCKID )
                ->groupBy("pst.batchNumber");

        $row = $str_sql->getQuery()->getResult();
        return $row[0]['qty'];
    }
}

