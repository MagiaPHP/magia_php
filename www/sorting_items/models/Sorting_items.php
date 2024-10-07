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
# Fecha de creacion del documento: 2024-08-30 13:08:28 
#################################################################################
 

class Sorting_items {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * title
    */ 
    private $_title;
    /** 
    * description
    */ 
    private $_description;
    /** 
    * position_order
    */ 
    private $_position_order;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getPosition_order () {
        return $this->_position_order; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setPosition_order ($position_order) {
        $this->_position_order = $position_order; 
    }
   
    function setSorting_items($id) {
        $sorting_items = sorting_items_details($id);
        //
        $this->_id = $sorting_items["id"];
        $this->_title = $sorting_items["title"];
        $this->_description = $sorting_items["description"];
        $this->_position_order = $sorting_items["position_order"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return sorting_items_field_id($field, $id);
    }

    function field_code($field, $code) {
        return sorting_items_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return sorting_items_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return sorting_items_list($start, $limit);
    }

    function details($id) {
        return sorting_items_details($id);
    }

    function delete($id) {
        return sorting_items_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return sorting_items_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return sorting_items_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return sorting_items_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return sorting_items_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return sorting_items_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return sorting_items_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return sorting_items_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return sorting_items_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return sorting_items_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return sorting_items_is_id($id);
    }

    function is_title($title) {
        return sorting_items_is_title($title);
    }

    function is_description($description) {
        return sorting_items_is_description($description);
    }

    function is_position_order($position_order) {
        return sorting_items_is_position_order($position_order);
    }


}
