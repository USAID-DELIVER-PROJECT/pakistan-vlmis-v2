<?php

class Zend_View_Helper_RoutineAddCombo extends Zend_View_Helper_Abstract {

    public function routineAddCombo($page) {
        $identity = App_Auth::getInstance();
        $translate = Zend_Registry::get('Zend_Translate');
        $base_url = Zend_Registry::get('baseurl');
        $user_lvl = $identity->getRoleId();
        $em = Zend_Registry::get('doctrine');
        $str_sql = $em->createQueryBuilder()
                ->select("l.pkId,l.locationName")
                ->from('Locations', 'l')
                ->where("l.parent = 10");
        $result = $str_sql->getQuery()->getResult();
        ?>

        <div class="col-md-4">
            <label class="control-label" for="province" class="col-md-7"><?php
                echo $translate->translate("Province");
                ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo1_add" id="combo1_add" class="form-control">
                    <option value=""><?php echo $translate->translate("Select"); ?></option>
                    <?php
                    foreach ($result as $row) {
                        ?>
                        <option value="<?php echo $row['pkId']; ?>" <?php if (!empty($office_term['combo1']) && $row['pkId'] == $office_term['combo1']) echo 'selected'; ?> ><?php echo $row['locationName']; ?></option>";
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="col-md-4" id="div_combo2_add" <?php if (empty($translate->dist_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } ?>>		
            <label class="control-label" id="lblcombo2_add"><?php echo $translate->translate("District"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo2_add" id="combo2_add" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-md-4" id="div_combo3_add" <?php if (empty($translate->tehsil_id)) { ?> style="display:none;" <?php } ?>>
            <label class="control-label" id="lblcombo3_add"><?php echo $translate->translate("Tehsil"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo3_add" id="combo3_add" class="form-control">
                </select>
            </div>
        </div>

        <div class="col-md-4" id="div_combo4_add" <?php if (empty($translate->uc_id)) { ?> style="display:none;" <?php } ?>>
            <label class="control-label" id="lblcombo4_add"><?php echo $translate->translate("UC"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo4_add" id="combo4_add" class="form-control">
                </select>
            </div>
        </div>

        <div class="col-md-1" id="loader" style="display:none;"><img src="<?php echo $base_url; ?>/images/loader.gif" style="margin-top:8px; float:left" alt="" /></div>
        <?php
        // return true;
    }

}
?>