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
# Fecha de creacion del documento: 2024-10-07 10:10:03 
#################################################################################
 
        



/**
 * Clase yellow_pages
 * 
 * Description
 * 
 * @package yellow_pages
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-07
 */




class Yellow_pages {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * label
    */ 
    public $_label;
    /** 
    * url
    */ 
    public $_url;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * category
    */ 
    public $_category;
    /** 
    * target
    */ 
    public $_target;
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
    function getLabel () {
        return $this->_label; 
    }
    function getUrl () {
        return $this->_url; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getCategory () {
        return $this->_category; 
    }
    function getTarget () {
        return $this->_target; 
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
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setUrl ($url) {
        $this->_url = $url; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setCategory ($category) {
        $this->_category = $category; 
    }
    function setTarget ($target) {
        $this->_target = $target; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setYellow_pages($id) {
        $yellow_pages = yellow_pages_details($id);
        //
        $this->_id = $yellow_pages["id"];
        $this->_label = $yellow_pages["label"];
        $this->_url = $yellow_pages["url"];
        $this->_description = $yellow_pages["description"];
        $this->_category = $yellow_pages["category"];
        $this->_target = $yellow_pages["target"];
        $this->_order_by = $yellow_pages["order_by"];
        $this->_status = $yellow_pages["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return yellow_pages_field_id($field, $id);
    }

    function field_code($field, $code) {
        return yellow_pages_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return yellow_pages_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return yellow_pages_list($start, $limit);
    }

    function details($id) {
        return yellow_pages_details($id);
    }

    function delete($id) {
        return yellow_pages_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return yellow_pages_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return yellow_pages_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return yellow_pages_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return yellow_pages_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return yellow_pages_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return yellow_pages_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return yellow_pages_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return yellow_pages_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return yellow_pages_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "category":
                return yellow_pages_categories_field_id("category", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return yellow_pages_is_id($id);
    }

    function is_label($label) {
        return yellow_pages_is_label($label);
    }

    function is_url($url) {
        return yellow_pages_is_url($url);
    }

    function is_description($description) {
        return yellow_pages_is_description($description);
    }

    function is_category($category) {
        return yellow_pages_is_category($category);
    }

    function is_target($target) {
        return yellow_pages_is_target($target);
    }

    function is_order_by($order_by) {
        return yellow_pages_is_order_by($order_by);
    }

    function is_status($status) {
        return yellow_pages_is_status($status);
    }


}
