<?php

// invoices_separators
// Date: 2024-04-29    
################################################################################

class Invoices_separators {

    /**
     * id
     */
    public $_id;

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

    function getId() {
        return $this->_id;
    }

    function getDescription() {
        return $this->_description;
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

    function setDescription($description) {
        $this->_description = $description;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setInvoices_separators($id) {
        $invoices_separators = invoices_separators_details($id);
        //
        $this->_id = $invoices_separators["id"];
        $this->_description = $invoices_separators["description"];
        $this->_order_by = $invoices_separators["order_by"];
        $this->_status = $invoices_separators["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return invoices_separators_field_id($field, $id);
    }

    function field_code($field, $code) {
        return invoices_separators_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return invoices_separators_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return invoices_separators_list($start, $limit);
    }

    function details($id) {
        return invoices_separators_details($id);
    }

    function delete($id) {
        return invoices_separators_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return invoices_separators_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return invoices_separators_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return invoices_separators_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return invoices_separators_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return invoices_separators_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return invoices_separators_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return invoices_separators_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return invoices_separators_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return invoices_separators_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return invoices_separators_is_id($id);
    }

    function is_description($description) {
        return invoices_separators_is_description($description);
    }

    function is_order_by($order_by) {
        return invoices_separators_is_order_by($order_by);
    }

    function is_status($status) {
        return invoices_separators_is_status($status);
    }
}
