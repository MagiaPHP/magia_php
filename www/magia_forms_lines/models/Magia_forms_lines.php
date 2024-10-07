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
# Fecha de creacion del documento: 2024-08-31 17:08:35 
#################################################################################
 
        



/**
 * Clase magia_forms_lines
 * 
 * Description
 * 
 * @package magia_forms_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-08-31
 */




class Magia_forms_lines {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * mg_form_id
    */ 
    private $_mg_form_id;
    /** 
    * mg_type
    */ 
    private $_mg_type;
    /** 
    * mg_external_table
    */ 
    private $_mg_external_table;
    /** 
    * mg_external_col
    */ 
    private $_mg_external_col;
    /** 
    * mg_label
    */ 
    private $_mg_label;
    /** 
    * mg_help_text
    */ 
    private $_mg_help_text;
    /** 
    * mg_name
    */ 
    private $_mg_name;
    /** 
    * mg_id
    */ 
    private $_mg_id;
    /** 
    * mg_placeholder
    */ 
    private $_mg_placeholder;
    /** 
    * mg_value
    */ 
    private $_mg_value;
    /** 
    * mg_class
    */ 
    private $_mg_class;
    /** 
    * mg_required
    */ 
    private $_mg_required;
    /** 
    * mg_disabled
    */ 
    private $_mg_disabled;
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
    function getMg_form_id () {
        return $this->_mg_form_id; 
    }
    function getMg_type () {
        return $this->_mg_type; 
    }
    function getMg_external_table () {
        return $this->_mg_external_table; 
    }
    function getMg_external_col () {
        return $this->_mg_external_col; 
    }
    function getMg_label () {
        return $this->_mg_label; 
    }
    function getMg_help_text () {
        return $this->_mg_help_text; 
    }
    function getMg_name () {
        return $this->_mg_name; 
    }
    function getMg_id () {
        return $this->_mg_id; 
    }
    function getMg_placeholder () {
        return $this->_mg_placeholder; 
    }
    function getMg_value () {
        return $this->_mg_value; 
    }
    function getMg_class () {
        return $this->_mg_class; 
    }
    function getMg_required () {
        return $this->_mg_required; 
    }
    function getMg_disabled () {
        return $this->_mg_disabled; 
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
    function setMg_form_id ($mg_form_id) {
        $this->_mg_form_id = $mg_form_id; 
    }
    function setMg_type ($mg_type) {
        $this->_mg_type = $mg_type; 
    }
    function setMg_external_table ($mg_external_table) {
        $this->_mg_external_table = $mg_external_table; 
    }
    function setMg_external_col ($mg_external_col) {
        $this->_mg_external_col = $mg_external_col; 
    }
    function setMg_label ($mg_label) {
        $this->_mg_label = $mg_label; 
    }
    function setMg_help_text ($mg_help_text) {
        $this->_mg_help_text = $mg_help_text; 
    }
    function setMg_name ($mg_name) {
        $this->_mg_name = $mg_name; 
    }
    function setMg_id ($mg_id) {
        $this->_mg_id = $mg_id; 
    }
    function setMg_placeholder ($mg_placeholder) {
        $this->_mg_placeholder = $mg_placeholder; 
    }
    function setMg_value ($mg_value) {
        $this->_mg_value = $mg_value; 
    }
    function setMg_class ($mg_class) {
        $this->_mg_class = $mg_class; 
    }
    function setMg_required ($mg_required) {
        $this->_mg_required = $mg_required; 
    }
    function setMg_disabled ($mg_disabled) {
        $this->_mg_disabled = $mg_disabled; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setMagia_forms_lines($id) {
        $magia_forms_lines = magia_forms_lines_details($id);
        //
        $this->_id = $magia_forms_lines["id"];
        $this->_mg_form_id = $magia_forms_lines["mg_form_id"];
        $this->_mg_type = $magia_forms_lines["mg_type"];
        $this->_mg_external_table = $magia_forms_lines["mg_external_table"];
        $this->_mg_external_col = $magia_forms_lines["mg_external_col"];
        $this->_mg_label = $magia_forms_lines["mg_label"];
        $this->_mg_help_text = $magia_forms_lines["mg_help_text"];
        $this->_mg_name = $magia_forms_lines["mg_name"];
        $this->_mg_id = $magia_forms_lines["mg_id"];
        $this->_mg_placeholder = $magia_forms_lines["mg_placeholder"];
        $this->_mg_value = $magia_forms_lines["mg_value"];
        $this->_mg_class = $magia_forms_lines["mg_class"];
        $this->_mg_required = $magia_forms_lines["mg_required"];
        $this->_mg_disabled = $magia_forms_lines["mg_disabled"];
        $this->_order_by = $magia_forms_lines["order_by"];
        $this->_status = $magia_forms_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_forms_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_forms_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_forms_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_forms_lines_list($start, $limit);
    }

    function details($id) {
        return magia_forms_lines_details($id);
    }

    function delete($id) {
        return magia_forms_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_forms_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_forms_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_forms_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_forms_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_forms_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_forms_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_forms_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_forms_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "mg_form_id":
                return magia_forms_field_id("id", $value);
                break;
                case "mg_type":
                return magia_forms_types_field_id("type", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return magia_forms_lines_is_id($id);
    }

    function is_mg_form_id($mg_form_id) {
        return magia_forms_lines_is_mg_form_id($mg_form_id);
    }

    function is_mg_type($mg_type) {
        return magia_forms_lines_is_mg_type($mg_type);
    }

    function is_mg_external_table($mg_external_table) {
        return magia_forms_lines_is_mg_external_table($mg_external_table);
    }

    function is_mg_external_col($mg_external_col) {
        return magia_forms_lines_is_mg_external_col($mg_external_col);
    }

    function is_mg_label($mg_label) {
        return magia_forms_lines_is_mg_label($mg_label);
    }

    function is_mg_help_text($mg_help_text) {
        return magia_forms_lines_is_mg_help_text($mg_help_text);
    }

    function is_mg_name($mg_name) {
        return magia_forms_lines_is_mg_name($mg_name);
    }

    function is_mg_id($mg_id) {
        return magia_forms_lines_is_mg_id($mg_id);
    }

    function is_mg_placeholder($mg_placeholder) {
        return magia_forms_lines_is_mg_placeholder($mg_placeholder);
    }

    function is_mg_value($mg_value) {
        return magia_forms_lines_is_mg_value($mg_value);
    }

    function is_mg_class($mg_class) {
        return magia_forms_lines_is_mg_class($mg_class);
    }

    function is_mg_required($mg_required) {
        return magia_forms_lines_is_mg_required($mg_required);
    }

    function is_mg_disabled($mg_disabled) {
        return magia_forms_lines_is_mg_disabled($mg_disabled);
    }

    function is_order_by($order_by) {
        return magia_forms_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_forms_lines_is_status($status);
    }


}
