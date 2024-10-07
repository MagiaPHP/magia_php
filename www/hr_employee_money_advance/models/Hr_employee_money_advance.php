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
# Fecha de creacion del documento: 2024-09-21 12:09:29 
#################################################################################
 
        



/**
 * Clase hr_employee_money_advance
 * 
 * Description
 * 
 * @package hr_employee_money_advance
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_money_advance {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * value
    */ 
    public $_value;
    /** 
    * way
    */ 
    public $_way;
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
    function getDate () {
        return $this->_date; 
    }
    function getValue () {
        return $this->_value; 
    }
    function getWay () {
        return $this->_way; 
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
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setValue ($value) {
        $this->_value = $value; 
    }
    function setWay ($way) {
        $this->_way = $way; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_money_advance($id) {
        $hr_employee_money_advance = hr_employee_money_advance_details($id);
        //
        $this->_id = $hr_employee_money_advance["id"];
        $this->_employee_id = $hr_employee_money_advance["employee_id"];
        $this->_date = $hr_employee_money_advance["date"];
        $this->_value = $hr_employee_money_advance["value"];
        $this->_way = $hr_employee_money_advance["way"];
        $this->_order_by = $hr_employee_money_advance["order_by"];
        $this->_status = $hr_employee_money_advance["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_money_advance_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_money_advance_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_money_advance_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_money_advance_list($start, $limit);
    }

    function details($id) {
        return hr_employee_money_advance_details($id);
    }

    function delete($id) {
        return hr_employee_money_advance_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_money_advance_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_money_advance_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_money_advance_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_money_advance_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_money_advance_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_money_advance_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_money_advance_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_money_advance_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_money_advance_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_money_advance_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_money_advance_is_employee_id($employee_id);
    }

    function is_date($date) {
        return hr_employee_money_advance_is_date($date);
    }

    function is_value($value) {
        return hr_employee_money_advance_is_value($value);
    }

    function is_way($way) {
        return hr_employee_money_advance_is_way($way);
    }

    function is_order_by($order_by) {
        return hr_employee_money_advance_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_money_advance_is_status($status);
    }


}
