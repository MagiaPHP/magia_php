<?php

/**
 * Description of App
 *
 * @author robinson
 */
class AppInvoice extends App {

    public function _contruct() {
        parent::_contruct();
    }

    function setAppInvoice($id) {
        $inv = new Invoices();
        $inv->setInvoice($id);
        $this->_doc = $inv;
        $this->_code = $inv->getCode();
        $this->_id = $inv->getId();
    }

    function getDoc() {
        return parent::getDoc();
    }

    function getId() {
        return parent::getId();
    }

    function getCode() {
        return parent::getCode();
    }
}
