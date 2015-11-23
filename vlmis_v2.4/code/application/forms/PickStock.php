<?php

class Form_PickStock extends Zend_Form {

    private $_fields = array(
        "stock_master_id" => "Issue No",
    );
    private $_list = array(
        'stock_master_id' => array(),
    );

    public function init() {
        $identity = new App_Auth();
        $stock_master = new Model_StockMaster();
        $wh_id = $identity->getWarehouseId();
        $result1 = $stock_master->getUnpickedIssueNo($wh_id);
        $this->_list["stock_master_id"][''] = "Select Issue No";
        if ($result1 != false) {
            foreach ($result1 as $row) {
                // $this->_list["make"][$wh['pkId']] = $wh['ccmMakeName'];
                $this->_list["stock_master_id"][$row['stc_master_pkid']] = $row['transaction_number'];
            }
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "stock_master_id":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        //"multiple" => "multiple",
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
                    //"multiOptions" => $this->_list[$col],
                    "validators" => array(
                        array(
                            "validator" => "Float",
                            "breakChainOnFailure" => false,
                            "options" => array(
                                "messages" => array("notFloat" => $name . " must be a valid option")
                            )
                        )
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
            if (in_array("stock_master_id", array_keys($this->_list))) {
                $this->addElement("select", "stock_master_id", array(
                    "attribs" => array("class" => "form-control"),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => true,
                    //"multiple" => "multiple",
                    "required" => false,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list["stock_master_id"],
                    "validators" => array(
                        array(
                            "validator" => "Float",
                            "breakChainOnFailure" => false,
                            "options" => array(
                                "messages" => array("notFloat" => $name . " must be a valid option")
                            )
                        )
                    )
                ));
                $this->getElement("stock_master_id")->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
    }

}
