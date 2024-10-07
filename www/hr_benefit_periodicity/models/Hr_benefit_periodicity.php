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
# Fecha de creacion del documento: 2024-09-21 12:09:09 
#################################################################################
 
        



/**
 * Clase hr_benefit_periodicity
 * 
 * Description
 * 
 * @package hr_benefit_periodicity
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_benefit_periodicity {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * periodicity
    */ 
    public $_periodicity;
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
    function getCode () {
        return $this->_code; 
    }
    function getPeriodicity () {
        return $this->_periodicity; 
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
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setPeriodicity ($periodicity) {
        $this->_periodicity = $periodicity; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_benefit_periodicity($id) {
        $hr_benefit_periodicity = hr_benefit_periodicity_details($id);
        //
        $this->_id = $hr_benefit_periodicity["id"];
        $this->_code = $hr_benefit_periodicity["code"];
        $this->_periodicity = $hr_benefit_periodicity["periodicity"];
        $this->_order_by = $hr_benefit_periodicity["order_by"];
        $this->_status = $hr_benefit_periodicity["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_benefit_periodicity_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_benefit_periodicity_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_benefit_periodicity_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_benefit_periodicity_list($start, $limit);
    }

    function details($id) {
        return hr_benefit_periodicity_details($id);
    }

    function delete($id) {
        return hr_benefit_periodicity_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_benefit_periodicity_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_benefit_periodicity_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_benefit_periodicity_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_benefit_periodicity_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_benefit_periodicity_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_benefit_periodicity_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_benefit_periodicity_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_benefit_periodicity_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_benefit_periodicity_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_benefit_periodicity_is_id($id);
    }

    function is_code($code) {
        return hr_benefit_periodicity_is_code($code);
    }

    function is_periodicity($periodicity) {
        return hr_benefit_periodicity_is_periodicity($periodicity);
    }

    function is_order_by($order_by) {
        return hr_benefit_periodicity_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_benefit_periodicity_is_status($status);
    }


}
