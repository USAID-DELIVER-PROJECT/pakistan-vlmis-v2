<?php

class Zend_View_Helper_MonthlyConsumtion extends Zend_View_Helper_Abstract {

//    public function monthlyConsumtion($wh_id, $prev_month_date, $pk_id) {
//        $em = Zend_Registry::get('doctrine');
//        $str_sql = $em->createQueryBuilder()
//                ->select('wd.pkId,
//                    wd.openingBalance,
//                    wd.receivedBalance,
//                    wd.issueBalance,
//                    wd.closingBalance,
//                    wd.wastages,
//                    wd.vialsUsed,
//                    wd.adjustments,
//                    wd.reportingStartDate,
//                    wd.nearestExpiry,
//                    wd.createdDate')
//                ->from("WarehousesData","wd")
//                ->where("wd.warehouse = $wh_id")
//                ->andWhere("DATE_FORMAT(wd.reportingStartDate, '%Y-%m-%d') = '$prev_month_date'")
//                ->andWhere("wd.itemPackSize=$pk_id");
//        //echo $str_sql->getQuery()->getSql();
//        //exit;
//        $rs = $str_sql->getQuery()->getResult();
//        
//        if (!empty($rs) && count($rs) > 0) {
//            return $rs[0];
//        } else {
//            return '0';
//        }
//    }
//}

    public function monthlyConsumtion($wh_id, $prev_month_date, $pk_id) {

        $this->_em = Zend_Registry::get('doctrine');
        $rows = $this->_em->getRepository('WarehousesDataDraft')->findBy(array('warehouse' => $wh_id, 'reportingStartDate' => $prev_month_date));
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
                               warehouses_data_draft w0_
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
                               warehouses_data w0_
                       WHERE
                               w0_.warehouse_id = $wh_id
           AND 
           w0_.reporting_start_date = '$prev_month_date'
           AND w0_.item_pack_size_id = $pk_id";
        }
       
        $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();
        
        return $result[0];
//        if (!empty($row->fetchAll()) && count($row->fetchAll()) > 0) {
//         return $result[0];
//      } else {
//          return '0';
//      }
    }

}

?>