<?php
 // products_categories
 // Date: 2024-07-31    
################################################################################

class Products_categories {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * group_code
    */ 
    public $_group_code;
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
    function getGroup_code () {
        return $this->_group_code; 
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
    function setGroup_code ($group_code) {
        $this->_group_code = $group_code; 
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
   
    function setProducts_categories($id) {
        $products_categories = products_categories_details($id);
        //
        $this->_id = $products_categories["id"];
        $this->_group_code = $products_categories["group_code"];
        $this->_father_code = $products_categories["father_code"];
        $this->_code = $products_categories["code"];
        $this->_name = $products_categories["name"];
        $this->_order_by = $products_categories["order_by"];
        $this->_status = $products_categories["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_categories_list($start, $limit);
    }

    function details($id) {
        return products_categories_details($id);
    }

    function delete($id) {
        return products_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "group_code":
                return products_groups_field_id("father_code", $value);
                break;
                case "father_code":
                return products_categories_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_categories_is_id($id);
    }

    function is_group_code($group_code) {
        return products_categories_is_group_code($group_code);
    }

    function is_father_code($father_code) {
        return products_categories_is_father_code($father_code);
    }

    function is_code($code) {
        return products_categories_is_code($code);
    }

    function is_name($name) {
        return products_categories_is_name($name);
    }

    function is_order_by($order_by) {
        return products_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return products_categories_is_status($status);
    }


}
