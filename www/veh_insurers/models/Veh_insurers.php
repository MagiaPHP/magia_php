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
# Fecha de creacion del documento: 2024-09-16 17:09:04 
#################################################################################
 
        



/**
 * Clase veh_insurers
 * 
 * Description
 * 
 * @package veh_insurers
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_insurers {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * insurer_id
    */ 
    public $_insurer_id;
    /** 
    * insurer_code
    */ 
    public $_insurer_code;
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
    function getInsurer_id () {
        return $this->_insurer_id; 
    }
    function getInsurer_code () {
        return $this->_insurer_code; 
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
    function setInsurer_id ($insurer_id) {
        $this->_insurer_id = $insurer_id; 
    }
    function setInsurer_code ($insurer_code) {
        $this->_insurer_code = $insurer_code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_insurers($id) {
        $veh_insurers = veh_insurers_details($id);
        //
        $this->_id = $veh_insurers["id"];
        $this->_insurer_id = $veh_insurers["insurer_id"];
        $this->_insurer_code = $veh_insurers["insurer_code"];
        $this->_order_by = $veh_insurers["order_by"];
        $this->_status = $veh_insurers["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_insurers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_insurers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_insurers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_insurers_list($start, $limit);
    }

    function details($id) {
        return veh_insurers_details($id);
    }

    function delete($id) {
        return veh_insurers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_insurers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_insurers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_insurers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_insurers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_insurers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_insurers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_insurers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_insurers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_insurers_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "insurer_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_insurers_is_id($id);
    }

    function is_insurer_id($insurer_id) {
        return veh_insurers_is_insurer_id($insurer_id);
    }

    function is_insurer_code($insurer_code) {
        return veh_insurers_is_insurer_code($insurer_code);
    }

    function is_order_by($order_by) {
        return veh_insurers_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_insurers_is_status($status);
    }


}
