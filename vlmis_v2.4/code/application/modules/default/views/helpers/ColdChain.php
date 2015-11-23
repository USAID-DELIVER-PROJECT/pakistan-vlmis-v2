<?php

class Zend_View_Helper_ColdChain extends Zend_View_Helper_Abstract {

    public function coldChain() {
        return $this;
    }

    public function getVoltageRegulatorDetailById($coldchain_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,"
                        . "ccmake.ccmMakeName,cc.createdDate,"
                        . "d.locationName as district, w.warehouseName as facility")
                ->from('ColdChain', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->where("cc.pkId = " . $coldchain_id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getGeneratorDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,cc.serialNumber,"
                        . "ccmake.ccmMakeName,cc.createdDate,cc.workingSince,"
                        . "d.locationName as district, w.warehouseName as facility,"
                        . "stkholder.stakeholderName")
                ->from('ColdChain', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->leftJoin('cc.source', 'stkholder')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getVaccineCarrierDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,"
                        . "ccm.assetDimensionLength,ccm.assetDimensionWidth,"
                        . "ccm.assetDimensionHeight,ccm.catalogueId,"
                        . "ccmake.ccmMakeName,cc.createdDate,"
                        . "d.locationName as district, w.warehouseName as facility")
                ->from('ColdChain', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getIcePackDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,"
                        . "ccmake.ccmMakeName,cc.createdDate,"
                        . "d.locationName as district, w.warehouseName as facility")
                ->from('ColdChain', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getColdRoomDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,ccr.coolingSystem,ccr.hasVoltage,trs.listValue as temperatureRecordingSystem,trsystem.listValue as typeRecordingSystem,"
                        . "rgt.listValue as refrigeratorGasType,bg.listValue as backupGenerator,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,ccm.assetDimensionLength,ccm.assetDimensionWidth,ccm.assetDimensionHeight,"
                        . "ccmake.ccmMakeName,cc.createdDate,"
                        . "d.locationName as district, w.warehouseName as facility")
                ->from('CcmColdRooms', 'ccr')
                ->leftJoin('ccr.temperatureRecordingSystem', 'trs')
                ->leftJoin('ccr.typeRecordingSystem', 'trsystem')
                ->leftJoin('ccr.refrigeratorGasType', 'rgt')
                ->leftJoin('ccr.backupGenerator', 'bg')
                ->leftJoin('ccr.ccm', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getTransportDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,
                         s.stakeholderName,cv.usedForEpi, cv.comments,"
                        . "ccmake.ccmMakeName,cc.createdDate,"
                        . "d.locationName as district, w.warehouseName as facility,"
                        . "cv.registrationNo, cat.assetTypeName")
                ->from('CcmVehicles', 'cv')
                ->innerJoin('cv.ccm', 'cc')
                ->leftJoin('cc.source', 's')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getRefrigeratorDetailById($id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("cc.pkId,cc.assetId,cc.quantity, cat.assetTypeName,"
                        . "ccm.ccmModelName,csl.ccmStatusListName,cc.serialNumber,"
                        . "ccmake.ccmMakeName,cc.createdDate,cc.workingSince,"
                        . "d.locationName as district, w.warehouseName as facility,"
                        . "stkholder.stakeholderName,ccm.assetDimensionLength,"
                        . "ccm.assetDimensionWidth, ccm.assetDimensionHeight,"
                        . "ccm.grossCapacity20, ccm.grossCapacity4,"
                        . "ccm.netCapacity20, ccm.netCapacity4,ccm.cfcFree, ccm.catalogueId")
                ->from('ColdChain', 'cc')
                ->leftJoin('cc.ccmModel', 'ccm')
                ->leftJoin('ccm.ccmAssetType', 'cat')
                ->leftJoin('cc.warehouse', 'w')
                ->leftJoin('w.district', 'd')
                ->leftJoin('ccm.ccmMake', 'ccmake')
                ->leftJoin('cc.ccmStatusHistory', 'csh')
                ->leftJoin('csh.ccmStatusList', 'csl')
                ->leftJoin('cc.source', 'stkholder')
                ->where("cc.pkId = " . $id);

        $row = $str_sql->getQuery()->getResult();
        if (!empty($row) && count($row) > 0) {
            return $row;
        } else {
            return false;
        }
    }

}

?>