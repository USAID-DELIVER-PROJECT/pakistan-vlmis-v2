<?php

class Form_Cadmin_AssetSubTypeAdd extends Zend_Form {

    private $_fields = array(
        "asset_type" => "Asset Type",
        "asset_sub_type" => "Asset Sub Type",
        "assetSubType" => "Asset Sub Type"
    );
    private $_list = array(
        'asset_type' => array()
    );
    private $_hidden = array(
        "asset_id" => "pkId"
    );

    public function init() {

        //Generate Asset Type Combo
        $asset_types = new Model_CcmAssetTypes();

        $result = $asset_types->getAssetSubTypes();
        
        $this->_list["asset_type"][''] = "Select";
        foreach ($result as $rs) {
            $this->_list["asset_type"][$rs['pkId']] = $rs['assetTypeName'];
        }


        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "asset_sub_type":
                case "assetSubType":
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
                    "validators" => array()
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "asset_id":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
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
