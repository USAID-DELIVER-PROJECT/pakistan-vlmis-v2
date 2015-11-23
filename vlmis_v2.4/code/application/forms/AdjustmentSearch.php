<?php

class Form_AdjustmentSearch extends Zend_Form {

    private $_fields = array(
        "adjustment_date" => "Adjustment Date",
        "ref_no" => "Reference number",
        "adjustment_no" => "adjustment_no",
        "adjustment_type" => "Adjustment type",
        "date_from" => "Date From",
        "date_to" => "Date To",
        "batch_no" => "batch_no",
        "product" => "Product",
        "expiry_date" => "Expiry Date"
    );
    private $_hidden = array(
        "pk_id" => "ID",
        "hdn_batch_no" => "hdn_batch_no"
    );
    private $_list = array(
        'adjustment_type' => array(),
        'product' => array(),
        'batch_no' => array()
    );

    public function init() {

        $transaction_types = new Model_TransactionTypes();
        $result = $transaction_types->getAdjusmentTypes();
        foreach ($result as $trans) {
            $this->_list["adjustment_type"][''] = 'Select';
            $this->_list["adjustment_type"][$trans['pkId']] = $trans['transactionTypeName'];
        }
        // This code gets all the products
        // $item_pack_sizes = new Model_ItemPackSizes();
        // $result2 = $item_pack_sizes->getAllItems();        
        // Get adjusted products names
        
        $stock_master = new Model_StockMaster();
        $result2 = $stock_master->getAdjustedProducts();
        $this->_list["product"][''] = "All";
        foreach ($result2 as $item) {
            $this->_list["product"][$item['pkId']] = $item['itemName'];
        }
        
        $date_from = date('01/m/Y');
        $date_to = date('d/m/Y');
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "adjustment_no":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "adjustment_date":
                case "expiry_date":

                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "style" => "position: relative; z-index: 100000;"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
                case "date_from":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true", "style" => "position: relative; z-index: 100000;"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_from
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true", "style" => "position: relative; z-index: 100000;"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_to
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
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
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "hdn_batch_no":

                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }
    }

}
