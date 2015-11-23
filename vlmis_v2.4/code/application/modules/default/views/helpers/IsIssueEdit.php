<?php

class Zend_View_Helper_IsIssueEdit extends Zend_View_Helper_Abstract {

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

        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

}
