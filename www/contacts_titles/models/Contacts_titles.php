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
# Fecha de creacion del documento: 2024-09-29 09:09:19 
#################################################################################
 
        



/**
 * Clase contacts_titles
 * 
 * Description
 * 
 * @package contacts_titles
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-29
 */




class Contacts_titles {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * abbreviation
    */ 
    public $_abbreviation;
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
    function getTitle () {
        return $this->_title; 
    }
    function getAbbreviation () {
        return $this->_abbreviation; 
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
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setAbbreviation ($abbreviation) {
        $this->_abbreviation = $abbreviation; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setContacts_titles($id) {
        $contacts_titles = contacts_titles_details($id);
        //
        $this->_id = $contacts_titles["id"];
        $this->_title = $contacts_titles["title"];
        $this->_abbreviation = $contacts_titles["abbreviation"];
        $this->_order_by = $contacts_titles["order_by"];
        $this->_status = $contacts_titles["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return contacts_titles_field_id($field, $id);
    }

    function field_code($field, $code) {
        return contacts_titles_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return contacts_titles_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return contacts_titles_list($start, $limit);
    }

    function details($id) {
        return contacts_titles_details($id);
    }

    function delete($id) {
        return contacts_titles_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return contacts_titles_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return contacts_titles_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return contacts_titles_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return contacts_titles_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return contacts_titles_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return contacts_titles_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return contacts_titles_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return contacts_titles_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return contacts_titles_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return contacts_titles_is_id($id);
    }

    function is_title($title) {
        return contacts_titles_is_title($title);
    }

    function is_abbreviation($abbreviation) {
        return contacts_titles_is_abbreviation($abbreviation);
    }

    function is_order_by($order_by) {
        return contacts_titles_is_order_by($order_by);
    }

    function is_status($status) {
        return contacts_titles_is_status($status);
    }


}
