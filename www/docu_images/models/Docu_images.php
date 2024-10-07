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
# Fecha de creacion del documento: 2024-09-22 18:09:50 
#################################################################################
 
        



/**
 * Clase docu_images
 * 
 * Description
 * 
 * @package docu_images
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-22
 */




class Docu_images {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * docu_id
    */ 
    public $_docu_id;
    /** 
    * bloc_id
    */ 
    public $_bloc_id;
    /** 
    * image
    */ 
    public $_image;
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
    function getBloc_id () {
        return $this->_bloc_id; 
    }
    function getImage () {
        return $this->_image; 
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
    function setBloc_id ($bloc_id) {
        $this->_bloc_id = $bloc_id; 
    }
    function setImage ($image) {
        $this->_image = $image; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setDocu_images($id) {
        $docu_images = docu_images_details($id);
        //
        $this->_id = $docu_images["id"];
        $this->_docu_id = $docu_images["docu_id"];
        $this->_bloc_id = $docu_images["bloc_id"];
        $this->_image = $docu_images["image"];
        $this->_order_by = $docu_images["order_by"];
        $this->_status = $docu_images["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return docu_images_field_id($field, $id);
    }

    function field_code($field, $code) {
        return docu_images_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return docu_images_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return docu_images_list($start, $limit);
    }

    function details($id) {
        return docu_images_details($id);
    }

    function delete($id) {
        return docu_images_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return docu_images_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return docu_images_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return docu_images_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return docu_images_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return docu_images_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return docu_images_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return docu_images_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return docu_images_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return docu_images_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "docu_id":
                return docu_field_id("id", $value);
                break;
                case "bloc_id":
                return docu_blocs_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return docu_images_is_id($id);
    }

    function is_docu_id($docu_id) {
        return docu_images_is_docu_id($docu_id);
    }

    function is_bloc_id($bloc_id) {
        return docu_images_is_bloc_id($bloc_id);
    }

    function is_image($image) {
        return docu_images_is_image($image);
    }

    function is_order_by($order_by) {
        return docu_images_is_order_by($order_by);
    }

    function is_status($status) {
        return docu_images_is_status($status);
    }


}
