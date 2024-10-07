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
# Fecha de creacion del documento: 2024-09-18 06:09:39 
#################################################################################
 
        



/**
 * Clase cv_skills
 * 
 * Description
 * 
 * @package cv_skills
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */




class Cv_skills {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * cv_id
    */ 
    public $_cv_id;
    /** 
    * skill_name
    */ 
    public $_skill_name;
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
    function getSkill_name () {
        return $this->_skill_name; 
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
    function setSkill_name ($skill_name) {
        $this->_skill_name = $skill_name; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCv_skills($id) {
        $cv_skills = cv_skills_details($id);
        //
        $this->_id = $cv_skills["id"];
        $this->_cv_id = $cv_skills["cv_id"];
        $this->_skill_name = $cv_skills["skill_name"];
        $this->_order_by = $cv_skills["order_by"];
        $this->_status = $cv_skills["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_skills_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_skills_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_skills_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_skills_list($start, $limit);
    }

    function details($id) {
        return cv_skills_details($id);
    }

    function delete($id) {
        return cv_skills_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_skills_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_skills_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_skills_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_skills_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_skills_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_skills_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_skills_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_skills_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_skills_function($col_name, $value);
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
        return cv_skills_is_id($id);
    }

    function is_cv_id($cv_id) {
        return cv_skills_is_cv_id($cv_id);
    }

    function is_skill_name($skill_name) {
        return cv_skills_is_skill_name($skill_name);
    }

    function is_order_by($order_by) {
        return cv_skills_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_skills_is_status($status);
    }


}
