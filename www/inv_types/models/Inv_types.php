<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:26 

 

class Inv_types {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * code
    */ 
    public $_code;
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
    function getType () {
        return $this->_type; 
    }
    function getCode () {
        return $this->_code; 
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
    function setType ($type) {
        $this->_type = $type; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setInv_types($id) {
        $inv_types = inv_types_details($id);
        //
        $this->_id = $inv_types["id"];
        $this->_type = $inv_types["type"];
        $this->_code = $inv_types["code"];
        $this->_order_by = $inv_types["order_by"];
        $this->_status = $inv_types["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return inv_types_field_id($field, $id);
    }

    function field_code($field, $code) {
        return inv_types_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return inv_types_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return inv_types_list($start, $limit);
    }

    function details($id) {
        return inv_types_details($id);
    }

    function delete($id) {
        return inv_types_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return inv_types_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return inv_types_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return inv_types_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return inv_types_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return inv_types_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return inv_types_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return inv_types_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return inv_types_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return inv_types_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return inv_types_is_id($id);
    }

    function is_type($type) {
        return inv_types_is_type($type);
    }

    function is_code($code) {
        return inv_types_is_code($code);
    }

    function is_order_by($order_by) {
        return inv_types_is_order_by($order_by);
    }

    function is_status($status) {
        return inv_types_is_status($status);
    }


}
