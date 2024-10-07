<?php

// banks
// Date: 2024-05-27    
################################################################################

class Banks {

    /**
     * id
     */
    public $_id;

    /**
     * contact_id
     */
    public $_contact_id;

    /**
     * bank
     */
    public $_bank;

    /**
     * account_number
     */
    public $_account_number;

    /**
     * bic
     */
    public $_bic;

    /**
     * iban
     */
    public $_iban;

    /**
     * code
     */
    public $_code;

    /**
     * codification
     */
    public $_codification;

    /**
     * delimiter
     */
    public $_delimiter;

    /**
     * date_format
     */
    public $_date_format;

    /**
     * thousands_separator
     */
    public $_thousands_separator;

    /**
     * decimal_separator
     */
    public $_decimal_separator;

    /**
     * invoices
     */
    public $_invoices;

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

    function getContact_id() {
        return $this->_contact_id;
    }

    function getBank() {
        return $this->_bank;
    }

    function getAccount_number() {
        return $this->_account_number;
    }

    function getBic() {
        return $this->_bic;
    }

    function getIban() {
        return $this->_iban;
    }

    function getCode() {
        return $this->_code;
    }

    function getCodification() {
        return $this->_codification;
    }

    function getDelimiter() {
        return $this->_delimiter;
    }

    function getDate_format() {
        return $this->_date_format;
    }

    function getThousands_separator() {
        return $this->_thousands_separator;
    }

    function getDecimal_separator() {
        return $this->_decimal_separator;
    }

    function getInvoices() {
        return $this->_invoices;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

    function getHtmlFormatted() {
        $html = '';

        // Añadir el icono y el texto formateado

        $html .= '<div class="panel panel-default">';
        $html .= '  <div class="panel-heading"><b><span class="glyphicon glyphicon-home"></span> ' . _tr("Bank name") . ': ' . $this->_bank . '</b></div>';
        $html .= '  <div class="panel-body">';

        $html .= '<b>' . _tr("Bank name") . ':</b> ' . $this->_bank . '<br>';
        $html .= '<b>' . _tr("Account number") . ':</b> ' . $this->_account_number . '<br>';
        $html .= '<b></span> ' . _tr("BIC Number") . ':</b> ' . $this->_bic . '<br>';
        $html .= '<b></span> ' . _tr("IBAN number") . ':</b> ' . $this->_iban . '<br>';

        $html .= '  </div>';
        $html .= '</div>';

        return $html;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setBank($bank) {
        $this->_bank = $bank;
    }

    function setAccount_number($account_number) {
        $this->_account_number = $account_number;
    }

    function setBic($bic) {
        $this->_bic = $bic;
    }

    function setIban($iban) {
        $this->_iban = $iban;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setCodification($codification) {
        $this->_codification = $codification;
    }

    function setDelimiter($delimiter) {
        $this->_delimiter = $delimiter;
    }

    function setDate_format($date_format) {
        $this->_date_format = $date_format;
    }

    function setThousands_separator($thousands_separator) {
        $this->_thousands_separator = $thousands_separator;
    }

    function setDecimal_separator($decimal_separator) {
        $this->_decimal_separator = $decimal_separator;
    }

    function setInvoices($invoices) {
        $this->_invoices = $invoices;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setBanks($id) {
        $banks = banks_details($id);
        //
        $this->_id = $banks["id"];
        $this->_contact_id = $banks["contact_id"];
        $this->_bank = $banks["bank"];
        $this->_account_number = $banks["account_number"];
        $this->_bic = $banks["bic"];
        $this->_iban = $banks["iban"];
        $this->_code = $banks["code"];
        $this->_codification = $banks["codification"];
        $this->_delimiter = $banks["delimiter"];
        $this->_date_format = $banks["date_format"];
        $this->_thousands_separator = $banks["thousands_separator"];
        $this->_decimal_separator = $banks["decimal_separator"];
        $this->_invoices = $banks["invoices"];
        $this->_order_by = $banks["order_by"];
        $this->_status = $banks["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_list($start, $limit);
    }

    function details($id) {
        return banks_details($id);
    }

    function delete($id) {
        return banks_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "contact_id":
                return contacts_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return banks_is_id($id);
    }

    function is_contact_id($contact_id) {
        return banks_is_contact_id($contact_id);
    }

    function is_bank($bank) {
        return banks_is_bank($bank);
    }

    function is_account_number($account_number) {
        return banks_is_account_number($account_number);
    }

    function is_bic($bic) {
        return banks_is_bic($bic);
    }

    function is_iban($iban) {
        return banks_is_iban($iban);
    }

    function is_code($code) {
        return banks_is_code($code);
    }

    function is_codification($codification) {
        return banks_is_codification($codification);
    }

    function is_delimiter($delimiter) {
        return banks_is_delimiter($delimiter);
    }

    function is_date_format($date_format) {
        return banks_is_date_format($date_format);
    }

    function is_thousands_separator($thousands_separator) {
        return banks_is_thousands_separator($thousands_separator);
    }

    function is_decimal_separator($decimal_separator) {
        return banks_is_decimal_separator($decimal_separator);
    }

    function is_invoices($invoices) {
        return banks_is_invoices($invoices);
    }

    function is_order_by($order_by) {
        return banks_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_is_status($status);
    }
}
