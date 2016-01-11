<?php

class Zend_View_Helper_ExplorerReport extends Zend_View_Helper_Abstract {

    public function explorerReport() {
        return $this;
    }

    public function ajaxExplorerReport($stkid, $wh_id, $yy, $mm) {
        $stakeholder_item_ids = "";
        $em = Zend_Registry::get('doctrine');
        
        $str_sql = $em->createQueryBuilder()
                ->select('DISTINCT ips.itemName as item_name, ips.pkId as pk_id, ips.numberOfDoses as description')
                ->from("ItemPackSizes", "ips")
                ->innerJoin("ips.itemCategory", "ic")
                ->where("ips.status = 1")
                ->andWhere("ic.pkId = 1")
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

    public function getWarehouseDataByItemAndWarehouseId($wh_id, $item_id, $date_sel) {
        $em = Zend_Registry::get('doctrine');

        $startDate = date('Y-m-01', strtotime($date_sel));
        $endDate = date('Y-m-t', strtotime($date_sel));

         $str_qry = "SELECT
            SUM(IF (DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') < '$startDate', stock_detail.quantity, 0))*item_pack_sizes.number_of_doses AS opening_balance,
            SUM(IF (DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') >= '$startDate' AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') <= '$endDate' AND stock_master.transaction_type_id = 1, stock_detail.quantity, 0))*item_pack_sizes.number_of_doses AS received_balance,
            SUM(IF (DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') >= '$startDate' AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') <= '$endDate' AND stock_master.transaction_type_id = 2, ABS(stock_detail.quantity), 0))*item_pack_sizes.number_of_doses AS issue_balance,
            SUM(IF (DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') >= '$startDate' AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') <= '$endDate' AND stock_master.transaction_type_id > 2 AND transaction_types.nature = '+', stock_detail.quantity, 0)) AS vials_used,
            ABS(SUM(IF (DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') >= '$startDate' AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m-%d') <= '$endDate' AND stock_master.transaction_type_id > 2 AND transaction_types.nature = '-', stock_detail.quantity, 0))) AS adjustments,
            SUM(stock_detail.quantity)*item_pack_sizes.number_of_doses AS closing_balance
           FROM
            stock_master
           INNER JOIN transaction_types ON stock_master.transaction_type_id = transaction_types.pk_id
           INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
           INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
           INNER JOIN stock_batch ON stock_batch_warehouses.stock_batch_id = stock_batch.pk_id
           INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
           INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
           INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
           WHERE
            DATE_FORMAT(
             stock_master.transaction_date,
             '%Y-%m-%d'
            ) <= '$endDate' AND
              DATE_FORMAT(
		stock_batch.expiry_date,
		'%Y-%m-%d'
	) >= '$endDate'  
           AND stock_batch_warehouses.warehouse_id = $wh_id
           AND stakeholder_item_pack_sizes.item_pack_size_id = $item_id".
                " ORDER BY item_pack_sizes.list_rank";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $result = $row->fetchAll();

        return $result[0];
    }

}

?>