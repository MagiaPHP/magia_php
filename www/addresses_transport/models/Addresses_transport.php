<?php

// addresses_transport
// Date: 2023-08-01    
################################################################################

class Addresses_transport {

    /**
     * id
     */
    public $_id;

    /**
     * addresses_id
     */
    public $_addresses_id;

    /**
     * transport_code
     */
    public $_transport_code;

    /**
     * transport_ref
     */
    public $_transport_ref;

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getAddresses_id() {
        return $this->_addresses_id;
    }

    function getTransport_code() {
        return $this->_transport_code;
    }

    function getTransport_ref() {
        return $this->_transport_ref;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setAddresses_id($addresses_id) {
        $this->_addresses_id = $addresses_id;
    }

    function setTransport_code($transport_code) {
        $this->_transport_code = $transport_code;
    }

    function setTransport_ref($transport_ref) {
        $this->_transport_ref = $transport_ref;
    }

    function setAddresses_transport($id) {
        $addresses_transport = addresses_transport_details($id);
        //
        $this->_id = $addresses_transport["id"];
        $this->_addresses_id = $addresses_transport["addresses_id"];
        $this->_transport_code = $addresses_transport["transport_code"];
        $this->_transport_ref = $addresses_transport["transport_ref"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return addresses_transport_field_id($field, $id);
    }

    function field_code($field, $code) {
        return addresses_transport_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return addresses_transport_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return addresses_transport_list($start, $limit);
    }

    function details($id) {
        return addresses_transport_details($id);
    }

    function delete($id) {
        return addresses_transport_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return addresses_transport_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return addresses_transport_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return addresses_transport_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return addresses_transport_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return addresses_transport_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return addresses_transport_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return addresses_transport_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return addresses_transport_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return addresses_transport_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return addresses_transport_is_id($id);
    }

    function is_addresses_id($addresses_id) {
        return addresses_transport_is_addresses_id($addresses_id);
    }

    function is_transport_code($transport_code) {
        return addresses_transport_is_transport_code($transport_code);
    }

    function is_transport_ref($transport_ref) {
        return addresses_transport_is_transport_ref($transport_ref);
    }
}
