<?php

/**
 * Form_Procurements
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Procurements
 */
class Form_Procurements extends Form_Base {

    /**
     * $_fields
     * @var type 
     */
    private $_fields = array(
        "shipment_date" => "Shipment Date",
        "transaction_number" => "Transaction Number",
        "transaction_reference" => "Transaction Reference",
        "from_warehouse_id" => "From Warehouse Id",
        "comments" => "Comments",
        "vvm_type_id" => "VVM Type",
        "vvm_stage" => "VVM Stage",
        "quantity" => "Quantity",
        "number" => "Batch Number",
        "expiry_date" => "Expiry Date",
        "item_id" => "Product",
        "status" => "Status",
        "unit_price" => "Unit Price (US $)",
        "production_date" => "Production Date",
        'activity_id' => 'Purpose',
        'campaign_id' => 'Campaign ID',
        'manufacturer_id' => 'Manufacturer ID',
        'cold_chain' => 'Cold Chain'
    );

    /**
     * $_hidden
     * @var type 
     */
    private $_hidden = array(
        "pk_id" => "ID",
        "hdn_transaction_date" => "hdn_transaction_date"
    );

    /**
     * $_list
     * @var type 
     */
    private $_list = array(
        'from_warehouse_id' => array(),
        'item_id' => array(),
        'vvm_type_id' => array(),
        'vvm_stage' => array(),
        'activity_id' => array(),
        "status" => array(),
        'campaign_id' => array('' => 'Select'),
        'manufacturer_id' => array(),
        'cold_chain' => array('' => 'Select')
    );

    /**
     * Initializes Form Fields
     */
    public function init() {
        //Generate WareHouses Combo
        $warehouse = new Model_Warehouses();
        $result1 = $warehouse->getSupplierWarehouses();
        foreach ($result1 as $wh) {
            $this->_list["from_warehouse_id"][$wh['pk_id']] = $wh['warehouse_name'];
        }

        //Generate Purpose(activity_id) combo 
        $this->_list["activity_id"][''] = 'Select';
        $stk_activities = new Model_StakeholderActivities();
        $result4 = $stk_activities->getAllStakeholderActivitiesIssues();
        if ($result4) {
            foreach ($result4 as $stk_activity) {
                $this->_list["activity_id"][$stk_activity['pkId']] = $stk_activity['activity'];
            }
        }
        // Generate Status Combo
        $this->_list["status"]['Received'] = 'Received';
        $this->_list["status"]['Pre Shipment Alert'] = 'Pre Shipment Alert';
        $this->_list["status"]['PO'] = 'PO';
        $this->_list["status"]['Tender'] = 'Tender';
        $this->_list["item_id"][""] = "Select";

        $this->_list["vvm_stage"][""] = "NA";
        $this->_list["manufacturer_id"][""] = "Select";

        //Generate VVM Type Combo
        $vvmtypes = new Model_VvmTypes();
        $result3 = $vvmtypes->getAll();
        $this->_list["vvm_type_id"][''] = 'Select';
        foreach ($result3 as $vvmtype) {
            $this->_list["vvm_type_id"][$vvmtype['pk_id']] = $vvmtype['vvm_type_name'];
        }

        //Generate Asset Sub Type Combo
        $cold_chain = new Model_ColdChain();
        $cold_chain->form_values = array('type_id' => '1,3');
        $result3 = $cold_chain->getColdchainByAssetType();
        $this->_list["cold_chain"][''] = "Select Cold Chain";
        foreach ($result3 as $assetsubtype) {
            $this->_list["cold_chain"][$assetsubtype['pk_id']] = $assetsubtype['asset_name'] . " - " . $assetsubtype['make_name'];
        }

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "transaction_reference":
                case "number":
                case "unit_price":
                case "quantity":
                    parent::createText($col);
                    break;
                case "comments":
                    parent::createMultiLineText($col, "2");
                    break;
                case "shipment_date":
                case "production_date":
                case "expiry_date":
                case "transaction_number":
                    parent::createReadOnlyText($col);
                    break;
                default:
                    break;
            }

            if (in_array($col, array_keys($this->_list))) {
                parent::createSelectWithValidator($col, $name, $this->_list[$col]);
            }
        }

        foreach ($this->_hidden as $col => $name) {
            if ($col == "hdn_transaction_date") {
                parent::createHidden($col);
            }
        }
    }

    /**
     * Add Hidden Fields
     */
    public function addHidden() {
        parent::createHiddenWithValidator("id");
    }

    /**
     * Get Products By Activity
     * 
     * @param type $type
     */
    public function getProductsByActivity($type) {
        //Generate Products(items) Combo
        $items = array();
        $sips = new Model_StakeholderItemPackSizes();
        $sips->form_values['stakeholder_id'] = $type;
        $result2 = $sips->getAllProductsByStakeholderType();
        $items[''] = "Select";
        if ($result2) {
            foreach ($result2 as $item) {
                $items[$item['item_pack_size_id']] = $item['item_name'];
            }
        }

        $this->getElement("item_id")->setMultiOptions($items);
        $this->getElement("manufacturer_id")->setMultiOptions(array("" => "Select"));
    }

    /**
     * Get Manufacturer By Product Id
     * 
     * @param type $item_id
     */
    public function getManufacturerByProductId($item_id) {
        $stakeholder_items = new Model_Stakeholders();
        $stakeholder_items->form_values['item_id'] = $item_id;
        $associated = $stakeholder_items->getManufacturerByProduct();
        if ($associated) {
            foreach ($associated as $item) {
                $manufacturers[$item['pkId']] = $item['stakeholderName'];
            }
        }
        $this->getElement("manufacturer_id")->setMultiOptions($manufacturers);
    }

}
