<?php

/**
 * Form_Iadmin_RoleResource
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
*  Form for Iadmin Role Resource
*/

class Form_Iadmin_RoleResource extends Form_Base {

    /**
     * $_fields
     * 
     * Private Variable
     * 
     * Form Fields
     * @role: Role Name
     * @resource: Resource Name
     * @permission: Permission
     * 
     * @var type 
     */
    private $_fields = array(
        "role" => "Role Name",
        "resource" => "Resource Name",
        "permission" => "Permission"
    );
    
    /**
     * $_list
     * @var type 
     */
    private $_list = array(
        'role' => array(),
        'resource' => array(),
        'permission' => array(
            'ALLOW' => 'ALLOW',
            'DENY' => 'DENY'
        )
    );

    /**
     * Initializes Form Fields
     */
    public function init() {

        $roles = new Model_Roles();
        $result = $roles->getRoles();

        if ($result) {
            foreach ($result as $row) {
                $this->_list["role"][$row->getPkId()] = $row->getRoleName();
            }
        }

        $resources = new Model_Resources();
        $result2 = $resources->getAllResources();
        if ($result2) {
            foreach ($result2 as $row2) {
                $resource = $row2->getResourceName();
                $arr_resources = explode("/", $resource);
                $second_name = (!empty($arr_resources[1])) ? ucfirst($arr_resources[1]) . " - " : "";
                $this->_list["resource"][$row2->getPkId()] = ucfirst($arr_resources[0]) . " - " . $second_name . $row2->getDescription();
            }
        }

        foreach ($this->_fields as $col => $name) {
            if (in_array($col, array_keys($this->_list))) {
                parent::createSelect($col, $this->_list[$col]);
            }
        }
    }

}
