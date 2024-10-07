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
# Fecha de creacion del documento: 2024-09-16 20:09:49 
#################################################################################
 
        



/**
 * Clase _menus_locations
 * 
 * Description
 * 
 * @package _menus_locations
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class _menus_locations {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * location
    */ 
    public $_location;
    /** 
    * label
    */ 
    public $_label;
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
    function getLocation () {
        return $this->_location; 
    }
    function getLabel () {
        return $this->_label; 
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
    function setLocation ($location) {
        $this->_location = $location; 
    }
    function setLabel ($label) {
        $this->_label = $label; 
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
   
    function set_menus_locations($id) {
        $_menus_locations = _menus_locations_details($id);
        //
        $this->_id = $_menus_locations["id"];
        $this->_location = $_menus_locations["location"];
        $this->_label = $_menus_locations["label"];
        $this->_icon = $_menus_locations["icon"];
        $this->_order_by = $_menus_locations["order_by"];
        $this->_status = $_menus_locations["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return _menus_locations_field_id($field, $id);
    }

    function field_code($field, $code) {
        return _menus_locations_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return _menus_locations_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return _menus_locations_list($start, $limit);
    }

    function details($id) {
        return _menus_locations_details($id);
    }

    function delete($id) {
        return _menus_locations_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return _menus_locations_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return _menus_locations_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return _menus_locations_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return _menus_locations_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return _menus_locations_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return _menus_locations_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return _menus_locations_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return _menus_locations_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return _menus_locations_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return _menus_locations_is_id($id);
    }

    function is_location($location) {
        return _menus_locations_is_location($location);
    }

    function is_label($label) {
        return _menus_locations_is_label($label);
    }

    function is_icon($icon) {
        return _menus_locations_is_icon($icon);
    }

    function is_order_by($order_by) {
        return _menus_locations_is_order_by($order_by);
    }

    function is_status($status) {
        return _menus_locations_is_status($status);
    }


}
