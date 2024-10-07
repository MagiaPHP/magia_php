<?php
 // products_presentation
 // Date: 2024-07-31    
################################################################################

class Products_presentation {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * product_code
    */ 
    public $_product_code;
    /** 
    * presentation_code
    */ 
    public $_presentation_code;
    /** 
    * contains_total
    */ 
    public $_contains_total;
    /** 
    * contains_code
    */ 
    public $_contains_code;
    /** 
    * height
    */ 
    public $_height;
    /** 
    * width
    */ 
    public $_width;
    /** 
    * depth
    */ 
    public $_depth;
    /** 
    * weight
    */ 
    public $_weight;
    /** 
    * code
    */ 
    public $_code;
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
    function getPresentation_code () {
        return $this->_presentation_code; 
    }
    function getContains_total () {
        return $this->_contains_total; 
    }
    function getContains_code () {
        return $this->_contains_code; 
    }
    function getHeight () {
        return $this->_height; 
    }
    function getWidth () {
        return $this->_width; 
    }
    function getDepth () {
        return $this->_depth; 
    }
    function getWeight () {
        return $this->_weight; 
    }
    function getCode () {
        return $this->_code; 
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
    function setPresentation_code ($presentation_code) {
        $this->_presentation_code = $presentation_code; 
    }
    function setContains_total ($contains_total) {
        $this->_contains_total = $contains_total; 
    }
    function setContains_code ($contains_code) {
        $this->_contains_code = $contains_code; 
    }
    function setHeight ($height) {
        $this->_height = $height; 
    }
    function setWidth ($width) {
        $this->_width = $width; 
    }
    function setDepth ($depth) {
        $this->_depth = $depth; 
    }
    function setWeight ($weight) {
        $this->_weight = $weight; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_presentation($id) {
        $products_presentation = products_presentation_details($id);
        //
        $this->_id = $products_presentation["id"];
        $this->_product_code = $products_presentation["product_code"];
        $this->_presentation_code = $products_presentation["presentation_code"];
        $this->_contains_total = $products_presentation["contains_total"];
        $this->_contains_code = $products_presentation["contains_code"];
        $this->_height = $products_presentation["height"];
        $this->_width = $products_presentation["width"];
        $this->_depth = $products_presentation["depth"];
        $this->_weight = $products_presentation["weight"];
        $this->_code = $products_presentation["code"];
        $this->_order_by = $products_presentation["order_by"];
        $this->_status = $products_presentation["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_presentation_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_presentation_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_presentation_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_presentation_list($start, $limit);
    }

    function details($id) {
        return products_presentation_details($id);
    }

    function delete($id) {
        return products_presentation_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_presentation_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_presentation_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_presentation_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_presentation_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_presentation_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_presentation_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_presentation_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_presentation_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_presentation_function($col_name, $value);
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
        return products_presentation_is_id($id);
    }

    function is_product_code($product_code) {
        return products_presentation_is_product_code($product_code);
    }

    function is_presentation_code($presentation_code) {
        return products_presentation_is_presentation_code($presentation_code);
    }

    function is_contains_total($contains_total) {
        return products_presentation_is_contains_total($contains_total);
    }

    function is_contains_code($contains_code) {
        return products_presentation_is_contains_code($contains_code);
    }

    function is_height($height) {
        return products_presentation_is_height($height);
    }

    function is_width($width) {
        return products_presentation_is_width($width);
    }

    function is_depth($depth) {
        return products_presentation_is_depth($depth);
    }

    function is_weight($weight) {
        return products_presentation_is_weight($weight);
    }

    function is_code($code) {
        return products_presentation_is_code($code);
    }

    function is_order_by($order_by) {
        return products_presentation_is_order_by($order_by);
    }

    function is_status($status) {
        return products_presentation_is_status($status);
    }


}
