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
# Fecha de creacion del documento: 2024-09-04 08:09:01 
#################################################################################
 
        



/**
 * Clase doc_models_lines
 * 
 * Description
 * 
 * @package doc_models_lines
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-04
 */




class Doc_models_lines {

    /** 
    * id
    */ 
    private $_id;
    /** 
    * modele
    */ 
    private $_modele;
    /** 
    * doc
    */ 
    private $_doc;
    /** 
    * section
    */ 
    private $_section;
    /** 
    * element
    */ 
    private $_element;
    /** 
    * name
    */ 
    private $_name;
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
    function getModele () {
        return $this->_modele; 
    }
    function getDoc () {
        return $this->_doc; 
    }
    function getSection () {
        return $this->_section; 
    }
    function getElement () {
        return $this->_element; 
    }
    function getName () {
        return $this->_name; 
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
    function setModele ($modele) {
        $this->_modele = $modele; 
    }
    function setDoc ($doc) {
        $this->_doc = $doc; 
    }
    function setSection ($section) {
        $this->_section = $section; 
    }
    function setElement ($element) {
        $this->_element = $element; 
    }
    function setName ($name) {
        $this->_name = $name; 
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
   
    function setDoc_models_lines($id) {
        $doc_models_lines = doc_models_lines_details($id);
        //
        $this->_id = $doc_models_lines["id"];
        $this->_modele = $doc_models_lines["modele"];
        $this->_doc = $doc_models_lines["doc"];
        $this->_section = $doc_models_lines["section"];
        $this->_element = $doc_models_lines["element"];
        $this->_name = $doc_models_lines["name"];
        $this->_params = $doc_models_lines["params"];
        $this->_order_by = $doc_models_lines["order_by"];
        $this->_status = $doc_models_lines["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return doc_models_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return doc_models_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return doc_models_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return doc_models_lines_list($start, $limit);
    }

    function details($id) {
        return doc_models_lines_details($id);
    }

    function delete($id) {
        return doc_models_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return doc_models_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return doc_models_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return doc_models_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return doc_models_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return doc_models_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return doc_models_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return doc_models_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return doc_models_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return doc_models_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "modele":
                return doc_models_field_id("name", $value);
                break;
                case "doc":
                return doc_docs_field_id("doc", $value);
                break;
                case "section":
                return doc_sections_field_id("section", $value);
                break;
                case "element":
                return doc_elements_field_id("element", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return doc_models_lines_is_id($id);
    }

    function is_modele($modele) {
        return doc_models_lines_is_modele($modele);
    }

    function is_doc($doc) {
        return doc_models_lines_is_doc($doc);
    }

    function is_section($section) {
        return doc_models_lines_is_section($section);
    }

    function is_element($element) {
        return doc_models_lines_is_element($element);
    }

    function is_name($name) {
        return doc_models_lines_is_name($name);
    }

    function is_params($params) {
        return doc_models_lines_is_params($params);
    }

    function is_order_by($order_by) {
        return doc_models_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return doc_models_lines_is_status($status);
    }


}
