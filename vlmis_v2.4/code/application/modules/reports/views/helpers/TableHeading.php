<?php

class Zend_View_Helper_TableHeading extends Zend_View_Helper_Abstract {

    public function tableHeading($order, $sort, $fields = array()) {
        $translate = Zend_Registry::get('Zend_Translate');
        ?>
        <thead>
            <tr>
                <?php foreach ($fields as $key => $value) { ?>
                    <th class="<?php if ($order == $key) { ?>sorting_<?php echo $sort; ?> <?php } else { ?>sorting<?php } ?>" data-order="<?php echo $key; ?>" data-sort="<?php if ($order == $key && $sort == 'asc') { ?>desc<?php } else { ?>asc<?php } ?>"><?php echo $translate->translate($value) ?> </th>
                    <?php } ?>
            </tr>
        </thead>
        <?php
    }

}
