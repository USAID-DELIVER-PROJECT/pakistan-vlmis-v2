<?php

class Form_Campaigns_ProductGroups extends Zend_Form {

    private $_fields = array(
        "item_id" => "Product",
        "item_id_add" => "Product",
        "item_id_edit" => "Product",
        "age_group1_min" => "Age Group1 Min",
        "age_group1_max" => "Age Group1 Max",
        "age_group2_min" => "Age Group2 Min",
        "age_group2_max" => "Age Group2 Max"
    );
    private $_hidden = array(
        "campaign_item_groups_id" => "campaign_item_groups_id"
    );
    private $_list = array(
        "item_id" => array(),
        "item_id_add" => array(),
        "item_id_edit" => array(),
    );

    public function init() {

        //$result2 = $_em->getRepository('Items')->findAll();
        $campaign = new Model_Campaigns();
        $result2 = $campaign->campaignVaccines();
        $this->_list["item_id"][''] = 'Select';
        $this->_list["item_id_add"][''] = 'Select';
        $this->_list["item_id_edit"][''] = 'Select';
        foreach ($result2 as $row) {
            $this->_list["item_id"][$row['pkId']] = $row['itemName'];
            $this->_list["item_id_add"][$row['pkId']] = $row['itemName'];
            $this->_list["item_id_edit"][$row['pkId']] = $row['itemName'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {

                case "age_group1_min":
                case "age_group1_max":
                case "age_group2_min":
                case "age_group2_max":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control  input-xsmall",),
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
         foreach ($this->_hidden as $col => $name) {
                switch ($col) {

                    case "campaign_item_groups_id":
                        $this->addElement("hidden", $col);
                        $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                        break;
                    default:
                        break;
                }
            }
    }

}
