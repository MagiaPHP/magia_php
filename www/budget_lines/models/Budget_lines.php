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
# Fecha de creacion del documento: 2024-09-16 12:09:08 
#################################################################################
 
        



/**
 * Clase budget_lines
 * 
 * Description
 * 
 * @package budget_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Budget_lines {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * budget_id
    */ 
    public $_budget_id;
    /** 
    * order_id
    */ 
    public $_order_id;
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
    function getBudget_id () {
        return $this->_budget_id; 
    }
    function getOrder_id () {
        return $this->_order_id; 
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
    function setBudget_id ($budget_id) {
        $this->_budget_id = $budget_id; 
    }
    function setOrder_id ($order_id) {
        $this->_order_id = $order_id; 
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
   
    function setBudget_lines($id) {
        $budget_lines = budget_lines_details($id);
        //
        $this->_id = $budget_lines["id"];
        $this->_budget_id = $budget_lines["budget_id"];
        $this->_order_id = $budget_lines["order_id"];
        $this->_category_code = $budget_lines["category_code"];
        $this->_code = $budget_lines["code"];
        $this->_quantity = $budget_lines["quantity"];
        $this->_description = $budget_lines["description"];
        $this->_price = $budget_lines["price"];
        $this->_discounts = $budget_lines["discounts"];
        $this->_discounts_mode = $budget_lines["discounts_mode"];
        $this->_tax = $budget_lines["tax"];
        $this->_order_by = $budget_lines["order_by"];
        $this->_status = $budget_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return budget_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return budget_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return budget_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return budget_lines_list($start, $limit);
    }

    function details($id) {
        return budget_lines_details($id);
    }

    function delete($id) {
        return budget_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return budget_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return budget_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return budget_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return budget_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return budget_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return budget_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return budget_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return budget_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return budget_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "budget_id":
                return budgets_field_id("id", $value);
                break;
                case "order_id":
                return orders_field_id("id", $value);
                break;
                case "category_code":
                return budgets_categories_field_id("code", $value);
                break;
                case "discounts_mode":
                return discounts_mode_field_id("discount", $value);
                break;
                case "tax":
                return tax_field_id("value", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return budget_lines_is_id($id);
    }

    function is_budget_id($budget_id) {
        return budget_lines_is_budget_id($budget_id);
    }

    function is_order_id($order_id) {
        return budget_lines_is_order_id($order_id);
    }

    function is_category_code($category_code) {
        return budget_lines_is_category_code($category_code);
    }

    function is_code($code) {
        return budget_lines_is_code($code);
    }

    function is_quantity($quantity) {
        return budget_lines_is_quantity($quantity);
    }

    function is_description($description) {
        return budget_lines_is_description($description);
    }

    function is_price($price) {
        return budget_lines_is_price($price);
    }

    function is_discounts($discounts) {
        return budget_lines_is_discounts($discounts);
    }

    function is_discounts_mode($discounts_mode) {
        return budget_lines_is_discounts_mode($discounts_mode);
    }

    function is_tax($tax) {
        return budget_lines_is_tax($tax);
    }

    function is_order_by($order_by) {
        return budget_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return budget_lines_is_status($status);
    }


}
