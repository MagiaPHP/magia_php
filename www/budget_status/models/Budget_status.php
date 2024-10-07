<?php

// budget_status
// Date: 2023-08-01    
################################################################################

class Budget_status {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * status
     */
    public $_status;

    /**
     * order_by
     */
    public $_order_by;

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getCode() {
        return $this->_code;
    }

    function getStatus() {
        return $this->_status;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setBudget_status($id) {
        $budget_status = budget_status_details($id);
        //
        $this->_id = $budget_status["id"];
        $this->_code = $budget_status["code"];
        $this->_status = $budget_status["status"];
        $this->_order_by = $budget_status["order_by"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return budget_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return budget_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return budget_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return budget_status_list($start, $limit);
    }

    function details($id) {
        return budget_status_details($id);
    }

    function delete($id) {
        return budget_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return budget_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return budget_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return budget_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return budget_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return budget_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return budget_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return budget_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return budget_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return budget_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return budget_status_is_id($id);
    }

    function is_code($code) {
        return budget_status_is_code($code);
    }

    function is_status($status) {
        return budget_status_is_status($status);
    }

    function is_order_by($order_by) {
        return budget_status_is_order_by($order_by);
    }
}
