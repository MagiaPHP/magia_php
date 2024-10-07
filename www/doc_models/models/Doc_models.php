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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
#################################################################################
 
        



/**
 * Clase doc_models
 * 
 * Description
 * 
 * @package doc_models
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_models {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * name
    */ 
    private $_name;
    /** 
    * description
    */ 
    private $_description;
    /** 
    * params
    */ 
    private $_params;
    /** 
    * author
    */ 
    private $_author;
    /** 
    * author_email
    */ 
    private $_author_email;
    /** 
    * url
    */ 
    private $_url;
    /** 
    * version
    */ 
    private $_version;
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
    function getName () {
        return $this->_name; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getParams () {
        return $this->_params; 
    }
    function getAuthor () {
        return $this->_author; 
    }
    function getAuthor_email () {
        return $this->_author_email; 
    }
    function getUrl () {
        return $this->_url; 
    }
    function getVersion () {
        return $this->_version; 
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
    function setName ($name) {
        $this->_name = $name; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setParams ($params) {
        $this->_params = $params; 
    }
    function setAuthor ($author) {
        $this->_author = $author; 
    }
    function setAuthor_email ($author_email) {
        $this->_author_email = $author_email; 
    }
    function setUrl ($url) {
        $this->_url = $url; 
    }
    function setVersion ($version) {
        $this->_version = $version; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDoc_models($id) {
        $doc_models = doc_models_details($id);
        //
        $this->_id = $doc_models["id"];
        $this->_name = $doc_models["name"];
        $this->_description = $doc_models["description"];
        $this->_params = $doc_models["params"];
        $this->_author = $doc_models["author"];
        $this->_author_email = $doc_models["author_email"];
        $this->_url = $doc_models["url"];
        $this->_version = $doc_models["version"];
        $this->_order_by = $doc_models["order_by"];
        $this->_status = $doc_models["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_models_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_models_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_models_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_models_list($start, $limit);
    }

    function details($id) {
        return doc_models_details($id);
    }

    function delete($id) {
        return doc_models_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_models_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_models_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_models_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_models_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_models_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_models_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_models_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_models_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_models_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_models_is_id($id);
    }

    function is_name($name) {
        return doc_models_is_name($name);
    }

    function is_description($description) {
        return doc_models_is_description($description);
    }

    function is_params($params) {
        return doc_models_is_params($params);
    }

    function is_author($author) {
        return doc_models_is_author($author);
    }

    function is_author_email($author_email) {
        return doc_models_is_author_email($author_email);
    }

    function is_url($url) {
        return doc_models_is_url($url);
    }

    function is_version($version) {
        return doc_models_is_version($version);
    }

    function is_order_by($order_by) {
        return doc_models_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_models_is_status($status);
    }


}
