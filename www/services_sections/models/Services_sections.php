<?php

// services_sections
// Date: 2024-04-29    
################################################################################

class Services_sections {

    /**
     * id
     */
    public $_id;

    /**
     * section_father
     */
    public $_section_father;

    /**
     * code
     */
    public $_code;

    /**
     * section
     */
    public $_section;

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

    function getSection_father() {
        return $this->_section_father;
    }

    function getCode() {
        return $this->_code;
    }

    function getSection() {
        return $this->_section;
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

    function setSection_father($section_father) {
        $this->_section_father = $section_father;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setSection($section) {
        $this->_section = $section;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setServices_sections($id) {
        $services_sections = services_sections_details($id);
        //
        $this->_id = $services_sections["id"];
        $this->_section_father = $services_sections["section_father"];
        $this->_code = $services_sections["code"];
        $this->_section = $services_sections["section"];
        $this->_order_by = $services_sections["order_by"];
        $this->_status = $services_sections["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return services_sections_field_id($field, $id);
    }

    function field_code($field, $code) {
        return services_sections_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return services_sections_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return services_sections_list($start, $limit);
    }

    function details($id) {
        return services_sections_details($id);
    }

    function delete($id) {
        return services_sections_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return services_sections_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return services_sections_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return services_sections_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return services_sections_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return services_sections_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return services_sections_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return services_sections_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return services_sections_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return services_sections_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return services_sections_is_id($id);
    }

    function is_section_father($section_father) {
        return services_sections_is_section_father($section_father);
    }

    function is_code($code) {
        return services_sections_is_code($code);
    }

    function is_section($section) {
        return services_sections_is_section($section);
    }

    function is_order_by($order_by) {
        return services_sections_is_order_by($order_by);
    }

    function is_status($status) {
        return services_sections_is_status($status);
    }
}
