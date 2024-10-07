<?php
 // products_related
 // Date: 2024-07-31    
################################################################################

class Products_related {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * related_code
    */ 
    public $_related_code;
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
    function getProduct_code () {
        return $this->_product_code; 
    }
    function getRelated_code () {
        return $this->_related_code; 
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
    function setProduct_code ($product_code) {
        $this->_product_code = $product_code; 
    }
    function setRelated_code ($related_code) {
        $this->_related_code = $related_code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_related($id) {
        $products_related = products_related_details($id);
        //
        $this->_id = $products_related["id"];
        $this->_product_code = $products_related["product_code"];
        $this->_related_code = $products_related["related_code"];
        $this->_order_by = $products_related["order_by"];
        $this->_status = $products_related["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_related_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_related_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_related_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_related_list($start, $limit);
    }

    function details($id) {
        return products_related_details($id);
    }

    function delete($id) {
        return products_related_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_related_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_related_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_related_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_related_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_related_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_related_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_related_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_related_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_related_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "product_code":
                return products_field_id("code", $value);
                break;
                case "related_code":
                return products_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_related_is_id($id);
    }

    function is_product_code($product_code) {
        return products_related_is_product_code($product_code);
    }

    function is_related_code($related_code) {
        return products_related_is_related_code($related_code);
    }

    function is_order_by($order_by) {
        return products_related_is_order_by($order_by);
    }

    function is_status($status) {
        return products_related_is_status($status);
    }


}
