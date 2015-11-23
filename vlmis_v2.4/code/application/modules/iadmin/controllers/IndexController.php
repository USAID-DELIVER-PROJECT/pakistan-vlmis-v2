<?php

class Iadmin_IndexController extends App_Controller_Base {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $auth = App_Auth::getInstance();
        $role = $auth->getRoleId();      
    }
    
}