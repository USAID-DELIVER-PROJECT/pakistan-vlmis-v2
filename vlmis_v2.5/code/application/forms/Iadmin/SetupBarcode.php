<?php

class Form_Iadmin_SetupBarcode extends Zend_Form {

    private $_fields = array(
        "item_pack_size_id" => "Product",
        "item_pack_size_id_update" => "Product",
        "stakeholder_id" => "Manufacturer",
        "stakeholder_id_update" => "Manufacturer",       
        "item_gtin" => "Item GTIN",
        "pack_size_description" => "Pack Size",
        "length" => "Length",
        "width" => "Width",
        "height" => "Height",
        "packaging_level" => "Packaging Level",
         "packaging_level_update" => "Packaging Level",      
        "quantity_per_pack" => "Vials Pcs",
        "volum_per_vial" => "Volume",
    );
    
    private $_list = array(
        'item_pack_size_id' => array(),
        'stakeholder_id' => array('' => "Select Manufacturer"),
        'stakeholder_id_update' => array('' => "Select Manufacturer"),
        'packaging_level' => array(),
        'packaging_level_update' => array()
    );
   
    private $_hidden = array(
        "barcode_id" => "",
        "barcode_ty_id" => "",
        "item_pack_size_id_hidden" => "",
        "stakeholder_id_update_hidden" => "",
    );

    public function init() {
        //Generate Item Combo
        $item_pack_size = new Model_ItemPackSizes();
        $result = $item_pack_size->getItemsAll();
        $this->_list["item_pack_size_id"][''] = "Select Product";
        $this->_list["item_pack_size_id_update"][''] = "Select Product";
        if ($result) {
            foreach ($result as $row) {
                $this->_list["item_pack_size_id"][$row->getPkId()] = $row->getItemName();
                $this->_list["item_pack_size_id_update"][$row->getPkId()] = $row->getItemName();
            }
        }

        //Generate Pack type combo
        $list = new Model_ListDetail();
        $list->form_values = array('listMaster' => Model_ListMaster::packaging_level);
        $result2 = $list->getListDetail();
        $this->_list["packaging_level"][''] = "Select Packaging Level";
           $this->_list["packaging_level_update"][''] = "Select Packaging Level";
        if ($result2) {
            foreach ($result2 as $packagingLevel) {
                $this->_list["packaging_level"][$packagingLevel->getPkId()] = $packagingLevel->getListValue();
                   $this->_list["packaging_level_update"][$packagingLevel->getPkId()] = $packagingLevel->getListValue();
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "barcode_id":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "barcode_ty_id":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "item_gtin":              
                case "quantity_per_pack":
                case "volum_per_vial":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;               
                case "pack_size_description";
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "length";
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "width";
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Width"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "height";
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Height"),
                        "allowEmpty" => true,
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

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "item_pack_size_id_hidden":
                case "stakeholder_id_update_hidden":
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

    public function readFields() {
        $this->getElement('item_pack_size_id')->setAttrib("disabled", "true");
        $this->getElement('stakeholder_id')->setAttrib("disabled", "true");
        $this->getElement('pack_size_description')->setAttrib("readonly", "true");
        $this->getElement('length')->setAttrib("disabled", "true");
        $this->getElement('width')->setAttrib("disabled", "true");
        $this->getElement('height')->setAttrib("disabled", "true");
        $this->getElement('quantity_per_pack')->setAttrib("disabled", "true");
        $this->getElement('volum_per_vial')->setAttrib("disabled", "true");
    }
}
