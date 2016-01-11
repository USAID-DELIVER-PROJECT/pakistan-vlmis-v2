<?php

class Form_Cadmin_ModelsAdd extends Zend_Form {

    private $_fields = array(
        'ccm_model_name' => 'model name',
        'asset_dimension_length' => 'asset dimension length',
        'asset_dimension_width' => 'asset dimension width',
        'asset_dimension_height' => 'asset dimension height',
        'gross_capacity_20' => 'gross capacity 20',
        'gross_capacity_4' => 'gross capacity 4',
        'net_capacity_20' => 'net capacity 20',
        'net_capacity_4' => 'net capacity 4',
        'cfc_free' => 'cfc free',
        'no_of_phases' => 'no of phases',
        'status' => 'status',
        'reasons' => 'reasons',
        'utilizations' => 'utilizations',
        'temperature_type' => 'temperature type',
        'catalogue_id' => 'catalogue id',
        'gas_type' => 'gas type',
        'ccm_make_id' => 'make',
        'ccm_asset_type_id_popup' => 'asset type',
        'ccm_asset_type_id_update' => 'asset type',
        'ccm_asset_sub_type' => 'asset sub type',
        'ccm_asset_sub_type_update' => 'asset sub type'
    );
    private $_list = array(
        'status' => array(
            "0" => "In Active",
            "1" => "Active",
            "2" => "Draft"
        ),
        'ccm_make_id' => array(),
        'reason' => array(),
        'utilization' => array(),
        'temperature_type' => array(),
        'gas_type' => array(),
        "ccm_asset_type_id_popup" => array(),
        "ccm_asset_type_id_update" => array(),
        "ccm_asset_sub_type" => array('' => 'Select Asset Type First'),
        "ccm_asset_sub_type_update" => array('' => 'Select Asset Type First')
    );
    private $_radio = array(
        'cfc_free' => array(
            "2" => "Not Applicable",
            "1" => "Yes",
            "0" => "No",
        ),
        'temperature_type' => array(
            "0" => "Positive",
            "1" => "Negative",
            "2" => "Both",
        ),
        'no_of_phases' => array(
            "1" => "One",
            "3" => "Three",
        ),
    );

    public function init() {
        // Makes Combo
        $ccm_makes = new Model_CcmMakes();
        $result1 = $ccm_makes->getAllMakesForAddForm();
        $this->_list["ccm_make_id"][''] = "Select";

        if ($result1 != false) {
            foreach ($result1 as $rs) {
                $this->_list["ccm_make_id"][$rs['pkId']] = $rs['ccmMakeName'];
            }
        }

        //Refrigerant Gas Type Combo
        /* $list_master = new Model_ListMaster();
          $list_master->form_values = array('pk_id' => Model_ListMaster::REFRRIGERATOR_GAS_TYPE);
          $result2 = $list_master->getListDetailByType();
          $this->_list["gas_type"][''] = "Select";
          if ($result2 != false) {
          foreach ($result2 as $rs) {
          $this->_list["gas_type"][$rs['pkId']] = $rs['listValue'];
          }
          } */

        //Generate Asset Types Combo
        $asset_type = new Model_CcmAssetTypes();
        $result3 = $asset_type->getAssetSubTypes();

        $this->_list["ccm_asset_type_id_popup"][''] = "Select";
        $this->_list["ccm_asset_type_id_update"][''] = "Select";
        foreach ($result3 as $rs) {
            $this->_list["ccm_asset_type_id_popup"][$rs['pkId']] = $rs['assetTypeName'];
            $this->_list["ccm_asset_type_id_update"][$rs['pkId']] = $rs['assetTypeName'];
        }

        //Generate Asset Sub Types Combo
        $asset_type2 = new Model_CcmAssetTypes();
        $asset_type2->form_values['parent_id'] = 'childs';
        $result4 = $asset_type2->getAssetSubTypes();
        $this->_list["ccm_asset_sub_type"][''] = "Select";
        foreach ($result4 as $rs) {
            $this->_list["ccm_asset_sub_type"][$rs['pkId']] = $rs['assetTypeName'];
            $this->_list["ccm_asset_sub_type_update"][$rs['pkId']] = $rs['assetTypeName'];
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
                case "asset_dimension_length":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Length"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "asset_dimension_width":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Width"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "asset_dimension_height":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Height"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "gross_capacity_4":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap 4"),
                        "allowEmpty" => false,
                        "required" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(
                            array(
                                "validator" => "Float",
                                "breakChainOnFailure" => false,
                                "options" => array(
                                    "messages" => array("notFloat" => $name . " must be a valid option")
                                )
                            )
                    )));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "gross_capacity_20":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Gross Cap 20"),
                        "allowEmpty" => false,
                        "required" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(
                            array(
                                "validator" => "Float",
                                "breakChainOnFailure" => false,
                                "options" => array(
                                    "messages" => array("notFloat" => $name . " must be a valid option")
                                )
                            )
                    )));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_4":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap 4"),
                        "allowEmpty" => false,
                        "required" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(
                            array(
                                "validator" => "Float",
                                "breakChainOnFailure" => false,
                                "options" => array(
                                    "messages" => array("notFloat" => $name . " must be a valid option")
                                )
                            )
                    )));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                case "net_capacity_20":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "placeholder" => "Net Cap 20"),
                        "allowEmpty" => false,
                        "required" => true,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(
                            array(
                                "validator" => "Float",
                                "breakChainOnFailure" => false,
                                "options" => array(
                                    "messages" => array("notFloat" => $name . " must be a valid option")
                                )
                            )
                    )));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;

                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => 'form-control'),
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
