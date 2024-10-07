<?php
 // docs_exchange
 // Date: 2024-07-31    
################################################################################

class Docs_exchange {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * reciver_tva
    */ 
    public $_reciver_tva;
    /** 
    * sender_name
    */ 
    public $_sender_name;
    /** 
    * label
    */ 
    public $_label;
    /** 
    * sender_tva
    */ 
    public $_sender_tva;
    /** 
    * doc_type
    */ 
    public $_doc_type;
    /** 
    * doc_id
    */ 
    public $_doc_id;
    /** 
    * json
    */ 
    public $_json;
    /** 
    * pdf_base64
    */ 
    public $_pdf_base64;
    /** 
    * date_send
    */ 
    public $_date_send;
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
    function getReciver_tva () {
        return $this->_reciver_tva; 
    }
    function getSender_name () {
        return $this->_sender_name; 
    }
    function getLabel () {
        return $this->_label; 
    }
    function getSender_tva () {
        return $this->_sender_tva; 
    }
    function getDoc_type () {
        return $this->_doc_type; 
    }
    function getDoc_id () {
        return $this->_doc_id; 
    }
    function getJson () {
        return $this->_json; 
    }
    function getPdf_base64 () {
        return $this->_pdf_base64; 
    }
    function getDate_send () {
        return $this->_date_send; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setReciver_tva ($reciver_tva) {
        $this->_reciver_tva = $reciver_tva; 
    }
    function setSender_name ($sender_name) {
        $this->_sender_name = $sender_name; 
    }
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setSender_tva ($sender_tva) {
        $this->_sender_tva = $sender_tva; 
    }
    function setDoc_type ($doc_type) {
        $this->_doc_type = $doc_type; 
    }
    function setDoc_id ($doc_id) {
        $this->_doc_id = $doc_id; 
    }
    function setJson ($json) {
        $this->_json = $json; 
    }
    function setPdf_base64 ($pdf_base64) {
        $this->_pdf_base64 = $pdf_base64; 
    }
    function setDate_send ($date_send) {
        $this->_date_send = $date_send; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDocs_exchange($id) {
        $docs_exchange = docs_exchange_details($id);
        //
        $this->_id = $docs_exchange["id"];
        $this->_reciver_tva = $docs_exchange["reciver_tva"];
        $this->_sender_name = $docs_exchange["sender_name"];
        $this->_label = $docs_exchange["label"];
        $this->_sender_tva = $docs_exchange["sender_tva"];
        $this->_doc_type = $docs_exchange["doc_type"];
        $this->_doc_id = $docs_exchange["doc_id"];
        $this->_json = $docs_exchange["json"];
        $this->_pdf_base64 = $docs_exchange["pdf_base64"];
        $this->_date_send = $docs_exchange["date_send"];
        $this->_order_by = $docs_exchange["order_by"];
        $this->_status = $docs_exchange["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return docs_exchange_field_id($field, $id);
    }

    function field_code($field, $code) {
        return docs_exchange_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return docs_exchange_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return docs_exchange_list($start, $limit);
    }

    function details($id) {
        return docs_exchange_details($id);
    }

    function delete($id) {
        return docs_exchange_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return docs_exchange_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return docs_exchange_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return docs_exchange_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return docs_exchange_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return docs_exchange_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return docs_exchange_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return docs_exchange_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return docs_exchange_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return docs_exchange_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "doc_type":
                return controllers_field_id("controller", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return docs_exchange_is_id($id);
    }

    function is_reciver_tva($reciver_tva) {
        return docs_exchange_is_reciver_tva($reciver_tva);
    }

    function is_sender_name($sender_name) {
        return docs_exchange_is_sender_name($sender_name);
    }

    function is_label($label) {
        return docs_exchange_is_label($label);
    }

    function is_sender_tva($sender_tva) {
        return docs_exchange_is_sender_tva($sender_tva);
    }

    function is_doc_type($doc_type) {
        return docs_exchange_is_doc_type($doc_type);
    }

    function is_doc_id($doc_id) {
        return docs_exchange_is_doc_id($doc_id);
    }

    function is_json($json) {
        return docs_exchange_is_json($json);
    }

    function is_pdf_base64($pdf_base64) {
        return docs_exchange_is_pdf_base64($pdf_base64);
    }

    function is_date_send($date_send) {
        return docs_exchange_is_date_send($date_send);
    }

    function is_order_by($order_by) {
        return docs_exchange_is_order_by($order_by);
    }

    function is_status($status) {
        return docs_exchange_is_status($status);
    }


}
