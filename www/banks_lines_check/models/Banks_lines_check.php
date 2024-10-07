<?php

// banks_lines_check
// Date: 2024-05-22    
################################################################################

class Banks_lines_check {

    /**
     * id
     */
    public $_id;

    /**
     * my_account
     */
    public $_my_account;

    /**
     * operation
     */
    public $_operation;

    /**
     * date_operation
     */
    public $_date_operation;

    /**
     * description
     */
    public $_description;

    /**
     * type
     */
    public $_type;

    /**
     * total
     */
    public $_total;

    /**
     * currency
     */
    public $_currency;

    /**
     * date_value
     */
    public $_date_value;

    /**
     * account_sender
     */
    public $_account_sender;

    /**
     * sender
     */
    public $_sender;

    /**
     * comunication
     */
    public $_comunication;

    /**
     * ce
     */
    public $_ce;

    /**
     * details
     */
    public $_details;

    /**
     * message
     */
    public $_message;

    /**
     * id_office
     */
    public $_id_office;

    /**
     * office_name
     */
    public $_office_name;

    /**
     * value_bankCheck_transaction
     */
    public $_value_bankCheck_transaction;

    /**
     * countable_balance
     */
    public $_countable_balance;

    /**
     * suffix_account
     */
    public $_suffix_account;

    /**
     * sequential
     */
    public $_sequential;

    /**
     * available_balance
     */
    public $_available_balance;

    /**
     * debit
     */
    public $_debit;

    /**
     * credit
     */
    public $_credit;

    /**
     * ref
     */
    public $_ref;

    /**
     * ref2
     */
    public $_ref2;

    /**
     * ref3
     */
    public $_ref3;

    /**
     * ref4
     */
    public $_ref4;

    /**
     * ref5
     */
    public $_ref5;

    /**
     * ref6
     */
    public $_ref6;

    /**
     * ref7
     */
    public $_ref7;

    /**
     * ref8
     */
    public $_ref8;

    /**
     * ref9
     */
    public $_ref9;

    /**
     * ref10
     */
    public $_ref10;

    /**
     * date_registre
     */
    public $_date_registre;

    /**
     * code
     */
    public $_code;

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

    function getMy_account() {
        return $this->_my_account;
    }

    function getOperation() {
        return $this->_operation;
    }

    function getDate_operation() {
        return $this->_date_operation;
    }

    function getDescription() {
        return $this->_description;
    }

    function getType() {
        return $this->_type;
    }

    function getTotal() {
        return $this->_total;
    }

    function getCurrency() {
        return $this->_currency;
    }

    function getDate_value() {
        return $this->_date_value;
    }

    function getAccount_sender() {
        return $this->_account_sender;
    }

    function getSender() {
        return $this->_sender;
    }

    function getComunication() {
        return $this->_comunication;
    }

    function getCe() {
        return $this->_ce;
    }

    function getDetails() {
        return $this->_details;
    }

    function getMessage() {
        return $this->_message;
    }

    function getId_office() {
        return $this->_id_office;
    }

    function getOffice_name() {
        return $this->_office_name;
    }

    function getValue_bankCheck_transaction() {
        return $this->_value_bankCheck_transaction;
    }

    function getCountable_balance() {
        return $this->_countable_balance;
    }

    function getSuffix_account() {
        return $this->_suffix_account;
    }

    function getSequential() {
        return $this->_sequential;
    }

    function getAvailable_balance() {
        return $this->_available_balance;
    }

    function getDebit() {
        return $this->_debit;
    }

    function getCredit() {
        return $this->_credit;
    }

    function getRef() {
        return $this->_ref;
    }

    function getRef2() {
        return $this->_ref2;
    }

    function getRef3() {
        return $this->_ref3;
    }

    function getRef4() {
        return $this->_ref4;
    }

    function getRef5() {
        return $this->_ref5;
    }

    function getRef6() {
        return $this->_ref6;
    }

    function getRef7() {
        return $this->_ref7;
    }

    function getRef8() {
        return $this->_ref8;
    }

    function getRef9() {
        return $this->_ref9;
    }

    function getRef10() {
        return $this->_ref10;
    }

    function getDate_registre() {
        return $this->_date_registre;
    }

