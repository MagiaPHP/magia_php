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
# Fecha de creacion del documento: 2024-09-18 07:09:41 
#################################################################################

/**
 * Clase cv
 * 
 * Description
 * 
 * @package cv
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */
class Cv {

    /**
     * id
     */
    public $_id;

    /**
     * first_name
     */
    public $_first_name;

    /**
     * last_name
     */
    public $_last_name;

    /**
     * address
     */
    public $_address;

    /**
     * city
     */
    public $_city;

    /**
     * postal_code
     */
    public $_postal_code;

    /**
     * phone_number
     */
    public $_phone_number;

    /**
     * email
     */
    public $_email;

    /**
     * driver_license
     */
    public $_driver_license;

    /**
     * birth_date
     */
    public $_birth_date;

    /**
     * availability
     */
    public $_availability;

    /**
     * professional_goal
     */
    public $_professional_goal;

    /**
     * summary
     */
    public $_summary;

    /**
     * hobbies
     */
    public $_hobbies;

    /**
     * created_at
     */
    public $_created_at;

    /**
     * work_experience
     */
    public $_work_experience;

    /**
     * education
     */
    public $_education;

    /**
     * technologies
     */
    public $_technologies;

    /**
     * skills
     */
    public $_skills;

    /**
     * projects
     */
    public $_projects;

    /**
     * languages
     */
    public $_languages;

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

    function getId() {
        return $this->_id;
    }

    function getFirst_name() {
        return $this->_first_name;
    }

    function getLast_name() {
        return $this->_last_name;
    }

    function getAddress() {
        return $this->_address;
    }

    function getCity() {
        return $this->_city;
    }

    function getPostal_code() {
        return $this->_postal_code;
    }

    function getPhone_number() {
        return $this->_phone_number;
    }

    function getEmail() {
        return $this->_email;
    }

    function getDriver_license() {
        return $this->_driver_license;
    }

    function getBirth_date() {
        return $this->_birth_date;
    }

    function getAvailability() {
        return $this->_availability;
    }

    function getProfessional_goal() {
        return $this->_professional_goal;
    }

    function getSummary() {
        return $this->_summary;
    }

    function getHobbies() {
        return $this->_hobbies;
    }

    function getCreated_at() {
        return $this->_created_at;
    }

    function getWork_experience() {
        return $this->_work_experience;
    }

    function getEducation() {
        return $this->_education;
    }

    function getTechnologies() {
        return $this->_technologies;
    }

    function getSkills() {
        return $this->_skills;
    }

    function getProjects() {
        return $this->_projects;
    }

    function getLanguages() {
        return $this->_languages;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

#################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setFirst_name($first_name) {
        $this->_first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->_last_name = $last_name;
    }

    function setAddress($address) {
        $this->_address = $address;
    }

    function setCity($city) {
        $this->_city = $city;
    }

    function setPostal_code($postal_code) {
        $this->_postal_code = $postal_code;
    }

    function setPhone_number($phone_number) {
        $this->_phone_number = $phone_number;
    }

    function setEmail($email) {
        $this->_email = $email;
    }

    function setDriver_license($driver_license) {
        $this->_driver_license = $driver_license;
    }

    function setBirth_date($birth_date) {
        $this->_birth_date = $birth_date;
    }

    function setAvailability($availability) {
        $this->_availability = $availability;
    }

    function setProfessional_goal($professional_goal) {
        $this->_professional_goal = $professional_goal;
    }

    function setSummary($summary) {
        $this->_summary = $summary;
    }

    function setHobbies($hobbies) {
        $this->_hobbies = $hobbies;
    }

    function setCreated_at($created_at) {
        $this->_created_at = $created_at;
    }

    function setWork_experience($work_experience) {
        $this->_work_experience = $work_experience;
    }

    function setEducation($education) {
        $this->_education = $education;
    }

    function setTechnologies($technologies) {
        $this->_technologies = $technologies;
    }

    function setSkills($skills) {
        $this->_skills = $skills;
    }

    function setProjects($projects) {
        $this->_projects = $projects;
    }

    function setLanguages($languages) {
        $this->_languages = $languages;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setCv($id) {
        $cv = cv_details($id);
        //
        $this->_id = $cv["id"];
        $this->_first_name = $cv["first_name"];
        $this->_last_name = $cv["last_name"];
        $this->_address = $cv["address"];
        $this->_city = $cv["city"];
        $this->_postal_code = $cv["postal_code"];
        $this->_phone_number = $cv["phone_number"];
        $this->_email = $cv["email"];
        $this->_driver_license = $cv["driver_license"];
        $this->_birth_date = $cv["birth_date"];
        $this->_availability = $cv["availability"];
        $this->_professional_goal = $cv["professional_goal"];
        $this->_summary = $cv["summary"];
        $this->_hobbies = $cv["hobbies"];
        $this->_created_at = $cv["created_at"];
        $this->_work_experience = $cv["work_experience"];
        $this->_education = $cv["education"];
        $this->_technologies = $cv["technologies"];
        $this->_skills = $cv["skills"];
        $this->_projects = $cv["projects"];
        $this->_languages = $cv["languages"];
        $this->_order_by = $cv["order_by"];
        $this->_status = $cv["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_list($start, $limit);
    }

    function details($id) {
        return cv_details($id);
    }

    function delete($id) {
        return cv_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return cv_is_id($id);
    }

    function is_first_name($first_name) {
        return cv_is_first_name($first_name);
    }

    function is_last_name($last_name) {
        return cv_is_last_name($last_name);
    }

    function is_address($address) {
        return cv_is_address($address);
    }

    function is_city($city) {
        return cv_is_city($city);
    }

    function is_postal_code($postal_code) {
        return cv_is_postal_code($postal_code);
    }

    function is_phone_number($phone_number) {
        return cv_is_phone_number($phone_number);
    }

    function is_email($email) {
        return cv_is_email($email);
    }

    function is_driver_license($driver_license) {
        return cv_is_driver_license($driver_license);
    }

    function is_birth_date($birth_date) {
        return cv_is_birth_date($birth_date);
    }

    function is_availability($availability) {
        return cv_is_availability($availability);
    }

    function is_professional_goal($professional_goal) {
        return cv_is_professional_goal($professional_goal);
    }

    function is_summary($summary) {
        return cv_is_summary($summary);
    }

    function is_hobbies($hobbies) {
        return cv_is_hobbies($hobbies);
    }

    function is_created_at($created_at) {
        return cv_is_created_at($created_at);
    }

    function is_work_experience($work_experience) {
        return cv_is_work_experience($work_experience);
    }

    function is_education($education) {
        return cv_is_education($education);
    }

    function is_technologies($technologies) {
        return cv_is_technologies($technologies);
    }

    function is_skills($skills) {
        return cv_is_skills($skills);
    }

    function is_projects($projects) {
        return cv_is_projects($projects);
    }

    function is_languages($languages) {
        return cv_is_languages($languages);
    }

    function is_order_by($order_by) {
        return cv_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_is_status($status);
    }
}
