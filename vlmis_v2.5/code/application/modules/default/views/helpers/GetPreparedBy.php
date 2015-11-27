<?php

class Zend_View_Helper_GetPreparedBy extends Zend_View_Helper_Abstract {

    public function getPreparedBy($stock_id) {

        $em = Zend_Registry::get("doctrine");
        $str_sql = $em->createQueryBuilder()
                ->select('sm')
                ->from("StockMaster", "sm")
                ->where("sm.pkId = $stock_id");
        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            return $row[0]->getCreatedBy()->getUsername();
        } else {
            return false;
        }
    }

}

?>