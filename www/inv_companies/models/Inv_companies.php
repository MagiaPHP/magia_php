<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:09 

 

class Inv_companies {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * company_id
    */ 
    public $_company_id;
    /** 
    * company_type
    */ 
    public $_company_type;
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
    function getCompany_id () {
        return $this->_company_id; 
    }
    function getCompany_type () {
        return $this->_company_type; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setCompany_id ($company_id) {
        $this->_company_id = $company_id; 
    }
    function setCompany_type ($company_type) {
        $this->_company_type = $company_type; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setInv_companies($id) {
        $inv_companies = inv_companies_details($id);
        //
        $this->_id = $inv_companies["id"];
        $this->_company_id = $inv_companies["company_id"];
        $this->_company_type = $inv_companies["company_type"];
        $this->_order_by = $inv_companies["order_by"];
        $this->_status = $inv_companies["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return inv_companies_field_id($field, $id);
    }

    function field_code($field, $code) {
        return inv_companies_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return inv_companies_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return inv_companies_list($start, $limit);
    }

    function details($id) {
        return inv_companies_details($id);
    }

    function delete($id) {
        return inv_companies_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return inv_companies_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return inv_companies_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return inv_companies_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return inv_companies_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return inv_companies_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return inv_companies_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return inv_companies_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return inv_companies_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return inv_companies_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "company_id":
                return contacts_field_id("id", $value);
                break;
                case "company_type":
                return inv_types_field_id("type", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return inv_companies_is_id($id);
    }

    function is_company_id($company_id) {
        return inv_companies_is_company_id($company_id);
    }

    function is_company_type($company_type) {
        return inv_companies_is_company_type($company_type);
    }

    function is_order_by($order_by) {
        return inv_companies_is_order_by($order_by);
    }

    function is_status($status) {
        return inv_companies_is_status($status);
    }


}
