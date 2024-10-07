<?php

/**
 * Esto agrega una compania, pero viene de la busqueda de tva antes 
 * sin tva no se puede agregar
 * 
 */
if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$tva = (isset($_GET['tva'])) ? clean($_GET['tva']) : false;

$error = array();

// required
if (!$tva) {
    array_push($error, 'The vat number is mandatory');
}
// format
if (!contacts_is_tva($tva)) {
    array_push($error, 'Vat format error');
}
// condicional 
if (contacts_search_by_tva($tva)) {
    array_push($error, 'The vat number already exist');
}
###############################################################################
if (!$error) {
    
    include view("contacts", "add_company");
} else {

    include view("home", "pageError");
}



