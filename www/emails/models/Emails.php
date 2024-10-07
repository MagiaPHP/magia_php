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
# Fecha de creacion del documento: 2024-09-04 08:09:26 
#################################################################################
 
        



/**
 * Clase emails
 * 
 * Description
 * 
 * @package emails
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Emails {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * father_id
    */ 
    private $_father_id;
    /** 
    * sender_id
    */ 
    private $_sender_id;
    /** 
    * reciver_id
    */ 
    private $_reciver_id;
    /** 
    * folder
    */ 
    private $_folder;
    /** 
    * subjet
    */ 
    private $_subjet;
    /** 
    * message
    */ 
    private $_message;
    /** 
    * date_registre
    */ 
    private $_date_registre;
    /** 
    * date_read
    */ 
    private $_date_read;
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
    function getFather_id () {
        return $this->_father_id; 
    }
    function getSender_id () {
        return $this->_sender_id; 
    }
    function getReciver_id () {
        return $this->_reciver_id; 
    }
    function getFolder () {
        return $this->_folder; 
    }
    function getSubjet () {
        return $this->_subjet; 
    }
    function getMessage () {
        return $this->_message; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
    }
    function getDate_read () {
        return $this->_date_read; 
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
    function setFather_id ($father_id) {
        $this->_father_id = $father_id; 
    }
    function setSender_id ($sender_id) {
        $this->_sender_id = $sender_id; 
    }
    function setReciver_id ($reciver_id) {
        $this->_reciver_id = $reciver_id; 
    }
    function setFolder ($folder) {
        $this->_folder = $folder; 
    }
    function setSubjet ($subjet) {
        $this->_subjet = $subjet; 
    }
    function setMessage ($message) {
        $this->_message = $message; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setDate_read ($date_read) {
        $this->_date_read = $date_read; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setEmails($id) {
        $emails = emails_details($id);
        //
        $this->_id = $emails["id"];
        $this->_father_id = $emails["father_id"];
        $this->_sender_id = $emails["sender_id"];
        $this->_reciver_id = $emails["reciver_id"];
        $this->_folder = $emails["folder"];
        $this->_subjet = $emails["subjet"];
        $this->_message = $emails["message"];
        $this->_date_registre = $emails["date_registre"];
        $this->_date_read = $emails["date_read"];
        $this->_order_by = $emails["order_by"];
        $this->_status = $emails["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return emails_field_id($field, $id);
    }

    function field_code($field, $code) {
        return emails_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return emails_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return emails_list($start, $limit);
    }

    function details($id) {
        return emails_details($id);
    }

    function delete($id) {
        return emails_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return emails_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return emails_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return emails_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return emails_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return emails_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return emails_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return emails_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return emails_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return emails_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "father_id":
                return emails_field_id("id", $value);
                break;
                case "sender_id":
                return contacts_field_id("id", $value);
                break;
                case "reciver_id":
                return contacts_field_id("id", $value);
                break;
                case "folder":
                return emails_folders_field_id("folder", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return emails_is_id($id);
    }

    function is_father_id($father_id) {
        return emails_is_father_id($father_id);
    }

    function is_sender_id($sender_id) {
        return emails_is_sender_id($sender_id);
    }

    function is_reciver_id($reciver_id) {
        return emails_is_reciver_id($reciver_id);
    }

    function is_folder($folder) {
        return emails_is_folder($folder);
    }

    function is_subjet($subjet) {
        return emails_is_subjet($subjet);
    }

    function is_message($message) {
        return emails_is_message($message);
    }

    function is_date_registre($date_registre) {
        return emails_is_date_registre($date_registre);
    }

    function is_date_read($date_read) {
        return emails_is_date_read($date_read);
    }

    function is_order_by($order_by) {
        return emails_is_order_by($order_by);
    }

    function is_status($status) {
        return emails_is_status($status);
    }


}
