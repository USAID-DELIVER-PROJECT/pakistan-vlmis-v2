<?php

class Iadmin_ManageCacheController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        if ($this->_request->isPost()) {
            if ($this->_request->getPost()) {
                $ignoreList = array('.', '..');
                //chdir('../../vlmis/'); //path on Test Server
                chdir('../vlmis/'); //path for live server
                $arrFiles = scandir('cache', 0);
                //echo getcwd()."<hr>";
                $files = '';
                foreach ($arrFiles as $file) {
                    if (!in_array($file, $ignoreList)) {
                        $files .= $file . '<br />';
                        unlink("cache/$file");
                    }
                }
                //$this->view->files = $files;
            }
        }
    }

}
