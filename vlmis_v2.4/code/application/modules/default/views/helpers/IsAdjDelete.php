<?php

class Zend_View_Helper_IsAdjDelete extends Zend_View_Helper_Abstract {

    public function isAdjDelete($master_id) {

        $em = Zend_Registry::get('doctrine');
        $identity = App_Auth::getInstance();
        $store_wh_id = $identity->getWarehouseId();

        $str_sql = $em->createQueryBuilder()
                ->select("sb.pkId as stock_batch_id,DATE_FORMAT(sm.transactionDate,'%Y-%m-%d') transactionDate")
                ->from('StockDetail', 'sd')
                ->join('sd.stockBatch', 'sb')
                ->join('sd.stockMaster', 'sm')
                ->where("sm.transactionType NOT IN (".Model_StockMaster::PURPOSE_POSITIVE.",".Model_StockMaster::PURPOSE_NEGATIVE.")")
                ->andWhere("sm.pkId = $master_id");
        $row = $str_sql->getQuery()->getResult();

        if (!empty($row) && count($row) > 0) {
            $str_sql2 = $em->createQueryBuilder()
                    ->select("sd.pkId")
                    ->from('StockDetail', 'sd')
                    ->join('sd.stockBatch', 'sb')
                    ->join('sd.stockMaster', 'sm')
                    ->join('sm.transactionType', 'tt')
                    ->where("DATE_FORMAT(sm.transactionDate,'%Y-%m-%d') >= '" . $row[0]['transactionDate'] . "' ")
                    ->andWhere("sb.pkId= '" . $row[0]['stock_batch_id'] . "' ")
                    ->andWhere("sm.fromWarehouse = '" . $store_wh_id . "'  ")
                    ->andWhere("tt.nature = '-'");
            $row2 = $str_sql2->getQuery()->getResult();
            if (!empty($row2) && count($row2) > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
