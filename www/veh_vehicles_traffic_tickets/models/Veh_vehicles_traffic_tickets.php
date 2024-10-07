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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
#################################################################################
 
        



/**
 * Clase veh_vehicles_traffic_tickets
 * 
 * Description
 * 
 * @package veh_vehicles_traffic_tickets
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicles_traffic_tickets {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * time
    */ 
    public $_time;
    /** 
    * pv_police
    */ 
    public $_pv_police;
    /** 
    * driver_id
    */ 
    public $_driver_id;
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
    function getDate () {
        return $this->_date; 
    }
    function getTime () {
        return $this->_time; 
    }
    function getPv_police () {
        return $this->_pv_police; 
    }
    function getDriver_id () {
        return $this->_driver_id; 
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
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setTime ($time) {
        $this->_time = $time; 
    }
    function setPv_police ($pv_police) {
        $this->_pv_police = $pv_police; 
    }
    function setDriver_id ($driver_id) {
        $this->_driver_id = $driver_id; 
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
   
    function setVeh_vehicles_traffic_tickets($id) {
        $veh_vehicles_traffic_tickets = veh_vehicles_traffic_tickets_details($id);
        //
        $this->_id = $veh_vehicles_traffic_tickets["id"];
        $this->_vehicle_id = $veh_vehicles_traffic_tickets["vehicle_id"];
        $this->_date = $veh_vehicles_traffic_tickets["date"];
        $this->_time = $veh_vehicles_traffic_tickets["time"];
        $this->_pv_police = $veh_vehicles_traffic_tickets["pv_police"];
        $this->_driver_id = $veh_vehicles_traffic_tickets["driver_id"];
        $this->_date_registre = $veh_vehicles_traffic_tickets["date_registre"];
        $this->_order_by = $veh_vehicles_traffic_tickets["order_by"];
        $this->_status = $veh_vehicles_traffic_tickets["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicles_traffic_tickets_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicles_traffic_tickets_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicles_traffic_tickets_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicles_traffic_tickets_list($start, $limit);
    }

    function details($id) {
        return veh_vehicles_traffic_tickets_details($id);
    }

    function delete($id) {
        return veh_vehicles_traffic_tickets_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_traffic_tickets_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_traffic_tickets_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicles_traffic_tickets_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicles_traffic_tickets_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicles_traffic_tickets_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicles_traffic_tickets_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicles_traffic_tickets_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicles_traffic_tickets_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicles_traffic_tickets_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "vehicle_id":
                return veh_vehicles_field_id("id", $value);
                break;
                case "driver_id":
                return veh_drivers_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_vehicles_traffic_tickets_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicles_traffic_tickets_is_vehicle_id($vehicle_id);
    }

    function is_date($date) {
        return veh_vehicles_traffic_tickets_is_date($date);
    }

    function is_time($time) {
        return veh_vehicles_traffic_tickets_is_time($time);
    }

    function is_pv_police($pv_police) {
        return veh_vehicles_traffic_tickets_is_pv_police($pv_police);
    }

    function is_driver_id($driver_id) {
        return veh_vehicles_traffic_tickets_is_driver_id($driver_id);
    }

    function is_date_registre($date_registre) {
        return veh_vehicles_traffic_tickets_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return veh_vehicles_traffic_tickets_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicles_traffic_tickets_is_status($status);
    }


}
