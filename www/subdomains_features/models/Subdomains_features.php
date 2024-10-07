<?php

// subdomains_features
// Date: 2024-01-19    
################################################################################

class Subdomains_features {

    /**
     * id
     */
    public $_id;

    /**
     * feature
     */
    public $_feature;

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

    function getFeature() {
        return $this->_feature;
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

    function setFeature($feature) {
        $this->_feature = $feature;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setSubdomains_features($id) {
        $subdomains_features = subdomains_features_details($id);
        //
        $this->_id = $subdomains_features["id"];
        $this->_feature = $subdomains_features["feature"];
        $this->_order_by = $subdomains_features["order_by"];
        $this->_status = $subdomains_features["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return subdomains_features_field_id($field, $id);
    }

    function field_code($field, $code) {
        return subdomains_features_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return subdomains_features_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return subdomains_features_list($start, $limit);
    }

    function details($id) {
        return subdomains_features_details($id);
    }

    function delete($id) {
        return subdomains_features_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_features_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_features_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return subdomains_features_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return subdomains_features_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return subdomains_features_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return subdomains_features_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return subdomains_features_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return subdomains_features_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return subdomains_features_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return subdomains_features_is_id($id);
    }

    function is_feature($feature) {
        return subdomains_features_is_feature($feature);
    }

    function is_order_by($order_by) {
        return subdomains_features_is_order_by($order_by);
    }

    function is_status($status) {
        return subdomains_features_is_status($status);
    }
}
