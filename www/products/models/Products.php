<?php
 // products
 // Date: 2024-07-31    
################################################################################

class Products {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * category_code
    */ 
    public $_category_code;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * tax
    */ 
    public $_tax;
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
    function getCategory_code () {
        return $this->_category_code; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getName () {
        return $this->_name; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getTax () {
        return $this->_tax; 
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
    function setCategory_code ($category_code) {
        $this->_category_code = $category_code; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setTax ($tax) {
        $this->_tax = $tax; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts($id) {
        $products = products_details($id);
        //
        $this->_id = $products["id"];
        $this->_category_code = $products["category_code"];
        $this->_code = $products["code"];
        $this->_name = $products["name"];
        $this->_description = $products["description"];
        $this->_price = $products["price"];
        $this->_tax = $products["tax"];
        $this->_order_by = $products["order_by"];
        $this->_status = $products["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_list($start, $limit);
    }

    function details($id) {
        return products_details($id);
    }

    function delete($id) {
        return products_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "category_code":
                return products_categories_field_id("code", $value);
                break;
                case "tax":
                return tax_field_id("value", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_is_id($id);
    }

    function is_category_code($category_code) {
        return products_is_category_code($category_code);
    }

    function is_code($code) {
        return products_is_code($code);
    }

    function is_name($name) {
        return products_is_name($name);
    }

    function is_description($description) {
        return products_is_description($description);
    }

    function is_price($price) {
        return products_is_price($price);
    }

    function is_tax($tax) {
        return products_is_tax($tax);
    }

    function is_order_by($order_by) {
        return products_is_order_by($order_by);
    }

    function is_status($status) {
        return products_is_status($status);
    }


}
