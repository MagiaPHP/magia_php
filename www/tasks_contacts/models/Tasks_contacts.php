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
# Fecha de creacion del documento: 2024-09-26 17:09:16 
#################################################################################
 
        



/**
 * Clase tasks_contacts
 * 
 * Description
 * 
 * @package tasks_contacts
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-26
 */




class Tasks_contacts {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * task_id
    */ 
    public $_task_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * date_registred
    */ 
    public $_date_registred;
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
    function getTask_id () {
        return $this->_task_id; 
    }
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getDate_registred () {
        return $this->_date_registred; 
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
    function setTask_id ($task_id) {
        $this->_task_id = $task_id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setDate_registred ($date_registred) {
        $this->_date_registred = $date_registred; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setTasks_contacts($id) {
        $tasks_contacts = tasks_contacts_details($id);
        //
        $this->_id = $tasks_contacts["id"];
        $this->_task_id = $tasks_contacts["task_id"];
        $this->_contact_id = $tasks_contacts["contact_id"];
        $this->_date_registred = $tasks_contacts["date_registred"];
        $this->_order_by = $tasks_contacts["order_by"];
        $this->_status = $tasks_contacts["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return tasks_contacts_field_id($field, $id);
    }

    function field_code($field, $code) {
        return tasks_contacts_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return tasks_contacts_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return tasks_contacts_list($start, $limit);
    }

    function details($id) {
        return tasks_contacts_details($id);
    }

    function delete($id) {
        return tasks_contacts_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_contacts_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return tasks_contacts_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return tasks_contacts_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return tasks_contacts_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return tasks_contacts_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return tasks_contacts_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return tasks_contacts_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return tasks_contacts_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return tasks_contacts_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "task_id":
                return tasks_field_id("id", $value);
                break;
                case "contact_id":
                return contacts_field_id("id", $value);
                break;
                case "status":
                return tasks_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return tasks_contacts_is_id($id);
    }

    function is_task_id($task_id) {
        return tasks_contacts_is_task_id($task_id);
    }

    function is_contact_id($contact_id) {
        return tasks_contacts_is_contact_id($contact_id);
    }

    function is_date_registred($date_registred) {
        return tasks_contacts_is_date_registred($date_registred);
    }

    function is_order_by($order_by) {
        return tasks_contacts_is_order_by($order_by);
    }

    function is_status($status) {
        return tasks_contacts_is_status($status);
    }


}
