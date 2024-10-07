<?php

// services
// Date: 2024-04-29    
################################################################################

class Services {

    /**
     * id
     */
    public $_id;

    /**
     * category_code
     */
    public $_category_code;

    /**
     * code
     */
    public $_code;

    /**
     * service
     */
    public $_service;

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

    function getCategory_code() {
        return $this->_category_code;
    }

    function getCode() {
        return $this->_code;
    }

    function getService() {
        return $this->_service;
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

    function setCategory_code($category_code) {
        $this->_category_code = $category_code;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setService($service) {
        $this->_service = $service;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setServices($id) {
        $services = services_details($id);
        //
        $this->_id = $services["id"];
        $this->_category_code = $services["category_code"];
        $this->_code = $services["code"];
        $this->_service = $services["service"];
        $this->_order_by = $services["order_by"];
        $this->_status = $services["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return services_field_id($field, $id);
    }

    function field_code($field, $code) {
        return services_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return services_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return services_list($start, $limit);
    }

    function details($id) {
        return services_details($id);
    }

    function delete($id) {
        return services_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return services_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return services_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return services_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return services_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return services_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return services_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return services_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return services_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return services_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "category_code":
                return services_categories_field_id("code", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return services_is_id($id);
    }

    function is_category_code($category_code) {
        return services_is_category_code($category_code);
    }

    function is_code($code) {
        return services_is_code($code);
    }

    function is_service($service) {
        return services_is_service($service);
    }

    function is_order_by($order_by) {
        return services_is_order_by($order_by);
    }

    function is_status($status) {
        return services_is_status($status);
    }
}
