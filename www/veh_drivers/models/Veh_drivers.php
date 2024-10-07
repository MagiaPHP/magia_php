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
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################
 
        



/**
 * Clase veh_drivers
 * 
 * Description
 * 
 * @package veh_drivers
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_drivers {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * country
    */ 
    public $_country;
    /** 
    * license
    */ 
    public $_license;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * number
    */ 
    public $_number;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * expired
    */ 
    public $_expired;
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
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getCountry () {
        return $this->_country; 
    }
    function getLicense () {
        return $this->_license; 
    }
    function getType () {
        return $this->_type; 
    }
    function getNumber () {
        return $this->_number; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getExpired () {
        return $this->_expired; 
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
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setCountry ($country) {
        $this->_country = $country; 
    }
    function setLicense ($license) {
        $this->_license = $license; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setNumber ($number) {
        $this->_number = $number; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setExpired ($expired) {
        $this->_expired = $expired; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_drivers($id) {
        $veh_drivers = veh_drivers_details($id);
        //
        $this->_id = $veh_drivers["id"];
        $this->_contact_id = $veh_drivers["contact_id"];
        $this->_country = $veh_drivers["country"];
        $this->_license = $veh_drivers["license"];
        $this->_type = $veh_drivers["type"];
        $this->_number = $veh_drivers["number"];
        $this->_date_start = $veh_drivers["date_start"];
        $this->_date_end = $veh_drivers["date_end"];
        $this->_expired = $veh_drivers["expired"];
        $this->_order_by = $veh_drivers["order_by"];
        $this->_status = $veh_drivers["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_drivers_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_drivers_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_drivers_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_drivers_list($start, $limit);
    }

    function details($id) {
        return veh_drivers_details($id);
    }

    function delete($id) {
        return veh_drivers_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_drivers_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_drivers_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_drivers_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_drivers_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_drivers_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_drivers_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_drivers_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_drivers_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_drivers_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_drivers_is_id($id);
    }

    function is_contact_id($contact_id) {
        return veh_drivers_is_contact_id($contact_id);
    }

    function is_country($country) {
        return veh_drivers_is_country($country);
    }

    function is_license($license) {
        return veh_drivers_is_license($license);
    }

    function is_type($type) {
        return veh_drivers_is_type($type);
    }

    function is_number($number) {
        return veh_drivers_is_number($number);
    }

    function is_date_start($date_start) {
        return veh_drivers_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return veh_drivers_is_date_end($date_end);
    }

    function is_expired($expired) {
        return veh_drivers_is_expired($expired);
    }

    function is_order_by($order_by) {
        return veh_drivers_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_drivers_is_status($status);
    }


}
