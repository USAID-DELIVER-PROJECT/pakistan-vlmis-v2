<?php

class Zend_View_Helper_GetAvailabilityRateStr extends Zend_View_Helper_Abstract {

    function getAvailabilityRateStr($in_type, $in_month, $in_year, $in_item, $in_WF, $in_skt, $in_prov, $in_dist) {
        $conn = Zend_Registry::get("conn");
        $row = $conn->execute("SELECT REPgetAvailabilityRateStr('" . $in_type . "'," . $in_month . "," . $in_year . ",'" . $in_item . "','" . $in_WF . "'," . $in_skt . "," . $in_prov . "," . $in_dist . ") As Rate from DUAL");
        return $row;
    }

}

?>