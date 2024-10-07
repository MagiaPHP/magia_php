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
# Fecha de creacion del documento: 2024-09-21 12:09:34 
#################################################################################
 
        



/**
 * Clase hr_employee_payroll_items
 * 
 * Description
 * 
 * @package hr_employee_payroll_items
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_payroll_items {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * value
    */ 
    public $_value;
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
    function getEmployee_id () {
        return $this->_employee_id; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getValue () {
        return $this->_value; 
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
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setValue ($value) {
        $this->_value = $value; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_payroll_items($id) {
        $hr_employee_payroll_items = hr_employee_payroll_items_details($id);
        //
        $this->_id = $hr_employee_payroll_items["id"];
        $this->_employee_id = $hr_employee_payroll_items["employee_id"];
        $this->_code = $hr_employee_payroll_items["code"];
        $this->_value = $hr_employee_payroll_items["value"];
        $this->_order_by = $hr_employee_payroll_items["order_by"];
        $this->_status = $hr_employee_payroll_items["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_payroll_items_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_payroll_items_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_payroll_items_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_payroll_items_list($start, $limit);
    }

    function details($id) {
        return hr_employee_payroll_items_details($id);
    }

    function delete($id) {
        return hr_employee_payroll_items_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_payroll_items_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_payroll_items_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_payroll_items_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_payroll_items_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_payroll_items_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_payroll_items_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_payroll_items_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_payroll_items_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_payroll_items_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
                case "code":
                return hr_payroll_items_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_payroll_items_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_payroll_items_is_employee_id($employee_id);
    }

    function is_code($code) {
        return hr_employee_payroll_items_is_code($code);
    }

    function is_value($value) {
        return hr_employee_payroll_items_is_value($value);
    }

    function is_order_by($order_by) {
        return hr_employee_payroll_items_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_payroll_items_is_status($status);
    }


}
