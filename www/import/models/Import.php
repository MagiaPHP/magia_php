<?php

class Import {

//put your code here

    public $_id;
    public $_owner_id;
    public $_type;
    public $_title;
    public $_name;
    public $_lastname;
    public $_birthdate;
    public $_tva;
    public $_billing_method;
    public $_discounts;
    public $_code;
    public $_language;
    public $_order_by;
    public $_status;
    public $_email;
    public $_web;
    public $_gsm;
    public $_tel;
    public $_facebook;
    public $_tel3;
    public $_tel2;
    public $_fax;
    public $_emailSecure;
    public $_nationalNumber;
    public $_class = array();
    public $_error = array();

    function __construct($id) {
        $this->_id = $id;
    }

    function setId($id) {
        $this->_id = $id;
    }

    function setOwner_id($owner_id) {
        $this->_owner_id = $owner_id;
    }

    function setType($type) {
        $this->_type = $type;
    }

    function setTitle($title) {
        $this->_title = $title;
    }

    function setName($name) {
        $this->_name = $name;
    }

    function setLastname($lastname) {
        $this->_lastname = $lastname;
    }

    function setBirthdate($birthdate) {
        $this->_birthdate = $birthdate;
    }

    function setTva($tva) {
        $this->_tva = $tva;
    }

    function setBilling_method($billing_method) {
        $this->_billing_method = $billing_method;
    }

    function setDiscounts($discounts) {
        $this->_discounts = $discounts;
    }

    function setCode($code) {
        $this->_code = $code;
    }

