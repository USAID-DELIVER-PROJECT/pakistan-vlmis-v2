<?php

/**
 * Zend_View_Helper_GetTransferPurpose
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage default
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */




/**
 *  Zend View Helper Get Transfer Purpose
 */
class Zend_View_Helper_GetTransferPurpose extends Zend_View_Helper_Abstract {

    /**
     * Get Transfer Purpose
     * @param type $activity_id
     * @param type $key
     */
    public function getTransferPurpose($activity_id, $key) {

        $em = Zend_Registry::get("doctrine");
        $str_sql = $em->createQueryBuilder()
                ->select('sa')
                ->from("StakeholderActivities", "sa")
                ->where("sa.pkId != $activity_id")
                ->andWhere('sa.pkId <> 5');

        $row = $str_sql->getQuery()->getResult();
        if (count($row) > 0) {
            $select = "<select id='".$key."_purpose' name='newpurpose[".$key."]' class='form-control'>";
            $select .= "<option value=''>Select</option>";
            foreach ($row as $purpose) {
                $select .= "<option value='" . $purpose->getPkId() . "'>" . $purpose->getActivity() . "</option>";
            }
            $select .= "</select>";
        } else {
            $select = "<select id='".$key."_purpose' name='newpurpose[".$key."]' class='form-control'>";
            $select .= "<option value=''></option>";
            $select .= "</select>";
        }

        echo $select;
    }

}

?>