<?php

class Emails_tmp {

    public $_tags = array(1);

    function __construct() {
        $this->setTag('%powered_by%', 'Factux.be');
    }

    function setTag($t, $value) {
        ($this->_tags[$t] = $value);
    }

    function getTag($tmp) {
        return $this->_tags[$tmp];
    }

    function getTags() {
        return $this->_tags;
    }
}
