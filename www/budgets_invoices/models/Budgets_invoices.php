<?php

// budgets_invoices
// Date: 2023-08-01    
################################################################################

class Budgets_invoices {

    /**
     * id
     */
    public $_id;

    /**
     * budget_id
     */
    public $_budget_id;

    /**
     * invoice_id
     */
    public $_invoice_id;

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

    function getBudget_id() {
        return $this->_budget_id;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
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

    function setBudget_id($budget_id) {
        $this->_budget_id = $budget_id;
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
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

    function setBudgets_invoices($id) {
        $budgets_invoices = budgets_invoices_details($id);
        //
        $this->_id = $budgets_invoices["id"];
        $this->_budget_id = $budgets_invoices["budget_id"];
        $this->_invoice_id = $budgets_invoices["invoice_id"];
        $this->_date_registre = $budgets_invoices["date_registre"];
        $this->_order_by = $budgets_invoices["order_by"];
        $this->_status = $budgets_invoices["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return budgets_invoices_field_id($field, $id);
    }

    function field_code($field, $code) {
        return budgets_invoices_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return budgets_invoices_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return budgets_invoices_list($start, $limit);
    }

    function details($id) {
        return budgets_invoices_details($id);
    }

    function delete($id) {
        return budgets_invoices_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return budgets_invoices_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return budgets_invoices_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return budgets_invoices_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return budgets_invoices_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return budgets_invoices_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return budgets_invoices_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return budgets_invoices_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return budgets_invoices_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return budgets_invoices_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "budget_id":
                return budgets_field_id("id", $value);
                break;
            case "invoice_id":
                return invoices_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return budgets_invoices_is_id($id);
    }

    function is_budget_id($budget_id) {
        return budgets_invoices_is_budget_id($budget_id);
    }

    function is_invoice_id($invoice_id) {
        return budgets_invoices_is_invoice_id($invoice_id);
    }

    function is_date_registre($date_registre) {
        return budgets_invoices_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return budgets_invoices_is_order_by($order_by);
    }

    function is_status($status) {
        return budgets_invoices_is_status($status);
    }
}
