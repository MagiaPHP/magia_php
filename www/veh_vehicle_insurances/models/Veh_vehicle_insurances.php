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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
#################################################################################
 
        



/**
 * Clase veh_vehicle_insurances
 * 
 * Description
 * 
 * @package veh_vehicle_insurances
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicle_insurances {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * insurance_code
    */ 
    public $_insurance_code;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * contrat_number
    */ 
    public $_contrat_number;
    /** 
    * countries_ok
    */ 
    public $_countries_ok;
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
    function getInsurance_code () {
        return $this->_insurance_code; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getContrat_number () {
        return $this->_contrat_number; 
    }
    function getCountries_ok () {
        return $this->_countries_ok; 
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
    function setInsurance_code ($insurance_code) {
        $this->_insurance_code = $insurance_code; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setContrat_number ($contrat_number) {
        $this->_contrat_number = $contrat_number; 
    }
    function setCountries_ok ($countries_ok) {
        $this->_countries_ok = $countries_ok; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_vehicle_insurances($id) {
        $veh_vehicle_insurances = veh_vehicle_insurances_details($id);
        //
        $this->_id = $veh_vehicle_insurances["id"];
        $this->_vehicle_id = $veh_vehicle_insurances["vehicle_id"];
        $this->_insurance_code = $veh_vehicle_insurances["insurance_code"];
        $this->_date_start = $veh_vehicle_insurances["date_start"];
        $this->_date_end = $veh_vehicle_insurances["date_end"];
        $this->_contrat_number = $veh_vehicle_insurances["contrat_number"];
        $this->_countries_ok = $veh_vehicle_insurances["countries_ok"];
        $this->_order_by = $veh_vehicle_insurances["order_by"];
        $this->_status = $veh_vehicle_insurances["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicle_insurances_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicle_insurances_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicle_insurances_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicle_insurances_list($start, $limit);
    }

    function details($id) {
        return veh_vehicle_insurances_details($id);
    }

    function delete($id) {
        return veh_vehicle_insurances_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_insurances_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicle_insurances_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicle_insurances_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicle_insurances_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicle_insurances_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicle_insurances_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicle_insurances_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicle_insurances_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicle_insurances_function($col_name, $value);
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
        return veh_vehicle_insurances_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_vehicle_insurances_is_vehicle_id($vehicle_id);
    }

    function is_insurance_code($insurance_code) {
        return veh_vehicle_insurances_is_insurance_code($insurance_code);
    }

    function is_date_start($date_start) {
        return veh_vehicle_insurances_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return veh_vehicle_insurances_is_date_end($date_end);
    }

    function is_contrat_number($contrat_number) {
        return veh_vehicle_insurances_is_contrat_number($contrat_number);
    }

    function is_countries_ok($countries_ok) {
        return veh_vehicle_insurances_is_countries_ok($countries_ok);
    }

    function is_order_by($order_by) {
        return veh_vehicle_insurances_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicle_insurances_is_status($status);
    }


}
