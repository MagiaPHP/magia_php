<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:14 

 

class Inv_products {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product
    */ 
    public $_product;
    /** 
    * description
    */ 
    public $_description;
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
    function getProduct () {
        return $this->_product; 
    }
    function getDescription () {
        return $this->_description; 
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
    function setProduct ($product) {
        $this->_product = $product; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setInv_products($id) {
        $inv_products = inv_products_details($id);
        //
        $this->_id = $inv_products["id"];
        $this->_product = $inv_products["product"];
        $this->_description = $inv_products["description"];
        $this->_order_by = $inv_products["order_by"];
        $this->_status = $inv_products["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return inv_products_field_id($field, $id);
    }

    function field_code($field, $code) {
        return inv_products_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return inv_products_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return inv_products_list($start, $limit);
    }

    function details($id) {
        return inv_products_details($id);
    }

    function delete($id) {
        return inv_products_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return inv_products_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return inv_products_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return inv_products_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return inv_products_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return inv_products_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return inv_products_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return inv_products_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return inv_products_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return inv_products_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return inv_products_is_id($id);
    }

    function is_product($product) {
        return inv_products_is_product($product);
    }

    function is_description($description) {
        return inv_products_is_description($description);
    }

    function is_order_by($order_by) {
        return inv_products_is_order_by($order_by);
    }

    function is_status($status) {
        return inv_products_is_status($status);
    }


}
