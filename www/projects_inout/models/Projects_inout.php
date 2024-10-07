<?php

// projects_inout
// Date: 2024-04-02    
################################################################################

class Projects_inout {

    /**
     * id
     */
    public $_id;

    /**
     * project_id
     */
    public $_project_id;

    /**
     * budget_id
     */
    public $_budget_id;

    /**
     * invoice_id
     */
    public $_invoice_id;

    /**
     * expense_id
     */
    public $_expense_id;

    /**
     * value
     */
    public $_value;

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

    function getProject_id() {
        return $this->_project_id;
    }

    function getBudget_id() {
        return $this->_budget_id;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
    }

    function getExpense_id() {
        return $this->_expense_id;
    }

    function getValue() {
        return $this->_value;
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

    function setProject_id($project_id) {
        $this->_project_id = $project_id;
    }

    function setBudget_id($budget_id) {
        $this->_budget_id = $budget_id;
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setExpense_id($expense_id) {
        $this->_expense_id = $expense_id;
    }

    function setValue($value) {
        $this->_value = $value;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setProjects_inout($id) {
        $projects_inout = projects_inout_details($id);
        //
        $this->_id = $projects_inout["id"];
        $this->_project_id = $projects_inout["project_id"];
        $this->_budget_id = $projects_inout["budget_id"];
        $this->_invoice_id = $projects_inout["invoice_id"];
        $this->_expense_id = $projects_inout["expense_id"];
        $this->_value = $projects_inout["value"];
        $this->_order_by = $projects_inout["order_by"];
        $this->_status = $projects_inout["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return projects_inout_field_id($field, $id);
    }

    function field_code($field, $code) {
        return projects_inout_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return projects_inout_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return projects_inout_list($start, $limit);
    }

    function details($id) {
        return projects_inout_details($id);
    }

    function delete($id) {
        return projects_inout_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return projects_inout_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return projects_inout_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return projects_inout_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return projects_inout_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return projects_inout_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return projects_inout_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return projects_inout_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return projects_inout_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return projects_inout_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "project_id":
                return projects_field_id("id", $value);
                break;
            case "budget_id":
                return budgets_field_id("id", $value);
                break;
            case "invoice_id":
                return invoices_field_id("id", $value);
                break;
            case "expense_id":
                return expenses_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return projects_inout_is_id($id);
    }

    function is_project_id($project_id) {
        return projects_inout_is_project_id($project_id);
    }

    function is_budget_id($budget_id) {
        return projects_inout_is_budget_id($budget_id);
    }

    function is_invoice_id($invoice_id) {
        return projects_inout_is_invoice_id($invoice_id);
    }

    function is_expense_id($expense_id) {
        return projects_inout_is_expense_id($expense_id);
    }

    function is_value($value) {
        return projects_inout_is_value($value);
    }

    function is_order_by($order_by) {
        return projects_inout_is_order_by($order_by);
    }

    function is_status($status) {
        return projects_inout_is_status($status);
    }
}
