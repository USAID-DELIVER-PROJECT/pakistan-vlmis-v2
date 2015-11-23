<?php

class App_Auth extends Zend_Auth {

    /**
     *
     * @var App_Auth
     */
    protected static $_instance;

    /**
     * @return NULL
     */
    public function __construct() {
        
    }

    /**
     * @return App_Auth
     */
    public static function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Create Zend_Auth_Adapter_Doctrine adapter
     *
     * @param $type string
     *
     * @return Zend_Auth_Adapter
     */
    protected function _authAdapterFactory($type) {
        switch ($type) {
            case 'doctrine':
            default:
                $em = Zend_Registry::get('doctrine');
                $authAdapter = new \App\Auth\Adapter\DoctrineORMAdapter($em, 'Users', 'u', 'pkId');
        }

        return $authAdapter;
    }

    /**
     * Login
     *
     * @param $login string
     * @param $password string
     *
     * @return bool
     */
    public function login($login, $password) {
        $auth = Zend_Auth::getInstance();

        //if ($auth->hasIdentity()) {
        //  return true;
        //} else {
        $adapter = $this->_authAdapterFactory('doctrine');
        $adapter->addConditions(array("loginId" => $login, "password" => $password,"status" => 1));
        $result = $auth->authenticate($adapter);

        if (!$result->isValid()) {
            $this->_updateFailedQuantity($login);
            $this->_updateFailedAt($login);
            return false;
        } else {
            $this->_addLoginTime();
            $this->_updateLoggedAt();
            return true;
        }
        //}
    }

