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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################
 
        



/**
 * Clase veh_vehicle_management
 * 
 * Description
 * 
 * @package veh_vehicle_management
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicle_management {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * maintenance_type
    */ 
    public $_maintenance_type;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * cost
    */ 
    public $_cost;
    /** 
    * mileage
    */ 
    public $_mileage;
    /** 
    * next_due_date
    */ 
    public $_next_due_date;
   

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
    function getMaintenance_type () {
        return $this->_maintenance_type; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getCost () {
        return $this->_cost; 
    }
    function getMileage () {
        return $this->_mileage; 
    }
    function getNext_due_date () {
        return $this->_next_due_date; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setVehicle_id ($vehicle_id) {
        $this->_vehicle_id = $vehicle_id; 
    }
    function setMaintenance_type ($maintenance_type) {
        $this->_maintenance_type = $maintenance_type; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setCost ($cost) {
        $this->_cost = $cost; 
    }
    function setMileage ($mileage) {
        $this->_mileage = $mileage; 
    }
    function setNext_due_date ($next_due_date) {
        $this->_next_due_date = $next_due_date; 
    }
   
    function setVeh_vehicle_management($id) {
        $veh_vehicle_management = veh_vehicle_management_details($id);
        //
        $this->_id = $veh_vehicle_management["id"];
        $this->_vehicle_id = $veh_vehicle_management["vehicle_id"];
        $this->_maintenance_type = $veh_vehicle_management["maintenance_type"];
        $this->_description = $veh_vehicle_management["description"];
        $this->_date = $veh_vehicle_management["date"];
        $this->_cost = $veh_vehicle_management["cost"];
        $this->_mileage = $veh_vehicle_management["mileage"];
        $this->_next_due_date = $veh_vehicle_management["next_due_date"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicle_management_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicle_management_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicle_management_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicle_management_list($start, $limit);
    }

    function details($id) {
        return veh_vehicle_management_details($id);
    }

    function delete($id) {
        return veh_vehicle_management_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_management_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_management_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicle_management_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicle_management_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicle_management_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicle_management_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicle_management_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicle_management_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicle_management_function($col_name, $value);
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
        return veh_vehicle_management_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicle_management_is_vehicle_id($vehicle_id);
    }

    function is_maintenance_type($maintenance_type) {
        return veh_vehicle_management_is_maintenance_type($maintenance_type);
    }

    function is_description($description) {
        return veh_vehicle_management_is_description($description);
    }

    function is_date($date) {
        return veh_vehicle_management_is_date($date);
    }

    function is_cost($cost) {
        return veh_vehicle_management_is_cost($cost);
    }

    function is_mileage($mileage) {
        return veh_vehicle_management_is_mileage($mileage);
    }

    function is_next_due_date($next_due_date) {
        return veh_vehicle_management_is_next_due_date($next_due_date);
    }


}
