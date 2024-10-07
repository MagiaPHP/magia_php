<?php
 // backups
 // Date: 2024-08-11    
################################################################################

class Backups {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * subdomain
    */ 
    public $_subdomain;
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
    function getDate () {
        return $this->_date; 
    }
    function getSubdomain () {
        return $this->_subdomain; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setSubdomain ($subdomain) {
        $this->_subdomain = $subdomain; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBackups($id) {
        $backups = backups_details($id);
        //
        $this->_id = $backups["id"];
        $this->_date = $backups["date"];
        $this->_subdomain = $backups["subdomain"];
        $this->_order_by = $backups["order_by"];
        $this->_status = $backups["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return backups_field_id($field, $id);
    }

    function field_code($field, $code) {
        return backups_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return backups_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return backups_list($start, $limit);
    }

    function details($id) {
        return backups_details($id);
    }

    function delete($id) {
        return backups_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return backups_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return backups_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return backups_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return backups_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return backups_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return backups_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return backups_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return backups_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return backups_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return backups_is_id($id);
    }

    function is_date($date) {
        return backups_is_date($date);
    }

    function is_subdomain($subdomain) {
        return backups_is_subdomain($subdomain);
    }

    function is_order_by($order_by) {
        return backups_is_order_by($order_by);
    }

    function is_status($status) {
        return backups_is_status($status);
    }


}
