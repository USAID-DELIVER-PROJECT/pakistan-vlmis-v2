<?php

class Form_Campaigns_CampaignReadinessUc extends Zend_Form {

    private $_fields = array(
        "campaign_id" => "Campaigns",
        "campaign_add_id" => "Campaigns",
        "campaign_edit_id" => "Campaigns",
        "uc_id" => "uc",
        "uc_add_id" => "uc",
        "uc_edit_id" => "uc",
        "target" => "target",
        "inaccessible_children" => "inaccessible_children",
        "no_of_mobile_teams" => "no_of_mobile_teams",
        "inaccessible_area" => "inaccessible_area",
        "no_of_fixed_teams" => "no_of_fixed_teams",
        "area_in_charge" => "area_in_charge",
        "no_of_transist_points" => "no_of_transist_points",
        "aics_trained" => "aics_trained",
        "no_of_teams_trained" => "no_of_teams_trained",
        "area_mobile_population" => "area_mobile_population",
        "date_upec_meeting" => "date_upec_meeting",
        "target" => "target"
    );
    private $_hidden = array(
        "uc_id_hidden" => "",
        "readiness_uc_id" => "",
        "uc_edit_id_hidden" => "",
        "campaign_add_id_hidden" => "",
        "warehouse_add_id_hidden" => ""
    );
    private $_list = array(
        'campaign_id' => array(),
        // 'campaign_add_id' => array(),
        'campaign_edit_id' => array(),
        'uc_id' => array(),
        'uc_edit_id' => array()
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

        $locations = new Model_Locations();

        $locations->form_values['district_id'] = $district_id;
        $result13 = $locations->getAllUcsByCampaignId();

        $this->_list["uc_id"][''] = 'All';
        // $this->_list["uc_add_id"][''] = 'Select';
        //  $this->_list["uc_edit_id"][''] = 'Select';
        foreach ($result13 as $row) {
            //  $this->_list["uc_id"][$row['pkId']] = $row['warehouseName'];
            // $this->_list["uc_add_id"][$row['pkId']] = $row['warehouseName'];
            //  $this->_list["uc_edit_id"][$row['pkId']] = $row['warehouseName'];
        }

        $campaign = new Model_Campaigns();
        if ($role_id == Model_Roles::CAMPAIGN && empty($warehouse_id)) {
            $result1 = $campaign->allCampaigns();
            $this->_list["campaign_id"][''] = 'Select';
            //   $this->_list["campaign_add_id"][''] = 'Select';
            $this->_list["campaign_edit_id"][''] = 'Select';
            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
                //   $this->_list["campaign_add_id"][$row['pkId']] = $row['campaignName'];
                $this->_list["campaign_edit_id"][$row['pkId']] = $row['campaignName'];
            }
        } else {
            $campaign->form_values['district_id'] = $district_id;
            $result1 = $campaign->districtCampaigns();

            $this->_list["campaign_id"][''] = 'Select';
            //  $this->_list["campaign_add_id"][''] = 'Select';
            $this->_list["campaign_edit_id"][''] = 'Select';
            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
                //  $this->_list["campaign_add_id"][$row['pkId']] = $row['campaignName'];
                $this->_list["campaign_edit_id"][$row['pkId']] = $row['campaignName'];
            }
        }

        /* $campaign->form_values['province_id'] = $auth->getProvinceId();
          $result2 = $campaign->getProvinces();
          $this->_list["province_id"][''] = 'Select';
          foreach ($result2 as $row) {
          $this->_list["province_id"][$row['pkId']] = $row['locationName'];
          } */

        foreach ($this->_fields as $col => $name) {
            switch ($col) {



                case "inaccessible_children":
                case "no_of_mobile_teams":
                case "inaccessible_area" :
                case "no_of_fixed_teams" :
                case "area_in_charge" :
                case "no_of_transist_points" :
                case "aics_trained" :
                case "no_of_teams_trained" :
                case "area_mobile_population" :
                case "uc_add_id":
                case "campaign_add_id":
                case "target":



                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_upec_meeting":

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

                case "readiness_uc_id":
                case "uc_edit_id_hidden":
                case "campaign_add_id_hidden":
                case "warehouse_add_id_hidden":
                case "uc_id_hidden":

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
