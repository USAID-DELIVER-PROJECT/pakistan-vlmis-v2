<?php

class Zend_View_Helper_GetVvmByGroup extends Zend_View_Helper_Abstract {

    public function getVvmByGroup($group_id, $current_vvm, $key) {

        $em = Zend_Registry::get("doctrine");
        $str_sql = $em->createQueryBuilder()
                ->select('vvm')
                ->from("VvmGroups", "vvm")
                ->where("vvm.vvmGroup = $group_id")
                ->andWhere("vvm.vvmStage != $current_vvm");

        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            $select = "<select name='newvvm[".$key."]' class='form-control'>";
            foreach ($row as $vvm) {
                $select .= "<option value='" . $vvm->getVvmStage()->getPkId() . "'>" . ($group_id == 1 ? $vvm->getVvmStage()->getPkId() : $vvm->getVvmStage()->getVvmStageValue() ) . "</option>";
            }
            $select .= "</select>";
        } else {
            $select = "<select name='newvvm[".$key."]' class='form-control'>";
            $select .= "<option value=''></option>";
            $select .= "</select>";
        }

        echo $select;
    }

}

?>