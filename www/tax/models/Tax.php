<?php

// tax
// Date: 2024-04-12    
################################################################################

class Tax {

    /**
     * id
     */
    public $_id;

    /**
     * name
     */
    public $_name;

    /**
     * value
     */
    public $_value;

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

    function getId() {
        return $this->_id;
    }

    function getName() {
        return $this->_name;
    }

    function getValue() {
        return $this->_value;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setValue($value) {
        $this->_value = $value;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setTax($id) {
        $tax = tax_details($id);
        //
        $this->_id = $tax["id"];
        $this->_name = $tax["name"];
        $this->_value = $tax["value"];
        $this->_order_by = $tax["order_by"];
        $this->_status = $tax["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tax_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tax_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tax_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tax_list($start, $limit);
    }

    function details($id) {
        return tax_details($id);
    }

    function delete($id) {
        return tax_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tax_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tax_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tax_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tax_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tax_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tax_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tax_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tax_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tax_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return tax_is_id($id);
    }

    function is_name($name) {
        return tax_is_name($name);
    }

    function is_value($value) {
        return tax_is_value($value);
    }

    function is_order_by($order_by) {
        return tax_is_order_by($order_by);
    }

    function is_status($status) {
        return tax_is_status($status);
    }
}
