<?php

// comments
// Date: 2022-04-21    
################################################################################

class Comments {

    /**
     * id
     */
    public $_id;

    /**
     * date
     */
    public $_date;

    /**
     * sender_id
     */
    public $_sender_id;

    /**
     * doc
     */
    public $_doc;

    /**
     * doc_id
     */
    public $_doc_id;

    /**
     * comment
     */
    public $_comment;

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

    function getDate() {
        return $this->_date;
    }

    function getSender_id() {
        return $this->_sender_id;
    }

    function getDoc() {
        return $this->_doc;
    }

    function getDoc_id() {
        return $this->_doc_id;
    }

    function getComment() {
        return $this->_comment;
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

    function setDate($date) {
        $this->_date = $date;
    }

    function setSender_id($sender_id) {
        $this->_sender_id = $sender_id;
    }

    function setDoc($doc) {
        $this->_doc = $doc;
    }

    function setDoc_id($doc_id) {
        $this->_doc_id = $doc_id;
    }

    function setComment($comment) {
        $this->_comment = $comment;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setComments($id) {
        $comments = comments_details($id);
        //
        $this->_id = $comments["id"];
        $this->_date = $comments["date"];
        $this->_sender_id = $comments["sender_id"];
        $this->_doc = $comments["doc"];
        $this->_doc_id = $comments["doc_id"];
        $this->_comment = $comments["comment"];
        $this->_order_by = $comments["order_by"];
        $this->_status = $comments["status"];
    }
}

################################################################################
