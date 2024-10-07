<?php

// Ficha Cliente con todos los datos d la empresa 
// Ficha cliente 
// Sus lista de facturas las mas nuevas primero 

include pdf_template("a");

class PDF_CONTACT extends A {

    public $contact;

    function setPdfContact($id) {
        $this->contact = new Contacts();
        $this->contact->setContact($id);
    }

    function getContact() {
        return $this->contact;
    }

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

    ////////////////////////////////////////////////////////////////////////////


    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        ////////////////////////////////////////////////////////////////////
        $this->setTag('%pdf_title%', 'Contact');

        $this->setTag('%contact_id%', $this->getContact()->getId());
        $this->setTag('%contact_owner_id%', $this->getContact()->getOwner_id());
        $this->setTag('%contact_name%', $this->getContact()->getName());
        $this->setTag('%contact_lastname%', $this->getContact()->getLastname());
        $this->setTag('%contact_birthdate%', $this->getContact()->getBirthdate());
        $this->setTag('%contact_vat%', $this->getContact()->getTva());
        $this->setTag('%contact_billing_method%', $this->getContact()->getBilling_method());
        $this->setTag('%contact_billing_discounts%', $this->getContact()->getDiscounts());
        $this->setTag('%contact_code%', $this->getContact()->getCode());
        $this->setTag('%contact_language%', $this->getContact()->getLanguage());
        $this->setTag('%contact_order_by%', $this->getContact()->getOrder_by());
        $this->setTag('%contact_status%', $this->getContact()->getStatus());
        ////////////////////////////////////////////////////////////////////

        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%contact_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getContact()->getId(), $mdnl['name']));
            }
        }


        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }

        return pdf_textr($txt_tr);
    }
}
