<?php

class Form_StockIssue extends Zend_Form {

    private $_fields = array(
        "searchby" => "Search By",
        "transaction_date" => "Transaction Date",
        "transaction_number" => "Transaction Number",
        "transaction_reference" => "Transaction Reference",
        "comments" => "Comments",
        "vvm_stage" => "VVM Stage",
        "quantity" => "Quantity",
        "number" => "Batch Number",
        "expiry_date" => "Expiry Date",
        "item_id" => "Product",
        "warehouse_name" => "Warehouse Name",
        "available_quantity" => "Available Quantity",
        "activity_id" => "Purpose",
        'campaign_id' => 'Campaign ID',
        'dispatch_by' => 'Dispatch By',
        'issue_period' => 'Period',
        'issue_from' => 'Issue From',
        'issue_to' => 'Issued To'
    );
    private $_hidden = array(
        "hdn_transaction_number" => "",
        "hdn_stock_id" => "",
        "hdn_province_id" => "",
        "hdn_district_id" => "",
        "hdn_warehouse_id" => "",
        "hdn_available_quantity" => "",
        "hdn_to_warehouse_id" => "",
        "hdn_master_id" => "",
        "hdn_activity_id" => "",
        "hdn_campaign_id" => "",
        "hdn_transaction_date" => "hdn_transaction_date"
    );
    private $_list = array(
        'searchby' => array(
            "0" => "Select",
            "1" => "Issue No",
            "2" => "Issue Ref",
            "3" => "Batch No"
        ),
        'item_id' => array(),
        'number' => array(),
        'vvm_stage' => array(
            '' => 'NA'
        ),
        'activity_id' => array(),
        'campaign_id' => array('' => 'Select'),
        'issue_period' => array()
    );

    public function init() {

        /* $current_datetime = new DateTime();
          $monthn3_datetime = $current_datetime->modify("-3 months");
          echo $monthn3_datetime->format("m")."<br>";
          $start_month = $monthn3_datetime->format("m");
          $start_year = $monthn3_datetime->format("Y");
          $monthp3_datetime = $current_datetime->modify("+9 months");
          echo $monthp3_datetime->format("m")."<br>";

          $end_month = ceil($monthp3_datetime->format("m")/3);
          echo $end_month;
          exit;
          $end_year = $monthp3_datetime->format("Y"); */

        $quarter = array(
            1 => '1st Quarter',
            2 => '2nd Quarter',
            3 => '3rd Quarter',
            4 => '4th Quarter'
        );
        $this->_list["issue_period"][""] = "Select Period";

        for ($y = 2015; $y <= date("Y"); $y++) {
            for ($q = 1; $q <= 4; $q++) {
                switch ($q) {
                    case 1:
                        $key = "01/01/$y-01/03/$y";
                        break;
                    case 2:
                        $key = "01/04/$y-01/06/$y";
                        break;
                    case 3:
                        $key = "01/07/$y-01/09/$y";
                        break;
                    case 4:
                        $key = "01/10/$y-01/12/$y";
                        break;
                }
                $this->_list["issue_period"][$key] = $quarter[$q] . " - " . $y;
            }
        }
        $this->_list["issue_period"]["custom"] = "Custom";

        //Generate Products(items) Combo
        //$item_pack_sizes = new Model_ItemPackSizes();
        //$items = $item_pack_sizes->getAllWarehouseProducts();
        $this->_list["item_id"][''] = "Select";
        /*if ($items && count($items) > 0) {
            foreach ($items as $item) {
                $this->_list["item_id"][$item['pk_id']] = $item['item_name'];
            }
        }*/

        //Generate Purpose(activity_id) combo 
        $stk_activities = new Model_StakeholderActivities();
        $result1 = $stk_activities->getAllStakeholderActivities();
        foreach ($result1 as $stk_activity) {
            $this->_list["activity_id"][''] = "Select";
            $this->_list["activity_id"][$stk_activity['pkId']] = $stk_activity['activity'];
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "hdn_transaction_number":
                case "hdn_stock_id":
                case "hdn_province_id":
                case "hdn_district_id":
                case "hdn_warehouse_id":
                case "hdn_available_quantity":
                case "hdn_to_warehouse_id":
                case "hdn_master_id":
                case "hdn_activity_id":
                case "hdn_campaign_id":
                case "hdn_transaction_date":
                    $this->addElement("hidden", $col);
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                default:
                    break;
            }
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "transaction_reference":
                case "quantity":
                case "dispatch_by":
                case "issue_from":
                case "issue_to":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control"),
                        "allowEmpty" => false,
                        "filters" => array("StringTrim", "StripTags"),
                        "validators" => array()
                    ));
                    $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
                    break;
                case "expiry_date":
                case "transaction_date":
                case "available_quantity":
                case "transaction_number":
                case "warehouse_name":
                    $this->addElement("text", $col, array(
                        "attribs" => array("class" => "form-control", "readonly" => "true"),
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
                    "multiOptions" => $this->_list[$col],
                    "validators" => array(
                    )
                ));
                $this->getElement($col)->removeDecorator("Label")->removeDecorator("HtmlTag");
            }
        }
    }

    public function makeFieldReadonly() {
        $this->getElement('activity_id')->setAttrib("disabled", "true");
    }

    public function fillBatchCombo($item_id) {
        $auth = new App_Auth();
        $wh_id = $auth->getWarehouseId();
        $em = Zend_Registry::get("doctrine");
        $items = $em->getRepository("StockBatch")->findBy(array("itemPackSize" => $item_id, "status" => "Running", "warehouse" => $wh_id));
        $list_item[''] = "Select";
        foreach ($items as $item) {
            $list_item[$item->getPkId()] = $item->getNumber();
        }

        $this->getElement('number')->setMultiOptions($list_item);
    }

}
