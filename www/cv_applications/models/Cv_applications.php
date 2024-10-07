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
# Fecha de creacion del documento: 2024-09-18 12:09:00 
#################################################################################
 
        



/**
 * Clase cv_applications
 * 
 * Description
 * 
 * @package cv_applications
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */




class Cv_applications {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * job_id
    */ 
    public $_job_id;
    /** 
    * applicant_name
    */ 
    public $_applicant_name;
    /** 
    * applicant_email
    */ 
    public $_applicant_email;
    /** 
    * application_date
    */ 
    public $_application_date;
    /** 
    * resume
    */ 
    public $_resume;
    /** 
    * cover_letter
    */ 
    public $_cover_letter;
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
    function getJob_id () {
        return $this->_job_id; 
    }
    function getApplicant_name () {
        return $this->_applicant_name; 
    }
    function getApplicant_email () {
        return $this->_applicant_email; 
    }
    function getApplication_date () {
        return $this->_application_date; 
    }
    function getResume () {
        return $this->_resume; 
    }
    function getCover_letter () {
        return $this->_cover_letter; 
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
    function setJob_id ($job_id) {
        $this->_job_id = $job_id; 
    }
    function setApplicant_name ($applicant_name) {
        $this->_applicant_name = $applicant_name; 
    }
    function setApplicant_email ($applicant_email) {
        $this->_applicant_email = $applicant_email; 
    }
    function setApplication_date ($application_date) {
        $this->_application_date = $application_date; 
    }
    function setResume ($resume) {
        $this->_resume = $resume; 
    }
    function setCover_letter ($cover_letter) {
        $this->_cover_letter = $cover_letter; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCv_applications($id) {
        $cv_applications = cv_applications_details($id);
        //
        $this->_id = $cv_applications["id"];
        $this->_job_id = $cv_applications["job_id"];
        $this->_applicant_name = $cv_applications["applicant_name"];
        $this->_applicant_email = $cv_applications["applicant_email"];
        $this->_application_date = $cv_applications["application_date"];
        $this->_resume = $cv_applications["resume"];
        $this->_cover_letter = $cv_applications["cover_letter"];
        $this->_order_by = $cv_applications["order_by"];
        $this->_status = $cv_applications["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_applications_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_applications_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_applications_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_applications_list($start, $limit);
    }

    function details($id) {
        return cv_applications_details($id);
    }

    function delete($id) {
        return cv_applications_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_applications_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_applications_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_applications_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_applications_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_applications_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_applications_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_applications_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_applications_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_applications_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "job_id":
                return cv_jobs_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return cv_applications_is_id($id);
    }

    function is_job_id($job_id) {
        return cv_applications_is_job_id($job_id);
    }

    function is_applicant_name($applicant_name) {
        return cv_applications_is_applicant_name($applicant_name);
    }

    function is_applicant_email($applicant_email) {
        return cv_applications_is_applicant_email($applicant_email);
    }

    function is_application_date($application_date) {
        return cv_applications_is_application_date($application_date);
    }

    function is_resume($resume) {
        return cv_applications_is_resume($resume);
    }

    function is_cover_letter($cover_letter) {
        return cv_applications_is_cover_letter($cover_letter);
    }

    function is_order_by($order_by) {
        return cv_applications_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_applications_is_status($status);
    }


}
