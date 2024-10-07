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
# Fecha de creacion del documento: 2024-09-27 12:09:05 
#################################################################################
 
        



/**
 * Clase blog_comments
 * 
 * Description
 * 
 * @package blog_comments
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-27
 */




class Blog_comments {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * blog_id
    */ 
    public $_blog_id;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * comment
    */ 
    public $_comment;
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
    function getBlog_id () {
        return $this->_blog_id; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getComment () {
        return $this->_comment; 
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
    function setBlog_id ($blog_id) {
        $this->_blog_id = $blog_id; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setComment ($comment) {
        $this->_comment = $comment; 
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
   
    function setBlog_comments($id) {
        $blog_comments = blog_comments_details($id);
        //
        $this->_id = $blog_comments["id"];
        $this->_blog_id = $blog_comments["blog_id"];
        $this->_title = $blog_comments["title"];
        $this->_comment = $blog_comments["comment"];
        $this->_author_id = $blog_comments["author_id"];
        $this->_date = $blog_comments["date"];
        $this->_order_by = $blog_comments["order_by"];
        $this->_status = $blog_comments["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return blog_comments_field_id($field, $id);
    }

    function field_code($field, $code) {
        return blog_comments_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return blog_comments_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return blog_comments_list($start, $limit);
    }

    function details($id) {
        return blog_comments_details($id);
    }

    function delete($id) {
        return blog_comments_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return blog_comments_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return blog_comments_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return blog_comments_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return blog_comments_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return blog_comments_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return blog_comments_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return blog_comments_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return blog_comments_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return blog_comments_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "blog_id":
                return blog_field_id("id", $value);
                break;
                case "author_id":
                return users_field_id("contact_id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return blog_comments_is_id($id);
    }

    function is_blog_id($blog_id) {
        return blog_comments_is_blog_id($blog_id);
    }

    function is_title($title) {
        return blog_comments_is_title($title);
    }

    function is_comment($comment) {
        return blog_comments_is_comment($comment);
    }

    function is_author_id($author_id) {
        return blog_comments_is_author_id($author_id);
    }

    function is_date($date) {
        return blog_comments_is_date($date);
    }

    function is_order_by($order_by) {
        return blog_comments_is_order_by($order_by);
    }

    function is_status($status) {
        return blog_comments_is_status($status);
    }


}
