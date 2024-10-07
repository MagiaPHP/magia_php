<?php

// comments_files
// Date: 2022-04-11    
################################################################################

class Comments_files {

    /**
     * id
     */
    public $_id;

    /**
     * comment_id
     */
    public $_comment_id;

    /**
     * file
     */
    public $_file;

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

    function getComment_id() {
        return $this->_comment_id;
    }

    function getFile() {
        return $this->_file;
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

    function setComment_id($comment_id) {
        $this->_comment_id = $comment_id;
    }

    function setFile($file) {
        $this->_file = $file;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setComments_files($id) {
        $comments_files = comments_files_details($id);
        //
        $this->_id = $comments_files["id"];
        $this->_comment_id = $comments_files["comment_id"];
        $this->_file = $comments_files["file"];
        $this->_order_by = $comments_files["order_by"];
        $this->_status = $comments_files["status"];
    }
}

################################################################################
