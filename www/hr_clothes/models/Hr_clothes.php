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
# Fecha de creacion del documento: 2024-09-21 12:09:58 
#################################################################################
 
        



/**
 * Clase hr_clothes
 * 
 * Description
 * 
 * @package hr_clothes
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_clothes {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * description
    */ 
    public $_description;
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
    function getCode () {
        return $this->_code; 
    }
    function getName () {
        return $this->_name; 
    }
    function getDescription () {
        return $this->_description; 
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
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_clothes($id) {
        $hr_clothes = hr_clothes_details($id);
        //
        $this->_id = $hr_clothes["id"];
        $this->_code = $hr_clothes["code"];
        $this->_name = $hr_clothes["name"];
        $this->_description = $hr_clothes["description"];
        $this->_order_by = $hr_clothes["order_by"];
        $this->_status = $hr_clothes["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_clothes_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_clothes_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_clothes_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_clothes_list($start, $limit);
    }

    function details($id) {
        return hr_clothes_details($id);
    }

    function delete($id) {
        return hr_clothes_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_clothes_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_clothes_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_clothes_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_clothes_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_clothes_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_clothes_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_clothes_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_clothes_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_clothes_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_clothes_is_id($id);
    }

    function is_code($code) {
        return hr_clothes_is_code($code);
    }

    function is_name($name) {
        return hr_clothes_is_name($name);
    }

    function is_description($description) {
        return hr_clothes_is_description($description);
    }

    function is_order_by($order_by) {
        return hr_clothes_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_clothes_is_status($status);
    }


}
