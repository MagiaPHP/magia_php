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
# Fecha de creacion del documento: 2024-09-04 08:09:23 
#################################################################################
 
        



/**
 * Clase expenses_frecuencies
 * 
 * Description
 * 
 * @package expenses_frecuencies
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Expenses_frecuencies {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * frecuency
    */ 
    private $_frecuency;
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
    function getFrecuency () {
        return $this->_frecuency; 
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
    function setFrecuency ($frecuency) {
        $this->_frecuency = $frecuency; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setExpenses_frecuencies($id) {
        $expenses_frecuencies = expenses_frecuencies_details($id);
        //
        $this->_id = $expenses_frecuencies["id"];
        $this->_frecuency = $expenses_frecuencies["frecuency"];
        $this->_order_by = $expenses_frecuencies["order_by"];
        $this->_status = $expenses_frecuencies["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_frecuencies_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_frecuencies_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_frecuencies_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_frecuencies_list($start, $limit);
    }

    function details($id) {
        return expenses_frecuencies_details($id);
    }

    function delete($id) {
        return expenses_frecuencies_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_frecuencies_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_frecuencies_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_frecuencies_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_frecuencies_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_frecuencies_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_frecuencies_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_frecuencies_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_frecuencies_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_frecuencies_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_frecuencies_is_id($id);
    }

    function is_frecuency($frecuency) {
        return expenses_frecuencies_is_frecuency($frecuency);
    }

    function is_order_by($order_by) {
        return expenses_frecuencies_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_frecuencies_is_status($status);
    }


}
