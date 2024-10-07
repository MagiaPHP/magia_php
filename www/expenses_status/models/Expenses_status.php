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
# Fecha de creacion del documento: 2024-09-14 09:09:06 
#################################################################################
 
        



/**
 * Clase expenses_status
 * 
 * Description
 * 
 * @package expenses_status
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-14
 */




class Expenses_status {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * name
    */ 
    public $_name;
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
    function getName () {
        return $this->_name; 
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
    function setName ($name) {
        $this->_name = $name; 
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
   
    function setExpenses_status($id) {
        $expenses_status = expenses_status_details($id);
        //
        $this->_id = $expenses_status["id"];
        $this->_code = $expenses_status["code"];
        $this->_name = $expenses_status["name"];
        $this->_icon = $expenses_status["icon"];
        $this->_color = $expenses_status["color"];
        $this->_order_by = $expenses_status["order_by"];
        $this->_status = $expenses_status["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_status_list($start, $limit);
    }

    function details($id) {
        return expenses_status_details($id);
    }

    function delete($id) {
        return expenses_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_status_is_id($id);
    }

    function is_code($code) {
        return expenses_status_is_code($code);
    }

    function is_name($name) {
        return expenses_status_is_name($name);
    }

    function is_icon($icon) {
        return expenses_status_is_icon($icon);
    }

    function is_color($color) {
        return expenses_status_is_color($color);
    }

    function is_order_by($order_by) {
        return expenses_status_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_status_is_status($status);
    }


}
