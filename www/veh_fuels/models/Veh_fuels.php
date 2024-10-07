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
# Fecha de creacion del documento: 2024-09-16 17:09:02 
#################################################################################
 
        



/**
 * Clase veh_fuels
 * 
 * Description
 * 
 * @package veh_fuels
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_fuels {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * code
    */ 
    public $_code;
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
   
    function setVeh_fuels($id) {
        $veh_fuels = veh_fuels_details($id);
        //
        $this->_id = $veh_fuels["id"];
        $this->_name = $veh_fuels["name"];
        $this->_code = $veh_fuels["code"];
        $this->_order_by = $veh_fuels["order_by"];
        $this->_status = $veh_fuels["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_fuels_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_fuels_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_fuels_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_fuels_list($start, $limit);
    }

    function details($id) {
        return veh_fuels_details($id);
    }

    function delete($id) {
        return veh_fuels_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_fuels_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_fuels_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_fuels_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_fuels_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_fuels_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_fuels_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_fuels_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_fuels_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_fuels_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_fuels_is_id($id);
    }

    function is_name($name) {
        return veh_fuels_is_name($name);
    }

    function is_code($code) {
        return veh_fuels_is_code($code);
    }

    function is_order_by($order_by) {
        return veh_fuels_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_fuels_is_status($status);
    }


}
