<?php

/**
 * Zend_View_Helper_Reports
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage reports
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Zend View Helper Reports
 */
class Zend_View_Helper_Reports extends Zend_View_Helper_Abstract {

    /**
     * Reports
     */
    public function reports() {
        return $this;
    }

    /**
     * Report Consumption
     * @param type $in_type
     * @param type $rpt_date
     * @param type $in_loc
     * @param type $in_item
     * @param type $in_stk
     * @return type
     */
    public function reportConsumption($in_type, $rpt_date, $in_loc, $in_item, $in_stk) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("Call REPgetConsumption('$in_type','$rpt_date','$in_loc','$in_item','$in_stk')");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Report Amc
     * @param type $in_type
     * @param type $rpt_date
     * @param type $in_loc
     * @param type $in_item
     * @param type $in_stk
     * @return type
     */
    public function reportAmc($in_type, $rpt_date, $in_loc, $in_item, $in_stk) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("Call REPgetAMC('$in_type','$rpt_date','$in_loc','$in_item','$in_stk')");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Report Cb
     * @param type $in_type
     * @param type $rpt_date
     * @param type $in_loc
     * @param type $in_item
     * @param type $in_stk
     */
    public function reportCb($in_type, $rpt_date, $in_loc, $in_item, $in_stk) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("Call REPgetCB('$in_type','$rpt_date','$in_loc','$in_item','$in_stk')");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Report Data
     * @param type $in_col
     * @param type $in_rg
     * @param type $in_type
     * @param type $month
     * @param type $year
     * @param type $in_item
     * @param type $in_stk
     * @param type $in_prov
     * @param type $in_dist
     * @return type
     */
    public function reportData($in_col, $in_rg, $in_type, $month, $year, $in_item, $in_stk, $in_prov, $in_dist) {

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetData('$in_col','$in_rg','$in_type'," . $month . "," . $year . "," . $in_item . ",'$in_stk','$in_prov','$in_dist') AS Value from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $in_type
     * @param type $in_reporting_date
     * @param type $in_location
     * @param type $in_item
     * @param type $in_stk
     * @return \type
     * @param type $in_type
     * @param type $in_reporting_date
     * @param type $in_location
     * @param type $in_item
     * @param type $in_stk
     * @return \type
     */
    public function getReportData($in_type, $in_reporting_date, $in_location, $in_item, $in_stk) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("CALL REPgetData('$in_type', '$in_reporting_date', '$in_location', '$in_item', '$in_stk')");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Reports Mos
     * @param type $v_mos
     * @param type $sel_item
     * @param type $id
     * @param type $sel_lvl
     * @return type
     */
    public function reportsMos($v_mos, $sel_item, $id, $sel_lvl) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT getMosColor('" . $v_mos . "'," . $sel_item . ",1," . $sel_lvl . ") as col from Dual");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reporting Rate Str
     * @param type $in_type
     * @param type $in_month
     * @param type $in_year
     * @param type $in_item
     * @param type $in_WF
     * @param type $in_skt
     * @param type $in_prov
     * @param $in_dist
     */
    public function getReportingRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetReportingRateStr('" . $in_type . "'," . $in_month . "," . $in_year . ",'" . $in_item . "','" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Availability Rate Str
     * @param type $in_type
     * @param type $in_month
     * @param type $in_year
     * @param type $in_item
     * @param type $in_WF
     * @param type $in_skt
     * @param type $in_prov
     * @param type $in_dist
     * @return type
     */
    public function getAvailabilityRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetAvailabilityRateStr('" . $in_type . "'," . $in_month . "," . $in_year . "," . $in_item . ",'" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Consumption AVG
     * @param type $t
     * @param type $sel_month
     * @param type $sel_year
     * @param type $sel_item
     * @param type $row_item
     * @param type $in_prov
     * @param type $in_dist
     */
    public function getConsumptionAVG($t, $sel_month, $sel_year, $sel_item, $row_item, $in_prov, $in_dist) {

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetConsumptionAVG('" . $t . "'," . $sel_month . "," . $sel_year . ",'" . $sel_item . "','" . $row_item . "'," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get MOS
     * @param type $t
     * @param type $sel_month
     * @param type $sel_year
     * @param type $sel_item
     * @param type $row_item
     * @param type $in_prov
     * @param type $in_dist
     */
    public function getMOS($t, $sel_month, $sel_year, $sel_item, $row_item, $in_prov, $in_dist) {

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetMOS('" . $t . "'," . $sel_month . "," . $sel_year . ",'" . $sel_item . "','" . $row_item . "'," . $in_prov . "," . $in_dist . ") As Rate from DUAL");

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get CB
     * @param type $t
     * @param type $sel_month
     * @param type $sel_year
     * @param type $sel_item
     * @param type $row_item
     * @param type $in_prov
     * @param type $in_dist
     */
    public function getCB($t, $sel_month, $sel_year, $sel_item, $row_item, $in_prov, $in_dist) {

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare("SELECT REPgetCB('" . $t . "'," . $sel_month . "," . $sel_year . ",'" . $sel_item . "','" . $row_item . "'," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get CB
     * @param type $report_indicator
     * @param type $str_date
     * @param type $in_prov
     * @param type $in_dist
     */
    public function getProvincialYearlyReport($report_indicator, $str_date, $in_prov, $in_dist) {
        $col_name = "";
        $level = "";
        $prov_clause = "";
        $dist_clause = "";

        if ($in_prov == 'all') {
            $prov_clause = "";
        } else {
            $prov_clause = "AND warehouses.province_id = '" . $in_prov . "'";
        }

        if ($in_dist == "") {
            $dist_clause = "";
        } else {
            $dist_clause = "AND warehouses.district_id = '" . $in_dist . "'";
        }

        if ($report_indicator == 1) {
            $col_name = 'SUM(hf_data_master.issue_balance) AS total';
            $level = '=6';
        } else if ($report_indicator == 2) {
            $col_name = 'SUM(hf_data_master.closing_balance) AS total';
            $level = '>= 2';
        } else if ($report_indicator == 3) {
            $col_name = 'SUM(hf_data_master.received_balance) AS total';
            $level = '=2';
        } else if ($report_indicator == 4 && $in_dist == "") {
            $col_name = 'SUM(hf_data_master.issue_balance) AS total';
            $level = '=2';
        } else if ($report_indicator == 4 && $in_dist != "") {
            $col_name = 'SUM(hf_data_master.issue_balance) AS total';
            $level = '=4';
        }

        $str_qry = "SELECT
                    $col_name,
                    hf_data_master.item_pack_size_id
                    FROM
                    item_pack_sizes
                    INNER JOIN hf_data_master ON item_pack_sizes.pk_id = hf_data_master.item_pack_size_id
                    INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    warehouses.status = 1
                    AND stakeholders.geo_level_id $level
                    $prov_clause
                    $dist_clause
                    AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    GROUP BY hf_data_master.item_pack_size_id
                    ORDER BY item_pack_sizes.list_rank ASC";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Provincial Yearly Report
     * @param type $str_date
     * @param type $sel_level
     * @param type $sel_prod
     * @param type $sel_loc
     */
    public function getStoreIssuanceReport($str_date, $sel_level, $sel_prod, $sel_loc) {
        switch ($sel_level) {
            case 1:
                $str_qry = "SELECT
                                ABS(SUM(stock_detail.quantity)) AS total,
                                warehouses.province_id AS loc_id
                        FROM
                                stock_detail
                        INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                        INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                        INNER JOIN warehouses ON stock_batch_warehouses.warehouse_id = warehouses.pk_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        WHERE
                                stock_master.transaction_type_id = 2
                        AND DATE_FORMAT(
                                stock_master.transaction_date,
                                '%Y-%m'
                        ) = '$str_date'
                        AND stakeholder_item_pack_sizes.item_pack_size_id = $sel_prod AND
                        locations.pk_id <> 10 AND locations.geo_level_id = 2
                        GROUP BY
                                warehouses.province_id";
                break;
            case 2:
                $str_qry = "SELECT
                                    ABS(SUM(stock_detail.quantity)) AS total,
                                    warehouses.district_id as loc_id
                            FROM
                                    stock_detail
                            INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                            INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                            INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                            INNER JOIN warehouses ON stock_batch_warehouses.warehouse_id = warehouses.pk_id
                            INNER JOIN locations ON warehouses.location_id = locations.pk_id
                            WHERE
                            stock_master.transaction_type_id = 2 AND
                            DATE_FORMAT(
                                    stock_master.transaction_date,
                                    '%Y-%m'
                            ) = '$str_date' AND
                            stakeholder_item_pack_sizes.item_pack_size_id = $sel_prod AND
                            locations.province_id = $sel_loc AND
                            locations.pk_id <> 10 AND locations.geo_level_id = 4
                            GROUP BY
                                    warehouses.district_id";
                break;
            case 4:
                $str_qry = "SELECT
                                    ABS(SUM(stock_detail.quantity)) AS total,
                                    locations.pk_id as loc_id
                            FROM
                                    stock_detail
                            INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                            INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                            INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                            INNER JOIN warehouses ON stock_batch_warehouses.warehouse_id = warehouses.pk_id
                            INNER JOIN locations ON warehouses.location_id = locations.pk_id
                            WHERE
                            stock_master.transaction_type_id = 2 AND
                            DATE_FORMAT(
                                    stock_master.transaction_date,
                                    '%Y-%m'
                            ) = '$str_date' AND
                            stakeholder_item_pack_sizes.item_pack_size_id = $sel_prod AND
                            locations.district_id = $sel_loc AND
                            locations.pk_id <> 10 AND locations.geo_level_id = 5
                            GROUP BY
                                    locations.pk_id";
                break;
            case 5:
                $str_qry = "SELECT
                                    ABS(SUM(stock_detail.quantity)) AS total,
                                    locations.pk_id as loc_id
                            FROM
                                    stock_detail
                            INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                            INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                            INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                            INNER JOIN warehouses ON stock_batch_warehouses.warehouse_id = warehouses.pk_id
                            INNER JOIN locations ON warehouses.location_id = locations.pk_id
                            WHERE
                            stock_master.transaction_type_id = 2 AND
                            DATE_FORMAT(
                                    stock_master.transaction_date,
                                    '%Y-%m'
                            ) = '$str_date' AND
                            stakeholder_item_pack_sizes.item_pack_size_id = $sel_prod AND
                            locations.parent_id = $sel_loc AND
                            locations.pk_id <> 10 AND locations.geo_level_id = 6
                            GROUP BY
                                    locations.pk_id";
                break;
            default:
                $str_qry = "SELECT
                                ABS(SUM(stock_detail.quantity)) AS total,
                                locations.district_id,
                                ROUND(
                                        (
                                                (
                                                        (
                                                                (
                                                                        location_populations.population / 100
                                                                ) * items.child_surviving_percent_per_year
                                                        ) / 100 * items.child_surviving_percent_per_year
                                                ) * items.doses_per_year
                                        )
                                ) AS AnnualyTarget
                        FROM
                                stock_detail
                        INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                        INNER JOIN warehouses ON stock_master.to_warehouse_id = warehouses.pk_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                        INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                        INNER JOIN location_populations ON locations.pk_id = location_populations.location_id
                        WHERE
                                stock_master.transaction_type_id = 2
                        AND stakeholders.geo_level_id = 6
                        AND stakeholders.main_stakeholder = 1
                        AND locations.province_id = $sel_loc
                        AND DATE_FORMAT(
                                stock_master.transaction_date,
                                '%Y-%m'
                        ) = '$str_date'
                        AND stakeholder_item_pack_sizes.item_pack_size_id = $sel_prod
                        GROUP BY
                                warehouses.district_id";
                break;
        }



        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $report_indicator
     * @param type $str_date
     * @param type $in_prov
     * @param type $sel_dist
     * @param type $sel_prod
     * @return typeGet Store Issuance Report
     * @param type $report_indicator
     * @param type $str_date
     * @param type $in_prov
     * @param type $sel_dist
     * @param type $sel_prod
     */
    public function getDistrictsYearlyReport($report_indicator, $str_date, $in_prov, $sel_dist, $sel_prod) {
        $col_name = "";
        $level = "";
        $prov_clause = "";

        $con = "";

        if (isset($sel_prod) && !empty($sel_prod)) {
            $sel_item = $sel_prod;
        }


        if ($in_prov == 'all') {
            $prov_clause = "";
        } else {
            $prov_clause = "AND warehouses.province_id = '" . $in_prov . "'";
        }

        if ($report_indicator == 1) {

            $col_name = 'SUM(hf_data_master.issue_balance) AS total';
            $level = '=6';
        } else if ($report_indicator == 2) {

            $col_name = 'SUM(hf_data_master.closing_balance) AS total';
            $level = '> 2';
            if (isset($sel_dist) && !empty($sel_dist)) {
                $con = "AND warehouses.district_id <>  2 AND warehouses.district_id <> $sel_dist";
            } else {
                $con = "AND warehouses.district_id <>  2";
            }
        } else if ($report_indicator == 3) {

            $col_name = 'SUM(hf_data_master.received_balance) AS total';
            $level = '=4';
        } else if ($report_indicator == 4) {

            $col_name = 'SUM(hf_data_master.issue_balance) AS total';
            $level = '=4';
        }
        if (isset($sel_dist) && !empty($sel_dist)) {

            $str_qry = "SELECT

                    $col_name,
                    teh.pk_id AS district_id
                    FROM
                    item_pack_sizes
                    INNER JOIN hf_data_master ON item_pack_sizes.pk_id = hf_data_master.item_pack_size_id
                    INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                    INNER JOIN locations  ON locations.pk_id = warehouses.location_id
                    INNER JOIN locations teh ON locations.parent_id = teh.pk_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id

                    WHERE
                    item_pack_sizes.item_category_id <> 3
                    AND warehouses.status = 1
                    AND stakeholders.geo_level_id  $level
                     AND warehouses.stakeholder_office_id = 6 
                    AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    AND hf_data_master.item_pack_size_id = $sel_item

                    $prov_clause
                    AND teh.district_id = $sel_dist
                    GROUP BY
            teh.pk_id
                    ";
        } else {

            $str_qry = "SELECT

                    $col_name,
                    warehouses.district_id
                    FROM
                    item_pack_sizes
                    INNER JOIN hf_data_master ON item_pack_sizes.pk_id = hf_data_master.item_pack_size_id
                    INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    item_pack_sizes.item_category_id <> 3
                    AND warehouses.status = 1
                    AND stakeholders.geo_level_id  $level
                     
                    AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    AND hf_data_master.item_pack_size_id = $sel_item

                    $prov_clause
                    GROUP BY warehouses.district_id
                    ";
        }


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Districts Yearly Report
     * @param $wh_type
     * @param $str_date
     * @param $in_prov
     * @param $in_district
     * @param $sel_prod
     * @param $sel_level
     */
    public function getWastagesReport($wh_type, $str_date, $in_prov, $in_district, $sel_prod, $sel_level) {
        $prov_clause = "";

        if (isset($sel_prod) && !empty($sel_prod) && $sel_prod != 'all') {
            $itemId = $sel_prod;

            $itemFilter = " AND hf_data_master.item_pack_size_id = $itemId";
        } else {
            $itemFilter = " ";
        }
        if ($wh_type == 2) {
            $grp_sub = " warehouses.district_id";
            $con = "UC.district_id";
            $col = "District.pk_id";
            $sub_col = "warehouses.district_id as districtId";
        } else {
            $grp_sub = "UC.parent_id";
            $con = "UC.parent_id";
            $col = "UC.parent_id";
            $sub_col = "UC.parent_id as districtId";
        }

        if ($wh_type == 2) {
            if ($in_prov == 'all' || $in_prov == '') {
                $prov_clause = "";
            } else {
                $prov_clause = "AND warehouses.province_id = '" . $in_prov . "'";
            }
        } else {
            $prov_clause = "AND District.district_id = '" . $in_district . "'";
        }


        if ($wh_type == 2) {
            if ($in_prov == 'all') {
                $uc_clause = "";
            } else if ($in_prov == '') {
                $prov_clause = "";
                $uc_clause = "";
            } else {
                $uc_clause = "AND UC.province_id = '" . $in_prov . "'";
            }
        } else {
            $uc_clause = "AND UC.district_id = '" . $in_district . "'";
        }


        if ($sel_level == '1') {
            $uc_where = "UC.geo_level_id = 2";
        } else {
            $uc_where = "UC.geo_level_id = 6";
        }
        if ($wh_type == 2) {
            $sub_query = " SELECT
                            COUNT(DISTINCT UC.pk_id) AS TotalWH,
                            $sub_col,
                            locations.location_name  as  districtName
                    FROM
                            locations AS UC
                    INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                    INNER JOIN locations ON UC.parent_id = locations.pk_id
                    WHERE
                            $uc_where
                            AND warehouses.stakeholder_id = 1
                            AND warehouses.status = 1
                            $uc_clause
                    GROUP BY
                            $grp_sub";
        } else {

            $sub_query = "SELECT
                            COUNT(DISTINCT UC.pk_id) AS TotalWH,
                            $sub_col,
                            locations.location_name  as  districtName
                    FROM
                            locations AS UC
                    INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                    INNER JOIN locations ON UC.parent_id = locations.pk_id
                    WHERE
                            $uc_where
                            AND warehouses.stakeholder_id = 1
                            AND warehouses.status = 1
                            $uc_clause
                    GROUP BY
                            $grp_sub";
        }


        $str_qry = "SELECT
                     B.districtId AS districtId,
             B.districtName AS districtName,
             IFNULL(A.reported, 0) AS reported,
                    B.TotalWH,
                    ROUND(
                            ((IFNULL(A.reported, 0) / B.TotalWH) * 100),
                            1
                    ) AS RptPer,
                    IFNULL(A.wastagePer,0) AS wastagePer
            FROM
                    (
                            SELECT
                                    $col AS districtId,
                                    District.location_name AS districtName,
                                    COUNT(DISTINCT UC.pk_id) AS reported,
                                    ROUND(IFNULL(
                                            (
                                                    sum(hf_data_master.wastages) / (
                                                            sum(hf_data_master.issue_balance) + sum(hf_data_master.wastages)
                                                    )
                                            ) * 100,
                                            0
                                    ), 1) AS wastagePer
                            FROM
                                    locations AS District
                            INNER JOIN locations AS UC ON District.pk_id = $con
                            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id

                            WHERE
                                    $uc_where
                                    AND warehouses.stakeholder_id = 1
                                    AND warehouses.status = 1
                            AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                            AND hf_data_master.issue_balance IS NOT NULL
                            AND hf_data_master.issue_balance != 0
                            $prov_clause
                            $itemFilter

                            GROUP BY
                                    District.pk_id
                    ) AS A
           RIGHT JOIN (
                    $sub_query
            ) AS B ON A.districtId = B.districtId
            GROUP BY
                    A.districtId
            ORDER BY
            A.districtId ASC";




        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Provinces 1
     * 
     */
    public function getReportedProvinces1() {


        $str_qry = "SELECT
                    Province.pk_id AS provinceId,
                    Province.location_name AS provinceName,
                    COUNT(DISTINCT UC.pk_id) AS TotalUCs
                    FROM
                    locations AS Province
                    INNER JOIN locations AS UC ON Province.pk_id = UC.province_id
                    INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    stakeholders.geo_level_id = 6
                    AND warehouses.stakeholder_id = 1
                    AND warehouses.status = 1
                    GROUP BY
                    Province.pk_id
                    ORDER BY
                    Province.pk_id ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Toal Ucs
     * @param $str_date
     */
    public function gettoalUcs($str_date) {

        if ($str_date >= '2015-05') {
            $str_qry = "SELECT A.provinceId,
            A.provinceName,
            A.TotalUCs,
            IFNULL(B.reported, 0) AS reported,
            ROUND((IFNULL(B.reported, 0) / A.TotalUCs) * 100) AS reportingPercentage
            from
            (
            SELECT
            Province.pk_id AS provinceId,
            Province.location_name AS provinceName,
            COUNT(DISTINCT UC.pk_id) AS TotalUCs
            FROM
            locations AS Province
            INNER JOIN locations AS UC ON Province.pk_id = UC.province_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            WHERE
            stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            AND warehouses. STATUS = 1
            GROUP BY
            Province.pk_id
            ORDER BY
            Province.pk_id ASC
            ) A
            LEFT JOIN (
           
            SELECT
            Province.location_name AS provinceName,
            Province.pk_id AS provinceId,
            COUNT(DISTINCT UC.pk_id) AS reported
            FROM
            locations AS District
            INNER JOIN locations AS UC ON District.pk_id = UC.district_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            INNER JOIN locations AS Province ON Province.pk_id = District.province_id
            WHERE
            stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            AND warehouses. STATUS = 1
            AND DATE_FORMAT(
            hf_data_master.reporting_start_date,
            '%Y-%m'
            ) = '" . $str_date . "'
            AND hf_data_master.issue_balance IS NOT NULL
            AND hf_data_master.issue_balance != 0
            GROUP BY
            Province.pk_id
            ORDER BY
            provinceId ASC
            ) B ON A.provinceId = B.provinceId";
        } else {
            $str_qry = "SELECT
            A.provinceId,
            A.provinceName,
            A.TotalUCs,
            IFNULL(B.reported, 0) AS reported,
            ROUND(
            (
            IFNULL(B.reported, 0) / A.TotalUCs
            ) * 100
            ) AS reportingPercentage
            FROM
            (
            SELECT
            Province.pk_id AS provinceId,
            Province.location_name AS provinceName,
            COUNT(DISTINCT UC.pk_id) AS TotalUCs
            FROM
            locations AS Province
            INNER JOIN locations AS UC ON Province.pk_id = UC.province_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            WHERE
            stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            AND warehouses. STATUS = 1
            AND DATE_FORMAT(
            warehouses.starting_on,
            '%Y-%m'
            ) IS NULL
            GROUP BY
            Province.pk_id
            ORDER BY
            Province.pk_id ASC
            ) A
            LEFT JOIN (
           
            SELECT
            Province.location_name AS provinceName,
            Province.pk_id AS provinceId,
            COUNT(DISTINCT UC.pk_id) AS reported
            FROM
            locations AS District
            INNER JOIN locations AS UC ON District.pk_id = UC.district_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            INNER JOIN locations AS Province ON Province.pk_id = District.province_id
            WHERE
            stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            AND warehouses. STATUS = 1
            AND DATE_FORMAT(
            hf_data_master.reporting_start_date,
            '%Y-%m'
            ) = '" . $str_date . "'
            AND hf_data_master.issue_balance IS NOT NULL
            AND hf_data_master.issue_balance != 0
            GROUP BY
            Province.pk_id
            ORDER BY
            provinceId ASC
            ) B ON A.provinceId = B.provinceId";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Stock On Hand 1
     */
    public function getStockOnHand1() {
        $str_qry = "SELECT DISTINCT
                                l0_.pk_id,
                                l0_.location_name
                                FROM
                                locations AS l0_
                                INNER JOIN locations AS dist ON dist.province_id = l0_.pk_id
                                INNER JOIN pilot_districts ON pilot_districts.district_id = dist.pk_id
                                WHERE
                                l0_.geo_level_id = 2 AND
                                l0_.province_id IS NOT NULL
                                ORDER BY l0_.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Stock On Hand 2
     * @param $str_date
     * @param $item_id
     */
    public function getStockOnHand2($str_date, $item_id) {
        $str_qry = "SELECT IFNULL(SUM(A.CB),0) AS CB,
          C.province_id
         from
        (
            SELECT
                Sum(hf_data_master.closing_balance) AS CB,
                warehouses.province_id
            FROM
                warehouses
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            WHERE
              DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
            AND stakeholders.geo_level_id >= 2
            AND warehouses.status = 1
            AND hf_data_master.item_pack_size_id = " . $item_id . "
            and warehouses.province_id NOT IN (5,7,10)
            GROUP BY
                warehouses.province_id
                   order BY province_id  ) A 
                   RIGHT JOIN (
                Select locations.pk_id as province_id from locations 
                where locations.geo_level_id = 2 and locations.pk_id NOT IN (5,7,10)
                ) AS C ON A.province_id=C.province_id 

                GROUP BY
                        C.province_id
                ORDER BY
                C.province_id
            ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Month Of Stock
     * @param $item
     * @param $province
     * @param $data_in
     */
    public function getMonthOfStock($item, $province, $data_in) {

        $str_qry = "SELECT IFNULL(SUM(A.AMC),0) as AMC,C.prov_id from
                (SELECT AVG(csum) AS AMC, prov_id FROM (
                SELECT RptDate, csum, prov_id FROM (
                SELECT  reporting_start_date as RptDate,sum(hf_data_master.issue_balance) As csum,warehouses.province_id as prov_id
                FROM warehouses
                Inner Join hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                Inner Join stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                WHERE hf_data_master.item_pack_size_id = " . $item . " AND warehouses.province_id = " . $province . " and stakeholders.geo_level_id=6
                AND warehouses.status = 1     GROUP BY RptDate
                ) As A
                WHERE csum > 0
                AND  DATE_FORMAT(RptDate, '%Y-%m') <= '$data_in'
                ORDER BY RptDate DESC
                LIMIT 3
                ) As B 
                ) A 
                RIGHT JOIN (
                Select locations.pk_id as prov_id from locations where locations.pk_id = $province
                ) AS C ON A.prov_id=C.prov_id                        
                where C.prov_id IS NOT NULL and C.prov_id NOT IN (5,7) GROUP BY C.prov_id order by C.prov_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Consumption
     * @param $str_date
     * @param $item_id
     */
    public function getConsumption($str_date, $item_id) {
        $str_qry = "SELECT
                IFNULL(SUM(A.TC), 0) AS TC,
                C.province_id
                FROM

                (
                SELECT
                Sum(hf_data_master.issue_balance) AS TC,
                warehouses.province_id
                FROM
                warehouses
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                WHERE
                DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                AND stakeholders.geo_level_id = 6
                AND warehouses.status = 1
                AND warehouses.stakeholder_id = 1
                AND hf_data_master.item_pack_size_id = " . $item_id . "
                GROUP BY
                warehouses.province_id
                order BY province_id  
                ) A
                RIGHT JOIN (
                SELECT
                locations.pk_id AS province_id
                FROM
                locations
                WHERE
                locations.geo_level_id = 2
                AND locations.pk_id NOT IN (5, 7,  10)
                ) AS C ON A.province_id = C.province_id
                GROUP BY
                C.province_id
                ORDER BY
                C.province_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By Uc
     * @param $wh_type
     * @param $sel_prov
     * @param $sel_dist
     */
    public function getReportedDistrictsByUc($wh_type, $sel_prov, $sel_dist) {

        if ($wh_type == 2) {
            $query = "AND District.province_id= '" . $sel_prov . "'";
            $con = "UC.district_id";
        } else if ($wh_type == 4) {
            $query = "AND District.district_id = '" . $sel_dist . "'";
            $con = "UC.parent_id";
        }

        $str_qry = "SELECT
                                District.pk_id AS districtId,
                                District.location_name AS districtName

                        FROM
                                locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = $con
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        WHERE
                                stakeholders.geo_level_id = 6
                                AND warehouses.stakeholder_id = 1
                                AND warehouses.status = 1
                                $query


                        GROUP BY
                                        District.pk_id
                        ORDER BY
                                districtId ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By Uc Total
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     */
    public function getReportedDistrictsByUcTotal($wh_type, $str_date, $sel_prov, $sel_dist) {

        if ($wh_type == 2) {
            $query = "AND District.province_id= '" . $sel_prov . "'";
            $con = "UC.district_id";
        } else if ($wh_type == 4) {
            $query = "AND District.district_id = '" . $sel_dist . "'";
            $con = "UC.parent_id";
        }


        $str_qry = "
                        SELECT
                          A.districtId,
                          A.districtName,
                          A.totalWH,
                          IFNULL(B.reported, 0) AS reported,
                          ROUND((IFNULL(B.reported, 0) / A.totalWH) * 100) AS reportingPercentage
                           from (
                        SELECT
                                District.pk_id AS districtId,
                                District.location_name AS districtName,
                                COUNT(DISTINCT UC.pk_id) AS totalWH
                        FROM
                                locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = $con
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN warehouse_users ON warehouse_users.warehouse_id = warehouses.pk_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        WHERE
                                stakeholders.geo_level_id = 6
                                AND warehouses.stakeholder_id = 1
                                AND warehouses.status = 1
                                $query

                        GROUP BY
                                        District.pk_id
                        ORDER BY
                                districtId ASC
                        ) A
                        LEFT JOIN (


                SELECT
                        District.pk_id AS districtId,
                        District.location_name AS districtName,
                        COUNT(DISTINCT UC.pk_id) AS reported
                FROM
                locations AS District
                INNER JOIN locations AS UC ON District.pk_id = $con
                INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                WHERE
                stakeholders.geo_level_id = 6
                AND warehouses.stakeholder_id = 1
                AND warehouses. STATUS = 1
                $query
                AND DATE_FORMAT(
                        hf_data_master.reporting_start_date,
                        '%Y-%m'
                ) = '" . $str_date . "'
                AND hf_data_master.issue_balance IS NOT NULL
                AND hf_data_master.issue_balance != 0
                GROUP BY
                        District.pk_id
                ORDER BY
                        districtId ASC
                        )B ON  A.districtId = B.districtId";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();

        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By User
     * @param type $wh_type
     * @param type $provFilter
     * @param type $sel_dist
     * @return typeGet Reported Districts By User
     * @param $wh_type
     * @param $provFilter
     * @param $sel_dist
     */
    public function getReportedDistrictsByUser($wh_type, $provFilter, $sel_dist) {

        if ($wh_type == 2) {
            $str_qry = "SELECT
                    locations.pk_id AS districtId,
                    locations.location_name AS districtName,
                    count(
                                    DISTINCT warehouse_users.user_id
                            ) AS totalWH
            FROM
                    warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                    INNER JOIN locations ON warehouses.district_id = locations.pk_id
                    WHERE
                            stakeholders.geo_level_id = 6
                            AND warehouses.status = 1
                            AND warehouses.stakeholder_id = 1
                            AND locations.province_id= '" . $provFilter . "'
                    GROUP BY locations.pk_id";
        } else if ($wh_type == 4) {
            $str_qry = "SELECT
                    B.pk_id districtId,
                    B.location_name districtName,
                    A.totalUsers totalWH
            FROM
                    (
                            SELECT
                                    COUNT(
                                            DISTINCT warehouse_users.user_id
                                    ) AS totalUsers,
                                    locations.parent_id
                            FROM
                                    warehouses
                            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                            INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                            INNER JOIN locations ON locations.pk_id = warehouses.location_id
                            WHERE
                                    warehouses.district_id = $sel_dist
                            AND stakeholders.geo_level_id = 6
                            AND warehouses.stakeholder_id = 1
                            GROUP BY
                                    locations.parent_id
                    ) A
            JOIN (
                    SELECT
                            locations.location_name,
                            locations.pk_id
                    FROM
                            locations
                    WHERE
                            locations.district_id = $sel_dist
                    AND locations.geo_level_id = 5
            ) B ON A.parent_id = B.pk_id";
        }
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By User 1
     * @param $wh_type
     * @param $provFilter
     * @param $sel_dist
     * @param $str_date
     */
    public function getReportedDistrictsByUser1($wh_type, $provFilter, $sel_dist, $str_date) {
        if ($wh_type == 2) {

            $str_qry = "
                        SELECT
                                locations.location_name AS districtName,
                                Count(
                                        DISTINCT hf_data_master.created_by
                                ) AS reported,
                                locations.district_id AS districtId
                        FROM
                                warehouses
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN locations ON warehouses.district_id = locations.pk_id
                        INNER JOIN hf_data_master ON hf_data_master.warehouse_id = warehouse_users.warehouse_id
                        WHERE
                                stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                        AND warehouses. STATUS = 1
                        AND warehouses.province_id= '" . $provFilter . "'
                        AND DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) = '" . $str_date . "'
                        AND hf_data_master.created_by != 2
                        AND hf_data_master.issue_balance IS NOT NULL
                        AND hf_data_master.issue_balance != 0
                        GROUP BY
                                hf_data_master.reporting_start_date,
            locations.location_name";
        } else if ($wh_type == 4) {

            $str_qry = "
                                             Select
                     B.location_name as districtName,
                     A.parent_id as districtId,
                     A.reported

                     from (SELECT
                            locations.location_name AS districtName,
                            Count(
                                    DISTINCT hf_data_master.created_by
                            ) AS reported,
                            locations.district_id AS districtId,
                      locations.parent_id
                    FROM
                            warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                    INNER JOIN locations ON warehouses.location_id = locations.pk_id
                    INNER JOIN hf_data_master ON hf_data_master.warehouse_id = warehouse_users.warehouse_id
                    WHERE
                            stakeholders.geo_level_id = 6
                    AND warehouses.stakeholder_id = 1
                    AND warehouses. STATUS = 1
                    AND warehouses.district_id = '$sel_dist'
                    AND DATE_FORMAT(
                            hf_data_master.reporting_start_date,
                            '%Y-%m'
                    ) = '$str_date'
                    AND hf_data_master.created_by != 2
                    AND hf_data_master.issue_balance IS NOT NULL
                    AND hf_data_master.issue_balance != 0
                    GROUP BY
                            hf_data_master.reporting_start_date,
                            locations.parent_id) A
                    JOIN (
                            SELECT
                                    locations.location_name,
                                    locations.pk_id
                            FROM
                                    locations
                            WHERE
                                    locations.district_id = '$sel_dist'
                            AND locations.geo_level_id = 5
                    ) B ON A.parent_id = B.pk_id";
        }




        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By Facility
     * @param $wh_type
     * @param $sel_prov
     * @param $sel_dist
     */
    public function getReportedDistrictsByFacility($wh_type, $sel_prov, $sel_dist) {
        if ($wh_type == 2) {


            $str_qry = "SELECT
                                                locations.pk_id AS districtId,
                                                locations.location_name AS districtName,
                                                count(
                                                                DISTINCT warehouse_users.warehouse_id
                                                        ) AS totalWH
                                        FROM
                                                locations
                                            INNER JOIN warehouses ON locations.pk_id = warehouses.district_id
                                            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                                            INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id

                                                WHERE
                                                        stakeholders.geo_level_id = 6
                                                        AND warehouses.stakeholder_id = 1
                                                        AND warehouses.status = 1
                                                        AND locations.province_id= '" . $sel_prov . "'
                                                GROUP BY
                                                        warehouses.district_id";
        } else {
            $str_qry = "SELECT
        B.pk_id districtId,
        B.location_name districtName,
        A.totalWH
        FROM
                (
                        SELECT
                                COUNT(
                                        DISTINCT warehouse_users.warehouse_id
                                ) AS totalWH,
                                locations.parent_id
                        FROM
                                warehouses
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN locations ON locations.pk_id = warehouses.location_id
                        WHERE
                                warehouses.district_id = $sel_dist
                        AND stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                            AND warehouses. STATUS = 1
                        GROUP BY
                                locations.parent_id
                ) A
                JOIN (
                        SELECT
                                locations.location_name,
                                locations.pk_id
                        FROM
                                locations
                        WHERE
                                locations.district_id = $sel_dist
                        AND locations.geo_level_id = 5
                ) B ON A.parent_id = B.pk_id";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Districts By Facility 1
     * $wh_type
     * @param $sel_prov
     * @param $sel_dist
     * @param $str_date
     */
    public function getReportedDistrictsByFacility1($wh_type, $sel_prov, $sel_dist, $str_date) {

        if ($wh_type == 2) {
            $str_qry = "
                SELECT 
                        locations.location_name AS districtName,
                        COUNT(
                                DISTINCT hf_data_master.warehouse_id
                        ) AS reported,
                        locations.pk_id AS districtId
                FROM
                        hf_data_master
                INNER JOIN warehouses ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN locations ON warehouses.district_id = locations.pk_id
                INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                WHERE
                        stakeholders.geo_level_id = 6
                AND warehouses.stakeholder_id = 1
                AND warehouses. STATUS = 1
                AND warehouses.province_id = '" . $sel_prov . "'
                AND DATE_FORMAT(
                        hf_data_master.reporting_start_date,
                        '%Y-%m'
                ) = '" . $str_date . "'
                AND hf_data_master.issue_balance IS NOT NULL
                AND hf_data_master.issue_balance != 0
                GROUP BY
                        warehouses.district_id
                ORDER BY
                 locations.location_name ASC";
        } else {

            $str_qry = "

        SELECT
                B.location_name AS districtName,
                A.parent_id AS districtId,
                A.reported
        FROM
                (
                        SELECT
                                locations.location_name AS districtName,
                                Count(
                                        DISTINCT hf_data_master.warehouse_id
                                ) AS reported,
                                locations.district_id AS districtId,
                                locations.parent_id
                        FROM
                                warehouses
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        INNER JOIN hf_data_master ON hf_data_master.warehouse_id = warehouse_users.warehouse_id
                        WHERE
                                stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                        AND warehouses. STATUS = 1
                        AND warehouses.district_id = '$sel_dist'
                        AND DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) = '$str_date'
                        AND hf_data_master.created_by != 2
                        AND hf_data_master.issue_balance IS NOT NULL
                        AND hf_data_master.issue_balance != 0
                        GROUP BY
                                hf_data_master.reporting_start_date,
                                locations.parent_id
                ) A
        JOIN (
                SELECT
                        locations.location_name,
                        locations.pk_id
                FROM
                        locations
                WHERE
                        locations.district_id = '$sel_dist'
                AND locations.geo_level_id = 5
        ) B ON A.parent_id = B.pk_id";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Total By Facility
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_tehsil
     */
    public function getNonReportedTotalByFacility($wh_type, $str_date, $sel_prov, $sel_dist, $sel_tehsil) {
        if (!empty($sel_dist)) {
            $qry_dist = "AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND locations.parent_id = $sel_tehsil";
        } else {
            $qry_teh = "";
        }

        $str_qry = " SELECT
                        count(DISTINCT hf_data_master.warehouse_id) as abc
                FROM
                        warehouses
                INNER JOIN locations ON warehouses.location_id = locations.pk_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                WHERE
                hf_data_master.issue_balance IS NOT NULL
                AND warehouses.status = 1
                AND hf_data_master.issue_balance != 0
                AND stakeholders.geo_level_id = 6 AND warehouses.stakeholder_id = 1
                AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                AND warehouses.province_id = '" . $sel_prov . "'
                $qry_dist ";




        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Total By Facility
     * $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_tehsil
     */
    public function getTotalByFacility($wh_type, $str_date, $sel_prov, $sel_dist, $sel_tehsil) {
        if (!empty($sel_dist)) {
            $qry_dist = "AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND locations.parent_id = $sel_tehsil";
        } else {
            $qry_teh = "";
        }

        $str_qry = "SELECT
                    COUNT(DISTINCT warehouse_users.warehouse_id) as abc
                 FROM
                    warehouses
                INNER JOIN locations ON warehouses.location_id = locations.pk_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                WHERE
                warehouses.location_id <> 0
                AND warehouses.status = 1
                AND stakeholders.geo_level_id = 6
                AND warehouses.stakeholder_id = 1
                AND warehouses.province_id = '" . $sel_prov . "'
                $qry_dist
                $qry_teh
                ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Districts By Facility
     * @param $str_date
     * @param $sel_prov 
     * @param $sel_dist
     */
    public function getNonReportedDistrictsByFacility($str_date, $sel_prov, $sel_dist) {


        $str_qry = "SELECT DISTINCT
                    hf_data_master.warehouse_id
                FROM
                    warehouses
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                WHERE
                    hf_data_master.issue_balance IS NOT NULL
                    AND hf_data_master.issue_balance != 0
                    AND warehouses.status = 1
                    AND stakeholders.geo_level_id = 6 AND warehouses.stakeholder_id = 1
                    AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'";




        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Districts By Facility 1
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $qwhlist
     * @param $sel_tehsil
     */
    public function getNonReportedDistrictsByFacility1($wh_type, $str_date, $sel_prov, $sel_dist, $qwhlist, $sel_tehsil) {
        if (!empty($sel_dist)) {
            $qry_dist = "AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND locations.parent_id = $sel_tehsil";
            $qry = "warehouses.location_id";
        } else {
            $qry_teh = "";
            $qry = "warehouses.district_id";
        }

        $str_qry = "SELECT DISTINCT
                        warehouses.pk_id
                FROM
                    warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN locations ON $qry = locations.pk_id
                    INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                WHERE
                    warehouses.location_id <> 0
                    AND warehouses.status = 1
                    AND stakeholders.geo_level_id = 6 AND  warehouses.stakeholder_id = 1
                    $qry_dist
                    AND warehouses.province_id = '" . $sel_prov . "'
                    $qry_teh
                    $qwhlist
                ORDER BY
                    locations.location_name ASC ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Districts By Uc
     * @param $wh_type 
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_teh
     */
    public function getNonReportedDistrictsByUc($wh_type, $str_date, $sel_prov, $sel_dist, $sel_teh) {
        if ($wh_type == 4) {
            $qry = "and warehouses.district_id = $sel_dist";
        } else {
            $qry = "and UC.parent_id = $sel_teh";
        }

        $str_qry = "SELECT
                            DISTINCT UC.pk_id AS UCID
                        FROM
                            locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        WHERE
                            hf_data_master.issue_balance IS NOT NULL
                            AND warehouses.status = 1
                            AND hf_data_master.issue_balance != 0
                            AND stakeholders.geo_level_id = 6 AND warehouses.stakeholder_id = 1
                            AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "' $qry";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Total By Uc
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_tehsil
     */
    public function getNonReportedTotalByUc($wh_type, $str_date, $sel_prov, $sel_dist, $sel_tehsil) {
        $qry_dist = "";
        if (!empty($sel_dist)) {
            $qry_dist = " AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND UC.parent_id = $sel_tehsil";
        } else {
            $qry_teh = "";
        }

        $str_qry = "SELECT
                    count(DISTINCT UC.pk_id) as abc
                FROM
                    locations as District
                INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                WHERE
                    hf_data_master.issue_balance IS NOT NULL
                    AND warehouses.status = 1
                    AND hf_data_master.issue_balance != 0
                    AND stakeholders.geo_level_id = 6 AND warehouses.stakeholder_id = 1
                    AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $str_date . "'
                    AND warehouses.province_id = '" . $sel_prov . "'
                   $qry_dist
                   $qry_teh";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Total By Uc
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_tehsil
     */
    public function getTotalByUc($wh_type, $str_date, $sel_prov, $sel_dist, $sel_tehsil) {
        $qry_dist = "";
        if (!empty($sel_dist)) {
            $qry_dist = " AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND UC.parent_id = $sel_tehsil";
        } else {
            $qry_teh = "";
        }

        $str_qry = "SELECT
                    COUNT(DISTINCT UC.pk_id) as abc
                FROM
                    locations AS District
                INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                WHERE
                stakeholders.geo_level_id = 6
                AND warehouses.status = 1
                AND warehouses.stakeholder_id = 1
                AND warehouses.province_id = '" . $sel_prov . "'
                $qry_dist
                $qry_teh
                ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Non Reported Districts By Uc 1
     * @param $wh_type
     * @param $str_date
     * @param $sel_prov
     * @param $sel_dist
     * @param $sel_tehsil
     * @param $qwhlist
     */
    public function getNonReportedDistrictsByUc1($wh_type, $str_date, $sel_prov, $sel_dist, $sel_tehsil, $qwhlist) {
        $qry_dist = "";
        if (!empty($sel_dist)) {
            $qry_dist = " AND warehouses.district_id = '" . $sel_dist . "' ";
        }
        if ($wh_type == 5) {
            $qry_teh = "AND UC.parent_id = $sel_tehsil";
        } else {
            $qry_teh = "";
        }
        $str_qry = "SELECT DISTINCT
                    Province.location_name AS Province,
                    District.location_name AS District,
                    UC.location_name AS UCName,
                    teh.location_name AS tehName,
                    users.user_name AS User,
                    users.cell_number AS Phone
                    FROM
                            warehouses
                    INNER JOIN stakeholders ON  warehouses.stakeholder_office_id = stakeholders.pk_id
                    LEFT JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id

                    INNER JOIN locations AS UC ON warehouses.location_id = UC.pk_id
                    INNER JOIN locations AS teh ON UC.parent_id  = teh.pk_id
                    INNER JOIN users ON warehouse_users.user_id = users.pk_id
                    INNER JOIN locations AS District ON UC.district_id = District.pk_id
                    INNER JOIN locations AS Province ON District.province_id = Province.pk_id
                    WHERE
                    stakeholders.geo_level_id = 6
                    AND warehouses.status = 1
                    AND warehouses.stakeholder_id = 1
                    AND warehouses.province_id = '" . $sel_prov . "'
                   $qry_dist
                   $qry_teh
                   $qwhlist";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $warehouse_id
     * @return typeGet Non Reported Districts By Facility 2
     * @param $warehouse_id
     */
    public function getNonReportedDistrictsByFacility2($warehouse_id) {
        $str_qry = "SELECT
                office.stakeholder_name,
                stakeholders.stakeholder_name AS wh_type_id,
                province.location_name AS prov_tittle,
                Districts.location_name AS d_name,
                teh.location_name as teh_name,
                UCs.location_name As UC,
                warehouses.warehouse_name,
                users.user_name AS FullName,
                users.cell_number AS Phone
                FROM
                warehouses
                Inner Join locations AS province ON  warehouses.province_id = province.pk_id
                Inner Join locations AS Districts ON warehouses.district_id = Districts.pk_id
                Inner Join locations AS UCs ON  warehouses.location_id = UCs.pk_id
                INNER JOIN locations AS teh ON UCs.parent_id  = teh.pk_id
                Inner Join stakeholders AS office ON  warehouses.stakeholder_id = office.pk_id
                Inner Join stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                INNER JOIN users ON warehouse_users.user_id = users.pk_id
                WHERE warehouses.pk_id=" . $warehouse_id . "
                AND warehouses.status = 1
                ORDER BY province.location_name ,Districts.location_name
                LIMIT 0,1";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Item Pack Sizes Wastages Rate Allowed
     * @param $item_id
     */
    public function getItemPackSizesWastagesRateAllowed($item_id) {
        if ($item_id == 'all') {
            $str_qry = "SELECT
                    item_pack_sizes.item_name,
                    Sum(item_pack_sizes.wastage_rate_allowed) wastage_rate_allowed
                   FROM
                    item_pack_sizes
                   Group By item_pack_sizes.item_name";
        } else {

            $str_qry = "SELECT
                    item_pack_sizes.item_name,
                    item_pack_sizes.wastage_rate_allowed
                   FROM
                    item_pack_sizes
                    WHERE
                    item_pack_sizes.pk_id = $item_id";
        }


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Central
     * 
     */
    public function getShipmentCentral() {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 1
                        AND stock_master.draft = 0
                        AND warehouses.status = 1
                        AND stakeholders.stakeholder_type_id = 1
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Provincial
     * @param $provFilter
     */
    public function getShipmentProvincial($provFilter) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 2
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                       $provFilter
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Division
     * @param $provFilter
     * @param $distFilter
     */
    public function getShipmentDivision($provFilter, $distFilter) {
        $str_qry = "SELECT 
    C.wh_id,
    C.wh_name,
    IFNULL(B.stockIssue,0) as stockIssue,
    IFNULL(B.stockRcv,0) as stockRcv
    From
    (SELECT
        wh_id,
        wh_name,
        SUM(stockIssue) AS stockIssue,
        SUM(stockRcv) AS stockRcv
    FROM
        (
                SELECT
                        warehouses.pk_id AS wh_id,
                        warehouses.warehouse_name AS wh_name,
                        SUM(

                                IF (
                                        stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2,
                                        1,
                                        0
                                )
                        ) AS stockIssue,
                        SUM(

                                IF (
                                        stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1,
                                        1,
                                        0
                                )
                        ) AS stockRcv,
                        stock_master.transaction_number
                FROM
                        warehouses
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id
                OR warehouses.pk_id = stock_master.to_warehouse_id
                INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                INNER JOIN locations ON warehouses.location_id = locations.pk_id
                WHERE
                        stakeholders.geo_level_id = 3
                AND warehouses. STATUS = 1
                AND stock_master.draft = 0
                $provFilter
                                                $distFilter
                GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
        ) AS A
    GROUP BY
        wh_id
    ) B

    RIGHT JOIN (
    SELECT
    warehouses.pk_id AS wh_id,
    warehouses.warehouse_name AS wh_name
    from warehouses 
    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
      INNER JOIN locations ON warehouses.location_id = locations.pk_id
    where stakeholders.geo_level_id = 3 
    and warehouses. STATUS = 1 
    $provFilter
    $distFilter
    ) C ON B.wh_id = C.wh_id

    ";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment District
     * @param $provFilter
     * @param $distFilter
     */
    public function getShipmentDistrict($provFilter, $distFilter) {
        $str_qry = "SELECT 
    C.wh_id,
    C.wh_name,
    IFNULL(B.stockIssue,0) as stockIssue,
    IFNULL(B.stockRcv,0) as stockRcv
    From
    (SELECT
        wh_id,
        wh_name,
        SUM(stockIssue) AS stockIssue,
        SUM(stockRcv) AS stockRcv
    FROM
        (
                SELECT
                        warehouses.pk_id AS wh_id,
                        warehouses.warehouse_name AS wh_name,
                        SUM(

                                IF (
                                        stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2,
                                        1,
                                        0
                                )
                        ) AS stockIssue,
                        SUM(

                                IF (
                                        stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1,
                                        1,
                                        0
                                )
                        ) AS stockRcv,
                        stock_master.transaction_number
                FROM
                        warehouses
                INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id
                OR warehouses.pk_id = stock_master.to_warehouse_id
                INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                WHERE
                        stakeholders.geo_level_id = 4
                AND warehouses. STATUS = 1
                AND stock_master.draft = 0
                $provFilter
                                                $distFilter
                GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
        ) AS A
    GROUP BY
        wh_id
    ) B

    RIGHT JOIN (
    SELECT
                        warehouses.pk_id AS wh_id,
    warehouses.warehouse_name AS wh_name
    from warehouses 
        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
    where stakeholders.geo_level_id = 4 
    and warehouses. STATUS = 1 
    $provFilter
    $distFilter
    ) C ON B.wh_id = C.wh_id

";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Tehsil
     * @param $provFilter
     * @param $distFilter
     * @param $tehsilFilter
     */
    public function getShipmentTehsil($provFilter, $distFilter, $tehsilFilter) {
        $str_qry = "
            SELECT 
            C.wh_id,
            C.wh_name,
            IFNULL(B.stockIssue,0) as stockIssue,
            IFNULL(B.stockRcv,0) as stockRcv
            From
           (SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                         stock_master.transaction_number
                    FROM
                        locations
                    INNER JOIN warehouses ON locations.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 5
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                        $tehsilFilter
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ) B

                RIGHT JOIN (
                SELECT
                                        warehouses.pk_id AS wh_id,
                warehouses.warehouse_name AS wh_name
                from warehouses 
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                where stakeholders.geo_level_id = 5 
                and warehouses. STATUS = 1 
                $provFilter
                $distFilter
                $tehsilFilter
) C ON B.wh_id = C.wh_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Central 1
     * @param $date
     */
    public function getShipmentCentral1($date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,

                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id

                    WHERE
                        stakeholders.geo_level_id = 1
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        AND stakeholders.stakeholder_type_id = 1
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * GetS hipment Provincial 1
     * @param $provFilter
     * @param $date
     */
    public function getShipmentProvincial1($provFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 2
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Division 1
     * @param $provFilter
     * @param $distFilter
     * @param $date
     */
    public function getShipmentDivision1($provFilter, $distFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    INNER JOIN locations ON warehouses.location_id = locations.pk_id
                    WHERE
                        stakeholders.geo_level_id = 3
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                       AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment District 1.
     * $provFilter
     * @param $distFilter
     * @param $date
     */
    public function getShipmentDistrict1($provFilter, $distFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 4
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                       AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Tehsil 1
     * @param $provFilter
     * @param $distFilter
     * @param $tehsilFilter
     * @param $date
     */
    public function getShipmentTehsil1($provFilter, $distFilter, $tehsilFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                         stock_master.transaction_number
                    FROM
                        locations
                    INNER JOIN warehouses ON locations.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 5
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                        $tehsilFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status Central
     * 
     */
    public function getStatusCentral() {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 1
                        AND stock_master.draft = 0
                        AND warehouses.status = 1
                        AND stakeholders.stakeholder_type_id = 1
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $provFilter
     * @return typeGet Status Provincial
     * @param $provFilter
     */
    public function getStatusProvincial($provFilter) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 2
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                       $provFilter
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status District
     * @param $provFilter
     * @param $distFilter
     */
    public function getStatusDistrict($provFilter, $distFilter) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    INNER JOIN pilot_districts ON pilot_districts.district_id = towh.district_id
                    WHERE
                        stakeholders.geo_level_id = 4
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter

                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status Tehsil
     * $provFilter
     * @param $distFilter
     * @param $tehsilFilter
     */
    public function getStatusTehsil($provFilter, $distFilter, $tehsilFilter) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                         stock_master.transaction_number
                    FROM
                        locations
                    INNER JOIN warehouses ON locations.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 5
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                        $tehsilFilter
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status Central 1
     * @param $date
     */
    public function getStatusCentral1($date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv,
                    SUM(pendingStatus) AS pending
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2 && stock_detail.is_received = 0 , 1,0) ) AS pendingStatus,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
                    WHERE
                        stakeholders.geo_level_id = 1
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        AND stakeholders.stakeholder_type_id = 1
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * get Status Provincial 1
     * @param $provFilter
     * @param $dat$e
     */
    public function getStatusProvincial1($provFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 2
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status District 1
     * $provFilter
     * @param $distFilter
     * @param $date
     */
    public function getStatusDistrict1($provFilter, $distFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                        stock_master.transaction_number
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    INNER JOIN pilot_districts ON pilot_districts.district_id = towh.district_id
                    WHERE
                        stakeholders.geo_level_id = 4
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                       AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status Tehsil 1
     * @param $provFilter
     * @param $distFilter
     * @param $tehsilFilter
     * @param $date
     */
    public function getStatusTehsil1($provFilter, $distFilter, $tehsilFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockIssue) AS stockIssue,
                    SUM(stockRcv) AS stockRcv
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        SUM(IF(stock_master.from_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2, 1, 0)) AS stockIssue,
                        SUM(IF(stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 1, 1, 0)) AS stockRcv,
                         stock_master.transaction_number
                    FROM
                        locations
                    INNER JOIN warehouses ON locations.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON warehouses.pk_id = stock_master.from_warehouse_id OR warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN warehouses AS towh ON stock_master.to_warehouse_id = towh.pk_id
                    WHERE
                        stakeholders.geo_level_id = 5
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                        $tehsilFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Status Pending Provincial 1
     * @param $provFilter
     * @param $date
     */
    public function getStatusPendingProvincial1($provFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockPend) AS pending
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        (IF (stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2 && stock_detail.is_received=0 ,
                                COUNT(DISTINCT stock_master.pk_id),
                                0
                        )
                        ) AS stockPend,
                        stock_master.transaction_number
                    FROM
                        warehouses
                   INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                   INNER JOIN stock_master ON  warehouses.pk_id = stock_master.to_warehouse_id
                   INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                    WHERE
                        stakeholders.geo_level_id = 2
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * $provFilter
     * @param $distFilter
     * @param $date
     */
    public function getStatusPendingDistrict1($provFilter, $distFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockPend) AS pending
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        (IF (stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2 && stock_detail.is_received=0 ,
                                COUNT(DISTINCT stock_master.pk_id),
                                0
                        )
                        ) AS stockPend,
                        stock_master.transaction_number
                    FROM
                        warehouses
                   INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                   INNER JOIN stock_master ON  warehouses.pk_id = stock_master.to_warehouse_id
                   INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                   INNER JOIN pilot_districts ON pilot_districts.district_id = warehouses.district_id
                    WHERE
                        stakeholders.geo_level_id = 4
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                       AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $provFilter
     * @param type $distFilter
     * @param type $tehsilFilter
     * @param type $date
     * @return typeGet Status Pending Tehsil 1
     * @param $provFilter
     * @param $distFilter
     * @param $tehsilFilter
     * @param $date
     */
    public function getStatusPendingTehsil1($provFilter, $distFilter, $tehsilFilter, $date) {
        $str_qry = "SELECT
                    wh_id,
                    wh_name,
                    SUM(stockPend) AS pending
                FROM (
                    SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        (IF (stock_master.to_warehouse_id = warehouses.pk_id && stock_master.transaction_type_id = 2 && stock_detail.is_received=0 ,
                                COUNT(DISTINCT stock_master.pk_id),
                                0
                        )
                        ) AS stockPend,
                         stock_master.transaction_number
                    FROM
                        locations
                    INNER JOIN warehouses ON locations.pk_id = warehouses.location_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN stock_master ON  warehouses.pk_id = stock_master.to_warehouse_id
                    INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                    WHERE
                        stakeholders.geo_level_id = 5
                        AND warehouses.status = 1
                        AND stock_master.draft = 0
                        $provFilter
                        $distFilter
                        $tehsilFilter
                        AND DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '" . $date . "'
                    GROUP BY
                        warehouses.pk_id,
                        stock_master.transaction_number
                    )AS A
                GROUP BY
                    wh_id
                ORDER BY
                    wh_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get EPI Stores Report
     * @param $where
     */
    public function getEPIStoresReport($where) {
        $str_qry = "SELECT
                    item_pack_sizes.pk_id AS item_id,
                    ABS(IFNULL(
                                    Sum(stock_detail.quantity)*item_pack_sizes.number_of_doses,
                                    0
                            )) AS total
                    FROM
                            stock_detail
                    INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                    INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                    INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                    INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                    INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                    INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
                   
                    WHERE
                    $where AND
                    item_pack_sizes.item_category_id <> 3
                    GROUP BY
                            stakeholder_item_pack_sizes.item_pack_size_id
                    ORDER BY
                            item_pack_sizes.list_rank ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Warehouse Id
     * @param $wh_type
     * @param $and
     */
    public function getWarehouseId($wh_type, $and) {
        $querypro = "SELECT pk_id as wh_id,warehouse_name as wh_name,stakeholder_office_id FROM warehouses WHERE stakeholder_office_id=" . $wh_type . " $and";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Warehouse Name
     * @param $warehouse_id
     */
    public function getWarehouseName($warehouse_id) {

        $query = "SELECT
                        warehouses.warehouse_name from warehouses where
                        warehouses.pk_id = '" . $warehouse_id . "'  and  warehouses.status = 1  ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($query);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Province Name
     * 
     */
    public function getProvinceName() {
        $querypro = "SELECT DISTINCT
                        l.pk_id AS PkLocID,
                        l.location_name AS LocName
                        FROM
                        locations AS l
                        INNER JOIN locations AS dist ON dist.province_id = l.pk_id
                        INNER JOIN pilot_districts ON pilot_districts.district_id = dist.pk_id
                        WHERE
                        l.geo_level_id = 2 AND
                        l.province_id IS NOT NULL
                        ORDER BY l.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Province Name Sindh
     * 
     */
    public function getProvinceNameSindh() {
        $querypro = "SELECT DISTINCT
                        l.pk_id AS PkLocID,
                        l.location_name AS LocName
                        FROM
                        locations AS l
                        INNER JOIN locations AS dist ON dist.province_id = l.pk_id
                        INNER JOIN pilot_districts ON pilot_districts.district_id = dist.pk_id
                        WHERE
                        l.geo_level_id = 2 AND
                        l.pk_id = 2 AND
                        l.province_id IS NOT NULL
                        ORDER BY l.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Province Name 1
     * @param $provId
     */
    public function getProvinceName1($provId) {
        $querypro = "SELECT
                        Districts.pk_id as PkLocID,
                        Districts.location_name as LocName
                        FROM
                        locations AS Districts
                        INNER JOIN pilot_districts ON pilot_districts.district_id = Districts.pk_id
                        WHERE
                        Districts.province_id = " . $provId . "
                        AND Districts.geo_level_id = 4

                        GROUP BY
                                Districts.pk_id
                        ORDER BY
                                Districts.location_name ASC";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Province Name 2.
     * @param $distId
     */
    public function getProvinceName2($distId) {
        $querypro = "SELECT
                        Tehsil.pk_id as PkLocID,
                        Tehsil.location_name as LocName
                        FROM
                                locations AS Tehsil
                        WHERE
                                Tehsil.geo_level_id = 5
                        AND Tehsil.parent_id = $distId
                        GROUP BY
                                Tehsil.pk_id
                        ORDER BY
                                Tehsil.location_name ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Transaction Issue
     * @param $whId
     * @param $date
     */
    public function getShipmentTransactionIssue($whId, $date) {
        $querypro = "SELECT
                        stock_master.pk_id as PkStockID,
                        stock_master.transaction_number as TranNo,
                        warehouses.warehouse_name as wh_name,
                        DATE_FORMAT(stock_master.transaction_date, '%d/%m/%y') AS TranDate,
                        (SELECT IF(SUM(IF(stock_detail.is_received = 0, 1, 0)) > 0, 0, 1) FROM stock_detail WHERE stock_detail.stock_master_id = stock_master.pk_id) AS IsReceived,
                        stock_detail.adjustment_type as adjustmentType
                        FROM
                        stock_master
                        INNER JOIN warehouses ON stock_master.to_warehouse_id = warehouses.pk_id
                        INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                        WHERE
                            stock_master.from_warehouse_id = '$whId'
                            AND stock_master.draft = 0
                            AND warehouses.status = 1
                            AND DATE_FORMAT(stock_master.transaction_date, '%m-%Y') = '" . $date . "'
                            AND stock_master.transaction_type_id = 2
                        GROUP BY
                                stock_master.transaction_number
                        ORDER BY
                                stock_master.transaction_number ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $whId
     * @param type $date
     * @return typeGet Shipment Transaction Receive
     * @param $whId
     * @param $date
     */
    public function getShipmentTransactionReceive($whId, $date) {
        $querypro = "SELECT
                        stock_master.pk_id as PkStockID,
                        stock_master.transaction_number as TranNo,
                        warehouses.warehouse_name as wh_name,
                        DATE_FORMAT(stock_master.transaction_date, '%d/%m/%y') AS TranDate
                        FROM
                                stock_master
                        INNER JOIN warehouses ON stock_master.from_warehouse_id = warehouses.pk_id
                        WHERE
                            stock_master.to_warehouse_id = '$whId'
                            AND stock_master.draft = 0
                            AND warehouses.status = 1
                            AND DATE_FORMAT(stock_master.transaction_date, '%m-%Y') = '" . $date . "'
                            AND stock_master.transaction_type_id = 1
                        GROUP BY

                                stock_master.transaction_number
                        ORDER BY
                                stock_master.transaction_number ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shipment Transaction Pending
     * @param $whId
     * @param $date
     */
    public function getShipmentTransactionPending($whId, $date) {
        $querypro = "SELECT
                        stock_master.pk_id as PkStockID,
                        stock_master.transaction_number as TranNo,
                        warehouses.warehouse_name as wh_name,
                        (SELECT IF(SUM(IF(stock_detail.is_received = 0, 1, 0)) > 0, 0, 1) FROM stock_detail WHERE stock_detail.stock_master_id = stock_master.pk_id) AS IsReceived,
                        DATE_FORMAT(stock_master.transaction_date, '%d/%m/%y') AS TranDate
                        FROM
                                stock_master
                        INNER JOIN warehouses ON stock_master.from_warehouse_id = warehouses.pk_id
                        INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                        WHERE
                            stock_master.to_warehouse_id = '$whId'
                            AND stock_master.draft = 0
                            AND stock_detail.is_received = 0
                            AND warehouses.status = 1
                            AND DATE_FORMAT(stock_master.transaction_date, '%m-%Y') = '" . $date . "'
                            AND stock_master.transaction_type_id = 2
                        GROUP BY

                                stock_master.transaction_number
                        ORDER BY
                                stock_master.transaction_number ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Uc
     * @param $district_id
     * @param $wh_type
     */
    public function getReportedUc($district_id, $wh_type) {

        $qry_dist = "";
        if ($wh_type == 2) {
            if (!empty($district_id)) {
                $qry_dist = " AND warehouses.district_id = '" . $district_id . "' ";
            }
        } else {
            if (!empty($district_id)) {
                $qry_dist = " AND UC.parent_id = '" . $district_id . "' ";
            }
        }


        $querypro = "SELECT
                        warehouses.warehouse_name AS WHName,
                        District.location_name AS District,
                        users.user_name AS FullName,
                        users.email AS Email,
                        users.address AS Address,
                        users.phone_number AS Phone,
                        warehouses.pk_id AS WHId,
                        UC.location_name AS UCName,
                        UC.pk_id as PkLocID
                    FROM
                            warehouses
                    INNER JOIN stakeholders ON stakeholders.pk_id = warehouses.stakeholder_office_id
                    INNER JOIN locations AS District ON warehouses.district_id = District.pk_id
                    LEFT JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                    LEFT JOIN users ON warehouse_users.user_id = users.pk_id
                    INNER JOIN locations AS UC ON warehouses.location_id = UC.pk_id
                    WHERE
                            stakeholders.geo_level_id = 6
                            AND warehouses.status = 1
                            AND warehouses.stakeholder_id = 1
                            $qry_dist
                    GROUP BY
                            UC.pk_Id
                    ORDER BY UCName";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Popup Data Entry
     * @param $district_id
     */
    public function getPopupDataEntry($district_id) {
        $querypro = "SELECT
                        warehouses.pk_id as wh_id,
                        warehouses.warehouse_name as wh_name,
                        warehouses.province_id
                    FROM
                        warehouses
                    INNER JOIN stakeholders ON stakeholders.pk_id = warehouses.stakeholder_office_id
                    WHERE
                        warehouses.location_id = $district_id
                        AND warehouses.status = 1
                        AND warehouses.stakeholder_id = 1
                        AND stakeholders.geo_level_id = 6";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reportet Uc User
     * @param $wh_type
     * @param $district_id
     */
    public function getReportetUcUser($wh_type, $district_id) {
        if ($wh_type == 2) {
            $qry = "warehouses.district_id = $district_id";
        } else {
            $qry = "UC.parent_id = $district_id";
        }

        $querypro = "SELECT distinct
                        District.location_name AS District,
                        users.pk_id as UserID,
                        users.user_name AS FullName,
                        users.address AS Address,
                        users.phone_number AS Phone
                    FROM
                        warehouses
                        INNER JOIN stakeholders ON stakeholders.pk_id = warehouses.stakeholder_office_id
                        INNER JOIN locations AS District ON warehouses.district_id = District.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN users ON warehouse_users.user_id = users.pk_id
                        INNER JOIN locations AS UC ON  warehouses.location_id = UC.pk_id
                    WHERE
                       $qry
                        AND warehouses.status = 1
                        AND stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                    ORDER BY
                        FullName";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reportet Uc User 1
     * @param $wh_type
     * @param $districtId
     * @param $month
     * @param $year
     */
    public function getReportetUcUser1($wh_type, $districtId, $month, $year) {
        if ($wh_type == 2) {
            $querypro = "
                     SELECT DISTINCT
                hf_data_master.created_by AS UserID
        FROM
                warehouses
        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
        WHERE
                warehouses.district_id = $districtId
        AND warehouses. STATUS = 1
        AND DATE_FORMAT(
                hf_data_master.reporting_start_date,
                '%m-%Y'
        ) = '" . $month . "-" . $year . "  '
        AND stakeholders.geo_level_id = 6
        AND warehouses.stakeholder_id = 1
        AND hf_data_master.created_by != 2
        AND hf_data_master.issue_balance IS NOT NULL
        AND hf_data_master.issue_balance != 0
        GROUP BY
        hf_data_master.created_by";
        } else {
            $querypro = "
                     SELECT DISTINCT
                hf_data_master.created_by AS UserID
        FROM
                warehouses
        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
        INNER JOIN locations ON warehouses.location_id = locations.pk_id
        WHERE
        locations.parent_id = $districtId
        AND warehouses. STATUS = 1
        AND DATE_FORMAT(
                hf_data_master.reporting_start_date,
                '%m-%Y'
        ) = '" . $month . "-" . $year . "'
        AND stakeholders.geo_level_id = 6
        AND warehouses.stakeholder_id = 1
        AND hf_data_master.created_by != 2
        AND hf_data_master.issue_balance IS NOT NULL
        AND hf_data_master.issue_balance != 0
        GROUP BY
        hf_data_master.created_by";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reportet Uc User 2
     * @param $wh_type
     * @param $districtId
     * @param $month
     * @param $year
     */
    public function getReportetUcUser2($wh_type, $districtId, $month, $year) {
        if ($wh_type == 2) {
            $querypro = "
                         SELECT
                    UC.pk_id AS PkLocID
            FROM
                    locations AS District
            INNER JOIN locations AS UC ON District.pk_id = UC.district_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            WHERE
                    warehouses.district_id = $districtId
            AND warehouses. STATUS = 1
            AND DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%m-%Y'
            ) = '" . $month . "-" . $year . "  '
            AND hf_data_master.issue_balance IS NOT NULL
            AND hf_data_master.issue_balance != 0
            AND stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            GROUP BY
                    UC.pk_id";
        } else {
            $querypro = "
                         SELECT
                    UC.pk_id AS PkLocID
            FROM
                    locations AS District
            INNER JOIN locations AS UC ON District.pk_id = UC.district_id
            INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            WHERE
                     UC.parent_id = $districtId
            AND warehouses. STATUS = 1
            AND DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%m-%Y'
            ) = '" . $month . "-" . $year . "  '
            AND hf_data_master.issue_balance IS NOT NULL
            AND hf_data_master.issue_balance != 0
            AND stakeholders.geo_level_id = 6
            AND warehouses.stakeholder_id = 1
            GROUP BY
                    UC.pk_id";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reportet Uc User 3
     * @param $user_id
     */
    public function getReportetUcUser3($user_id) {
        $querypro = "SELECT DISTINCT
                        locations.pk_id AS UCId,
                        locations.location_name as UCs
                    FROM
                        warehouse_users
                        INNER JOIN warehouses ON warehouse_users.warehouse_id = warehouses.pk_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                    WHERE
                       warehouses.status = 1 and warehouse_users.user_id = " . $user_id;

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported Warehouse List
     * @param type $wh_type
     * @param type $districtId
     * @return type
     */
    public function getReportedWarehouseList($wh_type, $districtId) {

        if ($wh_type == 2) {
            $qry = "warehouses.district_id = $districtId ";
        } else {
            $qry = "UC.parent_id = $districtId ";
        }

        $querypro = "SELECT
                        warehouses.warehouse_name AS WHName,
                        District.location_name AS District,
                        users.user_name AS FullName,
                        users.email AS Email,
                        users.address AS Address,
                        users.phone_number AS Phone,
                        warehouses.pk_id AS WHId,
                        UC.location_name AS UCName,
                        warehouses.location_id as locid
                    FROM
                        warehouses
                        INNER JOIN stakeholders ON stakeholders.pk_id = warehouses.stakeholder_office_id
                        INNER JOIN locations AS District ON warehouses.district_id = District.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN users ON warehouse_users.user_id = users.pk_id
                        LEFT JOIN locations AS UC ON warehouses.location_id = UC.pk_id
                    WHERE
                        $qry
                        AND warehouses.status = 1
                        AND stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                    GROUP BY
                        warehouses.pk_id
                    ORDER BY
                        warehouses.warehouse_name ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $wh_type
     * @param type $districtId
     * @param type $month
     * @param type $year
     * @return typeGet Reported Warehouse List 1
     * @param $wh_type
     * @param $districtId
     * @param $month
     * @param $year
     */
    public function getReportedWarehouseList1($wh_type, $districtId, $month, $year) {
        if ($wh_type == 2) {

            $querypro = "
                    SELECT
                    warehouses.pk_id AS wh_id
                    FROM
                    warehouses
                    INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                    warehouses.district_id = $districtId
                    AND DATE_FORMAT(
                            hf_data_master.reporting_start_date,
                            '%m-%Y'
                    ) = '" . $month . "-" . $year . "  '
                    AND stakeholders.geo_level_id = 6
                    AND warehouses. STATUS = 1
                    AND warehouses.stakeholder_id = 1
                    AND hf_data_master.issue_balance IS NOT NULL
                    AND hf_data_master.issue_balance != 0
                    GROUP BY
                            warehouses.pk_id";
        } else {

            $querypro = "
                    SELECT
                    warehouses.pk_id AS wh_id
                    FROM
                    warehouses
                    INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                    INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    INNER JOIN locations ON locations.pk_id = warehouses.location_id
                    WHERE
                         locations.parent_id =  $districtId
                    AND DATE_FORMAT(
                            hf_data_master.reporting_start_date,
                            '%m-%Y'
                    ) = '" . $month . "-" . $year . "  '
                    AND stakeholders.geo_level_id = 6
                    AND warehouses. STATUS = 1
                    AND warehouses.stakeholder_id = 1
                    AND hf_data_master.issue_balance IS NOT NULL
                    AND hf_data_master.issue_balance != 0
                    GROUP BY
                            warehouses.pk_id";
        }



        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Stakeholder By Warehouse Id
     * @param $wh_id
     */
    public function getStakeholderByWarehouseId($wh_id) {
        $querypro = "SELECT
                        warehouses.stakeholder_id
                    FROM
                        warehouses
                    WHERE
                        pk_id=" . $wh_id;

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Warehouse Level By Id
     * @param $id
     */
    public function GetWarehouseLevelById($id) {
        $querypro = "SELECT
                        stakeholders.geo_level_id,
                        warehouses.province_id
                        FROM
                        warehouses
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                        WHERE
                        warehouses.pk_id = $id AND warehouses.status = 1 ";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Previous Month Report Date
     * @param $thismonth
     */
    public function getPreviousMonthReportDate($thismonth) {
        $new_date_temp = $this->addDate($thismonth, - 1);
        return $new_date_temp->format('Y-m-d');
    }

    /**
     * Get Month Year By WH ID
     * @param $wh_id
     */
    public function getMonthYearByWHID($wh_id) {
        $querypro = " SELECT DISTINCT
                    MONTH(hf_data_master.reporting_start_date) as report_month,
                    YEAR(hf_data_master.reporting_start_date) as report_year,
                    warehouses.location_id as locid,
                    warehouses.province_id
                    FROM
                    hf_data_master
                    INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                    WHERE
                    hf_data_master.warehouse_id = $wh_id AND warehouses.status = 1
                    ORDER BY
                    hf_data_master.reporting_start_date DESC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Monthly Receive Quantity
     * @param $mm
     * @param $yy
     * @param $wh_id
     * @param $stkid
     */
    public function getMonthlyReceiveQuantity($mm, $yy, $wh_id, $stkid) {
        $querypro = "SELECT getMonthlyRcvQtyWH($mm,$yy,1,$wh_id) as rcv,item_pack_sizes.item_name as itm_name,item_pack_sizes.pk_id as itm_id,item_pack_sizes.number_of_doses as doses_per_unit"
                . " FROM `item_pack_sizes` WHERE `status`='1' AND item_category_id <> 3 AND `pk_id` IN "
                . "(SELECT `item_pack_size_id` FROM `stakeholder_item_pack_sizes` WHERE `stakeholder_id` = $stkid) ORDER BY
                 item_pack_sizes.list_rank ASC";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Pop Up Data
     * @param $wh_id
     * @param $PrevMonthDate
     * @param $rsRow1
     */
    public function getPopUpData($wh_id, $PrevMonthDate, $rsRow1) {
        $querypro = "SELECT * FROM hf_data_master WHERE `warehouse_id`='" . $wh_id . "' AND reporting_start_date='" . $PrevMonthDate . "' AND `item_pack_size_id`='$rsRow1'";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $wh_type
     * @param type $distId
     * @param type $month
     * @param type $year
     * @return typeReported Districts By Uc Graphs
     * @param $wh_type
     * @param $distId
     * @param $month
     * @param $year
     */
    public function reportedDistrictsByUcGraphs($wh_type, $distId, $month, $year) {

        if ($wh_type == 2) {
            $qry_where = "UC.district_id";

            if ($month . "-" . $year >= '2015-05') {
                $where = " AND DATE_FORMAT(
                     warehouses.starting_on,
                    '%Y-%m'
                         )  IS  NULL)";
            } else {
                $where = "";
            }
            $query = "SELECT
                        B.pk_id districtId,
                        B.location_name districtName,
                        A.totalWH
                        FROM
                       (SELECT
                        COUNT(
                        DISTINCT UC.pk_id
                        ) AS totalWH,
                        District.pk_id as parent_id
                        FROM
                        locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id

                WHERE
                District.district_id = '$distId'
                AND stakeholders.geo_level_id = 6
                AND warehouses.stakeholder_id = 1
                AND warehouses. STATUS = 1
                  $where

                GROUP BY
                        District.district_id
                      ) A
             JOIN (SELECT
                locations.location_name,
                locations.pk_id
                FROM
                locations
                WHERE
                locations.district_id = $distId
                AND locations.geo_level_id = 4
                ) B ON A.parent_id = B.pk_id";
        } else if ($wh_type == 4) {
            $qry_where = "UC.parent_id";
            if ($month . "-" . $year >= '2015-05') {
                $where = " AND DATE_FORMAT(
                     warehouses.starting_on,
                    '%Y-%m'
                         )  IS  NULL)";
            } else {
                $where = "";
            }
            $sub_qry = "Select locations.district_id "
                    . "from locations where locations.pk_id = $distId";
            $this->_em = Zend_Registry::get('doctrine');
            $row = $this->_em->getConnection()->prepare($sub_qry);
            $row->execute();
            $rs = $row->fetchAll();
            $district_id = $rs[0]['district_id'];
            $query = "SELECT
                        B.pk_id districtId,
                        B.location_name districtName,
                        A.totalWH
                        FROM
                       (SELECT
                        COUNT(
                        DISTINCT UC.pk_id
                        ) AS totalWH,
                        UC.parent_id
                        FROM
                        locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id

                WHERE
                District.district_id = '$district_id'
                AND stakeholders.geo_level_id = 6
                AND warehouses.stakeholder_id = 1
                AND warehouses. STATUS = 1
                $where
                GROUP BY
                        UC.parent_id
                      ) A
             JOIN (SELECT
                locations.location_name,
                locations.pk_id
                FROM
                locations
                WHERE
                locations.pk_id = $distId
                AND locations.geo_level_id = 5
                ) B ON A.parent_id = B.pk_id";
        }

        if ($wh_type == 4) {
            $qry = "AND UC.parent_id = '" . $distId . "'";
        } else {
            $qry = "AND District.pk_id = '" . $distId . "'";
        }


        if ($month . "-" . $year >= '2015-05') {
            $querypro = "
                        SELECT
                          A.districtId,
                          A.districtName,
                          A.totalWH,
                          IFNULL(B.reported, 0) AS reported,

                           from (
                       $query
                        ) A
                        LEFT JOIN (
                        SELECT sum(A.reported) reported,A.districtId,A.districtName from(
                       SELECT
                        COUNT(DISTINCT UC.pk_id) AS reported,
                        District.pk_id AS districtId,
                        District.location_name AS districtName
                FROM
                        locations AS District
                INNER JOIN locations AS UC ON District.pk_id = $qry_where
                INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                WHERE
                        UC.geo_level_id = 6
                        AND warehouses.status = 1
                        AND  hf_data_master.issue_balance IS NOT NULL
                        AND hf_data_master.issue_balance != 0
                        $qry"
                    . "AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . " '
                       ) A )B ON  A.districtId = B.districtId";
        } else {
            $querypro = "SELECT
                    A.districtId,
                    A.districtName,
                    A.totalWH,
                    IFNULL(B.reported, 0) AS reported,
                    ROUND((IFNULL(B.reported, 0) / A.totalWH) * 100) AS reportingPercentage
                    from ( $query

                         ) A
                        LEFT JOIN (
                SELECT SUM(A.reported) reported,A.districtId,A.districtName from( 
                        SELECT
                        COUNT(DISTINCT UC.pk_id) AS reported,
                        District.pk_id AS districtId,
                        District.location_name AS districtName
                FROM
                        locations AS District
                INNER JOIN locations AS UC ON District.pk_id = $qry_where
                INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                WHERE
                        UC.geo_level_id = 6
                        AND warehouses.status = 1
                        AND  hf_data_master.issue_balance IS NOT NULL
                        AND hf_data_master.issue_balance != 0
                        $qry"
                    . "AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . " '

                     )A   )B ON A.districtId = B.districtId";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Reported Districts By User Graphs
     * @param $wh_type
     * @param $distId
     * @param $month
     * @param $year
     */
    public function reportedDistrictsByUserGraphs($wh_type, $distId, $month, $year) {


        if ($wh_type == 2) {
            $querypro = "
                    SELECT
                        COUNT(DISTINCT hf_data_master.created_by) AS reported
                        FROM
                                warehouses
                        INNER JOIN stakeholders ON  warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN locations ON warehouses.district_id = locations.pk_id
                        INNER JOIN hf_data_master ON hf_data_master.warehouse_id = warehouse_users.warehouse_id
                        WHERE
                                stakeholders.geo_level_id = 6
                                AND warehouses.status = 1
                                AND hf_data_master.created_by != 2
                                AND hf_data_master.issue_balance IS NOT NULL
                                AND hf_data_master.issue_balance != 0
                                AND locations.pk_id = '" . $distId . "'
                                AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  '";
        } else {

            $querypro = "
                        SELECT
                        COUNT(DISTINCT hf_data_master.created_by) AS reported
                        FROM
                        warehouses
                        INNER JOIN stakeholders ON  warehouses.stakeholder_office_id = stakeholders.pk_id
                        INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id

                        INNER JOIN hf_data_master ON hf_data_master.warehouse_id = warehouse_users.warehouse_id
                        WHERE
                                stakeholders.geo_level_id = 6
                                AND warehouses.status = 1
                                AND hf_data_master.created_by != 2
                                AND hf_data_master.issue_balance IS NOT NULL
                                AND hf_data_master.issue_balance != 0
                                AND locations.parent_id = '" . $distId . "'
                      AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  '";
        }


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Reported Districts By Facility Graphs
     * $wh_type
     * @param $distId
     * @param $month
     * @param $year
     */
    public function reportedDistrictsByFacilityGraphs($wh_type, $distId, $month, $year) {
        if ($wh_type == 2) {
            $querypro = "SELECT
                                    COUNT(DISTINCT  hf_data_master.warehouse_id) AS reported
                            FROM
                                    hf_data_master
                            INNER JOIN warehouses ON warehouses.pk_id = hf_data_master.warehouse_id
                            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                            INNER JOIN locations ON warehouses.district_id = locations.pk_id
                            INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                            WHERE
                                    stakeholders.geo_level_id = 6
                                    AND warehouses.status = 1
                                    AND warehouses.stakeholder_id = 1
                                    AND hf_data_master.issue_balance IS NOT NULL
                                    AND hf_data_master.issue_balance != 0
                                    AND locations.pk_id = '" . $distId . "'
                        AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  ' ";
        } else {
            $querypro = "SELECT
                                    COUNT(DISTINCT hf_data_master.warehouse_id) AS reported
                            FROM
                                    hf_data_master
                            INNER JOIN warehouses ON warehouses.pk_id = hf_data_master.warehouse_id
                            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                            INNER JOIN locations ON warehouses.location_id = locations.pk_id
                            INNER JOIN warehouse_users ON warehouses.pk_id = warehouse_users.warehouse_id
                            WHERE
                                    stakeholders.geo_level_id = 6
                                    AND warehouses.status = 1
                                    AND warehouses.stakeholder_id = 1
                                    AND hf_data_master.issue_balance IS NOT NULL
                                    AND hf_data_master.issue_balance != 0
                                    AND locations.parent_id = '" . $distId . "'
                                        AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  '";
        }


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Reported Districts Graphs
     * @param $qry
     * @param $month
     * @param $year
     */
    public function reportedDistrictsGraphs($qry, $month, $year) {
        $querypro = "$qry AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  '";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get ItemP ack Sizes Doses
     * @param $wh_id
     */
    public function getItemPackSizesDoses($wh_id) {
        if (empty($wh_id)) {
            $wh_id = '159';
        }

        $str_qry = "SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        item_pack_sizes.description,
                        Sum(stock_batch_warehouses.quantity) * item_pack_sizes.number_of_doses AS quantity
                FROM
                 stock_batch_warehouses 
                INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id              
                WHERE
                item_pack_sizes.item_category_id = 1 AND
                stock_batch_warehouses.warehouse_id = $wh_id
                GROUP BY
                        item_name";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Weighted Avg
     * @param $wh_id
     * @param $item_id
     */
    public function getWeightedAvg($wh_id, $item_id) {
        if (empty($wh_id)) {
            $wh_id = '159';
        }

        $str_qry = "SELECT
        ROUND(SUM(A.total) / SUM(A.Qty)) AS val
        FROM (SELECT
                stock_batch_warehouses.quantity * item_pack_sizes.number_of_doses AS Qty,
                TIMESTAMPDIFF(MONTH, stock_master.transaction_date, stock_batch.expiry_date)*
                (stock_batch_warehouses.quantity * item_pack_sizes.number_of_doses) AS total
        FROM
                stock_master
        INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
        INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
        INNER JOIN item_pack_sizes ON item_pack_sizes.pk_id = stakeholder_item_pack_sizes.item_pack_size_id
        WHERE
                item_pack_sizes.pk_id = $item_id and
                stock_batch_warehouses.warehouse_id = $wh_id
        GROUP BY
                stock_batch_warehouses.pk_id
         ) A";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shelf Life 6
     * @param $wh_id
     * @param $item_id
     * @param $time_period1
     */
    public function getShelfLife6($wh_id, $item_id, $time_period1) {

        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);


        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT

          A.item_pack_size_id,
          A.item_name,
          A.totalQty * A.number_of_doses as totalQuantity,
          A.Expire6Months * A.number_of_doses as 6months,
          A.Expire12Months  * A.number_of_doses as 12months,
          ROUND(((A.Expire6Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire6Months,
          ROUND(((A.Expire12Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire12Months,
                                        A.min6Month,
                                        A.max6Month,
                                        A.min12Month,
                                        A.max12Month
         FROM (SELECT
          stakeholder_item_pack_sizes.item_pack_size_id,
          item_pack_sizes.item_name,
          SUM(stock_batch_warehouses.quantity) AS totalQty,
                                        item_pack_sizes.number_of_doses,
                                        (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH)),
                                        MIN(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS min6Month,
                                        MAX(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS max6Month,
                                        MIN((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS min12Month,
                                        MAX((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS max12Month,
          SUM(IF (stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire6Months,
          SUM(IF (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire12Months
         FROM
        stock_batch_warehouses 
        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id       
         WHERE
         stakeholder_item_pack_sizes.item_pack_size_id IS NOT NULL
         AND stock_batch_warehouses.quantity > 0
         AND stakeholder_item_pack_sizes.item_pack_size_id = $item_id
         AND stock_batch_warehouses.warehouse_id = $wh_id
         ) A";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param string $wh_id
     * @param type $item_id
     * @param type $time_period1
     * @return typeGet Shelf Life Months 6
     * @param $wh_id
     * @param $item_id
     * @param $time_period1
     */
    public function getShelfLifeMonths6($wh_id, $item_id, $time_period1) {

        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);
        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT
                        sum(stock_batch_warehouses.quantity * item_pack_sizes.number_of_doses) AS Qty,
                        Max(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Max6months,
                        Min(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Min6months,
                        Min(DATE_FORMAT(stock_batch.expiry_date, '%Y-%m-%d')) as minExpiryDate
                FROM
                        stock_master
                INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
                INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
                INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
                INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
                
                WHERE

                item_pack_sizes.pk_id = $item_id and
                stock_batch_warehouses.warehouse_id = $wh_id
                    AND stock_batch.expiry_date > CURDATE()
                and TIMESTAMPDIFF(MONTH,  '$time_period', stock_batch.expiry_date) <= 6 ";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shelf Life 12
     * @param $wh_id
     * @param $item_id
     * @param $time_period1
     */
    public function getShelfLife12($wh_id, $item_id, $time_period1) {
        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);
        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT

          A.item_pack_size_id,
          A.item_name,
          A.totalQty * A.number_of_doses as totalQuantity,
          A.Expire6Months * A.number_of_doses as 6months,
          A.Expire12Months  * A.number_of_doses as 12months,
          ROUND(((A.Expire6Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire6Months,
          ROUND(((A.Expire12Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire12Months,
                                        A.min6Month,
                                        A.max6Month,
                                        A.min12Month,
                                        A.max12Month
         FROM (SELECT
          stakeholder_item_pack_sizes.item_pack_size_id,
          item_pack_sizes.item_name,
          SUM(stock_batch_warehouses.quantity) AS totalQty,
                                        item_pack_sizes.number_of_doses,
                                        (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH)),
                                        MIN(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS min6Month,
                                        MAX(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS max6Month,
                                        MIN((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS min12Month,
                                        MAX((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS max12Month,
          SUM(IF (stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire6Months,
          SUM(IF (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire12Months
          FROM
         stock_batch_warehouses 
        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id       
         WHERE
         stakeholder_item_pack_sizes.item_pack_size_id IS NOT NULL
         AND stock_batch_warehouses.quantity > 0
         AND stakeholder_item_pack_sizes.item_pack_size_id = $item_id
         AND stock_batch_warehouses.warehouse_id = $wh_id
         ) A";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shelf Life 24
     * @param string $wh_id
     * @param type $item_id
     * @param type $time_period1
     * @return type
     */
    public function getShelfLife24($wh_id, $item_id, $time_period1) {
        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);
        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT
          A.item_pack_size_id,
          A.item_name,
          A.totalQty * A.number_of_doses as totalQuantity,
          A.Expire6Months * A.number_of_doses as 6months,
          A.Expire12Months  * A.number_of_doses as 12months,
          A.Expire24Months  * A.number_of_doses as 24months,
          ROUND(((A.Expire6Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire6Months,
          ROUND(((A.Expire12Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire12Months,
          ROUND(((A.Expire24Months / A.totalQty) * 100), 1) * A.number_of_doses AS Expire24Months,
                                        A.min6Month,
                                        A.max6Month,
                                        A.min12Month,
                                        A.max12Month
         FROM (SELECT
          stakeholder_item_pack_sizes.item_pack_size_id,
          item_pack_sizes.item_name,
          SUM(stock_batch_warehouses.quantity) AS totalQty,
                                        item_pack_sizes.number_of_doses,
                                        (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH)),
                                        MIN(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS min6Month,
                                        MAX(stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH)) AS max6Month,
                                        MIN((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS min12Month,
                                        MAX((stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH))) AS max12Month,
                                        SUM(IF (stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 6 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire6Months,
                                        SUM(IF (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 6 MONTH) AND stock_batch.expiry_date <= ADDDATE('$time_period', INTERVAL 12 MONTH), stock_batch_warehouses.quantity, 0)) AS Expire12Months,
                                        SUM(IF (stock_batch.expiry_date > ADDDATE('$time_period', INTERVAL 12 MONTH) , stock_batch_warehouses.quantity, 0)) AS Expire24Months

         FROM
        stock_batch_warehouses
        INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id         
         WHERE
         stakeholder_item_pack_sizes.item_pack_size_id IS NOT NULL
         AND stock_batch_warehouses.quantity > 0
         AND stakeholder_item_pack_sizes.item_pack_size_id = $item_id
         AND stock_batch_warehouses.warehouse_id = $wh_id
         ) A";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $wh_id
     * @param type $item_id
     * @param type $time_period1
     * @return typeGet Shelf Life Months 12 
     * @param type $wh_id
     * @param type $item_id, 
     * @param type $time_period1
     */
    public function getShelfLifeMonths12($wh_id, $item_id, $time_period1) {


        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);
        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT
              sum(stock_batch_warehouses.quantity * item_pack_sizes.number_of_doses) AS Qty,
              Max(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Max12months,
              Min(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Min12months

                FROM
                    stock_master
            INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
            INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
            INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
            WHERE
                    item_pack_sizes.pk_id = $item_id and
            stock_batch_warehouses.warehouse_id = $wh_id
                AND stock_batch.expiry_date > CURDATE()
            and TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date) > 6
            and TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date) <= 12";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Shelf Life Months 24
     * @param type $wh_id
     * @param type $item_id
     * @param type $time_period1
     */
    public function getShelfLifeMonths24($wh_id, $item_id, $time_period1) {


        $time_period = App_Controller_Functions::dateToDbFormat($time_period1);
        if (empty($wh_id)) {
            $wh_id = '159';
        }
        $str_qry = "SELECT
              sum(stock_batch_warehouses.quantity * item_pack_sizes.number_of_doses) AS Qty,
              Max(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Max24months,
              Min(TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date)) as Min24months

                FROM
                    stock_master
            INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
            INNER JOIN stock_batch ON stock_batch.pk_id = stock_batch_warehouses.stock_batch_id
            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
            INNER JOIN item_pack_sizes ON item_pack_sizes.pk_id = stakeholder_item_pack_sizes.item_pack_size_id
            WHERE
                    item_pack_sizes.pk_id = $item_id and
            stock_batch_warehouses.warehouse_id = $wh_id
                AND stock_batch.expiry_date > CURDATE()
            and TIMESTAMPDIFF(MONTH, '$time_period', stock_batch.expiry_date) > 12
            ";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $wh_id
     * @param type $item_id
     * @param type $age_id
     * @param type $report_year
     * @param type $report_month
     * @param type $i
     * @return typeUC Wise Report 1
     * $wh_id
     * @param type $item_id
     * @param type $age_id
     * @param type $report_year
     * @param type $report_month
     * @param type $i
     */
    public function ucWiseReport1($wh_id, $item_id, $age_id, $report_year, $report_month, $i) {
        if (!empty($i)) {
            $where = "AND hf_data_detail.vaccine_schedule_id = $i";
        } else {

            $where = "";
        }

        $report_date1 = $report_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));


        $str_qry = "SELECT
        locations.location_name,
        locations.pk_id,
        (
                hf_data_detail.fixed_inside_uc_male + hf_data_detail.fixed_inside_uc_female
        ) inside_uc,
        (
                hf_data_detail.fixed_outside_uc_male + hf_data_detail.fixed_outside_uc_female
        ) outside_uc,
        (
                hf_data_detail.referal_male + hf_data_detail.referal_female
        ) referal_uc,
        (
                hf_data_detail.fixed_inside_uc_male + hf_data_detail.fixed_inside_uc_female + hf_data_detail.fixed_outside_uc_male + hf_data_detail.fixed_outside_uc_female + hf_data_detail.referal_male + hf_data_detail.referal_female
        ) AS total
            FROM
            warehouses
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
            INNER JOIN locations ON warehouses.location_id = locations.pk_id
            WHERE
            warehouses.location_id  = $wh_id
            AND hf_data_master.item_pack_size_id = $item_id
            AND hf_data_detail.age_group_id = $age_id
            AND DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) = '$report_date'
            Group BY locations.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0];
    }

    /**
     * UC Wise Report 11
     * @param type $wh_id
     * @param type $item_id
     * @param type $report_year
     * @param type $report_month
     */
    public function ucWiseReport11($wh_id, $item_id, $report_year, $report_month) {

        $report_date1 = $report_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));
        $str_qry = "SELECT
            hf_data_master.opening_balance,
            hf_data_master.received_balance,
            (  hf_data_master.opening_balance +
            hf_data_master.received_balance) total_doses,
            hf_data_master.issue_balance,
            hf_data_master.closing_balance,
            hf_data_master.wastages

           FROM
                warehouses
                INNER JOIN locations ON warehouses.location_id = locations.pk_id
                INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id

                WHERE
            warehouses.location_id = $wh_id
                    AND
                hf_data_master.item_pack_size_id = $item_id

                AND DATE_FORMAT(hf_data_master.reporting_start_date, '%Y-%m') = '" . $report_date . "'
                GROUP BY location_id";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0];
    }

    /**
     * UC Wise Report 2
     * @param type $wh_id
     * @param type $item_id
     * @param type $report_year
     * @param type $report_month
     */
    public function ucWiseReport2($wh_id, $item_id, $age_id, $report_year, $report_month, $i) {
        if (!empty($i)) {
            $where = "AND hf_data_detail.vaccine_schedule_id = $i";
        } else {

            $where = "";
        }

        $report_date1 = $report_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));


        $str_qry = "SELECT
        locations.location_name,
        locations.pk_id,
        SUM(
                hf_data_detail.fixed_inside_uc_male + hf_data_detail.fixed_inside_uc_female
        ) inside_uc,
        SUM(
                hf_data_detail.fixed_outside_uc_male + hf_data_detail.fixed_outside_uc_female
        ) outside_uc,
        SUM(
                hf_data_detail.referal_male + hf_data_detail.referal_female
        ) referal_uc,
        SUM(
                hf_data_detail.fixed_inside_uc_male + hf_data_detail.fixed_inside_uc_female + hf_data_detail.fixed_outside_uc_male + hf_data_detail.fixed_outside_uc_female + hf_data_detail.referal_male + hf_data_detail.referal_female
        ) AS total
            FROM
            warehouses
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
            INNER JOIN locations ON warehouses.location_id = locations.pk_id
            WHERE
            warehouses.location_id  = $wh_id
            AND hf_data_master.item_pack_size_id = $item_id

            AND DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) = '$report_date'
            Group BY locations.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0];
    }

    /**
     * UC Wise Report 3
     * @param type $wh_id
     * @param type $item_id
     * @param type $age_id
     * @param type $report_year
     * @param type $report_month
     * @param type $i
     * @return typeUC Wise Report 3
     * @param type $wh_id
     * @param type $item_id
     * @param type $age_id
     * @param type $report_year
     * @param type $report_month
     * @param type $i
     */
    public function ucWiseReport3($wh_id, $item_id, $age_id, $report_year, $report_month, $i) {
        if (!empty($i)) {
            $where = "AND hf_data_detail.vaccine_schedule_id = $i";
        } else {

            $where = "";
        }

        $report_date1 = $report_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));


        $str_qry = "SELECT
        locations.location_name,
        locations.pk_id,
        SUM(hf_data_detail.fixed_inside_uc_male) inside_uc_male,
        SUM(hf_data_detail.fixed_inside_uc_female) inside_uc_female,
        SUM(hf_data_detail.fixed_outside_uc_male) outside_uc_male,
        SUM(hf_data_detail.fixed_outside_uc_female) outside_uc_female,
        SUM(
         hf_data_detail.fixed_inside_uc_male + hf_data_detail.fixed_inside_uc_female + hf_data_detail.fixed_outside_uc_male + hf_data_detail.fixed_outside_uc_female
        ) AS total
            FROM
            warehouses
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
            INNER JOIN locations ON warehouses.location_id = locations.pk_id
            WHERE
            warehouses.location_id  = $wh_id
            AND hf_data_master.item_pack_size_id = $item_id

            AND DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) = '$report_date'
            Group BY locations.pk_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0];
    }

    /**
     * Received Date
     * @param type $stock_id
     * @return string
     */
    public function receivedDate($stock_id) {


        $str_qry1 = "SELECT
                        MAX(stock_master.transaction_date) AS transaction_date
                FROM
                        stock_master
                INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                WHERE

                stock_detail.adjustment_type = 1 AND
                stock_detail.is_received IN (SELECT
                        stock_detail.pk_id
                FROM
                        stock_master
                INNER JOIN stock_detail ON stock_master.pk_id = stock_detail.stock_master_id
                WHERE
                        stock_master.pk_id = $stock_id
                AND stock_detail.adjustment_type = 2)";

        $this->_em = Zend_Registry::get('doctrine');
        $row1 = $this->_em->getConnection()->prepare($str_qry1);
        $row1->execute();
        $result = $row1->fetchAll();

        if (count($result) > 0) {
            return date("d/m/y", strtotime($result[0]['transaction_date']));
        } else {
            return "";
        }
    }

    /**
     * 
     * @param type $wh_id
     * @return typeGet Warehouse Level
     * @param type $wh_id
     */
    public function getWarehouseLevel($wh_id) {

        $str_qry = "SELECT
                    warehouses.stakeholder_office_id,
                    warehouses.pk_id
                    FROM
                    warehouses
                    WHERE
                    warehouses.pk_id = $wh_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0]['stakeholder_office_id'];
    }

    /**
     * Vaccine Coverage
     *  @param type $district
     *  @param type $year
     */
    public function vaccineCoverage($district, $year) {



        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
        B.pk_id as itemId,
        B.item_name,
        A.district,
        ROUND(((
                        (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                )
        ) AS AnnualyTarget,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
      FROM
        (SELECT DISTINCT

                        locations.location_name AS district,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$year'
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 4
                AND locations.district_id = $district
        ) A,
        (
                SELECT
      item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                    FROM
                    item_pack_sizes
                    INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                    INNER JOIN stakeholder_item_pack_sizes ON item_pack_sizes.pk_id = stakeholder_item_pack_sizes.item_pack_size_id
                    WHERE
                    items.item_category_id = 1 AND
                    stakeholder_item_pack_sizes.stakeholder_id = 1
                       and item_pack_sizes.pk_id NOT IN  (28,31)
                       ORDER BY item_pack_sizes.item_name

        ) B";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Vaccine Coverage 1
     * @param type $sel_prov
     * @param type $district
     * @param type $date_in
     * @param type $sel_month
     * @param type $sel_year
     */
    public function vaccineCoverage1($sel_prov, $district, $date_in, $sel_month, $sel_year) {
        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
        A.itemId,
        A.item_name,
        A.MonthlyTarget,
        IFNULL(B.consumption, 0) AS reported,
        ROUND(
                (
                        IFNULL(B.consumption, 0) / A.MonthlyTarget
                ) * 100
        ) AS reportingPercentage
       FROM
        (
                SELECT
        B.pk_id as itemId,
        B.item_name,
        A.district,

        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
        FROM
        (SELECT DISTINCT

                        locations.location_name AS district,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$sel_year'
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 4
                AND locations.district_id = $district
        ) A,
        (
                SELECT
                item_pack_sizes.pk_id,
                item_pack_sizes.item_name,
                items.population_percent_increase_per_year,
                items.child_surviving_percent_per_year,
                items.doses_per_year
                FROM
                        item_activities               
                INNER JOIN item_pack_sizes ON item_activities.item_pack_size_id=item_pack_sizes.pk_id
                 INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                WHERE
                        items.item_category_id = 1
                AND item_activities.stakeholder_activity_id = 1
                ORDER BY
                        item_pack_sizes.list_rank

        ) B
        ) A
   LEFT JOIN (
   SELECT sum(hf_data_master.issue_balance) as consumption,
        hf_data_master.item_pack_size_id  as itemId
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id
         Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE   MONTH(hf_data_master.reporting_start_date) = '$sel_month' AND YEAR(hf_data_master.reporting_start_date) = '$sel_year'
         AND  warehouses.pk_id  =   hf_data_master.warehouse_id
         AND  warehouses.district_id = '$district'
         AND   stakeholders.geo_level_id = 6
         GROUP BY
         hf_data_master.item_pack_size_id
          ) B ON A.itemId = B.itemId";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $province
     * @param type $sel_item
     * @param type $year1
     * @return typeProvincial Target
     * @param type $province
     * @param type $sel_item
     * @param type $year1
     */
    public function provincialTarget($province, $sel_item, $year1) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
            A.province_id,
            A.province,
            ROUND(
            (
            (
            (
                (A.population / 100) * B.population_percent_increase_per_year
            ) / 100 * B.child_surviving_percent_per_year
            ) * B.doses_per_year
            )
            ) AS AnnualyTarget,
            ROUND(
            (
            (
            (
                (A.population / 100) * B.population_percent_increase_per_year
            ) / 100 * B.child_surviving_percent_per_year
            ) * B.doses_per_year
            ) / 12
            ) AS MonthlyTarget
            FROM
            (
            SELECT DISTINCT
            locations.location_name AS province,
            locations.pk_id as province_id,
            (
            SELECT
                IFNULL(
                        location_populations.population,
                        0
                )
            FROM
                location_populations
            WHERE
                location_populations.location_id = locations.pk_id
            AND DATE_FORMAT(
                location_populations.estimation_date,
                '%Y'
            ) = '$year1'
            GROUP BY
                locations.pk_id
            ) AS population
            FROM
            locations
            WHERE
            locations.geo_level_id = 2
            AND locations.pk_id != 10
            ) A,
            (
            SELECT
            item_pack_sizes.pk_id,
            item_pack_sizes.item_name,
            items.population_percent_increase_per_year,
            items.child_surviving_percent_per_year,
            items.doses_per_year
            FROM
            item_pack_sizes
            INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
            WHERE
            item_pack_sizes.pk_id = '$sel_item'
            ) B";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * District Target
     * $province
     * @param type $sel_item
     * @param type $year1
     */
    public function districtTarget($province, $sel_item, $year1) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
            A.district_id,
            A.district,
            ROUND(
            (
            (
            (
            (A.population / 100) * B.population_percent_increase_per_year
            ) / 100 * B.child_surviving_percent_per_year
            ) * B.doses_per_year
            )
            ) AS AnnualyTarget,
            ROUND(
            (
            (
            (
            (A.population / 100) * B.population_percent_increase_per_year
            ) / 100 * B.child_surviving_percent_per_year
            ) * B.doses_per_year
            ) / 12
            ) AS MonthlyTarget
            FROM
            (
            SELECT DISTINCT
            locations.location_name AS district,
            locations.district_id,
            (
            SELECT
            IFNULL(
                location_populations.population,
                0
            )
            FROM
            location_populations
            WHERE
            location_populations.location_id = locations.pk_id
            AND DATE_FORMAT(
            location_populations.estimation_date,
            '%Y'
            ) = '$year1'
            GROUP BY locations.pk_id
            ) AS population
            FROM
            pilot_districts
            INNER JOIN locations ON pilot_districts.district_id = locations.district_id

            WHERE
            locations.geo_level_id = 4
            AND locations.province_id = '$province'
            ) A,
            (
            SELECT
            item_pack_sizes.pk_id,
            item_pack_sizes.item_name,
            items.population_percent_increase_per_year,
            items.child_surviving_percent_per_year,
            items.doses_per_year
            FROM
            item_pack_sizes
            INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
            WHERE
            item_pack_sizes.pk_id = '$sel_item'
            ) B";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Tehsil Target
     * @param type $province
     * @param type $sel_item
     * @param type $year1
     * @return typeTehsil Target
     * 
     */
    public function tehsilTarget($province, $sel_item, $year1) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
        A.tehsil_id,
        A.tehsil,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                )
        ) AS AnnualyTarget,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
    FROM
        (
                SELECT DISTINCT
                        locations.location_name AS tehsil,
                        locations.pk_id as tehsil_id,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$year1'
                                GROUP BY
                                        locations.pk_id
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 5
                AND locations.district_id = $province
        ) A,
        (
                SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                WHERE
                        item_pack_sizes.pk_id = $sel_item
        ) B";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * UC Target
     * @param type $province
     * @param type $sel_item
     * @param type $year1
     * @return typeUC Target
     * 
     */
    public function ucTarget($province, $sel_item, $year1) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
        A.uc_id,
        A.uc,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                )
        ) AS AnnualyTarget,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
    FROM
        (
                SELECT DISTINCT
                        locations.location_name AS uc,
                        locations.pk_id AS uc_id,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$year1'
                                GROUP BY
                                        locations.pk_id
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 6
                AND locations.parent_id = $province
        ) A,
        (
                SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                WHERE
                        item_pack_sizes.pk_id = $sel_item
        ) B";

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * 
     * @param type $wh_type
     * @param type $province
     * @param type $sel_item
     * @param type $year1
     * @param type $sel_dist
     * @return typeProvincial Vaccine Coverage
     */
    public function provincialVaccineCoverage($wh_type, $province, $sel_item, $year1, $sel_dist) {

        $this->_em = Zend_Registry::get('doctrine');
        if ($wh_type == 2) {
            $querypro = "SELECT
        A.district_id,
        A.district,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                )
        ) AS AnnualyTarget,
        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
    FROM
        (
                SELECT DISTINCT
                        locations.location_name AS district,
       locations.district_id,
                        (
                                SELECT
                                IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$year1'
                                GROUP BY locations.pk_id
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id

                WHERE
                        locations.geo_level_id = 4
                AND locations.province_id = '$province'
        ) A,
        (
                SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                WHERE
                        item_pack_sizes.pk_id = '$sel_item'
        ) B";
        } else {
            $querypro = "SELECT
        A.district_id,
        A.district,
                ROUND(
                IFNULL((
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) 
                ),0)
        ) AS AnnualyTarget,
        ROUND(
        IFNULL((
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) 
                ) / 12 ,0)
        ) AS MonthlyTarget
       FROM
        (
                SELECT DISTINCT
                        locations.location_name AS district,
                        locations.pk_id as district_id,
                        (
                                SELECT
                                IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$year1'
                                GROUP BY locations.pk_id
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id

                WHERE
                        locations.geo_level_id = 5
                AND locations.province_id = '$province'
                AND locations.district_id = '$sel_dist'
        ) A,
        (
                SELECT
                        item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                WHERE
                        item_pack_sizes.pk_id = '$sel_item'
        ) B";
        }

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Provincial Vaccine Coverage 1
     * @param type $wh_type
     * @param type $sel_prov
     * @param type $date_in
     * @param type $sel_month
     * @param type $sel_year
     * @param type $sel_item
     * @param type $sel_dist
     * @return type
     * 
     */
    public function provincialVaccineCoverage1($wh_type, $sel_prov, $date_in, $sel_month, $sel_year, $sel_item, $sel_dist) {



        $this->_em = Zend_Registry::get('doctrine');
        if ($wh_type == 2) {
            $querypro = "SELECT
        A.district_id,
        A.district,
        A.MonthlyTarget,

        IFNULL(B.consumption, 0) AS reported,
        ROUND(IFNULL(
                (
                        IFNULL(B.consumption, 0) / A.MonthlyTarget
                ) * 100,0)
        ) AS reportingPercentage
       FROM
        (
                SELECT
        A.district_id,

        A.district,

        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
      FROM
        (SELECT DISTINCT
                        locations.district_id,
                        locations.location_name AS district,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$sel_year'
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 4
                AND locations.province_id = $sel_prov
        ) A,
        (
                SELECT
                       item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                where item_pack_sizes.pk_id = $sel_item

        ) B
        ) A
    LEFT JOIN (

    SELECT sum(hf_data_master.issue_balance) as consumption,
        warehouses.district_id  as district_id
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id
                                 Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
         WHERE
         hf_data_master.item_pack_size_id = '$sel_item' AND
            MONTH(hf_data_master.reporting_start_date) = '$sel_month' AND YEAR(hf_data_master.reporting_start_date) = '$sel_year'
                                 AND  warehouses.pk_id  =   hf_data_master.warehouse_id
                                 AND  warehouses.province_id = '$sel_prov'
         AND   stakeholders.geo_level_id = 6
         GROUP BY warehouses.district_id
    ) B ON A.district_id = B.district_id";
        } else {
            $querypro = "SELECT
        A.district_id,
        A.district,

        IFNULL(A.MonthlyTarget,0) as MonthlyTarget,
        IFNULL(B.consumption, 0) AS reported,
        ROUND(IFNULL(
                (
                        IFNULL(B.consumption, 0) / A.MonthlyTarget
                ) * 100,0)
        ) AS reportingPercentage
       FROM
        (
                SELECT
        A.district_id,

        A.district,

        ROUND(
                (
                        (
                                (
                                        (A.population / 100) * B.population_percent_increase_per_year
                                ) / 100 * B.child_surviving_percent_per_year
                        ) * B.doses_per_year
                ) / 12
        ) AS MonthlyTarget
      FROM
        (SELECT DISTINCT
                        locations.pk_id as district_id,
                        locations.location_name AS district,
                        (
                                SELECT
                                        IFNULL(
                                                location_populations.population,
                                                0
                                        )
                                FROM
                                        location_populations
                                WHERE
                                        location_populations.location_id = locations.pk_id
                                AND DATE_FORMAT(
                                        location_populations.estimation_date,
                                        '%Y'
                                ) = '$sel_year'
                        ) AS population
                FROM
                        pilot_districts
                INNER JOIN locations ON pilot_districts.district_id = locations.district_id
                WHERE
                        locations.geo_level_id = 5
                AND locations.province_id = $sel_prov
                AND locations.district_id = $sel_dist    
        ) A,
        (
                SELECT
                       item_pack_sizes.pk_id,
                        item_pack_sizes.item_name,
                        items.population_percent_increase_per_year,
                        items.child_surviving_percent_per_year,
                        items.doses_per_year
                FROM
                        item_pack_sizes
                INNER JOIN items ON item_pack_sizes.item_id = items.pk_id
                where item_pack_sizes.pk_id = $sel_item

        ) B
        ) A
    LEFT JOIN (

    SELECT sum(hf_data_master.issue_balance) as consumption,
        teh.pk_id  as district_id
        FROM warehouses
         Inner Join  hf_data_master  ON  warehouses.pk_id  =   hf_data_master.warehouse_id
         Inner Join  stakeholders  ON  warehouses.stakeholder_office_id =   stakeholders.pk_id
           Inner Join  locations as uc ON warehouses.location_id = uc.pk_id
        Inner Join locations as teh ON uc.parent_id = teh.pk_id
         WHERE
         hf_data_master.item_pack_size_id = '$sel_item' AND
         MONTH(hf_data_master.reporting_start_date) = '$sel_month' AND YEAR(hf_data_master.reporting_start_date) = '$sel_year'
         AND  warehouses.pk_id  =   hf_data_master.warehouse_id
         AND  warehouses.province_id = '$sel_prov'
         AND  warehouses.district_id = '$sel_dist'       
         AND   stakeholders.geo_level_id = 6
         GROUP BY teh.pk_id
    ) B ON A.district_id = B.district_id";
        }

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Vaccine Status Wastage
     * @param type $wh_type
     * @param type $sel_dist
     * @param type $sel_tehsil
     * @param type $year
     * @param type $month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $item
     * @return type
     */
    public function vaccineStatusWastage($wh_type, $sel_dist, $sel_tehsil, $year, $month, $from_sel_month, $from_sel_year, $item) {

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));

        $report_date1 = $from_sel_year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));

        $this->_em = Zend_Registry::get('doctrine');
        if ($wh_type == 4) {
            $querypro = "SELECT
                locations.pk_id,
                locations.location_name,
                dis.location_name as dis,
                teh.location_name AS teh,
                hf_data_master.opening_balance,
                hf_data_master.received_balance,
                hf_data_master.issue_balance,
                hf_data_master.closing_balance,
                hf_data_master.wastages,
                 ROUND(IFNULL(
                                            (
                                                    sum(hf_data_master.wastages) / ( 
                                                            sum(hf_data_master.issue_balance) + sum(hf_data_master.wastages)
                                                    )
                                            ) * 100,
                                            0
                                    ), 1) AS wastagePer
                FROM
                hf_data_master
                INNER JOIN warehouses ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN locations ON locations.pk_id = warehouses.location_id
                INNER JOIN locations teh ON locations.parent_id = teh.pk_id
                INNER JOIN locations dis ON warehouses.district_id = dis.pk_id
                WHERE
                locations.district_id = '$sel_dist' AND
                    locations.geo_level_id =6 AND
                DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) BETWEEN '$from_report_date' AND '$report_date'
                AND hf_data_master.issue_balance IS NOT NULL
                                    AND hf_data_master.issue_balance != 0
                AND hf_data_master.item_pack_size_id = '$item'
                    GROUP BY locations.pk_id
                 ORDER BY teh,location_name";
        } else {
            $querypro = "SELECT
                locations.pk_id,
                locations.location_name,
                uc.location_name as teh,
                hf_data_master.opening_balance,
                hf_data_master.received_balance,
                hf_data_master.issue_balance,
                hf_data_master.closing_balance,
                hf_data_master.wastages,
                 ROUND(IFNULL(
                                            (
                                                    sum(hf_data_master.wastages) / (
                                                            sum(hf_data_master.issue_balance) + sum(hf_data_master.wastages)
                                                    )
                                            ) * 100,
                                            0
                                    ), 1) AS wastagePer
                FROM
                hf_data_master
                INNER JOIN warehouses ON warehouses.pk_id = hf_data_master.warehouse_id
                INNER JOIN locations ON locations.pk_id = warehouses.location_id
                INNER JOIN locations uc ON locations.parent_id = uc.pk_id               
                 WHERE
                uc.pk_id = '$sel_tehsil' AND
                locations.geo_level_id =6 AND
                 DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) BETWEEN '$from_report_date' AND '$report_date'
                AND hf_data_master.issue_balance IS NOT NULL
                                    AND hf_data_master.issue_balance != 0
                AND hf_data_master.item_pack_size_id = '$item'
                    GROUP BY locations.pk_id
              ORDER BY teh,location_name";
        }

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Vaccine Dropout Rate
     * @param type $wh_type
     * @param type $sel_dist
     * @param type $sel_tehsil
     * @param type $year
     * @param type $month
     * @param type $item
     * @param type $from_month
     * @param type $from_year
     * @param type $item_pack_size_id
     * @param type $dose_no
     * @return type
     */
    public function vaccineDropoutRate($wh_type, $sel_dist, $sel_tehsil, $year, $month, $item, $from_month, $from_year, $item_pack_size_id, $dose_no) {

        $from_report_date = $from_year . "-" . $from_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));

        $report_date1 = $from_year . "-" . $month;
        $report_date = date('Y-m', strtotime($report_date1));
        if ($item_pack_size_id == 6) {
            $qry_where = "";
            $qry_where1 = "";
            $qry_where2 = "";
            $qry_where3 = "";
        } else if ($item_pack_size_id == 9) {
            $qry_where = "AND hf_data_detail.vaccine_schedule_id = '$dose_no'";
            $qry_where1 = "AND log_book_item_doses.doses = '$dose_no'";
            $qry_where2 = "";
            $qry_where3 = "";
        } else {
            $qry_where = "AND hf_data_detail.vaccine_schedule_id = '$dose_no'";
            $qry_where1 = "AND log_book_item_doses.doses = '$dose_no'";
            $qry_where2 = "AND hf_data_detail.age_group_id = '" . Model_ListDetail::AGE_0_11 . "' ";
            $qry_where3 = "AND log_book.age < '12'";
        }

        $this->_em = Zend_Registry::get('doctrine');
        if ($wh_type == 4) {

            $querypro = "SELECT
        A.pk_id,
        A.dis,
        A.teh,
        A.uc,

        IFNULL(SUM(A.pen_1 + IFNULL(B.female_doses, 0) + IFNULL(B.male_doses, 0)),0) AS doses
       FROM
        (
                SELECT
                        uc.pk_id,
                        teh.location_name AS teh,
                        uc.location_name AS uc,
                        dis.location_name AS dis,
                        Sum(
                                IFNULL(
                                        hf_data_detail.fixed_inside_uc_male,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.fixed_inside_uc_female,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.outreach_male,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.outreach_female,
                                        0
                                )
                        ) AS pen_1,
                        hf_data_detail.vaccine_schedule_id,
                        hf_data_detail.age_group_id,
                        hf_data_master.item_pack_size_id
                FROM
                        hf_data_detail
                INNER JOIN hf_data_master ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                INNER JOIN locations AS uc ON warehouses.location_id = uc.pk_id
                INNER JOIN locations AS teh ON uc.parent_id = teh.pk_id
                INNER JOIN locations AS dis ON teh.district_id = dis.pk_id
                WHERE
                        DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
                AND teh.district_id = '$sel_dist'
                AND hf_data_master.item_pack_size_id = $item_pack_size_id
                $qry_where2
                $qry_where
                GROUP BY
                        uc.pk_id
                ORDER BY
                        teh.location_name,
                        uc.location_name
        ) A
       LEFT JOIN (
        SELECT
                Uc.pk_id,
                SUM(

                        IF (
                                log_book.gender = 'male' || log_book.gender IS NULL,
                                (log_book_item_doses.doses),
                                0
                        )
                ) AS male_doses,
                SUM(

                        IF (
                                log_book.gender = 'female',
                                (log_book_item_doses.doses),
                                0
                        )
                ) AS female_doses
        FROM
                log_book
        LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
        INNER JOIN locations AS District ON log_book.district_id = District.pk_id
        INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
        INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
        INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
        INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
        INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
        WHERE
                log_book_item_doses.item_pack_size_id = '$item_pack_size_id'
        AND log_book.district_id = '$sel_dist'
        $qry_where3
            $qry_where1

        AND DATE_FORMAT(
                log_book.vaccination_date,
                '%Y-%m'
        ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY
                Uc.pk_id

        ) B ON A.pk_id = B.pk_id
        GROUP BY
                A.pk_id
        ORDER BY
        A.teh,
        A.uc
        ";
        } else {

            $querypro = "SELECT
        A.pk_id,
        A.dis,
        A.teh,
        A.uc,

        IFNULL(SUM(A.pen_1 + IFNULL(B.female_doses, 0) + IFNULL(B.male_doses, 0)),0) AS doses
        FROM
        (
                SELECT
                        uc.pk_id,
                        teh.location_name AS teh,
                        uc.location_name AS uc,
                        dis.location_name AS dis,
                        Sum(
                                IFNULL(
                                        hf_data_detail.fixed_inside_uc_male,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.fixed_inside_uc_female,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.outreach_male,
                                        0
                                ) + IFNULL(
                                        hf_data_detail.outreach_female,
                                        0
                                )
                        ) AS pen_1,
                        hf_data_detail.vaccine_schedule_id,
                        hf_data_detail.age_group_id,
                        hf_data_master.item_pack_size_id
                FROM
                        hf_data_detail
                INNER JOIN hf_data_master ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                INNER JOIN warehouses ON hf_data_master.warehouse_id = warehouses.pk_id
                INNER JOIN locations AS uc ON warehouses.location_id = uc.pk_id
                INNER JOIN locations AS teh ON uc.parent_id = teh.pk_id
                INNER JOIN locations AS dis ON teh.district_id = dis.pk_id
                WHERE
                        DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
                 AND uc.parent_id  = '$sel_tehsil'
                AND hf_data_master.item_pack_size_id = $item_pack_size_id
                $qry_where2
                $qry_where
                GROUP BY
                        uc.pk_id
                ORDER BY
                        teh.location_name,
                        uc.location_name
        ) A
        LEFT JOIN (
                SELECT
                        Uc.pk_id,
                        SUM(

                                IF (
                                        log_book.gender = 'male' || log_book.gender IS NULL,
                                        (log_book_item_doses.doses),
                                        0
                                )
                        ) AS male_doses,
                        SUM(

                        IF (
                                log_book.gender = 'female',
                                (log_book_item_doses.doses),
                                0
                        )
                ) AS female_doses
        FROM
                log_book
        LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
        INNER JOIN locations AS District ON log_book.district_id = District.pk_id
        INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
        INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
        INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
        INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
        INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
        WHERE
                log_book_item_doses.item_pack_size_id = '$item_pack_size_id'
        AND Tehsil.pk_id = '$sel_tehsil'
            $qry_where3
            $qry_where1
        AND log_book.age < '12'
        AND DATE_FORMAT(
                log_book.vaccination_date,
                '%Y-%m'
        ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY
                Uc.pk_id
        ) B ON A.pk_id = B.pk_id
        GROUP BY
                A.pk_id
        ORDER BY
        A.teh,
        A.uc
        ";
        }

        $row = $this->_em->getConnection()->prepare($querypro);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Item Name
     * @param type $item_id
     */
    public function getItemName($item_id) {
        $str_qry = "SELECT
                    item_pack_sizes.item_name

                    FROM
                    item_pack_sizes
                    WHERE
                    item_pack_sizes.pk_id = $item_id";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        $row = $row->fetchAll();
        return $row[0]['item_name'];
    }

    /**
     * BCG Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @return type
     */
    public function bcgCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);

        $str_qry = "SELECT 
            B.pk_id as location_id,
            B.district as district,
            B.tehsil as tehsil,
            B.ucs as ucs,
            B.target AS target,
            IFNULL(A.male_doses,0) as male_doses,
            IFNULL(A.female_doses,0) as female_doses,
            Round(((B.target*92.3)/100)) as lbt,
            IFNULL(A.fixed_inside_uc_male,0) as fixed_inside_uc_male,
            IFNULL(A.fixed_inside_uc_female,0) as fixed_inside_uc_female,
            IFNULL(A.outreach_male,0) as outreach_male,
            IFNULL(A.outreach_female,0) as outreach_female,

            IFNULL(A.total,0) as consumption,
            IFNULL(ROUND(
                            (
                                    IFNULL(A.total, 0) /((B.target*92.3)/100)
                            ) * 100
                    ),0) AS consumptionPercentage
             from ((


        SELECT 
        A.pk_id,
        A.fixed_inside_uc_male,
        A.fixed_inside_uc_female,
        A.outreach_male,
        A.outreach_female,

        (IFNULL(A.total,0) + IFNULL(B.male_doses,0) + IFNULL(B.female_doses,0)) as total,
        B.male_doses,
        B.female_doses
        FROM
        (
        SELECT

                            locations.pk_id,
                            sum(hf_data_detail.fixed_inside_uc_male) as fixed_inside_uc_male,
                            sum(hf_data_detail.fixed_inside_uc_female) as fixed_inside_uc_female,
                            sum(hf_data_detail.outreach_male) as outreach_male,
                            sum(hf_data_detail.outreach_female) as outreach_female,

                     (IFNULL(sum(hf_data_detail.fixed_inside_uc_male), 0) + IFNULL(sum(hf_data_detail.fixed_inside_uc_female), 0) + IFNULL(sum(hf_data_detail.outreach_male), 0) + IFNULL(sum(hf_data_detail.outreach_female), 0)
                        ) AS total
                    FROM
                            warehouses
                    INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                    INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                    INNER JOIN locations ON warehouses.location_id = locations.pk_id
                    WHERE
                    hf_data_master.item_pack_size_id = 6 AND
                     DATE_FORMAT(
                            hf_data_master.reporting_start_date,
                            '%Y-%m'
                    ) BETWEEN '$from_report_date' AND '$report_date'
                    GROUP BY
                            locations.pk_id) A
        LEFT JOIN (
        SELECT
          Uc.pk_id,

         SUM( IF(log_book.gender = 'male' || log_book.gender IS NULL, (log_book_item_doses.doses),0)) AS male_doses,
          SUM( IF(log_book.gender = 'female',(log_book_item_doses.doses),0)) AS female_doses
        FROM
                log_book

        LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
        INNER JOIN locations AS District ON log_book.district_id = District.pk_id
        INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
        INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
        INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
        INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
        INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
        WHERE
        log_book_item_doses.item_pack_size_id = 6
        AND log_book.district_id =  '$district'

        AND DATE_FORMAT(
                                        log_book.vaccination_date,
                                        '%Y-%m'
                                ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY
                        Uc.pk_id


        ) B ON A.pk_id = B.pk_id                    
        ) A
            RIGHT JOIN (
            SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.5
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id

            ) B ON A.pk_id = B.pk_id )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * TT Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $vac_id
     * @return type
     */
    public function ttCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $vac_id) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);

        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        Round(((B.target))) AS lbt,
        IFNULL(A.pregnant_women, 0) AS pregnant_women,
        IFNULL(A.non_pregnant_women, 0) AS non_pregnant_women,
        IFNULL(A.pregnant_women, 0) + IFNULL(A.non_pregnant_women,0)  as consumption,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(A.pregnant_women, 0) ) / ((B.target))
                ) * 100
        ),0) AS consumptionPercentage
       FROM
        (
                (
                        SELECT
                                locations.pk_id,
                                hf_data_detail.pregnant_women,
                                hf_data_detail.non_pregnant_women
                        FROM
                                warehouses
                        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        WHERE
                                hf_data_master.item_pack_size_id = 12
                        AND hf_data_detail.vaccine_schedule_id = '$vac_id'
                        AND DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
                        GROUP BY
                                location_id
                ) A
                RIGHT JOIN (
                        SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.57
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Penta Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $age_group_id
     * @param type $vac_Id
     * @param type $age1
     * @param type $age2
     * @return type
     */
    public function pentaCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $age_group_id, $vac_Id, $age1, $age2) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);

        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        B.target2 AS target2,
        Round(((B.target * 92.3) / 100)) AS lbt,

        IFNULL(A.male_doses,0) as male_doses,
        IFNULL(A.female_doses,0) as female_doses,
        IFNULL(
                A.fixed_inside_uc_male_1_0_11,
                0
        ) AS fixed_inside_uc_male_1_0_11,
        IFNULL(
                A.fixed_inside_uc_female_1_0_11,
                0
        ) AS fixed_inside_uc_female_1_0_11,
        IFNULL(A.outreach_male_1_0_11, 0) AS outreach_male_1_0_11,
        IFNULL(A.outreach_female_1_0_11, 0) AS outreach_female_1_0_11,
        IFNULL(A.referal_male_1_0_11, 0) AS referal_male_1_0_11,
        IFNULL(A.referal_female_1_0_11, 0) AS referal_female_1_0_11,
        (
                IFNULL(
                        A.fixed_inside_uc_male_1_0_11,
                        0
                ) + IFNULL(
                        A.fixed_inside_uc_female_1_0_11,
                        0
                ) + IFNULL(A.outreach_male_1_0_11, 0) + IFNULL(A.outreach_female_1_0_11, 0) + IFNULL(A.male_doses,0) + IFNULL(A.female_doses,0)
        ) AS consumption_1_0_11,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(
                                        A.fixed_inside_uc_male_1_0_11,
                                        0
                                ) + IFNULL(
                                        A.fixed_inside_uc_female_1_0_11,
                                        0
                                ) + IFNULL(A.outreach_male_1_0_11, 0) + IFNULL(A.outreach_female_1_0_11, 0) + IFNULL(A.male_doses,0) + IFNULL(A.female_doses,0)
                        ) / ((B.target * 92.3) / 100)
                ) * 100
        ),0) AS consumptionPercentage_1_0_11,

        IFNULL(ROUND(
                (
                        (
                                IFNULL(
                                        A.fixed_inside_uc_male_1_0_11,
                                        0
                                ) + IFNULL(
                                        A.fixed_inside_uc_female_1_0_11,
                                        0
                                ) + IFNULL(A.outreach_male_1_0_11, 0) + IFNULL(A.outreach_female_1_0_11, 0) + IFNULL(A.male_doses,0) + IFNULL(A.female_doses,0)
                        ) / ((B.target))
                ) * 100
        ),0) AS consumptionPercentage_2
    FROM
        (
                (
                            SELECT 
                            A.pk_id,
                            A.fixed_inside_uc_male_1_0_11,
                            A.fixed_inside_uc_female_1_0_11,
                            A.outreach_male_1_0_11,
                            A.outreach_female_1_0_11,
                            A.referal_male_1_0_11,
                            A.referal_female_1_0_11,
                            B.male_doses,
                            B.female_doses
                            FROM
                            (SELECT
                                locations.pk_id,
                                sum(
                                        hf_data_detail.fixed_inside_uc_male
                                ) AS fixed_inside_uc_male_1_0_11,
                                sum(
                                        hf_data_detail.fixed_inside_uc_female
                                ) AS fixed_inside_uc_female_1_0_11,
                                sum(
                                        hf_data_detail.outreach_male
                                ) AS outreach_male_1_0_11,
                                sum(
                                        hf_data_detail.outreach_female
                                ) AS outreach_female_1_0_11,
                                sum(
                                        hf_data_detail.referal_male
                                ) AS referal_male_1_0_11,
                                sum(
                                        hf_data_detail.referal_female
                                ) AS referal_female_1_0_11
                        FROM
                                warehouses
                        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        WHERE
                                hf_data_master.item_pack_size_id = 7
                        AND hf_data_detail.age_group_id = '$age_group_id'
                        AND hf_data_detail.vaccine_schedule_id = '$vac_Id'
                        AND DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
                        GROUP BY
                                location_id) A 
    LEFT JOIN (
    SELECT
    Uc.pk_id,

    SUM( IF(log_book.gender = 'male' || log_book.gender IS NULL, (log_book_item_doses.doses),0)) AS male_doses,
    SUM( IF(log_book.gender = 'female',(log_book_item_doses.doses),0)) AS female_doses
    FROM
        log_book

    LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
    INNER JOIN locations AS District ON log_book.district_id = District.pk_id
    INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
    INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
    INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
    INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
    INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
    WHERE
    log_book_item_doses.item_pack_size_id = 7
    AND log_book.district_id =  '$district'
    AND log_book_item_doses.doses = '$vac_Id' 
    AND log_book.age Between  '$age1' and '$age2'    
    AND DATE_FORMAT(
                                log_book.vaccination_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
    GROUP BY
                Uc.pk_id


    ) B ON A.pk_id = B.pk_id
                ) A
                RIGHT JOIN (
                        SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target,
                                IFNULL(B.target2,0) AS target2
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.5
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.265
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target2,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Measles Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $age_group
     * @param type $vac_id
     * @return type
     */
    public function measlesCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $age_group, $vac_id) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);
        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        B.measles_target AS measles_target,
        IFNULL(A.male_doses,0) as male_doses,
        IFNULL(A.female_doses,0) as female_doses,
        Round(((B.target * 92.3) / 100)) AS lbt,
        IFNULL(A.fixed_inside_uc_male_1, 0) AS fixed_inside_uc_male_1,
        IFNULL(
                A.fixed_inside_uc_female_1,
                0
        ) AS fixed_inside_uc_female_1,
        IFNULL(A.outreach_male_1, 0) AS outreach_male_1,
        IFNULL(A.outreach_female_1, 0) AS outreach_female_1,
        IFNULL(A.referal_male_1, 0) AS referal_male_1,
        IFNULL(A.referal_female_1, 0) AS referal_female_1,
        (
                IFNULL(A.fixed_inside_uc_male_1, 0) + IFNULL(
                        A.fixed_inside_uc_female_1,
                        0
                ) + IFNULL(A.outreach_male_1, 0) + IFNULL(A.outreach_female_1, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
        ) AS consumption_1,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(A.fixed_inside_uc_male_1, 0) + IFNULL(
                                        A.fixed_inside_uc_female_1,
                                        0
                                ) + IFNULL(A.outreach_male_1, 0) + IFNULL(A.outreach_female_1, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
                        ) / ((B.target * 92.3) / 100)
                ) * 100
        ),0) AS consumptionPercentage_1,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(A.fixed_inside_uc_male_1, 0) + IFNULL(
                                        A.fixed_inside_uc_female_1,
                                        0
                                ) + IFNULL(A.outreach_male_1, 0) + IFNULL(A.outreach_female_1, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
                        ) / (B.measles_target)
                ) * 100
        ),0) AS consumptionPercentage_2
       FROM
        (
                (
                        SELECT 
    A.pk_id,
    A.fixed_inside_uc_male_1,
    A.fixed_inside_uc_female_1,
    A.outreach_male_1,
    A.outreach_female_1,
    A.referal_male_1,
    A.referal_female_1,
    B.male_doses,
    B.female_doses
    FROM
    (SELECT
                                locations.pk_id,

        SUM(hf_data_detail.fixed_inside_uc_male) AS fixed_inside_uc_male_1,
        SUM( hf_data_detail.fixed_inside_uc_female) AS fixed_inside_uc_female_1,
        SUM(hf_data_detail.outreach_male) AS outreach_male_1,
        SUM( hf_data_detail.outreach_female) AS outreach_female_1,
        SUM( hf_data_detail.referal_male) AS referal_male_1,
        SUM(hf_data_detail.referal_female) AS referal_female_1

        FROM
        warehouses
        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
        INNER JOIN locations ON warehouses.location_id = locations.pk_id
        WHERE
        hf_data_master.item_pack_size_id = 9
        AND hf_data_detail.vaccine_schedule_id = '$vac_id'

        AND DATE_FORMAT(
        hf_data_master.reporting_start_date,
        '%Y-%m'
         ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY
        locations.pk_id) A 
    LEFT JOIN (
    SELECT
    Uc.pk_id,

    SUM( IF(log_book.gender = 'male' || log_book.gender IS NULL, (log_book_item_doses.doses),0)) AS male_doses,
    SUM( IF(log_book.gender = 'female',(log_book_item_doses.doses),0)) AS female_doses
    FROM
        log_book

    LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
    INNER JOIN locations AS District ON log_book.district_id = District.pk_id
    INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
    INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
    INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
    INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
    INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
    WHERE
    log_book_item_doses.item_pack_size_id = 9
    AND log_book.district_id =  '$district'
    AND log_book_item_doses.doses = '$vac_id' 

    AND DATE_FORMAT(
                                log_book.vaccination_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
    GROUP BY
                Uc.pk_id


    ) B ON A.pk_id = B.pk_id
                ) A
                RIGHT JOIN (
                        SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target,
                                IFNULL(B.measles_target, 0) AS measles_target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.5
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.265
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS measles_target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * PCV Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $vac_id
     * @param type $age1
     * @param type $age2
     * @return type
     */
    public function pcvCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $vac_id, $age1, $age2) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);

        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        Round(((B.target * 92.3) / 100)) AS lbt,
        IFNULL(A.male_doses,0) as male_doses,
        IFNULL(A.female_doses,0) as female_doses,
        IFNULL(A.fixed_inside_uc_male_1, 0) AS fixed_inside_uc_male_1,
        IFNULL(
                A.fixed_inside_uc_female_1,
                0
        ) AS fixed_inside_uc_female_1,
        IFNULL(A.outreach_male_1, 0) AS outreach_male_1,
        IFNULL(A.outreach_female_1, 0) AS outreach_female_1,
        IFNULL(A.male_doses, 0) AS male_doses,
        IFNULL(A.female_doses, 0) AS female_doses,
        (
                IFNULL(A.fixed_inside_uc_male_1, 0) + IFNULL(
                        A.fixed_inside_uc_female_1,
                        0
                ) + IFNULL(A.outreach_male_1, 0) + IFNULL(A.outreach_female_1, 0) + IFNULL(A.referal_male_1, 0) + IFNULL(A.referal_female_1, 0)
        ) AS consumption_1,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(A.fixed_inside_uc_male_1, 0) + IFNULL(
                                        A.fixed_inside_uc_female_1,
                                        0
                                ) + IFNULL(A.outreach_male_1, 0) + IFNULL(A.outreach_female_1, 0) + IFNULL(A.referal_male_1, 0) + IFNULL(A.referal_female_1, 0)
                        ) / ((B.target * 92.3) / 100)
                ) * 100
        ),0) AS consumptionPercentage_1
        FROM
        (
                (
                        SELECT 
    A.pk_id,
    A.fixed_inside_uc_male_1,
    A.fixed_inside_uc_female_1,
    A.outreach_male_1,
    A.outreach_female_1,
    A.referal_male_1,
    A.referal_female_1,
    B.male_doses,
    B.female_doses
    FROM
    (SELECT
                                locations.pk_id,

         sum(hf_data_detail.fixed_inside_uc_male) AS fixed_inside_uc_male_1,
         sum(hf_data_detail.fixed_inside_uc_female) AS fixed_inside_uc_female_1,
         sum(hf_data_detail.outreach_male) AS outreach_male_1,
         sum(hf_data_detail.outreach_female) AS outreach_female_1,
         sum(hf_data_detail.referal_male) AS referal_male_1,
         sum(hf_data_detail.referal_female) AS referal_female_1

        FROM
        warehouses
        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
        INNER JOIN locations ON warehouses.location_id = locations.pk_id
        WHERE
                hf_data_master.item_pack_size_id = 8
        AND hf_data_detail.vaccine_schedule_id = '$vac_id'
        AND hf_data_detail.age_group_id = '" . Model_ListDetail::AGE_0_11 . "'
        AND DATE_FORMAT(
                hf_data_master.reporting_start_date,
                '%Y-%m'
        ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY location_id) A 
    LEFT JOIN (
    SELECT
    Uc.pk_id,

    SUM( IF(log_book.gender = 'male' || log_book.gender IS NULL, (log_book_item_doses.doses),0)) AS male_doses,
    SUM( IF(log_book.gender = 'female',(log_book_item_doses.doses),0)) AS female_doses
    FROM
        log_book

    LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
    INNER JOIN locations AS District ON log_book.district_id = District.pk_id
    INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
    INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
    INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
    INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
    INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
    WHERE
    log_book_item_doses.item_pack_size_id = 8
    AND log_book.district_id =  '$district'
    AND log_book_item_doses.doses = '$vac_id' 
    AND log_book.age Between  '$age1' and '$age2'    
    AND DATE_FORMAT(
                                log_book.vaccination_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
    GROUP BY
                Uc.pk_id


    ) B ON A.pk_id = B.pk_id



                ) A
                RIGHT JOIN (
                        SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.5
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * tOPV Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $age_group
     * @param type $vac_id
     * @param type $age1
     * @param type $age2
     * @return type
     */
    public function tOPVCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $age_group, $vac_id, $age1, $age2) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);


        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        Round(((B.target * 92.3) / 100)) AS lbt,
        Round((((B.target * 92.3) / 100) * 2)) AS l2bt,
        IFNULL(A.male_doses,0) as male_doses,
        IFNULL(A.female_doses,0) as female_doses,
        IFNULL(A.fixed_inside_uc_male_0, 0) AS fixed_inside_uc_male_0,
        IFNULL(A.fixed_inside_uc_female_0,0) AS fixed_inside_uc_female_0,
        IFNULL(A.outreach_male_0, 0) AS outreach_male_0,
        IFNULL(A.outreach_female_0, 0) AS outreach_female_0,
        IFNULL(A.referal_male_0, 0) AS referal_male_0,
        IFNULL(A.referal_female_0, 0) AS referal_female_0,
        (
                IFNULL(A.fixed_inside_uc_male_0, 0) + IFNULL(
                        A.fixed_inside_uc_female_0,
                        0
                ) + IFNULL(A.outreach_male_0, 0) + IFNULL(A.outreach_female_0, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
        ) AS consumption_0,
       IFNULL( ROUND(
                (
                        (
        IFNULL(A.fixed_inside_uc_male_0, 0) + IFNULL(A.fixed_inside_uc_female_0,0) + IFNULL(A.outreach_male_0, 0) + IFNULL(A.outreach_female_0, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
                                ) / ((B.target * 92.3) / 100)
                        ) * 100
                ),0) AS consumptionPercentage_0,
    IFNULL(
                ROUND(
                        (
                                (
                                        IFNULL(A.fixed_inside_uc_male_0, 0) + IFNULL(
                                                A.fixed_inside_uc_female_0,
                                                0
                                        ) + IFNULL(A.outreach_male_0, 0) + IFNULL(A.outreach_female_0, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
                                ) / ((B.target))
                        ) * 100
                ),
                0
        ) AS consumptionPercentage_1,
    IFNULL(
                ROUND(
                        (
                                (
                                        IFNULL(A.fixed_inside_uc_male_0, 0) + IFNULL(
                                                A.fixed_inside_uc_female_0,
                                                0
                                        ) + IFNULL(A.outreach_male_0, 0) + IFNULL(A.outreach_female_0, 0) + IFNULL(A.male_doses, 0) + IFNULL(A.female_doses, 0)
                                ) / (((B.target * 92.3) * 2) / 100)
                        ) * 100
                ),
                0
        ) AS consumptionPercentage_2

        FROM
        (
                (
                        SELECT 
            A.pk_id,
            A.fixed_inside_uc_male_0,
            A.fixed_inside_uc_female_0,
            A.outreach_male_0,
            A.outreach_female_0,
            A.referal_male_0,
            A.referal_female_0,
            B.male_doses,
            B.female_doses
            FROM
          (SELECT
                                locations.pk_id,
        sum(hf_data_detail.fixed_inside_uc_male) AS fixed_inside_uc_male_0,
        sum(hf_data_detail.fixed_inside_uc_female)  AS fixed_inside_uc_female_0,
        sum(hf_data_detail.outreach_male) AS outreach_male_0,
        sum(hf_data_detail.outreach_female) AS outreach_female_0,
        sum(hf_data_detail.referal_male) AS referal_male_0,
        sum(hf_data_detail.referal_female) AS referal_female_0

        FROM
                warehouses
        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
        INNER JOIN locations ON warehouses.location_id = locations.pk_id
        WHERE
        hf_data_master.item_pack_size_id = 26
        AND hf_data_detail.vaccine_schedule_id = '$vac_id'
        AND hf_data_detail.age_group_id = '$age_group'
        AND DATE_FORMAT(
        hf_data_master.reporting_start_date,
        '%Y-%m'
        ) BETWEEN '$from_report_date' AND '$report_date'
        GROUP BY location_id) A 
        LEFT JOIN (
    SELECT
    Uc.pk_id,

    SUM( IF(log_book.gender = 'male' || log_book.gender IS NULL, (log_book_item_doses.doses),0)) AS male_doses,
    SUM( IF(log_book.gender = 'female',(log_book_item_doses.doses),0)) AS female_doses
    FROM
        log_book

    LEFT JOIN locations AS Uc ON Uc.pk_id = log_book.union_council_id
    INNER JOIN locations AS District ON log_book.district_id = District.pk_id
    INNER JOIN locations AS Tehsil ON Uc.parent_id = Tehsil.pk_id
    INNER JOIN warehouses ON log_book.warehouse_id = warehouses.pk_id
    INNER JOIN locations AS ref_from_uc ON ref_from_uc.pk_id = warehouses.location_id
    INNER JOIN locations AS ref_from_dist ON ref_from_dist.pk_id = warehouses.district_id
    INNER JOIN log_book_item_doses ON log_book_item_doses.log_book_id = log_book.pk_id
    WHERE
    log_book_item_doses.item_pack_size_id = 7
    AND log_book.district_id =  '$district'
    AND log_book_item_doses.doses = '$vac_id' 
    AND log_book.age Between  '$age1' and '$age2'    
    AND DATE_FORMAT(
                                log_book.vaccination_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
    GROUP BY
                Uc.pk_id


    ) B ON A.pk_id = B.pk_id
                ) A
                RIGHT JOIN (
                                SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 3.5
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * cba Coverage Report
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @param type $vac_id
     * @return type
     */
    public function cbaCoverageReport($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil, $vac_id) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $from_sel_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));
        $diff = (($report_month - $from_sel_month) + 1);

        $str_qry = "SELECT
        B.pk_id AS location_id,
        B.district AS district,
        B.tehsil AS tehsil,
        B.ucs AS ucs,
        B.target AS target,
        Round(((B.target))) AS lbt,
        IFNULL(A.pregnant_women, 0) AS pregnant_women,
        IFNULL(A.non_pregnant_women, 0) AS non_pregnant_women,
        IFNULL(A.pregnant_women, 0) + IFNULL(A.non_pregnant_women,0)  as consumption,
        IFNULL(ROUND(
                (
                        (
                                IFNULL(A.non_pregnant_women, 0) ) / ((B.target))
                ) * 100
        ),0) AS consumptionPercentage
       FROM
        (
                (
                        SELECT
                                locations.pk_id,
                                hf_data_detail.pregnant_women,
                                hf_data_detail.non_pregnant_women
                        FROM
                                warehouses
                        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                        INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
                        INNER JOIN locations ON warehouses.location_id = locations.pk_id
                        WHERE
                                hf_data_master.item_pack_size_id = 12
                        AND hf_data_detail.vaccine_schedule_id = '$vac_id'
                        AND DATE_FORMAT(
                                hf_data_master.reporting_start_date,
                                '%Y-%m'
                        ) BETWEEN '$from_report_date' AND '$report_date'
                        GROUP BY
                                location_id
                ) A
                RIGHT JOIN (
                        SELECT
                                A.pk_id,
                                A.district,
                                A.tehsil,
                                A.ucs,
                                IFNULL(B.target, 0) AS target
                        FROM
                                (
                                        SELECT
                                                ucs.pk_id AS pk_id,
                                                locations.location_name AS district,
                                                tehsils.location_name AS tehsil,
                                                ucs.location_name AS ucs
                                        FROM
                                                locations
                                        INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                        INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                        INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                        WHERE
                                                locations.geo_level_id = 4
                                        AND locations.pk_id = '$district'
                                             $where
                                        GROUP BY
                                                ucs.pk_id
                                        ORDER BY
                                                tehsil,
                                                ucs
                                ) A
                        LEFT JOIN (
                                SELECT
                                        ROUND(
                                                COALESCE (
                                                        ROUND(
                                                                (
                                                                        (
                                                                                (
                                                                                        (
                                                                                                location_populations.population * 1
                                                                                        ) / 100 * 18.43
                                                                                )
                                                                        ) * $diff
                                                                )
                                                        ) / 12,
                                                        NULL,
                                                        0
                                                )
                                        ) AS target,
                                        ucs.pk_id AS pk_id
                                FROM
                                        locations
                                INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
                                INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
                                INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
                                INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
                                WHERE
                                        locations.geo_level_id = 4
                                AND YEAR (
                                        location_populations.estimation_date
                                ) = '$from_sel_year'
                                AND locations.pk_id = '$district'
                                     $where
                                GROUP BY
                                        ucs.pk_id
                        ) B ON A.pk_id = B.pk_id
                ) B ON A.pk_id = B.pk_id
        )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Location Name
     * @param type $loc_id
     * @return type
     */
    public function getLocationName($loc_id) {
        $em = Zend_Registry::get('doctrine');
        $loc = $em->getRepository("Locations")->find($loc_id);
        return $loc->getLocationName();
    }

    /**
     * Inventory Management Reporting
     * @param type $wh_type
     * @param type $report_year
     * @param type $report_month
     * @param type $from_sel_month
     * @param type $from_sel_year
     * @param type $district
     * @param type $sel_tehsil
     * @return type
     */
    public function inventoryManagementReporting($wh_type, $report_year, $report_month, $from_sel_month, $from_sel_year, $district, $sel_tehsil) {
        if ($wh_type == 5) {
            $where = "AND tehsils.pk_id = $sel_tehsil";
        } else {

            $where = "";
        }

        $report_date1 = $report_year . "-" . $report_month;
        $report_date = date('Y-m', strtotime($report_date1));

        $from_report_date = $from_sel_year . "-" . $from_sel_month;
        $from_report_date = date('Y-m', strtotime($from_report_date));

        $str_qry = "SELECT 
            B.pk_id as location_id,
            B.district as district,
            B.tehsil as tehsil,
            B.ucs as ucs,
            B.target AS target,
            Round(((B.target*92.3)/100)) as lbt,
            IFNULL(A.fixed_inside_uc_male,0) as fixed_inside_uc_male,
            IFNULL(A.fixed_inside_uc_female,0) as fixed_inside_uc_female,
            IFNULL(A.outreach_male,0) as outreach_male,
            IFNULL(A.outreach_female,0) as outreach_female,
            IFNULL(A.referal_male,0) as referal_male,
            IFNULL(A.referal_female,0) as referal_female,
            IFNULL(A.total,0) as consumption,
            ROUND(
                            (
                                    IFNULL(A.total, 0) /((B.target*92.3)/100)
                            ) * 100
                    ) AS consumptionPercentage
             from ((SELECT

                    locations.pk_id,
                    sum(hf_data_detail.fixed_inside_uc_male) as fixed_inside_uc_male,
                    sum(hf_data_detail.fixed_inside_uc_female) as fixed_inside_uc_female,
                    sum(hf_data_detail.outreach_male) as outreach_male,
                    sum(hf_data_detail.outreach_female) as outreach_female,
              sum(hf_data_detail.referal_male) as referal_male,
              sum(hf_data_detail.referal_female) as referal_female,
             (
                                                IFNULL(sum(hf_data_detail.fixed_inside_uc_male), 0) + IFNULL(sum(hf_data_detail.fixed_inside_uc_female), 0) + IFNULL(sum(hf_data_detail.outreach_male), 0) + IFNULL(sum(hf_data_detail.outreach_female), 0) + IFNULL(sum(hf_data_detail.referal_male), 0) + IFNULL(sum(hf_data_detail.referal_female), 0)
                                ) AS total
            FROM
                    warehouses
            INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
            INNER JOIN hf_data_detail ON hf_data_master.pk_id = hf_data_detail.hf_data_master_id
            INNER JOIN locations ON warehouses.location_id = locations.pk_id
            WHERE
            hf_data_master.item_pack_size_id = 6 AND
             DATE_FORMAT(
                    hf_data_master.reporting_start_date,
                    '%Y-%m'
            ) BETWEEN '$from_report_date' AND '$report_date'
            GROUP BY
                    locations.pk_id ) A
            RIGHT JOIN (
            SELECT
                    ucs.pk_id AS pk_id,
                    locations.location_name AS district,
                    tehsils.location_name AS tehsil,
                    ucs.location_name AS ucs,
                    ROUND(
                            COALESCE (
                                    ROUND(
                                            (
                                                    (
                                                            (
                                                                    location_populations.population * 1
                                                            ) / 100 * 3.5
                                                    )
                                            )
                                    ) / 12,
                                    NULL,
                                    0
                            )
                    ) AS target
            FROM
             locations
            INNER JOIN locations AS tehsils ON locations.pk_id = tehsils.parent_id
            INNER JOIN locations AS ucs ON tehsils.pk_id = ucs.parent_id
            INNER JOIN warehouses ON ucs.pk_id = warehouses.location_id
            INNER JOIN location_populations ON ucs.pk_id = location_populations.location_id
            WHERE
                    locations.geo_level_id = 4
            AND YEAR (
                    location_populations.estimation_date
            ) = '$report_year'
            AND locations.province_id = 2
            AND locations.pk_id = '$district'
                $where
            GROUP BY
                    ucs.pk_id
            ORDER BY
                    tehsil,
                    ucs

            ) B ON A.pk_id = B.pk_id )";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($str_qry);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Divisions
     * @param type $province_id
     * @return type
     */
    public function getDivisions($province_id) {
        $querypro = "SELECT
                        locations.pk_id as PkLocID,
                        locations.location_name as LocName
                        FROM
                                locations 
                        WHERE
                                locations.geo_level_id = 3
                        AND locations.province_id = $province_id

                        ORDER BY
                                locations.location_name ASC";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

    /**
     * Get Reported UC 1
     * @param type $district_id
     * @param type $month
     * @param type $year
     * @param type $wh_type
     * @return type
     */
    public function getReportedUc1($district_id, $month, $year, $wh_type) {
        $qry = "";
        if ($wh_type == 2) {
            $qry = " warehouses.district_id = $district_id";
            $sub_qry = "SELECT locations.province_id from locations where locations.district_id = '$district_id' ";
        } else {
            $qry = " UC.parent_id = $district_id";
            $sub_qry = "SELECT locations.province_id from locations where locations.parent_id = '$district_id' ";
        }
        $this->_em = Zend_Registry::get('doctrine');
        $row_1 = $this->_em->getConnection()->prepare($sub_qry);

        $row_1->execute();
        $row_1->fetchAll();

        $querypro = "
                    SELECT
                         UC.pk_id as PkLocID,
                         DATE_FORMAT(hf_data_master.created_date,'%d/%m/%Y') as reported_date
                    FROM
                        locations AS District
                        INNER JOIN locations AS UC ON District.pk_id = UC.district_id
                        INNER JOIN warehouses ON UC.pk_id = warehouses.location_id
                        INNER JOIN hf_data_master ON warehouses.pk_id = hf_data_master.warehouse_id
                        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
                    WHERE
                        $qry
                        AND warehouses.status = 1
                        AND DATE_FORMAT(hf_data_master.reporting_start_date, '%m-%Y') = '" . $month . "-" . $year . "  '
                        AND hf_data_master.issue_balance IS NOT NULL AND hf_data_master.issue_balance != 0
                        AND stakeholders.geo_level_id = 6
                        AND warehouses.stakeholder_id = 1
                    GROUP BY
                        UC.pk_id";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

}

?>