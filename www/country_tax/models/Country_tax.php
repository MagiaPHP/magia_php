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
# Fecha de creacion del documento: 2024-09-04 08:09:20 
#################################################################################
 
        



/**
 * Clase country_tax
 * 
 * Description
 * 
 * @package country_tax
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Country_tax {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * country
    */ 
    private $_country;
    /** 
    * tax
    */ 
    private $_tax;
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
    function getCountry () {
        return $this->_country; 
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
    function setCountry ($country) {
        $this->_country = $country; 
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
   
    function setCountry_tax($id) {
        $country_tax = country_tax_details($id);
        //
        $this->_id = $country_tax["id"];
        $this->_country = $country_tax["country"];
        $this->_tax = $country_tax["tax"];
        $this->_order_by = $country_tax["order_by"];
        $this->_status = $country_tax["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return country_tax_field_id($field, $id);
    }

    function field_code($field, $code) {
        return country_tax_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return country_tax_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return country_tax_list($start, $limit);
    }

    function details($id) {
        return country_tax_details($id);
    }

    function delete($id) {
        return country_tax_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return country_tax_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return country_tax_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return country_tax_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return country_tax_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return country_tax_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return country_tax_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return country_tax_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return country_tax_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return country_tax_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return country_tax_is_id($id);
    }

    function is_country($country) {
        return country_tax_is_country($country);
    }

    function is_tax($tax) {
        return country_tax_is_tax($tax);
    }

    function is_order_by($order_by) {
        return country_tax_is_order_by($order_by);
    }

    function is_status($status) {
        return country_tax_is_status($status);
    }


}
