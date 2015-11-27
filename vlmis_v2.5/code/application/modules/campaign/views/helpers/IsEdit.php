<?php

class Zend_View_Helper_IsEdit extends Zend_View_Helper_Abstract {

    public function isEdit($campaign_id, $campaign_readiness_uc_id) {

        $result = 0;

        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cru.pkId")
                ->from('CampaignReadinessUnionCouncil', 'cru')
                ->join('cru.unionCouncil', 'uc')
                ->join('cru.campaign', 'c')
                ->where("c.pkId = $campaign_id")
                ->Andwhere("uc.pkId = $campaign_readiness_uc_id");
       // echo $str_sql->getQuery()->getSql();
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $result = 1;
        }

        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

}
