<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-03 18:10:04 
#################################################################################
 
        



/**
 * Clase employees
 * 
 * Description
 * 
 * @package employees
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-03
 */




class Employees {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * company_id
    */ 
    public $_company_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * owner_ref
    */ 
    public $_owner_ref;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * cargo
    */ 
    public $_cargo;
    /** 
    * order_by
    */ 
    public $_order_by;
    /** 
    * status
    */ 
    public $_status;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getCompany_id () {
        return $this->_company_id; 
    }
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getOwner_ref () {
        return $this->_owner_ref; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getCargo () {
        return $this->_cargo; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setCompany_id ($company_id) {
        $this->_company_id = $company_id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setOwner_ref ($owner_ref) {
        $this->_owner_ref = $owner_ref; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setCargo ($cargo) {
        $this->_cargo = $cargo; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setEmployees($id) {
        $employees = employees_details($id);
        //
        $this->_id = $employees["id"];
        $this->_company_id = $employees["company_id"];
        $this->_contact_id = $employees["contact_id"];
        $this->_owner_ref = $employees["owner_ref"];
        $this->_date = $employees["date"];
        $this->_cargo = $employees["cargo"];
        $this->_order_by = $employees["order_by"];
        $this->_status = $employees["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return employees_field_id($field, $id);
    }

    function field_code($field, $code) {
        return employees_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return employees_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return employees_list($start, $limit);
    }

    function details($id) {
        return employees_details($id);
    }

    function delete($id) {
        return employees_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return employees_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return employees_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return employees_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return employees_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return employees_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return employees_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return employees_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return employees_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return employees_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "cargo":
                return employees_categories_field_id("category", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return employees_is_id($id);
    }

    function is_company_id($company_id) {
        return employees_is_company_id($company_id);
    }

    function is_contact_id($contact_id) {
        return employees_is_contact_id($contact_id);
    }

    function is_owner_ref($owner_ref) {
        return employees_is_owner_ref($owner_ref);
    }

    function is_date($date) {
        return employees_is_date($date);
    }

    function is_cargo($cargo) {
        return employees_is_cargo($cargo);
    }

    function is_order_by($order_by) {
        return employees_is_order_by($order_by);
    }

    function is_status($status) {
        return employees_is_status($status);
    }


}
