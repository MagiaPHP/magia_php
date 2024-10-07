<?php

// budgets
// Date: 2023-07-21    
################################################################################

class Budgets {

    /**
     * id
     */
    public $_id;
    public $_sender;
    public $_invoice_id;
    public $_credit_note_id;
    public $_client_id;
    public $_title;
    public $_client;
    public $_seller_id;
    public $_addresses_billing;
    public $_addresses_delivery;
    public $_date;
    public $_date_registre;
    public $_total;
    public $_tax;
    public $_advance;
    public $_balance;
    public $_comments;
    public $_comments_private;
    public $_r1;
    public $_r2;
    public $_r3;
    public $_fc;
    public $_date_update;
    public $_days;
    public $_ce;
    public $_code;
    public $_status;
    public $_lines = array();

    function __construct() {
        //
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getSender() {
        return $this->_sender;
    }

    function getInvoice_id() {
        return $this->_invoice_id;
    }

    function getCredit_note_id() {
        return $this->_credit_note_id;
    }

    function getClient_id() {
        return $this->_client_id;
    }

    function getTitle() {
        return $this->_title;
    }

    function getClient() {
        return $this->_client;
    }

    function getSeller_id() {
        return $this->_seller_id;
    }

    function getAddresses_billing() {

        return $this->_addresses_billing;
    }

    function getAddresses_billing_formated_html() {

        return addresses_formated_html($this->_addresses_billing);
    }

    function getAddresses_delivery() {
        return $this->_addresses_delivery;
    }

    function getAddresses_delivery_formated_html() {
        return addresses_formated_html($this->_addresses_delivery);
    }

    function getDate() {
        return $this->_date;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getTotal() {
        return $this->_total;
    }

    function getTotal_to_pay() {
        return ($this->_total + $this->_tax) - $this->_advance;
    }

    function getTax() {
        return $this->_tax;
    }

    function getTotal_plus_tax() {
        return $this->getTotal() + $this->getTax();
    }

    function getAdvance() {
        return $this->_advance;
    }

    function getBalance() {
        return $this->_balance;
    }

    function getComments() {
        return $this->_comments;
    }

    function getComments_private() {
        return $this->_comments_private;
    }

    function getR1() {
        return $this->_r1;
    }

    function getR2() {
        return $this->_r2;
    }

    function getR3() {
        return $this->_r3;
    }

    function getFc() {
        return $this->_fc;
    }

    function getDate_update() {
        return $this->_date_update;
    }

    function getDays() {
        return $this->_days;
    }

    function getCe() {
        return $this->_ce;
    }

    function getCode() {
        return $this->_code;
    }

    function getStatus() {
        return $this->_status;
    }

    function getLines() {
        return $this->_lines;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setCredit_note_id($credit_note_id) {
        $this->_credit_note_id = $credit_note_id;
    }

    function setClient_id($client_id) {
        $this->_client_id = $client_id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setSeller_id($seller_id) {
        $this->_seller_id = $seller_id;
    }

    function setAddresses_billing($addresses_billing) {
        $this->_addresses_billing = $addresses_billing;
    }

    function setAddresses_delivery($addresses_delivery) {
        $this->_addresses_delivery = $addresses_delivery;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setAdvance($advance) {
        $this->_advance = $advance;
    }

    function setBalance($balance) {
        $this->_balance = $balance;
    }

    function setComments($comments) {
        $this->_comments = $comments;
    }

    function setComments_private($comments_private) {
        $this->_comments_private = $comments_private;
    }

    function setR1($r1) {
        $this->_r1 = $r1;
    }

    function setR2($r2) {
        $this->_r2 = $r2;
    }

    function setR3($r3) {
        $this->_r3 = $r3;
    }

    function setFc($fc) {
        $this->_fc = $fc;
    }

    function setDate_update($date_update) {
        $this->_date_update = $date_update;
    }

    function setDays($days) {
        $this->_days = $days;
    }

    function setCe($ce) {
        $this->_ce = $ce;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setLines() {
        $lines = budget_lines_list_by_budget_id_without_transport($this->_id);

        foreach ($lines as $key => $line) {

            $bl = new Budget_lines_ex();

            $bl->setBudget_lines($line['budget_id']);

            array_push($this->_lines, $bl);
        }
    }

    function setBudgets($id) {

        $budgets = budgets_details($id);
        //
        $this->_id = $budgets["id"];

//        $this->_sender = new Company();
//        $this->_sender->setCompany(1022);
        $this->_invoice_id = $budgets["invoice_id"];
        $this->_credit_note_id = $budgets["credit_note_id"];
        $this->_client_id = $budgets["client_id"];
        $this->_title = $budgets["title"];
//        $this->_client = new Company();
//        $this->_client->setCompany($budgets["client_id"]);
        $this->_seller_id = $budgets["seller_id"];
        $this->_addresses_billing = $budgets["addresses_billing"];
        $this->_addresses_delivery = $budgets["addresses_delivery"];
        $this->_date = $budgets["date"];
        $this->_date_registre = $budgets["date_registre"];
        $this->_total = $budgets["total"];
        $this->_tax = $budgets["tax"];
        $this->_advance = $budgets["advance"];
        $this->_balance = $budgets["balance"];
        $this->_comments = $budgets["comments"];
        $this->_comments_private = $budgets["comments_private"];
        $this->_r1 = $budgets["r1"];
        $this->_r2 = $budgets["r2"];
        $this->_r3 = $budgets["r3"];
        $this->_fc = $budgets["fc"];
        $this->_date_update = $budgets["date_update"];
        $this->_days = $budgets["days"];
        $this->_ce = $budgets["ce"];
        $this->_code = $budgets["code"];
        $this->_status = $budgets["status"];
        // actualiza el total y la tva
        $this->update_total_tax();
    }

################################################################################

    function setSender($sender_id) {
        if ($sender_id) {
            $this->_sender = new Company();
            $this->_sender->setCompany($sender_id);
        }
    }

    function setClient($client_id) {
        if ($client_id) {
            $this->_client = new Company();
            $this->_client->setCompany($client_id);
        }
    }

    function update_total_tax() {

        budgets_update_total_tax($this->getId(), budget_lines_totalHTVA($this->getId()), budget_lines_totalTVA($this->getId()));
    }

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return budgets_field_id($field, $id);
    }

    function field_code($field, $code) {
        return budgets_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return budgets_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return budgets_list($start, $limit);
    }

    function details($id) {
        return budgets_details($id);
    }

    function delete($id) {
        return budgets_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return budgets_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return budgets_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return budgets_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return budgets_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return budgets_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return budgets_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return budgets_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return budgets_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return budgets_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "invoice_id":
                return invoices_field_id("id", $value);
                break;
            case "client_id":
                return contacts_field_id("id", $value);
                break;
            case "seller_id":
                return contacts_field_id("id", $value);
                break;
            case "status":
                return budget_status_field_id("code", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return budgets_is_id($id);
    }

    function is_invoice_id($invoice_id) {
        return budgets_is_invoice_id($invoice_id);
    }

    function is_credit_note_id($credit_note_id) {
        return budgets_is_credit_note_id($credit_note_id);
    }

    function is_client_id($client_id) {
        return budgets_is_client_id($client_id);
    }

    function is_seller_id($seller_id) {
        return budgets_is_seller_id($seller_id);
    }

    function is_addresses_billing($addresses_billing) {
        return budgets_is_addresses_billing($addresses_billing);
    }

    function is_addresses_delivery($addresses_delivery) {
        return budgets_is_addresses_delivery($addresses_delivery);
    }

    function is_date($date) {
        return budgets_is_date($date);
    }

    function is_date_registre($date_registre) {
        return budgets_is_date_registre($date_registre);
    }

    function is_total($total) {
        return budgets_is_total($total);
    }

    function is_tax($tax) {
        return budgets_is_tax($tax);
    }

    function is_advance($advance) {
        return budgets_is_advance($advance);
    }

    function is_balance($balance) {
        return budgets_is_balance($balance);
    }

    function is_comments($comments) {
        return budgets_is_comments($comments);
    }

    function is_comments_private($comments_private) {
        return budgets_is_comments_private($comments_private);
    }

    function is_r1($r1) {
        return budgets_is_r1($r1);
    }

    function is_r2($r2) {
        return budgets_is_r2($r2);
    }

    function is_r3($r3) {
        return budgets_is_r3($r3);
    }

    function is_fc($fc) {
        return budgets_is_fc($fc);
    }

    function is_date_update($date_update) {
        return budgets_is_date_update($date_update);
    }

    function is_days($days) {
        return budgets_is_days($days);
    }

    function is_ce($ce) {
        return budgets_is_ce($ce);
    }

    function is_code($code) {
        return budgets_is_code($code);
    }

    function is_status($status) {
        return budgets_is_status($status);
    }
}
