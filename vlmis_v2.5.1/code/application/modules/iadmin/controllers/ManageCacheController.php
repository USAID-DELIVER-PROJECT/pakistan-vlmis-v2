<?php

class Iadmin_ManageCacheController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $ignoreList = array('.', '..');
                // path on Test Server
                // chdir('../../vlmis/');
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

}
