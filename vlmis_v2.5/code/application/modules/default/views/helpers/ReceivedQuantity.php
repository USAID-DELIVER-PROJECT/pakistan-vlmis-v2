<?php

class Zend_View_Helper_ReceivedQuantity extends Zend_View_Helper_Abstract {

    public function receivedQuantity($detail_id) {

        $data = array(1 => 0, 2 => 0, 3 => 0, 4 => 0);
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("IFNULL(SUM(srfs.quantity),0) as total, srfs.vvmStage")
                ->from('StockReceiveFromScanner', 'srfs')
                ->where("srfs.stockDetail = $detail_id")
                ->groupBy("srfs.vvmStage");

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $total = 0;
            foreach ($row as $rec) {
                $total = $total + $rec['total'];
                $data[$rec['vvmStage']] = $rec['total'];
            }
            return array('total' => $total, 'vvmstage' => $data);
        } else {
            return array('total' => 0, 'vvmstage' => $data);
        }
    }

}
