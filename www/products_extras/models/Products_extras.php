<?php
 // products_extras
 // Date: 2024-07-31    
################################################################################

class Products_extras {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * extra_name
    */ 
    public $_extra_name;
    /** 
    * extra_value
    */ 
    public $_extra_value;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * online
    */ 
    public $_online;
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
    function getExtra_name () {
        return $this->_extra_name; 
    }
    function getExtra_value () {
        return $this->_extra_value; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getOnline () {
        return $this->_online; 
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
    function setExtra_name ($extra_name) {
        $this->_extra_name = $extra_name; 
    }
    function setExtra_value ($extra_value) {
        $this->_extra_value = $extra_value; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setOnline ($online) {
        $this->_online = $online; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_extras($id) {
        $products_extras = products_extras_details($id);
        //
        $this->_id = $products_extras["id"];
        $this->_product_code = $products_extras["product_code"];
        $this->_extra_name = $products_extras["extra_name"];
        $this->_extra_value = $products_extras["extra_value"];
        $this->_price = $products_extras["price"];
        $this->_online = $products_extras["online"];
        $this->_order_by = $products_extras["order_by"];
        $this->_status = $products_extras["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_extras_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_extras_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_extras_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_extras_list($start, $limit);
    }

    function details($id) {
        return products_extras_details($id);
    }

    function delete($id) {
        return products_extras_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_extras_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_extras_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_extras_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_extras_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_extras_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_extras_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_extras_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_extras_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_extras_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "product_code":
                return products_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_extras_is_id($id);
    }

    function is_product_code($product_code) {
        return products_extras_is_product_code($product_code);
    }

    function is_extra_name($extra_name) {
        return products_extras_is_extra_name($extra_name);
    }

    function is_extra_value($extra_value) {
        return products_extras_is_extra_value($extra_value);
    }

    function is_price($price) {
        return products_extras_is_price($price);
    }

    function is_online($online) {
        return products_extras_is_online($online);
    }

    function is_order_by($order_by) {
        return products_extras_is_order_by($order_by);
    }

    function is_status($status) {
        return products_extras_is_status($status);
    }


}
