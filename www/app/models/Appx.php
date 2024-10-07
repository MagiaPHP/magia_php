<?php

/**
 * Description of App
 *
 * @author robinson
 */
class App {

//put your code here
    public $_doc;
    public $_id;
    public $_code;

    public function _contruct() {
        
    }

    public function getDoc() {
        return $this->_doc;
    }

    public function getId() {
        return $this->_id;
    }

    public function getCode() {
        return $this->_code;
    }

////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
    public function setDoc($doc) {
        return $this->_doc;
    }

    public function setId($id) {
        return $this->_id;
    }

    public function setCode($code) {
        return $this->_code;
    }
}
