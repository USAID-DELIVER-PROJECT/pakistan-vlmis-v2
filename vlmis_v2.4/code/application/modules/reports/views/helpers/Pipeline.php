<?php

class Zend_View_Helper_Pipeline extends Zend_View_Helper_Abstract {

    public function pipeline() {
        return $this;
    }

    public function getSOH($item_id, $wh_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = "SELECT
                            Sum(stock_detail.quantity) AS qty,
                            stock_batch.item_pack_size_id,
                            DATE_FORMAT(
                                    MAX(
                                            stock_master.transaction_date
                                    ),
                                    '%m'
                            ) AS from_month,
                            DATE_FORMAT(
                                    MAX(
                                            stock_master.transaction_date
                                    ),
                                    '%Y'
                            ) AS from_year
                    FROM
                            stock_master
                    INNER JOIN stock_detail ON stock_detail.stock_master_id = stock_master.pk_id
                    INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id
                    WHERE
                            stock_batch.warehouse_id = $wh_id
                    AND stock_batch.item_pack_size_id = $item_id";

        $row = $em->getConnection()->prepare($str_sql);
        $row->execute();
        return $row->fetchAll();
    }

    public function getShipments($item_id, $wh_id, $date) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = "SELECT
                            SUM(
                                    shipments.shipment_quantity
                            ) AS qty,
                            DATE_FORMAT(
                                    shipments.shipment_date,
                                    '%m/%Y'
                            ) AS ship_date
                    FROM
                            shipments
                    WHERE
                            shipments.warehouse_id = $wh_id
                    AND shipments.item_pack_size_id = $item_id
                    AND shipments.shipment_date >= '$date'
                    GROUP BY
                            DATE_FORMAT(
                                    shipments.shipment_date,
                                    '%m/%Y'
                            )";

        $row = $em->getConnection()->prepare($str_sql);
        $row->execute();
        return $row->fetchAll();
    }

    public function getAMC($item_id, $wh_id, $year) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = "SELECT
                            epi_amc.amc / 12 AS amc,
                            epi_amc.amc_year
                    FROM
                            epi_amc
                    WHERE
                            epi_amc.item_id = $item_id
                    AND epi_amc.warehouse_id = $wh_id
                    AND epi_amc.amc_year = '$year'
                    GROUP BY
                            epi_amc.amc_year";

        $row = $em->getConnection()->prepare($str_sql);
        $row->execute();
        $data = $row->fetchAll();
        if (count($data) > 0) {
            return $data[0]['amc'];
        } else {
            return '0';
        }
    }

}

?>