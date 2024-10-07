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
# Fecha de creacion del documento: 2024-09-16 12:09:10 
#################################################################################
 
        



/**
 * Clase banks_lines_tmp
 * 
 * Description
 * 
 * @package banks_lines_tmp
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Banks_lines_tmp {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * account_number
    */ 
    public $_account_number;
    /** 
    * template
    */ 
    public $_template;
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
    function getAccount_number () {
        return $this->_account_number; 
    }
    function getTemplate () {
        return $this->_template; 
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
    function setAccount_number ($account_number) {
        $this->_account_number = $account_number; 
    }
    function setTemplate ($template) {
        $this->_template = $template; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBanks_lines_tmp($id) {
        $banks_lines_tmp = banks_lines_tmp_details($id);
        //
        $this->_id = $banks_lines_tmp["id"];
        $this->_account_number = $banks_lines_tmp["account_number"];
        $this->_template = $banks_lines_tmp["template"];
        $this->_order_by = $banks_lines_tmp["order_by"];
        $this->_status = $banks_lines_tmp["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return banks_lines_tmp_field_id($field, $id);
    }

    function field_code($field, $code) {
        return banks_lines_tmp_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return banks_lines_tmp_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return banks_lines_tmp_list($start, $limit);
    }

    function details($id) {
        return banks_lines_tmp_details($id);
    }

    function delete($id) {
        return banks_lines_tmp_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_tmp_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return banks_lines_tmp_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return banks_lines_tmp_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return banks_lines_tmp_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return banks_lines_tmp_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return banks_lines_tmp_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return banks_lines_tmp_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return banks_lines_tmp_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return banks_lines_tmp_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return banks_lines_tmp_is_id($id);
    }

    function is_account_number($account_number) {
        return banks_lines_tmp_is_account_number($account_number);
    }

    function is_template($template) {
        return banks_lines_tmp_is_template($template);
    }

    function is_order_by($order_by) {
        return banks_lines_tmp_is_order_by($order_by);
    }

    function is_status($status) {
        return banks_lines_tmp_is_status($status);
    }


}
