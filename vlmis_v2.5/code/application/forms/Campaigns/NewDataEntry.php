<?php

class Form_Campaigns_NewDataEntry extends Zend_Form {

    private $_fields = array(
        "campaign_id" => "Campaigns",
        "item_id" => "Product",
        "campaign_day" => "campaign_day",
        "wh_id" => "wh_id",
        "wh_name" => "wh_name",
        "daily_target" => "daily_target",
        "household_visited" => "household_visited",
        "multiple_family_household" => "multiple_family_household",
        "target_age_six_months" => "target_age_six_months",
        "target_age_sixty_months" => "target_age_sixty_months",
        "total_coverage" => "total_coverage",
        "refusal_covered" => "refusal_covered",
        "coverage_mobile_children" => "coverage_mobile_children",
        "coverage_not_accessible" => "coverage_not_accessible",
        "record_not_accessible" => "record_not_accessible",
        "record_refusal" => "record_refusal",
        "reported_with_weakness" => "reported_with_weakness",
        "zero_dose" => "zero_dose",
        "teams_reported" => "teams_reported",
        "inaccessible_coverage" => "inaccessible_coverage",
        "vials_given" => "vials_given",
        "vials_used" => "vials_used",
        "vials_expired" => "vials_expired",
        "vials_returned" => "vials_returned",
        "recon_syr_wasted" => "recon_syr_wasted",
        "ad_syr_wasted" => "ad_syr_wasted"
    );
    private $_hidden = array(
    );
    private $_list = array(
        'campaign_id' => array(),
        "item_id" => array(),
        "campaign_day" => array(),
        "wh_id" => array(),
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
     //$district_id = 33;
        $campaign = new Model_Campaigns();
        if ($role_id == Model_Roles::CAMPAIGN && empty($warehouse_id)) {
            $result1 = $campaign->allCampaigns();
            $this->_list["campaign_id"][''] = 'Select';
            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
            }
        } else {
            $campaign->form_values['district_id'] = $district_id;
            $result1 = $campaign->districtCampaigns();
            $this->_list["campaign_id"][''] = 'Select';
            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
            }
        }

        $campaign->form_values['province_id'] = $auth->getProvinceId();
        $result2 = $campaign->getProvinces();
        $this->_list["province_id"][''] = 'Select';
        foreach ($result2 as $row) {
            $this->_list["province_id"][$row['pkId']] = $row['locationName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "wh_name":
                case "daily_target":
                case "household_visited":
                case "multiple_family_household":
                case "target_age_six_months":
                case "target_age_sixty_months":
                case "total_coverage":
                case "refusal_covered":
                case "coverage_mobile_children":
                case "coverage_not_accessible":
                case "record_not_accessible":
                case "record_refusal":
                case "reported_with_weakness":
                case "zero_dose":
                case "teams_reported":
                case "inaccessible_coverage":
                case "vials_given":
                case "vials_used":
                case "vials_expired":
                case "vials_returned":
                case "recon_syr_wasted":
                case "ad_syr_wasted":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'value' => '0'),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    $this->getElement($col)->setValue(0);
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
    }

}
