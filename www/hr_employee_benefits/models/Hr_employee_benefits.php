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
# Fecha de creacion del documento: 2024-09-21 12:09:02 
#################################################################################
 
        



/**
 * Clase hr_employee_benefits
 * 
 * Description
 * 
 * @package hr_employee_benefits
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-21
 */




class Hr_employee_benefits {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * benefit_code
    */ 
    public $_benefit_code;
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
    * periodicity
    */ 
    public $_periodicity;
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
    function getBenefit_code () {
        return $this->_benefit_code; 
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
    function getPeriodicity () {
        return $this->_periodicity; 
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
    function setBenefit_code ($benefit_code) {
        $this->_benefit_code = $benefit_code; 
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
    function setPeriodicity ($periodicity) {
        $this->_periodicity = $periodicity; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_employee_benefits($id) {
        $hr_employee_benefits = hr_employee_benefits_details($id);
        //
        $this->_id = $hr_employee_benefits["id"];
        $this->_employee_id = $hr_employee_benefits["employee_id"];
        $this->_benefit_code = $hr_employee_benefits["benefit_code"];
        $this->_price = $hr_employee_benefits["price"];
        $this->_company_part = $hr_employee_benefits["company_part"];
        $this->_employee_part = $hr_employee_benefits["employee_part"];
        $this->_periodicity = $hr_employee_benefits["periodicity"];
        $this->_order_by = $hr_employee_benefits["order_by"];
        $this->_status = $hr_employee_benefits["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_employee_benefits_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_employee_benefits_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_employee_benefits_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_employee_benefits_list($start, $limit);
    }

    function details($id) {
        return hr_employee_benefits_details($id);
    }

    function delete($id) {
        return hr_employee_benefits_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_benefits_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_employee_benefits_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_employee_benefits_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_employee_benefits_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_employee_benefits_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_employee_benefits_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_employee_benefits_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_employee_benefits_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_employee_benefits_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "periodicity":
                return hr_benefit_periodicity_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_employee_benefits_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_employee_benefits_is_employee_id($employee_id);
    }

    function is_benefit_code($benefit_code) {
        return hr_employee_benefits_is_benefit_code($benefit_code);
    }

    function is_price($price) {
        return hr_employee_benefits_is_price($price);
    }

    function is_company_part($company_part) {
        return hr_employee_benefits_is_company_part($company_part);
    }

    function is_employee_part($employee_part) {
        return hr_employee_benefits_is_employee_part($employee_part);
    }

    function is_periodicity($periodicity) {
        return hr_employee_benefits_is_periodicity($periodicity);
    }

    function is_order_by($order_by) {
        return hr_employee_benefits_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_employee_benefits_is_status($status);
    }


}
