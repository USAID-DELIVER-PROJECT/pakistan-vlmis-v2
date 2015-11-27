<?php

class Zend_View_Helper_AllLevelLocationsCombo extends Zend_View_Helper_Abstract {

    public function allLevelLocationsCombo($office_term = "", $postfix = null) {

        $identity = App_Auth::getInstance();
        $translate = Zend_Registry::get('Zend_Translate');
        $base_url = Zend_Registry::get('baseurl');
        $user_lvl = $identity->getRoleId();

        switch ($user_lvl) {
            case 1:
            case 2:
            case 3:
                $arr_province = array(
                    '1' => $translate->translate('Federal'),
                    '2' => $translate->translate('Province')
                );
                break;
            case 4:
                $arr_province = array(
                    '1' => $translate->translate('Federal'),
                    '2' => $translate->translate('Province')
                );
                break;
            case 5:
                $arr_province = array(
                    '2' => $translate->translate('Province')
                );
                break;
            case 6:
                $arr_province = array(
                    '2' => $translate->translate('Province')
                );
                break;
            case 7:
                $arr_province = array(
                );
            case 8:
                $arr_province = array(
                    '7' => $translate->translate('District')
                );
                break;
            default:
                $arr_province = array(
                    '1' => $translate->translate('Federal'),
                    '2' => $translate->translate('Province')
                );
                break;
        }
        ?>
        <div class="control-group span12" id="all_level_combo">
            <div class="col-md-3">
                <label class="control-label" for="office" class="col-md-7"><?php if (empty($office_term))
            echo $translate->translate("Office");
        else
            echo $office_term;
        ?> <span class="red">*</span></label>
                <div class="controls">
                    <select name="office" id="office<?php echo $postfix; ?>" class="col-md-10">
                        <option value=""><?php echo $translate->translate("Select"); ?></option>
                        <?php
                        foreach ($arr_province as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3" id="div_combo1<?php echo $postfix; ?>" <?php if (empty($translate->prov_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } else { ?> style="display:block;"<?php } ?>>
                <label class="control-label" id="lblcombo1"><?php echo $translate->translate("Province"); ?> <span class="red">*</span></label>
                <div class="controls">
                    <select name="combo1" id="combo1<?php echo $postfix; ?>" class="col-md-10">
                    </select>
                </div>
            </div>	
            <div class="col-md-3" id="div_combo2<?php echo $postfix; ?>" <?php if (empty($translate->dist_id) || isset($translate->office_id) == 1 || empty($translate->office_id)) { ?> style="display:none;" <?php } ?>>		
                <label class="control-label" id="lblcombo2"><?php echo $translate->translate("District"); ?> <span class="red">*</span></label>
                <div class="controls">
                    <select name="combo2" id="combo2<?php echo $postfix; ?>" class="col-md-10">
                    </select>
                </div>
            </div>
            <div class="col-md-1" id="loader<?php echo $postfix; ?>" style="display:none;"><img src="<?php echo $base_url; ?>/images/loader.gif" style="margin-top:8px; float:left" alt="" /></div>
        </div>
        <?php
        return true;
    }

}
?>