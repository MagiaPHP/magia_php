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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
#################################################################################
 
        



/**
 * Clase banks_transactions
 * 
 * Description
 * 
 * @package banks_transactions
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Banks_transactions {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * client_id
    */ 
    public $_client_id;
    /** 
    * document
    */ 
    public $_document;
    /** 
    * document_id
    */ 
    public $_document_id;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * account_number
    */ 
    public $_account_number;
    /** 
    * total
    */ 
    public $_total;
    /** 
    * operation_number
    */ 
    public $_operation_number;
    /** 
    * date
    */ 
    public $_date;
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
    * details
    */ 
    public $_details;
    /** 
    * message
    */ 
    public $_message;
    /** 
    * currency
    */ 
    public $_currency;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * registre_date
    */ 
    public $_registre_date;
    /** 
    * created_date
    */ 
    public $_created_date;
    /** 
    * updated_date
    */ 
    public $_updated_date;
    /** 
    * canceled_code
    */ 
    public $_canceled_code;
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
    function getId () {
        return $this->_id; 
    }
    function getClient_id () {
        return $this->_client_id; 
    }
    function getDocument () {
        return $this->_document; 
    }
    function getDocument_id () {
        return $this->_document_id; 
    }
    function getType () {
        return $this->_type; 
    }
    function getAccount_number () {
        return $this->_account_number; 
    }
    function getTotal () {
        return $this->_total; 
    }
    function getOperation_number () {
        return $this->_operation_number; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getRef () {
        return $this->_ref; 
    }
    function getDescription () {
        return $this->_description; 
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
    function getCurrency () {
        return $this->_currency; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getRegistre_date () {
        return $this->_registre_date; 
    }
    function getCreated_date () {
        return $this->_created_date; 
    }
    function getUpdated_date () {
        return $this->_updated_date; 
    }
    function getCanceled_code () {
        return $this->_canceled_code; 
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
    function setClient_id ($client_id) {
        $this->_client_id = $client_id; 
    }
    function setDocument ($document) {
        $this->_document = $document; 
    }
    function setDocument_id ($document_id) {
        $this->_document_id = $document_id; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setAccount_number ($account_number) {
        $this->_account_number = $account_number; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setOperation_number ($operation_number) {
        $this->_operation_number = $operation_number; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setRef ($ref) {
        $this->_ref = $ref; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
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
    function setCurrency ($currency) {
        $this->_currency = $currency; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setRegistre_date ($registre_date) {
        $this->_registre_date = $registre_date; 
    }
    function setCreated_date ($created_date) {
        $this->_created_date = $created_date; 
    }
    function setUpdated_date ($updated_date) {
        $this->_updated_date = $updated_date; 
    }
    function setCanceled_code ($canceled_code) {
        $this->_canceled_code = $canceled_code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBanks_transactions($id) {
        $banks_transactions = banks_transactions_details($id);
        //
        $this->_id = $banks_transactions["id"];
        $this->_client_id = $banks_transactions["client_id"];
        $this->_document = $banks_transactions["document"];
        $this->_document_id = $banks_transactions["document_id"];
        $this->_type = $banks_transactions["type"];
        $this->_account_number = $banks_transactions["account_number"];
        $this->_total = $banks_transactions["total"];
        $this->_operation_number = $banks_transactions["operation_number"];
        $this->_date = $banks_transactions["date"];
        $this->_ref = $banks_transactions["ref"];
        $this->_description = $banks_transactions["description"];
        $this->_ce = $banks_transactions["ce"];
        $this->_details = $banks_transactions["details"];
        $this->_message = $banks_transactions["message"];
        $this->_currency = $banks_transactions["currency"];
        $this->_code = $banks_transactions["code"];
        $this->_registre_date = $banks_transactions["registre_date"];
        $this->_created_date = $banks_transactions["created_date"];
        $this->_updated_date = $banks_transactions["updated_date"];
        $this->_canceled_code = $banks_transactions["canceled_code"];
        $this->_order_by = $banks_transactions["order_by"];
        $this->_status = $banks_transactions["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_transactions_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_transactions_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_transactions_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_transactions_list($start, $limit);
    }

    function details($id) {
        return banks_transactions_details($id);
    }

    function delete($id) {
        return banks_transactions_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_transactions_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_transactions_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_transactions_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_transactions_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_transactions_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_transactions_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_transactions_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_transactions_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_transactions_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "client_id":
                return contacts_field_id("id", $value);
                break;
                case "document":
                return controllers_field_id("controller", $value);
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
        return banks_transactions_is_id($id);
    }

    function is_client_id($client_id) {
        return banks_transactions_is_client_id($client_id);
    }

    function is_document($document) {
        return banks_transactions_is_document($document);
    }

    function is_document_id($document_id) {
        return banks_transactions_is_document_id($document_id);
    }

    function is_type($type) {
        return banks_transactions_is_type($type);
    }

    function is_account_number($account_number) {
        return banks_transactions_is_account_number($account_number);
    }

    function is_total($total) {
        return banks_transactions_is_total($total);
    }

    function is_operation_number($operation_number) {
        return banks_transactions_is_operation_number($operation_number);
    }

    function is_date($date) {
        return banks_transactions_is_date($date);
    }

    function is_ref($ref) {
        return banks_transactions_is_ref($ref);
    }

    function is_description($description) {
        return banks_transactions_is_description($description);
    }

    function is_ce($ce) {
        return banks_transactions_is_ce($ce);
    }

    function is_details($details) {
        return banks_transactions_is_details($details);
    }

    function is_message($message) {
        return banks_transactions_is_message($message);
    }

    function is_currency($currency) {
        return banks_transactions_is_currency($currency);
    }

    function is_code($code) {
        return banks_transactions_is_code($code);
    }

    function is_registre_date($registre_date) {
        return banks_transactions_is_registre_date($registre_date);
    }

    function is_created_date($created_date) {
        return banks_transactions_is_created_date($created_date);
    }

    function is_updated_date($updated_date) {
        return banks_transactions_is_updated_date($updated_date);
    }

    function is_canceled_code($canceled_code) {
        return banks_transactions_is_canceled_code($canceled_code);
    }

    function is_order_by($order_by) {
        return banks_transactions_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_transactions_is_status($status);
    }


}
