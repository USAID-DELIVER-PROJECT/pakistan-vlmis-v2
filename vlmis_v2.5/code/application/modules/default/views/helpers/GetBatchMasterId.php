<?php

class Zend_View_Helper_GetBatchMasterId extends Zend_View_Helper_Abstract {

    public function getBatchMasterId($number, $item_id, $current_level) {

        $em = Zend_Registry::get("doctrine");
        $str_sql = $em->createQueryBuilder()
                ->select('sb')
                ->from("StockBatchWarehouses","sbw")
                ->join("sbw.stockBatch", "sb")
                ->join("sb.packInfo","pi")
                ->join("pi.stakeholderItemPackSize","sips")
                ->join("sbw.warehouse", "w")
                ->join("w.stakeholderOffice", "so")
                ->join("so.geoLevel", "gl")
                ->where("sb.number = '$number'")
                ->andWhere("sips.itemPackSize = $item_id")
                ->andWhere("so.geoLevel <= $current_level")
                ->orderBy("gl.pkId", "ASC");
        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            return $row[0];
        } else {
            return false;
        }
    }

}

?>