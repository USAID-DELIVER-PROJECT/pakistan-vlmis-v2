<?php

class Zend_View_Helper_IsExpiryEdit extends Zend_View_Helper_Abstract {

    public function isExpiryEdit($batch_id) {

        $result = 0;
        $auth = App_Auth::getInstance();
        $wh_id = $auth->getWarehouseId();
        $role_id = $auth->getRoleId();

        if ($role_id == 3) {
            $em = Zend_Registry::get('doctrine');

            $str_sql = $em->createQueryBuilder()
                    ->select("sd")
                    ->from('StockDetail', 'sd')
                    ->join('sd.stockBatch', 'sb')
                    ->join('sd.stockMaster', 'sm')
                    ->andWhere("sd.isReceived = 1")
                    ->andWhere("sm.fromWarehouse = $wh_id")
                    ->andWhere("sm.transactionType = 2")
                    ->andWhere("sb.pkId = $batch_id");

            $row = $str_sql->getQuery()->getResult();

            if (count($row) > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
