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
# Fecha de creacion del documento: 2024-09-04 08:09:12 
#################################################################################
 
        



/**
 * Clase expenses_categories
 * 
 * Description
 * 
 * @package expenses_categories
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Expenses_categories {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * father_code
    */ 
    public $_father_code;
    /** 
    * category
    */ 
    public $_category;
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
    function getFather_code () {
        return $this->_father_code; 
    }
    function getCategory () {
        return $this->_category; 
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
    function setFather_code ($father_code) {
        $this->_father_code = $father_code; 
    }
    function setCategory ($category) {
        $this->_category = $category; 
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
   
    function setExpenses_categories($id) {
        $expenses_categories = expenses_categories_details($id);
        //
        $this->_id = $expenses_categories["id"];
        $this->_code = $expenses_categories["code"];
        $this->_father_code = $expenses_categories["father_code"];
        $this->_category = $expenses_categories["category"];
        $this->_description = $expenses_categories["description"];
        $this->_order_by = $expenses_categories["order_by"];
        $this->_status = $expenses_categories["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_categories_list($start, $limit);
    }

    function details($id) {
        return expenses_categories_details($id);
    }

    function delete($id) {
        return expenses_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "father_code":
                return expenses_categories_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_categories_is_id($id);
    }

    function is_code($code) {
        return expenses_categories_is_code($code);
    }

    function is_father_code($father_code) {
        return expenses_categories_is_father_code($father_code);
    }

    function is_category($category) {
        return expenses_categories_is_category($category);
    }

    function is_description($description) {
        return expenses_categories_is_description($description);
    }

    function is_order_by($order_by) {
        return expenses_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_categories_is_status($status);
    }


}
