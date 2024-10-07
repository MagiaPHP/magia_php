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
 * Clase expenses_references
 * 
 * Description
 * 
 * @package expenses_references
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Expenses_references {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * expense_id
    */ 
    private $_expense_id;
    /** 
    * name
    */ 
    private $_name;
    /** 
    * description
    */ 
    private $_description;
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
    function getExpense_id () {
        return $this->_expense_id; 
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
    function setExpense_id ($expense_id) {
        $this->_expense_id = $expense_id; 
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
   
    function setExpenses_references($id) {
        $expenses_references = expenses_references_details($id);
        //
        $this->_id = $expenses_references["id"];
        $this->_expense_id = $expenses_references["expense_id"];
        $this->_name = $expenses_references["name"];
        $this->_description = $expenses_references["description"];
        $this->_order_by = $expenses_references["order_by"];
        $this->_status = $expenses_references["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_references_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_references_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_references_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_references_list($start, $limit);
    }

    function details($id) {
        return expenses_references_details($id);
    }

    function delete($id) {
        return expenses_references_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_references_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_references_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_references_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_references_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_references_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_references_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_references_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_references_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_references_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "expense_id":
                return expenses_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_references_is_id($id);
    }

    function is_expense_id($expense_id) {
        return expenses_references_is_expense_id($expense_id);
    }

    function is_name($name) {
        return expenses_references_is_name($name);
    }

    function is_description($description) {
        return expenses_references_is_description($description);
    }

    function is_order_by($order_by) {
        return expenses_references_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_references_is_status($status);
    }


}
