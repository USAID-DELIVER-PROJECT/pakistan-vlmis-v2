<?php

/**
 * Model_RoleResources
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Logistics Management Information System for Vaccines
 * @subpackage Inventory Management
 * @author     Ajmal Hussain <ajmaleyetii@gmail.com>
 * @version    2
 */
class Model_RoleResources extends Model_Base {

    protected $_table;

    const ALLOW = 'ALLOW';
    const DENY = 'DENY';

    public function __construct() {
        parent::__construct();
        $this->_table = $this->_em->getRepository('RoleResources');
    }

    public function getRoleResourcesByType() {
        $role_id = $this->form_values['role_id'];
        $res_type = $this->form_values['type_id'];

        $qry = $this->_em->createQueryBuilder()
                ->select("rr")
                ->from("RoleResources", "rr")
                ->join("rr.resource", "r")
                ->join("rr.role", "role")
                ->where("r.resourceType = " . $res_type);
        if ($role_id == Model_Roles::SUPPLIER) {
            $qry->andWhere("role.pkId IN ($role_id,6)");
        } else {
            $qry->andWhere("role.pkId = " . $role_id);
        }
        $qry->orderBy("r.rank", "ASC");
        //echo $qry->getQuery()->getSql();
        //exit;
        return $qry->getQuery()->getResult();
    }

    public function getRoleResourcesByTypeByParent() {
        $qry = $this->_em->createQueryBuilder()
                ->select("rr")
                ->from("RoleResources", "rr")
                ->join("rr.resource", "r")
                ->join("rr.role", "role")
                ->where("r.resourceType = " . $this->form_values['type_id'])
                ->andWhere("r.parentId = " . $this->form_values['parent_id'])
                ->andWhere("role.pkId = " . $this->form_values['role_id'])
                ->andWhere("rr.isDefault = 1")
                ->orderBy("r.rank", "ASC");
        return $qry->getQuery()->getResult();
    }

    public function getRoleResources($order = null, $sort = null) {
        $qry = $this->_em->createQueryBuilder()
                ->select("rr")
                ->from("RoleResources", "rr")
                ->join("rr.resource", "r")
                ->join("r.resourceType", "rt");

        if (!empty($this->form_values['role'])) {
            $qry->where("rr.role = " . $this->form_values['role']);
        }

        if (!empty($this->form_values['description'])) {
            $qry->andWhere("r.description = '" . $this->form_values['description'] . "'");
        }

        if ($order == 'resource_name') {
            $qry->orderBy("r.resourceName", $sort);
        }
        if ($order == 'description') {
            $qry->orderBy("r.description", $sort);
        }
        if ($order == 'resource_type') {
            $qry->orderBy("rt.pkId", $sort);
        }
        if ($order == 'level') {
            $qry->orderBy("r.level", $sort);
        }

        //echo $qry->getQuery()->getSql();
        //exit;

        return $qry->getQuery()->getResult();
    }

    public function getRoleResourcesByTypeForVlmisDashboard() {
        $role_id = $this->form_values['role_id'];
        $res_type = $this->form_values['type_id'];

        $qry = $this->_em->createQueryBuilder()
                ->select("rr")
                ->from("RoleResources", "rr")
                ->join("rr.resource", "r")
                ->join("rr.role", "role")
                ->where("r.resourceType = " . $res_type)
                ->andWhere("r.pkId = 472");
        if ($role_id == Model_Roles::SUPPLIER) {
            $qry->andWhere("role.pkId IN ($role_id,6)");
        } else {
            $qry->andWhere("role.pkId = " . $role_id);
        }
        $qry->orderBy("r.rank", "ASC");
//        echo $qry->getQuery()->getSql();
//        exit;
        return $qry->getQuery()->getResult();
    }

}
