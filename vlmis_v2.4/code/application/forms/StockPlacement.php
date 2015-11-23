<?php

class Form_StockPlacement extends Zend_Form {

    private $_fields = array(
        "quantity" => "Quantity",
        "cold_chain" => "Cold Chain"
    );
    private $_list = array(
        'cold_chain' => array()
    );

    public function init() {

        //Generate Asset Sub Type Combo
        $asset_types = new Model_CcmAssetTypes();
        $asset_types->form_values = array('parent_id' => 1);
        $result3 = $asset_types->getAssetSubTypes();
        $this->_list["cold_chain"][''] = "Select Cold Chain";
        foreach ($result3 as $assetsubtype) {
            $this->_list["cold_chain"][$assetsubtype['pkId']] = $assetsubtype['assetTypeName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "quantity":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "allowEmpty" => false,
                        "required" => false,
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => 'span3'),
                    "filters" => array("StringTrim", "StripTags"),
                    "allowEmpty" => false,
                    "required" => true,
                    "registerInArrayValidator" => false,
                    "multiOptions" => $this->_list[$col],
                    "validators" => array(
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
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
