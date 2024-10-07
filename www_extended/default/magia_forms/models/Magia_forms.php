<?php

class Magia_form extends Magia_forms {

    public $_lines = array();

    function __construct() {
        parent::__construct();
    }

    function setlines() {

        $lines = magia_forms_lines_list_by_form_id($this->getId());

        $this->_lines = $lines;
    }

    function getLines() {
        return $this->_lines;
    }
}
