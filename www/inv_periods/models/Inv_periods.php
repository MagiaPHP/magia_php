<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 

 

class Inv_periods {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * period
    */ 
    public $_period;
    /** 
    * description
    */ 
    public $_description;
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
    function getPeriod () {
        return $this->_period; 
    }
    function getDescription () {
        return $this->_description; 
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
    function setPeriod ($period) {
        $this->_period = $period; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setInv_periods($id) {
        $inv_periods = inv_periods_details($id);
        //
        $this->_id = $inv_periods["id"];
        $this->_period = $inv_periods["period"];
        $this->_description = $inv_periods["description"];
        $this->_order_by = $inv_periods["order_by"];
        $this->_status = $inv_periods["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return inv_periods_field_id($field, $id);
    }

    function field_code($field, $code) {
        return inv_periods_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return inv_periods_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return inv_periods_list($start, $limit);
    }

    function details($id) {
        return inv_periods_details($id);
    }

    function delete($id) {
        return inv_periods_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return inv_periods_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return inv_periods_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return inv_periods_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return inv_periods_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return inv_periods_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return inv_periods_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return inv_periods_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return inv_periods_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return inv_periods_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return inv_periods_is_id($id);
    }

    function is_period($period) {
        return inv_periods_is_period($period);
    }

    function is_description($description) {
        return inv_periods_is_description($description);
    }

    function is_order_by($order_by) {
        return inv_periods_is_order_by($order_by);
    }

    function is_status($status) {
        return inv_periods_is_status($status);
    }


}
