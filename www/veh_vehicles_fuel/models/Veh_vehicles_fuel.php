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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
#################################################################################
 
        



/**
 * Clase veh_vehicles_fuel
 * 
 * Description
 * 
 * @package veh_vehicles_fuel
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicles_fuel {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * fuel_code
    */ 
    public $_fuel_code;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * paid_by
    */ 
    public $_paid_by;
    /** 
    * ref
    */ 
    public $_ref;
    /** 
    * notes
    */ 
    public $_notes;
    /** 
    * registred_by
    */ 
    public $_registred_by;
    /** 
    * date_registre
    */ 
    public $_date_registre;
    /** 
    * kl
    */ 
    public $_kl;
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
    function getFuel_code () {
        return $this->_fuel_code; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getPaid_by () {
        return $this->_paid_by; 
    }
    function getRef () {
        return $this->_ref; 
    }
    function getNotes () {
        return $this->_notes; 
    }
    function getRegistred_by () {
        return $this->_registred_by; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
    }
    function getKl () {
        return $this->_kl; 
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
    function setFuel_code ($fuel_code) {
        $this->_fuel_code = $fuel_code; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setPaid_by ($paid_by) {
        $this->_paid_by = $paid_by; 
    }
    function setRef ($ref) {
        $this->_ref = $ref; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setRegistred_by ($registred_by) {
        $this->_registred_by = $registred_by; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setKl ($kl) {
        $this->_kl = $kl; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_vehicles_fuel($id) {
        $veh_vehicles_fuel = veh_vehicles_fuel_details($id);
        //
        $this->_id = $veh_vehicles_fuel["id"];
        $this->_vehicle_id = $veh_vehicles_fuel["vehicle_id"];
        $this->_fuel_code = $veh_vehicles_fuel["fuel_code"];
        $this->_date = $veh_vehicles_fuel["date"];
        $this->_price = $veh_vehicles_fuel["price"];
        $this->_paid_by = $veh_vehicles_fuel["paid_by"];
        $this->_ref = $veh_vehicles_fuel["ref"];
        $this->_notes = $veh_vehicles_fuel["notes"];
        $this->_registred_by = $veh_vehicles_fuel["registred_by"];
        $this->_date_registre = $veh_vehicles_fuel["date_registre"];
        $this->_kl = $veh_vehicles_fuel["kl"];
        $this->_order_by = $veh_vehicles_fuel["order_by"];
        $this->_status = $veh_vehicles_fuel["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicles_fuel_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicles_fuel_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicles_fuel_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicles_fuel_list($start, $limit);
    }

    function details($id) {
        return veh_vehicles_fuel_details($id);
    }

    function delete($id) {
        return veh_vehicles_fuel_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_fuel_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_fuel_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicles_fuel_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicles_fuel_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicles_fuel_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicles_fuel_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicles_fuel_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicles_fuel_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicles_fuel_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "fuel_code":
                return veh_fuels_field_id("code", $value);
                break;
                case "registred_by":
                return users_field_id("contact_id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_vehicles_fuel_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicles_fuel_is_vehicle_id($vehicle_id);
    }

    function is_fuel_code($fuel_code) {
        return veh_vehicles_fuel_is_fuel_code($fuel_code);
    }

    function is_date($date) {
        return veh_vehicles_fuel_is_date($date);
    }

    function is_price($price) {
        return veh_vehicles_fuel_is_price($price);
    }

    function is_paid_by($paid_by) {
        return veh_vehicles_fuel_is_paid_by($paid_by);
    }

    function is_ref($ref) {
        return veh_vehicles_fuel_is_ref($ref);
    }

    function is_notes($notes) {
        return veh_vehicles_fuel_is_notes($notes);
    }

    function is_registred_by($registred_by) {
        return veh_vehicles_fuel_is_registred_by($registred_by);
    }

    function is_date_registre($date_registre) {
        return veh_vehicles_fuel_is_date_registre($date_registre);
    }

    function is_kl($kl) {
        return veh_vehicles_fuel_is_kl($kl);
    }

    function is_order_by($order_by) {
        return veh_vehicles_fuel_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicles_fuel_is_status($status);
    }


}
