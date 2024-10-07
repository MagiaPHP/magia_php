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
# Fecha de creacion del documento: 2024-09-21 12:09:42 
#################################################################################
 
        



/**
 * Clase hr_employee_worked_days
 * 
 * Description
 * 
 * @package hr_employee_worked_days
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_worked_days {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * start_am
    */ 
    public $_start_am;
    /** 
    * end_am
    */ 
    public $_end_am;
    /** 
    * lunch
    */ 
    public $_lunch;
    /** 
    * start_pm
    */ 
    public $_start_pm;
    /** 
    * end_pm
    */ 
    public $_end_pm;
    /** 
    * total_hours
    */ 
    public $_total_hours;
    /** 
    * project_id
    */ 
    public $_project_id;
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
    /** 
    * year
    */ 
    public $_year;
    /** 
    * month
    */ 
    public $_month;
   

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
    function getDate () {
        return $this->_date; 
    }
    function getStart_am () {
        return $this->_start_am; 
    }
    function getEnd_am () {
        return $this->_end_am; 
    }
    function getLunch () {
        return $this->_lunch; 
    }
    function getStart_pm () {
        return $this->_start_pm; 
    }
    function getEnd_pm () {
        return $this->_end_pm; 
    }
    function getTotal_hours () {
        return $this->_total_hours; 
    }
    function getProject_id () {
        return $this->_project_id; 
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
    function getYear () {
        return $this->_year; 
    }
    function getMonth () {
        return $this->_month; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setStart_am ($start_am) {
        $this->_start_am = $start_am; 
    }
    function setEnd_am ($end_am) {
        $this->_end_am = $end_am; 
    }
    function setLunch ($lunch) {
        $this->_lunch = $lunch; 
    }
    function setStart_pm ($start_pm) {
        $this->_start_pm = $start_pm; 
    }
    function setEnd_pm ($end_pm) {
        $this->_end_pm = $end_pm; 
    }
    function setTotal_hours ($total_hours) {
        $this->_total_hours = $total_hours; 
    }
    function setProject_id ($project_id) {
        $this->_project_id = $project_id; 
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
    function setYear ($year) {
        $this->_year = $year; 
    }
    function setMonth ($month) {
        $this->_month = $month; 
    }
   
    function setHr_employee_worked_days($id) {
        $hr_employee_worked_days = hr_employee_worked_days_details($id);
        //
        $this->_id = $hr_employee_worked_days["id"];
        $this->_employee_id = $hr_employee_worked_days["employee_id"];
        $this->_date = $hr_employee_worked_days["date"];
        $this->_start_am = $hr_employee_worked_days["start_am"];
        $this->_end_am = $hr_employee_worked_days["end_am"];
        $this->_lunch = $hr_employee_worked_days["lunch"];
        $this->_start_pm = $hr_employee_worked_days["start_pm"];
        $this->_end_pm = $hr_employee_worked_days["end_pm"];
        $this->_total_hours = $hr_employee_worked_days["total_hours"];
        $this->_project_id = $hr_employee_worked_days["project_id"];
        $this->_notes = $hr_employee_worked_days["notes"];
        $this->_order_by = $hr_employee_worked_days["order_by"];
        $this->_status = $hr_employee_worked_days["status"];
        $this->_year = $hr_employee_worked_days["year"];
        $this->_month = $hr_employee_worked_days["month"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_worked_days_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_worked_days_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_worked_days_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_worked_days_list($start, $limit);
    }

    function details($id) {
        return hr_employee_worked_days_details($id);
    }

    function delete($id) {
        return hr_employee_worked_days_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_worked_days_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_worked_days_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_worked_days_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_worked_days_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_worked_days_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_worked_days_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_worked_days_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_worked_days_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_worked_days_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
                case "project_id":
                return projects_field_id("id", $value);
                break;
                case "status":
                return hr_worked_days_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_worked_days_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_worked_days_is_employee_id($employee_id);
    }

    function is_date($date) {
        return hr_employee_worked_days_is_date($date);
    }

    function is_start_am($start_am) {
        return hr_employee_worked_days_is_start_am($start_am);
    }

    function is_end_am($end_am) {
        return hr_employee_worked_days_is_end_am($end_am);
    }

    function is_lunch($lunch) {
        return hr_employee_worked_days_is_lunch($lunch);
    }

    function is_start_pm($start_pm) {
        return hr_employee_worked_days_is_start_pm($start_pm);
    }

    function is_end_pm($end_pm) {
        return hr_employee_worked_days_is_end_pm($end_pm);
    }

    function is_total_hours($total_hours) {
        return hr_employee_worked_days_is_total_hours($total_hours);
    }

    function is_project_id($project_id) {
        return hr_employee_worked_days_is_project_id($project_id);
    }

    function is_notes($notes) {
        return hr_employee_worked_days_is_notes($notes);
    }

    function is_order_by($order_by) {
        return hr_employee_worked_days_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_worked_days_is_status($status);
    }

    function is_year($year) {
        return hr_employee_worked_days_is_year($year);
    }

    function is_month($month) {
        return hr_employee_worked_days_is_month($month);
    }


}
