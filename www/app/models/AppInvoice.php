<?php

class AppInvoice extends Invoices {

    public $_whyCanNotShowPublic;

    public function __construct() {
        parent::__construct();
        $this->setWhyCanNotShowPublic();
    }

    function canShowPublic() {
        return $this->getWhyCanNotShowPublic() ?? false;
    }

    function getWhyCanNotShowPublic() {
        return $this->_whyCanNotShowPublic;
    }

    function getStatus() {
        return parent::getStatus();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function setWhyCanNotShowPublic($error = null) {

        if ($error) {
            array_push($this->_whyCanNotShowPublic, $error);
        }

        if ($this->getStatus() === 0) {
            array_push($this->_whyCanNotShowPublic, 'Invoice in draft status can not who via app');
        }
    }
}
