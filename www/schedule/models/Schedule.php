<?php
 // schedule
 // Date: 2024-07-31    
################################################################################

class Schedule {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * day
    */ 
    public $_day;
    /** 
    * am_start
    */ 
    public $_am_start;
    /** 
    * am_end
    */ 
    public $_am_end;
    /** 
    * pm_start
    */ 
    public $_pm_start;
    /** 
    * pm_end
    */ 
    public $_pm_end;
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
    function getDay () {
        return $this->_day; 
    }
    function getAm_start () {
        return $this->_am_start; 
    }
    function getAm_end () {
        return $this->_am_end; 
    }
    function getPm_start () {
        return $this->_pm_start; 
    }
    function getPm_end () {
        return $this->_pm_end; 
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
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setDay ($day) {
        $this->_day = $day; 
    }
    function setAm_start ($am_start) {
        $this->_am_start = $am_start; 
    }
    function setAm_end ($am_end) {
        $this->_am_end = $am_end; 
    }
    function setPm_start ($pm_start) {
        $this->_pm_start = $pm_start; 
    }
    function setPm_end ($pm_end) {
        $this->_pm_end = $pm_end; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setSchedule($id) {
        $schedule = schedule_details($id);
        //
        $this->_id = $schedule["id"];
        $this->_contact_id = $schedule["contact_id"];
        $this->_day = $schedule["day"];
        $this->_am_start = $schedule["am_start"];
        $this->_am_end = $schedule["am_end"];
        $this->_pm_start = $schedule["pm_start"];
        $this->_pm_end = $schedule["pm_end"];
        $this->_order_by = $schedule["order_by"];
        $this->_status = $schedule["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return schedule_field_id($field, $id);
    }

    function field_code($field, $code) {
        return schedule_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return schedule_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return schedule_list($start, $limit);
    }

    function details($id) {
        return schedule_details($id);
    }

    function delete($id) {
        return schedule_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return schedule_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return schedule_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return schedule_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return schedule_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return schedule_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return schedule_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return schedule_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return schedule_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return schedule_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return schedule_is_id($id);
    }

    function is_contact_id($contact_id) {
        return schedule_is_contact_id($contact_id);
    }

    function is_day($day) {
        return schedule_is_day($day);
    }

    function is_am_start($am_start) {
        return schedule_is_am_start($am_start);
    }

    function is_am_end($am_end) {
        return schedule_is_am_end($am_end);
    }

    function is_pm_start($pm_start) {
        return schedule_is_pm_start($pm_start);
    }

    function is_pm_end($pm_end) {
        return schedule_is_pm_end($pm_end);
    }

    function is_order_by($order_by) {
        return schedule_is_order_by($order_by);
    }

    function is_status($status) {
        return schedule_is_status($status);
    }


}
