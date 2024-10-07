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
# Fecha de creacion del documento: 2024-09-22 18:09:53 
#################################################################################
 
        



/**
 * Clase docu_blocs
 * 
 * Description
 * 
 * @package docu_blocs
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-22
 */




class Docu_blocs {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * docu_id
    */ 
    public $_docu_id;
    /** 
    * bloc
    */ 
    public $_bloc;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * post
    */ 
    public $_post;
    /** 
    * h
    */ 
    public $_h;
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
    function getDocu_id () {
        return $this->_docu_id; 
    }
    function getBloc () {
        return $this->_bloc; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getPost () {
        return $this->_post; 
    }
    function getH () {
        return $this->_h; 
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
    function setDocu_id ($docu_id) {
        $this->_docu_id = $docu_id; 
    }
    function setBloc ($bloc) {
        $this->_bloc = $bloc; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setPost ($post) {
        $this->_post = $post; 
    }
    function setH ($h) {
        $this->_h = $h; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDocu_blocs($id) {
        $docu_blocs = docu_blocs_details($id);
        //
        $this->_id = $docu_blocs["id"];
        $this->_docu_id = $docu_blocs["docu_id"];
        $this->_bloc = $docu_blocs["bloc"];
        $this->_title = $docu_blocs["title"];
        $this->_post = $docu_blocs["post"];
        $this->_h = $docu_blocs["h"];
        $this->_order_by = $docu_blocs["order_by"];
        $this->_status = $docu_blocs["status"];
}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return docu_blocs_field_id($field, $id);
    }

    function field_code($field, $code) {
        return docu_blocs_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return docu_blocs_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return docu_blocs_list($start, $limit);
    }

    function details($id) {
        return docu_blocs_details($id);
    }

    function delete($id) {
        return docu_blocs_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return docu_blocs_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return docu_blocs_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return docu_blocs_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return docu_blocs_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return docu_blocs_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return docu_blocs_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return docu_blocs_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return docu_blocs_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return docu_blocs_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return docu_blocs_is_id($id);
    }

    function is_docu_id($docu_id) {
        return docu_blocs_is_docu_id($docu_id);
    }

    function is_bloc($bloc) {
        return docu_blocs_is_bloc($bloc);
    }

    function is_title($title) {
        return docu_blocs_is_title($title);
    }

    function is_post($post) {
        return docu_blocs_is_post($post);
    }

    function is_h($h) {
        return docu_blocs_is_h($h);
    }

    function is_order_by($order_by) {
        return docu_blocs_is_order_by($order_by);
    }

    function is_status($status) {
        return docu_blocs_is_status($status);
    }


}
