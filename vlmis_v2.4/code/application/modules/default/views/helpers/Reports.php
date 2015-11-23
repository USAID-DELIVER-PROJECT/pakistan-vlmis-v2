<?php

class Zend_View_Helper_Reports extends Zend_View_Helper_Abstract {

    public function reports() {
        return $this;
    }

    public function reportData($in_col, $in_rg, $in_type, $month, $year, $in_item, $in_stk, $in_prov, $in_dist) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare("SELECT REPgetData('$in_col','$in_rg','$in_type'," . $month . "," . $year . "," . $in_item . ",'$in_stk','$in_prov','$in_dist') AS Value from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    public function reportsMos($v_mos, $sel_item, $id, $sel_lvl) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT getMosColor('" . $v_mos . "'," . $sel_item . ",1," . $sel_lvl . ") as col from Dual");
        $row->execute();
        return $row->fetchAll();
    }

    public function getReportingRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetReportingRateStr('" . $in_type . "'," . $in_month . "," . $in_year . ",'" . $in_item . "','" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    public function getAvailabilityRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetAvailabilityRateStr('" . $in_type . "'," . $in_month . "," . $in_year . ",'" . $in_item . "','" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    public function getProvincialYearlyReport($report_indicator, $str_date, $in_prov) {
        $col_name = "";
        $level = "";
        $prov_clause = "";

        if ($in_prov == 'all') {
            $prov_clause = "";
        } else {
            $prov_clause = "AND warehouses.province_id = '" . $in_prov . "'";
        }

        if ($report_indicator == 1) {
            $col_name = 'SUM(warehouses_data.issue_balance) AS total';
            $level = '=6';
        } else if ($report_indicator == 2) {
            $col_name = 'SUM(warehouses_data.closing_balance) AS total';
            $level = '>= 2';
        } else if ($report_indicator == 3) {
            $col_name = 'SUM(warehouses_data.received_balance) AS total';
            $level = '=2';
        } else if ($report_indicator == 4) {
            $col_name = 'SUM(warehouses_data.issue_balance) AS total';
            $level = '=2';
        }

        $str_qry = "SELECT
                    $col_name,
                    warehouses_data.item_pack_size_id
                    FROM
                    item_pack_sizes
                    INNER JOIN warehouses_data ON item_pack_sizes.pk_id = warehouses_data.item_pack_size_id
                    INNER JOIN warehouses ON warehouses_data.warehouse_id = warehouses.pk_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    item_pack_sizes.item_category_id <> 3
                    AND stakeholders.geo_level_id $level
                    $prov_clause
                    AND DATE_FORMAT(warehouses_data.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    GROUP BY warehouses_data.item_pack_size_id
                    ORDER BY item_pack_sizes.list_rank ASC";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    public function getDistrictsYearlyReport($report_indicator, $str_date, $in_prov) {
        $col_name = "";
        $level = "";
        $prov_clause = "";

        if ($in_prov == 'all') {
            $prov_clause = "";
        } else {
            $prov_clause = "AND warehouses.province_id = '" . $in_prov . "'";
        }

        if ($report_indicator == 1) {
            $col_name = 'SUM(warehouses_data.issue_balance) AS total';
            $level = '=6';
        } else if ($report_indicator == 2) {
            $col_name = 'SUM(warehouses_data.closing_balance) AS total';
            $level = '>= 2';
        } else if ($report_indicator == 3) {
            $col_name = 'SUM(warehouses_data.received_balance) AS total';
            $level = '=2';
        } else if ($report_indicator == 4) {
            $col_name = 'SUM(warehouses_data.issue_balance) AS total';
            $level = '=2';
        }

        $str_qry = "SELECT
                    $col_name,
                    warehouses_data.item_pack_size_id
                    FROM
                    item_pack_sizes
                    INNER JOIN warehouses_data ON item_pack_sizes.pk_id = warehouses_data.item_pack_size_id
                    INNER JOIN warehouses ON warehouses_data.warehouse_id = warehouses.pk_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    item_pack_sizes.item_category_id <> 3
                    AND stakeholders.geo_level_id $level
                    $prov_clause
                    AND DATE_FORMAT(warehouses_data.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    GROUP BY warehouses_data.item_pack_size_id
                    ORDER BY item_pack_sizes.list_rank ASC";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    public function getAdjustmentReceiveList($master_id, $wh_id) {

        $querypro = "SELECT
                    stock_master.transaction_date,
                    stock_master.transaction_number,
                    stock_master.transaction_reference,
                    item_pack_sizes.item_name,
                    stock_batch.number,
                    transaction_types.transaction_type_name,
                    ABS(COALESCE(stock_detail.quantity,null,0)) as quantity
                    FROM
                            stock_master
                    INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
                    INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                    INNER JOIN item_pack_sizes ON stock_batch.item_pack_size_id = item_pack_sizes.pk_id
                    INNER JOIN transaction_types ON stock_master.transaction_type_id = transaction_types.pk_id
                    WHERE
                            stock_master.parent_id = $master_id
                    AND stock_master.transaction_type_id > 2
                    AND stock_master.to_warehouse_id = $wh_id";
        //echo $querypro;
        /* stock_master.from_warehouse_id = '$wh_id' AND
          AND stock_batch.number IN ('" . $batchNums . "') */

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getPreMonthCb($wh_id, $rptDate) {

        $querypro = "SELECT
			warehouses_data.item_pack_size_id as item_id,
			COALESCE(warehouses_data.closing_balance, NULL, 0) AS wh_cbl_a
			FROM
				warehouses_data
			WHERE
				warehouses_data.warehouse_id = $wh_id
			 AND warehouses_data.reporting_start_date = '$rptDate'";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getPreMonthCb2($wh_id, $rptDate) {

        $querypro = "SELECT
			hf_data_master.item_pack_size_id as item_id,
			COALESCE(hf_data_master.closing_balance, NULL, 0) AS wh_cbl_a
			FROM
				hf_data_master
			WHERE
				hf_data_master.warehouse_id = $wh_id
			 AND hf_data_master.reporting_start_date = '$rptDate'";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getIssueNumberByReceiveNumber($detail_id) {

        $querypro = "SELECT DISTINCT
                    master2.transaction_number,
                    warehouses.warehouse_name
                    FROM
                    stock_detail
                    INNER JOIN stock_detail AS detail2 ON stock_detail.is_received = detail2.pk_id
                    INNER JOIN stock_master AS master2 ON detail2.stock_master_id = master2.pk_id
                    INNER JOIN warehouses ON master2.from_warehouse_id = warehouses.pk_id
                    WHERE
                    master2.transaction_type_id = 2 AND
                    stock_detail.pk_id = $detail_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        $rows = $row->fetchAll();

        if (!empty($rows) && count($rows) > 0) {
            return '<b>Issue No.: </b>' . $rows[0]['transaction_number'] . '</td><td class="right">
                    <b>Source: </b> ' . $rows[0]['warehouse_name'];
        } else {
            return '';
        }
    }

    public function getSummaryList($master_id) {

        $querypro = "SELECT
                            A.item_name,                            
                            (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) AS net_received,
                            COALESCE (A.number_of_doses, NULL, 0) AS doses_per_vial,
                            (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) * COALESCE (A.number_of_doses, NULL, 0) AS total_doses,
                            (A.unit_price * (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) * COALESCE (A.number_of_doses, NULL, 0)) as total_cost
                    FROM
                            (
                                    SELECT
                                            Sum(stock_detail.quantity) AS total_vials,
                                            item_pack_sizes.item_name,
                                            item_pack_sizes.number_of_doses,
                                            stock_batch.item_pack_size_id,
                                            stock_batch.unit_price
                                    FROM
                                            stock_master
                                    INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
                                    INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                                    INNER JOIN item_pack_sizes ON stock_batch.item_pack_size_id = item_pack_sizes.pk_id
                                    WHERE
                                            stock_master.pk_id = $master_id
                                    GROUP BY
                                            stock_batch.item_pack_size_id
                            ) A
                    LEFT JOIN (
                            SELECT
                                    SUM(stock_detail.quantity) AS total_vials,
                                    stock_batch.item_pack_size_id
                            FROM
                                    stock_master
                            INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
                            INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                            WHERE
                                    stock_master.parent_id = $master_id
                            AND stock_master.transaction_type_id > 2
                            GROUP BY
                                    stock_batch.item_pack_size_id
                    ) B ON B.item_pack_size_id = A.item_pack_size_id";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getCancelSummaryList($master_id) {

        $querypro = "SELECT
                            A.item_name,                            
                            (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) AS net_received,
                            COALESCE (A.number_of_doses, NULL, 0) AS doses_per_vial,
                            (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) * COALESCE (A.number_of_doses, NULL, 0) AS total_doses,
                            (A.unit_price * (
                                    COALESCE (ABS(A.total_vials), NULL, 0) - COALESCE (ABS(B.total_vials), NULL, 0)
                            ) * COALESCE (A.number_of_doses, NULL, 0)) as total_cost
                    FROM
                            (
                                    SELECT
                                            Sum(stock_detail.quantity) AS total_vials,
                                            item_pack_sizes.item_name,
                                            item_pack_sizes.number_of_doses,
                                            stock_batch.item_pack_size_id,
                                            stock_batch.unit_price
                                    FROM
                                            stock_master_history as stock_master
                                    INNER JOIN stock_detail_history as stock_detail ON stock_detail.stock_master_id = stock_master.master_id
                                    INNER JOIN stock_batch as stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                                    INNER JOIN item_pack_sizes ON stock_batch.item_pack_size_id = item_pack_sizes.pk_id
                                    WHERE
                                            stock_master.master_id = $master_id and stock_master.action_type = 2 and stock_detail.action_type = 3
                                    GROUP BY
                                            stock_batch.item_pack_size_id
                            ) A
                    LEFT JOIN (
                            SELECT
                                    SUM(stock_detail.quantity) AS total_vials,
                                    stock_batch.item_pack_size_id
                            FROM
                                    stock_master_history as stock_master
                            INNER JOIN stock_detail_history as stock_detail ON stock_detail.stock_master_id = stock_master.master_id
                            INNER JOIN stock_batch as stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                            WHERE
                                    stock_master.parent_id = $master_id
                            AND stock_master.transaction_type_id > 2 and stock_master.action_type = 2 and stock_detail.action_type = 3
                            GROUP BY
                                    stock_batch.item_pack_size_id
                    ) B ON B.item_pack_size_id = A.item_pack_size_id";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getIssuancePercent($warehouse_id, $to_warehouse_id, $item_pack_id, $month, $year) {


        $report_date1 = $year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));

        $querypro = "SELECT
	ABS(SUM(stock_detail.quantity)) AS total_percent
	
        FROM
                stock_detail
        INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
        INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
        INNER JOIN warehouses ON stock_batch.warehouse_id = warehouses.pk_id
     
        WHERE
                stock_master.transaction_type_id = 2
         AND stock_master.draft = 0        
        AND DATE_FORMAT(
                stock_master.transaction_date,
                '%Y-%m'
        ) = '$report_date'
        AND stock_batch.item_pack_size_id = $item_pack_id
        AND stock_master.from_warehouse_id = $warehouse_id
        AND stock_master.to_warehouse_id = $to_warehouse_id    
      ";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        $result = $row->fetchAll();
        return $result[0]['total_percent'];
    }

    public function getIssueVoucherList($warehouse_id, $to_warehouse_id, $month, $year) {
        $report_date1 = $year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));

        $querypro = "SELECT
	stock_master.pk_id,
	stock_master.transaction_number,
        stock_master.transaction_date
        FROM
	stock_master
        WHERE
        stock_master.draft = 0 and
        stock_master.transaction_type_id  = 2 and
	stock_master.from_warehouse_id = $warehouse_id
        AND stock_master.to_warehouse_id = $to_warehouse_id
        AND DATE_FORMAT(
	stock_master.transaction_date,
	'%Y-%m'
       ) = '$report_date'";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getIssueVoucherListTemp($warehouse_id, $to_warehouse_id, $month, $year) {
        $report_date1 = $year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));

        $querypro = "SELECT
	stock_master.pk_id,
	stock_master.transaction_number,
        stock_master.transaction_date
        FROM
	stock_master
        WHERE
        stock_master.draft = 1 and
	stock_master.from_warehouse_id = $warehouse_id
        AND stock_master.to_warehouse_id = $to_warehouse_id
        AND DATE_FORMAT(
	stock_master.transaction_date,
	'%Y-%m'
       ) = '$report_date'";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    public function getIssuanceTotal($warehouse_id, $item_pack_id, $month, $year) {


        $report_date1 = $year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));

        $querypro = "SELECT
	ABS(SUM(stock_detail.quantity)) AS total_percent
	
        FROM
                stock_detail
        INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
        INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
        INNER JOIN warehouses ON stock_batch.warehouse_id = warehouses.pk_id
     
        WHERE
                stock_master.transaction_type_id = 2
         AND stock_master.draft = 0        
        AND DATE_FORMAT(
                stock_master.transaction_date,
                '%Y-%m'
        ) = '$report_date'
        AND stock_batch.item_pack_size_id = $item_pack_id
        AND stock_master.from_warehouse_id = $warehouse_id
          
      ";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        $result = $row->fetchAll();
        return $result[0]['total_percent'];
    }

}

?>