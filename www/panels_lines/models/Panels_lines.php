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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################
 
        



/**
 * Clase panels_lines
 * 
 * Description
 * 
 * @package panels_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Panels_lines {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * panel_id
    */ 
    private $_panel_id;
    /** 
    * icon
    */ 
    private $_icon;
    /** 
    * label
    */ 
    private $_label;
    /** 
    * translate
    */ 
    private $_translate;
    /** 
    * url
    */ 
    private $_url;
    /** 
    * badge
    */ 
    private $_badge;
    /** 
    * controller
    */ 
    private $_controller;
    /** 
    * action
    */ 
    private $_action;
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
    function getPanel_id () {
        return $this->_panel_id; 
    }
    function getIcon () {
        return $this->_icon; 
    }
    function getLabel () {
        return $this->_label; 
    }
    function getTranslate () {
        return $this->_translate; 
    }
    function getUrl () {
        return $this->_url; 
    }
    function getBadge () {
        return $this->_badge; 
    }
    function getController () {
        return $this->_controller; 
    }
    function getAction () {
        return $this->_action; 
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
    function setPanel_id ($panel_id) {
        $this->_panel_id = $panel_id; 
    }
    function setIcon ($icon) {
        $this->_icon = $icon; 
    }
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setTranslate ($translate) {
        $this->_translate = $translate; 
    }
    function setUrl ($url) {
        $this->_url = $url; 
    }
    function setBadge ($badge) {
        $this->_badge = $badge; 
    }
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setAction ($action) {
        $this->_action = $action; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setPanels_lines($id) {
        $panels_lines = panels_lines_details($id);
        //
        $this->_id = $panels_lines["id"];
        $this->_panel_id = $panels_lines["panel_id"];
        $this->_icon = $panels_lines["icon"];
        $this->_label = $panels_lines["label"];
        $this->_translate = $panels_lines["translate"];
        $this->_url = $panels_lines["url"];
        $this->_badge = $panels_lines["badge"];
        $this->_controller = $panels_lines["controller"];
        $this->_action = $panels_lines["action"];
        $this->_order_by = $panels_lines["order_by"];
        $this->_status = $panels_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return panels_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return panels_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return panels_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return panels_lines_list($start, $limit);
    }

    function details($id) {
        return panels_lines_details($id);
    }

    function delete($id) {
        return panels_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return panels_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return panels_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return panels_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return panels_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return panels_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return panels_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return panels_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return panels_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return panels_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "panel_id":
                return panels_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return panels_lines_is_id($id);
    }

    function is_panel_id($panel_id) {
        return panels_lines_is_panel_id($panel_id);
    }

    function is_icon($icon) {
        return panels_lines_is_icon($icon);
    }

    function is_label($label) {
        return panels_lines_is_label($label);
    }

    function is_translate($translate) {
        return panels_lines_is_translate($translate);
    }

    function is_url($url) {
        return panels_lines_is_url($url);
    }

    function is_badge($badge) {
        return panels_lines_is_badge($badge);
    }

    function is_controller($controller) {
        return panels_lines_is_controller($controller);
    }

    function is_action($action) {
        return panels_lines_is_action($action);
    }

    function is_order_by($order_by) {
        return panels_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return panels_lines_is_status($status);
    }


}
