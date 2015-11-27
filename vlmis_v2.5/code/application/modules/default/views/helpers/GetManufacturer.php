<?php

class Zend_View_Helper_GetManufacturer extends Zend_View_Helper_Abstract {

    public function getManufacturer($batch_id) {

        $em = Zend_Registry::get('doctrine');

        $str_sql = $em->createQueryBuilder()
                ->select("sb")
                ->from('StockBatch', 'sb')
                ->where("sb.pkId = $batch_id");

        $row = $str_sql->getQuery()->getResult();

        if (count($row) > 0) {
            echo $row[0]->getStakeholderItemPackSize()->getStakeholder()->getStakeholderName();
        } else {
            echo '';
        }
    }

}
