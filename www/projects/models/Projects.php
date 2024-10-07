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
# Fecha de creacion del documento: 2024-09-27 11:09:56 
#################################################################################
 
        



/**
 * Clase projects
 * 
 * Description
 * 
 * @package projects
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-27
 */




class Projects {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * address
    */ 
    public $_address;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * code
    */ 
    public $_code;
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
    function getName () {
        return $this->_name; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getAddress () {
        return $this->_address; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getCode () {
        return $this->_code; 
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
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setAddress ($address) {
        $this->_address = $address; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setProjects($id) {
        $projects = projects_details($id);
        //
        $this->_id = $projects["id"];
        $this->_contact_id = $projects["contact_id"];
        $this->_name = $projects["name"];
        $this->_description = $projects["description"];
        $this->_address = $projects["address"];
        $this->_date_start = $projects["date_start"];
        $this->_date_end = $projects["date_end"];
        $this->_code = $projects["code"];
        $this->_order_by = $projects["order_by"];
        $this->_status = $projects["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return projects_field_id($field, $id);
    }

    function field_code($field, $code) {
        return projects_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return projects_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return projects_list($start, $limit);
    }

    function details($id) {
        return projects_details($id);
    }

    function delete($id) {
        return projects_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return projects_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return projects_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return projects_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return projects_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return projects_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return projects_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return projects_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return projects_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return projects_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "contact_id":
                return contacts_field_id("id", $value);
                break;
                case "status":
                return projects_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return projects_is_id($id);
    }

    function is_contact_id($contact_id) {
        return projects_is_contact_id($contact_id);
    }

    function is_name($name) {
        return projects_is_name($name);
    }

    function is_description($description) {
        return projects_is_description($description);
    }

    function is_address($address) {
        return projects_is_address($address);
    }

    function is_date_start($date_start) {
        return projects_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return projects_is_date_end($date_end);
    }

    function is_code($code) {
        return projects_is_code($code);
    }

    function is_order_by($order_by) {
        return projects_is_order_by($order_by);
    }

    function is_status($status) {
        return projects_is_status($status);
    }


}
