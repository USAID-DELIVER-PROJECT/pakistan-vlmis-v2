<?php

class Zend_View_Helper_GetDataEntryStatus extends Zend_View_Helper_Abstract {

    public function getDataEntryStatus($warehouse_id, $transaction_type) {
        if ($transaction_type == 1) {
            $join = "INNER JOIN warehouses ON  stock_master.from_warehouse_id = warehouses.pk_id";
        } else {
            $join = "INNER JOIN warehouses ON stock_master.to_warehouse_id = warehouses.pk_id";
        }

        $querypro = "SELECT
			stock_master.pk_id,
			stock_master.transaction_date AS transactionDate,
			warehouses.warehouse_name,
			stock_master.to_warehouse_id AS wh_id,
			stock_master.from_warehouse_id AS wh_from_id,
			stock_master.transaction_type_id
		FROM
			stock_detail
		INNER JOIN stock_master ON stock_detail.stock_master_id = stock_master.pk_id
	  	$join
                INNER JOIN stock_batch ON stock_detail.stock_batch_id = stock_batch.pk_id    
		WHERE
			stock_detail.temporary = 0
		AND stock_batch.warehouse_id = $warehouse_id
		AND warehouses.`status` = 1
		AND stock_master.transaction_type_id = $transaction_type
		ORDER BY
			transactionDate DESC
		LIMIT 1
	
	";

        $this->_em = Zend_Registry::get('doctrine');
        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

}

?>