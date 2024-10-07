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
# Fecha de creacion del documento: 2024-09-21 12:09:32 
#################################################################################
 
        



/**
 * Clase hr_employee_nationality
 * 
 * Description
 * 
 * @package hr_employee_nationality
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_nationality {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * nationality
    */ 
    public $_nationality;
    /** 
    * principal
    */ 
    public $_principal;
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
    function getNationality () {
        return $this->_nationality; 
    }
    function getPrincipal () {
        return $this->_principal; 
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
    function setNationality ($nationality) {
        $this->_nationality = $nationality; 
    }
    function setPrincipal ($principal) {
        $this->_principal = $principal; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_nationality($id) {
        $hr_employee_nationality = hr_employee_nationality_details($id);
        //
        $this->_id = $hr_employee_nationality["id"];
        $this->_employee_id = $hr_employee_nationality["employee_id"];
        $this->_nationality = $hr_employee_nationality["nationality"];
        $this->_principal = $hr_employee_nationality["principal"];
        $this->_order_by = $hr_employee_nationality["order_by"];
        $this->_status = $hr_employee_nationality["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_nationality_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_nationality_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_nationality_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_nationality_list($start, $limit);
    }

    function details($id) {
        return hr_employee_nationality_details($id);
    }

    function delete($id) {
        return hr_employee_nationality_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_nationality_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_nationality_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_nationality_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_nationality_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_nationality_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_nationality_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_nationality_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_nationality_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_nationality_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_nationality_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_nationality_is_employee_id($employee_id);
    }

    function is_nationality($nationality) {
        return hr_employee_nationality_is_nationality($nationality);
    }

    function is_principal($principal) {
        return hr_employee_nationality_is_principal($principal);
    }

    function is_order_by($order_by) {
        return hr_employee_nationality_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_nationality_is_status($status);
    }


}
