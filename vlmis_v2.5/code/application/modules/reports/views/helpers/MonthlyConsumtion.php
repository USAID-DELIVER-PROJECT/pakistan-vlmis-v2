<?php

class Zend_View_Helper_MonthlyConsumtion extends Zend_View_Helper_Abstract {

    public function monthlyConsumtion($wh_id, $prev_month_date, $pk_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select('wd.pkId,
                    wd.openingBalance,
                    wd.receivedBalance,
                    wd.issueBalance,
                    wd.closingBalance,
                    wd.wastages,
                    wd.vialsUsed,
                    wd.adjustments,
                    wd.reportingStartDate,
                    wd.nearestExpiry,
                    wd.createdDate')
                ->from("WarehousesData", "wd")
                ->where("wd.warehouse = $wh_id")
                ->andWhere("wd.reportingStartDate IN ('$prev_month_date')")
                ->andWhere("wd.itemPackSize=$pk_id");

        $rs = $str_sql->getQuery()->getResult();

        if (!empty($rs) && count($rs) > 0) {
            return $rs[0];
        } else {
            return '0';
        }
    }

}

?>