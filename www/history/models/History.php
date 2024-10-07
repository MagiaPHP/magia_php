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
# Fecha de creacion del documento: 2024-10-06 08:10:46 
#################################################################################
 
        



/**
 * Clase history
 * 
 * Description
 * 
 * @package history
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-06
 */




class History {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * details
    */ 
    public $_details;
    /** 
    * registre_date
    */ 
    public $_registre_date;
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
    function getDetails () {
        return $this->_details; 
    }
    function getRegistre_date () {
        return $this->_registre_date; 
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
    function setDetails ($details) {
        $this->_details = $details; 
    }
    function setRegistre_date ($registre_date) {
        $this->_registre_date = $registre_date; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHistory($id) {
        $history = history_details($id);
        //
        $this->_id = $history["id"];
        $this->_details = $history["details"];
        $this->_registre_date = $history["registre_date"];
        $this->_order_by = $history["order_by"];
        $this->_status = $history["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return history_field_id($field, $id);
    }

    function field_code($field, $code) {
        return history_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return history_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return history_list($start, $limit);
    }

    function details($id) {
        return history_details($id);
    }

    function delete($id) {
        return history_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return history_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return history_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return history_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return history_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return history_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return history_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return history_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return history_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return history_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return history_is_id($id);
    }

    function is_details($details) {
        return history_is_details($details);
    }

    function is_registre_date($registre_date) {
        return history_is_registre_date($registre_date);
    }

    function is_order_by($order_by) {
        return history_is_order_by($order_by);
    }

    function is_status($status) {
        return history_is_status($status);
    }


}
