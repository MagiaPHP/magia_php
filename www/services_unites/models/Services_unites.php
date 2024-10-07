<?php

// services_unites
// Date: 2024-04-29    
################################################################################

class Services_unites {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * unites
     */
    public $_unites;

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

    function getCode() {
        return $this->_code;
    }

    function getUnites() {
        return $this->_unites;
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

    function setCode($code) {
        $this->_code = $code;
    }

    function setUnites($unites) {
        $this->_unites = $unites;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setServices_unites($id) {
        $services_unites = services_unites_details($id);
        //
        $this->_id = $services_unites["id"];
        $this->_code = $services_unites["code"];
        $this->_unites = $services_unites["unites"];
        $this->_order_by = $services_unites["order_by"];
        $this->_status = $services_unites["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return services_unites_field_id($field, $id);
    }

    function field_code($field, $code) {
        return services_unites_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return services_unites_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return services_unites_list($start, $limit);
    }

    function details($id) {
        return services_unites_details($id);
    }

    function delete($id) {
        return services_unites_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return services_unites_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return services_unites_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return services_unites_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return services_unites_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return services_unites_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return services_unites_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return services_unites_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return services_unites_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return services_unites_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return services_unites_is_id($id);
    }

    function is_code($code) {
        return services_unites_is_code($code);
    }

    function is_unites($unites) {
        return services_unites_is_unites($unites);
    }

    function is_order_by($order_by) {
        return services_unites_is_order_by($order_by);
    }

    function is_status($status) {
        return services_unites_is_status($status);
    }
}
