<?php

class Cadmin_IndexController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $auth = App_Auth::getInstance();
        $role = $auth->getRoleId();

        if (in_array($role, array(4, 5))) {
            $this->_helper->viewRenderer('user-admin');
        }
    }

}
