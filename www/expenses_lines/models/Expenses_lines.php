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
# Fecha de creacion del documento: 2024-09-04 08:09:28 
#################################################################################
 
        



/**
 * Clase expenses_lines
 * 
 * Description
 * 
 * @package expenses_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Expenses_lines {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * expense_id
    */ 
    public $_expense_id;
    /** 
    * budget_id
    */ 
    public $_budget_id;
    /** 
    * category_code
    */ 
    public $_category_code;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * quantity
    */ 
    public $_quantity;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * discounts
    */ 
    public $_discounts;
    /** 
    * discounts_mode
    */ 
    public $_discounts_mode;
    /** 
    * tax
    */ 
    public $_tax;
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
    function getExpense_id () {
        return $this->_expense_id; 
    }
    function getBudget_id () {
        return $this->_budget_id; 
    }
    function getCategory_code () {
        return $this->_category_code; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getQuantity () {
        return $this->_quantity; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getDiscounts () {
        return $this->_discounts; 
    }
    function getDiscounts_mode () {
        return $this->_discounts_mode; 
    }
    function getTax () {
        return $this->_tax; 
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
    function setBudget_id ($budget_id) {
        $this->_budget_id = $budget_id; 
    }
    function setCategory_code ($category_code) {
        $this->_category_code = $category_code; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setQuantity ($quantity) {
        $this->_quantity = $quantity; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setDiscounts ($discounts) {
        $this->_discounts = $discounts; 
    }
    function setDiscounts_mode ($discounts_mode) {
        $this->_discounts_mode = $discounts_mode; 
    }
    function setTax ($tax) {
        $this->_tax = $tax; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setExpenses_lines($id) {
        $expenses_lines = expenses_lines_details($id);
        //
        $this->_id = $expenses_lines["id"];
        $this->_expense_id = $expenses_lines["expense_id"];
        $this->_budget_id = $expenses_lines["budget_id"];
        $this->_category_code = $expenses_lines["category_code"];
        $this->_code = $expenses_lines["code"];
        $this->_quantity = $expenses_lines["quantity"];
        $this->_description = $expenses_lines["description"];
        $this->_price = $expenses_lines["price"];
        $this->_discounts = $expenses_lines["discounts"];
        $this->_discounts_mode = $expenses_lines["discounts_mode"];
        $this->_tax = $expenses_lines["tax"];
        $this->_order_by = $expenses_lines["order_by"];
        $this->_status = $expenses_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_lines_list($start, $limit);
    }

    function details($id) {
        return expenses_lines_details($id);
    }

    function delete($id) {
        return expenses_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "expense_id":
                return expenses_field_id("id", $value);
                break;
                case "category_code":
                return expenses_categories_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_lines_is_id($id);
    }

    function is_expense_id($expense_id) {
        return expenses_lines_is_expense_id($expense_id);
    }

    function is_budget_id($budget_id) {
        return expenses_lines_is_budget_id($budget_id);
    }

    function is_category_code($category_code) {
        return expenses_lines_is_category_code($category_code);
    }

    function is_code($code) {
        return expenses_lines_is_code($code);
    }

    function is_quantity($quantity) {
        return expenses_lines_is_quantity($quantity);
    }

    function is_description($description) {
        return expenses_lines_is_description($description);
    }

    function is_price($price) {
        return expenses_lines_is_price($price);
    }

    function is_discounts($discounts) {
        return expenses_lines_is_discounts($discounts);
    }

    function is_discounts_mode($discounts_mode) {
        return expenses_lines_is_discounts_mode($discounts_mode);
    }

    function is_tax($tax) {
        return expenses_lines_is_tax($tax);
    }

    function is_order_by($order_by) {
        return expenses_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_lines_is_status($status);
    }


}
