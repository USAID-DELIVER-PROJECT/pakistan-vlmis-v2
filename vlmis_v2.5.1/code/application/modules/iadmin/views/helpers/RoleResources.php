<?php

class Zend_View_Helper_RoleResources extends Zend_View_Helper_Abstract {

    public function roleResources($resource_id, $role_id) {
        $this->_em = Zend_Registry::get('doctrine');

        $querypro = "Select * from role_resources where role_id = '$role_id' and resource_id = '$resource_id' ";
    
      $row = $this->_em->getConnection()->prepare($querypro);

        $rs = $row->execute();
        $result = $row->fetchAll();

        return $result;
    }

}

?>