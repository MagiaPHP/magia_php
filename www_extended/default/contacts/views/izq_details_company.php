<?php

//vardump(
//        array(
//            IS_MULTI_VAT,
//            'offices_is_headoffice($id)' => offices_is_headoffice($id)
//        )
//);

if (IS_MULTI_VAT) {

    if (offices_is_headoffice($id)) {
        // sede

        include "multi_izq_headoffice.php";
    } else {

        // officina
        include "multi_izq_office.php";
    }
} else {

    if (offices_is_headoffice($id)) {
        // sede
        include "izq_headoffice.php";
    } else {
        // officina
        include "izq_office.php";
    }
}


