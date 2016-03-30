<?php

/**
 * Form_Iadmin_Locations
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Form for Iadmin Locations
 */
class Form_Iadmin_Locations extends Form_Base {

    /**
     * Fields
     * for Form_Iadmin_Locations
     * 
     * 
     * $_fields
     *  
     * Form Fields Names
     * @location_name_add: Locaiton Name
     * @location_name_update: Locaiton Name
     * @ccm_location_id: CCEM Code
     * @ccm_location_id_update: CCEM Code
     * @location_type_id: Location Type Id
     * @location_type_id_update: location_type_id
     * @not_used: not_used
     * 
     * @var type 
     */
    private $_fields = array(
        "location_name_add" => "Locaiton Name",
        "location_name_update" => "Locaiton Name",
        "ccm_location_id" => "CCEM Code",
        "ccm_location_id_update" => "CCEM Code",
        "location_type_id" => "Location Type Id",
        "location_type_id_update" => "location_type_id",
        "not_used" => "not_used"
    );

    /**
     * Hidden Fields
     * for Form_Iadmin_Locations
     * 
     * 
     * $_hidden
     * 
     * Hidden Field names
     * @location_id: Pk Id
     * @location_type: Pk Id
     * @province_id: Pk Id
     * @district_id: Pk Id
     * @parent_id: Pk Id
     * @province_id_edit: Pk Id
     * @district_id_edit: Pk Id
     * @parent_id_edit: Pk Id
     * @location_type_id_update_hidden: Pk Id
     * 
     * @var type 
     */
    private $_hidden = array(
        "location_id" => "pkId",
        "location_type" => "pkId",
        "province_id" => "pkId",
        "district_id" => "pkId",
        "parent_id" => "pkId",
        "province_id_edit" => "pkId",
        "district_id_edit" => "pkId",
        "parent_id_edit" => "pkId",
        "location_type_id_update_hidden" => "pkId"
    );

    /**
     * Combo boxes
     * for Form_Iadmin_Locations
     * 
     * 
     * location_type_id
     * location_type_id_update
     * 
     * 
     * $_list
     * @var type 
     */
    private $_list = array(
        'location_type_id' => array(),
        'location_type_id_update' => array()
    );

    /**
     * Chech boxes
     * for Form_Iadmin_Locations
     * 
     * 
     * not_used
     * 
     * 
     * $_checkbox
     * @var type 
     */
    private $_checkbox = array(
        'not_used' => array(
            "0" => "",
        )
    );

    /**
     * Initializes Form Fields
     */
    public function init() {

        foreach ($this->_fields as $col => $name) {
            switch ($col) {
                case "location_name_add":
                case "location_name_update":
                case "ccm_location_id":
                case "ccm_location_id_update":
                    parent::createText($col);
                    break;
                default:
                    break;
            }
            if (in_array($col, array_keys($this->_list))) {
                parent::createSelect($col, $this->_list[$col]);
            }
            if (in_array($col, array_keys($this->_checkbox))) {
                parent::createMultiCheckbox($col, $this->_checkbox[$col]);
            }
        }

        foreach ($this->_hidden as $col => $name) {
            switch ($col) {


                case "location_id":
                case "location_type":
                case "province_id":
                case "district_id":
                case "parent_id":
                case "province_id_edit":
                case "district_id_edit":
                case "parent_id_edit":
                case "location_type_id_update_hidden":
                    parent::createHidden($col);
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * addHidden
     */
    public function addHidden() {
        parent::createHiddenWithValidator("id");
    }

}
