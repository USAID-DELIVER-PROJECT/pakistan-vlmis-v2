<?php

class Zend_View_Helper_GetLocationName extends Zend_View_Helper_Abstract {

    public function getLocationName($location_id, $type) {

        $em = Zend_Registry::get("doctrine");
        if ($type == Model_Placements::LOCATIONTYPE_CCM) {
            $str_sql = $em->createQueryBuilder()
                    ->select('loc.assetId as location_name')
                    ->from("ColdChain", "loc")
                    ->where("loc.pkId = $location_id");
        } else {
            $str_sql = $em->createQueryBuilder()
                    ->select('loc.locationName as location_name')
                    ->from("NonCcmLocations", "loc")
                    ->where("loc.pkId = $location_id");
        }

        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            return $row[0]['location_name'];
        } else {
            return '';
        }
    }

}

?>