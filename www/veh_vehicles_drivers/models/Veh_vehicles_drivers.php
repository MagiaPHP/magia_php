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
# Fecha de creacion del documento: 2024-09-16 17:09:39 
#################################################################################
 
        



/**
 * Clase veh_vehicles_drivers
 * 
 * Description
 * 
 * @package veh_vehicles_drivers
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicles_drivers {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * driver_id
    */ 
    public $_driver_id;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * notes
    */ 
    public $_notes;
    /** 
    * date_registre
    */ 
    public $_date_registre;
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
    function getDriver_id () {
        return $this->_driver_id; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getNotes () {
        return $this->_notes; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
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
    function setDriver_id ($driver_id) {
        $this->_driver_id = $driver_id; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_vehicles_drivers($id) {
        $veh_vehicles_drivers = veh_vehicles_drivers_details($id);
        //
        $this->_id = $veh_vehicles_drivers["id"];
        $this->_vehicle_id = $veh_vehicles_drivers["vehicle_id"];
        $this->_driver_id = $veh_vehicles_drivers["driver_id"];
        $this->_date_start = $veh_vehicles_drivers["date_start"];
        $this->_date_end = $veh_vehicles_drivers["date_end"];
        $this->_notes = $veh_vehicles_drivers["notes"];
        $this->_date_registre = $veh_vehicles_drivers["date_registre"];
        $this->_order_by = $veh_vehicles_drivers["order_by"];
        $this->_status = $veh_vehicles_drivers["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicles_drivers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicles_drivers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicles_drivers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicles_drivers_list($start, $limit);
    }

    function details($id) {
        return veh_vehicles_drivers_details($id);
    }

    function delete($id) {
        return veh_vehicles_drivers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_drivers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_drivers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicles_drivers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicles_drivers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicles_drivers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicles_drivers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicles_drivers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicles_drivers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicles_drivers_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "vehicle_id":
                return veh_vehicles_field_id("id", $value);
                break;
                case "driver_id":
                return veh_drivers_field_id("contact_id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_vehicles_drivers_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicles_drivers_is_vehicle_id($vehicle_id);
    }

    function is_driver_id($driver_id) {
        return veh_vehicles_drivers_is_driver_id($driver_id);
    }

    function is_date_start($date_start) {
        return veh_vehicles_drivers_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return veh_vehicles_drivers_is_date_end($date_end);
    }

    function is_notes($notes) {
        return veh_vehicles_drivers_is_notes($notes);
    }

    function is_date_registre($date_registre) {
        return veh_vehicles_drivers_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return veh_vehicles_drivers_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicles_drivers_is_status($status);
    }


}
