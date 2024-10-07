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
# Fecha de creacion del documento: 2024-09-23 21:09:21 
#################################################################################
 
        



/**
 * Clase holidays
 * 
 * Description
 * 
 * @package holidays
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-23
 */




class Holidays {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * country
    */ 
    public $_country;
    /** 
    * category_code
    */ 
    public $_category_code;
    /** 
    * date
    */ 
    public $_date;
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
    function getCountry () {
        return $this->_country; 
    }
    function getCategory_code () {
        return $this->_category_code; 
    }
    function getDate () {
        return $this->_date; 
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
    function setCountry ($country) {
        $this->_country = $country; 
    }
    function setCategory_code ($category_code) {
        $this->_category_code = $category_code; 
    }
    function setDate ($date) {
        $this->_date = $date; 
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
   
    function setHolidays($id) {
        $holidays = holidays_details($id);
        //
        $this->_id = $holidays["id"];
        $this->_country = $holidays["country"];
        $this->_category_code = $holidays["category_code"];
        $this->_date = $holidays["date"];
        $this->_description = $holidays["description"];
        $this->_order_by = $holidays["order_by"];
        $this->_status = $holidays["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return holidays_field_id($field, $id);
    }

    function field_code($field, $code) {
        return holidays_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return holidays_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return holidays_list($start, $limit);
    }

    function details($id) {
        return holidays_details($id);
    }

    function delete($id) {
        return holidays_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return holidays_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return holidays_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return holidays_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return holidays_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return holidays_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return holidays_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return holidays_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return holidays_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return holidays_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "category_code":
                return holidays_categories_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return holidays_is_id($id);
    }

    function is_country($country) {
        return holidays_is_country($country);
    }

    function is_category_code($category_code) {
        return holidays_is_category_code($category_code);
    }

    function is_date($date) {
        return holidays_is_date($date);
    }

    function is_description($description) {
        return holidays_is_description($description);
    }

    function is_order_by($order_by) {
        return holidays_is_order_by($order_by);
    }

    function is_status($status) {
        return holidays_is_status($status);
    }


}
