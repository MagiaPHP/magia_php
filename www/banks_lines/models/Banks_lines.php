<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 10:09:08 
#################################################################################
 
        



/**
 * Clase banks_lines
 * 
 * Description
 * 
 * @package banks_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Banks_lines {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * my_account
    */ 
    private $_my_account;
    /** 
    * operation
    */ 
    private $_operation;
    /** 
    * date_operation
    */ 
    private $_date_operation;
    /** 
    * description
    */ 
    private $_description;
    /** 
    * type
    */ 
    private $_type;
    /** 
    * total
    */ 
    private $_total;
    /** 
    * currency
    */ 
    private $_currency;
    /** 
    * date_value
    */ 
    private $_date_value;
    /** 
    * account_sender
    */ 
    private $_account_sender;
    /** 
    * sender
    */ 
    private $_sender;
    /** 
    * comunication
    */ 
    private $_comunication;
    /** 
    * ce
    */ 
    private $_ce;
    /** 
    * details
    */ 
    private $_details;
    /** 
    * message
    */ 
    private $_message;
    /** 
    * id_office
    */ 
    private $_id_office;
    /** 
    * office_name
    */ 
    private $_office_name;
    /** 
    * value_bankCheck_transaction
    */ 
    private $_value_bankCheck_transaction;
    /** 
    * countable_balance
    */ 
    private $_countable_balance;
    /** 
    * suffix_account
    */ 
    private $_suffix_account;
    /** 
    * sequential
    */ 
    private $_sequential;
    /** 
    * available_balance
    */ 
    private $_available_balance;
    /** 
    * debit
    */ 
    private $_debit;
    /** 
    * credit
    */ 
    private $_credit;
    /** 
    * ref
    */ 
    private $_ref;
    /** 
    * ref2
    */ 
    private $_ref2;
    /** 
    * ref3
    */ 
    private $_ref3;
    /** 
    * ref4
    */ 
    private $_ref4;
    /** 
    * ref5
    */ 
    private $_ref5;
    /** 
    * ref6
    */ 
    private $_ref6;
    /** 
    * ref7
    */ 
    private $_ref7;
    /** 
    * ref8
    */ 
    private $_ref8;
    /** 
    * ref9
    */ 
    private $_ref9;
    /** 
    * ref10
    */ 
    private $_ref10;
    /** 
    * date_registre
    */ 
    private $_date_registre;
    /** 
    * code
    */ 
    private $_code;
    /** 
    * order_by
    */ 
    private $_order_by;
    /** 
    * status
    */ 
    private $_status;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getMy_account () {
        return $this->_my_account; 
    }
    function getOperation () {
        return $this->_operation; 
    }
    function getDate_operation () {
        return $this->_date_operation; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getType () {
        return $this->_type; 
    }
    function getTotal () {
        return $this->_total; 
    }
    function getCurrency () {
        return $this->_currency; 
    }
    function getDate_value () {
        return $this->_date_value; 
    }
    function getAccount_sender () {
        return $this->_account_sender; 
    }
    function getSender () {
        return $this->_sender; 
    }
    function getComunication () {
        return $this->_comunication; 
    }
    function getCe () {
        return $this->_ce; 
    }
    function getDetails () {
        return $this->_details; 
    }
    function getMessage () {
        return $this->_message; 
    }
    function getId_office () {
        return $this->_id_office; 
    }
    function getOffice_name () {
        return $this->_office_name; 
    }
    function getValue_bankCheck_transaction () {
        return $this->_value_bankCheck_transaction; 
    }
    function getCountable_balance () {
        return $this->_countable_balance; 
    }
    function getSuffix_account () {
        return $this->_suffix_account; 
    }
    function getSequential () {
        return $this->_sequential; 
    }
    function getAvailable_balance () {
        return $this->_available_balance; 
    }
    function getDebit () {
        return $this->_debit; 
    }
    function getCredit () {
        return $this->_credit; 
    }
    function getRef () {
        return $this->_ref; 
    }
    function getRef2 () {
        return $this->_ref2; 
    }
    function getRef3 () {
        return $this->_ref3; 
    }
    function getRef4 () {
        return $this->_ref4; 
    }
    function getRef5 () {
        return $this->_ref5; 
    }
    function getRef6 () {
        return $this->_ref6; 
    }
    function getRef7 () {
        return $this->_ref7; 
    }
    function getRef8 () {
        return $this->_ref8; 
    }
    function getRef9 () {
        return $this->_ref9; 
    }
    function getRef10 () {
        return $this->_ref10; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setMy_account ($my_account) {
        $this->_my_account = $my_account; 
    }
    function setOperation ($operation) {
        $this->_operation = $operation; 
    }
    function setDate_operation ($date_operation) {
        $this->_date_operation = $date_operation; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setCurrency ($currency) {
        $this->_currency = $currency; 
    }
    function setDate_value ($date_value) {
        $this->_date_value = $date_value; 
    }
    function setAccount_sender ($account_sender) {
        $this->_account_sender = $account_sender; 
    }
    function setSender ($sender) {
        $this->_sender = $sender; 
    }
    function setComunication ($comunication) {
        $this->_comunication = $comunication; 
    }
    function setCe ($ce) {
        $this->_ce = $ce; 
    }
    function setDetails ($details) {
        $this->_details = $details; 
    }
    function setMessage ($message) {
        $this->_message = $message; 
    }
    function setId_office ($id_office) {
        $this->_id_office = $id_office; 
    }
    function setOffice_name ($office_name) {
        $this->_office_name = $office_name; 
    }
    function setValue_bankCheck_transaction ($value_bankCheck_transaction) {
        $this->_value_bankCheck_transaction = $value_bankCheck_transaction; 
    }
    function setCountable_balance ($countable_balance) {
        $this->_countable_balance = $countable_balance; 
    }
    function setSuffix_account ($suffix_account) {
        $this->_suffix_account = $suffix_account; 
    }
    function setSequential ($sequential) {
        $this->_sequential = $sequential; 
    }
    function setAvailable_balance ($available_balance) {
        $this->_available_balance = $available_balance; 
    }
    function setDebit ($debit) {
        $this->_debit = $debit; 
    }
    function setCredit ($credit) {
        $this->_credit = $credit; 
    }
    function setRef ($ref) {
        $this->_ref = $ref; 
    }
    function setRef2 ($ref2) {
        $this->_ref2 = $ref2; 
    }
    function setRef3 ($ref3) {
        $this->_ref3 = $ref3; 
    }
    function setRef4 ($ref4) {
        $this->_ref4 = $ref4; 
    }
    function setRef5 ($ref5) {
        $this->_ref5 = $ref5; 
    }
    function setRef6 ($ref6) {
        $this->_ref6 = $ref6; 
    }
    function setRef7 ($ref7) {
        $this->_ref7 = $ref7; 
    }
    function setRef8 ($ref8) {
        $this->_ref8 = $ref8; 
    }
    function setRef9 ($ref9) {
        $this->_ref9 = $ref9; 
    }
    function setRef10 ($ref10) {
        $this->_ref10 = $ref10; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBanks_lines($id) {
        $banks_lines = banks_lines_details($id);
        //
        $this->_id = $banks_lines["id"];
        $this->_my_account = $banks_lines["my_account"];
        $this->_operation = $banks_lines["operation"];
        $this->_date_operation = $banks_lines["date_operation"];
        $this->_description = $banks_lines["description"];
        $this->_type = $banks_lines["type"];
        $this->_total = $banks_lines["total"];
        $this->_currency = $banks_lines["currency"];
        $this->_date_value = $banks_lines["date_value"];
        $this->_account_sender = $banks_lines["account_sender"];
        $this->_sender = $banks_lines["sender"];
        $this->_comunication = $banks_lines["comunication"];
        $this->_ce = $banks_lines["ce"];
        $this->_details = $banks_lines["details"];
        $this->_message = $banks_lines["message"];
        $this->_id_office = $banks_lines["id_office"];
        $this->_office_name = $banks_lines["office_name"];
        $this->_value_bankCheck_transaction = $banks_lines["value_bankCheck_transaction"];
        $this->_countable_balance = $banks_lines["countable_balance"];
        $this->_suffix_account = $banks_lines["suffix_account"];
        $this->_sequential = $banks_lines["sequential"];
        $this->_available_balance = $banks_lines["available_balance"];
        $this->_debit = $banks_lines["debit"];
        $this->_credit = $banks_lines["credit"];
        $this->_ref = $banks_lines["ref"];
        $this->_ref2 = $banks_lines["ref2"];
        $this->_ref3 = $banks_lines["ref3"];
        $this->_ref4 = $banks_lines["ref4"];
        $this->_ref5 = $banks_lines["ref5"];
        $this->_ref6 = $banks_lines["ref6"];
        $this->_ref7 = $banks_lines["ref7"];
        $this->_ref8 = $banks_lines["ref8"];
        $this->_ref9 = $banks_lines["ref9"];
        $this->_ref10 = $banks_lines["ref10"];
        $this->_date_registre = $banks_lines["date_registre"];
        $this->_code = $banks_lines["code"];
        $this->_order_by = $banks_lines["order_by"];
        $this->_status = $banks_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_lines_list($start, $limit);
    }

    function details($id) {
        return banks_lines_details($id);
    }

    function delete($id) {
        return banks_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "status":
                return banks_lines_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return banks_lines_is_id($id);
    }

    function is_my_account($my_account) {
        return banks_lines_is_my_account($my_account);
    }

    function is_operation($operation) {
        return banks_lines_is_operation($operation);
    }

    function is_date_operation($date_operation) {
        return banks_lines_is_date_operation($date_operation);
    }

    function is_description($description) {
        return banks_lines_is_description($description);
    }

    function is_type($type) {
        return banks_lines_is_type($type);
    }

    function is_total($total) {
        return banks_lines_is_total($total);
    }

    function is_currency($currency) {
        return banks_lines_is_currency($currency);
    }

    function is_date_value($date_value) {
        return banks_lines_is_date_value($date_value);
    }

    function is_account_sender($account_sender) {
        return banks_lines_is_account_sender($account_sender);
    }

    function is_sender($sender) {
        return banks_lines_is_sender($sender);
    }

    function is_comunication($comunication) {
        return banks_lines_is_comunication($comunication);
    }

    function is_ce($ce) {
        return banks_lines_is_ce($ce);
    }

    function is_details($details) {
        return banks_lines_is_details($details);
    }

    function is_message($message) {
        return banks_lines_is_message($message);
    }

    function is_id_office($id_office) {
        return banks_lines_is_id_office($id_office);
    }

    function is_office_name($office_name) {
        return banks_lines_is_office_name($office_name);
    }

    function is_value_bankCheck_transaction($value_bankCheck_transaction) {
        return banks_lines_is_value_bankCheck_transaction($value_bankCheck_transaction);
    }

    function is_countable_balance($countable_balance) {
        return banks_lines_is_countable_balance($countable_balance);
    }

    function is_suffix_account($suffix_account) {
        return banks_lines_is_suffix_account($suffix_account);
    }

    function is_sequential($sequential) {
        return banks_lines_is_sequential($sequential);
    }

    function is_available_balance($available_balance) {
        return banks_lines_is_available_balance($available_balance);
    }

    function is_debit($debit) {
        return banks_lines_is_debit($debit);
    }

    function is_credit($credit) {
        return banks_lines_is_credit($credit);
    }

    function is_ref($ref) {
        return banks_lines_is_ref($ref);
    }

    function is_ref2($ref2) {
        return banks_lines_is_ref2($ref2);
    }

    function is_ref3($ref3) {
        return banks_lines_is_ref3($ref3);
    }

    function is_ref4($ref4) {
        return banks_lines_is_ref4($ref4);
    }

    function is_ref5($ref5) {
        return banks_lines_is_ref5($ref5);
    }

    function is_ref6($ref6) {
        return banks_lines_is_ref6($ref6);
    }

    function is_ref7($ref7) {
        return banks_lines_is_ref7($ref7);
    }

    function is_ref8($ref8) {
        return banks_lines_is_ref8($ref8);
    }

    function is_ref9($ref9) {
        return banks_lines_is_ref9($ref9);
    }

    function is_ref10($ref10) {
        return banks_lines_is_ref10($ref10);
    }

    function is_date_registre($date_registre) {
        return banks_lines_is_date_registre($date_registre);
    }

    function is_code($code) {
        return banks_lines_is_code($code);
    }

    function is_order_by($order_by) {
        return banks_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_lines_is_status($status);
    }


}
