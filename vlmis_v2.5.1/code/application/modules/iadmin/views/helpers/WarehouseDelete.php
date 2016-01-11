<?php

class Zend_View_Helper_WarehouseDelete extends Zend_View_Helper_Abstract {

    public function warehouseDelete($warehouse_id) {
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("wu.pkId")
                ->from('WarehouseUsers', 'wu')
                ->join('wu.warehouse', 'w')
                ->where("w.pkId =" . $warehouse_id);

        //echo $str_sql->getQuery()->getSql();  
        return $result = $str_sql->getQuery()->getResult();
    }

}

?>