<?php

class Zend_View_Helper_MonthlyConsumtion extends Zend_View_Helper_Abstract {

    public function monthlyConsumtion($wh_id, $prev_month_date, $pk_id) {

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
                        w0_.nearest_expiry AS nearestExpiry
                       FROM
                               hf_data_master_draft w0_
                       WHERE
                               w0_.warehouse_id = $wh_id
           AND 
           w0_.reporting_start_date = '$prev_month_date'
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
                        w0_.nearest_expiry AS nearestExpiry,
                        w0_.created_date AS createdDate
                       FROM
                               hf_data_master w0_
                       WHERE
                               w0_.warehouse_id = $wh_id
           AND 
           w0_.reporting_start_date = '$prev_month_date'
           AND w0_.item_pack_size_id = $pk_id";
        }

        // exit;
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();
//        
        return $result[0];
//        if (!empty($row->fetchAll()) && count($row->fetchAll()) > 0) {
//         return $result[0];
//      } else {
//          return '0';
        //  }
    }

}

?>