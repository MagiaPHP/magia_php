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
# Fecha de creacion del documento: 2024-09-04 08:09:31 
#################################################################################
 
        



/**
 * Clase emails_folders
 * 
 * Description
 * 
 * @package emails_folders
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Emails_folders {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * contact_id
    */ 
    private $_contact_id;
    /** 
    * folder
    */ 
    private $_folder;
    /** 
    * icon
    */ 
    private $_icon;
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
    function getFolder () {
        return $this->_folder; 
    }
    function getIcon () {
        return $this->_icon; 
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
    function setFolder ($folder) {
        $this->_folder = $folder; 
    }
    function setIcon ($icon) {
        $this->_icon = $icon; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setEmails_folders($id) {
        $emails_folders = emails_folders_details($id);
        //
        $this->_id = $emails_folders["id"];
        $this->_contact_id = $emails_folders["contact_id"];
        $this->_folder = $emails_folders["folder"];
        $this->_icon = $emails_folders["icon"];
        $this->_order_by = $emails_folders["order_by"];
        $this->_status = $emails_folders["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return emails_folders_field_id($field, $id);
    }

    function field_code($field, $code) {
        return emails_folders_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return emails_folders_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return emails_folders_list($start, $limit);
    }

    function details($id) {
        return emails_folders_details($id);
    }

    function delete($id) {
        return emails_folders_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return emails_folders_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return emails_folders_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return emails_folders_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return emails_folders_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return emails_folders_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return emails_folders_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return emails_folders_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return emails_folders_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return emails_folders_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return emails_folders_is_id($id);
    }

    function is_contact_id($contact_id) {
        return emails_folders_is_contact_id($contact_id);
    }

    function is_folder($folder) {
        return emails_folders_is_folder($folder);
    }

    function is_icon($icon) {
        return emails_folders_is_icon($icon);
    }

    function is_order_by($order_by) {
        return emails_folders_is_order_by($order_by);
    }

    function is_status($status) {
        return emails_folders_is_status($status);
    }


}
