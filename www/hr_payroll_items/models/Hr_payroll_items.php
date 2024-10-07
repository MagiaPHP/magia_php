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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################
 
        



/**
 * Clase hr_payroll_items
 * 
 * Description
 * 
 * @package hr_payroll_items
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_payroll_items {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * in_out
    */ 
    public $_in_out;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * formula
    */ 
    public $_formula;
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
    function getCode () {
        return $this->_code; 
    }
    function getIn_out () {
        return $this->_in_out; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getFormula () {
        return $this->_formula; 
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
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setIn_out ($in_out) {
        $this->_in_out = $in_out; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setFormula ($formula) {
        $this->_formula = $formula; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_payroll_items($id) {
        $hr_payroll_items = hr_payroll_items_details($id);
        //
        $this->_id = $hr_payroll_items["id"];
        $this->_code = $hr_payroll_items["code"];
        $this->_in_out = $hr_payroll_items["in_out"];
        $this->_description = $hr_payroll_items["description"];
        $this->_formula = $hr_payroll_items["formula"];
        $this->_order_by = $hr_payroll_items["order_by"];
        $this->_status = $hr_payroll_items["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_payroll_items_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_payroll_items_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_payroll_items_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_payroll_items_list($start, $limit);
    }

    function details($id) {
        return hr_payroll_items_details($id);
    }

    function delete($id) {
        return hr_payroll_items_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_payroll_items_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_payroll_items_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_payroll_items_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_payroll_items_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_payroll_items_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_payroll_items_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_payroll_items_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_payroll_items_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_payroll_items_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_payroll_items_is_id($id);
    }

    function is_code($code) {
        return hr_payroll_items_is_code($code);
    }

    function is_in_out($in_out) {
        return hr_payroll_items_is_in_out($in_out);
    }

    function is_description($description) {
        return hr_payroll_items_is_description($description);
    }

    function is_formula($formula) {
        return hr_payroll_items_is_formula($formula);
    }

    function is_order_by($order_by) {
        return hr_payroll_items_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_payroll_items_is_status($status);
    }


}
