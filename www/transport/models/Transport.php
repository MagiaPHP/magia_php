<?php

// transport
// Date: 2023-02-06    
################################################################################

class Transport {

    /**
     * id
     */
    public $_id;

    /**
     * code
     */
    public $_code;

    /**
     * name
     */
    public $_name;

    /**
     * price
     */
    public $_price;

    /**
     * tax
     */
    public $_tax;

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

    function getCode() {
        return $this->_code;
    }

    function getName() {
        return $this->_name;
    }

    function getPrice() {
        return $this->_price;
    }

    function getTax() {
        return $this->_tax;
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

    function setCode($code) {
        $this->_code = $code;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setPrice($price) {
        $this->_price = $price;
    }

    function setTax($tax) {
        $this->_tax = $tax;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setTransport($id) {
        $transport = transport_details($id);
        //
        $this->_id = $transport["id"];
        $this->_code = $transport["code"];
        $this->_name = $transport["name"];
        $this->_price = $transport["price"];
        $this->_tax = $transport["tax"];
        $this->_order_by = $transport["order_by"];
        $this->_status = $transport["status"];
    }
}

################################################################################
