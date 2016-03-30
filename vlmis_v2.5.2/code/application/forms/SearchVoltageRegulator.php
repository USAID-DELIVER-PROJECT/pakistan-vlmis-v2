<?php

/**
 * Form_SearchVoltageRegulator
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Search Voltage Regulator
 */
class Form_SearchVoltageRegulator extends Form_Base {

    /**
     * $_fields
     * 
     * Form Fields
     * @placed_at: Placed At
     * @catalogue_id: Catalogue ID
     * @quantity: Quantity
     * @ccm_make_id: Make
     * @ccm_model_id: Model
     * @ccm_status_list_id: Working Status
     * @report_type: Report Type
     * 
     * @var type 
     */
    private $_fields = array(
        "placed_at" => "Placed At",
        "catalogue_id" => "Catalogue ID",
        "quantity" => "Quantity",
        "ccm_make_id" => "Make",
        "ccm_model_id" => "Model",
        "ccm_status_list_id" => "Working Status",
        "report_type" => "Report Type"
    );

    /**
     * $_list
     * @var type 
     */
    private $_list = array(
        'ccm_make_id' => array(),
        'ccm_model_id' => array()
    );

    /**
     * $_hidden
     * @var type 
     */
    private $_hidden = array(
        "office_id" => "",
        "combo1_id" => "",
        "warehouse_id" => "",
        "model_id" => ""
    );

    /**
     * $_radio
     * @var type 
     */
    private $_radio = array(
        'placed_at' => array(
            "1" => "Select Store",
            "0" => "Unallocated",
        ),
        'report_type' => array(
            "0" => "Detail View",
            "1" => "Summary View",
        )
    );

    /**
     * Initializes Form Fields
     */
    public function init() {
        //Generate working status Combo
        $ccm_status_list = new Model_CcmStatusList();
        $result1 = $ccm_status_list->getStatusLists();
        $this->_list["ccm_status_list_id"][''] = "Select working status";
        foreach ($result1 as $row) {
            $this->_list["ccm_status_list_id"][$row['pkId']] = $row['ccmStatusListName'];
        }

        //Generate Makes Combo
        $make = new Model_CcmMakes();
        $make->form_values = array('type_id' => Model_CcmAssetTypes::VOLTAGEREGULATOR);
        $result1 = $make->getAllMakesByAssetType();
        $this->_list["ccm_make_id"][''] = "Select Makes";
        foreach ($result1 as $make) {
            $this->_list["ccm_make_id"][$make['pkId']] = $make['ccmMakeName'];
        }

        //Generate Models Combo
        $this->_list["ccm_model_id"][''] = "Select Make First";
        foreach ($this->_hidden as $col => $name) {
            switch ($col) {
                case "office_id":
                case "combo1_id":
                case "warehouse_id":
                case "model_id":
                    parent::createHidden($col);
                    break;
                default:
                    break;
            }
        }
        foreach ($this->_fields as $col => $name) {
            if ($col == "catalogue_id") {
                parent::createText($col);
            }
            if (in_array($col, array_keys($this->_radio))) {
                parent::createRadio($col, $this->_radio[$col]);
            }

            if (in_array($col, array_keys($this->_list))) {
                parent::createSelectWithValidator($col, $name, $this->_list[$col]);
            }
        }
    }

    /**
     * Add Hidden Fields
     */
    public function addHidden() {
        parent::createHiddenWithValidator("id");
    }

}
