<?php

class Zend_View_Helper_Shipments extends Zend_View_Helper_Abstract {

    public function shipments() {
        return $this;
    }

    public function getShipmentQuantity($item, $wh_id, $date) {
        $this->_em = Zend_Registry::get('doctrine');
        $sql = "SELECT
                        DATE_FORMAT(
                                shipments.shipment_date,
                                '%M, %Y'
                        ) eta,
                        Sum(
                                shipments.shipment_quantity
                        ) AS quantity
                FROM
                        shipments
                WHERE
                        DATE_FORMAT(shipments.shipment_date,'%Y-%m-%d') > '" . $date . "'
                AND shipments.item_pack_size_id = $item
                AND shipments.warehouse_id = $wh_id";

        $row = $this->_em->getConnection()->prepare($sql);
        $row->execute();
        $data = $row->fetchAll();
        if (count($data) > 0) {
            return $data[0]['quantity'];
        } else {
            return '0';
        }
    }

}

?>