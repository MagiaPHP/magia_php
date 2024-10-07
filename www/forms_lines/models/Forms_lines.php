<?php

// forms_lines
// Date: 2024-02-11    
################################################################################

class Forms_lines {

    /**
     * id
     */
    public $_id;

    /**
     * form_id
     */
    public $_form_id;

    /**
     * m_label
     */
    public $_m_label;

    /**
     * m_type
     */
    public $_m_type;

    /**
     * m_class
     */
    public $_m_class;

    /**
     * m_name
     */
    public $_m_name;

    /**
     * m_id
     */
    public $_m_id;

    /**
     * m_placeholder
     */
    public $_m_placeholder;

    /**
     * m_value
     */
    public $_m_value;

    /**
     * m_only_read
     */
    public $_m_only_read;

    /**
     * m_mandatory
     */
    public $_m_mandatory;

    /**
     * m_selected
     */
    public $_m_selected;

    /**
     * m_disabled
     */
    public $_m_disabled;

    /**
     * m_table_external
     */
    public $_m_table_external;

    /**
     * m_col_external
     */
    public $_m_col_external;

    /**
     * m_label_external
     */
    public $_m_label_external;

    /**
     * m_options_values
     */
    public $_m_options_values;

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

    function getForm_id() {
        return $this->_form_id;
    }

    function getM_label() {
        return $this->_m_label;
    }

    function getM_type() {
        return $this->_m_type;
    }

    function getM_class() {
        return $this->_m_class;
    }

    function getM_name() {
        return $this->_m_name;
    }

    function getM_id() {
        return $this->_m_id;
    }

    function getM_placeholder() {
        return $this->_m_placeholder;
    }

    function getM_value() {
        return $this->_m_value;
    }

    function getM_only_read() {
        return $this->_m_only_read;
    }

    function getM_mandatory() {
        return $this->_m_mandatory;
    }

    function getM_selected() {
        return $this->_m_selected;
    }

    function getM_disabled() {
        return $this->_m_disabled;
    }

    function getM_table_external() {
        return $this->_m_table_external;
    }

    function getM_col_external() {
        return $this->_m_col_external;
    }

    function getM_label_external() {
        return $this->_m_label_external;
    }

    function getM_options_values() {
        return $this->_m_options_values;
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

    function setForm_id($form_id) {
        $this->_form_id = $form_id;
    }

    function setM_label($m_label) {
        $this->_m_label = $m_label;
    }

    function setM_type($m_type) {
        $this->_m_type = $m_type;
    }

    function setM_class($m_class) {
        $this->_m_class = $m_class;
    }

    function setM_name($m_name) {
        $this->_m_name = $m_name;
    }

    function setM_id($m_id) {
        $this->_m_id = $m_id;
    }

    function setM_placeholder($m_placeholder) {
        $this->_m_placeholder = $m_placeholder;
    }

    function setM_value($m_value) {
        $this->_m_value = $m_value;
    }

    function setM_only_read($m_only_read) {
        $this->_m_only_read = $m_only_read;
    }

    function setM_mandatory($m_mandatory) {
        $this->_m_mandatory = $m_mandatory;
    }

    function setM_selected($m_selected) {
        $this->_m_selected = $m_selected;
    }

    function setM_disabled($m_disabled) {
        $this->_m_disabled = $m_disabled;
    }

    function setM_table_external($m_table_external) {
        $this->_m_table_external = $m_table_external;
    }

    function setM_col_external($m_col_external) {
        $this->_m_col_external = $m_col_external;
    }

    function setM_label_external($m_label_external) {
        $this->_m_label_external = $m_label_external;
    }

    function setM_options_values($m_options_values) {
        $this->_m_options_values = $m_options_values;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setForms_lines($id) {
        $forms_lines = forms_lines_details($id);
        //
        $this->_id = $forms_lines["id"];
        $this->_form_id = $forms_lines["form_id"];
        $this->_m_label = $forms_lines["m_label"];
        $this->_m_type = $forms_lines["m_type"];
        $this->_m_class = $forms_lines["m_class"];
        $this->_m_name = $forms_lines["m_name"];
        $this->_m_id = $forms_lines["m_id"];
        $this->_m_placeholder = $forms_lines["m_placeholder"];
        $this->_m_value = $forms_lines["m_value"];
        $this->_m_only_read = $forms_lines["m_only_read"];
        $this->_m_mandatory = $forms_lines["m_mandatory"];
        $this->_m_selected = $forms_lines["m_selected"];
        $this->_m_disabled = $forms_lines["m_disabled"];
        $this->_m_table_external = $forms_lines["m_table_external"];
        $this->_m_col_external = $forms_lines["m_col_external"];
        $this->_m_label_external = $forms_lines["m_label_external"];
        $this->_m_options_values = $forms_lines["m_options_values"];
        $this->_order_by = $forms_lines["order_by"];
        $this->_status = $forms_lines["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return forms_lines_field_id($field, $id);
    }

    function field_code($field, $code) {
        return forms_lines_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return forms_lines_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return forms_lines_list($start, $limit);
    }

    function details($id) {
        return forms_lines_details($id);
    }

    function delete($id) {
        return forms_lines_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return forms_lines_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return forms_lines_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return forms_lines_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return forms_lines_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return forms_lines_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return forms_lines_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return forms_lines_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return forms_lines_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return forms_lines_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "form_id":
                return forms_field_id("id", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return forms_lines_is_id($id);
    }

    function is_form_id($form_id) {
        return forms_lines_is_form_id($form_id);
    }

    function is_m_label($m_label) {
        return forms_lines_is_m_label($m_label);
    }

    function is_m_type($m_type) {
        return forms_lines_is_m_type($m_type);
    }

    function is_m_class($m_class) {
        return forms_lines_is_m_class($m_class);
    }

    function is_m_name($m_name) {
        return forms_lines_is_m_name($m_name);
    }

    function is_m_id($m_id) {
        return forms_lines_is_m_id($m_id);
    }

    function is_m_placeholder($m_placeholder) {
        return forms_lines_is_m_placeholder($m_placeholder);
    }

    function is_m_value($m_value) {
        return forms_lines_is_m_value($m_value);
    }

    function is_m_only_read($m_only_read) {
        return forms_lines_is_m_only_read($m_only_read);
    }

    function is_m_mandatory($m_mandatory) {
        return forms_lines_is_m_mandatory($m_mandatory);
    }

    function is_m_selected($m_selected) {
        return forms_lines_is_m_selected($m_selected);
    }

    function is_m_disabled($m_disabled) {
        return forms_lines_is_m_disabled($m_disabled);
    }

    function is_m_table_external($m_table_external) {
        return forms_lines_is_m_table_external($m_table_external);
    }

    function is_m_col_external($m_col_external) {
        return forms_lines_is_m_col_external($m_col_external);
    }

    function is_m_label_external($m_label_external) {
        return forms_lines_is_m_label_external($m_label_external);
    }

    function is_m_options_values($m_options_values) {
        return forms_lines_is_m_options_values($m_options_values);
    }

    function is_order_by($order_by) {
        return forms_lines_is_order_by($order_by);
    }

    function is_status($status) {
        return forms_lines_is_status($status);
    }
}
