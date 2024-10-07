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
# Fecha de creacion del documento: 2024-09-21 12:09:40 
#################################################################################
 
        



/**
 * Clase hr_employee_work_status
 * 
 * Description
 * 
 * @package hr_employee_work_status
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_work_status {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * work_status_code
    */ 
    public $_work_status_code;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
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
    function getWork_status_code () {
        return $this->_work_status_code; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
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
    function setWork_status_code ($work_status_code) {
        $this->_work_status_code = $work_status_code; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_work_status($id) {
        $hr_employee_work_status = hr_employee_work_status_details($id);
        //
        $this->_id = $hr_employee_work_status["id"];
        $this->_employee_id = $hr_employee_work_status["employee_id"];
        $this->_work_status_code = $hr_employee_work_status["work_status_code"];
        $this->_date_start = $hr_employee_work_status["date_start"];
        $this->_date_end = $hr_employee_work_status["date_end"];
        $this->_order_by = $hr_employee_work_status["order_by"];
        $this->_status = $hr_employee_work_status["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_work_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_work_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_work_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_work_status_list($start, $limit);
    }

    function details($id) {
        return hr_employee_work_status_details($id);
    }

    function delete($id) {
        return hr_employee_work_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_work_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_work_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_work_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_work_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_work_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_work_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_work_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_work_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_work_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
                case "work_status_code":
                return hr_work_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_work_status_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_work_status_is_employee_id($employee_id);
    }

    function is_work_status_code($work_status_code) {
        return hr_employee_work_status_is_work_status_code($work_status_code);
    }

    function is_date_start($date_start) {
        return hr_employee_work_status_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return hr_employee_work_status_is_date_end($date_end);
    }

    function is_order_by($order_by) {
        return hr_employee_work_status_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_work_status_is_status($status);
    }


}
