<?php
 // products_groups
 // Date: 2024-07-31    
################################################################################

class Products_groups {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * father_code
    */ 
    public $_father_code;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * name
    */ 
    public $_name;
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
    function getFather_code () {
        return $this->_father_code; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getName () {
        return $this->_name; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setFather_code ($father_code) {
        $this->_father_code = $father_code; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_groups($id) {
        $products_groups = products_groups_details($id);
        //
        $this->_id = $products_groups["id"];
        $this->_father_code = $products_groups["father_code"];
        $this->_code = $products_groups["code"];
        $this->_name = $products_groups["name"];
        $this->_order_by = $products_groups["order_by"];
        $this->_status = $products_groups["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_groups_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_groups_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_groups_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_groups_list($start, $limit);
    }

    function details($id) {
        return products_groups_details($id);
    }

    function delete($id) {
        return products_groups_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_groups_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_groups_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_groups_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_groups_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_groups_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_groups_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_groups_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_groups_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_groups_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "father_code":
                return products_groups_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_groups_is_id($id);
    }

    function is_father_code($father_code) {
        return products_groups_is_father_code($father_code);
    }

    function is_code($code) {
        return products_groups_is_code($code);
    }

    function is_name($name) {
        return products_groups_is_name($name);
    }

    function is_order_by($order_by) {
        return products_groups_is_order_by($order_by);
    }

    function is_status($status) {
        return products_groups_is_status($status);
    }


}
