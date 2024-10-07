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
# Fecha de creacion del documento: 2024-09-21 12:09:01 
#################################################################################
 
        



/**
 * Clase hr_worked_days_status
 * 
 * Description
 * 
 * @package hr_worked_days_status
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_worked_days_status {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * status_name
    */ 
    public $_status_name;
    /** 
    * color
    */ 
    public $_color;
    /** 
    * icon
    */ 
    public $_icon;
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
    function getStatus_name () {
        return $this->_status_name; 
    }
    function getColor () {
        return $this->_color; 
    }
    function getIcon () {
        return $this->_icon; 
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
    function setStatus_name ($status_name) {
        $this->_status_name = $status_name; 
    }
    function setColor ($color) {
        $this->_color = $color; 
    }
    function setIcon ($icon) {
        $this->_icon = $icon; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_worked_days_status($id) {
        $hr_worked_days_status = hr_worked_days_status_details($id);
        //
        $this->_id = $hr_worked_days_status["id"];
        $this->_code = $hr_worked_days_status["code"];
        $this->_status_name = $hr_worked_days_status["status_name"];
        $this->_color = $hr_worked_days_status["color"];
        $this->_icon = $hr_worked_days_status["icon"];
        $this->_order_by = $hr_worked_days_status["order_by"];
        $this->_status = $hr_worked_days_status["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_worked_days_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_worked_days_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_worked_days_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_worked_days_status_list($start, $limit);
    }

    function details($id) {
        return hr_worked_days_status_details($id);
    }

    function delete($id) {
        return hr_worked_days_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_worked_days_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_worked_days_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_worked_days_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_worked_days_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_worked_days_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_worked_days_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_worked_days_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_worked_days_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_worked_days_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_worked_days_status_is_id($id);
    }

    function is_code($code) {
        return hr_worked_days_status_is_code($code);
    }

    function is_status_name($status_name) {
        return hr_worked_days_status_is_status_name($status_name);
    }

    function is_color($color) {
        return hr_worked_days_status_is_color($color);
    }

    function is_icon($icon) {
        return hr_worked_days_status_is_icon($icon);
    }

    function is_order_by($order_by) {
        return hr_worked_days_status_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_worked_days_status_is_status($status);
    }


}
