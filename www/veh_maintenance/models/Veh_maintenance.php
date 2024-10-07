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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
#################################################################################
 
        



/**
 * Clase veh_maintenance
 * 
 * Description
 * 
 * @package veh_maintenance
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_maintenance {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * vehicle_id
    */ 
    public $_vehicle_id;
    /** 
    * workshop_id
    */ 
    public $_workshop_id;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * next_visit
    */ 
    public $_next_visit;
    /** 
    * total
    */ 
    public $_total;
    /** 
    * kl
    */ 
    public $_kl;
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
    function getWorkshop_id () {
        return $this->_workshop_id; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getType () {
        return $this->_type; 
    }
    function getNext_visit () {
        return $this->_next_visit; 
    }
    function getTotal () {
        return $this->_total; 
    }
    function getKl () {
        return $this->_kl; 
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
    function setWorkshop_id ($workshop_id) {
        $this->_workshop_id = $workshop_id; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setNext_visit ($next_visit) {
        $this->_next_visit = $next_visit; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setKl ($kl) {
        $this->_kl = $kl; 
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
   
    function setVeh_maintenance($id) {
        $veh_maintenance = veh_maintenance_details($id);
        //
        $this->_id = $veh_maintenance["id"];
        $this->_vehicle_id = $veh_maintenance["vehicle_id"];
        $this->_workshop_id = $veh_maintenance["workshop_id"];
        $this->_date = $veh_maintenance["date"];
        $this->_type = $veh_maintenance["type"];
        $this->_next_visit = $veh_maintenance["next_visit"];
        $this->_total = $veh_maintenance["total"];
        $this->_kl = $veh_maintenance["kl"];
        $this->_notes = $veh_maintenance["notes"];
        $this->_date_registre = $veh_maintenance["date_registre"];
        $this->_order_by = $veh_maintenance["order_by"];
        $this->_status = $veh_maintenance["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_maintenance_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_maintenance_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_maintenance_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_maintenance_list($start, $limit);
    }

    function details($id) {
        return veh_maintenance_details($id);
    }

    function delete($id) {
        return veh_maintenance_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_maintenance_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_maintenance_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_maintenance_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_maintenance_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_maintenance_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_maintenance_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_maintenance_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_maintenance_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_maintenance_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "vehicle_id":
                return veh_vehicles_field_id("id", $value);
                break;
                case "workshop_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_maintenance_is_id($id);
    }

    function is_vehicle_id($vehicle_id) {
        return veh_maintenance_is_vehicle_id($vehicle_id);
    }

    function is_workshop_id($workshop_id) {
        return veh_maintenance_is_workshop_id($workshop_id);
    }

    function is_date($date) {
        return veh_maintenance_is_date($date);
    }

    function is_type($type) {
        return veh_maintenance_is_type($type);
    }

    function is_next_visit($next_visit) {
        return veh_maintenance_is_next_visit($next_visit);
    }

    function is_total($total) {
        return veh_maintenance_is_total($total);
    }

    function is_kl($kl) {
        return veh_maintenance_is_kl($kl);
    }

    function is_notes($notes) {
        return veh_maintenance_is_notes($notes);
    }

    function is_date_registre($date_registre) {
        return veh_maintenance_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return veh_maintenance_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_maintenance_is_status($status);
    }


}
