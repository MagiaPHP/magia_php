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
# Fecha de creacion del documento: 2024-08-31 17:08:27 
#################################################################################
 
        



/**
 * Clase magia_forms
 * 
 * Description
 * 
 * @package magia_forms
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-08-31
 */




class Magia_forms {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * form
    */ 
    private $_form;
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
    function getForm () {
        return $this->_form; 
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
    function setForm ($form) {
        $this->_form = $form; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setMagia_forms($id) {
        $magia_forms = magia_forms_details($id);
        //
        $this->_id = $magia_forms["id"];
        $this->_form = $magia_forms["form"];
        $this->_order_by = $magia_forms["order_by"];
        $this->_status = $magia_forms["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_forms_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_forms_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_forms_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_forms_list($start, $limit);
    }

    function details($id) {
        return magia_forms_details($id);
    }

    function delete($id) {
        return magia_forms_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_forms_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_forms_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_forms_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_forms_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_forms_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_forms_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_forms_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return magia_forms_is_id($id);
    }

    function is_form($form) {
        return magia_forms_is_form($form);
    }

    function is_order_by($order_by) {
        return magia_forms_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_forms_is_status($status);
    }


}
