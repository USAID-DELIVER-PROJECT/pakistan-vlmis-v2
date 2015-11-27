<?php

class Form_Campaigns_CampaignSearch extends Zend_Form {

    private $_fields = array(
        "campaign_name" => "Campaign Name",
        "campaign_type_id" => "Campaign Type",
        "item_id" => "Product"
    );
    
    private $_hidden = array(
    );
    
    private $_list = array(
        "campaign_type_id" => array(),
        "item_id" => array()
    );

    public function init() {

        $_em = Zend_Registry::get('doctrine');
        $result1 = $_em->getRepository('CampaignTypes')->findAll();
        $this->_list["campaign_type_id"][''] = 'Select';
        foreach ($result1 as $row) {
            $this->_list["campaign_type_id"][$row->getPkId()] = $row->getCamapignTypeName();
        }

        //$result2 = $_em->getRepository('Items')->findAll();
        $campaign = new Model_Campaigns();
        $result2 = $campaign->campaignVaccines();
        $this->_list["item_id"][''] = 'Select';
        foreach ($result2 as $row) {
            $this->_list["item_id"][$row['pkId']] = $row['itemName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "campaign_name":
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
        }
    }

}
