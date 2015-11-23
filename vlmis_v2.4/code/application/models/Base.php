<?php

class Model_Base {

    protected $_identity;
    protected $_em;
    protected $_user_id;
    public $form_values;

    function __construct() {
        $this->_identity = App_Auth::getInstance();
        $this->_user_id = $this->_identity->getIdentity();
        $this->_em = Zend_Registry::get('doctrine');
    }

}