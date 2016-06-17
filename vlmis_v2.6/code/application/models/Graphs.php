<?php

/**
 * Model_Graphs
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Graphs
 */
class Model_Graphs extends Model_Base {

    /**
     * Comp Graph Option Year National
     * @return string
     */
    public function compGraphOptionYearNational() {
        /*
          Yearly Comparision - National
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $yearcomp = $post['yearcomp'];
        $all_provinces = $post['all_provinces'];
        $all_districts = $post['all_districts'];
        $optvals = $post['optvals'];
        $period = new Model_Period();
        $period->form_values = array('id' => $post['period']);
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => $post['indicators'], 'report_comp' => $optvals);
        $query = $rep_option->getReportDataSql();
        $title = $query->getReportTitleSql();
        $location = new Model_Locations();
        $loc_name = '';
        if (!empty($all_provinces)) {
            $location->form_values = array("pk_id" => $all_provinces);
            $loc_name = $location->getLocationName();
        }
        if (!empty($all_districts)) {
            $location->form_values = array("pk_id" => $all_districts);
            $loc_name = $location->getLocationName();
        }
        for ($k = 0; $k < sizeof($products); $k++) {
            $product_obj = new Model_ItemPackSizes();
            $product_obj->form_values['pk_id'] = $products[$k];
            $product_name = $product_obj->getProductName();
            list($indicator, $compare_options) = explode("-", str_replace("Report", "Graph", str_replace("Province", "Provincial", $title)));

            if ($optvals == 7 || $optvals == 8) {
                $graph_caption = $indicator . " of " . $product_name . "(" . $yearcomp . ")";
            } else {
                $graph_caption = $indicator . " of " . $product_name;
            }

            if ($optvals == 1) {
                $graph_subcaption = $compare_options;
            } elseif ($optvals == 2) {
                $graph_subcaption = "Provincial " . $compare_options . " for " . $loc_name;
            } elseif ($optvals == 3) {
                $graph_subcaption = "District " . $compare_options . " for " . $loc_name;
            }
            if ($post['indicators'] == 'GMOS') {
                $y_text = "Months";
            } else {
                $y_text = "Doses";
            }
            if ($post['indicators'] == 'GCLOSINGFLD') {
                $indicator = 'Stock On Hand (UC)';
            } else if ($post['indicators'] == 'GCLOSING') {
                $indicator = 'Stock On Hand (District+Tehsil)';
            } else if ($post['indicators'] == 'GMOS') {
                $indicator = 'Month of Stock (EPI Centers)';
            }


            if ($optvals == 1) {
                $camp_options = "Year - National";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 2) {
                $camp_options = "Year - Provincial";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 3) {
                $camp_options = "Year - District";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 7) {
                $camp_options = "Geographical - Provinical";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 8) {
                $camp_options = "Geographical - District";
                $sub_caption = $indicator . '→' . $camp_options;
            }


            $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1'  exportAction='Download' caption='" . $graph_caption . "' subCaption='" . $sub_caption . "' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $loc_name . " - " . $product_name . "' yAxisName='$y_text' numberSuffix='' showValues='1' formatNumberScale='0' theme='fint'>";
            $xmlstore .= "<categories>";
            for ($i = $months->getBeginMonth(); $i <= $months->getEndMonth(); $i++) {
                $month_name = $monthval[$i - 1];
                $xmlstore .= "<category label='$month_name' />";
                for ($j = sizeof($yearcomp) - 1; $j >= 0; $j--) {
                    $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                    $sql = str_replace("\$yearcomp[\$j]", $yearcomp[$j], $sql);
                    $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                    $sql = str_replace("\$seluser", 1, $sql);
                    $sql = str_replace("\$all_provinces", $all_provinces, $sql);
                    $sql = str_replace("\$all_districts", "'" . $all_districts . "'", $sql);

                    $str_sql = $this->_em_read->getConnection()->prepare($sql);

                    $str_sql->execute();
                    $row = $str_sql->fetchAll();
                    if (!empty($row)) {
                        $res = explode('*', $row[0]['xyz']);
                        $row_data = $res[$query->getReportDataPosition()] / 1;
                        $filedata1[$yearcomp[$j]][$monthval[$i - 1]] = $row_data;
                    }
                }
            }
            $xmlstore .= "</categories>";
            foreach ($filedata1 as $key1 => $value1) {
                $xmlstore .= "<dataset seriesName='$key1'>";
                foreach ($value1 as $val2) {
                    $xmlstore .= "<set value='" . Round($val2, 2) . "' />";
                }
                $xmlstore .= "</dataset>";
            }
            $xmlstore .="</chart>";
            $xmlstore_array[] = $xmlstore;
        }
        return $xmlstore_array;
    }

    /**
     * MS Graph Option Year
     *
     * @return string
     */
    public function MSGraphOptionYear() {
        /*
          Yearly Comparision - National
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $yearcomp = $post['yearcomp'];
        $all_provinces = $post['all_provinces'];
        $all_districts = $post['all_districts'];
        $optvals = $post['optvals'];
        $period = new Model_Period();
        $period->form_values = array('id' => $post['period']);
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => 'GISSUES', 'report_comp' => $optvals);
        $query = $rep_option->getReportDataSql();
        $location = new Model_Locations();
        $location->form_values['pk_id'] = $all_provinces;
        $location_name = $location->getLocationName();
        $title = "Vaccination vs Average Monthly Consumption(" . $location_name . "-" . $yearcomp[0] . ")";
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => 'GAMC', 'report_comp' => $optvals);
        $query2 = $rep_option->getReportDataSql();
        $cache = Zend_Registry::get('cacheManager')->getCache('file');
        $vaccinationvsamc = "VACCVSAMC_$post[period]$yearcomp[0]$products[0]$all_provinces$optvals";

        if ($yearcomp[0] == date("Y")) {
            $end_month = date("m");
        } else {
            $end_month = $months->getEndMonth();
        }

        if (!$xmlstore_array = $cache->load($vaccinationvsamc)) {
            for ($k = 0; $k < sizeof($products); $k++) {
                $product_obj = new Model_ItemPackSizes();
                $product_obj->form_values['pk_id'] = $products[$k];
                $product_name = $product_obj->getProductName();
                $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1' yAxisMaxValue='100' exportAction='Download' caption='$product_name $title' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $product_name . "' yAxisName='Doses' numberSuffix='' showValues='1' formatNumberScale='0' theme='fint'>";
                $xmlstore .= "<categories>";
                for ($i = $months->getBeginMonth(); $i <= $end_month; $i++) {
                    $month_name = $monthval[$i - 1];
                    $xmlstore .= "<category label='$month_name' />";
                    for ($j = sizeof($yearcomp) - 1; $j >= 0; $j--) {
                        $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                        $sql = str_replace("\$yearcomp[\$j]", $yearcomp[$j], $sql);
                        $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                        $sql = str_replace("\$seluser", 1, $sql);
                        $sql = str_replace("\$all_provinces", $all_provinces, $sql);
                        $sql = str_replace("\$all_districts", "'" . $all_districts . "'", $sql);
                        $str_sql = $this->_em_read->getConnection()->prepare($sql);
                        $str_sql->execute();
                        $row = $str_sql->fetchAll();
                        if (!empty($row)) {
                            $res = explode('*', $row[0]['xyz']);
                            $row_data = $res[$query->getReportDataPosition()] / 1;
                            $filedata1[$yearcomp[$j]][$monthval[$i - 1]] = $row_data;
                        }
                        $sql = "select " . str_replace("\$i", $i, $query2->getReportDataSql()) . " as xyz  from dual ";
                        $sql = str_replace("\$yearcomp[\$j]", $yearcomp[$j], $sql);
                        $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                        $sql = str_replace("\$seluser", 1, $sql);
                        $sql = str_replace("\$all_provinces", $all_provinces, $sql);
                        $sql = str_replace("\$all_districts", "'" . $all_districts . "'", $sql);
                        $str_sql = $this->_em_read->getConnection()->prepare($sql);
                        $str_sql->execute();
                        $row = $str_sql->fetchAll();
                        if (!empty($row)) {
                            $res = explode('*', $row[0]['xyz']);
                            $row_data = $res[$query2->getReportDataPosition()] / 1;
                            $filedata2[$yearcomp[$j]][$monthval[$i - 1]] = $row_data;
                        }
                    }
                }
                $xmlstore .= "</categories>";
                foreach ($filedata1 as $key1 => $value1) {
                    $xmlstore .= "<dataset seriesName='Consumption'>";
                    foreach ($value1 as $val2) {
                        $xmlstore .= "<set value='" . round($val2) . "' />";
                    }
                    $xmlstore .= "</dataset>";
                }
                foreach ($filedata2 as $key1 => $value1) {
                    $xmlstore .= "<dataset seriesName='Average Monthly Consumption*'>";
                    foreach ($value1 as $val2) {
                        $xmlstore .= "<set value='" . round($val2) . "' />";
                    }
                    $xmlstore .= "</dataset>";
                }
                $xmlstore .="</chart>";
                $xmlstore_array[] = $xmlstore;
            }
            $cache->save($xmlstore_array, $vaccinationvsamc);
        }
        return $xmlstore_array;
    }

    /**
     * Get MS Graph Cons MOS
     * @return string
     */
    public function getMSGraphConsMOS() {
        /*
          Yearly Comparision - National
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];        
        $yearcomp = $post['yearcomp'];
        $all_provinces = $post['all_provinces'];
        $all_districts = $post['all_districts'];
        $optvals = $post['optvals'];
        
        $period = new Model_Period();
        $period->form_values = array('id' => $post['period']);
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => 'GISSUES', 'report_comp' => $optvals);
        $query = $rep_option->getReportDataSql();
        $location = new Model_Locations();
        $location->form_values['pk_id'] = $all_provinces;
        $location_name = $location->getLocationName();
        $title = "Vaccination vs Stock On Hand (" . $location_name . "-" . $yearcomp[0] . ")";
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => 'GCLOSING', 'report_comp' => $optvals);
        for ($k = 0; $k < sizeof($products); $k++) {
            $product_obj = new Model_ItemPackSizes();
            $product_obj->form_values['pk_id'] = $products[$k];
            $product_name = $product_obj->getProductName();
            $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1' yAxisMaxValue='100' exportAction='Download' caption='$product_name $title' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $product_name . "' yAxisName='Doses' numberSuffix='' showValues='1' formatNumberScale='0' theme='fint'>";
            $xmlstore .= "<categories>";
            for ($i = $months->getBeginMonth(); $i <= $months->getEndMonth(); $i++) {
                $month_name = $monthval[$i - 1];
                $xmlstore .= "<category label='$month_name' />";
                for ($j = sizeof($yearcomp) - 1; $j >= 0; $j--) {
                    $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                    $sql = str_replace("\$yearcomp[\$j]", $yearcomp[$j], $sql);
                    $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                    $sql = str_replace("\$seluser", 1, $sql);
                    $sql = str_replace("\$all_provinces", $all_provinces, $sql);
                    $sql = str_replace("\$all_districts", "'" . $all_districts . "'", $sql);
                    $dbg_sql.=$sql . '<br>';
                    $str_sql = $this->_em_read->getConnection()->prepare($sql);
                    $str_sql->execute();
                    $row = $str_sql->fetchAll();
                    if (!empty($row)) {
                        $res = explode('*', $row[0]['xyz']);
                        $row_data = $res[$query->getReportDataPosition()] / 1;
                        $filedata1[$yearcomp[$j]][$monthval[$i - 1]] = $row_data;
                    }
                    $sql = "select REPgetCB('POBRA','$i','" . $yearcomp[$j] . "','" . $products[$k] . "',1,'$all_provinces','$all_provinces') as xyz  from dual ";
                    $dbg_sql.=$sql . '<br>';
                    $str_sql = $this->_em_read->getConnection()->prepare($sql);
                    $str_sql->execute();
                    $row = $str_sql->fetchAll();
                    if (!empty($row)) {
                        $filedata2[] = explode('*', $row[0]['xyz']);
                    }
                }
            }
            $xmlstore .= "</categories>";
            foreach ($filedata1 as $value1) {
                $xmlstore .= "<dataset seriesName='Consumption/Vaccination'>";
                foreach ($value1 as $val2) {
                    $xmlstore .= "<set value='" . round($val2) . "' />";
                }
                $xmlstore .= "</dataset>";
            }
            $xmlstore .= "<dataset seriesName='Stock On Hand(SOH)'>";
            foreach ($filedata2 as $val2) {
                $val = $val2[0];
                $xmlstore .= "<set value='" . round($val) . "' />";
            }
            $xmlstore .= "</dataset>";
            $xmlstore .="</chart>";
            $xmlstore_array[] = $xmlstore;
        }
        return $xmlstore_array;
    }

    /**
     * Cold Chain Capacity
     * @param type $type
     * @return string
     */
    public function coldChainCapacity($type) {
        $is_return = $type;
        if ($type == 2) {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = 3 OR AssetMainType.pk_id = 3 )
                        OR ( cold_chain.ccm_asset_type_id = 1 OR AssetMainType.pk_id = 1 ) )";
        } else {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = $type OR AssetMainType.pk_id = $type ) )";
        }
        $warehouse_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT DISTINCT cold_chain.asset_id,
        ccm_models.gross_capacity_20 + ccm_models.gross_capacity_4 AS gross,
        ccm_models.net_capacity_20 + ccm_models.net_capacity_4 AS net_usable,
        ROUND( SUM( ( placements.quantity * pack_info.volum_per_vial ) / 1000 )
        ) AS being_used,
        placement_locations.pk_id
        FROM cold_chain
        INNER JOIN ccm_asset_types AS AssetSubtype ON cold_chain.ccm_asset_type_id = AssetSubtype.pk_id
LEFT JOIN ccm_asset_types AS AssetMainType ON AssetSubtype.parent_id = AssetMainType.pk_id
LEFT JOIN placement_locations ON cold_chain.pk_id = placement_locations.location_id
INNER JOIN ccm_models ON ccm_models.pk_id = cold_chain.ccm_model_id
LEFT JOIN placements ON placements.placement_location_id = placement_locations.pk_id
LEFT JOIN stock_batch_warehouses ON placements.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
LEFT JOIN stock_batch ON stock_batch_warehouses.stock_batch_id = stock_batch.pk_id
LEFT JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
LEFT JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
LEFT JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
LEFT JOIN ccm_status_history ON ccm_status_history.pk_id = cold_chain.ccm_status_history_id
        WHERE cold_chain.warehouse_id = $warehouse_id $where
        AND placement_locations.location_type = " . Model_PlacementLocations::LOCATIONTYPE_CCM . " AND
ccm_status_history.ccm_status_list_id <> 3
        GROUP BY cold_chain.auto_asset_id
        ORDER BY cold_chain.asset_id, cold_chain.ccm_asset_type_id DESC";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        if ($is_return == 2) {
            return $result;
        }
        $title = '';
        if ($type == 3) {
            $title = "+2-8C Cold Rooms (In Litres)";
        }
        if ($type == 1) {
            $title = "-20C Cold Rooms (In Litres)";
        }
        $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1' yAxisMaxValue='100' exportAction='Download' caption= '$title ' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . "' yAxisName='Litres' showValues='1' formatNumberScale='0' theme='fint'>";
        $xmlstore .= "<categories>";
        foreach ($result as $row) {
            $xmlstore .= "<category label='" . $row['asset_id'] . "' />";
        }
        $xmlstore .= "</categories>";
        $xmlstore .= "<dataset seriesName='Net Usable'>";
        $base_url = Zend_Registry::get('baseurl');

        foreach ($result as $row) {
            $url = $base_url . "/stock/stock-in-bin-vaccines?id=" . $row['pk_id'];
            $xmlstore .= "<set link=\"$url\" value='" . round($row['net_usable']) . "' />";
        }
        $xmlstore .= "</dataset>";
        $xmlstore .= "<dataset seriesName='Being Used'>";
        foreach ($result as $row) {
            $url = $base_url . "/stock/stock-in-bin-vaccines?id=" . $row['pk_id'];
            $xmlstore .= "<set link=\"$url\" value='" . round($row['being_used']) . "' />";
        }
        $xmlstore .= "</dataset>";
        return $xmlstore . "</chart>";
    }

    /**
     * MS Graph Reported Wastage
     * @return string
     */
    public function MSGraphReportedWastage() {
        /*
          Yearly Comparision - National
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $yearcomp = $post['yearcomp'];
        $all_provinces = $post['all_provinces'];
        $period = new Model_Period();
        $period->form_values = array('id' => $post['period']);
        $months = $period->getPeriodById();
        $location = new Model_Locations();
        $location->form_values['pk_id'] = $all_provinces;
        $location_name = $location->getLocationName();
        $title = "Reporting Rate and Wastage Comparison  (" . $location_name . "-" . $yearcomp[0] . ")";
        $cache = Zend_Registry::get('cacheManager')->getCache('file');
        $reportedwastages = "REPORTEDWASTAGES_$post[period]$yearcomp[0]$products[0]$all_provinces";
        
        if ($yearcomp[0] == date("Y")) {
            $end_month = date("m");
        } else {
            $end_month = $months->getEndMonth();
        }

        if (!$xmlstore_array = $cache->load($reportedwastages)) {
            for ($k = 0; $k < sizeof($products); $k++) {
                $product_obj = new Model_ItemPackSizes();
                $product_obj->form_values['pk_id'] = $products[$k];
                $product_name = $product_obj->getProductName();
                $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1' yAxisMaxValue='100' exportAction='Download' caption= '$product_name $title ' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $product_name . "' yAxisName='Percentage' numberSuffix='%' showValues='1' rotateValues='0' formatNumberScale='0' theme='fint'>";
                $xmlstore .= "<categories>";
                for ($i = $months->getBeginMonth(); $i <= $end_month; $i++) {
                    $month_name = $monthval[$i - 1];
                    $xmlstore .= "<category label='$month_name' />";
                }
                $start_date = $yearcomp[0] . '-' . $months->getBeginMonth() . "-01";
                $end_date = $yearcomp[0] . '-' . $months->getEndMonth() . "-01";
                $sql = "select REPgetWastage('P','$start_date','$end_date',1,'$products[$k]',$all_provinces,0) as xyz  from dual ";
                $str_sql = $this->_em_read->getConnection()->prepare($sql);
                $str_sql->execute();
                $row = $str_sql->fetchAll();
                if (!empty($row)) {
                    $filedata1 = explode('*', $row[0]['xyz']);
                }
                $sql = "select REPgetRR('P','$start_date','$end_date',1,'$products[$k]',$all_provinces,0) as xyz  from dual ";
                $str_sql = $this->_em_read->getConnection()->prepare($sql);
                $str_sql->execute();
                $row = $str_sql->fetchAll();
                if (!empty($row)) {
                    $filedata2 = explode('*', $row[0]['xyz']);
                }
                $xmlstore .= "</categories>";
                $xmlstore .= "<dataset seriesName='Wastage'>";
                foreach ($filedata1 as $val2) {
                    $xmlstore .= "<set value='" . round($val2) . "' />";
                }
                $xmlstore .= "</dataset>";
                $xmlstore .= "<dataset seriesName='Reporting Rate'>";
                foreach ($filedata2 as $val2) {
                    $xmlstore .= "<set value='" . round($val2) . "' />";
                }
                $xmlstore .= "</dataset>";
                $obj_product = new Model_ItemPackSizes();
                $prod_result = $obj_product->getProductById($products[0]);
                $xmlstore .="<trendlines>
                <line startvalue='" . $prod_result->getWastageRateAllowed() . "' color='EE2000' displayvalue='Wastage Allowed:" . $prod_result->getWastageRateAllowed() . "%' valueonright='1' />
                </trendlines>";
                $xmlstore .="</chart>";
                $xmlstore_array[] = $xmlstore;
            }
            $cache->save($xmlstore_array, $reportedwastages);
        }
        return $xmlstore_array;
    }

    /**
     * Simple Graph Option Year National
     * @return string
     */
    public function simpleGraphOptionYearNational() {
        /*
          Yearly Comparision - National
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $yearcomp = $post['yearcomp'];
        $all_provinces = $post['all_provinces'];
        $all_districts = $post['all_districts'];
        $optvals = $post['optvals'];
        $location = new Model_Locations();
        $loc_name = array();
        if (!empty($all_provinces)) {
            $location->form_values = array("pk_id" => $all_provinces);
            $province_name = $location->getLocationName();
        }
        if (!empty($all_districts)) {
            $location->form_values = array("pk_id" => $all_districts);
            $loc_name[] = $location->getLocationName();
        }
        $period = new Model_Period();
        $period->form_values = array(
            'id' => $post['period']
        );
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array(
            'stakeholder' => 1,
            'report_id' => $post['indicators'],
            'report_comp' => $optvals
        );
        if ($post['indicators'] == 'GMOS') {
            $yaxis = "Months";
        } else {
            $yaxis = "Doses";
        }
        $query = $rep_option->getReportDataSql();
        $title = $query->getReportTitleSql();
        $location_name = implode(",", $loc_name);
        for ($k = 0; $k < sizeof($products); $k++) {
            $product_obj = new Model_ItemPackSizes();
            $product_obj->form_values['pk_id'] = $products[$k];
            $product_name = $product_obj->getProductName();
            list($indicator, $compare_options) = explode("-", str_replace("Report", "Graph", str_replace("Province", "Provincial", $title)));
            $graph_caption = $indicator . " of " . $product_name;
            if ($optvals == 9) {
                $graph_subcaption = $compare_options;
            } elseif ($optvals == 10) {
                $graph_subcaption = "" . $compare_options . " for " . $province_name;
            } elseif ($optvals == 11) {
                $graph_subcaption = "" . $compare_options . " for " . $location_name;
            }
            if ($post['indicators'] == 'GCLOSINGFLD') {
                $indicator = 'Stock On Hand (UC)';
            } else if ($post['indicators'] == 'GCLOSING') {
                $indicator = 'Stock On Hand (District+Tehsil)';
            } else if ($post['indicators'] == 'GMOS') {
                $indicator = 'Month of Stock (EPI Centers)';
            }
            if ($optvals == 9) {
                $camp_options = "Geographical - National";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $yearcomp;
            } else if ($optvals == 10) {
                $camp_options = "Geographical - Provinical";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $province_name . '→' . $yearcomp;
            } else if ($optvals == 11) {
                $camp_options = "Geographical - District";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $location_name . '→' . $yearcomp;
            }

            $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1'  exportAction='Download' caption='" . $graph_caption . "' subCaption='" . $sub_caption . "' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $loc_name . " - " . $product_name . "' yAxisName='$yaxis' numberSuffix='' showValues='1' theme='fint' formatNumberScale='0'>";
            $xmlstore .= "<categories>";
            for ($i = $months->getBeginMonth(); $i <= $months->getEndMonth(); $i++) {
                $month_name = $monthval[$i - 1];
                $xmlstore .= "<category label='$month_name' />";
                $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                $sql = str_replace("\$year1", $yearcomp, $sql);
                $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                $sql = str_replace("\$seluser", 1, $sql);
                $sql = str_replace("\$all_provinces", $all_provinces, $sql);
                $sql = str_replace("\$all_districts", "'" . $all_districts . "'", $sql);

                $str_sql = $this->_em_read->getConnection()->prepare($sql);
                $str_sql->execute();
                $row = $str_sql->fetchAll();
                if (!empty($row)) {
                    $res = explode('*', $row[0]['xyz']);
                    $row_data = $res[$query->getReportDataPosition()] / 1;
                    $filedata1[$yearcomp][$monthval[$i - 1]] = $row_data;
                }
            }
            $xmlstore .= "</categories>";
            foreach ($filedata1 as $key1 => $value1) {
                $xmlstore .= "<dataset seriesName='$key1'>";
                foreach ($value1 as $val2) {
                    $xmlstore .= "<set value='" . Round($val2, 2) . "' />";
                }
                $xmlstore .= "</dataset>";
            }
            $xmlstore .="</chart>";
            $xmlstore_array[] = $xmlstore;
        }
        return $xmlstore_array;
    }

    /**
     * Comp Graph Option Geo Provincial
     *
     * @return string
     */
    public function compGraphOptionGeoProvincial() {
        /*
          Provincial
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $year1 = $post['yearcomp'];
        $provinces = $post['all_provinces'];
        $optvals = $post['optvals'];
        $period = new Model_Period();
        $period->form_values = array(
            'id' => $post['period']
        );
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array(
            'stakeholder' => 1,
            'report_id' => $post['indicators'],
            'report_comp' => $optvals
        );
        $query = $rep_option->getReportDataSql();
        $title = $query->getReportTitleSql();
        $location = new Model_Locations();
        $loc_name = array();
        foreach ($provinces as $prov_id) {
            $location->form_values = array("pk_id" => $prov_id);
            $loc_name[] = $location->getLocationName();
        }
        $location_name = implode(",", $loc_name);
        for ($k = 0; $k < sizeof($products); $k++) {
            $product_obj = new Model_ItemPackSizes();
            $product_obj->form_values['pk_id'] = $products[$k];
            $product_name = $product_obj->getProductName();
            list($indicator, $compare_options) = explode("-", str_replace("Report", "Graph", str_replace("Province", "Provincial", $title)));
            $graph_caption = $indicator . " of " . $product_name;
            if ($optvals == 1) {
                $graph_subcaption = $compare_options;
            } elseif ($optvals == 2) {
                $graph_subcaption = "Provincial " . $compare_options . " for " . $loc_name;
            } elseif ($optvals == 3) {
                $graph_subcaption = "District " . $compare_options . " for " . $loc_name;
            } elseif ($optvals == 7 || $optvals == 8) {
                $graph_subcaption = "" . $compare_options . " for " . $location_name . " of " . $product_name . " (" . $year1 . ")";
            }
            if ($post['indicators'] == 'GMOS') {
                $y_text = "Months";
            } else {
                $y_text = "Doses";
            }
            if ($post['indicators'] == 'GCLOSINGFLD') {
                $indicator = 'Stock On Hand (UC)';
            } else if ($post['indicators'] == 'GCLOSING') {
                $indicator = 'Stock On Hand (District+Tehsil)';
            } else if ($post['indicators'] == 'GMOS') {
                $indicator = 'Month of Stock (EPI Centers)';
            }
            if ($optvals == 1) {
                $camp_options = "Year - National";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 2) {
                $camp_options = "Year - Provincial";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 3) {
                $camp_options = "Year - District";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 7) {
                $camp_options = "Geographical - Provinical";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 8) {
                $camp_options = "Geographical - District";
                $sub_caption = $indicator . '→' . $camp_options;
            }
            $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1'  exportAction='Download' subcaption='" . $sub_caption . "' caption='" . $graph_subcaption . "' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $location_name . " - " . $product_name . "' yAxisName='$y_text' numberSuffix='' showValues='1' formatNumberScale='0' theme='fint'>";
            $xmlstore .= "<categories>";
            for ($i = $months->getBeginMonth(); $i <= $months->getEndMonth(); $i++) {
                $month_name = $monthval[$i - 1];
                $xmlstore .= "<category label='$month_name' />";
                for ($j = 0; $j < sizeof($provinces); $j++) {
                    $location_obj = new Model_Locations();
                    $location_obj->form_values['product_id'] = $provinces[$j];
                    $loc_name = $location_obj->getLocationById();
                    $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                    $sql = str_replace("\$year1", $year1, $sql);
                    $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                    $sql = str_replace("\$seluser", 1, $sql);
                    $sql = str_replace("\$provinces[\$j]", $provinces[$j], $sql);

                    $str_sql = $this->_em_read->getConnection()->prepare($sql);

                    $str_sql->execute();
                    $row = $str_sql->fetchAll();
                    if (!empty($row)) {
                        $res = explode('*', $row[0]['xyz']);
                        $row_data = $res[$query->getReportDataPosition()] / 1;
                        $filedata1[$loc_name][$monthval[$i - 1]] = $row_data;
                    }
                }
            }
            $xmlstore .= "</categories>";
            foreach ($filedata1 as $key1 => $value1) {
                $xmlstore .= "<dataset seriesName='$key1'>";
                foreach ($value1 as $val2) {
                    $xmlstore .= "<set value='" . Round($val2, 2) . "' />";
                }
                $xmlstore .= "</dataset>";
            }
            $xmlstore .="</chart>";
            $xmlstore_array[] = $xmlstore;
        }
        return $xmlstore_array;
    }

    /**
     * Comp Graph Option Geo District
     *
     * @return string
     */
    public function compGraphOptionGeoDistrict() {
        /*
          District
         */
        $monthval = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
        $post = $this->form_values;
        $products = $post['products'];
        $year1 = $post['yearcomp'];
        $provinces = $post['all_provinces'];
        $districts = $post['all_districts'];
        $optvals = $post['optvals'];
        $period = new Model_Period();
        $period->form_values = array('id' => $post['period']);
        $months = $period->getPeriodById();
        $rep_option = new Model_ReportOptions();
        $rep_option->form_values = array('stakeholder' => 1, 'report_id' => $post['indicators'], 'report_comp' => $optvals);
        $query = $rep_option->getReportDataSql();
        $title = $query->getReportTitleSql();
        $location = new Model_Locations();
        $loc_name = array();
        if (!empty($provinces)) {
            $location->form_values = array("pk_id" => $provinces);
            $province_name = $location->getLocationName();
        }
        foreach ($districts as $dist_id) {
            $location->form_values = array("pk_id" => $dist_id);
            $loc_name[] = $location->getLocationName();
        }
        $location_name = implode(",", $loc_name);
        for ($k = 0; $k < sizeof($products); $k++) {
            $product_obj = new Model_ItemPackSizes();
            $product_obj->form_values['pk_id'] = $products[$k];
            $product_name = $product_obj->getProductName();
            list($indicator, $compare_options) = explode("-", str_replace("Report", "Graph", str_replace("Province", "Provincial", $title)));
            $graph_caption = $indicator . " of " . $product_name;
            if ($optvals == 1) {
                $graph_subcaption = $compare_options;
            } elseif ($optvals == 2) {
                $graph_subcaption = "Provincial " . $compare_options . " for " . $location_name;
            } elseif ($optvals == 3) {
                $graph_subcaption = "District " . $compare_options . " for " . $location_name;
            } elseif ($optvals == 7) {
                $graph_subcaption = "" . $compare_options . " for " . $location_name . " of " . $product_name . " ( " . $year1 . ")";
            } elseif ($optvals == 8) {
                $graph_subcaption = "" . $compare_options . " for " . $province_name . "(" . $location_name . ") " . " of " . $product_name . " ( " . $year1 . ")";
            }
            if ($post['indicators'] == 'GMOS') {
                $y_text = "Months";
            } else {
                $y_text = "Doses";
            }
            if ($post['indicators'] == 'GCLOSINGFLD') {
                $indicator = 'Stock On Hand (UC)';
            } else if ($post['indicators'] == 'GCLOSING') {
                $indicator = 'Stock On Hand (District+Tehsil)';
            } else if ($post['indicators'] == 'GMOS') {
                $indicator = 'Month of Stock (EPI Centers)';
            }
            if ($optvals == 1) {
                $camp_options = "Year - National";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 2) {
                $camp_options = "Year - Provincial";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 3) {
                $camp_options = "Year - District";
                $sub_caption = $indicator . '→' . $camp_options . '→' . $loc_name;
            } else if ($optvals == 7) {
                $camp_options = "Geographical - Provinical";
                $sub_caption = $indicator . '→' . $camp_options;
            } else if ($optvals == 8) {
                $camp_options = "Geographical - District";
                $sub_caption = $indicator . '→' . $camp_options;
            }

            $xmlstore = "<chart exportEnabled='1' labelDisplay='rotate' slantLabels='1'  exportAction='Download' subCaption='" . $sub_caption . "' caption='" . $graph_subcaption . "' exportFileName='" . $title . " - " . date('Y-m-d H:i:s') . " - " . $location_name . " - " . $product_name . "' yAxisName='$y_text' numberSuffix='' showValues='1' formatNumberScale='0' theme='fint'>";
            $xmlstore .= "<categories>";
            for ($i = $months->getBeginMonth(); $i <= $months->getEndMonth(); $i++) {
                $month_name = $monthval[$i - 1];
                $xmlstore .= "<category label='$month_name' />";
                for ($j = 0; $j < sizeof($districts); $j++) {
                    $location_obj = new Model_Locations();
                    $location_obj->form_values['product_id'] = $districts[$j];
                    $loc_name = $location_obj->getLocationById();
                    $sql = "select " . str_replace("\$i", $i, $query->getReportDataSql()) . " as xyz  from dual ";
                    $sql = str_replace("\$year1", $year1, $sql);
                    $sql = str_replace("'\$products[\$k]'", "'" . $products[$k] . "'", $sql);
                    $sql = str_replace("\$seluser", 1, $sql);
                    $sql = str_replace("\$provinces[0]", $provinces, $sql);
                    $sql = str_replace("\$dists[\$j]", $districts[$j], $sql);

                    $str_sql = $this->_em_read->getConnection()->prepare($sql);
                    $str_sql->execute();
                    $row = $str_sql->fetchAll();
                    if (!empty($row)) {
                        $res = explode('*', $row[0]['xyz']);
                        $row_data = $res[$query->getReportDataPosition()] / 1;
                        $filedata1[$loc_name][$monthval[$i - 1]] = $row_data;
                    }
                }
            }
            $xmlstore .= "</categories>";
            foreach ($filedata1 as $key1 => $value1) {
                $xmlstore .= "<dataset seriesName='$key1'>";
                foreach ($value1 as $val2) {
                    $xmlstore .= "<set value='" . Round($val2, 2) . "' />";
                }
                $xmlstore .= "</dataset>";
            }
            $xmlstore .="</chart>";
            $xmlstore_array[] = $xmlstore;
        }
        return $xmlstore_array;
    }

    /**
     * Cold Chain Capacity Product
     * @param type $type
     * @return string
     */
    public function coldChainCapacityProduct($type) {
        $is_return = $type;
        if ($type == 2) {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = 3 OR AssetMainType.pk_id = 3 )
                        OR ( cold_chain.ccm_asset_type_id = 1 OR AssetMainType.pk_id = 1 ) )";
        } else {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = $type OR AssetMainType.pk_id = $type ) )";
        }
        $warehouse_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT
                        cold_chain.asset_id,
                        i2_.item_name AS item_name,
                         stakeholder_item_pack_sizes.item_pack_size_id,
                         cold_chain.pk_id as location_id,
                        round( Sum( ( p0_.quantity * pack_info.volum_per_vial ) / 1000 ) ) AS quantity,
                        round( Sum( p0_.quantity ) ) AS quantityvials, i2_.color
                FROM
                        placements AS p0_
                INNER JOIN stock_batch_warehouses AS sbw ON p0_.stock_batch_warehouse_id = sbw.pk_id
                INNER JOIN stock_batch AS s1_ ON sbw.stock_batch_id = s1_.pk_id
                INNER JOIN pack_info ON s1_.pack_info_id = pack_info.pk_id
                INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                INNER JOIN item_pack_sizes AS i2_ ON stakeholder_item_pack_sizes.item_pack_size_id = i2_.pk_id
                INNER JOIN placement_locations ON p0_.placement_location_id = placement_locations.pk_id
                INNER JOIN cold_chain ON placement_locations.location_id = cold_chain.pk_id
                INNER JOIN ccm_asset_types AS AssetSubtype ON cold_chain.ccm_asset_type_id = AssetSubtype.pk_id
                LEFT JOIN ccm_asset_types AS AssetMainType ON AssetSubtype.parent_id = AssetMainType.pk_id
                WHERE sbw.warehouse_id = $warehouse_id
                 $where AND i2_.item_category_id = 1
                GROUP BY cold_chain.asset_id, i2_.item_name
                HAVING quantity > 0
                ORDER BY cold_chain.asset_id,i2_.item_name ASC";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        $title = "";
        if ($is_return == 2) {
            return $result;
        }
        if ($type == 3) {
            $title = "+2-8C Cold Rooms Capacity (In Litres)";
        }
        if ($type == 1) {
            $title = "-20C Cold Rooms Capacity (In Litres)";
        }
        $number_prefix = "";
        $xmlstore = "<?xml version=\"1.0\"?>";
        $xmlstore .='<chart caption="' . $title . '" labelDisplay="rotate"  numberprefix="' . $number_prefix . '" yAxisName="No.of vials" showvalues="0" exportEnabled="1" rotateValues="1" formatNumberScale="0" theme="fint">';
        $data_arr = array();
        $items = array();
        $asset_id = array();
        foreach ($result as $row) {
            if (!in_array($row['item_name'], $items)) {
                $items[] = $row['item_name'];
            }if (!in_array($row['asset_id'], $asset_id)) {
                $asset_id[] = $row['asset_id'];
            }
        }
        foreach ($items as $item) {
            foreach ($asset_id as $asset) {
                $data_arr[$item][$asset]['quantity'] = '';
            }
        }
        foreach ($result as $row) {
            $data_arr[$row['item_name']][$row['asset_id']]['quantity'] = $row['quantity'];
            $data_arr[$row['item_name']]['color'] = $row['color'];
        }
        $dataset = "";
        $categories = '<categories>';
        foreach ($asset_id as $asset) {
            $categories .='<category label="' . $asset . '" />';
        }
        $categories .= '</categories>';
        foreach ($data_arr as $item => $sub) {
            $dataset .= '<dataset seriesname="' . $item . '" color="' . $data_arr[$item]['color'] . '" >';
            foreach ($sub as $val) {
                $dataset .= '<set color="' . $data_arr[$item]['color'] . '" value="' . ((!empty($val['quantity'])) ? $val['quantity'] : '') . '" />';
            }
            $dataset .='</dataset>';
        }
        $xmlstore .= $categories;
        $xmlstore .= $dataset;
        return $xmlstore .="</chart>";
    }

    /**
     * Cold Chain Capacity Vvm
     * @param type $type
     * @return string
     */
    public function coldChainCapacityVvm($type) {
        $is_return = $type;
        if ($type == 2) {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = 3 OR AssetMainType.pk_id = 3 )
                        OR ( cold_chain.ccm_asset_type_id = 1 OR AssetMainType.pk_id = 1 ) )";
        } else {
            $where = " AND ( ( cold_chain.ccm_asset_type_id = $type OR AssetMainType.pk_id = $type ) )";
        }
        $warehouse_id = $this->_identity->getWarehouseId();
        $str_sql = "SELECT
                        cold_chain.asset_id, i2_.item_name AS item_name,
                         s1_.item_pack_size_id, cold_chain.pk_id as location_id,
                         vvm_stages.pk_id as vvm_stage, vvm_stages.vvm_stage_value,
                        round( Sum( ( p0_.quantity * pack_info.volum_per_vial ) / 1000 ) ) AS quantity
                FROM placements AS p0_
                INNER JOIN stock_batch AS s1_ ON p0_.stock_batch_warehouse_id = s1_.pk_id
                INNER JOIN item_pack_sizes AS i2_ ON s1_.item_pack_size_id = i2_.pk_id
                INNER JOIN pack_info ON s1_.stakeholder_item_pack_size_id = pack_info.pk_id
                INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
                INNER JOIN placement_locations ON p0_.placement_location_id = placement_locations.pk_id
                INNER JOIN cold_chain ON placement_locations.location_id = cold_chain.pk_id
                INNER JOIN ccm_asset_types AS AssetSubtype ON cold_chain.ccm_asset_type_id = AssetSubtype.pk_id
                LEFT JOIN ccm_asset_types AS AssetMainType ON AssetSubtype.parent_id = AssetMainType.pk_id
                INNER JOIN vvm_stages ON p0_.vvm_stage = vvm_stages.pk_id
                WHERE
                        s1_.warehouse_id = $warehouse_id
                 $where AND i2_.item_category_id = 1
                GROUP BY p0_.vvm_stage, i2_.item_name
                HAVING quantity > 0
                ORDER BY p0_.vvm_stage,i2_.item_name ASC";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        if ($is_return == 2) {
            return $result;
        }
        if ($type == 3) {
            $title = "+2-8C Cold Rooms Capacity (In Litres)";
        }
        if ($type == 1) {
            $title = "-20C Cold Rooms Capacity (In Litres)";
        }
        $number_prefix = "";
        $xmlstore = "<?xml version=\"1.0\"?>";
        $xmlstore .='<chart caption="' . $title . '" labelDisplay="rotate"  numberprefix="' . $number_prefix . '" showvalues="0" exportEnabled="1" rotateValues="1" formatNumberScale="0" theme="fint">';
        $data_arr = array();
        $vvm_stage = array();
        $item_name = array();
        foreach ($result as $row) {
            if (!in_array($row['vvm_stage_value'], $vvm_stage)) {
                $vvm_stage[] = $row['vvm_stage_value'];
            }if (!in_array($row['item_name'], $item_name)) {
                $item_name[] = $row['item_name'];
            }
        }
        foreach ($vvm_stage as $vvm) {
            foreach ($item_name as $items) {
                $data_arr[$vvm][$items]['quantity'] = '';
            }
        }
        foreach ($result as $row) {
            $data_arr[$row['vvm_stage_value']][$row['item_name']]['quantity'] = $row['quantity'];
        }
        $dataset = "";
        $categories = '<categories>';
        foreach ($item_name as $item) {

            $categories .='<category label="' . $item . '" />';
        }
        $categories .= '</categories>';
        foreach ($data_arr as $vvm => $sub) {
            $dataset .= '<dataset seriesname="VVM ' . $vvm . '" >';
            foreach ($sub as $key => $val) {
                $dataset .= '<set value="' . $data_arr[$vvm][$key]['quantity'] . '" />';
            }
            $dataset .='</dataset>';
        }
        $xmlstore .= $categories;
        $xmlstore .= $dataset;
        return $xmlstore .="</chart>";
    }

    /**
     * ContributionBreakUps
     * @param type $type
     * @return string
     */
    public function contributionBreakup() {
        $year_to = $this->form_values['to_date'];
        if (empty($this->form_values['wh_id'])) {
            $wh_id = 1;
        } else {
            $wh_id = $this->form_values['wh_id'];
        }
        $str_sql = "SELECT
            Sum(stock_detail.quantity) AS qty, warehouses.warehouse_name,
            warehouses.pk_id, stock_master.stakeholder_activity_id,
            stakeholder_activities.activity
            FROM stock_master
            INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
            INNER JOIN warehouses ON stock_master.from_warehouse_id = warehouses.pk_id
            INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
            INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
            INNER JOIN stock_batch ON stock_batch_warehouses.stock_batch_id = stock_batch.pk_id
            INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
            INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
            INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
            INNER JOIN stakeholder_activities ON stock_master.stakeholder_activity_id = stakeholder_activities.pk_id
            WHERE stock_master.to_warehouse_id = 159 AND warehouses.pk_id = $wh_id
            AND stakeholders.stakeholder_type_id = 2
            AND YEAR ( stock_master.transaction_date ) = $year_to
            AND item_pack_sizes.item_category_id = 1
            GROUP BY stock_master.stakeholder_activity_id ";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        $warehouse_name = $result[0]['warehouse_name'];
        $xmlstore = "<chart  exportEnabled='1' exportAction='Download' caption='$warehouse_name Contribution Breakup - Year $year_to' exportFileName='$warehouse_name Contribution Breakup - Year $year_to'  showValues='1' formatNumberScale='0' theme='fint' labelDisplay='rotate' slantLabels='1' numberSuffix=''>";
        foreach ($result as $data) {
            $xmlstore .= "<set label='$data[activity]' value='" . round($data['qty'], 1) . "' color='#2D9CF4' link=\"JavaScript:showSubGraphs('" . $data['pk_id'] . "');\" />";
        }
        return $xmlstore .="</chart>";
    }

    /**
     * Product wise Contribution
     *
     * @param type $type
     * @return string
     */
    public function productWiseContribution() {
        $year_to = $this->form_values['to_date'];
        if (empty($this->form_values['wh_id'])) {
            $wh_id = 1;
        } else {
            $wh_id = $this->form_values['wh_id'];
        }
        $str_sql = "SELECT
        Sum(stock_detail.quantity) AS qty, warehouses.warehouse_name, warehouses.pk_id,
        stock_master.stakeholder_activity_id, item_pack_sizes.item_name
        FROM stock_master
        INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
        INNER JOIN warehouses ON stock_master.from_warehouse_id = warehouses.pk_id
        INNER JOIN locations ON  warehouses.province_id = locations.pk_id
        INNER JOIN stakeholders ON warehouses.stakeholder_office_id = stakeholders.pk_id
        INNER JOIN stock_batch_warehouses ON stock_detail.stock_batch_warehouse_id = stock_batch_warehouses.pk_id
        INNER JOIN stock_batch ON stock_batch_warehouses.stock_batch_id = stock_batch.pk_id
        INNER JOIN pack_info ON stock_batch.pack_info_id = pack_info.pk_id
        INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
        INNER JOIN item_pack_sizes ON stakeholder_item_pack_sizes.item_pack_size_id = item_pack_sizes.pk_id
        INNER JOIN stakeholder_activities ON stock_master.stakeholder_activity_id = stakeholder_activities.pk_id
        WHERE stock_master.to_warehouse_id = 159
        AND warehouses.pk_id = $wh_id AND stakeholders.stakeholder_type_id = 2
        AND YEAR ( stock_master.transaction_date ) = $year_to
        AND item_pack_sizes.item_category_id = 1
        GROUP BY item_pack_sizes.pk_id";
        $rec = $this->_em_read->getConnection()->prepare($str_sql);
        $rec->execute();
        $result = $rec->fetchAll();
        $warhouse_name = $result[0]['warehouse_name'];
        $xmlstore = "<chart  exportEnabled='1' exportAction='Download' caption='$warhouse_name Product wise Contribution - Year $year_to' exportFileName='$warhouse_name Product wise Contribution - Year $year_to'  showValues='1' formatNumberScale='0' theme='fint' labelDisplay='rotate' slantLabels='1' numberSuffix=''>";
        foreach ($result as $data) {
            $xmlstore .= "<set label='$data[item_name]' value='" . round($data['qty'], 1) . "' color='#2D9CF4' link=\"JavaScript:showSubGraphs('" . $data['pk_id'] . "');\" />";
        }
        return $xmlstore .="</chart>";
    }

}
