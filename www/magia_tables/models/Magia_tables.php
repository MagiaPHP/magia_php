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
# Fecha de creacion del documento: 2024-08-31 17:08:56 
#################################################################################
 
        



/**
 * Clase magia_tables
 * 
 * Description
 * 
 * @package magia_tables
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-08-31
 */




class Magia_tables {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * label
    */ 
    private $_label;
    /** 
    * controller
    */ 
    private $_controller;
    /** 
    * action
    */ 
    private $_action;
    /** 
    * name
    */ 
    private $_name;
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
    function getLabel () {
        return $this->_label; 
    }
    function getController () {
        return $this->_controller; 
    }
    function getAction () {
        return $this->_action; 
    }
    function getName () {
        return $this->_name; 
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
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setAction ($action) {
        $this->_action = $action; 
    }
    function setName ($name) {
        $this->_name = $name; 
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
   
    function setMagia_tables($id) {
        $magia_tables = magia_tables_details($id);
        //
        $this->_id = $magia_tables["id"];
        $this->_label = $magia_tables["label"];
        $this->_controller = $magia_tables["controller"];
        $this->_action = $magia_tables["action"];
        $this->_name = $magia_tables["name"];
        $this->_code = $magia_tables["code"];
        $this->_order_by = $magia_tables["order_by"];
        $this->_status = $magia_tables["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_tables_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_tables_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_tables_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_tables_list($start, $limit);
    }

    function details($id) {
        return magia_tables_details($id);
    }

    function delete($id) {
        return magia_tables_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_tables_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_tables_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_tables_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_tables_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_tables_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_tables_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_tables_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_tables_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_tables_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return magia_tables_is_id($id);
    }

    function is_label($label) {
        return magia_tables_is_label($label);
    }

    function is_controller($controller) {
        return magia_tables_is_controller($controller);
    }

    function is_action($action) {
        return magia_tables_is_action($action);
    }

    function is_name($name) {
        return magia_tables_is_name($name);
    }

    function is_code($code) {
        return magia_tables_is_code($code);
    }

    function is_order_by($order_by) {
        return magia_tables_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_tables_is_status($status);
    }


}
