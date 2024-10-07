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
# Fecha de creacion del documento: 2024-09-29 09:09:07 
#################################################################################
 
        



/**
 * Clase _languages
 * 
 * Description
 * 
 * @package _languages
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-29
 */




class _languages {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * language
    */ 
    public $_language;
    /** 
    * name
    */ 
    public $_name;
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
    function getLanguage () {
        return $this->_language; 
    }
    function getName () {
        return $this->_name; 
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
    function setLanguage ($language) {
        $this->_language = $language; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function set_languages($id) {
        $_languages = _languages_details($id);
        //
        $this->_id = $_languages["id"];
        $this->_language = $_languages["language"];
        $this->_name = $_languages["name"];
        $this->_order_by = $_languages["order_by"];
        $this->_status = $_languages["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return _languages_field_id($field, $id);
    }

    function field_code($field, $code) {
        return _languages_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return _languages_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return _languages_list($start, $limit);
    }

    function details($id) {
        return _languages_details($id);
    }

    function delete($id) {
        return _languages_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return _languages_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return _languages_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return _languages_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return _languages_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return _languages_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return _languages_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return _languages_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return _languages_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return _languages_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return _languages_is_id($id);
    }

    function is_language($language) {
        return _languages_is_language($language);
    }

    function is_name($name) {
        return _languages_is_name($name);
    }

    function is_order_by($order_by) {
        return _languages_is_order_by($order_by);
    }

    function is_status($status) {
        return _languages_is_status($status);
    }


}
