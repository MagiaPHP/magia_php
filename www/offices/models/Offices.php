<?php

class Offices extends Contacts {

    public $_vat_number;
    public $_billing_method;
    public $_discounts;

    function __construct($name, $vat_number, $billing_method, $discounts) {
        $this->_name = $name;
        $this->_vat_number = $vat_number;
        $this->_billing_method = $billing_method;
        $this->_discounts = $discounts;
    }
}
