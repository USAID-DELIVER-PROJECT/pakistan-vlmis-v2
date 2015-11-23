<?php

class Zend_View_Helper_PriorityVaccinesDistributionSummary extends Zend_View_Helper_Abstract {

    public function priorityVaccinesDistributionSummary($product_id, $case) {

        $stock_master = new Model_StockMaster();
        $stock_master->form_values = array(
            'product_id' => $product_id,
            'case' => $case
        );
        $result = $stock_master->priorityVaccinesDistributionSummary();

        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

}
