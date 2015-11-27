<?php

class Form_Procurements extends Zend_Form {

    private $_fields = array(
        "shipment_date" => "Shipment Date",
        "transaction_number" => "Transaction Number",
        "transaction_reference" => "Transaction Reference",
        "from_warehouse_id" => "From Warehouse Id",
        "comments" => "Comments",
        "vvm_type_id" => "VVM Type",
        "vvm_stage" => "VVM Stage",
        "quantity" => "Quantity",
        "number" => "Batch Number",
        "expiry_date" => "Expiry Date",
        "item_id" => "Product",
        "status" => "Status",
        "unit_price" => "Unit Price (US $)",
        "production_date" => "Production Date",
        'activity_id' => 'Purpose',
        'campaign_id' => 'Campaign ID',
        'manufacturer_id' => 'Manufacturer ID',
        'cold_chain' => 'Cold Chain'
    );
    private $_hidden = array(
        "pk_id" => "ID",
        "hdn_transaction_date" => "hdn_transaction_date"
    );
    private $_list = array(
        'from_warehouse_id' => array(),
        'item_id' => array(),
        'vvm_type_id' => array(),
        'vvm_stage' => array(),
        'activity_id' => array(),
        "status" => array(),
        'campaign_id' => array('' => 'Select'),
        'manufacturer_id' => array(),
        'cold_chain' => array('' => 'Select')
    );

    public function init() {
        //Generate WareHouses Combo
        $warehouse = new Model_Warehouses();
        $result1 = $warehouse->getSupplierWarehouses();
        foreach ($result1 as $wh) {
            $this->_list["from_warehouse_id"][$wh['pk_id']] = $wh['warehouse_name'];
        }

        //Generate Purpose(activity_id) combo 
        $stk_activities = new Model_StakeholderActivities();
        $result4 = $stk_activities->getAllStakeholderActivitiesIssues();
        if ($result4) {
            $stakeholder_id = $result4[0]['pkId'];
            foreach ($result4 as $stk_activity) {
                $this->_list["activity_id"][$stk_activity['pkId']] = $stk_activity['activity'];
            }
        }
        // Generate Status Combo
        $this->_list["status"]['Received'] = 'Received';
        $this->_list["status"]['Pre Shipment Alert'] = 'Pre Shipment Alert';
        $this->_list["status"]['PO'] = 'PO';
        $this->_list["status"]['Tender'] = 'Tender';


        //Generate Products(items) Combo
        $sips = new Model_StakeholderItemPackSizes();
        $sips->form_values['stakeholder_id'] = $stakeholder_id;
        $result2 = $sips->getAllProductsByStakeholderType();
        $this->_list["item_id"][""] = "Select";
        if ($result2) {
            //$item_id = $result2[0]['item_pack_size_id'];
            foreach ($result2 as $item) {
                $this->_list["item_id"][$item['item_pack_size_id']] = $item['item_name'];
            }
        }

        $this->_list["vvm_stage"][""] = "NA";
        $this->_list["manufacturer_id"][""] = "Select";
        //Generate manufacturer Combo
        /* $stakeholder_items = new Model_Stakeholders();
          $stakeholder_items->form_values['item_id'] = $item_id;
          $associated = $stakeholder_items->getManufacturerByProduct();
          if ($associated) {
          foreach ($associated as $row) {
          $this->_list["manufacturer_id"][$row['pkId']] = $row['stakeholderName'];
          }
          } */

        //Generate VVM Type Combo
        $vvmtypes = new Model_VvmTypes();
        $result3 = $vvmtypes->getAll();
        $this->_list["vvm_type_id"][''] = 'Select';
        foreach ($result3 as $vvmtype) {
            $this->_list["vvm_type_id"][$vvmtype['pk_id']] = $vvmtype['vvm_type_name'];
        }

        //Generate Asset Sub Type Combo
        $cold_chain = new Model_ColdChain();
        $cold_chain->form_values = array('type_id' => '1,3');
        $result3 = $cold_chain->getColdchainByAssetType();
        $this->_list["cold_chain"][''] = "Select Cold Chain";
        foreach ($result3 as $assetsubtype) {
            $this->_list["cold_chain"][$assetsubtype['pk_id']] = $assetsubtype['asset_name'] . " - " . $assetsubtype['make_name'];
        }

        //Generate Campaigns Combo
        /*
          $campaigns = new Model_Campaigns();
          $result4 = $campaigns->allCampaignsFutureDate();
          $this->_list["campaign_id"][''] = "Select";
          foreach ($result4 as $campaign_one) {
          $this->_list["campaign_id"][$campaign_one['pkId']] = $campaign_one['campaignName'];
          } */

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "transaction_reference":
                case "number":
                case "unit_price":
                case "quantity":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "comments":
                    $this->addElement("textarea", $col, array(
                        "attribs" => array("class" => "form-control", "rows" => "2"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "shipment_date":
                case "production_date":
                case "expiry_date":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;



                case "transaction_number":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }

            //if ($col == "manufacturer_id") {
            //  $attribute_class = "col-md-2 form-control input-small";
            //} else {
            $attribute_class = "form-control";
            //}
            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => "$attribute_class"),
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
                case "hdn_transaction_date":
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

    public function getProductsByActivity($type) {
        //Generate Products(items) Combo
        $items = array();
        $sips = new Model_StakeholderItemPackSizes();
        $sips->form_values['stakeholder_id'] = $type;
        $result2 = $sips->getAllProductsByStakeholderType();
        $items[''] = "Select";
        if ($result2) {
            foreach ($result2 as $item) {
                $items[$item['item_pack_size_id']] = $item['item_name'];
            }
        }

        $this->getElement("item_id")->setMultiOptions($items);
        $this->getElement("manufacturer_id")->setMultiOptions(array("" => "Select"));
    }

    public function getManufacturerByProductId($item_id) {
        $stakeholder_items = new Model_Stakeholders();
        $stakeholder_items->form_values['item_id'] = $item_id;
        $associated = $stakeholder_items->getManufacturerByProduct();
        if ($associated) {
            foreach ($associated as $item) {
                $manufacturers[$item['pkId']] = $item['stakeholderName'];
            }
        }
        $this->getElement("manufacturer_id")->setMultiOptions($manufacturers);
    }

}
