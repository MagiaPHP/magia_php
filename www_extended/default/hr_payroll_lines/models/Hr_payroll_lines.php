<?php

class Payroll_lines extends Hr_payroll_lines {

    public $_value_euro = null;

    function setValueEuro($value) {
        $this->_value_euro = $value;
    }

    function getValueEuro() {
        return $this->_value_euro;
    }
}
