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
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################
 
        



/**
 * Clase veh_vehicle_activities
 * 
 * Description
 * 
 * @package veh_vehicle_activities
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicle_activities {

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
    * start_date
    */ 
    public $_start_date;
    /** 
    * time_start
    */ 
    public $_time_start;
    /** 
    * kl_start
    */ 
    public $_kl_start;
    /** 
    * end_date
    */ 
    public $_end_date;
    /** 
    * time_end
    */ 
    public $_time_end;
    /** 
    * kl_end
    */ 
    public $_kl_end;
    /** 
    * order_by
    */ 
    public $_order_by;
    /** 
    * status
    */ 
    public $_status;
    /** 
    * kl_difference
    */ 
    public $_kl_difference;
   

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
    function getStart_date () {
        return $this->_start_date; 
    }
    function getTime_start () {
        return $this->_time_start; 
    }
    function getKl_start () {
        return $this->_kl_start; 
    }
    function getEnd_date () {
        return $this->_end_date; 
    }
    function getTime_end () {
        return $this->_time_end; 
    }
    function getKl_end () {
        return $this->_kl_end; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }
    function getKl_difference () {
        return $this->_kl_difference; 
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
    function setStart_date ($start_date) {
        $this->_start_date = $start_date; 
    }
    function setTime_start ($time_start) {
        $this->_time_start = $time_start; 
    }
    function setKl_start ($kl_start) {
        $this->_kl_start = $kl_start; 
    }
    function setEnd_date ($end_date) {
        $this->_end_date = $end_date; 
    }
    function setTime_end ($time_end) {
        $this->_time_end = $time_end; 
    }
    function setKl_end ($kl_end) {
        $this->_kl_end = $kl_end; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
    function setKl_difference ($kl_difference) {
        $this->_kl_difference = $kl_difference; 
    }
   
    function setVeh_vehicle_activities($id) {
        $veh_vehicle_activities = veh_vehicle_activities_details($id);
        //
        $this->_id = $veh_vehicle_activities["id"];
        $this->_vehicle_id = $veh_vehicle_activities["vehicle_id"];
        $this->_driver_id = $veh_vehicle_activities["driver_id"];
        $this->_start_date = $veh_vehicle_activities["start_date"];
        $this->_time_start = $veh_vehicle_activities["time_start"];
        $this->_kl_start = $veh_vehicle_activities["kl_start"];
        $this->_end_date = $veh_vehicle_activities["end_date"];
        $this->_time_end = $veh_vehicle_activities["time_end"];
        $this->_kl_end = $veh_vehicle_activities["kl_end"];
        $this->_order_by = $veh_vehicle_activities["order_by"];
        $this->_status = $veh_vehicle_activities["status"];
        $this->_kl_difference = $veh_vehicle_activities["kl_difference"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicle_activities_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicle_activities_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicle_activities_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicle_activities_list($start, $limit);
    }

    function details($id) {
        return veh_vehicle_activities_details($id);
    }

    function delete($id) {
        return veh_vehicle_activities_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_activities_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_activities_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicle_activities_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicle_activities_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicle_activities_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicle_activities_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicle_activities_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicle_activities_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicle_activities_function($col_name, $value);
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
        return veh_vehicle_activities_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicle_activities_is_vehicle_id($vehicle_id);
    }

    function is_driver_id($driver_id) {
        return veh_vehicle_activities_is_driver_id($driver_id);
    }

    function is_start_date($start_date) {
        return veh_vehicle_activities_is_start_date($start_date);
    }

    function is_time_start($time_start) {
        return veh_vehicle_activities_is_time_start($time_start);
    }

    function is_kl_start($kl_start) {
        return veh_vehicle_activities_is_kl_start($kl_start);
    }

    function is_end_date($end_date) {
        return veh_vehicle_activities_is_end_date($end_date);
    }

    function is_time_end($time_end) {
        return veh_vehicle_activities_is_time_end($time_end);
    }

    function is_kl_end($kl_end) {
        return veh_vehicle_activities_is_kl_end($kl_end);
    }

    function is_order_by($order_by) {
        return veh_vehicle_activities_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicle_activities_is_status($status);
    }

    function is_kl_difference($kl_difference) {
        return veh_vehicle_activities_is_kl_difference($kl_difference);
    }


}
