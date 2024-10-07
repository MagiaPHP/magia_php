<?php

// projects_status
// Date: 2024-04-09    
################################################################################

class Projects_status {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * name
     */
    public $_name;

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

    function getCode() {
        return $this->_code;
    }

    function getName() {
        return $this->_name;
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

    function setCode($code) {
        $this->_code = $code;
    }

    function setName($name) {
        $this->_name = $name;
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

    function setProjects_status($id) {
        $projects_status = projects_status_details($id);
        //
        $this->_id = $projects_status["id"];
        $this->_code = $projects_status["code"];
        $this->_name = $projects_status["name"];
        $this->_icon = $projects_status["icon"];
        $this->_color = $projects_status["color"];
        $this->_order_by = $projects_status["order_by"];
        $this->_status = $projects_status["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return projects_status_field_id($field, $id);
    }

    function field_code($field, $code) {
        return projects_status_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return projects_status_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return projects_status_list($start, $limit);
    }

    function details($id) {
        return projects_status_details($id);
    }

    function delete($id) {
        return projects_status_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return projects_status_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return projects_status_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return projects_status_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return projects_status_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return projects_status_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return projects_status_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return projects_status_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return projects_status_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return projects_status_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return projects_status_is_id($id);
    }

    function is_code($code) {
        return projects_status_is_code($code);
    }

    function is_name($name) {
        return projects_status_is_name($name);
    }

    function is_icon($icon) {
        return projects_status_is_icon($icon);
    }

    function is_color($color) {
        return projects_status_is_color($color);
    }

    function is_order_by($order_by) {
        return projects_status_is_order_by($order_by);
    }

    function is_status($status) {
        return projects_status_is_status($status);
    }
}
