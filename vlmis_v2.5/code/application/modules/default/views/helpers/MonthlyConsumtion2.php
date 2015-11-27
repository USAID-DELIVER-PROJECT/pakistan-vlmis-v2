<?php

class Zend_View_Helper_MonthlyConsumtion2 extends Zend_View_Helper_Abstract {

    public function monthlyConsumtion2() {
        return $this;
    }

    public function monthlyConsumtion2Vaccines($wh_id, $prev_month_date, $pk_id, $age_group_id) {

        $this->_em = Zend_Registry::get('doctrine');
        $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_id, 'reportingStartDate' => $prev_month_date));

        if (count($rows) > 0) {
            $querypro = " SELECT w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate ,
                        w0_.created_date AS createdDate,
                        hf_data_detail_draft.pk_id,
                        hf_data_detail_draft.fixed_inside_uc_male,
                        hf_data_detail_draft.fixed_inside_uc_female,
                        hf_data_detail_draft.fixed_outside_uc_male,
                        hf_data_detail_draft.fixed_outside_uc_female,
                        hf_data_detail_draft.referal_male,
                        hf_data_detail_draft.referal_female,
                        hf_data_detail_draft.outreach_male,
                        hf_data_detail_draft.outreach_female,
                        hf_data_detail_draft.age_group_id,
                        hf_data_detail_draft.vaccine_schedule_id
                       
                       FROM
                               hf_data_master_draft w0_
                               
                        INNER JOIN hf_data_detail_draft ON w0_.pk_id = hf_data_detail_draft.hf_data_master_id
                       
                       WHERE
                               w0_.warehouse_id = $wh_id
                                   AND hf_data_detail_draft.age_group_id = '$age_group_id'
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = $pk_id";
        } else {
            $querypro = " SELECT w0_.pk_id AS pkId,
                        w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate,
                        w0_.created_date AS createdDate,
                        hf_data_detail.pk_id,
                        hf_data_detail.fixed_inside_uc_male,
                        hf_data_detail.fixed_inside_uc_female,
                        hf_data_detail.fixed_outside_uc_male,
                        hf_data_detail.fixed_outside_uc_female,
                        hf_data_detail.referal_male,
                        hf_data_detail.referal_female,
                        hf_data_detail.outreach_male,
                        hf_data_detail.outreach_female,
                        hf_data_detail.age_group_id,
                        hf_data_detail.vaccine_schedule_id
                        FROM
                        hf_data_master AS w0_
                        INNER JOIN hf_data_detail ON w0_.pk_id = hf_data_detail.hf_data_master_id
                        WHERE
                               w0_.warehouse_id = '$wh_id'
                                   AND hf_data_detail.age_group_id = '$age_group_id'
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = '$pk_id' ";
        }

        //   echo $querypro."<br>";


        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function monthlyConsumtion2VaccinesTt($wh_id, $prev_month_date, $pk_id) {

        $this->_em = Zend_Registry::get('doctrine');
        $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_id, 'reportingStartDate' => $prev_month_date));

        if (count($rows) > 0) {
            $querypro = " SELECT w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate,
                        hf_data_detail_draft.pk_id,
                        hf_data_detail_draft.pregnant_women,
                        hf_data_detail_draft.non_pregnant_women,
                        hf_data_detail_draft.age_group_id,
                        hf_data_detail_draft.vaccine_schedule_id
                       
                       FROM
                               hf_data_master_draft w0_
                        INNER JOIN hf_data_detail_draft ON w0_.pk_id = hf_data_detail_draft.hf_data_master_id        
                       WHERE
                               w0_.warehouse_id = $wh_id
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = $pk_id";
        } else {
            $querypro = " SELECT w0_.pk_id AS pkId,
                        w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate,
                        w0_.created_date AS createdDate,
                        hf_data_detail.pk_id,
                        hf_data_detail.pregnant_women,
                        hf_data_detail.non_pregnant_women,
                        hf_data_detail.age_group_id,
                        hf_data_detail.vaccine_schedule_id
                        FROM
                        hf_data_master AS w0_
                        INNER JOIN hf_data_detail ON w0_.pk_id = hf_data_detail.hf_data_master_id
                        WHERE
                               w0_.warehouse_id = '$wh_id'
                                  
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = '$pk_id' ";
        }

        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function monthlyConsumptionNonVaccinces($wh_id, $prev_month_date, $pk_id) {

        $this->_em = Zend_Registry::get('doctrine');
        $rows = $this->_em->getRepository('HfDataMasterDraft')->findBy(array('warehouse' => $wh_id, 'reportingStartDate' => $prev_month_date));

        if (count($rows) > 0) {
            $querypro = " SELECT w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate
                       
                       FROM
                               hf_data_master_draft w0_
                       WHERE
                               w0_.warehouse_id = $wh_id
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = $pk_id";
        } else {
            $querypro = " SELECT w0_.pk_id AS pkId,
                        w0_.opening_balance AS openingBalance,
                        w0_.received_balance AS receivedBalance,
                        w0_.issue_balance AS issueBalance,
                        w0_.closing_balance AS closingBalance,
                        w0_.wastages AS wastages,
                        w0_.vials_used AS vialsUsed,
                        w0_.adjustments AS adjustments,
                        w0_.reporting_start_date AS reportingStartDate,
                        w0_.created_date AS createdDate
                        FROM
                        hf_data_master AS w0_
                        
                        WHERE
                               w0_.warehouse_id = '$wh_id'
                                
           AND 
           DATE_FORMAT(w0_.reporting_start_date,'%Y-%m-%d') = '$prev_month_date'
           AND w0_.item_pack_size_id = '$pk_id' ";
        }

        // echo $querypro;


        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result[0];
    }

    public function monthlyConsumtion2Targets($wh_id, $prev_month_date) {

        $pov = explode('-', $prev_month_date);

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = " SELECT w0_.pk_id AS pkId,
                        w0_.children_live_birth,
                        w0_.surviving_children_0_11,
                        w0_.children_aged_12_23,
                        w0_.pregnant_women,
                        w0_.cbas
                        
                        FROM
                        hf_data_master AS w0_
                  
                        WHERE
                        w0_.warehouse_id = '$wh_id'
                        AND 
                       DATE_FORMAT(w0_.reporting_start_date,'%Y') = '$pov[0]' LIMIT 1 ";
//echo $querypro;
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result[0];
    }

    public function logBook($data_id) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = " SELECT w0_.pk_id AS pkId,
                        w0_.doses
                      FROM
                        log_book_item_doses AS w0_
             
                        WHERE
                         w0_.log_book_id =$data_id ";
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function logBookEdit($wh_id, $rpt_date) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
                    log_book.pk_id,
                    log_book.`name`,
                    log_book.father_name,
                    log_book.age,
                    log_book.contact,
                    log_book.address,
                    log_book.district_id,
                    log_book.union_council_id,
                    log_book.vaccination_date,
                    log_book.reffer_to,
                    log_book.remarks,
                    log_book.warehouse_id,
                    log_book.created_by,
                    log_book.created_date,
                    log_book.modified_date,
                    log_book.reporting_start_date
                    FROM
                    log_book
                    WHERE
                    log_book.warehouse_id='$wh_id' AND
                     DATE_FORMAT(log_book.vaccination_date,'%Y-%m')= '$rpt_date' ";

        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function logBookItemDosesEdit($log_book_data_id, $item_id) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
                log_book_item_doses.item_pack_size_id,
                log_book_item_doses.log_book_id,
                log_book_item_doses.doses,
                log_book_item_doses.pk_id
                FROM
                log_book_item_doses
                WHERE
                log_book_item_doses.log_book_id = '$log_book_data_id' AND
                log_book_item_doses.item_pack_size_id = '$item_id' ";

        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function logBookItemUcs($district_id) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
                locations.pk_id,
                locations.location_name,
                locations.geo_level_id,
                locations.parent_id,
                locations.location_type_id,
                locations.province_id,
                locations.district_id,
                locations.ccm_location_id,
                locations.sdms_name
                FROM
                locations
                WHERE
                locations.district_id = $district_id AND
                locations.geo_level_id = 6";

        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function getLocationName($location_id) {

        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
                locations.pk_id,
                locations.location_name
               
                FROM
                locations
                WHERE
                locations.pk_id = '$location_id' ";

        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function monthlyConsumtionRefferal($wh_id, $date_in, $item_id, $gender) {
        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
               
                count(log_book.pk_id) as total
              FROM
                 log_book
              INNER JOIN log_book_item_doses ON log_book.pk_id = log_book_item_doses.log_book_id
              WHERE
              log_book_item_doses.item_pack_size_id = '$item_id' AND
              log_book.warehouse_id = '$wh_id' AND
              DATE_FORMAT(log_book.vaccination_date,'%Y-%m') = '$date_in'
              AND log_book.gender = '$gender'";
        // echo $querypro;
        // exit;
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

    public function getItemName($item_id) {
        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "SELECT
            item_pack_sizes.item_name
            FROM
            item_pack_sizes
            WHERE
            item_pack_sizes.pk_id = '$item_id'";
        // echo $querypro;
        // exit;
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result[0]['item_name'];
    }

    public function getStockOnHand($warehouse_id, $str_date) {
        $this->_em = Zend_Registry::get('doctrine');
       $pov = explode('-', $str_date);

        $querypro = "SELECT DISTINCT stock_master.pk_id
            FROM
            stock_detail
            INNER JOIN stock_master ON stock_master.pk_id = stock_detail.stock_master_id
            WHERE
            stock_master.to_warehouse_id = '$warehouse_id'
            AND  DATE_FORMAT(stock_master.transaction_date, '%Y-%m') = '$pov[0]-$pov[1]'";
      
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

}

?>