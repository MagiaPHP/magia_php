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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
#################################################################################
 
        



/**
 * Clase messages
 * 
 * Description
 * 
 * @package messages
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-26
 */




class Messages {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * message
    */ 
    public $_message;
    /** 
    * url_action
    */ 
    public $_url_action;
    /** 
    * url_label
    */ 
    public $_url_label;
    /** 
    * controller
    */ 
    public $_controller;
    /** 
    * doc_id
    */ 
    public $_doc_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * rol
    */ 
    public $_rol;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * date_registre
    */ 
    public $_date_registre;
    /** 
    * read_by
    */ 
    public $_read_by;
    /** 
    * is_logued
    */ 
    public $_is_logued;
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
    function getType () {
        return $this->_type; 
    }
    function getMessage () {
        return $this->_message; 
    }
    function getUrl_action () {
        return $this->_url_action; 
    }
    function getUrl_label () {
        return $this->_url_label; 
    }
    function getController () {
        return $this->_controller; 
    }
    function getDoc_id () {
        return $this->_doc_id; 
    }
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getRol () {
        return $this->_rol; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
    }
    function getRead_by () {
        return $this->_read_by; 
    }
    function getIs_logued () {
        return $this->_is_logued; 
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
    function setType ($type) {
        $this->_type = $type; 
    }
    function setMessage ($message) {
        $this->_message = $message; 
    }
    function setUrl_action ($url_action) {
        $this->_url_action = $url_action; 
    }
    function setUrl_label ($url_label) {
        $this->_url_label = $url_label; 
    }
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setDoc_id ($doc_id) {
        $this->_doc_id = $doc_id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setRol ($rol) {
        $this->_rol = $rol; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setRead_by ($read_by) {
        $this->_read_by = $read_by; 
    }
    function setIs_logued ($is_logued) {
        $this->_is_logued = $is_logued; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setMessages($id) {
        $messages = messages_details($id);
        //
        $this->_id = $messages["id"];
        $this->_type = $messages["type"];
        $this->_message = $messages["message"];
        $this->_url_action = $messages["url_action"];
        $this->_url_label = $messages["url_label"];
        $this->_controller = $messages["controller"];
        $this->_doc_id = $messages["doc_id"];
        $this->_contact_id = $messages["contact_id"];
        $this->_rol = $messages["rol"];
        $this->_date_start = $messages["date_start"];
        $this->_date_end = $messages["date_end"];
        $this->_date_registre = $messages["date_registre"];
        $this->_read_by = $messages["read_by"];
        $this->_is_logued = $messages["is_logued"];
        $this->_order_by = $messages["order_by"];
        $this->_status = $messages["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return messages_field_id($field, $id);
    }

    function field_code($field, $code) {
        return messages_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return messages_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return messages_list($start, $limit);
    }

    function details($id) {
        return messages_details($id);
    }

    function delete($id) {
        return messages_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return messages_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return messages_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return messages_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return messages_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return messages_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return messages_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return messages_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return messages_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return messages_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return messages_is_id($id);
    }

    function is_type($type) {
        return messages_is_type($type);
    }

    function is_message($message) {
        return messages_is_message($message);
    }

    function is_url_action($url_action) {
        return messages_is_url_action($url_action);
    }

    function is_url_label($url_label) {
        return messages_is_url_label($url_label);
    }

    function is_controller($controller) {
        return messages_is_controller($controller);
    }

    function is_doc_id($doc_id) {
        return messages_is_doc_id($doc_id);
    }

    function is_contact_id($contact_id) {
        return messages_is_contact_id($contact_id);
    }

    function is_rol($rol) {
        return messages_is_rol($rol);
    }

    function is_date_start($date_start) {
        return messages_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return messages_is_date_end($date_end);
    }

    function is_date_registre($date_registre) {
        return messages_is_date_registre($date_registre);
    }

    function is_read_by($read_by) {
        return messages_is_read_by($read_by);
    }

    function is_is_logued($is_logued) {
        return messages_is_is_logued($is_logued);
    }

    function is_order_by($order_by) {
        return messages_is_order_by($order_by);
    }

    function is_status($status) {
        return messages_is_status($status);
    }


}
