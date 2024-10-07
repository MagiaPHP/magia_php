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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
#################################################################################
 
        



/**
 * Clase nationalities
 * 
 * Description
 * 
 * @package nationalities
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-27
 */




class Nationalities {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * num_code
    */ 
    public $_num_code;
    /** 
    * alpha_2_code
    */ 
    public $_alpha_2_code;
    /** 
    * alpha_3_code
    */ 
    public $_alpha_3_code;
    /** 
    * en_short_name
    */ 
    public $_en_short_name;
    /** 
    * nationality
    */ 
    public $_nationality;
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
    function getNum_code () {
        return $this->_num_code; 
    }
    function getAlpha_2_code () {
        return $this->_alpha_2_code; 
    }
    function getAlpha_3_code () {
        return $this->_alpha_3_code; 
    }
    function getEn_short_name () {
        return $this->_en_short_name; 
    }
    function getNationality () {
        return $this->_nationality; 
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
    function setNum_code ($num_code) {
        $this->_num_code = $num_code; 
    }
    function setAlpha_2_code ($alpha_2_code) {
        $this->_alpha_2_code = $alpha_2_code; 
    }
    function setAlpha_3_code ($alpha_3_code) {
        $this->_alpha_3_code = $alpha_3_code; 
    }
    function setEn_short_name ($en_short_name) {
        $this->_en_short_name = $en_short_name; 
    }
    function setNationality ($nationality) {
        $this->_nationality = $nationality; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setNationalities($id) {
        $nationalities = nationalities_details($id);
        //
        $this->_id = $nationalities["id"];
        $this->_num_code = $nationalities["num_code"];
        $this->_alpha_2_code = $nationalities["alpha_2_code"];
        $this->_alpha_3_code = $nationalities["alpha_3_code"];
        $this->_en_short_name = $nationalities["en_short_name"];
        $this->_nationality = $nationalities["nationality"];
        $this->_order_by = $nationalities["order_by"];
        $this->_status = $nationalities["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return nationalities_field_id($field, $id);
    }

    function field_code($field, $code) {
        return nationalities_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return nationalities_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return nationalities_list($start, $limit);
    }

    function details($id) {
        return nationalities_details($id);
    }

    function delete($id) {
        return nationalities_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return nationalities_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return nationalities_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return nationalities_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return nationalities_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return nationalities_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return nationalities_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return nationalities_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return nationalities_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return nationalities_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return nationalities_is_id($id);
    }

    function is_num_code($num_code) {
        return nationalities_is_num_code($num_code);
    }

    function is_alpha_2_code($alpha_2_code) {
        return nationalities_is_alpha_2_code($alpha_2_code);
    }

    function is_alpha_3_code($alpha_3_code) {
        return nationalities_is_alpha_3_code($alpha_3_code);
    }

    function is_en_short_name($en_short_name) {
        return nationalities_is_en_short_name($en_short_name);
    }

    function is_nationality($nationality) {
        return nationalities_is_nationality($nationality);
    }

    function is_order_by($order_by) {
        return nationalities_is_order_by($order_by);
    }

    function is_status($status) {
        return nationalities_is_status($status);
    }


}
