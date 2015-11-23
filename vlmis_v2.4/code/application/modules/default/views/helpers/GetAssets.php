<?php

class Zend_View_Helper_GetAssets extends Zend_View_Helper_Abstract {

    public function getAssets() {
        return $this;
    }

    public function getAssetsNonQuanity($warehouse_id) {

        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("csh.statusDate,at.pkId as ccmAssetId,cc.assetId as generateAssetId,"
                        . "at.assetTypeName,csh.temperatureAlarm,csl.pkId as ccmStatusListId,"
                        . "csl.reasonType as reason_type,cc.pkId,r.pkId as reasonId,u.pkId as utilizationId")
                ->from('ColdChain', 'cc')
                ->join('cc.ccmStatusHistory', 'csh')
                ->join('csh.ccmStatusList', 'csl')
                ->LeftJOIN('csh.reason', 'r')
                ->LeftJOIN('csh.utilization', 'u')
                ->join('cc.ccmAssetType', 'at')
                ->join('cc.warehouse', 'w')
                ->where("w.pkId = $warehouse_id")
                ->Andwhere('at.pkId IN (1,3,6,7) OR at.parent IN (1,3,6,7)');
//echo $str_sql->getQuery()->getSql();

        $row = $str_sql->getQuery()->getResult();

        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAssetsQuanity($warehouse_id) {

        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("DISTINCT cc.pkId,cc.assetId,at.pkId as ccmAssetId,at.assetTypeName,"
                        . "csh.workingQuantity as quantity,cm.ccmModelName")
                ->from('ColdChain', 'cc')
                ->join('cc.ccmModel', 'cm')
                ->join('cc.ccmAssetType', 'at')
                ->join('cc.ccmStatusHistory', 'csh')
                ->join('cc.warehouse', 'w')
                ->where("w.pkId = $warehouse_id")
                ->andWhere('at.pkId IN (2,4,5)')
                ->groupBy('cm.ccmModelName');

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAssetsQuanityUpdate($warehouse_id) {
        $em = Zend_Registry::get('doctrine');
        $s_sql = $em->createQueryBuilder()
                ->select("MAX(cs.pkId)")
                ->from("CcmStatusHistory", "cs");
        $max_id = $s_sql->getQuery()->getResult();
        $sub_sql = $em->createQueryBuilder()
                ->select("MAX(cs.statusDate)")
                ->from("CcmStatusHistory", "cs")
                ->where("cs.pkId='" . $max_id[0][1] . "'");
        $max_date = $sub_sql->getQuery()->getResult();

        $str_sql = $em->createQueryBuilder()
                ->select("DISTINCT cc.pkId,cc.assetId,at.pkId as ccmAssetId,at.assetTypeName,"
                        . "csh.workingQuantity as quantity,cm.ccmModelName")
                ->from('CcmStatusHistory', 'csh')
                ->join('csh.ccm', 'cc')
                ->join('cc.ccmModel', 'cm')
                ->join('cc.ccmAssetType', 'at')
                ->join('cc.warehouse', 'w')
                ->where("w.pkId = $warehouse_id ")
                ->andWhere('at.pkId IN (2,4,5)')
                ->andWhere("csh.statusDate='" . $max_date[0][1] . "'")
                ->groupBy('at.assetTypeName');
        //echo $str_sql->getQuery()->getSql();
        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}
