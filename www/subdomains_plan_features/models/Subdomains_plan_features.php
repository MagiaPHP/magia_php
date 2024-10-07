<?php

// subdomains_plan_features
// Date: 2024-01-19    
################################################################################

class Subdomains_plan_features {

    /**
     * id
     */
    public $_id;

    /**
     * plan
     */
    public $_plan;

    /**
     * feature
     */
    public $_feature;

    /**
     * order_by
     */
    public $_order_by;

    /**
     * stattus
     */
    public $_stattus;

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

    function getFeature() {
        return $this->_feature;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStattus() {
        return $this->_stattus;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setPlan($plan) {
        $this->_plan = $plan;
    }

    function setFeature($feature) {
        $this->_feature = $feature;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStattus($stattus) {
        $this->_stattus = $stattus;
    }

    function setSubdomains_plan_features($id) {
        $subdomains_plan_features = subdomains_plan_features_details($id);
        //
        $this->_id = $subdomains_plan_features["id"];
        $this->_plan = $subdomains_plan_features["plan"];
        $this->_feature = $subdomains_plan_features["feature"];
        $this->_order_by = $subdomains_plan_features["order_by"];
        $this->_stattus = $subdomains_plan_features["stattus"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return subdomains_plan_features_field_id($field, $id);
    }

    function field_code($field, $code) {
        return subdomains_plan_features_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return subdomains_plan_features_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return subdomains_plan_features_list($start, $limit);
    }

    function details($id) {
        return subdomains_plan_features_details($id);
    }

    function delete($id) {
        return subdomains_plan_features_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_plan_features_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_plan_features_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return subdomains_plan_features_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return subdomains_plan_features_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return subdomains_plan_features_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return subdomains_plan_features_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return subdomains_plan_features_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return subdomains_plan_features_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return subdomains_plan_features_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return subdomains_plan_features_is_id($id);
    }

    function is_plan($plan) {
        return subdomains_plan_features_is_plan($plan);
    }

    function is_feature($feature) {
        return subdomains_plan_features_is_feature($feature);
    }

    function is_order_by($order_by) {
        return subdomains_plan_features_is_order_by($order_by);
    }

    function is_stattus($stattus) {
        return subdomains_plan_features_is_stattus($stattus);
    }
}
