<?php

class Zend_View_Helper_LocationsDelete extends Zend_View_Helper_Abstract {

    public function locationsDelete($location_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("w.pkId")
                ->from('Warehouses', 'w')
                ->join('w.location','l')
                ->where("l.pkId =".$location_id);
       
      
       return $result = $str_sql->getQuery()->getResult();
       
    
        
    }

}

?>