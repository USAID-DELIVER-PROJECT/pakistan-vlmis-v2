<?php

/**
 * Model_Reports
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for Reports
 */
class Model_Reports extends Model_Base {

    /**
     * $wh_id
     * @var type 
     */
    public $wh_id;

    /**
     * $loc_id
     * @var type 
     */
    public $loc_id;

    /**
     * Get All Months
     * 
     * @return type
     */
    function getAllMonths() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DATE_FORMAT(reporting_start_date,'%Y-%m-%d') as MaxDate")
                ->from("Model_HfDataMaster")
                ->where("pk_id =  $this->wh_id")
                ->groupBy("MaxDate")
                ->orderBy("MaxDate ASC");
        return $str_sql->fetchArray();
    }

    /**
     * Get All Months 2
     * 
     * @return type
     */
    function getAllMonths2() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DATE_FORMAT(reporting_start_date,'%Y-%m-%d') as MaxDate")
                ->from("Model_HfDataMaster")
                ->where("pk_id =  $this->wh_id")
                ->groupBy("MaxDate")
                ->orderBy("MaxDate ASC");
        return $str_sql->fetchArray();
    }

    /**
     * Get All Log Months 2
     * 
     * @return type
     */
    function getAllLogMonths2() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("DATE_FORMAT(vaccinationDate,'%Y-%m-%d') as MaxDate")
                ->from("Model_LogBook")
                ->where("pk_id =  $this->wh_id")
                ->groupBy("MaxDate")
                ->orderBy("MaxDate ASC");
        return $str_sql->fetchArray();
    }

    /**
     * Get Last Report Date
     * 
     * @return type
     */
    public function getLastReportDate() {
        if ($this->form_values['wh_id'] != 'null') {
            $d = Zend_Registry::get('first_month');

            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.reportingStartDate) > 0,max(wd.reportingStartDate), 0) as MaxDate")
                    ->from("HfDataMaster", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);
            $row = $str_sql->getQuery()->getResult();

            if ($row[0]['MaxDate'] == 0) {
                return $d;
            } else {
                return $row[0]['MaxDate'];
            }
        }
    }

    /**
     * Get Last Report Date 2
     * 
     * @return type
     */
    public function getLastReportDate2() {
        if ($this->form_values['wh_id'] != 'null') {

            $starting_date = $this->getStartingDate();


            if ($starting_date == '2015-01-01 00:00:00' || $starting_date == '0000-00-00 00:00:00' || $starting_date == '') {
                $d = '2015-04-01';
            } else {
                $d = $starting_date;
            }

            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.reportingStartDate) > 0,max(wd.reportingStartDate), 0) as MaxDate")
                    ->from("HfDataMaster", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);

            $row = $str_sql->getQuery()->getResult();

            if ($row[0]['MaxDate'] == 0) {
                return $d;
            } else {
                return $row[0]['MaxDate'];
            }
        }
    }

    /**
     * Get Starting Date
     * 
     * @return type
     */
    public function getStartingDate() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("w.startingOn as starting_date")
                ->from("Warehouses", "w")
                ->where("w.pkId = " . $this->form_values['wh_id']);

        $row = $str_sql->getQuery()->getResult();


        return App_Controller_Functions::dateToDbFormat($row[0]['starting_date']);
    }

    /**
     * Get Log Last Report Date 2
     * 
     * @return string
     */
    public function getLogLastReportDate2() {
        if ($this->form_values['wh_id'] != 'null') {
            $d = '2015-04-01';

            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.vaccinationDate) > 0,max(wd.vaccinationDate), 0) as MaxDate")
                    ->from("LogBook", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);
            $row = $str_sql->getQuery()->getResult();

            if ($row[0]['MaxDate'] == 0) {
                return $d;
            } else {
                return $row[0]['MaxDate'];
            }
        }
    }

    /**
     * Get Last Created Date
     * 
     * @return boolean
     */
    public function getLastCreatedDate() {
        if ($this->form_values['wh_id'] != 'null') {
            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.createdDate) > 0,max(wd.createdDate), 0) as MaxDate")
                    ->from("HfDataMaster", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);

            $row = $str_sql->getQuery()->getResult();
            if ($row[0]['MaxDate'] != 0) {
                return $row[0]['MaxDate'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get Last Created Date Im
     * 
     * @return boolean
     */
    public function getLastCreatedDateIm() {
        if ($this->form_values['wh_id'] != 'null') {
            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.transactionDate) > 0,max(wd.transactionDate), 0) as MaxDate")
                    ->from("StockDetail", "sd")
                    ->join("sd.stockMaster", "wd")
                    ->join("sd.stockBatchWarehouse", "sbw")
                    ->where("sbw.warehouse = " . $this->form_values['wh_id']);

            $row = $str_sql->getQuery()->getResult();
            if ($row[0]['MaxDate'] != 0) {
                return $row[0]['MaxDate'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get Last Created Date 2
     * 
     * @return boolean
     */
    public function getLastCreatedDate2() {
        if ($this->form_values['wh_id'] != 'null') {
            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.createdDate) > 0,max(wd.createdDate), 0) as MaxDate")
                    ->from("HfDataMaster", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);
            $row = $str_sql->getQuery()->getResult();
            if ($row[0]['MaxDate'] != 0) {
                return $row[0]['MaxDate'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get Last Log Created Date 2
     * 
     */
    public function getLastLogCreatedDate2() {
        if ($this->form_values['wh_id'] != 'null') {
            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.createdDate) > 0,max(wd.createdDate), 0) as MaxDate")
                    ->from("LogBook", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);
            $row = $str_sql->getQuery()->getResult();
            if ($row[0]['MaxDate'] != 0) {
                return $row[0]['MaxDate'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get Last Modified Date
     * 
     * @return boolean
     */
    public function getLastModifiedDate() {
        if ($this->form_values['wh_id'] != 'null') {
            $str_sql = $this->_em->createQueryBuilder()
                    ->select("IF(max(wd.modifiedDate) > 0,max(wd.modifiedDate), 0) as MaxDate")
                    ->from("HfDataMaster", "wd")
                    ->where("wd.warehouse = " . $this->form_values['wh_id']);
            $row = $str_sql->getQuery()->getResult();

            if ($row[0]['MaxDate'] != 0) {
                return $row[0]['MaxDate'];
            } else {
                return false;
            }
        }
    }

    /**
     * Get Pending Report Month
     * 
     * @return string
     */
    public function getPendingReportMonth() {
        $LRM = $this->GetLastReportDate();
        $today = date("Y-m-01");
        $today_dt = new DateTime($today);
        $new_month_dt = new DateTime($LRM);

        if ($new_month_dt < $today_dt) {
            return $this->addDate($LRM, 1)->format('Y-m-d');
        } else {
            return "";
        }
    }

    /**
     * Get Last 3 Months
     * 
     * @return type
     */
    public function getLast3Months() {

        $warehouse = $this->_em->getRepository("Warehouses")->find($this->form_values['wh_id']);

        $str_sql = $this->_em->createQueryBuilder()
                ->select("DATE_FORMAT(wd.reportingStartDate,'%Y-%m-%d') as MaxDate")
                ->from("HfDataMaster", "wd")
                ->where("wd.warehouse =  " . $this->form_values['wh_id']);

        $from_date = $warehouse->getFromEdit();
        $starting_date = $warehouse->getStartingOn();
        $to_date = new DateTime("NOW");

        if (isset($starting_date) && checkdate($starting_date->format("m"), $starting_date->format("d"), $starting_date->format("Y"))) {
            $diff1 = $from_date->diff($starting_date);
            if ($diff1->format('%R%a') < 0) {
                $from_date = $starting_date;
            }
        }

        if (isset($from_date) && $from_date != null && $from_date != '0000-00-00 00:00:00') {
            $str_sql->andWhere("DATE_FORMAT(wd.reportingStartDate,'%Y-%m') BETWEEN '" . $from_date->format("Y-m") . "' AND '" . $to_date->format("Y-m") . "'");
        }

        $str_sql->groupBy("wd.reportingStartDate")
                ->orderBy("wd.reportingStartDate", "DESC");

        if (isset($from_date) && checkdate($from_date->format("m"), $from_date->format("d"), $from_date->format("Y"))) {
            $row = $str_sql->getQuery()->getResult();
        } else {
            $row = $str_sql->getQuery()->setMaxResults(3)->getResult();
        }

        return $row;
    }

    /**
     * Get Last 3 Months 2
     * 
     * @return type
     */
    public function getLast3Months2() {

        $warehouse = $this->_em->getRepository("Warehouses")->find($this->form_values['wh_id']);

        $str_sql = $this->_em->createQueryBuilder()
                ->select("DATE_FORMAT(wd.reportingStartDate,'%Y-%m-%d') as MaxDate")
                ->from("HfDataMaster", "wd")
                ->where("wd.warehouse =  " . $this->form_values['wh_id']);

        $from_date = $warehouse->getFromEdit();
        $starting_date = $warehouse->getStartingOn();
        $to_date = new DateTime("NOW");

        if (isset($starting_date) && checkdate($starting_date->format("m"), $starting_date->format("d"), $starting_date->format("Y"))) {
            $diff1 = $from_date->diff($starting_date);
            if ($diff1->format('%R%a') < 0) {
                $from_date = $starting_date;
            }
        }


        if (isset($from_date) && $from_date != null && $from_date != '0000-00-00 00:00:00') {
            $str_sql->andWhere("DATE_FORMAT(wd.reportingStartDate,'%Y-%m') BETWEEN '" . $from_date->format("Y-m") . "' AND '" . $to_date->format("Y-m") . "'");
        }

        $str_sql->groupBy("wd.reportingStartDate")
                ->orderBy("wd.reportingStartDate", "DESC");
        if (isset($from_date) && checkdate($from_date->format("m"), $from_date->format("d"), $from_date->format("Y"))) {
            $row = $str_sql->getQuery()->getResult();
        } else {
            $row = $str_sql->getQuery()->setMaxResults(6)->getResult();
        }

        return $row;
    }

    /**
     * Get Log Last 3 Months 2
     * 
     * @return type
     */
    public function getLogLast3Months2() {

        $warehouse_id = $this->form_values['wh_id'];

        $str_qry = "SELECT
                   DATE_FORMAT(wd.vaccination_date,'%Y-%m-%d') as MaxDate
                    FROM
                    log_book as wd
                    where
                    wd.warehouse_id =  $warehouse_id
                    GROUP BY DATE_FORMAT(wd.vaccination_date,'%Y-%m')
                    ORDER BY DATE_FORMAT(wd.vaccination_date,'%Y-%m') DESC"
                . " LIMIT 3";




        $this->_em = Zend_Registry::get('doctrine');
        $row1 = $this->_em->getConnection()->prepare($str_qry);
        $row1->execute();


        return $row1->fetchAll();
    }

    /**
     * Get Previous Month Report Date
     * 
     * @param type $thismonth
     * @return type
     */
    public function getPreviousMonthReportDate($thismonth) {
        $new_date_temp = $this->addDate($thismonth, - 1);
        return $new_date_temp->format('Y-m-d');
    }

    /**
     * AddDate
     * 
     * @param type $date_str
     * @param type $months
     * @return \DateTime
     */
    public function addDate($date_str, $months) {
        $date = new DateTime($date_str);
        $start_day = $date->format('j');

        $date->modify("+{$months} month");
        $end_day = $date->format('j');

        if ($start_day != $end_day) {
            $date->modify('last day of last month');
        }
        return $date;
    }

    /**
     * Last 3 months Update
     * 
     */
    public function last3monthsUpdate() {
        $month_to_show = array('2013-05', '2013-06', '2013-07', '2013-08', '2013-09', '2013-10', '2013-11', '2013-12');

        $wh_Id = $this->form_values['wh_id'];
        $loc_Id = $this->form_values['loc_id'];
        // Show last three months for which date is entered
        $all_months = $this->getAllMonths();
        echo '<p>';
        $allmonths = '';
        for ($i = 0; $i < sizeof($all_months); $i++) {
            $l3m_dt = new DateTime($all_months[$i]);
            if (isset($_SESSION['dataentry_date']) && ($_SESSION['dataentry_date'] == $l3m_dt->format('Y-m-d'))) {
                $style = 'font-weight:bold';
            }
            if ($l3m_dt->format('Y-m-d') >= '2013-05-01') {
                $monthArr[] = $l3m_dt->format('Y-m');
                $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $l3m_dt->format('Y-m-') . '01|0');
                $allmonths .= "<a style='" . $style . "' href=monthly-consumption?do=" . $do_3months . ">" . $l3m_dt->format('M-y') . "</a> | ";
            }
        }

        $arrDiff = array_diff($month_to_show, $monthArr);

        foreach ($arrDiff as $val) {
            $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $val . '-01|1');
            $allmonths .= "<a style='" . $style . "' href=monthly-consumption?do=" . $do_3months . ">" . date('M-y', strtotime($val . '-01')) . "</a> | ";
        }

        echo substr($allmonths, 0, -2);
        echo '</p>';
    }

    /**
     * Last 3 months Update 2
     * 
     */
    public function last3monthsUpdate2() {
        $month_to_show = array('2013-05', '2013-06', '2013-07', '2013-08', '2013-09', '2013-10', '2013-11', '2013-12');

        $wh_Id = $this->form_values['wh_id'];
        $loc_Id = $this->form_values['loc_id'];
        // Show last three months for which date is entered
        $all_months = $this->getAllMonths2();
        echo '<p>';
        $allmonths = '';
        for ($i = 0; $i < sizeof($all_months); $i++) {
            $l3m_dt = new DateTime($all_months[$i]);
            if (isset($_SESSION['dataentry_date']) && ($_SESSION['dataentry_date'] == $l3m_dt->format('Y-m-d'))) {
                $style = 'font-weight:bold';
            }
            if ($l3m_dt->format('Y-m-d') >= '2013-05-01') {
                $monthArr[] = $l3m_dt->format('Y-m');
                $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $l3m_dt->format('Y-m-') . '01|0');
                $allmonths .= "<a style='" . $style . "' href=monthly-consumption2?do=" . $do_3months . ">" . $l3m_dt->format('M-y') . "</a> | ";
            }
        }

        $arrDiff = array_diff($month_to_show, $monthArr);

        foreach ($arrDiff as $val) {
            $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $val . '-01|1');
            $allmonths .= "<a style='" . $style . "' href=monthly-consumption2?do=" . $do_3months . ">" . date('M-y', strtotime($val . '-01')) . "</a> | ";
        }

        echo substr($allmonths, 0, -2);

        echo '</p>';
    }

    /**
     * Last 3 months Log Update 2
     * 
     */
    public function last3monthsLogUpdate2() {
        $month_to_show = array('2013-05', '2013-06', '2013-07', '2013-08', '2013-09', '2013-10', '2013-11', '2013-12');

        $wh_Id = $this->form_values['wh_id'];
        $loc_Id = $this->form_values['loc_id'];
        // Show last three months for which date is entered
        $all_months = $this->getAllLogMonths2();
        echo '<p>';
        $allmonths = '';
        for ($i = 0; $i < sizeof($all_months); $i++) {
            $l3m_dt = new DateTime($all_months[$i]);
            if (isset($_SESSION['dataentry_date']) && ($_SESSION['dataentry_date'] == $l3m_dt->format('Y-m-d'))) {
                $style = 'font-weight:bold';
            }
            if ($l3m_dt->format('Y-m-d') >= '2013-05-01') {
                $monthArr[] = $l3m_dt->format('Y-m');
                $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $l3m_dt->format('Y-m-') . '01|0');
                $allmonths .= "<a style='" . $style . "' href=log-book?do=" . $do_3months . ">" . $l3m_dt->format('M-y') . "</a> | ";
            }
        }

        $arrDiff = array_diff($month_to_show, $monthArr);

        foreach ($arrDiff as $val) {
            $do_3months = "Z" . base64_encode($wh_Id . '|' . $loc_Id . '|' . $val . '-01|1');
            $allmonths .= "<a style='" . $style . "' href=log-book?do=" . $do_3months . ">" . date('M-y', strtotime($val . '-01')) . "</a> | ";
        }

        echo substr($allmonths, 0, -2);

        echo '</p>';
    }

    /**
     * Last 3 months
     * 
     */
    public function last3months() {
        $wh_Id = $this->form_values['wh_id'];

        $last_report_date = $this->getLastReportDate();

        $last_3months = $this->getLast3Months();

        for ($i = 0; $i < sizeof($last_3months); $i++) {
            $L3M_dt = new DateTime($last_3months[$i]['MaxDate']);
            $dataMonthArr[] = $L3M_dt->format('Y-m-d');
        }

        if (isset($dataMonthArr)) {
            foreach ($dataMonthArr as $mon) {
                $L3M_dt = new DateTime($mon);
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $mon . '|0');
                $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_Id, 'reportingStartDate' => $L3M_dt->format("Y-m-d")));
                if (count($rows) > 0) {
                    $months[] = "<a href=monthly-consumption?do=" . $do3Months . " class='btn btn-xs green'>" . $L3M_dt->format('M-y') . " (Draft)</a>";
                } else {
                    $months[] = "<a href=monthly-consumption?do=" . $do3Months . " class='btn btn-xs green'>" . $L3M_dt->format('M-y') . "</a>";
                }
            }
            $months = array_reverse($months);
        }

        $L3M_dt = new DateTime("last day of previous month");
        if (substr($last_report_date, 0, 7) < $L3M_dt->format('Y-m')) {
            $L3M_dt = new DateTime($last_report_date . "-01");
            $L3M_dt->modify("+1 month");

            // Check if exist in draft
            $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_Id, 'reportingStartDate' => $L3M_dt->format("Y-m-d")));
            // It should be 0 in case of new report as well
            if (count($rows) > 0) {
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $L3M_dt->format("Y-m-d") . '|0');
                $months[] = "<a href=monthly-consumption?do=" . $do3Months . " class='btn btn-xs blue' >Add " . $L3M_dt->format('M-y') . " Report (Draft)</a>";
            } else {
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $L3M_dt->format("Y-m-d") . '|1');
                $months[] = "<a href=monthly-consumption?do=" . $do3Months . " class='btn btn-xs blue' >Add " . $L3M_dt->format('M-y') . " Report</a>";
            }
        }
        echo implode('', $months);
    }

    /**
     * Last 3 months 2
     * 
     */
    public function last3months2() {
        $wh_Id = $this->form_values['wh_id'];

        $last_report_date = $this->getLastReportDate2();

        $last_3months = $this->getLast3Months2();
        for ($i = 0; $i < sizeof($last_3months); $i++) {
            $L3M_dt = new DateTime($last_3months[$i]['MaxDate']);
            $dataMonthArr[] = $L3M_dt->format('Y-m-d');
        }

        if (isset($dataMonthArr)) {
            foreach ($dataMonthArr as $mon) {

                $L3M_dt = new DateTime($mon);
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $mon . '|0');
                $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_Id, 'reportingStartDate' => $L3M_dt->format("Y-m-d")));
                if (count($rows) > 0) {
                    $months[] = "<a href=monthly-consumption2?do=" . $do3Months . " class='btn btn-xs green'>" . $L3M_dt->format('M-y') . " (Draft)</a>";
                } else {
                    $months[] = "<a href=monthly-consumption2?do=" . $do3Months . " class='btn btn-xs green'>" . $L3M_dt->format('M-y') . "</a>";
                }
            }
            $months = array_reverse($months);
        }

        $L3M_dt = new DateTime("last day of previous month");
        if (substr($last_report_date, 0, 7) < $L3M_dt->format('Y-m')) {
            $L3M_dt = new DateTime($last_report_date . "-01");
            $L3M_dt->modify("+1 month");
            // Check if exist in draft
            $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_Id, 'reportingStartDate' => $L3M_dt->format("Y-m-d")));
            // It should be 0 in case of new report as well
            if (count($rows) > 0) {
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $L3M_dt->format("Y-m-d") . '|0');
                $months[] = "<a href=monthly-consumption2?do=" . $do3Months . " class='btn btn-xs blue' >Add " . $L3M_dt->format('M-y') . " Report (Draft)</a>";
            } else {
                $do3Months = "Z" . base64_encode($wh_Id . '|' . $L3M_dt->format("Y-m-d") . '|1');
                $months[] = "<a href=monthly-consumption2?do=" . $do3Months . " class='btn btn-xs blue' >Add " . $L3M_dt->format('M-y') . " Report</a>";
            }
        }
        echo implode('', $months);
    }

    /**
     * Last Log 3 months 2
     * 
     */
    public function lastLog3months2() {
        $wh_Id = $this->form_values['wh_id'];

        $end_date = date('Y') . '-' . date('m') . '-01';

        $end_date = date('Y-m-d', strtotime("-1 days", strtotime("+1 month", strtotime($end_date))));

        $start_date = '2015-05-01';
        // Start date and End date
        $begin = new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($begin, $interval, $end);
        foreach ($period as $date) {

            $log_book = new Model_LogBook();
            $rows = $log_book->getLogBook($wh_Id, $date->format("Y-m"));
            if (count($rows) > 0) {

                $do3Months = "Z" . base64_encode($wh_Id . '|' . $date->format("Y-m-d") . '|0');
                $months[] = "<a href=log-book-add?do=" . $do3Months . " class='btn btn-xs green'>" . $date->format('M-y') . "</a>";
            } else {

                $do3Months = "Z" . base64_encode($wh_Id . '|' . $date->format("Y-m-d") . '|1');
                $months[] = "<a href=log-book-add?do=" . $do3Months . " class='btn btn-xs blue' >Add " . $date->format('M-y') . " </a>";
            }
        }

        echo implode('', $months);
    }

    /**
     * Get Max Report Date
     * 
     * @return type
     */
    public function getMaxReportDate() {
        $str_sql = "SELECT IFNULL(month(MAX(reporting_start_date)),month(SYSDATE())) AS report_month , IFNULL(year(MAX(reporting_start_date)),year(SYSDATE())) AS report_year FROM hf_data_master";
        $row = $this->_em->getConnection()->prepare($str_sql);
        $row->execute();
        return $row->fetchAll();
    }

    /**
     * GetIndicators
     * 
     * @return type
     */
    public function getIndicators() {
        $str_sql = $this->_em->createQueryBuilder()
                ->select("r.reportId, r.reportTitle")
                ->from("Reports", "r")
                ->where("r.reportType = 1");
        return $str_sql->getQuery()->getResult();
    }

}
