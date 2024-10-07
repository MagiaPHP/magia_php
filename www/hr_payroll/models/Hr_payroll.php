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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
#################################################################################
 
        



/**
 * Clase hr_payroll
 * 
 * Description
 * 
 * @package hr_payroll
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-26
 */




class Hr_payroll {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * employee_id
    */ 
    public $_employee_id;
    /** 
    * date_entry
    */ 
    public $_date_entry;
    /** 
    * address
    */ 
    public $_address;
    /** 
    * fonction
    */ 
    public $_fonction;
    /** 
    * salary_base
    */ 
    public $_salary_base;
    /** 
    * civil_status
    */ 
    public $_civil_status;
    /** 
    * tax_system
    */ 
    public $_tax_system;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * value_round
    */ 
    public $_value_round;
    /** 
    * to_pay
    */ 
    public $_to_pay;
    /** 
    * account_number
    */ 
    public $_account_number;
    /** 
    * notes
    */ 
    public $_notes;
    /** 
    * extras
    */ 
    public $_extras;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * date_registre
    */ 
    public $_date_registre;
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
    function getDate_entry () {
        return $this->_date_entry; 
    }
    function getAddress () {
        return $this->_address; 
    }
    function getFonction () {
        return $this->_fonction; 
    }
    function getSalary_base () {
        return $this->_salary_base; 
    }
    function getCivil_status () {
        return $this->_civil_status; 
    }
    function getTax_system () {
        return $this->_tax_system; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getValue_round () {
        return $this->_value_round; 
    }
    function getTo_pay () {
        return $this->_to_pay; 
    }
    function getAccount_number () {
        return $this->_account_number; 
    }
    function getNotes () {
        return $this->_notes; 
    }
    function getExtras () {
        return $this->_extras; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
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
    function setDate_entry ($date_entry) {
        $this->_date_entry = $date_entry; 
    }
    function setAddress ($address) {
        $this->_address = $address; 
    }
    function setFonction ($fonction) {
        $this->_fonction = $fonction; 
    }
    function setSalary_base ($salary_base) {
        $this->_salary_base = $salary_base; 
    }
    function setCivil_status ($civil_status) {
        $this->_civil_status = $civil_status; 
    }
    function setTax_system ($tax_system) {
        $this->_tax_system = $tax_system; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setValue_round ($value_round) {
        $this->_value_round = $value_round; 
    }
    function setTo_pay ($to_pay) {
        $this->_to_pay = $to_pay; 
    }
    function setAccount_number ($account_number) {
        $this->_account_number = $account_number; 
    }
    function setNotes ($notes) {
        $this->_notes = $notes; 
    }
    function setExtras ($extras) {
        $this->_extras = $extras; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setHr_payroll($id) {
        $hr_payroll = hr_payroll_details($id);
        //
        $this->_id = $hr_payroll["id"];
        $this->_employee_id = $hr_payroll["employee_id"];
        $this->_date_entry = $hr_payroll["date_entry"];
        $this->_address = $hr_payroll["address"];
        $this->_fonction = $hr_payroll["fonction"];
        $this->_salary_base = $hr_payroll["salary_base"];
        $this->_civil_status = $hr_payroll["civil_status"];
        $this->_tax_system = $hr_payroll["tax_system"];
        $this->_date_start = $hr_payroll["date_start"];
        $this->_date_end = $hr_payroll["date_end"];
        $this->_value_round = $hr_payroll["value_round"];
        $this->_to_pay = $hr_payroll["to_pay"];
        $this->_account_number = $hr_payroll["account_number"];
        $this->_notes = $hr_payroll["notes"];
        $this->_extras = $hr_payroll["extras"];
        $this->_code = $hr_payroll["code"];
        $this->_date_registre = $hr_payroll["date_registre"];
        $this->_order_by = $hr_payroll["order_by"];
        $this->_status = $hr_payroll["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return hr_payroll_field_id($field, $id);
    }

    function field_code($field, $code) {
        return hr_payroll_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return hr_payroll_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return hr_payroll_list($start, $limit);
    }

    function details($id) {
        return hr_payroll_details($id);
    }

    function delete($id) {
        return hr_payroll_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return hr_payroll_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return hr_payroll_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return hr_payroll_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return hr_payroll_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return hr_payroll_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return hr_payroll_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return hr_payroll_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return hr_payroll_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return hr_payroll_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "employee_id":
                return employees_field_id("contact_id", $value);
                break;
                case "status":
                return hr_payroll_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return hr_payroll_is_id($id);
    }

    function is_employee_id($employee_id) {
        return hr_payroll_is_employee_id($employee_id);
    }

    function is_date_entry($date_entry) {
        return hr_payroll_is_date_entry($date_entry);
    }

    function is_address($address) {
        return hr_payroll_is_address($address);
    }

    function is_fonction($fonction) {
        return hr_payroll_is_fonction($fonction);
    }

    function is_salary_base($salary_base) {
        return hr_payroll_is_salary_base($salary_base);
    }

    function is_civil_status($civil_status) {
        return hr_payroll_is_civil_status($civil_status);
    }

    function is_tax_system($tax_system) {
        return hr_payroll_is_tax_system($tax_system);
    }

    function is_date_start($date_start) {
        return hr_payroll_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return hr_payroll_is_date_end($date_end);
    }

    function is_value_round($value_round) {
        return hr_payroll_is_value_round($value_round);
    }

    function is_to_pay($to_pay) {
        return hr_payroll_is_to_pay($to_pay);
    }

    function is_account_number($account_number) {
        return hr_payroll_is_account_number($account_number);
    }

    function is_notes($notes) {
        return hr_payroll_is_notes($notes);
    }

    function is_extras($extras) {
        return hr_payroll_is_extras($extras);
    }

    function is_code($code) {
        return hr_payroll_is_code($code);
    }

    function is_date_registre($date_registre) {
        return hr_payroll_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return hr_payroll_is_order_by($order_by);
    }

    function is_status($status) {
        return hr_payroll_is_status($status);
    }


}
