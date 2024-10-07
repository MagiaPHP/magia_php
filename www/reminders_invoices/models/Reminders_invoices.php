<?php

// reminders_invoices
// Date: 2024-02-07    
################################################################################

class Reminders_invoices {

    /**
     * id
     */
    public $_id;

    /**
     * date_registre
     */
    public $_date_registre;

    /**
     * invoice_id
     */
    public $_invoice_id;

    /**
     * invoice_solde
     */
    public $_invoice_solde;

    /**
     * reminder
     */
    public $_reminder;

    /**
     * reminder_percent
     */
    public $_reminder_percent;

    /**
     * invoice_to_add_id
     */
    public $_invoice_to_add_id;

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

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
    }

    function getInvoice_solde() {
        return $this->_invoice_solde;
    }

    function getReminder() {
        return $this->_reminder;
    }

    function getReminder_percent() {
        return $this->_reminder_percent;
    }

    function getInvoice_to_add_id() {
        return $this->_invoice_to_add_id;
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

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setInvoice_solde($invoice_solde) {
        $this->_invoice_solde = $invoice_solde;
    }

    function setReminder($reminder) {
        $this->_reminder = $reminder;
    }

    function setReminder_percent($reminder_percent) {
        $this->_reminder_percent = $reminder_percent;
    }

    function setInvoice_to_add_id($invoice_to_add_id) {
        $this->_invoice_to_add_id = $invoice_to_add_id;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setReminders_invoices($id) {
        $reminders_invoices = reminders_invoices_details($id);
        //
        $this->_id = $reminders_invoices["id"];
        $this->_date_registre = $reminders_invoices["date_registre"];
        $this->_invoice_id = $reminders_invoices["invoice_id"];
        $this->_invoice_solde = $reminders_invoices["invoice_solde"];
        $this->_reminder = $reminders_invoices["reminder"];
        $this->_reminder_percent = $reminders_invoices["reminder_percent"];
        $this->_invoice_to_add_id = $reminders_invoices["invoice_to_add_id"];
        $this->_order_by = $reminders_invoices["order_by"];
        $this->_status = $reminders_invoices["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return reminders_invoices_field_id($field, $id);
    }

    function field_code($field, $code) {
        return reminders_invoices_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return reminders_invoices_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return reminders_invoices_list($start, $limit);
    }

    function details($id) {
        return reminders_invoices_details($id);
    }

    function delete($id) {
        return reminders_invoices_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return reminders_invoices_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return reminders_invoices_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return reminders_invoices_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return reminders_invoices_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return reminders_invoices_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return reminders_invoices_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return reminders_invoices_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return reminders_invoices_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return reminders_invoices_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return reminders_invoices_is_id($id);
    }

    function is_date_registre($date_registre) {
        return reminders_invoices_is_date_registre($date_registre);
    }

    function is_invoice_id($invoice_id) {
        return reminders_invoices_is_invoice_id($invoice_id);
    }

    function is_invoice_solde($invoice_solde) {
        return reminders_invoices_is_invoice_solde($invoice_solde);
    }

    function is_reminder($reminder) {
        return reminders_invoices_is_reminder($reminder);
    }

    function is_reminder_percent($reminder_percent) {
        return reminders_invoices_is_reminder_percent($reminder_percent);
    }

    function is_invoice_to_add_id($invoice_to_add_id) {
        return reminders_invoices_is_invoice_to_add_id($invoice_to_add_id);
    }

    function is_order_by($order_by) {
        return reminders_invoices_is_order_by($order_by);
    }

    function is_status($status) {
        return reminders_invoices_is_status($status);
    }
}
