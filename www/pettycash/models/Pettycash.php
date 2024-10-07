<?php

// pettycash
// Date: 2024-05-30    
################################################################################

class Pettycash {

    /**
     * id
     */
    public $_id;

    /**
     * date
     */
    public $_date;

    /**
     * description
     */
    public $_description;

    /**
     * total
     */
    public $_total;

    /**
     * date_registre
     */
    public $_date_registre;

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

    function getDate() {
        return $this->_date;
    }

    function getDescription() {
        return $this->_description;
    }

    function getTotal() {
        return $this->_total;
    }

    function getDate_registre() {
        return $this->_date_registre;
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

    function setDate($date) {
        $this->_date = $date;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setPettycash($id) {
        $pettycash = pettycash_details($id);
        //
        $this->_id = $pettycash["id"];
        $this->_date = $pettycash["date"];
        $this->_description = $pettycash["description"];
        $this->_total = $pettycash["total"];
        $this->_date_registre = $pettycash["date_registre"];
        $this->_order_by = $pettycash["order_by"];
        $this->_status = $pettycash["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return pettycash_field_id($field, $id);
    }

    function field_code($field, $code) {
        return pettycash_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return pettycash_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return pettycash_list($start, $limit);
    }

    function details($id) {
        return pettycash_details($id);
    }

    function delete($id) {
        return pettycash_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return pettycash_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return pettycash_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return pettycash_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return pettycash_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return pettycash_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return pettycash_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return pettycash_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return pettycash_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return pettycash_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return pettycash_is_id($id);
    }

    function is_date($date) {
        return pettycash_is_date($date);
    }

    function is_description($description) {
        return pettycash_is_description($description);
    }

    function is_total($total) {
        return pettycash_is_total($total);
    }

    function is_date_registre($date_registre) {
        return pettycash_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return pettycash_is_order_by($order_by);
    }

    function is_status($status) {
        return pettycash_is_status($status);
    }
}
