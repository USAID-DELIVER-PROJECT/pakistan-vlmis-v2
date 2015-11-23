<?php

class Form_Campaigns_AddCampaign extends Zend_Form {

    private $_fields = array(
        "campaign_name" => "Campaign Name",
        "date_from" => "Date From",
        "date_to" => "Date To",
        "campaign_type_id" => "Campaign Type",
        "item_id" => "Product",
        "catch_up_days" => "Catch up days"
    );
    private $_hidden = array(
        "id" => "pkId",
        "campaign_id" => "pkId",
        "campaign_update_id" => "pkId"
    );
    private $_list = array(
        "campaign_type_id" => array(),
        "item_id" => array()
    );

    public function init() {
        $campaign_types = new Model_CampaignTypes();
        $result1 = $campaign_types->getAllCampaignTypes();
        $this->_list["campaign_type_id"][''] = 'Select';
        foreach ($result1 as $row) {
            $this->_list["campaign_type_id"][$row['pkId']] = $row['camapignTypeName'];
        }

        //$result2 = $_em->getRepository('Items')->findAll();
        $campaign = new Model_Campaigns();
        $result2 = $campaign->campaignVaccines();

        foreach ($result2 as $row) {
            $this->_list["item_id"][$row['pkId']] = $row['itemName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "campaign_name":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_from":
                case "date_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "catch_up_days":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => true,
                        "required" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }

            if ($col == "item_id") {
                $list_type = "multiselect"; //"multiselect";
            } else {
                $list_type = "select";
            }


            if (in_array($col, array_keys($this->_list))) {
                $this->addElement($list_type, $col, array(
                    "attribs" => array("class" => "form-control",),
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
                case "campaign_id":
                case "campaign_update_id":
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
            "allowEmpty" => true,
            "required" => false,
            "filters" => array("StringTrim"),
            "validators" => array()
        ));
        $this->getElement("id")->removeDecorator("Label")->removeDecorator("HtmlTag");
    }

}
