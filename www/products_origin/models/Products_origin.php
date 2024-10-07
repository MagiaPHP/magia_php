<?php
 // products_origin
 // Date: 2024-07-31    
################################################################################

class Products_origin {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * country
    */ 
    public $_country;
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
    function getCountry () {
        return $this->_country; 
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
    function setCountry ($country) {
        $this->_country = $country; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_origin($id) {
        $products_origin = products_origin_details($id);
        //
        $this->_id = $products_origin["id"];
        $this->_product_code = $products_origin["product_code"];
        $this->_country = $products_origin["country"];
        $this->_order_by = $products_origin["order_by"];
        $this->_status = $products_origin["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_origin_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_origin_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_origin_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_origin_list($start, $limit);
    }

    function details($id) {
        return products_origin_details($id);
    }

    function delete($id) {
        return products_origin_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_origin_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_origin_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_origin_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_origin_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_origin_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_origin_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_origin_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_origin_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_origin_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_origin_is_id($id);
    }

    function is_product_code($product_code) {
        return products_origin_is_product_code($product_code);
    }

    function is_country($country) {
        return products_origin_is_country($country);
    }

    function is_order_by($order_by) {
        return products_origin_is_order_by($order_by);
    }

    function is_status($status) {
        return products_origin_is_status($status);
    }


}
