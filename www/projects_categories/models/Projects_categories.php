<?php

// projects_categories
// Date: 2024-04-09    
################################################################################

class Projects_categories {

    /**
     * id
     */
    public $_id;

    /**
     * fader_code
     */
    public $_fader_code;

    /**
     * code
     */
    public $_code;

    /**
     * category
     */
    public $_category;

    /**
     * description
     */
    public $_description;

    /**
     * icon
     */
    public $_icon;

    /**
     * color
     */
    public $_color;

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

    function getFader_code() {
        return $this->_fader_code;
    }

    function getCode() {
        return $this->_code;
    }

    function getCategory() {
        return $this->_category;
    }

    function getDescription() {
        return $this->_description;
    }

    function getIcon() {
        return $this->_icon;
    }

    function getColor() {
        return $this->_color;
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

    function setFader_code($fader_code) {
        $this->_fader_code = $fader_code;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setCategory($category) {
        $this->_category = $category;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setIcon($icon) {
        $this->_icon = $icon;
    }

    function setColor($color) {
        $this->_color = $color;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setProjects_categories($id) {
        $projects_categories = projects_categories_details($id);
        //
        $this->_id = $projects_categories["id"];
        $this->_fader_code = $projects_categories["fader_code"];
        $this->_code = $projects_categories["code"];
        $this->_category = $projects_categories["category"];
        $this->_description = $projects_categories["description"];
        $this->_icon = $projects_categories["icon"];
        $this->_color = $projects_categories["color"];
        $this->_order_by = $projects_categories["order_by"];
        $this->_status = $projects_categories["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return projects_categories_field_id($field, $id);
    }

    function field_code($field, $code) {
        return projects_categories_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return projects_categories_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return projects_categories_list($start, $limit);
    }

    function details($id) {
        return projects_categories_details($id);
    }

    function delete($id) {
        return projects_categories_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return projects_categories_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return projects_categories_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return projects_categories_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return projects_categories_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return projects_categories_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return projects_categories_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return projects_categories_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return projects_categories_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return projects_categories_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return projects_categories_is_id($id);
    }

    function is_fader_code($fader_code) {
        return projects_categories_is_fader_code($fader_code);
    }

    function is_code($code) {
        return projects_categories_is_code($code);
    }

    function is_category($category) {
        return projects_categories_is_category($category);
    }

    function is_description($description) {
        return projects_categories_is_description($description);
    }

    function is_icon($icon) {
        return projects_categories_is_icon($icon);
    }

    function is_color($color) {
        return projects_categories_is_color($color);
    }

    function is_order_by($order_by) {
        return projects_categories_is_order_by($order_by);
    }

    function is_status($status) {
        return projects_categories_is_status($status);
    }
}
