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
# Fecha de creacion del documento: 2024-09-21 12:09:43 
#################################################################################
 
        



/**
 * Clase hr_employee_worked_days_formule
 * 
 * Description
 * 
 * @package hr_employee_worked_days_formule
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_worked_days_formule {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * month
    */ 
    public $_month;
    /** 
    * year
    */ 
    public $_year;
    /** 
    * column
    */ 
    public $_column;
    /** 
    * value
    */ 
    public $_value;
    /** 
    * formule
    */ 
    public $_formule;
    /** 
    * notes
    */ 
    public $_notes;
    /** 
    * code
    */ 
    public $_code;
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
    function getEmployee_id () {
        return $this->_employee_id; 
    }
    function getMonth () {
        return $this->_month; 
    }
    function getYear () {
        return $this->_year; 
    }
    function getColumn () {
        return $this->_column; 
    }
    function getValue () {
        return $this->_value; 
    }
    function getFormule () {
        return $this->_formule; 
    }
    function getNotes () {
        return $this->_notes; 
    }
    function getCode () {
        return $this->_code; 
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
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setMonth ($month) {
        $this->_month = $month; 
    }
    function setYear ($year) {
        $this->_year = $year; 
    }
    function setColumn ($column) {
        $this->_column = $column; 
    }
    function setValue ($value) {
        $this->_value = $value; 
    }
    function setFormule ($formule) {
        $this->_formule = $formule; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setCode ($code) {
        $this->_code = $code; 
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
   
    function setHr_employee_worked_days_formule($id) {
        $hr_employee_worked_days_formule = hr_employee_worked_days_formule_details($id);
        //
        $this->_id = $hr_employee_worked_days_formule["id"];
        $this->_employee_id = $hr_employee_worked_days_formule["employee_id"];
        $this->_month = $hr_employee_worked_days_formule["month"];
        $this->_year = $hr_employee_worked_days_formule["year"];
        $this->_column = $hr_employee_worked_days_formule["column"];
        $this->_value = $hr_employee_worked_days_formule["value"];
        $this->_formule = $hr_employee_worked_days_formule["formule"];
        $this->_notes = $hr_employee_worked_days_formule["notes"];
        $this->_code = $hr_employee_worked_days_formule["code"];
        $this->_date_registre = $hr_employee_worked_days_formule["date_registre"];
        $this->_order_by = $hr_employee_worked_days_formule["order_by"];
        $this->_status = $hr_employee_worked_days_formule["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_worked_days_formule_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_worked_days_formule_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_worked_days_formule_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_worked_days_formule_list($start, $limit);
    }

    function details($id) {
        return hr_employee_worked_days_formule_details($id);
    }

    function delete($id) {
        return hr_employee_worked_days_formule_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_worked_days_formule_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_worked_days_formule_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_worked_days_formule_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_worked_days_formule_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_worked_days_formule_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_worked_days_formule_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_worked_days_formule_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_worked_days_formule_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_worked_days_formule_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_worked_days_formule_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_worked_days_formule_is_employee_id($employee_id);
    }

    function is_month($month) {
        return hr_employee_worked_days_formule_is_month($month);
    }

    function is_year($year) {
        return hr_employee_worked_days_formule_is_year($year);
    }

    function is_column($column) {
        return hr_employee_worked_days_formule_is_column($column);
    }

    function is_value($value) {
        return hr_employee_worked_days_formule_is_value($value);
    }

    function is_formule($formule) {
        return hr_employee_worked_days_formule_is_formule($formule);
    }

    function is_notes($notes) {
        return hr_employee_worked_days_formule_is_notes($notes);
    }

    function is_code($code) {
        return hr_employee_worked_days_formule_is_code($code);
    }

    function is_date_registre($date_registre) {
        return hr_employee_worked_days_formule_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return hr_employee_worked_days_formule_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_worked_days_formule_is_status($status);
    }


}