    function getCode() {
        return $this->_code;
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

    function setMy_account($my_account) {
        $this->_my_account = $my_account;
    }

    function setOperation($operation) {
        $this->_operation = $operation;
    }

    function setDate_operation($date_operation) {
        $this->_date_operation = $date_operation;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setTotal($total) {
        $this->_total = $total;
    }

    function setCurrency($currency) {
        $this->_currency = $currency;
    }

    function setDate_value($date_value) {
        $this->_date_value = $date_value;
    }

    function setAccount_sender($account_sender) {
        $this->_account_sender = $account_sender;
    }

    function setSender($sender) {
        $this->_sender = $sender;
    }

    function setComunication($comunication) {
        $this->_comunication = $comunication;
    }

    function setCe($ce) {
        $this->_ce = $ce;
    }

    function setDetails($details) {
        $this->_details = $details;
    }

    function setMessage($message) {
        $this->_message = $message;
    }

    function setId_office($id_office) {
        $this->_id_office = $id_office;
    }

    function setOffice_name($office_name) {
        $this->_office_name = $office_name;
    }

    function setValue_bankCheck_transaction($value_bankCheck_transaction) {
        $this->_value_bankCheck_transaction = $value_bankCheck_transaction;
    }

    function setCountable_balance($countable_balance) {
        $this->_countable_balance = $countable_balance;
    }

    function setSuffix_account($suffix_account) {
        $this->_suffix_account = $suffix_account;
    }

    function setSequential($sequential) {
        $this->_sequential = $sequential;
    }

    function setAvailable_balance($available_balance) {
        $this->_available_balance = $available_balance;
    }

    function setDebit($debit) {
        $this->_debit = $debit;
    }

    function setCredit($credit) {
        $this->_credit = $credit;
    }

    function setRef($ref) {
        $this->_ref = $ref;
    }

    function setRef2($ref2) {
        $this->_ref2 = $ref2;
    }

    function setRef3($ref3) {
        $this->_ref3 = $ref3;
    }

    function setRef4($ref4) {
        $this->_ref4 = $ref4;
    }

    function setRef5($ref5) {
        $this->_ref5 = $ref5;
    }

    function setRef6($ref6) {
        $this->_ref6 = $ref6;
    }

    function setRef7($ref7) {
        $this->_ref7 = $ref7;
    }

    function setRef8($ref8) {
        $this->_ref8 = $ref8;
    }

    function setRef9($ref9) {
        $this->_ref9 = $ref9;
    }

    function setRef10($ref10) {
        $this->_ref10 = $ref10;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setBanks_lines_check($id) {
        $banks_lines_check = banks_lines_check_details($id);
        //
        $this->_id = $banks_lines_check["id"];
        $this->_my_account = $banks_lines_check["my_account"];
        $this->_operation = $banks_lines_check["operation"];
        $this->_date_operation = $banks_lines_check["date_operation"];
        $this->_description = $banks_lines_check["description"];
        $this->_type = $banks_lines_check["type"];
        $this->_total = $banks_lines_check["total"];
        $this->_currency = $banks_lines_check["currency"];
        $this->_date_value = $banks_lines_check["date_value"];
        $this->_account_sender = $banks_lines_check["account_sender"];
        $this->_sender = $banks_lines_check["sender"];
        $this->_comunication = $banks_lines_check["comunication"];
        $this->_ce = $banks_lines_check["ce"];
        $this->_details = $banks_lines_check["details"];
        $this->_message = $banks_lines_check["message"];
        $this->_id_office = $banks_lines_check["id_office"];
        $this->_office_name = $banks_lines_check["office_name"];
        $this->_value_bankCheck_transaction = $banks_lines_check["value_bankCheck_transaction"];
        $this->_countable_balance = $banks_lines_check["countable_balance"];
        $this->_suffix_account = $banks_lines_check["suffix_account"];
        $this->_sequential = $banks_lines_check["sequential"];
        $this->_available_balance = $banks_lines_check["available_balance"];
        $this->_debit = $banks_lines_check["debit"];
        $this->_credit = $banks_lines_check["credit"];
        $this->_ref = $banks_lines_check["ref"];
        $this->_ref2 = $banks_lines_check["ref2"];
        $this->_ref3 = $banks_lines_check["ref3"];
        $this->_ref4 = $banks_lines_check["ref4"];
        $this->_ref5 = $banks_lines_check["ref5"];
        $this->_ref6 = $banks_lines_check["ref6"];
        $this->_ref7 = $banks_lines_check["ref7"];
        $this->_ref8 = $banks_lines_check["ref8"];
        $this->_ref9 = $banks_lines_check["ref9"];
        $this->_ref10 = $banks_lines_check["ref10"];
        $this->_date_registre = $banks_lines_check["date_registre"];
        $this->_code = $banks_lines_check["code"];
        $this->_order_by = $banks_lines_check["order_by"];
        $this->_status = $banks_lines_check["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_lines_check_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_lines_check_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_lines_check_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_lines_check_list($start, $limit);
    }

    function details($id) {
        return banks_lines_check_details($id);
    }

    function delete($id) {
        return banks_lines_check_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_check_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_check_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_lines_check_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_lines_check_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_lines_check_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_lines_check_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_lines_check_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_lines_check_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_lines_check_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return banks_lines_check_is_id($id);
    }

    function is_my_account($my_account) {
        return banks_lines_check_is_my_account($my_account);
    }

    function is_operation($operation) {
        return banks_lines_check_is_operation($operation);
    }

    function is_date_operation($date_operation) {
        return banks_lines_check_is_date_operation($date_operation);
    }

    function is_description($description) {
        return banks_lines_check_is_description($description);
    }

    function is_type($type) {
        return banks_lines_check_is_type($type);
    }

    function is_total($total) {
        return banks_lines_check_is_total($total);
    }

    function is_currency($currency) {
        return banks_lines_check_is_currency($currency);
    }

    function is_date_value($date_value) {
        return banks_lines_check_is_date_value($date_value);
    }

    function is_account_sender($account_sender) {
        return banks_lines_check_is_account_sender($account_sender);
    }

    function is_sender($sender) {
        return banks_lines_check_is_sender($sender);
    }

    function is_comunication($comunication) {
        return banks_lines_check_is_comunication($comunication);
    }

    function is_ce($ce) {
        return banks_lines_check_is_ce($ce);
    }

    function is_details($details) {
        return banks_lines_check_is_details($details);
    }

    function is_message($message) {
        return banks_lines_check_is_message($message);
    }

    function is_id_office($id_office) {
        return banks_lines_check_is_id_office($id_office);
    }

    function is_office_name($office_name) {
        return banks_lines_check_is_office_name($office_name);
    }

    function is_value_bankCheck_transaction($value_bankCheck_transaction) {
        return banks_lines_check_is_value_bankCheck_transaction($value_bankCheck_transaction);
    }

    function is_countable_balance($countable_balance) {
        return banks_lines_check_is_countable_balance($countable_balance);
    }

    function is_suffix_account($suffix_account) {
        return banks_lines_check_is_suffix_account($suffix_account);
    }

    function is_sequential($sequential) {
        return banks_lines_check_is_sequential($sequential);
    }

    function is_available_balance($available_balance) {
        return banks_lines_check_is_available_balance($available_balance);
    }

    function is_debit($debit) {
        return banks_lines_check_is_debit($debit);
    }

    function is_credit($credit) {
        return banks_lines_check_is_credit($credit);
    }

    function is_ref($ref) {
        return banks_lines_check_is_ref($ref);
    }

    function is_ref2($ref2) {
        return banks_lines_check_is_ref2($ref2);
    }

    function is_ref3($ref3) {
        return banks_lines_check_is_ref3($ref3);
    }

    function is_ref4($ref4) {
        return banks_lines_check_is_ref4($ref4);
    }

    function is_ref5($ref5) {
        return banks_lines_check_is_ref5($ref5);
    }

    function is_ref6($ref6) {
        return banks_lines_check_is_ref6($ref6);
    }

    function is_ref7($ref7) {
        return banks_lines_check_is_ref7($ref7);
    }

    function is_ref8($ref8) {
        return banks_lines_check_is_ref8($ref8);
    }

    function is_ref9($ref9) {
        return banks_lines_check_is_ref9($ref9);
    }

    function is_ref10($ref10) {
        return banks_lines_check_is_ref10($ref10);
    }

    function is_date_registre($date_registre) {
        return banks_lines_check_is_date_registre($date_registre);
    }

    function is_code($code) {
        return banks_lines_check_is_code($code);
    }

    function is_order_by($order_by) {
        return banks_lines_check_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_lines_check_is_status($status);
    }
}
