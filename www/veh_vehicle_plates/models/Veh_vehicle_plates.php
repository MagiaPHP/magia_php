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
# Fecha de creacion del documento: 2024-09-16 17:09:32 
#################################################################################
 
        



/**
 * Clase veh_vehicle_plates
 * 
 * Description
 * 
 * @package veh_vehicle_plates
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicle_plates {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * plate
    */ 
    public $_plate;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * old_plate
    */ 
    public $_old_plate;
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
    function getPlate () {
        return $this->_plate; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getOld_plate () {
        return $this->_old_plate; 
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
    function setPlate ($plate) {
        $this->_plate = $plate; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setOld_plate ($old_plate) {
        $this->_old_plate = $old_plate; 
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
   
    function setVeh_vehicle_plates($id) {
        $veh_vehicle_plates = veh_vehicle_plates_details($id);
        //
        $this->_id = $veh_vehicle_plates["id"];
        $this->_vehicle_id = $veh_vehicle_plates["vehicle_id"];
        $this->_plate = $veh_vehicle_plates["plate"];
        $this->_date_start = $veh_vehicle_plates["date_start"];
        $this->_date_end = $veh_vehicle_plates["date_end"];
        $this->_old_plate = $veh_vehicle_plates["old_plate"];
        $this->_date_registre = $veh_vehicle_plates["date_registre"];
        $this->_order_by = $veh_vehicle_plates["order_by"];
        $this->_status = $veh_vehicle_plates["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicle_plates_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicle_plates_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicle_plates_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicle_plates_list($start, $limit);
    }

    function details($id) {
        return veh_vehicle_plates_details($id);
    }

    function delete($id) {
        return veh_vehicle_plates_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_plates_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_plates_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicle_plates_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicle_plates_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicle_plates_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicle_plates_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicle_plates_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicle_plates_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicle_plates_function($col_name, $value);
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
        return veh_vehicle_plates_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicle_plates_is_vehicle_id($vehicle_id);
    }

    function is_plate($plate) {
        return veh_vehicle_plates_is_plate($plate);
    }

    function is_date_start($date_start) {
        return veh_vehicle_plates_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return veh_vehicle_plates_is_date_end($date_end);
    }

    function is_old_plate($old_plate) {
        return veh_vehicle_plates_is_old_plate($old_plate);
    }

    function is_date_registre($date_registre) {
        return veh_vehicle_plates_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return veh_vehicle_plates_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicle_plates_is_status($status);
    }


}
