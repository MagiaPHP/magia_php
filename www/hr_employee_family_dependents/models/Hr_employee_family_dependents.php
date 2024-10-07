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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################
 
        



/**
 * Clase hr_employee_family_dependents
 * 
 * Description
 * 
 * @package hr_employee_family_dependents
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_family_dependents {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * lastname
    */ 
    public $_lastname;
    /** 
    * birthday
    */ 
    public $_birthday;
    /** 
    * relation
    */ 
    public $_relation;
    /** 
    * in_charge
    */ 
    public $_in_charge;
    /** 
    * handicap
    */ 
    public $_handicap;
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
    function getName () {
        return $this->_name; 
    }
    function getLastname () {
        return $this->_lastname; 
    }
    function getBirthday () {
        return $this->_birthday; 
    }
    function getRelation () {
        return $this->_relation; 
    }
    function getIn_charge () {
        return $this->_in_charge; 
    }
    function getHandicap () {
        return $this->_handicap; 
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
    function setName ($name) {
        $this->_name = $name; 
    }
    function setLastname ($lastname) {
        $this->_lastname = $lastname; 
    }
    function setBirthday ($birthday) {
        $this->_birthday = $birthday; 
    }
    function setRelation ($relation) {
        $this->_relation = $relation; 
    }
    function setIn_charge ($in_charge) {
        $this->_in_charge = $in_charge; 
    }
    function setHandicap ($handicap) {
        $this->_handicap = $handicap; 
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
   
    function setHr_employee_family_dependents($id) {
        $hr_employee_family_dependents = hr_employee_family_dependents_details($id);
        //
        $this->_id = $hr_employee_family_dependents["id"];
        $this->_employee_id = $hr_employee_family_dependents["employee_id"];
        $this->_name = $hr_employee_family_dependents["name"];
        $this->_lastname = $hr_employee_family_dependents["lastname"];
        $this->_birthday = $hr_employee_family_dependents["birthday"];
        $this->_relation = $hr_employee_family_dependents["relation"];
        $this->_in_charge = $hr_employee_family_dependents["in_charge"];
        $this->_handicap = $hr_employee_family_dependents["handicap"];
        $this->_notes = $hr_employee_family_dependents["notes"];
        $this->_order_by = $hr_employee_family_dependents["order_by"];
        $this->_status = $hr_employee_family_dependents["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_family_dependents_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_family_dependents_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_family_dependents_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_family_dependents_list($start, $limit);
    }

    function details($id) {
        return hr_employee_family_dependents_details($id);
    }

    function delete($id) {
        return hr_employee_family_dependents_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_family_dependents_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_family_dependents_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_family_dependents_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_family_dependents_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_family_dependents_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_family_dependents_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_family_dependents_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_family_dependents_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_family_dependents_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_family_dependents_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_family_dependents_is_employee_id($employee_id);
    }

    function is_name($name) {
        return hr_employee_family_dependents_is_name($name);
    }

    function is_lastname($lastname) {
        return hr_employee_family_dependents_is_lastname($lastname);
    }

    function is_birthday($birthday) {
        return hr_employee_family_dependents_is_birthday($birthday);
    }

    function is_relation($relation) {
        return hr_employee_family_dependents_is_relation($relation);
    }

    function is_in_charge($in_charge) {
        return hr_employee_family_dependents_is_in_charge($in_charge);
    }

    function is_handicap($handicap) {
        return hr_employee_family_dependents_is_handicap($handicap);
    }

    function is_notes($notes) {
        return hr_employee_family_dependents_is_notes($notes);
    }

    function is_order_by($order_by) {
        return hr_employee_family_dependents_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_family_dependents_is_status($status);
    }


}
