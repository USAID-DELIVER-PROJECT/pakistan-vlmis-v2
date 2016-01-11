<?php

class Zend_View_Helper_GetAssets extends Zend_View_Helper_Abstract {

    public function getAssets() {
        return $this;
    }

    public function getAssetsNonQuanity($warehouse_id) {

        $querypro = "SELECT
                    csh.status_date as statusDate,
                    cat.pk_id AS ccmAssetId,
                    cc.asset_id AS generateAssetId,
                    cat.asset_type_name as assetTypeName,
                    csh.temperature_alarm as temperatureAlarm,
                    csl.pk_id AS ccmStatusListId,
                    csl.reason_type AS reason_type,
                    cc.pk_id as pkId,
                    r.pk_id AS reasonId,
                    u.pk_id AS utilizationId
            FROM
                    cold_chain cc
            INNER JOIN ccm_status_history csh ON cc.ccm_status_history_id = csh.pk_id
            INNER JOIN ccm_status_list csl  ON csh.ccm_status_list_id = csl.pk_id
            LEFT JOIN ccm_status_list r ON csh.reason_id = r.pk_id
            LEFT JOIN ccm_status_list u ON csh.utilization_id = u.pk_id
            INNER JOIN ccm_asset_types cat ON cc.ccm_asset_type_id = cat.pk_id
            INNER JOIN warehouses w ON cc.warehouse_id = w.pk_id
            WHERE
                    w.pk_id = $warehouse_id
            AND (
                    cat.pk_id IN (1, 3, 6, 7)
                    OR cat.parent_id IN (1, 3, 6, 7)
            )";


        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
        
    }

    public function getAssetsQuanity($warehouse_id) {

        $querypro = "SELECT DISTINCT
	cc.pk_id as pkId,
	cc.asset_id as assetId,
	cat.pk_id AS ccmAssetId,
	cat.asset_type_name As assetTypeName,
	csh.working_quantity AS quantity,
	cm.ccm_model_name AS ccmModelName,
        csh.comments
        FROM
                cold_chain cc
        INNER JOIN ccm_models cm ON cc.ccm_model_id = cm.pk_id
        INNER JOIN ccm_asset_types cat ON cc.ccm_asset_type_id = cat.pk_id
        INNER JOIN ccm_status_history csh ON cc.ccm_status_history_id = csh.pk_id
        INNER JOIN warehouses w ON cc.warehouse_id = w.pk_id
        WHERE
                w.pk_id = $warehouse_id
        AND cat.pk_id IN (2, 4, 5)
        GROUP BY
                cm.ccm_model_name";



        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();


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
