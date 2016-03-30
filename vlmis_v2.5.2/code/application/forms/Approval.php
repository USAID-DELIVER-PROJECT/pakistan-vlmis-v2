<?php

/**
 * Form_Aproval
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Stock Issue
 */
class Form_Approval extends Form_Base {

    private $_fields = array(
        "approved_qty" => "Approved Quantity",
        'new_suggested_date' => 'New Suggested Date'
    );
    private $_hidden = array(
    );
    private $_list = array(
    );

    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "approved_qty":
                    parent::createText($col);
                    break;
                case "new_suggested_date":
                    parent::createReadOnlyText($col);
                    break;
                default:
                    break;
            }
        }
    }

}
