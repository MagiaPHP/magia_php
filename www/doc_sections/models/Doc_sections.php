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
# Fecha de creacion del documento: 2024-09-04 08:09:04 
#################################################################################
 
        



/**
 * Clase doc_sections
 * 
 * Description
 * 
 * @package doc_sections
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_sections {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * section
    */ 
    private $_section;
    /** 
    * open
    */ 
    private $_open;
    /** 
    * items
    */ 
    private $_items;
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
    function getSection () {
        return $this->_section; 
    }
    function getOpen () {
        return $this->_open; 
    }
    function getItems () {
        return $this->_items; 
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
    function setSection ($section) {
        $this->_section = $section; 
    }
    function setOpen ($open) {
        $this->_open = $open; 
    }
    function setItems ($items) {
        $this->_items = $items; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDoc_sections($id) {
        $doc_sections = doc_sections_details($id);
        //
        $this->_id = $doc_sections["id"];
        $this->_section = $doc_sections["section"];
        $this->_open = $doc_sections["open"];
        $this->_items = $doc_sections["items"];
        $this->_order_by = $doc_sections["order_by"];
        $this->_status = $doc_sections["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_sections_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_sections_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_sections_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_sections_list($start, $limit);
    }

    function details($id) {
        return doc_sections_details($id);
    }

    function delete($id) {
        return doc_sections_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_sections_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_sections_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_sections_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_sections_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_sections_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_sections_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_sections_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_sections_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_sections_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_sections_is_id($id);
    }

    function is_section($section) {
        return doc_sections_is_section($section);
    }

    function is_open($open) {
        return doc_sections_is_open($open);
    }

    function is_items($items) {
        return doc_sections_is_items($items);
    }

    function is_order_by($order_by) {
        return doc_sections_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_sections_is_status($status);
    }


}
