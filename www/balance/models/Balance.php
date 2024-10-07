<?php

// balance
// Date: 2023-08-01    
################################################################################

class Balance {

    /**
     * id
     */
    public $_id;

    /**
     * client_id
     */
    public $_client_id;

    /**
     * expense_id
     */
    public $_expense_id;

    /**
     * invoice_id
     */
    public $_invoice_id;

    /**
     * credit_note_id
     */
    public $_credit_note_id;

    /**
     * type
     */
    public $_type;

    /**
     * account_number
     */
    public $_account_number;

    /**
     * sub_total
     */
    public $_sub_total;

    /**
     * tax
     */
    public $_tax;

    /**
     * total
     */
    public $_total;

    /**
     * ref
     */
    public $_ref;

    /**
     * description
     */
    public $_description;

    /**
     * ce
     */
    public $_ce;

    /**
     * date
     */
    public $_date;

    /**
     * date_registre
     */
    public $_date_registre;

    /**
     * code
     */
    public $_code;

    /**
     * canceled
     */
    public $_canceled;

    /**
     * canceled_code
     */
    public $_canceled_code;

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getClient_id() {
        return $this->_client_id;
    }

    function getExpense_id() {
        return $this->_expense_id;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
    }

    function getCredit_note_id() {
        return $this->_credit_note_id;
    }

    function getType() {
        return $this->_type;
    }

    function getAccount_number() {
        return $this->_account_number;
    }

    function getSub_total() {
        return $this->_sub_total;
    }

    function getTax() {
        return $this->_tax;
    }

    function getTotal() {
        return $this->_total;
    }

    function getRef() {
        return $this->_ref;
    }

    function getDescription() {
        return $this->_description;
    }

    function getCe() {
        return $this->_ce;
    }

    function getDate() {
        return $this->_date;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getCode() {
        return $this->_code;
    }

    function getCanceled() {
        return $this->_canceled;
    }

    function getCanceled_code() {
        return $this->_canceled_code;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setClient_id($client_id) {
        $this->_client_id = $client_id;
    }

    function setExpense_id($expense_id) {
        $this->_expense_id = $expense_id;
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setCredit_note_id($credit_note_id) {
        $this->_credit_note_id = $credit_note_id;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setAccount_number($account_number) {
        $this->_account_number = $account_number;
    }

    function setSub_total($sub_total) {
        $this->_sub_total = $sub_total;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setRef($ref) {
        $this->_ref = $ref;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setCe($ce) {
        $this->_ce = $ce;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setCanceled($canceled) {
        $this->_canceled = $canceled;
    }

    function setCanceled_code($canceled_code) {
        $this->_canceled_code = $canceled_code;
    }

    function setBalance($id) {
        $balance = balance_details($id);
        //
        $this->_id = $balance["id"];
        $this->_client_id = $balance["client_id"];
        $this->_expense_id = $balance["expense_id"];
        $this->_invoice_id = $balance["invoice_id"];
        $this->_credit_note_id = $balance["credit_note_id"];
        $this->_type = $balance["type"];
        $this->_account_number = $balance["account_number"];
        $this->_sub_total = $balance["sub_total"];
        $this->_tax = $balance["tax"];
        $this->_total = $balance["total"];
        $this->_ref = $balance["ref"];
        $this->_description = $balance["description"];
        $this->_ce = $balance["ce"];
        $this->_date = $balance["date"];
        $this->_date_registre = $balance["date_registre"];
        $this->_code = $balance["code"];
        $this->_canceled = $balance["canceled"];
        $this->_canceled_code = $balance["canceled_code"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return balance_field_id($field, $id);
    }

    function field_code($field, $code) {
        return balance_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return balance_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return balance_list($start, $limit);
    }

    function details($id) {
        return balance_details($id);
    }

    function delete($id) {
        return balance_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return balance_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return balance_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return balance_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return balance_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return balance_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return balance_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return balance_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return balance_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return balance_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "client_id":
                return contacts_field_id("id", $value);
                break;
            case "invoice_id":
                return invoices_field_id("id", $value);
                break;
            case "credit_note_id":
                return credit_notes_field_id("id", $value);
                break;
            case "account_number":
                return banks_field_id("account_number", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return balance_is_id($id);
    }

    function is_client_id($client_id) {
        return balance_is_client_id($client_id);
    }

    function is_expense_id($expense_id) {
        return balance_is_expense_id($expense_id);
    }

    function is_invoice_id($invoice_id) {
        return balance_is_invoice_id($invoice_id);
    }

    function is_credit_note_id($credit_note_id) {
        return balance_is_credit_note_id($credit_note_id);
    }

    function is_type($type) {
        return balance_is_type($type);
    }

    function is_account_number($account_number) {
        return balance_is_account_number($account_number);
    }

    function is_sub_total($sub_total) {
        return balance_is_sub_total($sub_total);
    }

    function is_tax($tax) {
        return balance_is_tax($tax);
    }

    function is_total($total) {
        return balance_is_total($total);
    }

    function is_ref($ref) {
        return balance_is_ref($ref);
    }

    function is_description($description) {
        return balance_is_description($description);
    }

    function is_ce($ce) {
        return balance_is_ce($ce);
    }

    function is_date($date) {
        return balance_is_date($date);
    }

    function is_date_registre($date_registre) {
        return balance_is_date_registre($date_registre);
    }

    function is_code($code) {
        return balance_is_code($code);
    }

    function is_canceled($canceled) {
        return balance_is_canceled($canceled);
    }

    function is_canceled_code($canceled_code) {
        return balance_is_canceled_code($canceled_code);
    }
}
