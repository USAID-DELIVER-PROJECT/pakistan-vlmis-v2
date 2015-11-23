<?php

class Zend_View_Helper_GetPhysicalBatchQuantity extends Zend_View_Helper_Abstract {

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

