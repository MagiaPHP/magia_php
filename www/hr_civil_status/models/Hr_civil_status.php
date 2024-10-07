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
# Fecha de creacion del documento: 2024-09-21 12:09:55 
#################################################################################
 
        



/**
 * Clase hr_civil_status
 * 
 * Description
 * 
 * @package hr_civil_status
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_civil_status {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * icon
    */ 
    public $_icon;
    /** 
    * color
    */ 
    public $_color;
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
    function getDescription () {
        return $this->_description; 
    }
    function getIcon () {
        return $this->_icon; 
    }
    function getColor () {
        return $this->_color; 
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
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setIcon ($icon) {
        $this->_icon = $icon; 
    }
    function setColor ($color) {
        $this->_color = $color; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_civil_status($id) {
        $hr_civil_status = hr_civil_status_details($id);
        //
        $this->_id = $hr_civil_status["id"];
        $this->_code = $hr_civil_status["code"];
        $this->_description = $hr_civil_status["description"];
        $this->_icon = $hr_civil_status["icon"];
        $this->_color = $hr_civil_status["color"];
        $this->_order_by = $hr_civil_status["order_by"];
        $this->_status = $hr_civil_status["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_civil_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_civil_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_civil_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_civil_status_list($start, $limit);
    }

    function details($id) {
        return hr_civil_status_details($id);
    }

    function delete($id) {
        return hr_civil_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_civil_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_civil_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_civil_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_civil_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_civil_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_civil_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_civil_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_civil_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_civil_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_civil_status_is_id($id);
    }

    function is_code($code) {
        return hr_civil_status_is_code($code);
    }

    function is_description($description) {
        return hr_civil_status_is_description($description);
    }

    function is_icon($icon) {
        return hr_civil_status_is_icon($icon);
    }

    function is_color($color) {
        return hr_civil_status_is_color($color);
    }

    function is_order_by($order_by) {
        return hr_civil_status_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_civil_status_is_status($status);
    }


}
