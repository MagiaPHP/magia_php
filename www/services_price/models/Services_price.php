<?php

// services_price
// Date: 2024-04-29    
################################################################################

class Services_price {

    /**
     * id
     */
    public $_id;

    /**
     * service_code
     */
    public $_service_code;

    /**
     * unite_code
     */
    public $_unite_code;

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

    function getService_code() {
        return $this->_service_code;
    }

    function getUnite_code() {
        return $this->_unite_code;
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

    function setService_code($service_code) {
        $this->_service_code = $service_code;
    }

    function setUnite_code($unite_code) {
        $this->_unite_code = $unite_code;
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

    function setServices_price($id) {
        $services_price = services_price_details($id);
        //
        $this->_id = $services_price["id"];
        $this->_service_code = $services_price["service_code"];
        $this->_unite_code = $services_price["unite_code"];
        $this->_price = $services_price["price"];
        $this->_order_by = $services_price["order_by"];
        $this->_status = $services_price["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return services_price_field_id($field, $id);
    }

    function field_code($field, $code) {
        return services_price_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return services_price_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return services_price_list($start, $limit);
    }

    function details($id) {
        return services_price_details($id);
    }

    function delete($id) {
        return services_price_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return services_price_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return services_price_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return services_price_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return services_price_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return services_price_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return services_price_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return services_price_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return services_price_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return services_price_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return services_price_is_id($id);
    }

    function is_service_code($service_code) {
        return services_price_is_service_code($service_code);
    }

    function is_unite_code($unite_code) {
        return services_price_is_unite_code($unite_code);
    }

    function is_price($price) {
        return services_price_is_price($price);
    }

    function is_order_by($order_by) {
        return services_price_is_order_by($order_by);
    }

    function is_status($status) {
        return services_price_is_status($status);
    }
}
