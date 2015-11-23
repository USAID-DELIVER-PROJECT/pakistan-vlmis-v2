<?php

class Zend_View_Helper_RecordsPerPage extends Zend_View_Helper_Abstract {

    public function recordsPerPage($counter) {
        ?>
        <div class="dataTables_length">
            <label>
                <select name="records" id="records" class="form-control">
                    <option value="10" <?php if($counter == 10 ){ ?>selected="selected" <?php } ?>>10</option>
                    <option value="25" <?php if($counter == 25 ){ ?>selected="selected" <?php } ?>>25</option>
                    <option value="50" <?php if($counter == 50 ){ ?>selected="selected" <?php } ?>>50</option>
                    <option value="100" <?php if($counter == 100 ){ ?>selected="selected" <?php } ?>>100</option>
                    <option value="250" <?php if($counter == 250 ){ ?>selected="selected" <?php } ?>>250</option>
                </select> 
                records per page
            </label>
        </div>
        <?php
    }

}
