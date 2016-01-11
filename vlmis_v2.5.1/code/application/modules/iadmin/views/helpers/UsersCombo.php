<?php

class Zend_View_Helper_UsersCombo extends Zend_View_Helper_Abstract {

    public function usersCombo($office_term,$page) {

        $identity = App_Auth::getInstance();
        $translate = Zend_Registry::get('Zend_Translate');
        $base_url = Zend_Registry::get('baseurl');
        $user_lvl = $identity->getRoleId();
        if ($page == "routine") {
            $arr_location_level = array(
                '1' => $translate->translate('National'),
                '2' => $translate->translate('Provincial'),
                '3' => $translate->translate('Division'),
                '4' => $translate->translate('District'),
                '5' => $translate->translate('Tehsil'),
                '6' => $translate->translate('EPI Center')
            );
        }
        if ($page == "im") {
            $arr_location_level = array(
                '1' => $translate->translate('National'),
                '2' => $translate->translate('Provincial'),
                '3' => $translate->translate('Division'),
                '4' => $translate->translate('District'),
                '5' => $translate->translate('Tehsil')
            );
        }

        if ($page == "campaigns") {
            $arr_location_level = array(
                '1' => $translate->translate('National'),
                '2' => $translate->translate('Provincial'),
                '4' => $translate->translate('District')
            );
        }
        ?>
        <div class="col-md-3">
            <label class="control-label" for="office_type" class="col-md-7"><?php
        echo $translate->translate("Office Type");
        ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="office_type" id="office_type" class="form-control">
                    <option value=""><?php echo $translate->translate("Select"); ?></option>
                <?php
                foreach ($arr_location_level as $key => $value) {
                    ?>
                        <option value="<?php echo $key; ?>" <?php if (!empty($office_term['office_type']) && $key == $office_term['office_type']) echo 'selected'; ?> ><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3" id="div_combo1" <?php if (empty($translate->prov_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } else { ?> style="display:block;"<?php } ?>>
            <label class="control-label" id="lblcombo1"><?php echo $translate->translate("Province"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo1" id="combo1" class="form-control">
                </select>
            </div>
        </div>	
        <div class="col-md-3" id="div_combo2" <?php if (empty($translate->dist_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } ?>>		
            <label class="control-label" id="lblcombo2"><?php echo $translate->translate("District"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo2" id="combo2" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-md-3" id="div_combo3" <?php if (empty($translate->tehsil_id)) { ?> style="display:none;" <?php } ?>>
            <label class="control-label" id="lblcombo3"><?php echo $translate->translate("Tehsil"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo3" id="combo3" class="form-control">
                </select>
            </div>
        </div>

        <div class="col-md-3" id="div_combo4" <?php if (empty($translate->uc_id)) { ?> style="display:none;" <?php } ?>>
            <label class="control-label" id="lblcombo4"><?php echo $translate->translate("UC"); ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo4" id="combo4" class="col-md-10">
                </select>
            </div>
        </div>

        <div class="col-md-1" id="loader" style="display:none;"><img src="<?php echo $base_url; ?>/images/loader.gif" style="margin-top:8px; float:left" alt="" /></div>
        <?php
        // return true;
    }

}
?>