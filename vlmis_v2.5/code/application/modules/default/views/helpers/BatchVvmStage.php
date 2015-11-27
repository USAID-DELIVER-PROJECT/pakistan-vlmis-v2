<?php

class Zend_View_Helper_BatchVvmStage extends Zend_View_Helper_Abstract {

    public function batchVvmStage($batch_id) {

        $em = Zend_Registry::get('doctrine');

        $str_sql = $em->createQueryBuilder()
                ->select("IF(ips.vvmGroup = 1, MAX(vvm.pkId), vvm.vvmStageValue) as stage, COUNT(DISTINCT vvm.pkId) as total")
                ->from('PlacementSummary', 'ps')
                ->join('ps.stockBatch', 'sb')
                ->join('ps.vvmStage', 'vvm')
                ->join('sb.itemPackSize', 'ips')
                ->where("ps.stockBatch = $batch_id");
        $row = $str_sql->getQuery()->getResult();

        if (isset($row) && count($row) > 0) {
            if ($row[0]['total'] > 1) {
                echo 'Multiple';
            } else {
                if (!empty($row[0]['stage'])) {
                    echo $row[0]['stage'];
                } else {
                    echo 'NA';
                }
            }
        } else {
            echo '1';
        }
    }

}
