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
# Fecha de creacion del documento: 2024-09-04 08:09:40 
#################################################################################
 
        



/**
 * Clase cpanel
 * 
 * Description
 * 
 * @package cpanel
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Cpanel {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * contact_id
    */ 
    private $_contact_id;
    /** 
    * domain
    */ 
    private $_domain;
    /** 
    * subdomain
    */ 
    private $_subdomain;
    /** 
    * db
    */ 
    private $_db;
    /** 
    * user_db
    */ 
    private $_user_db;
    /** 
    * user_db_pass
    */ 
    private $_user_db_pass;
    /** 
    * email
    */ 
    private $_email;
    /** 
    * order_by
    */ 
    private $_order_by;
    /** 
    * status
    */ 
    private $_status;
   

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
    function getDomain () {
        return $this->_domain; 
    }
    function getSubdomain () {
        return $this->_subdomain; 
    }
    function getDb () {
        return $this->_db; 
    }
    function getUser_db () {
        return $this->_user_db; 
    }
    function getUser_db_pass () {
        return $this->_user_db_pass; 
    }
    function getEmail () {
        return $this->_email; 
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
    function setDomain ($domain) {
        $this->_domain = $domain; 
    }
    function setSubdomain ($subdomain) {
        $this->_subdomain = $subdomain; 
    }
    function setDb ($db) {
        $this->_db = $db; 
    }
    function setUser_db ($user_db) {
        $this->_user_db = $user_db; 
    }
    function setUser_db_pass ($user_db_pass) {
        $this->_user_db_pass = $user_db_pass; 
    }
    function setEmail ($email) {
        $this->_email = $email; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCpanel($id) {
        $cpanel = cpanel_details($id);
        //
        $this->_id = $cpanel["id"];
        $this->_contact_id = $cpanel["contact_id"];
        $this->_domain = $cpanel["domain"];
        $this->_subdomain = $cpanel["subdomain"];
        $this->_db = $cpanel["db"];
        $this->_user_db = $cpanel["user_db"];
        $this->_user_db_pass = $cpanel["user_db_pass"];
        $this->_email = $cpanel["email"];
        $this->_order_by = $cpanel["order_by"];
        $this->_status = $cpanel["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cpanel_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cpanel_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cpanel_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cpanel_list($start, $limit);
    }

    function details($id) {
        return cpanel_details($id);
    }

    function delete($id) {
        return cpanel_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cpanel_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cpanel_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cpanel_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cpanel_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cpanel_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cpanel_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cpanel_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cpanel_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cpanel_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return cpanel_is_id($id);
    }

    function is_contact_id($contact_id) {
        return cpanel_is_contact_id($contact_id);
    }

    function is_domain($domain) {
        return cpanel_is_domain($domain);
    }

    function is_subdomain($subdomain) {
        return cpanel_is_subdomain($subdomain);
    }

    function is_db($db) {
        return cpanel_is_db($db);
    }

    function is_user_db($user_db) {
        return cpanel_is_user_db($user_db);
    }

    function is_user_db_pass($user_db_pass) {
        return cpanel_is_user_db_pass($user_db_pass);
    }

    function is_email($email) {
        return cpanel_is_email($email);
    }

    function is_order_by($order_by) {
        return cpanel_is_order_by($order_by);
    }

    function is_status($status) {
        return cpanel_is_status($status);
    }


}
