<?php

class Zend_View_Helper_IsIssueDelete extends Zend_View_Helper_Abstract {

    public function isIssueDelete($detail_id) {

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

        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

}
