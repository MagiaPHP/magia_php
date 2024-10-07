<?php

// services_categories
// Date: 2024-04-29    
################################################################################

class Services_categories {

    /**
     * id
     */
    public $_id;

    /**
     * section_code
     */
    public $_section_code;

    /**
     * category_father
     */
    public $_category_father;

    /**
     * code
     */
    public $_code;

    /**
     * category
     */
    public $_category;

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

    function getId() {
        return $this->_id;
    }

    function getSection_code() {
        return $this->_section_code;
    }

    function getCategory_father() {
        return $this->_category_father;
    }

    function getCode() {
        return $this->_code;
    }

    function getCategory() {
        return $this->_category;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setSection_code($section_code) {
        $this->_section_code = $section_code;
    }

    function setCategory_father($category_father) {
        $this->_category_father = $category_father;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setCategory($category) {
        $this->_category = $category;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setServices_categories($id) {
        $services_categories = services_categories_details($id);
        //
        $this->_id = $services_categories["id"];
        $this->_section_code = $services_categories["section_code"];
        $this->_category_father = $services_categories["category_father"];
        $this->_code = $services_categories["code"];
        $this->_category = $services_categories["category"];
        $this->_order_by = $services_categories["order_by"];
        $this->_status = $services_categories["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return services_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return services_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return services_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return services_categories_list($start, $limit);
    }

    function details($id) {
        return services_categories_details($id);
    }

    function delete($id) {
        return services_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return services_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return services_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return services_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return services_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return services_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return services_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return services_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return services_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return services_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "section_code":
                return services_sections_field_id("code", $value);
                break;
            case "category_father":
                return services_categories_field_id("code", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return services_categories_is_id($id);
    }

    function is_section_code($section_code) {
        return services_categories_is_section_code($section_code);
    }

    function is_category_father($category_father) {
        return services_categories_is_category_father($category_father);
    }

    function is_code($code) {
        return services_categories_is_code($code);
    }

    function is_category($category) {
        return services_categories_is_category($category);
    }

    function is_order_by($order_by) {
        return services_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return services_categories_is_status($status);
    }
}
