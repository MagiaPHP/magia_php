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
# Fecha de creacion del documento: 2024-09-21 12:09:04 
#################################################################################
 
        



/**
 * Clase hr_employee_benefits_by_month
 * 
 * Description
 * 
 * @package hr_employee_benefits_by_month
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_benefits_by_month {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * year
    */ 
    public $_year;
    /** 
    * month
    */ 
    public $_month;
    /** 
    * benefit_code
    */ 
    public $_benefit_code;
    /** 
    * quantity
    */ 
    public $_quantity;
    /** 
    * price
    */ 
    public $_price;
    /** 
    * company_part
    */ 
    public $_company_part;
    /** 
    * employee_part
    */ 
    public $_employee_part;
    /** 
    * company_part_value
    */ 
    public $_company_part_value;
    /** 
    * employee_part_value
    */ 
    public $_employee_part_value;
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
    function getEmployee_id () {
        return $this->_employee_id; 
    }
    function getYear () {
        return $this->_year; 
    }
    function getMonth () {
        return $this->_month; 
    }
    function getBenefit_code () {
        return $this->_benefit_code; 
    }
    function getQuantity () {
        return $this->_quantity; 
    }
    function getPrice () {
        return $this->_price; 
    }
    function getCompany_part () {
        return $this->_company_part; 
    }
    function getEmployee_part () {
        return $this->_employee_part; 
    }
    function getCompany_part_value () {
        return $this->_company_part_value; 
    }
    function getEmployee_part_value () {
        return $this->_employee_part_value; 
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
    function setEmployee_id ($employee_id) {
        $this->_employee_id = $employee_id; 
    }
    function setYear ($year) {
        $this->_year = $year; 
    }
    function setMonth ($month) {
        $this->_month = $month; 
    }
    function setBenefit_code ($benefit_code) {
        $this->_benefit_code = $benefit_code; 
    }
    function setQuantity ($quantity) {
        $this->_quantity = $quantity; 
    }
    function setPrice ($price) {
        $this->_price = $price; 
    }
    function setCompany_part ($company_part) {
        $this->_company_part = $company_part; 
    }
    function setEmployee_part ($employee_part) {
        $this->_employee_part = $employee_part; 
    }
    function setCompany_part_value ($company_part_value) {
        $this->_company_part_value = $company_part_value; 
    }
    function setEmployee_part_value ($employee_part_value) {
        $this->_employee_part_value = $employee_part_value; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_benefits_by_month($id) {
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_details($id);
        //
        $this->_id = $hr_employee_benefits_by_month["id"];
        $this->_employee_id = $hr_employee_benefits_by_month["employee_id"];
        $this->_year = $hr_employee_benefits_by_month["year"];
        $this->_month = $hr_employee_benefits_by_month["month"];
        $this->_benefit_code = $hr_employee_benefits_by_month["benefit_code"];
        $this->_quantity = $hr_employee_benefits_by_month["quantity"];
        $this->_price = $hr_employee_benefits_by_month["price"];
        $this->_company_part = $hr_employee_benefits_by_month["company_part"];
        $this->_employee_part = $hr_employee_benefits_by_month["employee_part"];
        $this->_company_part_value = $hr_employee_benefits_by_month["company_part_value"];
        $this->_employee_part_value = $hr_employee_benefits_by_month["employee_part_value"];
        $this->_order_by = $hr_employee_benefits_by_month["order_by"];
        $this->_status = $hr_employee_benefits_by_month["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_benefits_by_month_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_benefits_by_month_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_benefits_by_month_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_benefits_by_month_list($start, $limit);
    }

    function details($id) {
        return hr_employee_benefits_by_month_details($id);
    }

    function delete($id) {
        return hr_employee_benefits_by_month_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_benefits_by_month_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_benefits_by_month_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_benefits_by_month_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_benefits_by_month_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_benefits_by_month_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_benefits_by_month_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_benefits_by_month_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_benefits_by_month_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_benefits_by_month_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "benefit_code":
                return hr_benefits_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_benefits_by_month_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_benefits_by_month_is_employee_id($employee_id);
    }

    function is_year($year) {
        return hr_employee_benefits_by_month_is_year($year);
    }

    function is_month($month) {
        return hr_employee_benefits_by_month_is_month($month);
    }

    function is_benefit_code($benefit_code) {
        return hr_employee_benefits_by_month_is_benefit_code($benefit_code);
    }

    function is_quantity($quantity) {
        return hr_employee_benefits_by_month_is_quantity($quantity);
    }

    function is_price($price) {
        return hr_employee_benefits_by_month_is_price($price);
    }

    function is_company_part($company_part) {
        return hr_employee_benefits_by_month_is_company_part($company_part);
    }

    function is_employee_part($employee_part) {
        return hr_employee_benefits_by_month_is_employee_part($employee_part);
    }

    function is_company_part_value($company_part_value) {
        return hr_employee_benefits_by_month_is_company_part_value($company_part_value);
    }

    function is_employee_part_value($employee_part_value) {
        return hr_employee_benefits_by_month_is_employee_part_value($employee_part_value);
    }

    function is_order_by($order_by) {
        return hr_employee_benefits_by_month_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_benefits_by_month_is_status($status);
    }


}
