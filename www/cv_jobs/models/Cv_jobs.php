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
# Fecha de creacion del documento: 2024-09-23 19:09:40 
#################################################################################
 
        



/**
 * Clase cv_jobs
 * 
 * Description
 * 
 * @package cv_jobs
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-23
 */




class Cv_jobs {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * job_title
    */ 
    public $_job_title;
    /** 
    * reference_number
    */ 
    public $_reference_number;
    /** 
    * creation_date
    */ 
    public $_creation_date;
    /** 
    * company_name
    */ 
    public $_company_name;
    /** 
    * location
    */ 
    public $_location;
    /** 
    * ciudad
    */ 
    public $_ciudad;
    /** 
    * working_hours
    */ 
    public $_working_hours;
    /** 
    * contract_type
    */ 
    public $_contract_type;
    /** 
    * job_family
    */ 
    public $_job_family;
    /** 
    * job_description
    */ 
    public $_job_description;
    /** 
    * profile
    */ 
    public $_profile;
    /** 
    * language_requirements
    */ 
    public $_language_requirements;
    /** 
    * employer_name
    */ 
    public $_employer_name;
    /** 
    * contact_person
    */ 
    public $_contact_person;
    /** 
    * application_mode
    */ 
    public $_application_mode;
    /** 
    * website_url
    */ 
    public $_website_url;
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
    function getJob_title () {
        return $this->_job_title; 
    }
    function getReference_number () {
        return $this->_reference_number; 
    }
    function getCreation_date () {
        return $this->_creation_date; 
    }
    function getCompany_name () {
        return $this->_company_name; 
    }
    function getLocation () {
        return $this->_location; 
    }
    function getCiudad () {
        return $this->_ciudad; 
    }
    function getWorking_hours () {
        return $this->_working_hours; 
    }
    function getContract_type () {
        return $this->_contract_type; 
    }
    function getJob_family () {
        return $this->_job_family; 
    }
    function getJob_description () {
        return $this->_job_description; 
    }
    function getProfile () {
        return $this->_profile; 
    }
    function getLanguage_requirements () {
        return $this->_language_requirements; 
    }
    function getEmployer_name () {
        return $this->_employer_name; 
    }
    function getContact_person () {
        return $this->_contact_person; 
    }
    function getApplication_mode () {
        return $this->_application_mode; 
    }
    function getWebsite_url () {
        return $this->_website_url; 
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
    function setJob_title ($job_title) {
        $this->_job_title = $job_title; 
    }
    function setReference_number ($reference_number) {
        $this->_reference_number = $reference_number; 
    }
    function setCreation_date ($creation_date) {
        $this->_creation_date = $creation_date; 
    }
    function setCompany_name ($company_name) {
        $this->_company_name = $company_name; 
    }
    function setLocation ($location) {
        $this->_location = $location; 
    }
    function setCiudad ($ciudad) {
        $this->_ciudad = $ciudad; 
    }
    function setWorking_hours ($working_hours) {
        $this->_working_hours = $working_hours; 
    }
    function setContract_type ($contract_type) {
        $this->_contract_type = $contract_type; 
    }
    function setJob_family ($job_family) {
        $this->_job_family = $job_family; 
    }
    function setJob_description ($job_description) {
        $this->_job_description = $job_description; 
    }
    function setProfile ($profile) {
        $this->_profile = $profile; 
    }
    function setLanguage_requirements ($language_requirements) {
        $this->_language_requirements = $language_requirements; 
    }
    function setEmployer_name ($employer_name) {
        $this->_employer_name = $employer_name; 
    }
    function setContact_person ($contact_person) {
        $this->_contact_person = $contact_person; 
    }
    function setApplication_mode ($application_mode) {
        $this->_application_mode = $application_mode; 
    }
    function setWebsite_url ($website_url) {
        $this->_website_url = $website_url; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCv_jobs($id) {
        $cv_jobs = cv_jobs_details($id);
        //
        $this->_id = $cv_jobs["id"];
        $this->_job_title = $cv_jobs["job_title"];
        $this->_reference_number = $cv_jobs["reference_number"];
        $this->_creation_date = $cv_jobs["creation_date"];
        $this->_company_name = $cv_jobs["company_name"];
        $this->_location = $cv_jobs["location"];
        $this->_ciudad = $cv_jobs["ciudad"];
        $this->_working_hours = $cv_jobs["working_hours"];
        $this->_contract_type = $cv_jobs["contract_type"];
        $this->_job_family = $cv_jobs["job_family"];
        $this->_job_description = $cv_jobs["job_description"];
        $this->_profile = $cv_jobs["profile"];
        $this->_language_requirements = $cv_jobs["language_requirements"];
        $this->_employer_name = $cv_jobs["employer_name"];
        $this->_contact_person = $cv_jobs["contact_person"];
        $this->_application_mode = $cv_jobs["application_mode"];
        $this->_website_url = $cv_jobs["website_url"];
        $this->_order_by = $cv_jobs["order_by"];
        $this->_status = $cv_jobs["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_jobs_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_jobs_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_jobs_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_jobs_list($start, $limit);
    }

    function details($id) {
        return cv_jobs_details($id);
    }

    function delete($id) {
        return cv_jobs_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_jobs_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_jobs_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_jobs_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_jobs_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_jobs_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_jobs_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_jobs_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_jobs_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_jobs_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return cv_jobs_is_id($id);
    }

    function is_job_title($job_title) {
        return cv_jobs_is_job_title($job_title);
    }

    function is_reference_number($reference_number) {
        return cv_jobs_is_reference_number($reference_number);
    }

    function is_creation_date($creation_date) {
        return cv_jobs_is_creation_date($creation_date);
    }

    function is_company_name($company_name) {
        return cv_jobs_is_company_name($company_name);
    }

    function is_location($location) {
        return cv_jobs_is_location($location);
    }

    function is_ciudad($ciudad) {
        return cv_jobs_is_ciudad($ciudad);
    }

    function is_working_hours($working_hours) {
        return cv_jobs_is_working_hours($working_hours);
    }

    function is_contract_type($contract_type) {
        return cv_jobs_is_contract_type($contract_type);
    }

    function is_job_family($job_family) {
        return cv_jobs_is_job_family($job_family);
    }

    function is_job_description($job_description) {
        return cv_jobs_is_job_description($job_description);
    }

    function is_profile($profile) {
        return cv_jobs_is_profile($profile);
    }

    function is_language_requirements($language_requirements) {
        return cv_jobs_is_language_requirements($language_requirements);
    }

    function is_employer_name($employer_name) {
        return cv_jobs_is_employer_name($employer_name);
    }

    function is_contact_person($contact_person) {
        return cv_jobs_is_contact_person($contact_person);
    }

    function is_application_mode($application_mode) {
        return cv_jobs_is_application_mode($application_mode);
    }

    function is_website_url($website_url) {
        return cv_jobs_is_website_url($website_url);
    }

    function is_order_by($order_by) {
        return cv_jobs_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_jobs_is_status($status);
    }


}
