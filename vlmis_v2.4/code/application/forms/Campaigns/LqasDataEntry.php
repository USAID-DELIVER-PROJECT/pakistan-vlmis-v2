<?php

class Form_Campaigns_LqasDataEntry extends Zend_Form {

    private $_fields = array(
        "campaign_id" => "Campaigns",
        "campaign_search_id" => "Campaigns",
        "campaign_edit_id" => "Campaigns",
        "province_id" => "Province",
        "district_id" => "District",
        "uc_id" => "Uc",
        "province_edit_id" => "Province",
        "district_edit_id" => "District",
        "uc_edit_id" => "Uc",
        "item_id" => "Product",
        "surveyor" => "surveyor",
        "checked" => "surveryor",
        "unvaccinted" => "unvaccinted",
        "remarks" => "remarks"
    );
    private $_hidden = array(
        "province_id_hidden" => "",
        "district_id_hidden" => "",
        "uc_id_hidden" => "",
        "lqas_id" => ""
    );
    private $_list = array(
        'campaign_id' => array(),
        'campaign_search_id' => array(),
        'campaign_edit_id' => array(),
        "province_id" => array('0' => 'Select Campaign'),
        "district_id" => array('0' => 'Select Province'),
        "uc_id" => array(),
        "province_edit_id" => array('0' => 'Select Campaign'),
        "district_edit_id" => array('0' => 'Select Province'),
        "uc_edit_id" => array(),
        "item_id" => array('0' => 'Select Campaign'),
        "day" => array('0' => 'Select Campaign'),
    );

    public function init() {
        $auth = App_Auth::getInstance();
        $role_id = $auth->getRoleId();
        if ($auth->getStakeholderId() != 10) {
            $warehouse_id = $auth->getWarehouseId();
        } else {
            $warehouse_id = "";
        }
        $district_id = $auth->getDistrictId($auth->getIdentity());

        $campaign = new Model_Campaigns();
//        if ($role_id == Model_Roles::CAMPAIGN && empty($warehouse_id)) {
        $result1 = $campaign->allCampaigns();
        $this->_list["campaign_id"][''] = 'Select';
        $this->_list["campaign_search_id"][''] = 'Select';
        $this->_list["campaign_edit_id"][''] = 'Select';
        foreach ($result1 as $row) {
            $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
            $this->_list["campaign_search_id"][$row['pkId']] = $row['campaignName'];
            $this->_list["campaign_edit_id"][$row['pkId']] = $row['campaignName'];
        }
//        } else {
//            $campaign->form_values['district_id'] = $district_id;
//            $result1 = $campaign->districtCampaigns();
//            $this->_list["campaign_id"][''] = 'Select';
//            $this->_list["campaign_search_id"][''] = 'Select';
//            $this->_list["campaign_edit_id"][''] = 'Select';
//
//            foreach ($result1 as $row) {
//                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
//                $this->_list["campaign_search_id"][$row['pkId']] = $row['campaignName'];
//                $this->_list["campaign_edit_id"][$row['pkId']] = $row['campaignName'];
//            }
//        }

        /* $campaign->form_values['province_id'] = $auth->getProvinceId();
          $result2 = $campaign->getProvinces();
          $this->_list["province_id"][''] = 'Select';
          foreach ($result2 as $row) {
          $this->_list["province_id"][$row['pkId']] = $row['locationName'];
          } */

        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "surveyor":
                case "checked":
                case "unvaccinted" :
                case "remarks" :
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;


                case "num_tally_sheets":
                case "num_finger_markers":
                case "remarks" :
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

            if ($col == "campaign_id") {
                $attribute_class = "form-control";
            } else {
                $attribute_class = "form-control";
            }

            if (in_array($col, array_keys($this->_list))) {
                $this->addElement("select", $col, array(
                    "attribs" => array("class" => $attribute_class),
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

                case "province_id_hidden":
                case "district_id_hidden":
                case "uc_id_hidden":
                case "lqas_id":

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
