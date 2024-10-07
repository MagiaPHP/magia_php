<?php
 // products_stock
 // Date: 2024-07-31    
################################################################################

class Products_stock {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * office_id
    */ 
    public $_office_id;
    /** 
    * stock
    */ 
    public $_stock;
    /** 
    * stock_min
    */ 
    public $_stock_min;
    /** 
    * stock_max
    */ 
    public $_stock_max;
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
    function getOffice_id () {
        return $this->_office_id; 
    }
    function getStock () {
        return $this->_stock; 
    }
    function getStock_min () {
        return $this->_stock_min; 
    }
    function getStock_max () {
        return $this->_stock_max; 
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
    function setOffice_id ($office_id) {
        $this->_office_id = $office_id; 
    }
    function setStock ($stock) {
        $this->_stock = $stock; 
    }
    function setStock_min ($stock_min) {
        $this->_stock_min = $stock_min; 
    }
    function setStock_max ($stock_max) {
        $this->_stock_max = $stock_max; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_stock($id) {
        $products_stock = products_stock_details($id);
        //
        $this->_id = $products_stock["id"];
        $this->_product_code = $products_stock["product_code"];
        $this->_office_id = $products_stock["office_id"];
        $this->_stock = $products_stock["stock"];
        $this->_stock_min = $products_stock["stock_min"];
        $this->_stock_max = $products_stock["stock_max"];
        $this->_order_by = $products_stock["order_by"];
        $this->_status = $products_stock["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_stock_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_stock_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_stock_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_stock_list($start, $limit);
    }

    function details($id) {
        return products_stock_details($id);
    }

    function delete($id) {
        return products_stock_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_stock_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_stock_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_stock_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_stock_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_stock_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_stock_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_stock_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_stock_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_stock_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "product_code":
                return products_field_id("code", $value);
                break;
                case "office_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_stock_is_id($id);
    }

    function is_product_code($product_code) {
        return products_stock_is_product_code($product_code);
    }

    function is_office_id($office_id) {
        return products_stock_is_office_id($office_id);
    }

    function is_stock($stock) {
        return products_stock_is_stock($stock);
    }

    function is_stock_min($stock_min) {
        return products_stock_is_stock_min($stock_min);
    }

    function is_stock_max($stock_max) {
        return products_stock_is_stock_max($stock_max);
    }

    function is_order_by($order_by) {
        return products_stock_is_order_by($order_by);
    }

    function is_status($status) {
        return products_stock_is_status($status);
    }


}
