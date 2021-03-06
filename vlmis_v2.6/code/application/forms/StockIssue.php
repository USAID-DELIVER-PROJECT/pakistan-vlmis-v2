<?php

/**
 * Form_StockIssue
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Stock Issue
 */
class Form_StockIssue extends Form_Base {

    /**
     * Fields 
     * for Form_StockIssue
     * 
     * 
     * searchby
     * transaction_date
     * transaction_number
     * transaction_reference
     * comments
     * vvm_stage
     * quantity
     * number
     * expiry_date
     * item_id
     * warehouse_name
     * available_quantity
     * activity_id
     * campaign_id
     * dispatch_by
     * issue_period
     * issue_from
     * issue_to
     * 
     * 
     * $_fields
     * @var type 
     */
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
        'issue_to' => 'Issued To',
        'used_for' => 'Used for'
    );

    /**
     * Hidden fields for
     * for Form_StockIssue
     * 
     * 
     * hdn_transaction_number
     * hdn_stock_id
     * hdn_province_id
     * hdn_district_id
     * hdn_warehouse_id
     * hdn_available_quantity
     * hdn_to_warehouse_id
     * hdn_master_id
     * hdn_activity_id
     * hdn_campaign_id
     * hdn_transaction_date
     * 
     * 
     * $_hidden
     * @var type 
     */
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

    /**
     * Combo boxes
     * for Form_StockIssue
     * 
     * 
     * searchby
     * item_id
     * vvm_stage
     * activity_id
     * campaign_id
     * issue_period
     * 
     * 
     * $_list
     * @var type 
     */
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
        'issue_period' => array(),
        'used_for' => array()
    );

    /**
     * Initializes Form Fields
     * for Form_StockIssue
     */
    public function init() {
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
                    default :
                        break;
                }
                $this->_list["issue_period"][$key] = $quarter[$q] . " - " . $y;
            }
        }
        $this->_list["issue_period"]["custom"] = "Custom";

        //Generate Products(items) Combo

        $this->_list["item_id"][''] = "Select";

        //Generate Purpose(activity_id) combo 
        $stk_activities = new Model_StakeholderActivities();
        $result1 = $stk_activities->getAllStakeholderActivities();
        foreach ($result1 as $stk_activity) {
            $this->_list["activity_id"][''] = "Select";
            $this->_list["activity_id"][$stk_activity['pkId']] = $stk_activity['activity'];
        }

        //Generating hidden fields 
        //for Form_StockIssue
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
                    parent::createHidden($col);
                    break;
                default:
                    break;
            }
        }

        //Generating fields
        //for Form_StockIssue
        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "transaction_reference":
                case "quantity":
                case "dispatch_by":
                case "issue_from":
                case "issue_to":
                    parent::createText($col);
                    break;
                case "expiry_date":
                case "transaction_date":
                case "available_quantity":
                case "transaction_number":
                case "warehouse_name":
                    parent::createReadOnlyText($col);
                    break;
                case "comments":
                    parent::createMultiLineText($col, "2");             
                    break;
                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                parent::createSelect($col, $this->_list[$col]);
            }
        }
    }

    /**
     * Make Field Readonly
     */
    public function makeFieldReadonly() {
        $this->getElement('activity_id')->setAttrib("disabled", "true");
    }

    /**
     * Fill Batch Combo
     * @param type $item_id
     */
    public function fillBatchCombo($item_id) {
        $auth = new App_Auth();
        $wh_id = $auth->getWarehouseId();
        $em = Zend_Registry::get('doctrine_read');
        
        $str_sql = $em->createQueryBuilder()
                ->select("sbw.pkId,sb.number")
                ->from('StockBatchWarehouses', 'sbw')
                ->join('sbw.stockBatch', 'sb')
                ->join('sb.packInfo', 'pi')
                ->join('pi.stakeholderItemPackSize', 'sip')
                ->where("sip.itemPackSize = '" . $item_id . "' ")
                ->andWhere("sbw.warehouse = '$wh_id' ")
                ->andWhere("sbw.status = 'Running' ");

        $items = $str_sql->getQuery()->getResult();

        $list_item[''] = "Select";
        foreach ($items as $item) {
            $list_item[$item['pkId']] = $item['number'];
        }

        $this->getElement('number')->setMultiOptions($list_item);
    }

}
