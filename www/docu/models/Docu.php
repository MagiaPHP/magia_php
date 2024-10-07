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
# Fecha de creacion del documento: 2024-09-22 18:09:01 
#################################################################################
 
        



/**
 * Clase docu
 * 
 * Description
 * 
 * @package docu
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-22
 */




class Docu {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * controllers
    */ 
    public $_controllers;
    /** 
    * action
    */ 
    public $_action;
    /** 
    * language
    */ 
    public $_language;
    /** 
    * father_id
    */ 
    public $_father_id;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * post
    */ 
    public $_post;
    /** 
    * h
    */ 
    public $_h;
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
    function getControllers () {
        return $this->_controllers; 
    }
    function getAction () {
        return $this->_action; 
    }
    function getLanguage () {
        return $this->_language; 
    }
    function getFather_id () {
        return $this->_father_id; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getPost () {
        return $this->_post; 
    }
    function getH () {
        return $this->_h; 
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
    function setControllers ($controllers) {
        $this->_controllers = $controllers; 
    }
    function setAction ($action) {
        $this->_action = $action; 
    }
    function setLanguage ($language) {
        $this->_language = $language; 
    }
    function setFather_id ($father_id) {
        $this->_father_id = $father_id; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setPost ($post) {
        $this->_post = $post; 
    }
    function setH ($h) {
        $this->_h = $h; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDocu($id) {
        $docu = docu_details($id);
        //
        $this->_id = $docu["id"];
        $this->_controllers = $docu["controllers"];
        $this->_action = $docu["action"];
        $this->_language = $docu["language"];
        $this->_father_id = $docu["father_id"];
        $this->_title = $docu["title"];
        $this->_post = $docu["post"];
        $this->_h = $docu["h"];
        $this->_order_by = $docu["order_by"];
        $this->_status = $docu["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return docu_field_id($field, $id);
    }

    function field_code($field, $code) {
        return docu_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return docu_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return docu_list($start, $limit);
    }

    function details($id) {
        return docu_details($id);
    }

    function delete($id) {
        return docu_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return docu_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return docu_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return docu_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return docu_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return docu_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return docu_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return docu_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return docu_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return docu_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "father_id":
                return docu_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return docu_is_id($id);
    }

    function is_controllers($controllers) {
        return docu_is_controllers($controllers);
    }

    function is_action($action) {
        return docu_is_action($action);
    }

    function is_language($language) {
        return docu_is_language($language);
    }

    function is_father_id($father_id) {
        return docu_is_father_id($father_id);
    }

    function is_title($title) {
        return docu_is_title($title);
    }

    function is_post($post) {
        return docu_is_post($post);
    }

    function is_h($h) {
        return docu_is_h($h);
    }

    function is_order_by($order_by) {
        return docu_is_order_by($order_by);
    }

    function is_status($status) {
        return docu_is_status($status);
    }


}
