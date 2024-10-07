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
# Fecha de creacion del documento: 2024-09-16 17:09:25 
#################################################################################
 
        



/**
 * Clase veh_vehicle_kilometers
 * 
 * Description
 * 
 * @package veh_vehicle_kilometers
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicle_kilometers {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * event_date
    */ 
    public $_event_date;
    /** 
    * kl
    */ 
    public $_kl;
    /** 
    * event_type
    */ 
    public $_event_type;
    /** 
    * event_id
    */ 
    public $_event_id;
    /** 
    * created_at
    */ 
    public $_created_at;
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
    function getVehicle_id () {
        return $this->_vehicle_id; 
    }
    function getEvent_date () {
        return $this->_event_date; 
    }
    function getKl () {
        return $this->_kl; 
    }
    function getEvent_type () {
        return $this->_event_type; 
    }
    function getEvent_id () {
        return $this->_event_id; 
    }
    function getCreated_at () {
        return $this->_created_at; 
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
    function setVehicle_id ($vehicle_id) {
        $this->_vehicle_id = $vehicle_id; 
    }
    function setEvent_date ($event_date) {
        $this->_event_date = $event_date; 
    }
    function setKl ($kl) {
        $this->_kl = $kl; 
    }
    function setEvent_type ($event_type) {
        $this->_event_type = $event_type; 
    }
    function setEvent_id ($event_id) {
        $this->_event_id = $event_id; 
    }
    function setCreated_at ($created_at) {
        $this->_created_at = $created_at; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_vehicle_kilometers($id) {
        $veh_vehicle_kilometers = veh_vehicle_kilometers_details($id);
        //
        $this->_id = $veh_vehicle_kilometers["id"];
        $this->_vehicle_id = $veh_vehicle_kilometers["vehicle_id"];
        $this->_event_date = $veh_vehicle_kilometers["event_date"];
        $this->_kl = $veh_vehicle_kilometers["kl"];
        $this->_event_type = $veh_vehicle_kilometers["event_type"];
        $this->_event_id = $veh_vehicle_kilometers["event_id"];
        $this->_created_at = $veh_vehicle_kilometers["created_at"];
        $this->_order_by = $veh_vehicle_kilometers["order_by"];
        $this->_status = $veh_vehicle_kilometers["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicle_kilometers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicle_kilometers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicle_kilometers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicle_kilometers_list($start, $limit);
    }

    function details($id) {
        return veh_vehicle_kilometers_details($id);
    }

    function delete($id) {
        return veh_vehicle_kilometers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_kilometers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_kilometers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicle_kilometers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicle_kilometers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicle_kilometers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicle_kilometers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicle_kilometers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicle_kilometers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicle_kilometers_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "vehicle_id":
                return veh_vehicles_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_vehicle_kilometers_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicle_kilometers_is_vehicle_id($vehicle_id);
    }

    function is_event_date($event_date) {
        return veh_vehicle_kilometers_is_event_date($event_date);
    }

    function is_kl($kl) {
        return veh_vehicle_kilometers_is_kl($kl);
    }

    function is_event_type($event_type) {
        return veh_vehicle_kilometers_is_event_type($event_type);
    }

    function is_event_id($event_id) {
        return veh_vehicle_kilometers_is_event_id($event_id);
    }

    function is_created_at($created_at) {
        return veh_vehicle_kilometers_is_created_at($created_at);
    }

    function is_order_by($order_by) {
        return veh_vehicle_kilometers_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicle_kilometers_is_status($status);
    }


}
