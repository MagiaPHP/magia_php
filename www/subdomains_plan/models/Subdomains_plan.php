<?php

// subdomains_plan
// Date: 2024-01-19    
################################################################################

class Subdomains_plan {

    /**
     * id
     */
    public $_id;

    /**
     * plan
     */
    public $_plan;

    /**
     * features
     */
    public $_features;

    /**
     * price
     */
    public $_price;

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

    function getPlan() {
        return $this->_plan;
    }

    function getFeatures() {
        return $this->_features;
    }

    function getPrice() {
        return $this->_price;
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

    function setPlan($plan) {
        $this->_plan = $plan;
    }

    function setFeatures($features) {
        $this->_features = $features;
    }

    function setPrice($price) {
        $this->_price = $price;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setSubdomains_plan($id) {
        $subdomains_plan = subdomains_plan_details($id);
        //
        $this->_id = $subdomains_plan["id"];
        $this->_plan = $subdomains_plan["plan"];
        $this->_features = $subdomains_plan["features"];
        $this->_price = $subdomains_plan["price"];
        $this->_order_by = $subdomains_plan["order_by"];
        $this->_status = $subdomains_plan["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return subdomains_plan_field_id($field, $id);
    }

    function field_code($field, $code) {
        return subdomains_plan_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return subdomains_plan_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return subdomains_plan_list($start, $limit);
    }

    function details($id) {
        return subdomains_plan_details($id);
    }

    function delete($id) {
        return subdomains_plan_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_plan_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_plan_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return subdomains_plan_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return subdomains_plan_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return subdomains_plan_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return subdomains_plan_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return subdomains_plan_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return subdomains_plan_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return subdomains_plan_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return subdomains_plan_is_id($id);
    }

    function is_plan($plan) {
        return subdomains_plan_is_plan($plan);
    }

    function is_features($features) {
        return subdomains_plan_is_features($features);
    }

    function is_price($price) {
        return subdomains_plan_is_price($price);
    }

    function is_order_by($order_by) {
        return subdomains_plan_is_order_by($order_by);
    }

    function is_status($status) {
        return subdomains_plan_is_status($status);
    }
}
