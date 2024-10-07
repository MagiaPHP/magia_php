<?php

include pdf_template("a");

class PDF_BALANCE extends A {

    public $_balance;

    function setBalance($balance) {
        $this->_balance = $balance;
    }

    ////////////////////////////////////////////////////////////////////////

    function getBalance() {
        return $this->_balance;
    }

    /////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {
        $this->addElements("body");
    }

    function Footer() {
        parent::Footer();
    }

    ///////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////
    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Balance');
        $this->setTag('%balance%', $this->getBalance());

//        $this->setTag('%year%', $this->getYear());
//        $this->setTag('%trimester%', ucfirst($this->getTrimester()));
//        $this->setTag('%month%', ucfirst(magia_dates_month($this->getMonth())));
//        $this->setTag('%y%', $this->getYear());
//        $this->setTag('%t%', ucfirst($this->getTrimester()));
//        $this->setTag('%m%', ucfirst($this->getMonth()));

        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
//            if ($tag && $tmp && $txt_tr) {
            $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
//            }
        }

        return pdf_textr($txt_tr);
    }
}
