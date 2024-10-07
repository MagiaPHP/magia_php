<?php

// patients
// Date: 2022-04-12    
################################################################################

class Patients extends Contacts {

    /**
     * id
     */
    public $_id;

    /**
     * company_id
     */
    public $_company_id;

    /**
     * company_ref
     */
    public $_company_ref;

    /**
     * contact_id
     */
    public $_contact_id;

    /**
     * date
     */
    public $_date;

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

    function getCompany_id() {
        return $this->_company_id;
    }

    function getCompany_ref() {
        return $this->_company_ref;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getDate() {
        return $this->_date;
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

    function setCompany_id($company_id) {
        $this->_company_id = $company_id;
    }

    function setCompany_ref($company_ref) {
        $this->_company_ref = $company_ref;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setPatients($id) {
        $patients = patients_details($id);
        //
        $this->_id = $patients["id"];
        $this->_company_id = $patients["company_id"];
        $this->_company_ref = $patients["company_ref"];
        $this->_contact_id = $patients["contact_id"];
        $this->_date = $patients["date"];
        $this->_order_by = $patients["order_by"];
        $this->_status = $patients["status"];
    }
}

################################################################################
