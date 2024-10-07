<?php
 // products_price
 // Date: 2024-07-31    
################################################################################

class Products_price {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * date_from
    */ 
    public $_date_from;
    /** 
    * date_to
    */ 
    public $_date_to;
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
    function getPrice () {
        return $this->_price; 
    }
    function getDate_from () {
        return $this->_date_from; 
    }
    function getDate_to () {
        return $this->_date_to; 
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
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setDate_from ($date_from) {
        $this->_date_from = $date_from; 
    }
    function setDate_to ($date_to) {
        $this->_date_to = $date_to; 
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
   
    function setProducts_price($id) {
        $products_price = products_price_details($id);
        //
        $this->_id = $products_price["id"];
        $this->_product_code = $products_price["product_code"];
        $this->_price = $products_price["price"];
        $this->_date_from = $products_price["date_from"];
        $this->_date_to = $products_price["date_to"];
        $this->_online = $products_price["online"];
        $this->_order_by = $products_price["order_by"];
        $this->_status = $products_price["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_price_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_price_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_price_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_price_list($start, $limit);
    }

    function details($id) {
        return products_price_details($id);
    }

    function delete($id) {
        return products_price_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_price_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_price_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_price_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_price_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_price_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_price_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_price_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_price_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_price_function($col_name, $value);
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
        return products_price_is_id($id);
    }

    function is_product_code($product_code) {
        return products_price_is_product_code($product_code);
    }

    function is_price($price) {
        return products_price_is_price($price);
    }

    function is_date_from($date_from) {
        return products_price_is_date_from($date_from);
    }

    function is_date_to($date_to) {
        return products_price_is_date_to($date_to);
    }

    function is_online($online) {
        return products_price_is_online($online);
    }

    function is_order_by($order_by) {
        return products_price_is_order_by($order_by);
    }

    function is_status($status) {
        return products_price_is_status($status);
    }


}
