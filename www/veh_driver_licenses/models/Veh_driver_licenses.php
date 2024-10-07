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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################
 
        



/**
 * Clase veh_driver_licenses
 * 
 * Description
 * 
 * @package veh_driver_licenses
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_driver_licenses {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * category
    */ 
    public $_category;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * min_age
    */ 
    public $_min_age;
    /** 
    * max_weight
    */ 
    public $_max_weight;
    /** 
    * max_passengers
    */ 
    public $_max_passengers;
    /** 
    * notes
    */ 
    public $_notes;
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
    function getDescription () {
        return $this->_description; 
    }
    function getMin_age () {
        return $this->_min_age; 
    }
    function getMax_weight () {
        return $this->_max_weight; 
    }
    function getMax_passengers () {
        return $this->_max_passengers; 
    }
    function getNotes () {
        return $this->_notes; 
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
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setMin_age ($min_age) {
        $this->_min_age = $min_age; 
    }
    function setMax_weight ($max_weight) {
        $this->_max_weight = $max_weight; 
    }
    function setMax_passengers ($max_passengers) {
        $this->_max_passengers = $max_passengers; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_driver_licenses($id) {
        $veh_driver_licenses = veh_driver_licenses_details($id);
        //
        $this->_id = $veh_driver_licenses["id"];
        $this->_category = $veh_driver_licenses["category"];
        $this->_description = $veh_driver_licenses["description"];
        $this->_min_age = $veh_driver_licenses["min_age"];
        $this->_max_weight = $veh_driver_licenses["max_weight"];
        $this->_max_passengers = $veh_driver_licenses["max_passengers"];
        $this->_notes = $veh_driver_licenses["notes"];
        $this->_order_by = $veh_driver_licenses["order_by"];
        $this->_status = $veh_driver_licenses["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_driver_licenses_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_driver_licenses_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_driver_licenses_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_driver_licenses_list($start, $limit);
    }

    function details($id) {
        return veh_driver_licenses_details($id);
    }

    function delete($id) {
        return veh_driver_licenses_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_driver_licenses_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_driver_licenses_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_driver_licenses_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_driver_licenses_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_driver_licenses_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_driver_licenses_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_driver_licenses_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_driver_licenses_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_driver_licenses_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_driver_licenses_is_id($id);
    }

    function is_category($category) {
        return veh_driver_licenses_is_category($category);
    }

    function is_description($description) {
        return veh_driver_licenses_is_description($description);
    }

    function is_min_age($min_age) {
        return veh_driver_licenses_is_min_age($min_age);
    }

    function is_max_weight($max_weight) {
        return veh_driver_licenses_is_max_weight($max_weight);
    }

    function is_max_passengers($max_passengers) {
        return veh_driver_licenses_is_max_passengers($max_passengers);
    }

    function is_notes($notes) {
        return veh_driver_licenses_is_notes($notes);
    }

    function is_order_by($order_by) {
        return veh_driver_licenses_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_driver_licenses_is_status($status);
    }


}
