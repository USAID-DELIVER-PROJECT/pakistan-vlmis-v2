<?php

class Form_Iadmin_SetupBarcode extends Zend_Form {

    private $_fields = array(
        "item_pack_size_id" => "Product",
        "item_pack_size_id_update" => "Product",
        "stakeholder_id" => "Manufacturer",
        "stakeholder_id_update" => "Manufacturer",
        "barcode_type" => "Barcode Type",
        "item_gtin" => "Item GTIN",
        "gtin" => "Gtin",
        "batch" => "Batch",
        "expiry" => "expiry",
        "gtin_start_position" => "GTIN Start Position",
        "batch_no_start_position" => "Batch No  Start Position",
        "expiry_date_start_position" => "Expiry Date Start Position",
        "gtin_end_position" => "GTIN End POsition",
        "batch_no_end_position" => "Batch No End POsition",
        "expiry_date_end_position" => "Expiry Date End POsition",
        "pack_size_description" => "Pack Size",
        "length" => "Length",
        "width" => "Width",
        "height" => "Height",
        "packaging_level" => "Packaging Level",
         "packaging_level_update" => "Packaging Level",
        "batch_length" => "Batch Length",
        //"expiry_date_format" => "Expiry Date Format",
        "quantity_per_pack" => "Vials Pcs",
        "volume_per_unit_net" => "Volume",
            //"pre_printed_barcode" => "Pre Printed Barcode",
    );
    private $_list = array(
        'item_pack_size_id' => array(),
        'stakeholder_id' => array('' => "Select Manufacturer"),
        'stakeholder_id_update' => array('' => "Select Manufacturer"),
        'packaging_level' => array(),
        'packaging_level_update' => array()
    );
    private $_checkbox = array(
        'gtin' => array(
            "0" => "No Gtin",
            "1" => "Gtin",
        ),
        'batch' => array(
            "0" => "No Batch",
            "1" => "Batch",
        ),
        'expiry' => array(
            "0" => "No Expiry",
            "1" => "Expiry",
        ),
            /* 'pre_printed_barcode' => array(
              "0" => "No Barcode",
              "1" => "Barcode",
              ), */
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

        //Generate Manufacturer Combo
        /* $stakeholder = new Model_Stakeholders();
          $result1 = $stakeholder->getManufacturer();
          $this->_list["stakeholder_id"][''] = "Select Manufacturer";
          if ($result1) {
          foreach ($result1 as $manufacturer) {
          $this->_list["stakeholder_id"][$manufacturer['pkId']] = $manufacturer['stakeholderName'];
          }
          } */

        //Generate Batch Type Combo
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

        /* /Generate Expiry Date Format Combo
          $list = new Model_ListDetail();
          $list->form_values = array('listMaster' => Model_ListMaster::EXPIRY_DATE_FORMAT);
          $result3 = $list->getListDetail();
          $this->_list["expiry_date_format"][''] = "Select Expiry Date Format";
          if ($result3) {
          foreach ($result3 as $expirydateformat) {
          $this->_list["expiry_date_format"][$expirydateformat->getPkId()] = $expirydateformat->getListValue();
          }
          } */

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
                case "batch_length":
                case "gtin_start_position":
                case "batch_no_start_position":
                case "expiry_date_start_position":
                case "gtin_end_position":
                case "batch_no_end_position":
                case "expiry_date_end_position":
                //case "expiry_date_format";
                case "quantity_per_pack":
                case "volume_per_unit_net":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                /* case "expiry_date_format":
                  $this->addElement("text", $col, array(
                  "attribs" => array("class" => "form-control"),
                  "allowEmpty" => true,
                  "filters" => array("StringTrim", "StripTags"),
                  "validators" => array()
                  ));
                  $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                  $this->getElement($col)->setValue("YYMMDD");
                  break; */
                case "pack_size_description";
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "gtin":
                case "batch":
                case "expiry":
                    $this->addElement("checkbox", $col, array(
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
                case "pre_printed_barcode":
                    $this->addElement("checkbox", $col, array(
                        "attribs" => array("class" => "form-control"),
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
        $this->getElement('barcode_type')->setAttrib("disabled", "true");
        $this->getElement('gtin_start_position')->setAttrib("disabled", "true");
        $this->getElement('batch_no_start_position')->setAttrib("disabled", "true");
        $this->getElement('expiry_date_start_position')->setAttrib("disabled", "true");
        //$this->getElement('expiry_date_format')->setAttrib("disabled", "true");
        $this->getElement('gtin_end_position')->setAttrib("disabled", "true");
        $this->getElement('batch_no_end_position')->setAttrib("disabled", "true");
        $this->getElement('expiry_date_end_position')->setAttrib("disabled", "true");
        $this->getElement('pack_size_description')->setAttrib("readonly", "true");
        $this->getElement('length')->setAttrib("disabled", "true");
        $this->getElement('width')->setAttrib("disabled", "true");
        $this->getElement('height')->setAttrib("disabled", "true");
        $this->getElement('quantity_per_pack')->setAttrib("disabled", "true");
        $this->getElement('volume_per_unit_net')->setAttrib("disabled", "true");
        $this->getElement('pre_printed_barcode')->setAttrib("disabled", "true");
        $this->getElement('gtin')->setAttrib("disabled", "true");
        $this->getElement('batch')->setAttrib("disabled", "true");
        $this->getElement('expiry')->setAttrib("disabled", "true");
    }

    public function readOnlyFields() {
        $this->getElement('gtin_start_position')->setAttrib("readonly", "true");
        $this->getElement('batch_no_start_position')->setAttrib("readonly", "true");
        $this->getElement('expiry_date_start_position')->setAttrib("readonly", "true");
        $this->getElement('gtin_end_position')->setAttrib("readonly", "true");
        $this->getElement('batch_no_end_position')->setAttrib("readonly", "true");
        $this->getElement('expiry_date_end_position')->setAttrib("readonly", "true");
        $this->getElement('gtin')->setAttrib("disabled", "true");
        $this->getElement('batch')->setAttrib("disabled", "true");
        $this->getElement('expiry')->setAttrib("disabled", "true");
    }

}
