<?php
 // products_pictures
 // Date: 2024-07-31    
################################################################################

class Products_pictures {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * picture_id
    */ 
    public $_picture_id;
    /** 
    * principal
    */ 
    public $_principal;
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
    function getPicture_id () {
        return $this->_picture_id; 
    }
    function getPrincipal () {
        return $this->_principal; 
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
    function setPicture_id ($picture_id) {
        $this->_picture_id = $picture_id; 
    }
    function setPrincipal ($principal) {
        $this->_principal = $principal; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_pictures($id) {
        $products_pictures = products_pictures_details($id);
        //
        $this->_id = $products_pictures["id"];
        $this->_product_code = $products_pictures["product_code"];
        $this->_picture_id = $products_pictures["picture_id"];
        $this->_principal = $products_pictures["principal"];
        $this->_order_by = $products_pictures["order_by"];
        $this->_status = $products_pictures["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_pictures_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_pictures_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_pictures_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_pictures_list($start, $limit);
    }

    function details($id) {
        return products_pictures_details($id);
    }

    function delete($id) {
        return products_pictures_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_pictures_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_pictures_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_pictures_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_pictures_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_pictures_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_pictures_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_pictures_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_pictures_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_pictures_function($col_name, $value);
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
        return products_pictures_is_id($id);
    }

    function is_product_code($product_code) {
        return products_pictures_is_product_code($product_code);
    }

    function is_picture_id($picture_id) {
        return products_pictures_is_picture_id($picture_id);
    }

    function is_principal($principal) {
        return products_pictures_is_principal($principal);
    }

    function is_order_by($order_by) {
        return products_pictures_is_order_by($order_by);
    }

    function is_status($status) {
        return products_pictures_is_status($status);
    }


}
