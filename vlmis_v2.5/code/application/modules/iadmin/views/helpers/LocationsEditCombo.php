<?php

class Zend_View_Helper_LocationsEditCombo extends Zend_View_Helper_Abstract {

    public function locationsEditCombo($office_term = "", $postfix = null) {

        $identity = App_Auth::getInstance();
        $translate = Zend_Registry::get('Zend_Translate');
        $base_url = Zend_Registry::get('baseurl');
        $user_lvl = $identity->getRoleId();
        $arr_location_level_edit = array(
            '3' => $translate->translate('Division'),
            '4' => $translate->translate('District'),
            '5' => $translate->translate('Tehsil'),
            '6' => $translate->translate('UC')
        );
        ?>
        <div class="col-md-4">
            <label class="control-label" for="location_level_edit" class="col-md-7"><?php
                if (empty($office_term))
                    echo $translate->translate("Location Level");
                else
                    echo $office_term;
                ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="location_level_edit" id="location_level_edit" class="form-control">
                    <option value=""><?php echo $translate->translate("Select"); ?></option>
                    <?php
                    foreach ($arr_location_level_edit as $key => $value) {
                        ?>
                        <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4" id="div_combo1_edit" <?php if (empty($translate->prov_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } else { ?> style="display:block;"<?php } ?>>
            <label class="control-label" id="lblcombo1_edit"><?php echo $translate->translate("Province"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo1_edit" id="combo1_edit" class="form-control">
                </select>
            </div>
        </div>	
        <div class="col-md-4" id="div_combo2_edit" <?php if (empty($translate->dist_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } ?>>		
            <label class="control-label" id="lblcombo2_edit"><?php echo $translate->translate("District"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo2_edit" id="combo2_edit" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-md-4" id="div_combo3_edit" <?php if (empty($translate->tehsil_id)) { ?> style="display:none;" <?php } ?>>
            <label class="control-label" id="lblcombo3_edit"><?php echo $translate->translate("Tehsil"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo3_edit" id="combo3_edit" class="form-control">
                </select>
            </div>
        </div>



        <div class="col-md-1" id="loader" style="display:none;"><img src="<?php echo $base_url; ?>/images/loader.gif" style="margin-top:8px; float:left" alt="" /></div>
        <?php
        // return true;
    }

}
?>