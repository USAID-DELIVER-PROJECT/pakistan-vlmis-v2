<?php

class Zend_View_Helper_IsCampaignDataEntered extends Zend_View_Helper_Abstract {

    public function isCampaignDataEntered($campaign_id, $campaign_uc_id) {

        $result = 0;

        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cd.pkId")
                ->from('CampaignData', 'cd')
                ->join('cd.warehouse', 'uc')
                ->join('cd.campaign', 'c')
                ->where("c.pkId = $campaign_id")
                ->Andwhere("uc.pkId = $campaign_uc_id");
        // echo $str_sql->getQuery()->getSql();
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            $result = 1;
        }

        if ($result == 1) {
            return false;
        } else {
            return true;
        }
    }

}
