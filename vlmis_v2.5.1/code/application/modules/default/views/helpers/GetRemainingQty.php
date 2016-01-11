<?php

class Zend_View_Helper_GetRemainingQty extends Zend_View_Helper_Abstract {

    function getRemainingQty($stcdetail_id, $batch_qty) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("sum(gpd.quantity) as gp_qty")
                ->from('GatepassDetail', 'gpd')
                ->where("gpd.stockDetail = " . $stcdetail_id);

        $row = $str_sql->getQuery()->getResult();

        if (!empty($row) && count($row) > 0) {
            $rem_qty = $batch_qty - $row[0]["gp_qty"];
            return $rem_qty;
        } else {
            return false;
        }
    }

}

?>