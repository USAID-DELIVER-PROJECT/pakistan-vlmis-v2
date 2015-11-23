<?php

class Zend_View_Helper_ExplorerReport extends Zend_View_Helper_Abstract {

    public function explorerReport() {
        return $this;
    }

    public function ajaxExplorerReport($stkid, $wh_id, $yy, $mm) {
        $stakeholder_item_ids = "";
        $em = Zend_Registry::get('doctrine');
        /*$str_sql = $em->createQueryBuilder()
                ->select("ips.pkId")
                ->from('StakeholderItemPackSizes', 'si')
                ->innerJoin("si.itemPackSize", "ips");
        $row = $str_sql->getQuery()->getResult();
        foreach ($row as $val) {
            $stakeholder_items[] = $val['pkId'];
        }
        $stakeholder_item_ids = implode(",", $stakeholder_items);*/
        
        $str_sql = $em->createQueryBuilder()
                ->select('DISTINCT ips.itemName as item_name, ips.pkId as pk_id, ips.numberOfDoses as description')
                ->from("ItemPackSizes", "ips")                
                ->innerJoin("ips.itemCategory", "ic")
                ->where("ips.status = 1")
                ->andWhere("ic.pkId = 1")
                //->andWhere("ips.pkId IN (" . $stakeholder_item_ids . ")")
                ->orderBy("ips.listRank", "ASC");
        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows;
        } else {
            return false;
        }
    }

    public function getMonthlyReceiveQuantityWarehouse($mm, $yy, $item_id, $wh_id) {
        $em = Zend_Registry::get('doctrine');
        $row = $em->getConnection()->prepare("SELECT getMonthlyRcvQtyWH($mm,$yy,$item_id,$wh_id) as rcv from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    public function getWarehouseDataByItemAndWarehouseId($wh_id, $item_id, $previous_selected) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select('wd.pkId as pk_id, wd.openingBalance as opening_balance, wd.receivedBalance as received_balance, wd.issueBalance as issue_balance,'
                        . 'wd.closingBalance as closing_balance, wd.vialsUsed as vials_used, wd.adjustments,'
                        . 'wd.reportingStartDate as reporting_start_date, wd.nearestExpiry as nearest_expiry')
                ->from('WarehousesData',"wd")
                ->where("wd.warehouse = '" . $wh_id . "'")
                ->andWhere("wd.itemPackSize = '" . $item_id . "' ")
                ->andWhere("wd.reportingStartDate = '" . $previous_selected . "' ");
        $rows = $str_sql->getQuery()->getResult();
        if (!empty($rows) && count($rows) > 0) {
            return $rows[0];
        } else {
            return false;
        }
    }

}

?>