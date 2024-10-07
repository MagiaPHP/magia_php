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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
#################################################################################
 
        



/**
 * Clase veh_maintenance_lines
 * 
 * Description
 * 
 * @package veh_maintenance_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_maintenance_lines {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * maintenance_id
    */ 
    public $_maintenance_id;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * quantity
    */ 
    public $_quantity;
    /** 
    * total
    */ 
    public $_total;
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
    function getMaintenance_id () {
        return $this->_maintenance_id; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getQuantity () {
        return $this->_quantity; 
    }
    function getTotal () {
        return $this->_total; 
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
    function setMaintenance_id ($maintenance_id) {
        $this->_maintenance_id = $maintenance_id; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setQuantity ($quantity) {
        $this->_quantity = $quantity; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_maintenance_lines($id) {
        $veh_maintenance_lines = veh_maintenance_lines_details($id);
        //
        $this->_id = $veh_maintenance_lines["id"];
        $this->_maintenance_id = $veh_maintenance_lines["maintenance_id"];
        $this->_description = $veh_maintenance_lines["description"];
        $this->_price = $veh_maintenance_lines["price"];
        $this->_quantity = $veh_maintenance_lines["quantity"];
        $this->_total = $veh_maintenance_lines["total"];
        $this->_order_by = $veh_maintenance_lines["order_by"];
        $this->_status = $veh_maintenance_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_maintenance_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_maintenance_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_maintenance_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_maintenance_lines_list($start, $limit);
    }

    function details($id) {
        return veh_maintenance_lines_details($id);
    }

    function delete($id) {
        return veh_maintenance_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_maintenance_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_maintenance_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_maintenance_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_maintenance_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_maintenance_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_maintenance_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_maintenance_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_maintenance_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_maintenance_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "maintenance_id":
                return veh_maintenance_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_maintenance_lines_is_id($id);
    }

    function is_maintenance_id($maintenance_id) {
        return veh_maintenance_lines_is_maintenance_id($maintenance_id);
    }

    function is_description($description) {
        return veh_maintenance_lines_is_description($description);
    }

    function is_price($price) {
        return veh_maintenance_lines_is_price($price);
    }

    function is_quantity($quantity) {
        return veh_maintenance_lines_is_quantity($quantity);
    }

    function is_total($total) {
        return veh_maintenance_lines_is_total($total);
    }

    function is_order_by($order_by) {
        return veh_maintenance_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_maintenance_lines_is_status($status);
    }


}
