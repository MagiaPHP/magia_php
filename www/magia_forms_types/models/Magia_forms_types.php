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
# Fecha de creacion del documento: 2024-08-31 17:08:11 
#################################################################################
 
        



/**
 * Clase magia_forms_types
 * 
 * Description
 * 
 * @package magia_forms_types
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-08-31
 */




class Magia_forms_types {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * type
    */ 
    private $_type;
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
    function getType () {
        return $this->_type; 
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
    function setType ($type) {
        $this->_type = $type; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setMagia_forms_types($id) {
        $magia_forms_types = magia_forms_types_details($id);
        //
        $this->_id = $magia_forms_types["id"];
        $this->_type = $magia_forms_types["type"];
        $this->_order_by = $magia_forms_types["order_by"];
        $this->_status = $magia_forms_types["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_forms_types_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_forms_types_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_forms_types_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_forms_types_list($start, $limit);
    }

    function details($id) {
        return magia_forms_types_details($id);
    }

    function delete($id) {
        return magia_forms_types_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_types_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_types_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_forms_types_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_forms_types_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_forms_types_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_forms_types_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_forms_types_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_forms_types_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_forms_types_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return magia_forms_types_is_id($id);
    }

    function is_type($type) {
        return magia_forms_types_is_type($type);
    }

    function is_order_by($order_by) {
        return magia_forms_types_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_forms_types_is_status($status);
    }


}
