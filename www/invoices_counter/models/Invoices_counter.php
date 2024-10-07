<?php

// invoices_counter
// Date: 2022-02-10    
################################################################################

class Invoices_counter {

    /**
     * invoice_id
     */
    public $_invoice_id;

    /**
     * year
     */
    public $_year;

    /**
     * counter
     */
    public $_counter;

    function __construct() {
        //
    }

################################################################################

    function getInvoice_id() {
        return $this->_invoice_id;
    }

    function getYear() {
        return $this->_year;
    }

    function getCounter() {
        return $this->_counter;
    }

################################################################################

    function setInvoice_id($invoice_id) {
        $this->_invoice_id = $invoice_id;
    }

    function setYear($year) {
        $this->_year = $year;
    }

    function setCounter($counter) {
        $this->_counter = $counter;
    }

    function setInvoices_counter($id) {
        $invoices_counter = invoices_counter_details($id);
        //
        $this->_invoice_id = $invoices_counter["invoice_id"];
        $this->_year = $invoices_counter["year"];
        $this->_counter = $invoices_counter["counter"];
    }
}

################################################################################
