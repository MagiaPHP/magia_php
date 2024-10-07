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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
#################################################################################
 
        



/**
 * Clase chat
 * 
 * Description
 * 
 * @package chat
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Chat {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * order_id
    */ 
    public $_order_id;
    /** 
    * message
    */ 
    public $_message;
    /** 
    * user
    */ 
    public $_user;
   

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
    function getOrder_id () {
        return $this->_order_id; 
    }
    function getMessage () {
        return $this->_message; 
    }
    function getUser () {
        return $this->_user; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setOrder_id ($order_id) {
        $this->_order_id = $order_id; 
    }
    function setMessage ($message) {
        $this->_message = $message; 
    }
    function setUser ($user) {
        $this->_user = $user; 
    }
   
    function setChat($id) {
        $chat = chat_details($id);
        //
        $this->_id = $chat["id"];
        $this->_contact_id = $chat["contact_id"];
        $this->_order_id = $chat["order_id"];
        $this->_message = $chat["message"];
        $this->_user = $chat["user"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return chat_field_id($field, $id);
    }

    function field_code($field, $code) {
        return chat_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return chat_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return chat_list($start, $limit);
    }

    function details($id) {
        return chat_details($id);
    }

    function delete($id) {
        return chat_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return chat_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return chat_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return chat_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return chat_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return chat_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return chat_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return chat_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return chat_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return chat_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "contact_id":
                return users_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return chat_is_id($id);
    }

    function is_contact_id($contact_id) {
        return chat_is_contact_id($contact_id);
    }

    function is_order_id($order_id) {
        return chat_is_order_id($order_id);
    }

    function is_message($message) {
        return chat_is_message($message);
    }

    function is_user($user) {
        return chat_is_user($user);
    }


}
