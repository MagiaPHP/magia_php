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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
#################################################################################
 
        



/**
 * Clase currencies
 * 
 * Description
 * 
 * @package currencies
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Currencies {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * name
    */ 
    private $_name;
    /** 
    * code
    */ 
    private $_code;
    /** 
    * rate
    */ 
    private $_rate;
    /** 
    * rate_silent
    */ 
    private $_rate_silent;
    /** 
    * rate_id
    */ 
    private $_rate_id;
    /** 
    * accuracy
    */ 
    private $_accuracy;
    /** 
    * rounding
    */ 
    private $_rounding;
    /** 
    * active
    */ 
    private $_active;
    /** 
    * company_id
    */ 
    private $_company_id;
    /** 
    * date
    */ 
    private $_date;
    /** 
    * base
    */ 
    private $_base;
    /** 
    * position
    */ 
    private $_position;
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
    function getName () {
        return $this->_name; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getRate () {
        return $this->_rate; 
    }
    function getRate_silent () {
        return $this->_rate_silent; 
    }
    function getRate_id () {
        return $this->_rate_id; 
    }
    function getAccuracy () {
        return $this->_accuracy; 
    }
    function getRounding () {
        return $this->_rounding; 
    }
    function getActive () {
        return $this->_active; 
    }
    function getCompany_id () {
        return $this->_company_id; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getBase () {
        return $this->_base; 
    }
    function getPosition () {
        return $this->_position; 
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
    function setName ($name) {
        $this->_name = $name; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setRate ($rate) {
        $this->_rate = $rate; 
    }
    function setRate_silent ($rate_silent) {
        $this->_rate_silent = $rate_silent; 
    }
    function setRate_id ($rate_id) {
        $this->_rate_id = $rate_id; 
    }
    function setAccuracy ($accuracy) {
        $this->_accuracy = $accuracy; 
    }
    function setRounding ($rounding) {
        $this->_rounding = $rounding; 
    }
    function setActive ($active) {
        $this->_active = $active; 
    }
    function setCompany_id ($company_id) {
        $this->_company_id = $company_id; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setBase ($base) {
        $this->_base = $base; 
    }
    function setPosition ($position) {
        $this->_position = $position; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setCurrencies($id) {
        $currencies = currencies_details($id);
        //
        $this->_id = $currencies["id"];
        $this->_name = $currencies["name"];
        $this->_code = $currencies["code"];
        $this->_rate = $currencies["rate"];
        $this->_rate_silent = $currencies["rate_silent"];
        $this->_rate_id = $currencies["rate_id"];
        $this->_accuracy = $currencies["accuracy"];
        $this->_rounding = $currencies["rounding"];
        $this->_active = $currencies["active"];
        $this->_company_id = $currencies["company_id"];
        $this->_date = $currencies["date"];
        $this->_base = $currencies["base"];
        $this->_position = $currencies["position"];
        $this->_order_by = $currencies["order_by"];
        $this->_status = $currencies["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return currencies_field_id($field, $id);
    }

    function field_code($field, $code) {
        return currencies_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return currencies_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return currencies_list($start, $limit);
    }

    function details($id) {
        return currencies_details($id);
    }

    function delete($id) {
        return currencies_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return currencies_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return currencies_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return currencies_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return currencies_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return currencies_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return currencies_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return currencies_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return currencies_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return currencies_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return currencies_is_id($id);
    }

    function is_name($name) {
        return currencies_is_name($name);
    }

    function is_code($code) {
        return currencies_is_code($code);
    }

    function is_rate($rate) {
        return currencies_is_rate($rate);
    }

    function is_rate_silent($rate_silent) {
        return currencies_is_rate_silent($rate_silent);
    }

    function is_rate_id($rate_id) {
        return currencies_is_rate_id($rate_id);
    }

    function is_accuracy($accuracy) {
        return currencies_is_accuracy($accuracy);
    }

    function is_rounding($rounding) {
        return currencies_is_rounding($rounding);
    }

    function is_active($active) {
        return currencies_is_active($active);
    }

    function is_company_id($company_id) {
        return currencies_is_company_id($company_id);
    }

    function is_date($date) {
        return currencies_is_date($date);
    }

    function is_base($base) {
        return currencies_is_base($base);
    }

    function is_position($position) {
        return currencies_is_position($position);
    }

    function is_order_by($order_by) {
        return currencies_is_order_by($order_by);
    }

    function is_status($status) {
        return currencies_is_status($status);
    }


}
