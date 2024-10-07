<?php

// comment_folder
// Date: 2022-04-25    
################################################################################

class Comment_folder {

    /**
     * id
     */
    public $_id;

    /**
     * doc_id
     */
    public $_doc_id;

    /**
     * folder
     */
    public $_folder;

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

    function getDoc_id() {
        return $this->_doc_id;
    }

    function getFolder() {
        return $this->_folder;
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

    function setDoc_id($doc_id) {
        $this->_doc_id = $doc_id;
    }

    function setFolder($folder) {
        $this->_folder = $folder;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setComment_folder($id) {
        $comment_folder = comment_folder_details($id);
        //
        $this->_id = $comment_folder["id"];
        $this->_doc_id = $comment_folder["doc_id"];
        $this->_folder = $comment_folder["folder"];
        $this->_order_by = $comment_folder["order_by"];
        $this->_status = $comment_folder["status"];
    }
}

################################################################################
