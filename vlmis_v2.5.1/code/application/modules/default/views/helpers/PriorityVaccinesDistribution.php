<?php

class Zend_View_Helper_PriorityVaccinesDistribution extends Zend_View_Helper_Abstract {

    public function priorityVaccinesDistribution($product_id, $case) {

        $stock_master = new Model_StockMaster();
        $stock_master->form_values = array(
            'product_id' => $product_id,
            'case' => $case
        );
        $result = $stock_master->priorityVaccinesDistribution();

        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

}
