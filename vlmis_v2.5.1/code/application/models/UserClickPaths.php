<?php
/**
 * Model_UserClickPaths
 * 
 * Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmal@deliver-pk.org>
 * @version    2.5.1
 */

/**
 *  Model for User Click Paths
 */

class Model_UserClickPaths extends Model_Base {

    /**
     * $_table
     * @var type 
     */
    protected $_table;

    /**
     * __construct
     */
    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('UserClickPaths');
    }

    /**
     * Update user click paths with current datetime
     */
    public function addUserClickPaths($resource_name) {
        $auth = App_Auth::getInstance();
        $userId = $auth->getIdentity();
        $em = Zend_Registry::get('doctrine');
        $user_click_login = new UserClickPaths();
        $resource_id = $em->getRepository('Resources')->findBy(array("resourceName" => $resource_name));

        if (count($resource_id) > 0) {
            $user = $em->getRepository('Users')->find($userId);
            $user_click_login->setUser($user);
            $resource = $em->getRepository('Resources')->find($resource_id[0]->getPkId());
            $user_click_login->setResource($resource);
            $user_click_login->setSessionId(Zend_Session::getId());
            $user_click_login->setCreatedDate(App_Tools_Time::now());
            $em->persist($user_click_login);
            $em->flush();
        }
    }

}
