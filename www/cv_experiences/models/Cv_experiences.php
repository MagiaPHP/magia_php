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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
#################################################################################
 
        



/**
 * Clase cv_experiences
 * 
 * Description
 * 
 * @package cv_experiences
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */




class Cv_experiences {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * cv_id
    */ 
    public $_cv_id;
    /** 
    * role
    */ 
    public $_role;
    /** 
    * company
    */ 
    public $_company;
    /** 
    * employment_type
    */ 
    public $_employment_type;
    /** 
    * start_date
    */ 
    public $_start_date;
    /** 
    * end_date
    */ 
    public $_end_date;
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
    function getCv_id () {
        return $this->_cv_id; 
    }
    function getRole () {
        return $this->_role; 
    }
    function getCompany () {
        return $this->_company; 
    }
    function getEmployment_type () {
        return $this->_employment_type; 
    }
    function getStart_date () {
        return $this->_start_date; 
    }
    function getEnd_date () {
        return $this->_end_date; 
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
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setCv_id ($cv_id) {
        $this->_cv_id = $cv_id; 
    }
    function setRole ($role) {
        $this->_role = $role; 
    }
    function setCompany ($company) {
        $this->_company = $company; 
    }
    function setEmployment_type ($employment_type) {
        $this->_employment_type = $employment_type; 
    }
    function setStart_date ($start_date) {
        $this->_start_date = $start_date; 
    }
    function setEnd_date ($end_date) {
        $this->_end_date = $end_date; 
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
   
    function setCv_experiences($id) {
        $cv_experiences = cv_experiences_details($id);
        //
        $this->_id = $cv_experiences["id"];
        $this->_cv_id = $cv_experiences["cv_id"];
        $this->_role = $cv_experiences["role"];
        $this->_company = $cv_experiences["company"];
        $this->_employment_type = $cv_experiences["employment_type"];
        $this->_start_date = $cv_experiences["start_date"];
        $this->_end_date = $cv_experiences["end_date"];
        $this->_description = $cv_experiences["description"];
        $this->_order_by = $cv_experiences["order_by"];
        $this->_status = $cv_experiences["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_experiences_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_experiences_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_experiences_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_experiences_list($start, $limit);
    }

    function details($id) {
        return cv_experiences_details($id);
    }

    function delete($id) {
        return cv_experiences_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_experiences_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_experiences_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_experiences_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_experiences_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_experiences_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_experiences_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_experiences_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_experiences_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_experiences_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "cv_id":
                return cv_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return cv_experiences_is_id($id);
    }

    function is_cv_id($cv_id) {
        return cv_experiences_is_cv_id($cv_id);
    }

    function is_role($role) {
        return cv_experiences_is_role($role);
    }

    function is_company($company) {
        return cv_experiences_is_company($company);
    }

    function is_employment_type($employment_type) {
        return cv_experiences_is_employment_type($employment_type);
    }

    function is_start_date($start_date) {
        return cv_experiences_is_start_date($start_date);
    }

    function is_end_date($end_date) {
        return cv_experiences_is_end_date($end_date);
    }

    function is_description($description) {
        return cv_experiences_is_description($description);
    }

    function is_order_by($order_by) {
        return cv_experiences_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_experiences_is_status($status);
    }


}
