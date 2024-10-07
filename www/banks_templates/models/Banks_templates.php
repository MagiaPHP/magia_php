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
# Fecha de creacion del documento: 2024-09-16 12:09:32 
#################################################################################
 
        



/**
 * Clase banks_templates
 * 
 * Description
 * 
 * @package banks_templates
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Banks_templates {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * template
    */ 
    public $_template;
    /** 
    * label
    */ 
    public $_label;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * icon
    */ 
    public $_icon;
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
    function getTemplate () {
        return $this->_template; 
    }
    function getLabel () {
        return $this->_label; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getIcon () {
        return $this->_icon; 
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
    function setTemplate ($template) {
        $this->_template = $template; 
    }
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setIcon ($icon) {
        $this->_icon = $icon; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBanks_templates($id) {
        $banks_templates = banks_templates_details($id);
        //
        $this->_id = $banks_templates["id"];
        $this->_template = $banks_templates["template"];
        $this->_label = $banks_templates["label"];
        $this->_description = $banks_templates["description"];
        $this->_icon = $banks_templates["icon"];
        $this->_order_by = $banks_templates["order_by"];
        $this->_status = $banks_templates["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_templates_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_templates_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_templates_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_templates_list($start, $limit);
    }

    function details($id) {
        return banks_templates_details($id);
    }

    function delete($id) {
        return banks_templates_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_templates_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_templates_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_templates_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_templates_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_templates_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_templates_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_templates_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_templates_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_templates_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return banks_templates_is_id($id);
    }

    function is_template($template) {
        return banks_templates_is_template($template);
    }

    function is_label($label) {
        return banks_templates_is_label($label);
    }

    function is_description($description) {
        return banks_templates_is_description($description);
    }

    function is_icon($icon) {
        return banks_templates_is_icon($icon);
    }

    function is_order_by($order_by) {
        return banks_templates_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_templates_is_status($status);
    }


}
