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
# Fecha de creacion del documento: 2024-09-18 06:09:28 
#################################################################################
 
        



/**
 * Clase cv_education
 * 
 * Description
 * 
 * @package cv_education
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */




class Cv_education {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * cv_id
    */ 
    public $_cv_id;
    /** 
    * program
    */ 
    public $_program;
    /** 
    * institution
    */ 
    public $_institution;
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
    function getProgram () {
        return $this->_program; 
    }
    function getInstitution () {
        return $this->_institution; 
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
    function setProgram ($program) {
        $this->_program = $program; 
    }
    function setInstitution ($institution) {
        $this->_institution = $institution; 
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
   
    function setCv_education($id) {
        $cv_education = cv_education_details($id);
        //
        $this->_id = $cv_education["id"];
        $this->_cv_id = $cv_education["cv_id"];
        $this->_program = $cv_education["program"];
        $this->_institution = $cv_education["institution"];
        $this->_start_date = $cv_education["start_date"];
        $this->_end_date = $cv_education["end_date"];
        $this->_description = $cv_education["description"];
        $this->_order_by = $cv_education["order_by"];
        $this->_status = $cv_education["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_education_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_education_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_education_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_education_list($start, $limit);
    }

    function details($id) {
        return cv_education_details($id);
    }

    function delete($id) {
        return cv_education_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_education_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_education_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_education_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_education_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_education_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_education_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_education_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_education_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_education_function($col_name, $value);
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
        return cv_education_is_id($id);
    }

    function is_cv_id($cv_id) {
        return cv_education_is_cv_id($cv_id);
    }

    function is_program($program) {
        return cv_education_is_program($program);
    }

    function is_institution($institution) {
        return cv_education_is_institution($institution);
    }

    function is_start_date($start_date) {
        return cv_education_is_start_date($start_date);
    }

    function is_end_date($end_date) {
        return cv_education_is_end_date($end_date);
    }

    function is_description($description) {
        return cv_education_is_description($description);
    }

    function is_order_by($order_by) {
        return cv_education_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_education_is_status($status);
    }


}
