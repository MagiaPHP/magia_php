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
# Fecha de creacion del documento: 2024-09-21 12:09:14 
#################################################################################
 
        



/**
 * Clase hr_employee_documents
 * 
 * Description
 * 
 * @package hr_employee_documents
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_documents {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * document
    */ 
    public $_document;
    /** 
    * document_number
    */ 
    public $_document_number;
    /** 
    * date_delivery
    */ 
    public $_date_delivery;
    /** 
    * date_expiration
    */ 
    public $_date_expiration;
    /** 
    * follow
    */ 
    public $_follow;
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
    function getEmployee_id () {
        return $this->_employee_id; 
    }
    function getDocument () {
        return $this->_document; 
    }
    function getDocument_number () {
        return $this->_document_number; 
    }
    function getDate_delivery () {
        return $this->_date_delivery; 
    }
    function getDate_expiration () {
        return $this->_date_expiration; 
    }
    function getFollow () {
        return $this->_follow; 
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
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setDocument ($document) {
        $this->_document = $document; 
    }
    function setDocument_number ($document_number) {
        $this->_document_number = $document_number; 
    }
    function setDate_delivery ($date_delivery) {
        $this->_date_delivery = $date_delivery; 
    }
    function setDate_expiration ($date_expiration) {
        $this->_date_expiration = $date_expiration; 
    }
    function setFollow ($follow) {
        $this->_follow = $follow; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_documents($id) {
        $hr_employee_documents = hr_employee_documents_details($id);
        //
        $this->_id = $hr_employee_documents["id"];
        $this->_employee_id = $hr_employee_documents["employee_id"];
        $this->_document = $hr_employee_documents["document"];
        $this->_document_number = $hr_employee_documents["document_number"];
        $this->_date_delivery = $hr_employee_documents["date_delivery"];
        $this->_date_expiration = $hr_employee_documents["date_expiration"];
        $this->_follow = $hr_employee_documents["follow"];
        $this->_order_by = $hr_employee_documents["order_by"];
        $this->_status = $hr_employee_documents["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_documents_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_documents_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_documents_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_documents_list($start, $limit);
    }

    function details($id) {
        return hr_employee_documents_details($id);
    }

    function delete($id) {
        return hr_employee_documents_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_documents_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_documents_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_documents_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_documents_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_documents_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_documents_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_documents_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_documents_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_documents_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_documents_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_documents_is_employee_id($employee_id);
    }

    function is_document($document) {
        return hr_employee_documents_is_document($document);
    }

    function is_document_number($document_number) {
        return hr_employee_documents_is_document_number($document_number);
    }

    function is_date_delivery($date_delivery) {
        return hr_employee_documents_is_date_delivery($date_delivery);
    }

    function is_date_expiration($date_expiration) {
        return hr_employee_documents_is_date_expiration($date_expiration);
    }

    function is_follow($follow) {
        return hr_employee_documents_is_follow($follow);
    }

    function is_order_by($order_by) {
        return hr_employee_documents_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_documents_is_status($status);
    }


}
