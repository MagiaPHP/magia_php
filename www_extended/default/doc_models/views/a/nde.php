<?php

include pdf_template("a");

class PDF_INVOICE extends A {

    public $_invoice;

    function setPdfInvoice($id) {
        $this->_invoice = new Invoices();
        $this->_invoice->setInvoice($id);
        $this->setA($this->_invoice->getSender()->getId());
    }

    function getInvoice() {
        return $this->_invoice;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {
        $this->addElements("body");
    }

    function Footer() {
        parent::Footer();
    }
}