    function setLanguage($language) {
        $this->_language = $language;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setEmail($email) {
        $this->_email = $email;
    }

    function setWeb($web) {
        $this->_web = $web;
    }

    function setGsm($gsm) {
        $this->_gsm = $gsm;
    }

    function setTel($tel) {
        $this->_tel = $tel;
    }

    function setFacebook($facebook) {
        $this->_facebook = $facebook;
    }

    function setTel3($tel3) {
        $this->_tel3 = $tel3;
    }

    function setTel2($tel2) {
        $this->_tel2 = $tel2;
    }

    function setFax($fax) {
        $this->_fax = $fax;
    }

    function setEmailSecure($emailSecure) {
        $this->_emailSecure = $emailSecure;
    }

    function setNationalNumber($nationalNumber) {
        $this->_nationalNumber = $nationalNumber;
    }

    function setClass($col, $class) {
        array_push($this->_class[$col], $class);
    }

    function setError($error) {
        array_push($this->_error, $error);
    }

////////////////////////////////////////////////////////////////////////////s
    function getId() {
        return $this->_id;
    }

    function getOwner_id() {
        return $this->_owner_id;
    }

    function getType() {
        return $this->_type;
    }

    function getTitle() {
        return $this->_title;
    }

    function getName() {
        return $this->_name;
    }

    function getLastname() {
        return $this->_lastname;
    }

    function getBirthdate() {
        return $this->_birthdate;
    }

    function getTva() {
        return $this->_tva;
    }

    function getBilling_method() {
        return $this->_billing_method;
    }

    function getDiscounts() {
        return $this->_discounts;
    }

    function getCode() {
        return $this->_code;
    }

    function getLanguage() {
        return $this->_language;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

    function getEmail() {
        return $this->_email;
    }

    function getWeb() {
        return $this->_web;
    }

    function getGsm() {
        return $this->_gsm;
    }

    function getTel() {
        return $this->_tel;
    }

    function getFacebook() {
        return $this->_facebook;
    }

    function getTel3() {
        return $this->_tel3;
    }

    function getTel2() {
        return $this->_tel2;
    }

    function getFax() {
        return $this->_fax;
    }

    function getEmailSecure() {
        return $this->_emailSecure;
    }

    function getNationalNumber() {
        return $this->_nationalNumber;
    }

    function getClass($col) {
        return $this->_class[$col];
    }

    function getError() {
        return $this->_error;
    }

////////////////////////////////////////////////////////////////////////////
    function checkId($line) {

        if (contacts_field_id('id', $this->getId())) {
            $this->setClass('id', 'class="danger"');
            $this->setError('<b>Line ' . $line . '</b> Id number already exist in your data base');
        }

        if (!is_id($this->getId())) {
            $this->setClass('id', 'class="danger"');
            $this->setError('<b>Line ' . $line . '</b> Id format error');
        }

//        if (array_count_values($ids_array)[$this->getId()] > 1) {
//            $class['id'] = ' class="danger" ';
//            array_push($res, '<b>Line ' . $i . '</b> The id already exists in your document');
//        }

        if ($this->getId() && !is_id($this->getId())) {
            $class['id'] = ' class="danger" ';
            array_push($res, '<b>Line ' . $line . '</b> Id number format error');
        }
    }

    function checkOwner_id($owner_id) {
        $res = array();
        if (empty($owner_id)) {
            array_push($res, "owner_id is mandatory");
        }
        return $res;
    }

    function checkType($type) {
        $res = array();
        if (empty($type)) {
            array_push($res, "type is mandatory");
        }
        return $res;
    }

    function checkTitle($title) {
        $res = array();
        if (empty($title)) {
            array_push($res, "title is mandatory");
        }
        return $res;
    }

    function checkName($name) {
        $res = array();
        if (empty($name)) {
            array_push($res, "name is mandatory");
        }
        return $res;
    }

    function checkLastname($lastname) {
        $res = array();
        if (empty($lastname)) {
            array_push($res, "lastname is mandatory");
        }
        return $res;
    }

    function checkBirthdate($birthdate) {
        $res = array();
        if (empty($birthdate)) {
            array_push($res, "birthdate is mandatory");
        }
        return $res;
    }

    function checkTva($tva) {
        $res = array();
        if (empty($tva)) {
            array_push($res, "tva is mandatory");
        }
        return $res;
    }

    function checkBilling_method($billing_method) {
        $res = array();
        if (empty($billing_method)) {
            array_push($res, "billing_method is mandatory");
        }
        return $res;
    }

    function checkDiscounts($discounts) {
        $res = array();
        if (empty($discounts)) {
            array_push($res, "discounts is mandatory");
        }
        return $res;
    }

    function checkCode($code) {
        $res = array();
        if (empty($code)) {
            array_push($res, "code is mandatory");
        }
        return $res;
    }

    function checkLanguage($language) {
        $res = array();
        if (empty($language)) {
            array_push($res, "language is mandatory");
        }
        return $res;
    }

    function checkOrder_by($order_by) {
        $res = array();
        if (empty($order_by)) {
            array_push($res, "order_by is mandatory");
        }
        return $res;
    }

    function checkStatus($status) {
        $res = array();
        if (empty($status)) {
            array_push($res, "status is mandatory");
        }
        return $res;
    }

    function checkEmail($email) {
        $res = array();
        if (empty($email)) {
            array_push($res, "email is mandatory");
        }
        return $res;
    }

    function checkWeb($web) {
        $res = array();
        if (empty($web)) {
            array_push($res, "web is mandatory");
        }
        return $res;
    }

    function checkGsm($gsm) {
        $res = array();
        if (empty($gsm)) {
            array_push($res, "gsm is mandatory");
        }
        return $res;
    }

    function checkTel($tel) {
        $res = array();
        if (empty($tel)) {
            array_push($res, "tel is mandatory");
        }
        return $res;
    }

    function checkFacebook($facebook) {
        $res = array();
        if (empty($facebook)) {
            array_push($res, "facebook is mandatory");
        }
        return $res;
    }

    function checkTel3($tel3) {
        $res = array();
        if (empty($tel3)) {
            array_push($res, "tel3 is mandatory");
        }
        return $res;
    }

    function checkTel2($tel2) {
        $res = array();
        if (empty($tel2)) {
            array_push($res, "tel2 is mandatory");
        }
        return $res;
    }

    function checkFax($fax) {
        $res = array();
        if (empty($fax)) {
            array_push($res, "fax is mandatory");
        }
        return $res;
    }

    function checkEmailSecure($emailSecure) {
        $res = array();
        if (empty($emailSecure)) {
            array_push($res, "emailSecure is mandatory");
        }
        return $res;
    }

    function checkNationalNumber($nationalNumber) {
        $res = array();
        if (empty($nationalNumber)) {
            array_push($res, "nationalNumber is mandatory");
        }
        return $res;
    }
}
