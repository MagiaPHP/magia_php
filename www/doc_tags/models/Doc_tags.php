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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
#################################################################################
 
        



/**
 * Clase doc_tags
 * 
 * Description
 * 
 * @package doc_tags
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_tags {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * controller
    */ 
    private $_controller;
    /** 
    * tag
    */ 
    private $_tag;
    /** 
    * replace_by
    */ 
    private $_replace_by;
    /** 
    * description
    */ 
    private $_description;
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
    function getController () {
        return $this->_controller; 
    }
    function getTag () {
        return $this->_tag; 
    }
    function getReplace_by () {
        return $this->_replace_by; 
    }
    function getDescription () {
        return $this->_description; 
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
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setTag ($tag) {
        $this->_tag = $tag; 
    }
    function setReplace_by ($replace_by) {
        $this->_replace_by = $replace_by; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDoc_tags($id) {
        $doc_tags = doc_tags_details($id);
        //
        $this->_id = $doc_tags["id"];
        $this->_controller = $doc_tags["controller"];
        $this->_tag = $doc_tags["tag"];
        $this->_replace_by = $doc_tags["replace_by"];
        $this->_description = $doc_tags["description"];
        $this->_order_by = $doc_tags["order_by"];
        $this->_status = $doc_tags["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_tags_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_tags_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_tags_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_tags_list($start, $limit);
    }

    function details($id) {
        return doc_tags_details($id);
    }

    function delete($id) {
        return doc_tags_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_tags_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_tags_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_tags_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_tags_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_tags_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_tags_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_tags_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_tags_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_tags_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_tags_is_id($id);
    }

    function is_controller($controller) {
        return doc_tags_is_controller($controller);
    }

    function is_tag($tag) {
        return doc_tags_is_tag($tag);
    }

    function is_replace_by($replace_by) {
        return doc_tags_is_replace_by($replace_by);
    }

    function is_description($description) {
        return doc_tags_is_description($description);
    }

    function is_order_by($order_by) {
        return doc_tags_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_tags_is_status($status);
    }


}
