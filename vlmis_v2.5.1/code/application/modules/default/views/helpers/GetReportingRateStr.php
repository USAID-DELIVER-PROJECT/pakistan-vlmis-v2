<?php

class Zend_View_Helper_GetReportingRateStr extends Zend_View_Helper_Abstract {

   public function getReportingRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $conn = Zend_Registry::get("conn");
        $row = $conn->execute("SELECT REPgetReportingRateStr('" . $in_type . "'," . $in_month . "," . $in_year . ",'" . $in_item . "','" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        return $row;
    }

}

?>