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
# Fecha de creacion del documento: 2024-09-21 12:09:38 
#################################################################################
 
        



/**
 * Clase hr_employee_sizes_clothes
 * 
 * Description
 * 
 * @package hr_employee_sizes_clothes
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_sizes_clothes {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * clothes_code
    */ 
    public $_clothes_code;
    /** 
    * size
    */ 
    public $_size;
    /** 
    * notes
    */ 
    public $_notes;
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
    function getEmployee_id () {
        return $this->_employee_id; 
    }
    function getClothes_code () {
        return $this->_clothes_code; 
    }
    function getSize () {
        return $this->_size; 
    }
    function getNotes () {
        return $this->_notes; 
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
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setClothes_code ($clothes_code) {
        $this->_clothes_code = $clothes_code; 
    }
    function setSize ($size) {
        $this->_size = $size; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_sizes_clothes($id) {
        $hr_employee_sizes_clothes = hr_employee_sizes_clothes_details($id);
        //
        $this->_id = $hr_employee_sizes_clothes["id"];
        $this->_employee_id = $hr_employee_sizes_clothes["employee_id"];
        $this->_clothes_code = $hr_employee_sizes_clothes["clothes_code"];
        $this->_size = $hr_employee_sizes_clothes["size"];
        $this->_notes = $hr_employee_sizes_clothes["notes"];
        $this->_order_by = $hr_employee_sizes_clothes["order_by"];
        $this->_status = $hr_employee_sizes_clothes["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_sizes_clothes_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_sizes_clothes_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_sizes_clothes_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_sizes_clothes_list($start, $limit);
    }

    function details($id) {
        return hr_employee_sizes_clothes_details($id);
    }

    function delete($id) {
        return hr_employee_sizes_clothes_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_sizes_clothes_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_sizes_clothes_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_sizes_clothes_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_sizes_clothes_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_sizes_clothes_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_sizes_clothes_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_sizes_clothes_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_sizes_clothes_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_sizes_clothes_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_sizes_clothes_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_sizes_clothes_is_employee_id($employee_id);
    }

    function is_clothes_code($clothes_code) {
        return hr_employee_sizes_clothes_is_clothes_code($clothes_code);
    }

    function is_size($size) {
        return hr_employee_sizes_clothes_is_size($size);
    }

    function is_notes($notes) {
        return hr_employee_sizes_clothes_is_notes($notes);
    }

    function is_order_by($order_by) {
        return hr_employee_sizes_clothes_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_sizes_clothes_is_status($status);
    }


}
