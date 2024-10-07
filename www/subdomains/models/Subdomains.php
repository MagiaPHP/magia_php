<?php

// subdomains
// Date: 2024-05-15    
################################################################################

class Subdomains {

    /**
     * id
     */
    public $_id;

    /**
     * contact_id
     */
    public $_contact_id;

    /**
     * create_by
     */
    public $_create_by;

    /**
     * plan
     */
    public $_plan;

    /**
     * prefix
     */
    public $_prefix;

    /**
     * subdomain
     */
    public $_subdomain;

    /**
     * domain
     */
    public $_domain;

    /**
     * code
     */
    public $_code;

    /**
     * date_registre
     */
    public $_date_registre;

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

    function getContact_id() {
        return $this->_contact_id;
    }

    function getCreate_by() {
        return $this->_create_by;
    }

    function getPlan() {
        return $this->_plan;
    }

    function getPrefix() {
        return $this->_prefix;
    }

    function getSubdomain() {
        return $this->_subdomain;
    }

    function getDomain() {
        return $this->_domain;
    }

    function getCode() {
        return $this->_code;
    }

    function getDate_registre() {
        return $this->_date_registre;
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

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setCreate_by($create_by) {
        $this->_create_by = $create_by;
    }

    function setPlan($plan) {
        $this->_plan = $plan;
    }

    function setPrefix($prefix) {
        $this->_prefix = $prefix;
    }

    function setSubdomain($subdomain) {
        $this->_subdomain = $subdomain;
    }

    function setDomain($domain) {
        $this->_domain = $domain;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setDate_registre($date_registre) {
        $this->_date_registre = $date_registre;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setSubdomains($id) {
        $subdomains = subdomains_details($id);
        //
        $this->_id = $subdomains["id"];
        $this->_contact_id = $subdomains["contact_id"];
        $this->_create_by = $subdomains["create_by"];
        $this->_plan = $subdomains["plan"];
        $this->_prefix = $subdomains["prefix"];
        $this->_subdomain = $subdomains["subdomain"];
        $this->_domain = $subdomains["domain"];
        $this->_code = $subdomains["code"];
        $this->_date_registre = $subdomains["date_registre"];
        $this->_order_by = $subdomains["order_by"];
        $this->_status = $subdomains["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return subdomains_field_id($field, $id);
    }

    function field_code($field, $code) {
        return subdomains_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return subdomains_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return subdomains_list($start, $limit);
    }

    function details($id) {
        return subdomains_details($id);
    }

    function delete($id) {
        return subdomains_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return subdomains_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return subdomains_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return subdomains_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return subdomains_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return subdomains_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return subdomains_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return subdomains_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return subdomains_function($col_name, $value);
        $res = null;
        switch ($col_name) {
            case "contact_id":
                return contacts_field_id("id", $value);
                break;
            case "create_by":
                return contacts_field_id("tva", $value);
                break;
            case "plan":
                return subdomains_plan_field_id("plan", $value);
                break;

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return subdomains_is_id($id);
    }

    function is_contact_id($contact_id) {
        return subdomains_is_contact_id($contact_id);
    }

    function is_create_by($create_by) {
        return subdomains_is_create_by($create_by);
    }

    function is_plan($plan) {
        return subdomains_is_plan($plan);
    }

    function is_prefix($prefix) {
        return subdomains_is_prefix($prefix);
    }

    function is_subdomain($subdomain) {
        return subdomains_is_subdomain($subdomain);
    }

    function is_domain($domain) {
        return subdomains_is_domain($domain);
    }

    function is_code($code) {
        return subdomains_is_code($code);
    }

    function is_date_registre($date_registre) {
        return subdomains_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return subdomains_is_order_by($order_by);
    }

    function is_status($status) {
        return subdomains_is_status($status);
    }
}
