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
# Fecha de creacion del documento: 2024-09-23 21:09:25 
#################################################################################
 
        



/**
 * Clase holidays_categories
 * 
 * Description
 * 
 * @package holidays_categories
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-23
 */




class Holidays_categories {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * category
    */ 
    public $_category;
    /** 
    * code
    */ 
    public $_code;
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
    function getCategory () {
        return $this->_category; 
    }
    function getCode () {
        return $this->_code; 
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
    function setCategory ($category) {
        $this->_category = $category; 
    }
    function setCode ($code) {
        $this->_code = $code; 
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
   
    function setHolidays_categories($id) {
        $holidays_categories = holidays_categories_details($id);
        //
        $this->_id = $holidays_categories["id"];
        $this->_category = $holidays_categories["category"];
        $this->_code = $holidays_categories["code"];
        $this->_color = $holidays_categories["color"];
        $this->_icon = $holidays_categories["icon"];
        $this->_order_by = $holidays_categories["order_by"];
        $this->_status = $holidays_categories["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return holidays_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return holidays_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return holidays_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return holidays_categories_list($start, $limit);
    }

    function details($id) {
        return holidays_categories_details($id);
    }

    function delete($id) {
        return holidays_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return holidays_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return holidays_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return holidays_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return holidays_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return holidays_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return holidays_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return holidays_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return holidays_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return holidays_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return holidays_categories_is_id($id);
    }

    function is_category($category) {
        return holidays_categories_is_category($category);
    }

    function is_code($code) {
        return holidays_categories_is_code($code);
    }

    function is_color($color) {
        return holidays_categories_is_color($color);
    }

    function is_icon($icon) {
        return holidays_categories_is_icon($icon);
    }

    function is_order_by($order_by) {
        return holidays_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return holidays_categories_is_status($status);
    }


}
