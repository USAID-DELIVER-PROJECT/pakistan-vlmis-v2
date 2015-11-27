<?php

class Zend_View_Helper_LoadLast3Months2 extends Zend_View_Helper_Abstract {

    public function loadLast3Months2() {
        return $this;
    }

    public function loadReportedMonths($wh_id, $loc_id, $update = '') {

        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id, 'loc_id' => $loc_id);

        if (isset($update) && !empty($update)) {
            $result = $reports->last3monthsUpdate2();
        } else {
            // $result = $reports->last3months();
            $result = $reports->last3months2();
        }

        return $result;
    }

    public function loadLastReportedDate($wh_id) {
        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id);

        $max_date = $reports->getLastCreatedDate2();
        //echo $max_date;
        if (!empty($max_date)) {
            return date("d/m/Y", strtotime($max_date));
        } else {
            return '-';
        }
    }

    public function loadLogMonths($wh_id, $loc_id, $update = '') {

        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id, 'loc_id' => $loc_id);

        if (isset($update) && !empty($update)) {
            $result = $reports->last3monthsLogUpdate2();
        } else {
            $result = $reports->lastLog3months2();
        }

        return $result;
    }

    public function loadLastLogReportedDate($wh_id) {
        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id);

        $max_date = $reports->getLastLogCreatedDate2();
        //echo $max_date;
        if (!empty($max_date)) {
            return date("d/m/Y", strtotime($max_date));
        } else {
            return '-';
        }
    }

    public function getWarehouseNamesAssetTehsilStatus($wh_id) {


        $querypro = "SELECT
                            w.pk_id,
                            w.warehouse_name,
                            MAX(csh.status_date) as status_date
                    FROM
                            warehouses w
                    LEFT JOIN cold_chain c ON c.warehouse_id = w.pk_id
                    LEFT JOIN ccm_status_history csh ON c.ccm_status_history_id = csh.pk_id
                    INNER JOIN warehouse_users wu ON w.pk_id = wu.warehouse_id
                    WHERE
                            wu.warehouse_id = $wh_id
                            and w.status = 1
                    GROUP BY w.warehouse_name";
        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        $result = $row->fetchAll();
        $max_date = $result['0']['status_date'];
        if (!empty($max_date)) {
            return date("d/m/Y", strtotime($max_date));
        } else {
            return '-';
        }
    }

}

?>