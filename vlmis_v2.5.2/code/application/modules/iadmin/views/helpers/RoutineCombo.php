<?php
/**
 * Zend_View_Helper_RoutineCombo
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Zend View Helper Routine Combo
 */
class Zend_View_Helper_RoutineCombo extends Zend_View_Helper_Abstract {

    protected $_em_read;

    public function __construct() {
        $this->_em_read = Zend_Registry::get('doctrine_read');
    }

    /**
     * Routine Combo
     * @param type $office_term
     */
    public function routineCombo($office_term) {
        $translate = Zend_Registry::get('Zend_Translate');
        // Get base URL.
        $base_url = Zend_Registry::get('baseurl');
        // prepare query.
        $str_sql = $this->_em_read->createQueryBuilder()
                ->select("l.pkId,l.locationName")
                ->from('Locations', 'l')
                ->where("l.parent = 10");
        // Execute and get result.
        $result = $str_sql->getQuery()->getResult();
        ?>

        <div class="col-md-3">
            <label class="control-label" for="province" class="col-md-7"><?php
        echo $translate->translate("Province");
        ?> <span class="red">*</span></label>
            <div class="controls">
                <select name="combo1" id="combo1" class="form-control">
                    <option value=""><?php echo $translate->translate("Select"); ?></option>
        <?php
        foreach ($result as $row) {
            ?>
                        <option value="<?php echo $row['pkId']; ?>" <?php
                        if (!empty($office_term['combo1']) && $row['pkId'] == $office_term['combo1']) {
                            echo 'selected';
                        }
                        ?> ><?php echo $row['locationName']; ?></option>";
                    <?php } ?>

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
                <select name="combo4" id="combo4" class="form-control">
                </select>
            </div>
        </div>

        <div class="col-md-1" id="loader" style="display:none;"><img src="<?php echo $base_url; ?>/images/loader.gif" style="margin-top:8px; float:left" alt="" /></div>
        <?php
    }

}
?>