<?php

class Zend_View_Helper_LoadLast3Months extends Zend_View_Helper_Abstract {

    public function loadLast3Months() {
        return $this;
    }

    public function loadReportedMonths($wh_id, $loc_id, $update = '') {

        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id, 'loc_id' => $loc_id);

        if (isset($update) && !empty($update)) {
            $result = $reports->last3monthsUpdate();
        } else {
            $result = $reports->last3months();
        }

        return $result;
    }

    public function loadLastReportedDate($wh_id) {
        $reports = new Model_Reports();
        $reports->form_values = array("wh_id" => $wh_id);

        $max_date = $reports->getLastCreatedDate();
        //echo $max_date;
        if (!empty($max_date)) {
            return date("d/m/Y", strtotime($max_date));
        } else {
            return '-';
        }
    }

}

?>