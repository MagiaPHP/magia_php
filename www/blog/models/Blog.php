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
# Fecha de creacion del documento: 2024-09-27 12:09:30 
#################################################################################
 
        



/**
 * Clase blog
 * 
 * Description
 * 
 * @package blog
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-27
 */




class Blog {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * controller
    */ 
    public $_controller;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * author_id
    */ 
    public $_author_id;
    /** 
    * date
    */ 
    public $_date;
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
    function getController () {
        return $this->_controller; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getAuthor_id () {
        return $this->_author_id; 
    }
    function getDate () {
        return $this->_date; 
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
    function setController ($controller) {
        $this->_controller = $controller; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setAuthor_id ($author_id) {
        $this->_author_id = $author_id; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setBlog($id) {
        $blog = blog_details($id);
        //
        $this->_id = $blog["id"];
        $this->_controller = $blog["controller"];
        $this->_title = $blog["title"];
        $this->_description = $blog["description"];
        $this->_author_id = $blog["author_id"];
        $this->_date = $blog["date"];
        $this->_order_by = $blog["order_by"];
        $this->_status = $blog["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return blog_field_id($field, $id);
    }

    function field_code($field, $code) {
        return blog_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return blog_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return blog_list($start, $limit);
    }

    function details($id) {
        return blog_details($id);
    }

    function delete($id) {
        return blog_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return blog_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return blog_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return blog_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return blog_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return blog_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return blog_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return blog_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return blog_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return blog_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "controller":
                return controllers_field_id("controller", $value);
                break;
                case "author_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return blog_is_id($id);
    }

    function is_controller($controller) {
        return blog_is_controller($controller);
    }

    function is_title($title) {
        return blog_is_title($title);
    }

    function is_description($description) {
        return blog_is_description($description);
    }

    function is_author_id($author_id) {
        return blog_is_author_id($author_id);
    }

    function is_date($date) {
        return blog_is_date($date);
    }

    function is_order_by($order_by) {
        return blog_is_order_by($order_by);
    }

    function is_status($status) {
        return blog_is_status($status);
    }


}
