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
# Fecha de creacion del documento: 2024-09-21 12:09:46 
#################################################################################
 
        



/**
 * Clase hr_benefits
 * 
 * Description
 * 
 * @package hr_benefits
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_benefits {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * value
    */ 
    public $_value;
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
    function getTitle () {
        return $this->_title; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getValue () {
        return $this->_value; 
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
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setValue ($value) {
        $this->_value = $value; 
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
   
    function setHr_benefits($id) {
        $hr_benefits = hr_benefits_details($id);
        //
        $this->_id = $hr_benefits["id"];
        $this->_code = $hr_benefits["code"];
        $this->_title = $hr_benefits["title"];
        $this->_description = $hr_benefits["description"];
        $this->_value = $hr_benefits["value"];
        $this->_icon = $hr_benefits["icon"];
        $this->_color = $hr_benefits["color"];
        $this->_order_by = $hr_benefits["order_by"];
        $this->_status = $hr_benefits["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_benefits_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_benefits_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_benefits_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_benefits_list($start, $limit);
    }

    function details($id) {
        return hr_benefits_details($id);
    }

    function delete($id) {
        return hr_benefits_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_benefits_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_benefits_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_benefits_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_benefits_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_benefits_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_benefits_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_benefits_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_benefits_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_benefits_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_benefits_is_id($id);
    }

    function is_code($code) {
        return hr_benefits_is_code($code);
    }

    function is_title($title) {
        return hr_benefits_is_title($title);
    }

    function is_description($description) {
        return hr_benefits_is_description($description);
    }

    function is_value($value) {
        return hr_benefits_is_value($value);
    }

    function is_icon($icon) {
        return hr_benefits_is_icon($icon);
    }

    function is_color($color) {
        return hr_benefits_is_color($color);
    }

    function is_order_by($order_by) {
        return hr_benefits_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_benefits_is_status($status);
    }


}
