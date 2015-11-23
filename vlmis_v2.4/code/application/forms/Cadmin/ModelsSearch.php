<?php

class Form_Cadmin_ModelsSearch extends Zend_Form {

    private $_fields = array(
        "ccm_model_name" => "Model Name",
        "catalogue_id" => "catalogue_id",
        'ccm_asset_type_id'=>'Asset Type',
        'ccm_make_id'=>'Make',
        'status'=>'Status'
    );

    private $_list = array(
        "ccm_asset_type_id" => array(),
        'ccm_make_id' => array('' => 'Select Asset Type First'),
        'status' => array(
            "all" => "All",
            "0" => "In Active",
            "1" => "Active",
            "2" => "Draft"
        )
    );
    
    private $_radio = array(
    );

    public function init() {
        //Generate Asset Types Combo
        $asset_type = new Model_CcmAssetTypes();
        $result4 = $asset_type->getAssetSubTypes();        
        $this->_list["ccm_asset_type_id"][''] = "Select";
        foreach ($result4 as $rs) {
            $this->_list["ccm_asset_type_id"][$rs['pkId']] = $rs['assetTypeName'];
        }
        
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                 case "ccm_model_name":
                 case "catalogue_id":
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
            
            if (in_array($col, array_keys($this->_radio))) {
                $this->addElement("radio", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_radio[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
            }
            
        }
    }

}
