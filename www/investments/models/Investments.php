<?php

// investments
// Date: 2024-01-29    
################################################################################

class Investments {

    /**
     * id
     */
    public $_id;

    /**
     * institution_id
     */
    public $_institution_id;

    /**
     * type
     */
    public $_type;

    /**
     * operation
     */
    public $_operation;

    /**
     * ref
     */
    public $_ref;

    /**
     * amount
     */
    public $_amount;

    /**
     * days
     */
    public $_days;

    /**
     * rate
     */
    public $_rate;

    /**
     * total
     */
    public $_total;

    /**
     * retention
     */
    public $_retention;

    /**
     * date_start
     */
    public $_date_start;

    /**
     * date_end
     */
    public $_date_end;

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

    function getInstitution_id() {
        return $this->_institution_id;
    }

    function getType() {
        return $this->_type;
    }

    function getOperation() {
        return $this->_operation;
    }

    function getRef() {
        return $this->_ref;
    }

    function getAmount() {
        return $this->_amount;
    }

    function getDays() {
        return $this->_days;
    }

    function getRate() {
        return $this->_rate;
    }

    function getTotal() {
        return $this->_total;
    }

    function getRetention() {
        return $this->_retention;
    }

    function getDate_start() {
        return $this->_date_start;
    }

    function getDate_end() {
        return $this->_date_end;
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

    function setInstitution_id($institution_id) {
        $this->_institution_id = $institution_id;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setOperation($operation) {
        $this->_operation = $operation;
    }

    function setRef($ref) {
        $this->_ref = $ref;
    }

    function setAmount($amount) {
        $this->_amount = $amount;
    }

    function setDays($days) {
        $this->_days = $days;
    }

    function setRate($rate) {
        $this->_rate = $rate;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setRetention($retention) {
        $this->_retention = $retention;
    }

    function setDate_start($date_start) {
        $this->_date_start = $date_start;
    }

    function setDate_end($date_end) {
        $this->_date_end = $date_end;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setInvestments($id) {
        $investments = investments_details($id);
        //
        $this->_id = $investments["id"];
        $this->_institution_id = $investments["institution_id"];
        $this->_type = $investments["type"];
        $this->_operation = $investments["operation"];
        $this->_ref = $investments["ref"];
        $this->_amount = $investments["amount"];
        $this->_days = $investments["days"];
        $this->_rate = $investments["rate"];
        $this->_total = $investments["total"];
        $this->_retention = $investments["retention"];
        $this->_date_start = $investments["date_start"];
        $this->_date_end = $investments["date_end"];
        $this->_order_by = $investments["order_by"];
        $this->_status = $investments["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return investments_field_id($field, $id);
    }

    function field_code($field, $code) {
        return investments_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return investments_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return investments_list($start, $limit);
    }

    function details($id) {
        return investments_details($id);
    }

    function delete($id) {
        return investments_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return investments_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return investments_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return investments_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return investments_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return investments_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return investments_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return investments_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return investments_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return investments_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "institution_id":
                return contacts_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return investments_is_id($id);
    }

    function is_institution_id($institution_id) {
        return investments_is_institution_id($institution_id);
    }

    function is_type($type) {
        return investments_is_type($type);
    }

    function is_operation($operation) {
        return investments_is_operation($operation);
    }

    function is_ref($ref) {
        return investments_is_ref($ref);
    }

    function is_amount($amount) {
        return investments_is_amount($amount);
    }

    function is_days($days) {
        return investments_is_days($days);
    }

    function is_rate($rate) {
        return investments_is_rate($rate);
    }

    function is_total($total) {
        return investments_is_total($total);
    }

    function is_retention($retention) {
        return investments_is_retention($retention);
    }

    function is_date_start($date_start) {
        return investments_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return investments_is_date_end($date_end);
    }

    function is_order_by($order_by) {
        return investments_is_order_by($order_by);
    }

    function is_status($status) {
        return investments_is_status($status);
    }
}
