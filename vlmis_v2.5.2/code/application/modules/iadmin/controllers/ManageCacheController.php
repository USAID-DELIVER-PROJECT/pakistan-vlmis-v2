<?php

/**
 * Iadmin_ManageCacheController
 *
 * 
 *
 *     Logistics Management Information System for Vaccines
 * @subpackage Iadmin
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Controller for Iadmin Manage Cache
 */
class Iadmin_ManageCacheController extends App_Controller_Base {

    /**
     * Iadmin_ManageCacheController index
     */
    public function indexAction() {
        if ($this->_request->isPost() && $this->_request->getPost()) {
            $ignoreList = array('.', '..');
            // path on Test Server
            // path for live server
            chdir('../vlmis/');
            $arrFiles = scandir('cache', 0);
            $files = '';
            foreach ($arrFiles as $file) {
                if (!in_array($file, $ignoreList)) {
                    $files .= $file . '<br />';
                    unlink("cache/$file");
                }
            }
        }
    }

}
