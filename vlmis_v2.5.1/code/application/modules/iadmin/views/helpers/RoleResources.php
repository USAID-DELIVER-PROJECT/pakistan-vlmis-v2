<?php

/**
 * Zend_View_Helper_RoleResources
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Role Resources
 */

class Zend_View_Helper_RoleResources extends Zend_View_Helper_Abstract {

    /**
     * Role Resources
     * @param type $resource_id
     * @param type $role_id
     * @return type
     */
    public function roleResources($resource_id, $role_id) {
        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "Select * from role_resources where role_id = '$role_id' and resource_id = '$resource_id' ";

        $row = $this->_em->getConnection()->prepare($querypro);

        $row->execute();
        return $row->fetchAll();
    }

}

?>