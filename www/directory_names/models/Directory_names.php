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
# Fecha de creacion del documento: 2024-09-04 08:09:51 
#################################################################################
 
        



/**
 * Clase directory_names
 * 
 * Description
 * 
 * @package directory_names
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Directory_names {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * name
    */ 
    private $_name;
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
    function setName ($name) {
        $this->_name = $name; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDirectory_names($id) {
        $directory_names = directory_names_details($id);
        //
        $this->_id = $directory_names["id"];
        $this->_name = $directory_names["name"];
        $this->_order_by = $directory_names["order_by"];
        $this->_status = $directory_names["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return directory_names_field_id($field, $id);
    }

    function field_code($field, $code) {
        return directory_names_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return directory_names_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return directory_names_list($start, $limit);
    }

    function details($id) {
        return directory_names_details($id);
    }

    function delete($id) {
        return directory_names_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return directory_names_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return directory_names_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return directory_names_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return directory_names_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return directory_names_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return directory_names_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return directory_names_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return directory_names_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return directory_names_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return directory_names_is_id($id);
    }

    function is_name($name) {
        return directory_names_is_name($name);
    }

    function is_order_by($order_by) {
        return directory_names_is_order_by($order_by);
    }

    function is_status($status) {
        return directory_names_is_status($status);
    }


}
