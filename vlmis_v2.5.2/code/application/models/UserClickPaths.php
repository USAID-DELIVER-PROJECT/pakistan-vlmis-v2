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

        $user_click_login = new UserClickPaths();
        $resource_id = $this->_em->getRepository('Resources')->findBy(array("resourceName" => $resource_name));

        if (count($resource_id) > 0) {
            $user = $this->_em->getRepository('Users')->find($userId);
            $user_click_login->setUser($user);
            $resource = $this->_em->getRepository('Resources')->find($resource_id[0]->getPkId());
            $user_click_login->setResource($resource);
            $user_click_login->setSessionId(Zend_Session::getId());
            $user_click_login->setCreatedDate(App_Tools_Time::now());
            $this->_em->persist($user_click_login);
            $this->_em->flush();
        }
    }

    public function getDailyActiveUsers() {
        $str_sql = " SELECT
                        ROUND( COUNT( DISTINCT user_click_paths.user_id ) / 30 ) AS avg_user_count
                    FROM
                        user_click_paths
                    WHERE
                        DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_ADD(CURDATE(), INTERVAL - 30 DAY) AND CURDATE()";

        $rec = $this->_em_read->getConnection()->prepare($str_sql);

        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getWeeklyActiveUsers() {
        $str_sql = " SELECT
                        COUNT( DISTINCT user_click_paths.user_id ) AS user_count
                    FROM
                        user_click_paths
                    WHERE
                        DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_ADD(CURDATE(), INTERVAL -7 DAY) AND CURDATE()
                    ";

        $rec = $this->_em_read->getConnection()->prepare($str_sql);

        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getMonthlyActiveUsers() {
        $str_sql = " SELECT
                        COUNT( DISTINCT user_click_paths.user_id ) AS user_count
                    FROM
                        user_click_paths
                    WHERE
                        DATE_FORMAT(created_date, '%Y-%m-%d') BETWEEN DATE_ADD(CURDATE(), INTERVAL -30 DAY) AND CURDATE()
                    ";

        $rec = $this->_em_read->getConnection()->prepare($str_sql);

        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPageCountForActiveRoles() {
        $str_sql = " SELECT
                        Count(*) AS page_count,
                        roles.role_name,
                        roles.description,
                        roles.pk_id AS role_id
                    FROM
                        user_click_paths
                        INNER JOIN users ON user_click_paths.user_id = users.pk_id
                        INNER JOIN roles ON users.role_id = roles.pk_id
                    WHERE
                        DATE_FORMAT( user_click_paths.created_date,'%Y-%m-%d') BETWEEN '2016-01-01' AND '2016-03-01'
                    GROUP BY
                    roles.pk_id
                    ";

        $rec = $this->_em_read->getConnection()->prepare($str_sql);

        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPagesForRole() {
        $where = array();
        if (!empty($this->form_values['role_id'])) {
            $where[] = "roles.pk_id = " . $this->form_values['role_id'];
        }
       

        if (count($where) > 0) {
            $wr = " AND " . implode(" AND ", $where);
        }
        
          $str_sql = " SELECT
                        Count(*) AS page_count,
                        resources.description AS page_description,
                        roles.role_name,
                        roles.description
                    FROM
                        user_click_paths
                        INNER JOIN resources ON user_click_paths.resource_id = resources.pk_id
                        INNER JOIN users ON user_click_paths.user_id = users.pk_id
                        INNER JOIN roles ON roles.pk_id = users.role_id
                    WHERE
                        resources.resource_type_id = 1
                         $wr
                    GROUP BY
                        resources.pk_id
                    ";

        $rec = $this->_em_read->getConnection()->prepare($str_sql);

        $rec->execute();
        $result = $rec->fetchAll();
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

}
