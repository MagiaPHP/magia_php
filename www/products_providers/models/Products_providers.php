<?php
 // products_providers
 // Date: 2024-07-31    
################################################################################

class Products_providers {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * provider_id
    */ 
    public $_provider_id;
    /** 
    * provider_code
    */ 
    public $_provider_code;
    /** 
    * url
    */ 
    public $_url;
    /** 
    * price
    */ 
    public $_price;
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
    function getProduct_code () {
        return $this->_product_code; 
    }
    function getProvider_id () {
        return $this->_provider_id; 
    }
    function getProvider_code () {
        return $this->_provider_code; 
    }
    function getUrl () {
        return $this->_url; 
    }
    function getPrice () {
        return $this->_price; 
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

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setProduct_code ($product_code) {
        $this->_product_code = $product_code; 
    }
    function setProvider_id ($provider_id) {
        $this->_provider_id = $provider_id; 
    }
    function setProvider_code ($provider_code) {
        $this->_provider_code = $provider_code; 
    }
    function setUrl ($url) {
        $this->_url = $url; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
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
   
    function setProducts_providers($id) {
        $products_providers = products_providers_details($id);
        //
        $this->_id = $products_providers["id"];
        $this->_product_code = $products_providers["product_code"];
        $this->_provider_id = $products_providers["provider_id"];
        $this->_provider_code = $products_providers["provider_code"];
        $this->_url = $products_providers["url"];
        $this->_price = $products_providers["price"];
        $this->_notes = $products_providers["notes"];
        $this->_order_by = $products_providers["order_by"];
        $this->_status = $products_providers["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_providers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_providers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_providers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_providers_list($start, $limit);
    }

    function details($id) {
        return products_providers_details($id);
    }

    function delete($id) {
        return products_providers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_providers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_providers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_providers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_providers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_providers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_providers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_providers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_providers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_providers_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "product_code":
                return products_field_id("code", $value);
                break;
                case "provider_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_providers_is_id($id);
    }

    function is_product_code($product_code) {
        return products_providers_is_product_code($product_code);
    }

    function is_provider_id($provider_id) {
        return products_providers_is_provider_id($provider_id);
    }

    function is_provider_code($provider_code) {
        return products_providers_is_provider_code($provider_code);
    }

    function is_url($url) {
        return products_providers_is_url($url);
    }

    function is_price($price) {
        return products_providers_is_price($price);
    }

    function is_notes($notes) {
        return products_providers_is_notes($notes);
    }

    function is_order_by($order_by) {
        return products_providers_is_order_by($order_by);
    }

    function is_status($status) {
        return products_providers_is_status($status);
    }


}
