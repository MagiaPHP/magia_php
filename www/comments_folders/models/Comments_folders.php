<?php

// comments_folders
// Date: 2022-04-25    
################################################################################

class Comments_folders {

    /**
     * id
     */
    public $_id;

    /**
     * name
     */
    public $_name;

    /**
     * label
     */
    public $_label;

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

    function getName() {
        return $this->_name;
    }

    function getLabel() {
        return $this->_label;
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

    function setName($name) {
        $this->_name = $name;
    }

    function setLabel($label) {
        $this->_label = $label;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setComments_folders($id) {
        $comments_folders = comments_folders_details($id);
        //
        $this->_id = $comments_folders["id"];
        $this->_name = $comments_folders["name"];
        $this->_label = $comments_folders["label"];
        $this->_order_by = $comments_folders["order_by"];
        $this->_status = $comments_folders["status"];
    }
}

################################################################################
