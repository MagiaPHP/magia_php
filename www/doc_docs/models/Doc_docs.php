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
# Fecha de creacion del documento: 2024-09-04 08:09:50 
#################################################################################
 
        



/**
 * Clase doc_docs
 * 
 * Description
 * 
 * @package doc_docs
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_docs {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * doc
    */ 
    private $_doc;
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
    function getDoc () {
        return $this->_doc; 
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
    function setDoc ($doc) {
        $this->_doc = $doc; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDoc_docs($id) {
        $doc_docs = doc_docs_details($id);
        //
        $this->_id = $doc_docs["id"];
        $this->_doc = $doc_docs["doc"];
        $this->_order_by = $doc_docs["order_by"];
        $this->_status = $doc_docs["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_docs_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_docs_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_docs_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_docs_list($start, $limit);
    }

    function details($id) {
        return doc_docs_details($id);
    }

    function delete($id) {
        return doc_docs_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_docs_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_docs_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_docs_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_docs_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_docs_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_docs_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_docs_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_docs_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_docs_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_docs_is_id($id);
    }

    function is_doc($doc) {
        return doc_docs_is_doc($doc);
    }

    function is_order_by($order_by) {
        return doc_docs_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_docs_is_status($status);
    }


}
