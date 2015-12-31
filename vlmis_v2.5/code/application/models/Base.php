<?php

class Model_Base {

    protected $_identity;
    protected $_em;
    protected $_user_id;
    public $form_values;

    CONST INACTIVE = 0;
    CONST ACTIVE = 1;
    CONST ROUITINEPRODUCTS = 1;
    CONST VACCINECATEGORY = 1;
    CONST CAMPAIGNPRODUCTS = 2;    
    CONST NONVACCINE = 2;
    CONST INACTIVEVACCINE = 4;
    CONST MERGEDPRODUCTS = 5;

    function __construct() {
        $this->_identity = App_Auth::getInstance();
        $this->_user_id = $this->_identity->getIdentity();
        $this->_em = Zend_Registry::get('doctrine');
    }

}
