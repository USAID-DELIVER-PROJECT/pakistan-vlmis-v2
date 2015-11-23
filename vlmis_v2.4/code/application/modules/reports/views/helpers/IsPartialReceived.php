<?php

class Zend_View_Helper_IsPartialReceived extends Zend_View_Helper_Abstract {

    public function isPartialReceived($stock_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("sd")
                ->from('StockDetail', 'sd')
                ->where("sd.stockMaster = " . $stock_id)
                ->andWhere("sd.isReceived != 0");
        $row = $str_sql->getQuery()->getResult();

        if (count($row) > 0) {
            return "Partial Received";
        } else {
            return "Pending";
        }
    }

}

?>