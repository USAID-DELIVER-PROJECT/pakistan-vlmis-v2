<?php

class Form_StockReceiveSearch extends Zend_Form {

    private $_fields = array(
        "searchby" => "Search By",
        "number" => "Number",
        "warehouses" => "Warehouse/Supplier",
        "product" => "Product",
        "date_from" => "Date From",
        "activity_id" => "Purpose",
        "date_to" => "Date To",
    );
    private $_list = array(
        'searchby' => array(
            "0" => "Select",
            "1" => "Receive No",
            "2" => "Receive Ref",
            "3" => "Batch No"
        ),
        'product' => array(),
        'warehouses' => array()
    );

    public function init() {
        //Generate Products(items) Combo
        $item_pack_sizes = new Model_ItemPackSizes();
        $result2 = $item_pack_sizes->getAllItems();
        $this->_list["product"][''] = "Select";
        foreach ($result2 as $item) {
            $this->_list["product"][$item['pkId']] = $item['itemName'];
        }


        $warehouses = new Model_Warehouses();

        $result3 = $warehouses->getUserReceiveFromWarehouse();
        foreach ($result3 as $whs) {

            $this->_list["warehouses"][''] = "Select";
            $this->_list["warehouses"][$whs['pkId']] = $whs['warehouseName'];
        }

        $date_from = date('01/m/Y');
        $date_to = date('d/m/Y');

        foreach ($this->_fields as $col => $name) {

            switch ($col) {
                case "number":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_from":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_from
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "date_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", 'readonly' => 'true'),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array(),
                        "value" => $date_to
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
            //Generate Purpose(activity_id) combo 
            $stk_activities = new Model_StakeholderActivities();
            $result4 = $stk_activities->getAllStakeholderActivitiesIssues();
            if ($result4) {
                $stakeholder_id = $result4[0]['pkId'];
                foreach ($result4 as $stk_activity) {
                    $this->_list["activity_id"][''] = "Select";
                    $this->_list["activity_id"][$stk_activity['pkId']] = $stk_activity['activity'];
                }
            }
        }
    }

}
