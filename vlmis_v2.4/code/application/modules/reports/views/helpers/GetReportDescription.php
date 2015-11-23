<?php

class Zend_View_Helper_GetReportDescription extends Zend_View_Helper_Abstract {

    function getReportDescription($geo_level_id, $item_id, $id, $check = false) {
        if ($id == '') {
            $r_val = '0';
        } else {
            $r_val = '1';
        }
        if ($check == true) {
            return $r_val;
        }
        if ($id == 'SNASUM') {

            $item_id = 26;
        }

        if ($id == 'SNASUM' || $id == 'SPROVINCEREPORT' || $id == 'SDISTRICTREPORT' || $id == 'TEHSILREPORT' || $id == 'UCREPORT') {

            $querypro = "SELECT Distinct
			m.long_term,m.color_code,m.scale_start,m.scale_end
			FROM
			mos_scale m
			
			WHERE
			m.item_id = '" . $item_id . "'
                        AND m.geo_level_id= '" . $geo_level_id . "'
                        AND m.stakeholder_id=1
                        Order BY m.pk_id ASC";


            $this->_em = Zend_Registry::get('doctrine');
            $row = $this->_em->getConnection()->prepare($querypro);

            $row->execute();



            $rows = $row->fetchAll();


            //echo "<table>";
            //echo "<tr><td style='font-size:10px;' width='86%'>Unknown</td>";
            //echo "<td><div style='display:inline-block;width:10px; height:10px; background-color:#000;margin-left:5px;'></div></td></tr>";
            ?>
            <ul class="nav navbar-nav report-tab">
                <li>
                    <span>MOS Legends:</span>
                </li>
                <li>
                    Unknown
                    <div style='display:inline-block;width:10px; height:11px; background-color:#000000;margin-left:5px;'></div>
                </li>
                <?php
                $i = 1;
                foreach ($rows as $row) {
                    $scale_end = $row['scale_end'] == 99999 ? "infinity" : $row['scale_end'];
                    echo "<li>" . $row['long_term'] . " (" . $row['scale_start'] . "-" . $scale_end . " months)";
                    echo "<div style='display:inline-block;width:10px; height:11px; background-color:" . $row['color_code'] . ";margin-left:5px;'></div></li>
			";
                    $i++;
                }
                //echo "</table>";
                echo "</ul>";
            }
        }

    }
    