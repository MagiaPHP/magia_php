<?php

// investment_lines
// Date: 2024-01-29    
################################################################################

class Investment_lines {

    /**
     * id
     */
    public $_id;

    /**
     * investment_id
     */
    public $_investment_id;

    /**
     * date
     */
    public $_date;

    /**
     * value
     */
    public $_value;

    /**
     * irf
     */
    public $_irf;

    /**
     * date_payment
     */
    public $_date_payment;

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

    function getInvestment_id() {
        return $this->_investment_id;
    }

    function getDate() {
        return $this->_date;
    }

    function getValue() {
        return $this->_value;
    }

    function getIrf() {
        return $this->_irf;
    }

    function getDate_payment() {
        return $this->_date_payment;
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

    function setInvestment_id($investment_id) {
        $this->_investment_id = $investment_id;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setValue($value) {
        $this->_value = $value;
    }

    function setIrf($irf) {
        $this->_irf = $irf;
    }

    function setDate_payment($date_payment) {
        $this->_date_payment = $date_payment;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setInvestment_lines($id) {
        $investment_lines = investment_lines_details($id);
        //
        $this->_id = $investment_lines["id"];
        $this->_investment_id = $investment_lines["investment_id"];
        $this->_date = $investment_lines["date"];
        $this->_value = $investment_lines["value"];
        $this->_irf = $investment_lines["irf"];
        $this->_date_payment = $investment_lines["date_payment"];
        $this->_order_by = $investment_lines["order_by"];
        $this->_status = $investment_lines["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return investment_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return investment_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return investment_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return investment_lines_list($start, $limit);
    }

    function details($id) {
        return investment_lines_details($id);
    }

    function delete($id) {
        return investment_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return investment_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return investment_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return investment_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return investment_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return investment_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return investment_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return investment_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return investment_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return investment_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "investment_id":
                return investments_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return investment_lines_is_id($id);
    }

    function is_investment_id($investment_id) {
        return investment_lines_is_investment_id($investment_id);
    }

    function is_date($date) {
        return investment_lines_is_date($date);
    }

    function is_value($value) {
        return investment_lines_is_value($value);
    }

    function is_irf($irf) {
        return investment_lines_is_irf($irf);
    }

    function is_date_payment($date_payment) {
        return investment_lines_is_date_payment($date_payment);
    }

    function is_order_by($order_by) {
        return investment_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return investment_lines_is_status($status);
    }
}
