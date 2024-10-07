<?php

// doc
// Date: 2022-12-09    
################################################################################

class Doc {

    /**
     * id
     */
    public $_id;

    /**
     * category_id
     */
    public $_category_id;

    /**
     * title
     */
    public $_title;

    /**
     * body
     */
    public $_body;

    /**
     * title_icon
     */
    public $_title_icon;

    /**
     * sumary
     */
    public $_sumary;

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

    function getCategory_id() {
        return $this->_category_id;
    }

    function getTitle() {
        return $this->_title;
    }

    function getBody() {
        return $this->_body;
    }

    function getTitle_icon() {
        return $this->_title_icon;
    }

    function getSumary() {
        return $this->_sumary;
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

    function setCategory_id($category_id) {
        $this->_category_id = $category_id;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setBody($body) {
        $this->_body = $body;
    }

    function setTitle_icon($title_icon) {
        $this->_title_icon = $title_icon;
    }

    function setSumary($sumary) {
        $this->_sumary = $sumary;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setDoc($id) {
        $doc = doc_details($id);
        //
        $this->_id = $doc["id"];
        $this->_category_id = $doc["category_id"];
        $this->_title = $doc["title"];
        $this->_body = $doc["body"];
        $this->_title_icon = $doc["title_icon"];
        $this->_sumary = $doc["sumary"];
        $this->_order_by = $doc["order_by"];
        $this->_status = $doc["status"];
    }
}

################################################################################
