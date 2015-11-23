<?php

class Form_Campaigns_CampaignReadiness extends Zend_Form {

    private $_fields = array(
        "campaign_id" => "Campaigns",
        "campaign_add_id" => "Campaigns",
        "num_tally_sheets" => "num_tally_sheets",
        "num_finger_markers" => "num_finger_markers",
        "arrival_date_mobiliztion_material" => "arrival_date_mobiliztion_material",
        "dpec_meeting_date" => "dpec_meeting_date",
        "remarks" => "remarks",
        "dco_attended_meeting" => "dco_attended_meeting",
        "edo_attended_meeting" => "edo_attended_meeting",
        "all_members_attended_meeting" => "all_members_attended_meeting",
        "province_id" => "Province",
        "district_id" => "District",
        "province_edit_id" => "Province",
        "district_edit_id" => "District",
        "campaign_edit_id" => "Campaigns"
    );
    private $_hidden = array(
        "readiness_id" => "",
        "province_id_hidden" => "",
        "district_id_hidden" => ""
    );
    private $_list = array(
        'campaign_id' => array(),
        'campaign_add_id' => array(),
        "province_id" => array('0' => 'Select Campaign'),
        "district_id" => array('0' => 'Select Province'),
        "province_edit_id" => array('0' => 'Select Campaign'),
        "district_edit_id" => array('0' => 'Select Province'),
        "item_id" => array('0' => 'Select Campaign'),
        "day" => array('0' => 'Select Campaign')
    );
    private $_checkbox = array(
        'dco_attended_meeting' => array(
            "dco_attended_meeting" => "Dco Attended Meeting"
        ),
        'edo_attended_meeting' => array(
            "edo_attended_meeting" => "Edo Attended Meeting"
        ),
        'all_members_attended_meeting' => array(
            "all_members_attended_meeting" => "All Members Attended Meeting"
        )
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
        if ($role_id == Model_Roles::CAMPAIGN && empty($warehouse_id)) {
            $result1 = $campaign->allCampaigns();
            $this->_list["campaign_id"][''] = 'Select';
            $this->_list["campaign_add_id"][''] = 'Select';
            $this->_list["campaign_edit_id"][''] = 'Select';

            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
                $this->_list["campaign_add_id"][$row['pkId']] = $row['campaignName'];
                $this->_list["campaign_edit_id"][$row['pkId']] = $row['campaignName'];
            }
        } else {
            $campaign->form_values['district_id'] = $district_id;
            $result1 = $campaign->districtCampaigns();
            $this->_list["campaign_id"][''] = 'Select';
            $this->_list["campaign_add_id"][''] = 'Select';
            $this->_list["campaign_edit_id"][''] = 'Select';


            foreach ($result1 as $row) {
                $this->_list["campaign_id"][$row['pkId']] = $row['campaignName'];
                $this->_list["campaign_add_id"][$row['pkId']] = $row['campaignName'];
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
                case "arrival_date_mobiliztion_material":
                case "dpec_meeting_date":
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
            if (in_array($col, array_keys($this->_checkbox))) {
                $this->addElement("multiCheckbox", $col, array(
                    "attribs" => array(),
                    "allowEmpty" => true,
                    'separator' => '',
                    "filters" => array("StringTrim", "StripTags"),
                    "validators" => array(),
                    "multiOptions" => $this->_checkbox[$col]
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag")->removeDecorator("<br>");
            }
        }
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {

                case "readiness_id":
                case "province_id_hidden":
                case "district_id_hidden":

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
