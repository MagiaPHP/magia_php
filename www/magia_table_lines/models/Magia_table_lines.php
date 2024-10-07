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
# Fecha de creacion del documento: 2024-08-31 17:08:04 
#################################################################################
 
        



/**
 * Clase magia_table_lines
 * 
 * Description
 * 
 * @package magia_table_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-08-31
 */




class Magia_table_lines {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * table_id
    */ 
    private $_table_id;
    /** 
    * header_icon
    */ 
    private $_header_icon;
    /** 
    * header_pre_label
    */ 
    private $_header_pre_label;
    /** 
    * header_label
    */ 
    private $_header_label;
    /** 
    * header_url
    */ 
    private $_header_url;
    /** 
    * header_post_label
    */ 
    private $_header_post_label;
    /** 
    * body_icon
    */ 
    private $_body_icon;
    /** 
    * body_pre_label
    */ 
    private $_body_pre_label;
    /** 
    * body_label
    */ 
    private $_body_label;
    /** 
    * body_post_label
    */ 
    private $_body_post_label;
    /** 
    * footer_icon
    */ 
    private $_footer_icon;
    /** 
    * footer_pre_label
    */ 
    private $_footer_pre_label;
    /** 
    * footer_label
    */ 
    private $_footer_label;
    /** 
    * footer_post_label
    */ 
    private $_footer_post_label;
    /** 
    * description
    */ 
    private $_description;
    /** 
    * permission
    */ 
    private $_permission;
    /** 
    * align
    */ 
    private $_align;
    /** 
    * show
    */ 
    private $_show;
    /** 
    * translate
    */ 
    private $_translate;
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
    function getTable_id () {
        return $this->_table_id; 
    }
    function getHeader_icon () {
        return $this->_header_icon; 
    }
    function getHeader_pre_label () {
        return $this->_header_pre_label; 
    }
    function getHeader_label () {
        return $this->_header_label; 
    }
    function getHeader_url () {
        return $this->_header_url; 
    }
    function getHeader_post_label () {
        return $this->_header_post_label; 
    }
    function getBody_icon () {
        return $this->_body_icon; 
    }
    function getBody_pre_label () {
        return $this->_body_pre_label; 
    }
    function getBody_label () {
        return $this->_body_label; 
    }
    function getBody_post_label () {
        return $this->_body_post_label; 
    }
    function getFooter_icon () {
        return $this->_footer_icon; 
    }
    function getFooter_pre_label () {
        return $this->_footer_pre_label; 
    }
    function getFooter_label () {
        return $this->_footer_label; 
    }
    function getFooter_post_label () {
        return $this->_footer_post_label; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getPermission () {
        return $this->_permission; 
    }
    function getAlign () {
        return $this->_align; 
    }
    function getShow () {
        return $this->_show; 
    }
    function getTranslate () {
        return $this->_translate; 
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
    function setTable_id ($table_id) {
        $this->_table_id = $table_id; 
    }
    function setHeader_icon ($header_icon) {
        $this->_header_icon = $header_icon; 
    }
    function setHeader_pre_label ($header_pre_label) {
        $this->_header_pre_label = $header_pre_label; 
    }
    function setHeader_label ($header_label) {
        $this->_header_label = $header_label; 
    }
    function setHeader_url ($header_url) {
        $this->_header_url = $header_url; 
    }
    function setHeader_post_label ($header_post_label) {
        $this->_header_post_label = $header_post_label; 
    }
    function setBody_icon ($body_icon) {
        $this->_body_icon = $body_icon; 
    }
    function setBody_pre_label ($body_pre_label) {
        $this->_body_pre_label = $body_pre_label; 
    }
    function setBody_label ($body_label) {
        $this->_body_label = $body_label; 
    }
    function setBody_post_label ($body_post_label) {
        $this->_body_post_label = $body_post_label; 
    }
    function setFooter_icon ($footer_icon) {
        $this->_footer_icon = $footer_icon; 
    }
    function setFooter_pre_label ($footer_pre_label) {
        $this->_footer_pre_label = $footer_pre_label; 
    }
    function setFooter_label ($footer_label) {
        $this->_footer_label = $footer_label; 
    }
    function setFooter_post_label ($footer_post_label) {
        $this->_footer_post_label = $footer_post_label; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setPermission ($permission) {
        $this->_permission = $permission; 
    }
    function setAlign ($align) {
        $this->_align = $align; 
    }
    function setShow ($show) {
        $this->_show = $show; 
    }
    function setTranslate ($translate) {
        $this->_translate = $translate; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setMagia_table_lines($id) {
        $magia_table_lines = magia_table_lines_details($id);
        //
        $this->_id = $magia_table_lines["id"];
        $this->_table_id = $magia_table_lines["table_id"];
        $this->_header_icon = $magia_table_lines["header_icon"];
        $this->_header_pre_label = $magia_table_lines["header_pre_label"];
        $this->_header_label = $magia_table_lines["header_label"];
        $this->_header_url = $magia_table_lines["header_url"];
        $this->_header_post_label = $magia_table_lines["header_post_label"];
        $this->_body_icon = $magia_table_lines["body_icon"];
        $this->_body_pre_label = $magia_table_lines["body_pre_label"];
        $this->_body_label = $magia_table_lines["body_label"];
        $this->_body_post_label = $magia_table_lines["body_post_label"];
        $this->_footer_icon = $magia_table_lines["footer_icon"];
        $this->_footer_pre_label = $magia_table_lines["footer_pre_label"];
        $this->_footer_label = $magia_table_lines["footer_label"];
        $this->_footer_post_label = $magia_table_lines["footer_post_label"];
        $this->_description = $magia_table_lines["description"];
        $this->_permission = $magia_table_lines["permission"];
        $this->_align = $magia_table_lines["align"];
        $this->_show = $magia_table_lines["show"];
        $this->_translate = $magia_table_lines["translate"];
        $this->_order_by = $magia_table_lines["order_by"];
        $this->_status = $magia_table_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return magia_table_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return magia_table_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return magia_table_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return magia_table_lines_list($start, $limit);
    }

    function details($id) {
        return magia_table_lines_details($id);
    }

    function delete($id) {
        return magia_table_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return magia_table_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return magia_table_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return magia_table_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return magia_table_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return magia_table_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return magia_table_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return magia_table_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return magia_table_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return magia_table_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "table_id":
                return magia_tables_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return magia_table_lines_is_id($id);
    }

    function is_table_id($table_id) {
        return magia_table_lines_is_table_id($table_id);
    }

    function is_header_icon($header_icon) {
        return magia_table_lines_is_header_icon($header_icon);
    }

    function is_header_pre_label($header_pre_label) {
        return magia_table_lines_is_header_pre_label($header_pre_label);
    }

    function is_header_label($header_label) {
        return magia_table_lines_is_header_label($header_label);
    }

    function is_header_url($header_url) {
        return magia_table_lines_is_header_url($header_url);
    }

    function is_header_post_label($header_post_label) {
        return magia_table_lines_is_header_post_label($header_post_label);
    }

    function is_body_icon($body_icon) {
        return magia_table_lines_is_body_icon($body_icon);
    }

    function is_body_pre_label($body_pre_label) {
        return magia_table_lines_is_body_pre_label($body_pre_label);
    }

    function is_body_label($body_label) {
        return magia_table_lines_is_body_label($body_label);
    }

    function is_body_post_label($body_post_label) {
        return magia_table_lines_is_body_post_label($body_post_label);
    }

    function is_footer_icon($footer_icon) {
        return magia_table_lines_is_footer_icon($footer_icon);
    }

    function is_footer_pre_label($footer_pre_label) {
        return magia_table_lines_is_footer_pre_label($footer_pre_label);
    }

    function is_footer_label($footer_label) {
        return magia_table_lines_is_footer_label($footer_label);
    }

    function is_footer_post_label($footer_post_label) {
        return magia_table_lines_is_footer_post_label($footer_post_label);
    }

    function is_description($description) {
        return magia_table_lines_is_description($description);
    }

    function is_permission($permission) {
        return magia_table_lines_is_permission($permission);
    }

    function is_align($align) {
        return magia_table_lines_is_align($align);
    }

    function is_show($show) {
        return magia_table_lines_is_show($show);
    }

    function is_translate($translate) {
        return magia_table_lines_is_translate($translate);
    }

    function is_order_by($order_by) {
        return magia_table_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return magia_table_lines_is_status($status);
    }


}
