<?php


/**
 * Zend_View_Helper_Shipments
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage reports
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */


/**
 *  Zend View Helper Shipments
 */

class Zend_View_Helper_Shipments extends Zend_View_Helper_Abstract {

    /**
     * Shipments
     * @return \Zend_View_Helper_Shipments
     */
    public function shipments() {
        return $this;
    }

    /**
     * Get Shipment Quantity
     * @param type $item
     * @param type $wh_id
     * @param type $date
     * @return string
     */
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