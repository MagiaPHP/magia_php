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
# Fecha de creacion del documento: 2024-09-21 12:09:00 
#################################################################################
 
        



/**
 * Clase hr_documents
 * 
 * Description
 * 
 * @package hr_documents
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_documents {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * content
    */ 
    public $_content;
    /** 
    * version
    */ 
    public $_version;
    /** 
    * date_creation
    */ 
    public $_date_creation;
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
    function getCode () {
        return $this->_code; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getContent () {
        return $this->_content; 
    }
    function getVersion () {
        return $this->_version; 
    }
    function getDate_creation () {
        return $this->_date_creation; 
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
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setContent ($content) {
        $this->_content = $content; 
    }
    function setVersion ($version) {
        $this->_version = $version; 
    }
    function setDate_creation ($date_creation) {
        $this->_date_creation = $date_creation; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_documents($id) {
        $hr_documents = hr_documents_details($id);
        //
        $this->_id = $hr_documents["id"];
        $this->_code = $hr_documents["code"];
        $this->_title = $hr_documents["title"];
        $this->_content = $hr_documents["content"];
        $this->_version = $hr_documents["version"];
        $this->_date_creation = $hr_documents["date_creation"];
        $this->_order_by = $hr_documents["order_by"];
        $this->_status = $hr_documents["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_documents_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_documents_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_documents_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_documents_list($start, $limit);
    }

    function details($id) {
        return hr_documents_details($id);
    }

    function delete($id) {
        return hr_documents_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_documents_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_documents_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_documents_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_documents_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_documents_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_documents_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_documents_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_documents_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_documents_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_documents_is_id($id);
    }

    function is_code($code) {
        return hr_documents_is_code($code);
    }

    function is_title($title) {
        return hr_documents_is_title($title);
    }

    function is_content($content) {
        return hr_documents_is_content($content);
    }

    function is_version($version) {
        return hr_documents_is_version($version);
    }

    function is_date_creation($date_creation) {
        return hr_documents_is_date_creation($date_creation);
    }

    function is_order_by($order_by) {
        return hr_documents_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_documents_is_status($status);
    }


}
