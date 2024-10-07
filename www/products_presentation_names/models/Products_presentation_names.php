<?php
 // products_presentation_names
 // Date: 2024-07-31    
################################################################################

class Products_presentation_names {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * presentation
    */ 
    public $_presentation;
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
    function getPresentation () {
        return $this->_presentation; 
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
    function setPresentation ($presentation) {
        $this->_presentation = $presentation; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProducts_presentation_names($id) {
        $products_presentation_names = products_presentation_names_details($id);
        //
        $this->_id = $products_presentation_names["id"];
        $this->_presentation = $products_presentation_names["presentation"];
        $this->_order_by = $products_presentation_names["order_by"];
        $this->_status = $products_presentation_names["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return products_presentation_names_field_id($field, $id);
    }

    function field_code($field, $code) {
        return products_presentation_names_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return products_presentation_names_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return products_presentation_names_list($start, $limit);
    }

    function details($id) {
        return products_presentation_names_details($id);
    }

    function delete($id) {
        return products_presentation_names_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return products_presentation_names_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return products_presentation_names_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return products_presentation_names_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return products_presentation_names_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return products_presentation_names_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return products_presentation_names_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return products_presentation_names_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return products_presentation_names_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return products_presentation_names_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return products_presentation_names_is_id($id);
    }

    function is_presentation($presentation) {
        return products_presentation_names_is_presentation($presentation);
    }

    function is_order_by($order_by) {
        return products_presentation_names_is_order_by($order_by);
    }

    function is_status($status) {
        return products_presentation_names_is_status($status);
    }


}
