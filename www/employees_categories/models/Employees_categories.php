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
# Fecha de creacion del documento: 2024-10-03 17:10:58 
#################################################################################
 
        



/**
 * Clase employees_categories
 * 
 * Description
 * 
 * @package employees_categories
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-03
 */




class Employees_categories {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * category
    */ 
    public $_category;
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
    function getCategory () {
        return $this->_category; 
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
    function setCategory ($category) {
        $this->_category = $category; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setEmployees_categories($id) {
        $employees_categories = employees_categories_details($id);
        //
        $this->_id = $employees_categories["id"];
        $this->_category = $employees_categories["category"];
        $this->_order_by = $employees_categories["order_by"];
        $this->_status = $employees_categories["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return employees_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return employees_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return employees_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return employees_categories_list($start, $limit);
    }

    function details($id) {
        return employees_categories_details($id);
    }

    function delete($id) {
        return employees_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return employees_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return employees_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return employees_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return employees_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return employees_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return employees_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return employees_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return employees_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return employees_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return employees_categories_is_id($id);
    }

    function is_category($category) {
        return employees_categories_is_category($category);
    }

    function is_order_by($order_by) {
        return employees_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return employees_categories_is_status($status);
    }


}
