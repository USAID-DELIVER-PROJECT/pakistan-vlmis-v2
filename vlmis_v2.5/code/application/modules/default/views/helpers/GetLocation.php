<?php

class Zend_View_Helper_GetLocation extends Zend_View_Helper_Abstract {

    public function getLocation($detail_id, $cat_id) {

        if ($cat_id == 1) {
            $qry = "SELECT
	cold_chain.asset_id
FROM
	placements
INNER JOIN placement_locations ON placements.placement_location_id = placement_locations.pk_id
INNER JOIN cold_chain ON placement_locations.location_id = cold_chain.pk_id
WHERE
	placements.stock_detail_id = $detail_id
AND placement_locations.location_type = 99";
        } else {
            $qry = "SELECT
	non_ccm_locations.location_name as asset_id
FROM
	placements
INNER JOIN placement_locations ON placements.placement_location_id = placement_locations.pk_id
INNER JOIN non_ccm_locations ON placement_locations.location_id = non_ccm_locations.pk_id
WHERE
	placement_locations.location_type = 100
AND placements.stock_detail_id = $detail_id";
        }

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($qry);

        $row->execute();
        $data = $row->fetchAll();

        if (count($data) > 0) {
            return $data[0]['asset_id'];
        } else {
            return '';
        }
    }

}

?>