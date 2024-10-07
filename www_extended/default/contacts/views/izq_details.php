<?php

// Empresa 
// oficina
//      contacto
//      empleado
//      user
//

if (offices_is_headoffice($id)) {
    // es una emprea
    include 'izq_details_company.php';
} else {
    // es un contacto 
    include 'izq_details_contact.php';
}

//include 'izq_details_company.php';
//include 'izq_details_contact.php';

//include 'izq_details_company.php';
//include "izq_contact.php";

//include 'izq_details_contact.php';

//if (contacts_field_id('owner_id', $id) == null) {
//    // es una emprea
//    include 'izq_details_company.php';
//} else {
//    // es un contacto 
//    include 'izq_details_contact.php';
//}


//include 'izq_details_company.php';

