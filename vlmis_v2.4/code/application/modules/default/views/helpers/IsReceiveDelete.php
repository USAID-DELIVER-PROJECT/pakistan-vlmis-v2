<?php

class Zend_View_Helper_IsReceiveDelete extends Zend_View_Helper_Abstract {

    public function isReceiveDelete($detail_id, $wh_id) {

        $em = Zend_Registry::get('doctrine');
        $identity = App_Auth::getInstance();
        $store_wh_id = $identity->getWarehouseId();

        $str_sql = $em->createQueryBuilder()
                ->select("sb.pkId as stock_batch_id,sm.transactionDate")
                ->from('StockDetail', 'sd')
                ->join('sd.stockBatch', 'sb')
                ->join('sd.stockMaster', 'sm')
                ->andWhere("sd.pkId = $detail_id");

        $row = $str_sql->getQuery()->getResult();

        $str_sql2 = $em->createQueryBuilder()
                ->select("sd.pkId")
                ->from('StockDetail', 'sd')
                ->join('sd.stockBatch', 'sb')
                ->join('sd.stockMaster', 'sm')
                ->where("sm.transactionDate >= '" . $row[0]['transactionDate'] . "' ")
                ->andWhere("sb.pkId= '" . $row[0]['stock_batch_id'] . "' ")
                ->andWhere("sm.fromWarehouse = '" . $store_wh_id . "'  ")
                ->andWhere("sm.transactionType=2");

        $row2 = $str_sql2->getQuery()->getResult();
        if (!empty($row2) && count($row2) > 0) {
            return false;
        } else {
            return true;
        }
        
        $str_sql2 = $em->createQueryBuilder()
                ->select("sd.pkId")
                ->from('StockDetail', 'sd')
                ->join('sd.stockBatch', 'sb')
                ->join('sd.stockMaster', 'sm')
                ->join('sm.fromWarehouse', 'w')
                ->join('w.stakeholder', 's')
                ->join('s.stakeholderType', 'st')
                ->where("sd.pkId= '" . $detail_id . "' ")
                ->andWhere("w.pkId = '" . $wh_id . "'  ")
                ->andWhere("st.pkId = 2");
        //echo $str_sql2->getQuery()->getSql();
        //exit;
        $row2 = $str_sql2->getQuery()->getResult();
        if (!empty($row2) && count($row2) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
