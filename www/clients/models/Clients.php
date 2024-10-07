<?php

################################################################################
/**
include "www/contacts/models/Contacts.php";

class Clients extends Contacts {

    public $_id;
    public $_contact_id; // numero de contacto que lo usaremos como referencia en todas partes
    
    public $_date; // Registre date
    public $_discount; // Como cliente el descuento que tiene 
    public $_order_by;
    public $_status;

    function __construct($id) {

        $clients = clients_details_by_contact_id($id);
        $contact = contacts_details($id);
        
        //
        $this->_id = $clients["id"];
        $this->_contact_id = $clients["contact_id"];
        
        $this->_date = $clients["date"];
        $this->_discount = $clients["discount"];
        $this->_order_by = $clients["order_by"];
        $this->_status = $clients["status"];
        
        $this->_name = $contact['name'];
        $this->_lastname = $contact['lastname'];
        
        
    }

################################################################################

    function getId() {
        return $this->_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getDate() {
        return $this->_date;
    }

    function getDiscount() {
        return $this->_discount;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setDiscount($discount) {
        $this->_discount = $discount;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    
   function nameFormated(): string {
       //return parent::nameFormated();
       
       return "Paciente";
   }
}

################################################################################
*/