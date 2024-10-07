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
# Fecha de creacion del documento: 2024-09-18 06:09:37 
#################################################################################
 
        



/**
 * Clase cv_languages
 * 
 * Description
 * 
 * @package cv_languages
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */




class Cv_languages {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * cv_id
    */ 
    public $_cv_id;
    /** 
    * language
    */ 
    public $_language;
    /** 
    * level
    */ 
    public $_level;
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
    function getLanguage () {
        return $this->_language; 
    }
    function getLevel () {
        return $this->_level; 
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
    function setLanguage ($language) {
        $this->_language = $language; 
    }
    function setLevel ($level) {
        $this->_level = $level; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCv_languages($id) {
        $cv_languages = cv_languages_details($id);
        //
        $this->_id = $cv_languages["id"];
        $this->_cv_id = $cv_languages["cv_id"];
        $this->_language = $cv_languages["language"];
        $this->_level = $cv_languages["level"];
        $this->_order_by = $cv_languages["order_by"];
        $this->_status = $cv_languages["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_languages_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_languages_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_languages_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_languages_list($start, $limit);
    }

    function details($id) {
        return cv_languages_details($id);
    }

    function delete($id) {
        return cv_languages_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_languages_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_languages_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_languages_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_languages_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_languages_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_languages_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_languages_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_languages_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_languages_function($col_name, $value);
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
        return cv_languages_is_id($id);
    }

    function is_cv_id($cv_id) {
        return cv_languages_is_cv_id($cv_id);
    }

    function is_language($language) {
        return cv_languages_is_language($language);
    }

    function is_level($level) {
        return cv_languages_is_level($level);
    }

    function is_order_by($order_by) {
        return cv_languages_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_languages_is_status($status);
    }


}
