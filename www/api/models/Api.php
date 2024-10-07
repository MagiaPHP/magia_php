<?php
 // api
 // Date: 2024-08-12    
################################################################################

class Api {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * api_key
    */ 
    public $_api_key;
    /** 
    * crud
    */ 
    public $_crud;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * requests_limit
    */ 
    public $_requests_limit;
    /** 
    * limit_period
    */ 
    public $_limit_period;
    /** 
    * requests_made
    */ 
    public $_requests_made;
    /** 
    * last_request
    */ 
    public $_last_request;
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
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getApi_key () {
        return $this->_api_key; 
    }
    function getCrud () {
        return $this->_crud; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getRequests_limit () {
        return $this->_requests_limit; 
    }
    function getLimit_period () {
        return $this->_limit_period; 
    }
    function getRequests_made () {
        return $this->_requests_made; 
    }
    function getLast_request () {
        return $this->_last_request; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setApi_key ($api_key) {
        $this->_api_key = $api_key; 
    }
    function setCrud ($crud) {
        $this->_crud = $crud; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setRequests_limit ($requests_limit) {
        $this->_requests_limit = $requests_limit; 
    }
    function setLimit_period ($limit_period) {
        $this->_limit_period = $limit_period; 
    }
    function setRequests_made ($requests_made) {
        $this->_requests_made = $requests_made; 
    }
    function setLast_request ($last_request) {
        $this->_last_request = $last_request; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setApi($id) {
        $api = api_details($id);
        //
        $this->_id = $api["id"];
        $this->_contact_id = $api["contact_id"];
        $this->_api_key = $api["api_key"];
        $this->_crud = $api["crud"];
        $this->_date_start = $api["date_start"];
        $this->_date_end = $api["date_end"];
        $this->_requests_limit = $api["requests_limit"];
        $this->_limit_period = $api["limit_period"];
        $this->_requests_made = $api["requests_made"];
        $this->_last_request = $api["last_request"];
        $this->_order_by = $api["order_by"];
        $this->_status = $api["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return api_field_id($field, $id);
    }

    function field_code($field, $code) {
        return api_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return api_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return api_list($start, $limit);
    }

    function details($id) {
        return api_details($id);
    }

    function delete($id) {
        return api_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return api_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return api_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return api_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return api_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return api_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return api_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return api_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return api_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return api_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "contact_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return api_is_id($id);
    }

    function is_contact_id($contact_id) {
        return api_is_contact_id($contact_id);
    }

    function is_api_key($api_key) {
        return api_is_api_key($api_key);
    }

    function is_crud($crud) {
        return api_is_crud($crud);
    }

    function is_date_start($date_start) {
        return api_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return api_is_date_end($date_end);
    }

    function is_requests_limit($requests_limit) {
        return api_is_requests_limit($requests_limit);
    }

    function is_limit_period($limit_period) {
        return api_is_limit_period($limit_period);
    }

    function is_requests_made($requests_made) {
        return api_is_requests_made($requests_made);
    }

    function is_last_request($last_request) {
        return api_is_last_request($last_request);
    }

    function is_order_by($order_by) {
        return api_is_order_by($order_by);
    }

    function is_status($status) {
        return api_is_status($status);
    }


}
