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
# Fecha de creacion del documento: 2024-09-04 08:09:38 
#################################################################################
 
        



/**
 * Clase emails_tmp
 * 
 * Description
 * 
 * @package emails_tmp
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Emails_tmp {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * contact_id
    */ 
    private $_contact_id;
    /** 
    * controller
    */ 
    private $_controller;
    /** 
    * tmp
    */ 
    private $_tmp;
    /** 
    * body
    */ 
    private $_body;
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
    function getController () {
        return $this->_controller; 
    }
    function getTmp () {
        return $this->_tmp; 
    }
    function getBody () {
        return $this->_body; 
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
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setTmp ($tmp) {
        $this->_tmp = $tmp; 
    }
    function setBody ($body) {
        $this->_body = $body; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setEmails_tmp($id) {
        $emails_tmp = emails_tmp_details($id);
        //
        $this->_id = $emails_tmp["id"];
        $this->_contact_id = $emails_tmp["contact_id"];
        $this->_controller = $emails_tmp["controller"];
        $this->_tmp = $emails_tmp["tmp"];
        $this->_body = $emails_tmp["body"];
        $this->_order_by = $emails_tmp["order_by"];
        $this->_status = $emails_tmp["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return emails_tmp_field_id($field, $id);
    }

    function field_code($field, $code) {
        return emails_tmp_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return emails_tmp_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return emails_tmp_list($start, $limit);
    }

    function details($id) {
        return emails_tmp_details($id);
    }

    function delete($id) {
        return emails_tmp_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return emails_tmp_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return emails_tmp_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return emails_tmp_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return emails_tmp_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return emails_tmp_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return emails_tmp_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return emails_tmp_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return emails_tmp_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return emails_tmp_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "controller":
                return controllers_field_id("controller", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return emails_tmp_is_id($id);
    }

    function is_contact_id($contact_id) {
        return emails_tmp_is_contact_id($contact_id);
    }

    function is_controller($controller) {
        return emails_tmp_is_controller($controller);
    }

    function is_tmp($tmp) {
        return emails_tmp_is_tmp($tmp);
    }

    function is_body($body) {
        return emails_tmp_is_body($body);
    }

    function is_order_by($order_by) {
        return emails_tmp_is_order_by($order_by);
    }

    function is_status($status) {
        return emails_tmp_is_status($status);
    }


}
