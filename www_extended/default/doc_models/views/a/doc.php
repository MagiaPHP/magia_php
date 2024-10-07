<?php

// Esto era para hacer un doc de base , poso importa el documento, 
// venga o no de una controller, pero creo que es mala idea 
// a ver en el futuro 
// 
include pdf_template("a");

//
class PDF_DOC extends A {

    function Header() {
        parent::Header();
    }

    function body() {
        $this->addElements("body");
    }

    function Footer() {
        parent::Footer();
    }
}
