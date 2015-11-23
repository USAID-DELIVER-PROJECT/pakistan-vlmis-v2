<?php

class Form_TransferStock extends Zend_Form {

    private $_fields = array(
        "item_pack_size_id" => "Product",
        "stock_batch_id" => "Batch No",
        "totqty" => "Available Quantity",
        "non_ccm_location_id" => "Location",
        "quantity" => "Quantity"
    );
    private $_list = array(
        'non_ccm_location_id' => array()
    );
    private $_hidden = array(
        "id" => ""
    );

    public function init() {
        $non_ccm_loc = new Model_NonCcmLocations();
        $result3 = $non_ccm_loc->getLocationsName();

        $this->_list["non_ccm_location_id"][''] = "Select Location";
        if ($result3) {
            foreach ($result3 as $row3) {
                $this->_list["non_ccm_location_id"][$row3['pkId']] = $row3['locationName'];
            }
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "item_pack_size_id":
                case "stock_batch_id":
                case "totqty";
                case "quantity":
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
                    "multiOptions" => $this->_list[$col],
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
        }
    }

    public function readFields() {
        $this->getElement('item_pack_size_id')->setAttrib("readonly", "true");
        $this->getElement('stock_batch_id')->setAttrib("readonly", "true");
        $this->getElement('totqty')->setAttrib("readonly", "true");
    }

    public function addHidden() {
        $this->addElement("hidden", "id", array(
            "attribs" => array("class" => "hidden"),
            "allowEmpty" => false,
            "filters" => array("StringTrim"),
            "validators" => array(
                array(
                    "validator" => "NotEmpty",
                    "breakChainOnFailure" => true,
                    "options" => array("messages" => array("isEmpty" => "ID cannot be blank"))
                ),
                array(
                    "validator" => "Digits",
                    "breakChainOnFailure" => false,
                    "options" => array("messages" => array("notDigits" => "ID must be numeric")
                    )
                )
            )
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
