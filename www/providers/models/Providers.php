<?php

// providers
// Date: 2024-04-05    
################################################################################

class Providers {

    /**
     * id
     */
    public $_id;

    /**
     * company_id
     */
    public $_company_id;

    /**
     * client_number
     */
    public $_client_number;

    /**
     * date
     */
    public $_date;

    /**
     * discount
     */
    public $_discount;

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

    function getCompany_id() {
        return $this->_company_id;
    }

    function getClient_number() {
        return $this->_client_number;
    }

    function getDate() {
        return $this->_date;
    }

    function getDiscount() {
        return $this->_discount;
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

    function setCompany_id($company_id) {
        $this->_company_id = $company_id;
    }

    function setClient_number($client_number) {
        $this->_client_number = $client_number;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDiscount($discount) {
        $this->_discount = $discount;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setProviders($id) {
        $providers = providers_details($id);
        //
        $this->_id = $providers["id"];
        $this->_company_id = $providers["company_id"];
        $this->_client_number = $providers["client_number"];
        $this->_date = $providers["date"];
        $this->_discount = $providers["discount"];
        $this->_order_by = $providers["order_by"];
        $this->_status = $providers["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return providers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return providers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return providers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return providers_list($start, $limit);
    }

    function details($id) {
        return providers_details($id);
    }

    function delete($id) {
        return providers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return providers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return providers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return providers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return providers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return providers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return providers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return providers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return providers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return providers_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return providers_is_id($id);
    }

    function is_company_id($company_id) {
        return providers_is_company_id($company_id);
    }

    function is_client_number($client_number) {
        return providers_is_client_number($client_number);
    }

    function is_date($date) {
        return providers_is_date($date);
    }

    function is_discount($discount) {
        return providers_is_discount($discount);
    }

    function is_order_by($order_by) {
        return providers_is_order_by($order_by);
    }

    function is_status($status) {
        return providers_is_status($status);
    }
}
