<?php

// comments_read
// Date: 2022-04-10    
################################################################################

class Comments_read {

    /**
     * id
     */
    public $_id;

    /**
     * order_id
     */
    public $_order_id;

    /**
     * contact_id
     */
    public $_contact_id;

    /**
     * date_read
     */
    public $_date_read;

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

    function getOrder_id() {
        return $this->_order_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getDate_read() {
        return $this->_date_read;
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

    function setOrder_id($order_id) {
        $this->_order_id = $order_id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setDate_read($date_read) {
        $this->_date_read = $date_read;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setComments_read($id) {
        $comments_read = comments_read_details($id);
        //
        $this->_id = $comments_read["id"];
        $this->_order_id = $comments_read["order_id"];
        $this->_contact_id = $comments_read["contact_id"];
        $this->_date_read = $comments_read["date_read"];
        $this->_order_by = $comments_read["order_by"];
        $this->_status = $comments_read["status"];
    }
}

################################################################################
