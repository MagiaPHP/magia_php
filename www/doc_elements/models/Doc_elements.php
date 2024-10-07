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
# Fecha de creacion del documento: 2024-09-04 08:09:54 
#################################################################################
 
        



/**
 * Clase doc_elements
 * 
 * Description
 * 
 * @package doc_elements
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_elements {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * element
    */ 
    private $_element;
    /** 
    * params
    */ 
    private $_params;
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
    function getElement () {
        return $this->_element; 
    }
    function getParams () {
        return $this->_params; 
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
    function setElement ($element) {
        $this->_element = $element; 
    }
    function setParams ($params) {
        $this->_params = $params; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDoc_elements($id) {
        $doc_elements = doc_elements_details($id);
        //
        $this->_id = $doc_elements["id"];
        $this->_element = $doc_elements["element"];
        $this->_params = $doc_elements["params"];
        $this->_order_by = $doc_elements["order_by"];
        $this->_status = $doc_elements["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_elements_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_elements_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_elements_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_elements_list($start, $limit);
    }

    function details($id) {
        return doc_elements_details($id);
    }

    function delete($id) {
        return doc_elements_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_elements_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_elements_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_elements_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_elements_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_elements_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_elements_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_elements_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_elements_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_elements_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_elements_is_id($id);
    }

    function is_element($element) {
        return doc_elements_is_element($element);
    }

    function is_params($params) {
        return doc_elements_is_params($params);
    }

    function is_order_by($order_by) {
        return doc_elements_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_elements_is_status($status);
    }


}
