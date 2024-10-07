<?php

// docs_comments
// Date: 2022-03-01    
################################################################################

class Docs_comments {

    /**
     * id
     */
    public $_id;

    /**
     * controller
     */
    public $_controller;

    /**
     * comments
     */
    public $_comments;

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

    function getController() {
        return $this->_controller;
    }

    function getComments() {
        return $this->_comments;
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

    function setController($controller) {
        $this->_controller = $controller;
    }

    function setComments($comments) {
        $this->_comments = $comments;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setDocs_comments($id) {
        $docs_comments = docs_comments_details($id);
        //
        $this->_id = $docs_comments["id"];
        $this->_controller = $docs_comments["controller"];
        $this->_comments = $docs_comments["comments"];
        $this->_order_by = $docs_comments["order_by"];
        $this->_status = $docs_comments["status"];
    }
}

################################################################################
