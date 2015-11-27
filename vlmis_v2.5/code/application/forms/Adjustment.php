<?php

class Form_Adjustment extends Zend_Form {

    private $_fields = array(
        "adjustment_date" => "Adjustment Date",
        "ref_no" => "Reference number",
        "product" => "Product",
        "comments" => "Comments",
        "adjustment_type" => "Adjustment type",
        "batch_no" => "batch_no",
        "quantity" => "quantity",
        "available" => "available",
        "vvm_stage" => "New Vvm Stage",
        "old_vvm" => "Old VVM Stage",
        "location_id" => "Location"
    );
    private $_hidden = array(
        "pk_id" => "ID",
        "item_unit_id" => "item_unit_id"
    );
    private $_files = array();
    private $_list = array(
        'adjustment_type' => array(),
        'product' => array(),
        'batch_no' => array(),
        'vvm_stage' => array(),
        'old_vvm' => array(),
        'location_id' => array()
    );

    public function init() {

        $transaction_types = new Model_TransactionTypes();
        $result = $transaction_types->getAdjusmentTypes();

        foreach ($result as $trans) {
            $this->_list["adjustment_type"][''] = 'Select';
            $this->_list["adjustment_type"][$trans['pkId']] = $trans['transactionTypeName'];
        }

        $item_pack_sizes = new Model_ItemPackSizes();
        $result1 = $item_pack_sizes->getAllManageItems();
        $this->_list["product"][''] = 'Select';
        if ($result1 && count($result1) > 0) {
            foreach ($result1 as $whs) {
                $this->_list["product"][$whs['pkId']] = $whs['itemName'];
            }
        }
        
        $this->_list["vvm_stage"][""] = "NA";
        $this->_list["old_vvm"][""] = "NA";

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "item_unit_id":

                    $this->addElement("hidden", $col);
                    break;
                default:
                    break;
            }
        }

        foreach ($this->_fields as $col => $name) {

            switch ($col) {
                case "adjustment_date":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => date("d/m/Y")
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
                case "available":
                case "quantity":
                case "ref_no":
                case "transaction_reference":
                case "comments":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
    }

}