    /**
     * Login
     *
     * @param $login string
     * @param $password string
     *
     * @return bool
     */
    public function loginAuth($auth_id) {
        $auth = Zend_Auth::getInstance();

        $adapter = $this->_authAdapterFactory('doctrine');
        $adapter->addConditions(array("auth" => $auth_id));
        $result = $auth->authenticate($adapter);

        if (!$result->isValid()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Increment (+1) number of failed logins
     *
     * @param string $login
     */
    protected function _updateFailedQuantity($login) {
        $em = Zend_Registry::get('doctrine');
        $user = $em->getRepository('Users')->findOneBy(array("loginId" => $login));

        if (count($user) <= 0) {
            return;
        }
        $qty = $user->getFailedQuantity();

        $user->setFailedQuantity( ++$qty);
        $em->persist($user);
        $em->flush();
    }

    /**
     * Update failed_at with current datetime
     *
     * @param string $login
     */
    protected function _updateFailedAt($login) {
        $em = Zend_Registry::get('doctrine');
        $user = $em->getRepository('Users')->findOneBy(array("loginId" => $login));

        if (count($user) <= 0) {
            return;
        }

        $user->setFailedAt(App_Tools_Time::now());
        $em->persist($user);
        $em->flush();
    }

    /**
     * Update logged_at with current datetime
     *
     * @param string $login
     */
    protected function _updateLoggedAt() {
        $userId = $this->getIdentity();
        $em = Zend_Registry::get('doctrine');
        $user = $em->getRepository('Users')->find($userId);

        if (count($user) <= 0) {
            return;
        }

        $user->setLoggedAt(App_Tools_Time::now());
        $em->persist($user);
        $em->flush();
    }

    /**
     * Update logged_at with current datetime
     *
     * @param string $login
     */
    protected function _addLoginTime() {
        $userId = $this->getIdentity();
        $em = Zend_Registry::get('doctrine');
        $user_login = new UserLoginLog();
        $user_login->setIpAddress($_SERVER['REMOTE_ADDR']);
        $user_login->setLoginTime(App_Tools_Time::now());
        $user = $em->getRepository('Users')->find($userId);
        $user_login->setUser($user);
        $em->persist($user_login);
        $em->flush();
    }

    /**
     * Salt password
     *
     * @param $password string
     *
     * @return string
     */
    public static function saltPassword($password) {
        if (NULL == $password)
            throw new Exception();

        return '*' . Zend_Registry::get('salt') . $password;
    }

    /**
     * Logout
     *
     * @return NULL
     */
    public function logout() {
        //$unset = true;
        //$this->_updateLoggedAt($unset);
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
    }

    /**
     * Check if user is logged in
     *
     * @return bool
     */
    public function isLoggedIn() {
        $auth = Zend_Auth::getInstance();
        return $auth->hasIdentity();
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin() {
        $auth = Zend_Auth::getInstance();
        return $auth->getIdentity();
    }

    public function getUserName() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getUserName();
        } else {
            return false;
        }
    }

    public function getUserDepartment() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getDepartment();
        } else {
            return false;
        }
    }

    /**
     * Checks user's role by userId
     *
     * @param int $userId
     * @return int
     */
    public function getRoleId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getRole()->getPkId();
        } else {
            return false;
        }
    }

    public function getWarehouseId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('WarehouseUsers')->findOneBy(array("user" => $userId, "isDefault" => 1));
        if (count($user) > 0) {
            return $user->getWarehouse()->getPkId();
        } else {
            return false;
        }
    }

    public function getIsScannerEnable() {
        $wh_id = $this->getWarehouseId();
        $is_enable = Zend_Registry::get('doctrine')->getRepository('BarcodeScannerWarehouses')->findOneBy(array("warehouse" => $wh_id));
        if (count($is_enable) > 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }

    public function getUserLocationId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getLocation()->getPkId();
        } else {
            return false;
        }
    }

    public function getUserProvinceId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getLocation()->getProvince()->getPkId();
        } else {
            return false;
        }
    }

    public function getLocationId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();

        $user = Zend_Registry::get('doctrine')->getRepository('WarehouseUsers')->findOneBy(array("user" => $userId, "isDefault" => 1));
        if (count($user) > 0) {
            return $user->getWarehouse()->getLocation()->getPkId();
        } else {
            return false;
        }
    }

    public function getWarehouseName() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('WarehouseUsers')->findOneBy(array("user" => $userId, "isDefault" => 1));
        if (count($user) > 0) {
            return $user->getWarehouse()->getWarehouseName();
        } else {
            return false;
        }
    }

    public function getProvinceId() {
        $auth = Zend_Auth::getInstance();
        $user_id = $auth->getIdentity();
        $em = Zend_Registry::get('doctrine');
        $db = $em->createQueryBuilder();
        $db->select('p.pkId')
                ->from("WarehouseUsers", "wu")
                ->join("wu.warehouse", "w")
                ->join("w.province", "p")
                ->where("wu.user = $user_id ");
        try {
            $row = $db->getQuery()->getResult();
        } catch (Exception $e) {
            $m = $e->getMessage();
            echo $m . "<br />\n";
        }

        if (count($row) > 0) {
            return $row[0]['pkId'];
        } else {
            return false;
        }
    }

    public function getStakeholderId() {
        $auth = Zend_Auth::getInstance();
        $userId = $auth->getIdentity();
        $user = Zend_Registry::get('doctrine')->getRepository('Users')->find($userId);
        if (count($user) > 0) {
            return $user->getStakeholder()->getPkId();
        } else {
            return false;
        }
    }

    public function getGeoLevelId($stakeholder_id) {
        $em = Zend_Registry::get('doctrine');
        $db = $em->createQueryBuilder();
        $db->select('gl.pkId')
                ->from("Stakeholders", "s")
                ->join("s.geoLevel", "gl")
                ->where("s.pkId = $stakeholder_id ");
        try {
            $row = $db->getQuery()->getResult();
        } catch (Exception $e) {
            $m = $e->getMessage();
            echo $m . "<br />\n";
        }

        if (count($row) > 0) {
            return $row[0]['pkId'];
        } else {
            return false;
        }
    }

    function getUserLevel($user_id) {
        $em = Zend_Registry::get('doctrine');
        $db = $em->createQueryBuilder();
        $db->select('wu')
                ->from("WarehouseUsers", "wu")
                ->join("wu.user", "u")
                ->join("wu.warehouse", "wh")
                ->join("wh.stakeholderOffice", "sh")
                ->where("u.pkId = $user_id ")
                ->andWhere("wu.isDefault =  1 ");
        try {
            $row = $db->getQuery()->getResult();
        } catch (Exception $e) {
            $m = $e->getMessage();
            echo $m . "<br />\n";
        }

        if (count($row) > 0) {
            return $row[0]->getWarehouse()->getStakeholderOffice()->getGeoLevel()->getPkId();
        } else {
            return false;
        }
    }

    /**
     * Confirm user
     *
     * @param string $key
     * @param int $id
     *
     * @return bool
     */
    public static function confirmUser($key, $id) {
        $usersList = Doctrine_Core::getTable('Model_Users')->findBy('pk_id', $id);

        if ($usersList->count() > 0 && $usersList->getFirst()->status == Model_Users::UNCONFIRMED && $usersList->getFirst()->regkey == $key) {
            try {
                $user = $usersList->getFirst();
                $user->status = Model_Users::CONFIRMED;
                $user->regkey = '';
                $user->save();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        return false;
    }

    function getDistrictId($user_id = null) {
        $auth = Zend_Auth::getInstance();
        $user_id = $auth->getIdentity();

        $em = Zend_Registry::get('doctrine');
        $db = $em->createQueryBuilder();
        $db->select('d.pkId')
                ->from("WarehouseUsers", "wu")
                ->join("wu.warehouse", "w")
                ->join("w.district", "d")
                ->where("wu.user = $user_id");


        try {
            $row = $db->getQuery()->getResult();
        } catch (Exception $e) {
            $m = $e->getMessage();
            echo $m . "<br />\n";
        }

        if (count($row) > 0) {
            return $row[0]['pkId'];
        } else {
            return false;
        }
    }

    function getTehsilId($user_id = null) {
        $auth = Zend_Auth::getInstance();
        $user_id = $auth->getIdentity();

        $em = Zend_Registry::get('doctrine');
        $db = $em->createQueryBuilder();
        $db->select('l.pkId')
                ->from("WarehouseUsers", "wu")
                ->join("wu.warehouse", "w")
                ->join("w.location", "l")
                ->where("wu.user = $user_id")
                ->andWhere("w.stakeholderOffice = 5");

        try {
            $row = $db->getQuery()->getResult();
        } catch (Exception $e) {
            $m = $e->getMessage();
            echo $m . "<br />\n";
        }

        if (count($row) > 0) {
            return $row[0]['pkId'];
        } else {
            return false;
        }
    }

}
